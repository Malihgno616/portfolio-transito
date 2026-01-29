<?php 

namespace ConvertPdf;

require_once __DIR__ . '/vendor/autoload.php';

include_once __DIR__. '/basepdf.php';

use ConvertPdf\BasePdf;

$imagePath = __DIR__. '/cartao-deficiente/Cartão-Deficiente-A4.png';

class CardDeficiente extends BasePdf {
    
    private $positionRegNumber = [0, 0];
    private $positionExpirationDate = [0, 0];
    private $positionName = [0, 0];

    public function __construct($imagePath, $positionRegNumber, $positionExpirationDate, $positionName) {
        parent::__construct($imagePath);

        $this->positionRegNumber = $positionRegNumber;
        $this->positionExpirationDate = $positionExpirationDate;
        $this->positionName = $positionName;
    }

    public function addRegNumber($regNumber)
    {
        $this->pdf->SetFont('Helvetica', 'B', 22);
        $this->pdf->SetTextColor(255, 0, 0);
        $this->pdf->SetXY($this->positionRegNumber[0], $this->positionRegNumber[1]);
        $this->pdf->Write(35, $regNumber);
    }  

    public function addExpirationDate($expirationDate)
    {
        $this->pdf->SetFont('Helvetica', 'B', 22);
        $this->pdf->SetTextColor(0 ,0,0);
        $this->pdf->SetXY($this->positionExpirationDate[0], $this->positionExpirationDate[1]);
        $this->pdf->Write(35, $expirationDate);
    }

    public function addName($name)
    {
        $this->pdf->SetFont('Helvetica', 'B', 22);
        $this->pdf->SetTextColor(0 ,0,0);
        $this->pdf->SetXY($this->positionName[0], $this->positionName[1]);
        $this->pdf->Write(35, $name);
    }

    public function outputCard($fileName)
    {
        $this->pdf->Output('F', $fileName);
    }

}
