<?php

require_once __DIR__ . '/vendor/autoload.php';

use setasign\Fpdi\Fpdi;

$imagePath = __DIR__ . '/cartao-idoso/cartao-idoso-frente.png';

// width: 2334 pixels
// height: 1658 pixels

$imageInfo = getimagesize($imagePath);
$widthPx = $imageInfo[0];
$heightPx = $imageInfo[1];

// Tentar obter o DPI real da imagem
$dpi = 72; // Valor padrão

$mmPerInch = 25.4;
$widthMm = ceil($widthPx * $mmPerInch / $dpi);
$heightMm = ceil($heightPx * $mmPerInch / $dpi);

$pdf = new Fpdi('L', 'mm', array($widthMm, $heightMm));

$pdf->SetMargins(0, 0, 0);
$pdf->SetAutoPageBreak(false);

$pdf->AddPage();

$pdf->Image($imagePath, 0, 0, $widthMm, $heightMm);

$positionNumberRegister = [
    497,
    276
];

$positionEmission = [
    310,
    346
];

$pdf->SetFont('Helvetica', 'B', 98);
$pdf->SetTextColor(50, 50, 50);
$pdf->SetXY($positionNumberRegister[0], $positionNumberRegister[1]);
$pdf->Write(35, '0000');

$pdf->SetFont('Helvetica', 'B', 88);
$pdf->SetTextColor(50,50,50);
$pdf->SetXY($positionEmission[0], $positionEmission[1]);
$pdf->Write(35,'01/02/2024');

$pdf->Output('F', __DIR__ . '/cartao-idoso/new-cartao-idoso.pdf');