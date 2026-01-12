<?php

namespace ConvertPdf;

require_once __DIR__ . '/vendor/autoload.php';

include_once __DIR__. '/basepdf.php';

use ConvertPdf\BasePdf;

$date = date("d/m/Y");

$year = date('Y');

$imagePath = __DIR__ . '/cartao-idoso/cartao-idoso-frente.png';

$imageInfo = getimagesize($imagePath);

$widthPx = $imageInfo[0];

$heightPx = $imageInfo[1];

// Tentar obter o DPI real da imagem
$dpi = 72; // Valor padrão

$mmPerInch = 25.4;

$widthMm = ceil($widthPx * $mmPerInch / $dpi);

$heightMm = ceil($heightPx * $mmPerInch / $dpi);

class CardIdosoFrente extends BasePdf {

    private $positionRegNumber = [0, 0];
    private $positionIssueDate = [0, 0];
    
    public function __construct($imagePath, $positionRegNumber, $positionIssueDate) {
        parent::__construct($imagePath);

        $this->positionRegNumber = $positionRegNumber;
        $this->positionIssueDate = $positionIssueDate;
    }

    public function addContentRegNumber($regNumber)
    {
        $this->pdf->SetFont('Helvetica', 'B', 22);
        $this->pdf->SetTextColor(255, 0, 0);
        $this->pdf->SetXY($this->positionRegNumber[0], $this->positionRegNumber[1]);
        $this->pdf->Write(35, $regNumber);
    }

    public function addContentIssueDate($issueDate)
    {
        $this->pdf->SetFont('Helvetica', 'B', 22);
        $this->pdf->SetTextColor(0 ,0,0);
        $this->pdf->SetXY($this->positionIssueDate[0], $this->positionIssueDate[1]);
        $this->pdf->Write(35, $issueDate);
    }

    public function generate($outputPath)
    {
        $this->pdf->Output('F', $outputPath);
    }

}
