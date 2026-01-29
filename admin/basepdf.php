<?php 

namespace ConvertPdf;

require_once __DIR__ . '/vendor/autoload.php';

use setasign\Fpdi\Fpdi;

class BasePdf {
    protected $imagePath;
    protected $imageInfo;
    protected $widthPx;
    protected $heightPx;
    protected $widthMm;
    protected $heightMm;
    protected $pdf;

    public function __construct($imagePath) {
        $this->imagePath = $imagePath;
        $this->imageInfo = getimagesize($imagePath);
        $this->widthPx = $this->imageInfo[0];
        $this->heightPx = $this->imageInfo[1];
        $this->initializePdf();
    }

    protected function initializePdf() {
        $this->pdf = new Fpdi('P', 'mm', 'A4');
        $this->pdf->SetMargins(0, 0, 0);
        $this->pdf->SetAutoPageBreak(false);
        $this->pdf->AddPage();
        $this->pdf->Image($this->imagePath, 0, 0, 210, 297);
    }

    public function getPdf() {
        return $this->pdf;
    }

    public function getDimensions()
    {
        return [
            'widthPx' => $this->widthPx,
            'heightPx' => $this->heightPx,
            'widthMm' => $this->widthMm,
            'heightMm' => $this->heightMm
        ];
    }

}