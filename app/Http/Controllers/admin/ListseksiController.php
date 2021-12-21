<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Model\admin\Listseksi;
use App\Model\admin\Bidang;

class ListseksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
        $listseksi = Listseksi::All();
        return response()->json($listseksi);
    }

    public function viewData(Request $request)
    {
        $listseksi=Listseksi::find($idData);
        return response()->json($listseksi);
    }

    public function index()
    {
        $bidang = Bidang::get();
        $listseksi=Listseksi::get();
        return view('admin.seksi.listseksi', compact('bidang','listseksi'));
        //dd($listseksi);
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
        Listseksi::create([
            'kode_seksi' => $request->kode_seksi,
            'seksi' => $request->seksi,
            'singkatan' => $request->singkatan,
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
        $listseksi = Listseksi::find($id);
        return response()->json($listseksi);
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
        Listseksi::whereId($request->idData)
            ->update([
                'kode_seksi' => $request->kode_seksi,
                'seksi' => $request->seksi,
                'singkatan' => $request->singkatan,
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
        Listseksi::whereId($request->idData)->delete();
        return response()->json('ok');
    }
}

