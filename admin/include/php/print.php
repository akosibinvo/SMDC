<?php
require "../../../php/session.php";
require '../tcpdf/tcpdf.php';
require "../../../php/connection.php";


$user_id = $_SESSION['user_id'];
$agent_name = $_SESSION['agent'];
$agent_lname = $_SESSION['lastName'];

$fullname = $agent_name.$agent_lname;


// SQL query to get candidate votes
$sql = "SELECT * FROM transaction_booking WHERE status = 'Booked' AND user_id = '$id' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

class CustomPDF extends TCPDF
{
    public function Header()
    {
        $logoImagePath1 = '../../../img/bg/logo-square.jpg';
        $logoWidth1 = 25;
        $logoHeight1 = 25;
        $logoX1 = 20;
        $logoY1 = 15;
        $this->Image($logoImagePath1, $logoX1, $logoY1, $logoWidth1, $logoHeight1);

        $logoImagePath2 = '../../../img/bg/jqb.jpg';
        $logoWidth2 = 25;
        $logoHeight2 = 25;
        $logoX2 = $this->getPageWidth() - $logoWidth2 - 20;
        $logoY2 = 15; 
        $this->Image($logoImagePath2, $logoX2, $logoY2, $logoWidth2, $logoHeight2);

    }
}


    // Create new PDF document
    $pdf = new CustomPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Add a page
    $pdf->AddPage();

    // Set the top margin
    $pdf->SetMargins(7, 30, 7,);

    $html .= '<div style="text-align: center;">';
    $html .= '<h1>Sales Report</h1>';
    $html .= '<p style="text-align: center; font-size: 10px;">Here is your sales report. <br> <br> </p> ';
    $html .= '</div>';

    $html .= '<div>';
    $html .= '<table cellpadding="10" style="font-family: Arial, Helvetica, sans-serif; ">';
    $html .= '<tr style="background-color: #0030ff; color: #fff; text-align: center;">';
    $html .= '<th>Unit Code</th>';
    $html .= '<th>Amount</th>';
    $html .= '<th>Commission</th>';
    $html .= '<th>Date</th>';
    $html .= '</tr>';

    // Loop through data and add to the HTML table
    while ($row = mysqli_fetch_assoc($result)) {
        $unitcode = $row['Unit_code'];
        $amount = 'P ' . number_format($row['Amount'], 0, '.', ',');
        $commission = 'P ' . number_format($row['Commissions'], 0, '.', ',');
        $date = $row['Transaction_date'];

        // Add table row and data for each record
        $html .= '<tr>';
        $html .= '<td style="border-bottom: .5px solid #ddd; text-align: center;">' . $unitcode . '</td>';
        $html .= '<td style="border-bottom: .5px solid #ddd; text-align: center;"> ' . $amount . '</td>';
        $html .= '<td style="border-bottom: .5px solid #ddd; text-align: center;">' . $commission . '</td>';
        $html .= '<td style="border-bottom: .5px solid #ddd; text-align: center;">' . $date . '</td>';
        $html .= '</tr>';
    }

    $html .= '</table>';
    $html .= '</div>';
    // Write HTML to PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    ob_clean();
    $pdf->Output("sales-report-{$fullname}.pdf", 'D');
    ob_end_clean();
} else {
    $_SESSION['notification'] = array(
        'title' => 'Error!',
        'status' => 'error',
        'description' => 'There\'s no sales to print right now.'
    );

    header("Location: ../../../pages/pages-sales.php");
}

// Close the database connection
mysqli_close($conn);
