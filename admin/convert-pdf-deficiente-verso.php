<?php 

require_once __DIR__ . '/vendor/autoload.php';

include_once __DIR__. '/basepdf.php';

use ConvertPdf\BasePdf;

$date = date("d/m/Y");

$year = date('Y');

$imagePath = __DIR__ . '/cartao-deficiente/cartao-deficiente-verso.png';

$imageInfo = getimagesize($imagePath);

$widthPx = $imageInfo[0];

$heightPx = $imageInfo[1];

$dpi = 72; // Valor padrão

$mmPerInch = 25.4;

$widthMm = ceil($widthPx * $mmPerInch / $dpi);

$heightMm = ceil($heightPx * $mmPerInch / $dpi);

class CardDeficienteVerso extends BasePdf {

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

$idDeficiente = 120;

$outputPath = __DIR__ . '/cartao-deficiente/cartao-deficiente-id' . $idDeficiente . '-verso.pdf';

try {

    $deficienteVerso = new CardDeficienteVerso($imagePath, [295,10]);
    
    $deficienteVerso->addContentNomeIdoso('Nome do Deficiente');
    
    $deficienteVerso->generate($outputPath);

    echo "PDF gerado com sucesso: " . $outputPath . "\n";

} catch (Exception $e) {
    echo "Erro ao gerar o PDF: " . $e->getMessage() . "\n";
}