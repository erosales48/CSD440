<?php
require('../fpdf/fpdf.php');

$db = new mysqli('localhost', 'student1', 'pass', 'baseball_01');
if ($db->connect_error) {
    die("<h2>Connection failed: " . $db->connect_error . "</h2>");
}
$sql = "SELECT mech_id, mech_name, model, weight_class, 
                   top_speed, armor, production_year 
            FROM baseball_01.battlemechs
            ORDER BY mech_id, mech_name";
$result = $db->query($sql);
if (!$result) {
    die("<h2>Query failed: " . $db->error . "</h2>");
}
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 20);
$page_width = $pdf->GetPageWidth();
$page_height = $pdf->GetPageHeight();
$pdf->SetXY(($page_width - 100) / 2, 10);
$pdf->Cell(40, 14, 'Battlemech Inventory');
$pdf->Ln(20);

$pdf->SetFont('Arial', 'B', 14);
$width_cell = array(10, 40, 25, 25, 30, 20, 20);
$pdf->SetFillColor(63, 79, 68); // Background color of Header
$pdf->SetTextColor(250, 250, 250);

// Header starts
$pdf->Cell($width_cell[0], 10, 'ID', 1, 0, 'C', 1);
$pdf->Cell($width_cell[1], 10, 'Mech Name', 1, 0, 'C', 1);
$pdf->Cell($width_cell[2], 10, 'Model', 1, 0, 'C', 1);
$pdf->Cell($width_cell[3], 10, 'Class', 1, 0, 'C', 1);
$pdf->Cell($width_cell[4], 10, 'Speed (kph)', 1, 0, 'C', 1);
$pdf->Cell($width_cell[5], 10, 'Armor', 1, 0, 'C', 1);
$pdf->Cell($width_cell[6], 10, 'Year', 1, 1, 'C', 1);
// End Header
$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);
$fillColors = [
    [162, 123, 92],
    [199, 217, 194],
];
$fill = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->SetFillColor($fillColors[$fill][0], $fillColors[$fill][1], $fillColors[$fill][2]);
        $pdf->Cell($width_cell[0], 10, $row['mech_id'], 1, 0, 'C', true);
        $pdf->Cell($width_cell[1], 10, $row['mech_name'], 1, 0, 'L', true);
        $pdf->Cell($width_cell[2], 10, $row['model'], 1, 0, 'C', true);
        $pdf->Cell($width_cell[3], 10, $row['weight_class'], 1, 0, 'C', true);
        $pdf->Cell($width_cell[4], 10, number_format($row['top_speed'], 1), 1, 0, 'C', true);
        $pdf->Cell($width_cell[5], 10, $row['armor'], 1, 0, 'C', true);
        $pdf->Cell($width_cell[6], 10, $row['production_year'], 1, 1, 'C', true);
        $fill = !$fill;
    }
}
$db->close();
$pdf->Output();

