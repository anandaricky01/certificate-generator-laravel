<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use App\Models\Sertifikat;

class FillPDFController extends Controller
{
    public function process(Request $request){

        // validasi input nama dan nim
        $validated = $request->validate([
            'nama' => 'required',
            'nim' => 'required|min:15'
        ]);

        $validated['jabatan'] = $request->jabatan;

        $sertifikat = new Sertifikat;

        // set output file 
        $outputFileNama = public_path() . "/dcc.pdf";
        $outputFileNomor = public_path() . "/sertif/sertifikat staff tetap.pdf";
        $outputFileJabatan = public_path() . "/sertif/Sertifikat Staff Tetap.pdf";

        if ($sertifikat->where('nim','=',$validated['nim'])->count() == 1) {
            $sertif = $sertifikat->where('nim','=',$validated['nim'])->get()[0];
            $nama = $sertif->nama;
            $nomor = $sertif->nomor;
            $jabatan = $sertif->jabatan;
            $this->fillPDFNama(public_path() . '/master/dcc.pdf', $outputFileNama, $nama);
            $this->fillPDFNomor(public_path() . '/dcc.pdf', $outputFileNomor, $nomor);
            $this->fillPDFJabatan(public_path() . "/sertif/sertifikat staff tetap.pdf", $outputFileJabatan, $jabatan);

            return response()->file($outputFileJabatan);
        } 
        else {

            if($validated['jabatan'] != NULL){
                if ($sertifikat->where('jabatan','=',$validated['jabatan'])->count() == 1) {
                    $ada = $sertifikat->where('jabatan','=',$validated['jabatan'])->get()[0];
                    $peringatan = 'jabatan sudah ada!<br>' . '<b>' . $ada->nama . ' - ' . $ada->jabatan . '</b>';
                    return redirect('/')->with('danger', $peringatan);
                } 
            } 

            if(Sertifikat::count() < 1){
                $nomor = 511;
            } else {
                $nomor = Sertifikat::latest()->get()[0]->nomor;
                $nomor = $nomor + 1;
            }
        }

        $validated['nomor'] = $nomor;
        $sertifikat->create($validated);
        $nama = $validated['nama'];
        $this->fillPDFNama(public_path() . '/master/dcc.pdf', $outputFileNama, $nama);
        $this->fillPDFNomor(public_path() . '/dcc.pdf', $outputFileNomor, $nomor);
        $this->fillPDFJabatan(public_path() . "/sertif/sertifikat staff tetap.pdf", $outputFileJabatan, $validated['jabatan']);
        
        return response()->file($outputFileJabatan);
    }

    public function fillPDFNama($file, $outputFileNama, $nama){
        $fpdi = new FPDI;
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'],[$size['width'], $size['height']]);
        $fpdi->useTemplate($template);
        $top = 150;
        $right = 270;
        $fpdi->SetFont('helvetica',"",40);
        $fpdi->SetTextColor(25,26,26);
        $fpdi->Cell($right,$top,$nama,0,1,"C");

        return $fpdi->Output($outputFileNama, 'F');
    }

    public function fillPDFNomor($file, $outputFileNomor, $nomor){
        $fpdi1 = new FPDI;
        $fpdi1->setSourceFile($file);
        $template = $fpdi1->importPage(1);
        $size = $fpdi1->getTemplateSize($template);
        $fpdi1->AddPage($size['orientation'],[$size['width'], $size['height']]);
        $fpdi1->useTemplate($template);
        $top = 92;
        $right = 213;
        $fpdi1->SetFont('helvetica',"b",13);
        $fpdi1->SetTextColor(25,26,26);
        $fpdi1->Cell($right,$top,$nomor,0,1,"C");

        return $fpdi1->Output($outputFileNomor, 'F');
    }

    public function fillPDFJabatan($file, $outputFileJabatan, $jabatan = null){
        $fpdi2 = new FPDI;
        $fpdi2->setSourceFile($file);
        $template = $fpdi2->importPage(1);
        $size = $fpdi2->getTemplateSize($template);
        $fpdi2->AddPage($size['orientation'],[$size['width'], $size['height']]);
        $fpdi2->useTemplate($template);
        $top = 180;
        $right = 270;
        $fpdi2->SetFont('helvetica',"b",17);
        $fpdi2->SetTextColor(25,26,26);
        if($jabatan == null){
            $jabatan = 'Sebagai Anggota Staff Tetap';
        } else {
            $jabatan = 'Sebagai ' . $jabatan;
        }

        $fpdi2->Cell($right,$top,$jabatan,0,1,"C");

        return $fpdi2->Output($outputFileJabatan, 'F');
    }

}
