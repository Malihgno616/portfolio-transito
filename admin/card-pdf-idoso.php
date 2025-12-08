<?php 

require_once __DIR__ . '/vendor/autoload.php';

use setasign\Fpdi\Fpdi;

class CardIdosoFrenteVerso {
    
    private $pdf;

    public function __construct()
    {
        $this->pdf = new Fpdi('P', 'mm', 'A4');
        $this->pdf->SetMargins(0, 0, 0);
        $this->pdf->SetAutoPageBreak(false);
        $this->pdf->AddPage();
        
    }

    public function addFrontBack($frontImagePath, $backImagePath)
    {
        $margin = 10;

        // A4 vertical
        $pageWidth  = 210;
        $pageHeight = 297;

        // Área útil
        $usableWidth  = $pageWidth - ($margin * 2);
        $usableHeight = $pageHeight - ($margin * 2);

        // Cada imagem ocupa metade da altura
        $imgHeight = $usableHeight / 2;
        $imgWidth  = $usableWidth;

        // Frente (em cima)
        $this->pdf->Image(
            $frontImagePath,
            $margin,
            $margin,
            $imgWidth,
            $imgHeight
        );

        // Verso (em baixo)
        $this->pdf->Image(
            $backImagePath,
            $margin,
            $margin + $imgHeight,
            $imgWidth,
            $imgHeight
        );
    }

    public function output($fileName = 'cartao-idoso.pdf', $destination = 'I')
    {
        $this->pdf->Output($destination, $fileName);
    }

}

$pdf = new CardIdosoFrenteVerso();
$pdf->addFrontBack(
    __DIR__ . '/cartao-idoso/cartao-idoso-frente.png',
    __DIR__ . '/cartao-idoso/cartao-idoso-verso.png'
);
$pdf->output(__DIR__.'/pdf-idoso/cartao-idoso.pdf', 'F');
