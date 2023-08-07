<?php
session_start();
// Include the PDF class
require_once "package/TCPDF-main/tcpdf.php";
date_default_timezone_set('Asia/Kolkata');
  
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
    	$this->SetFont('times', 'B', 18);
    	$this->SetY(1);
        $this->SetX(2);
    	$this->Cell(0,5,'Vehicle Information',0,0,'C');
    	$this->SetFont('times', 'B', 15);
        $this->SetX(2);
        $this->Cell(0, 14, '______________________________________________________________________________');	
      
    }

    // Page footer
    public function Footer() {
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica','b', 8);
        $this->SetTextColor(153, 0, 0);
        /*$this->Cell(0, 10, '**This Is Computer Generated Report Signature Is Required**', 0, false, 'C', 0, '', 0, false, 'M', 'M');*/
        // Page number
       $this->Cell(0, 0, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}
// create new PDF document
$pdf = new MYPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Vehicle Information');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(1, 1, 5);//L T R
$pdf->SetHeaderMargin(3);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 2);
$pdf->AddPage();
// Logo

		// Set font
		$pdf->SetFont('helvetica', 'A', 10);
		include('dbcon.php');
        $Sr= $_GET['pdf'];
		$sql="SELECT Sr, Month, Date, Vehicle_No, Name, Intime,Convert(varchar(15), CAST(Out_time as Time),108) as Out_time,format(Out_date, 'yyyy-MM-dd') as Out_date FROM vehicle where Sr='$Sr'";
        $run=sqlsrv_query($conn,$sql);
        $row=sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);

        $image_file = 'suyoglogo.png';
        $pdf->Image($image_file, 180, 15, 40, 40, '', '', 'T', false, 300, 'C', false, false, 0, false, false, false);

		$output = '<table style="width:100%; padding:4px;" border="1">
            <tr>
                <th style="width: 30%;"><b>Month:</b></th>
                <td style="width: 70%;">'.$row['Month'].'</td>
            </tr>
            <tr>
                <th ><b>Date</b></th>
                <td>'.$row['Date']->format('d-m-Y').'</td>
            </tr>
            <tr>
                <th><b>Vehicle_No:</b></th>
                <td>'.$row['Month'].'</td>
            </tr>
            <tr>                                           
                <th><b>Name:</b></th>
                <td>'.$row['Name'].'</td>
         </tr>
        <tr>
        <td  colspan="2"></td></tr>
         <tr>
            <th style="width: 30%;"><b>Intime</b></th>
            <th style="width: 30%;"><b>Outtime</b></th>
            <th ><b>Out Date</b></th>
        </tr>
        <tr>
        <td style="width: 30%;">'.$row['Intime']->format('H:i').'</td>
        <td style="width: 30%;">'.$row['Out_time'].'</td>
        <td>'.$row['Out_date'].'</td>
        </tr>
        </table> <br>';

		$pdf->SetFont("helvetica", "A", 10.5);						
		$pdf->SetY(60);
		$pdf->SetX(5);
		$pdf->writeHTML($output, true, false, false, false, 'C');


// Clean any content of the output buffer
ob_end_clean();

//Close and output PDF document
$pdf->Output('gatepass.pdf', 'I');

?>