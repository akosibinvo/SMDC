<?php
session_start();
require "../../../php/connection.php";


if (isset($_POST['addprice'])) {
    
    // Check if all required fields are present

    if(isset($_POST['addprice_id'], $_POST['amount'], $_POST['discount'])) {
        $addprice_id = $_POST['addprice_id'];
        $listPriceWithPeso = $_POST['amount'];
        $inputDiscount = $_POST['discount'];

        $sql_booking = "SELECT agent_role FROM transaction_booking WHERE client_id = $addprice_id ";
        $res_booking = mysqli_query($conn, $sql_booking);

        if ($res_booking) {
            while ($rows_booking = mysqli_fetch_assoc($res_booking)) {
                $agent_role = $rows_booking['agent_role'];
            }
        }


        $listPriceWithPeso = str_replace([' ', ','], '', $listPriceWithPeso);
        $inputDiscount = str_replace([' ', ','], '', $inputDiscount);

        $listPrice = floatval(str_replace('₱', '', $listPriceWithPeso));

        $inputDiscount = floatval($inputDiscount);
        
        // Discount
        $discountDecimal = $inputDiscount / 100;
        
        // Computation for discount
        $discountAmount = $listPrice * $discountDecimal;

        // For Sales
        $netListPrice = $listPrice - $discountAmount;

        // Define commission rates
        $commission_rates = [
            'SA1' => 0.025,
            'SA2' => 0.03,
            'IMP' => 0.04
        ];

        // Check if role exists in commission rates array
        if(array_key_exists($agent_role, $commission_rates)) {
            $commission_rate = $commission_rates[$agent_role];
        } else {
            exit("Error!");
        }

        // Calculate commission
        $coms = $netListPrice * $commission_rate;

        // Value added tax = 12%
        $vat = 0.12;

        // Commissions multiplied by VAT
        $coms_vat = $coms * $vat;

        // Commissions received by sellers (Including VAT)
        $total_coms = $coms - $coms_vat;

        // Updating transaction booking amount and commissions
        $query = "UPDATE transaction_booking SET Amount=?, Commissions=?, `status` = 'Booked' WHERE client_id=?";
        $stmt = mysqli_prepare($conn, $query);

        // Inserting into notifications table
        $notif = "SELECT * FROM transaction_booking WHERE client_id = $addprice_id ";
        $res_notif = mysqli_query($conn, $notif);

        if ($res_notif) {
            while ($rows_notif = mysqli_fetch_assoc($res_notif)) {
                $notif_id = $rows_notif['user_id'];
                $client_name = $rows_notif['firstname'];
                $agent_name = $rows_notif['agent'];
                $message = "Hello, $agent_name. Your transaction for $client_name has been approved by the admin.";
            }
        }

        $notif_status = 0;


        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ddi", $netListPrice, $total_coms, $addprice_id);

            if (mysqli_stmt_execute($stmt)) {

                $_SESSION['notification'] = array(
                    'title' => 'Success!!',
                    'status' => 'success',
                    'description' => 'Booking completed successfully.'
                );

                mysqli_stmt_close($stmt);


                $insert_notif = "INSERT INTO notifications (user_id, message, read_status) VALUES (?, ?, ?)";
                $notif_stmt = $conn->prepare($insert_notif);
                $notif_stmt->bind_param("isi", $notif_id, $message, $notif_status);

                if ($notif_stmt->execute()) {

                    mysqli_stmt_close($notif_stmt);
                    mysqli_close($conn);
                    header("Location: ../../pages/pages-booking-approval.php");
                    
                } else {

                    $_SESSION['notification'] = array(
                        'title' => 'Error!',
                        'status' => 'error',
                        'description' => 'Error in booking.'
                    );

                }

                $stmt->close();

            } else {

                exit("Error: " . mysqli_error($conn));
            }
        } else {

            exit("Error: Prepare error - " . mysqli_error($conn));
        }
    } else {

        exit("Error: Required fields are missing");
    }
} else {

    exit("Error: 'addprice' is not set in POST");
}

mysqli_close($conn);
?>