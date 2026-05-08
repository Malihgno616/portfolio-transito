<?php 

namespace ConvertPdf;

require_once __DIR__ . '/vendor/autoload.php';

include_once __DIR__. '/basepdf.php';

use ConvertPdf\BasePdf;

$imagePath = __DIR__. '/cartao-deficiente/Cartão-Deficiente-A4.jpeg';

class CardDeficiente extends BasePdf {
    
    private $positionRegNumber = [0, 0];
    private $positionExpirationDate = [0, 0];
    private $positionIssueDate = [0, 0];
    private $positionName = [0, 0];
    
    public function __construct($imagePath, $positionRegNumber, $positionExpirationDate, $positionIssueDate, $positionName) {
        parent::__construct($imagePath);

        $this->positionRegNumber = $positionRegNumber;
        $this->positionExpirationDate = $positionExpirationDate;
        $this->positionIssueDate = $positionIssueDate;
        $this->positionName = $positionName;
    }

    public function addRegNumber($regNumber)
    {
        $this->pdf->SetFont('Helvetica', 'B', 12);
        $this->pdf->SetTextColor(255, 0, 0);
        $this->pdf->SetXY($this->positionRegNumber[0], $this->positionRegNumber[1]);
        $this->pdf->Write(35, $regNumber);
    }  
    
    public function addExpirationDate($expirationDate)
    {
        $this->pdf->SetFont('Helvetica', 'B', 12);
        $this->pdf->SetTextColor(0 ,0,0);
        $this->pdf->SetXY($this->positionExpirationDate[0], $this->positionExpirationDate[1]);
        $this->pdf->Write(35, $expirationDate);
    }

    public function addIssueDate($issueDate)
    {
        $this->pdf->SetFont('Helvetica', 'B', 12);
        $this->pdf->SetTextColor(0 ,0,0);
        $this->pdf->SetXY($this->positionIssueDate[0], $this->positionIssueDate[1]);
        $this->pdf->Write(35, $issueDate);
    }

    public function addName($name)
    {
        $this->pdf->SetFont('Helvetica', 'B', 12);
        $this->pdf->SetTextColor(0 ,0,0);
        $this->pdf->SetXY($this->positionName[0], $this->positionName[1]);
        $this->pdf->Cell(35, 10, mb_convert_encoding($name, 'ISO-8859-1', 'UTF-8'), 0, 0, 'C');
    }

    public function outputCard($fileName)
    {
        $this->pdf->Output('F', $fileName);
    }

}

// $cardDeficiente = new CardDeficiente(
//     $imagePath,
//     [121, 91], 
//     [84, 100], 
//     [130, 100], 
//     [95, 140]  
// );

// $cardDeficiente->addRegNumber('1234');
// $cardDeficiente->addExpirationDate('12/2025');
// $cardDeficiente->addIssueDate('01/01/2023');
// $cardDeficiente->addName('João Silva');
// $cardDeficiente->outputCard(__DIR__. '/pdf-deficiente/cartao-deficiente-id='. 1 .'.pdf');
