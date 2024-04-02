<?php

session_start();
require_once 'connection.php';

$user_id = $_SESSION['user_id'];

// Retrieve the selected value from the AJAX request
if (isset($_POST['value_date'])) {
    $selectedValue = $_POST['value_date'];

    // Perform your SQL query using the selected value
    $query = "SELECT DISTINCT MONTH(Transaction_date) AS month 
              FROM transaction_booking 
              WHERE MONTH(Transaction_date) > '$selectedValue' 
                AND status = 'Booked'
                AND user_id = '$user_id'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        // Fetch distinct months from the database
        while ($row = mysqli_fetch_assoc($result)) {
            $month = $row['month'];
            $month_name = date('F', mktime(0, 0, 0, $month, 1));
            echo "<option value='$month'>$month_name</option>";
        }
    }
}

if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $startMonth = $_POST['start_date'];
    $endMonth = $_POST['end_date'];

    $startYear = date('Y');
    $startDate = date('Y-m-01', mktime(0, 0, 0, $startMonth, 1, $startYear));
    $endDate = date('Y-m-t', mktime(0, 0, 0, $endMonth, 1, $startYear));

    $query =   "SELECT subquery.month, subquery.total_amount, total_sum.total_sum
                FROM (
                    SELECT MONTH(Transaction_date) AS month, SUM(amount) AS total_amount
                    FROM transaction_booking 
                    WHERE Transaction_date BETWEEN ? AND ?
                    AND status = 'Booked'
                    AND user_id = ?
                    GROUP BY MONTH(Transaction_date)
                ) AS subquery
                CROSS JOIN (
                    SELECT SUM(total_amount) AS total_sum
                    FROM (
                        SELECT MONTH(Transaction_date) AS month, SUM(amount) AS total_amount
                        FROM transaction_booking 
                        WHERE Transaction_date BETWEEN ? AND ?
                        AND status = 'Booked'
                        AND user_id = ?
                        GROUP BY MONTH(Transaction_date)
                    ) AS subquery2
                ) AS total_sum";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {

        $stmt->bind_param("ssssss", $startDate, $endDate, $user_id, $startDate, $endDate, $user_id);

        $stmt->execute();

        $result = $stmt->get_result();

        $data = array();

        while ($row = $result->fetch_assoc()) {
            // Access the values of each row
            $month = date("F", mktime(0, 0, 0, $row['month'], 1));
            $total_amount = $row['total_amount'];
            $total_sum = $row['total_sum'];

            $percentage = ($total_amount / $total_sum) * 100;
            $data[] = array('month' => $month, 'total_sum' => $total_sum, 'percentage' => $percentage);
        }

        $responseData = array('data' => $data);
        $json_data = json_encode($responseData);
        echo $json_data;

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
