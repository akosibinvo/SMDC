<?php
session_start();
require "../../../php/connection.php";


if (isset($_POST['addprice'])) {
    // Check if all required fields are present
    if(isset($_POST['addprice_id'], $_POST['amount'], $_POST['discount'])) {
        $addprice_id = $_POST['addprice_id'];
        $listPriceWithPeso = $_POST['amount'];
        $inputDiscount = $_POST['discount'];

        $sql_booking = "SELECT agent_role FROM transaction_booking WHERE client_id = $addprice_id";
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
            // Handle the case where role's commission rate is not defined
            // For example: set a default commission rate or display an error message
            exit("Error: Commission rate for role '$agent_role' is not defined");
        }

        // Calculate commission
        $coms = $netListPrice * $commission_rate;

        // Value added tax = 12%
        $vat = 0.12;

        // Commissions multiplied by VAT
        $coms_vat = $coms * $vat;

        // Commissions received by sellers (excluding VAT)
        $total_coms = $coms - $coms_vat;


        // Prepare and execute the SQL query
        $query = "UPDATE transaction_booking SET Amount=?, Commissions=?, `status` = 'Booked' WHERE client_id=?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ddi", $netListPrice, $total_coms, $addprice_id);

            if (mysqli_stmt_execute($stmt)) {

                $_SESSION['notification'] = array(
                    'title' => 'Success!!',
                    'status' => 'success',
                    'description' => 'Booking completed successfully.'
                );

                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                header("Location: ../../pages/pages-booking-approval.php");
                exit();
            } else {
                $_SESSION['edit'] = false;
                // Handle execution error here if needed
                exit("Error: " . mysqli_error($conn));
            }
        } else {
            // Handle prepare error here if needed
            $_SESSION['edit'] = false;
            exit("Error: Prepare error - " . mysqli_error($conn));
        }
    } else {
        // Handle missing fields error here if needed
        exit("Error: Required fields are missing");
    }
} else {
    // Handle case where 'addprice' is not set in POST
    exit("Error: 'addprice' is not set in POST");
}

// Close the database connection
mysqli_close($conn);
?>