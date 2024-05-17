<?php

use Fpdf\Fpdf;

require_once __DIR__ .  '/vendor/autoload.php';
require_once __DIR__ . '/Query.php';
require_once __DIR__ . '/Sendmail.php';
require_once __DIR__ . '/Validation.php';

$val = new Validation();

// Collecting value from ajax file.
$name = $_POST['cus'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$total = $_POST['total'];

// Checks if email format,name and phone number is correct or not.If correct
// then place order else don't.
if (!$val->validEmail($email) && $val->validFullName($name) && $val->validNumber($phone)) {
  $ob = new Query();
  $obn = new Sendmail();
  $pdf = new Fpdf();
  $pdf->AddPage();
  $pdf->Rect(5, 5, 200, 287);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(50, 10, 'Customer name:', 1, 0, 'L', false, '');
  $pdf->Cell(50, 10, $name, 1, 1, 'L', false, '');
  $pdf->Cell(50, 10, 'Customer email:', 1, 0, 'L', false, '');
  $pdf->Cell(50, 10, $email, 1, 1, 'L', false, '');
  $pdf->Cell(50, 10, 'Customer phone:', 1, 0, 'L', false, '');
  $pdf->Cell(50, 10, $phone, 1, 1, 'L', false, '');
  $pdf->Cell(50, 10, 'Total:', 1, 0, 'L', false, '');
  $pdf->Cell(50, 10, $total, 1, 0, 'L', false, '');
  try {
    $pdf->Output('F', 'Invoice.pdf');
  } catch (Exception $e) {
    echo $e;
  }
  $obn->sendInvoice();
}
else {
  echo "<script>alert('Errrorr')</script>";
}
