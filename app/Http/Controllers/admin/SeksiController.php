<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\admin\Seksi;

class SeksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
        $seksi = Seksi::All();
        return response()->json($seksi);
    }

    public function viewData(Request $request)
    {
        $seksi=Seksi::find($idData);
        return response()->json($seksi);
    }

    public function index()
    {
        return view('admin.seksi.index');
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
        Seksi::create([
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
        $seksi = Seksi::find($id);
        return response()->json($seksi);
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
        Seksi::whereId($request->idData)
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
        Seksi::whereId($request->idData)->delete();
        return response()->json('ok');
    }
}

