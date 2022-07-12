<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class FillPDFController extends Controller
{
    public function process(Request $request){
        // $nama = $request->post('nama');
        $validated = $request->validate([
            'nama' => 'required'
        ]);
        $nama = $validated['nama'];
        $outputFile = public_path() . "\dcc.pdf";
        // dd($outputFile);
        $this->fillPDF(public_path() . '/master/dcc.pdf', $outputFile, $nama);

        return response()->file($outputFile);
    }

    public function fillPDF($file, $outputFile, $nama){
        $fpdi = new FPDI;
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'],[$size['width'], $size['height']]);
        $fpdi->useTemplate($template);
        $top = 160;
        $right = 270;
        $fpdi->SetFont('helvetica',"",40);
        $fpdi->SetTextColor(25,26,26);
        // $fpdi->Text(150, 105, $nama);
        $fpdi->Cell($right,$top,$nama,0,1,"C");

        return $fpdi->Output($outputFile, 'F');
    }

}
