<?php 

namespace ConvertPdf;

require_once __DIR__ . '/vendor/autoload.php';

include_once __DIR__. '/basepdf.php';

use ConvertPdf\BasePdf;

$imagePath = __DIR__. '/cartao-idoso/Cartão-Idoso-A4.png';

$imageInfo = getimagesize($imagePath);

$widthPx = $imageInfo[0];

$heightPx = $imageInfo[1];

class CardIdoso extends BasePdf {
    
    private $positionRegNumber = [0, 0];
    private $positionIssueDate = [0, 0];
    private $positionName = [0, 0];

    public function __construct($imagePath, $positionRegNumber, $positionIssueDate, $positionName) {
        parent::__construct($imagePath);

        $this->positionRegNumber = $positionRegNumber;
        $this->positionIssueDate = $positionIssueDate;
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
        $this->pdf->SetXY($this->positionIssueDate[0], $this->positionIssueDate[1]);
        $this->pdf->Write(35, $expirationDate);
    } 

    public function addName($name)
    {
        $this->pdf->SetFont('Helvetica', 'B', 22);
        $this->pdf->SetTextColor(0 ,0,0);
        $this->pdf->SetXY($this->positionName[0], $this->positionName[1]);
        $this->pdf->Write(35, $name);
    }
      
    public function generate($outputPath)
    {
        $this->pdf->Output('F', $outputPath);
    }    
}

