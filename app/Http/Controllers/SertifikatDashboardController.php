<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;

class SertifikatDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/index', [
            // 'sertifikats' => Sertifikat::latest()->paginate(7)->withQueryString()
            'sertifikats' => Sertifikat::OrderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin/show', [
            'sertifikat' => Sertifikat::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/edit', [
            'sertifikat' => Sertifikat::find($id),
            'jabatan' => [
                'Ketua Himpunan',
                'Wakil Ketua Himpunan',
                'Sekretaris',
                'Bendahara',
                'Ketua Departemen PSDM',
                'Wakil Ketua Departemen PSDM',
                'Ketua Departemen Humas',
                'Wakil Ketua Departemen Humas',
                'Ketua Departemen Kesma',
                'Wakil Ketua Departemen Kesma',
                'Ketua Departemen Minat-Bakat',
                'Wakil Ketua Departemen Minat-Bakat',
                'Ketua Departemen Kominfo',
                'Wakil Ketua Departemen Kominfo']
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
