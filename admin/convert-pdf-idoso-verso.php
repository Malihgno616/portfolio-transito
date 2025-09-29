<?php 

namespace ConvertPdf;

require_once __DIR__ . '/vendor/autoload.php';

include_once __DIR__. '/basepdf.php';

use ConvertPdf\BasePdf;

$imagePath = __DIR__ . '/cartao-idoso/cartao-idoso-verso.png';

$imageInfo = getimagesize($imagePath);

$widthPx = $imageInfo[0];

$heightPx = $imageInfo[1];

// Tentar obter o DPI real da imagem
$dpi = 72; // Valor padrão

$mmPerInch = 25.4;

$widthMm = ceil($widthPx * $mmPerInch / $dpi);

$heightMm = ceil($heightPx * $mmPerInch / $dpi);

class CardIdosoVerso extends BasePdf {

    private $nomeIdosoPosition = [0, 0];

    public function __construct($imagePath, $nomeIdosoPosition) {
        parent::__construct($imagePath);
        $this->nomeIdosoPosition = $nomeIdosoPosition;
    }

    public function addContentNomeIdoso($nomeIdoso)
    {
        $this->pdf->SetFont('Helvetica', 'B', 75);
        $this->pdf->SetTextColor(0 ,0,0);
        $this->pdf->SetXY($this->nomeIdosoPosition[0], $this->nomeIdosoPosition[1]);
        $this->pdf->Write(35, $nomeIdoso);
    }

    public function generate($outputPath)
    {
        $this->pdf->Output('F', $outputPath);
    }

}

