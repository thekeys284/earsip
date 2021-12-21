<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\admin\Satuankerja;

class SatuankerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
        $satker = Satuankerja::All();
        return response()->json($satker);
    }

    public function viewData(Request $request)
    {
        $satker=Satuankerja::find($idData);
        return response()->json($satker);
    }

    public function index()
    {
        return view('admin.satuan_kerja.index');
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
        Satuankerja::create([
            'kode_satker' => $request->kodeSatker,
            'nama_satker' => $request->namaSatker,
            'email' => $request->email,
            'alternatif_email' => $request->alternatif_email,
            'no_telepon' => $request->noTelp,
            'alamat_kantor' => $request->alamatKantor,
        ]);
        return response()->json('ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $satker = Satuankerja::find($id);
        return response()->json($satker);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Satuankerja::whereId($request->idData)
            ->update([
                'kode_satker' => $request->kodeSatker,
                'nama_satker' => $request->namaSatker,
                'email' => $request->email,
                'alternatif_email' => $request->alternatif_email,
                'no_telepon' => $request->noTelp,
                'alamat_kantor' => $request->alamatKantor,
            ]);
        return response()->json('ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Satuankerja::whereId($request->idData)->delete();
        return response()->json('ok');
    }
}
