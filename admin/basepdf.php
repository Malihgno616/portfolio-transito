<?php 

namespace ConvertPdf;

require_once __DIR__ . '/vendor/autoload.php';

use setasign\Fpdi\Fpdi;

class BasePdf {
    protected $imagePath;
    protected $imageInfo;
    protected $widthPx;
    protected $heightPx;
    protected $dpi = 72;
    protected $mmPerInch = 25.4;
    protected $widthMm;
    protected $heightMm;
    protected $pdf;

    public function __construct($imagePath) {
        $this->imagePath = $imagePath;
        $this->imageInfo = getimagesize($imagePath);
        $this->widthPx = $this->imageInfo[0];
        $this->heightPx = $this->imageInfo[1];
        $this->calculateDimensions();
        $this->initializePdf();
    }

     protected function calculateDimensions() {
        $this->widthMm = ceil($this->widthPx * $this->mmPerInch / $this->dpi);
        $this->heightMm = ceil($this->heightPx * $this->mmPerInch / $this->dpi);
    }

    protected function initializePdf() {
        $this->pdf = new Fpdi('L', 'mm', array($this->widthMm, $this->heightMm));
        $this->pdf->SetMargins(0, 0, 0);
        $this->pdf->SetAutoPageBreak(false);
        $this->pdf->AddPage();
        $this->pdf->Image($this->imagePath, 0, 0, $this->widthMm, $this->heightMm);
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