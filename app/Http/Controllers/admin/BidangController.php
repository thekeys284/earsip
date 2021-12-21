<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\admin\Bidang;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
        $p = Bidang::All();
        return response()->json($p);
    }
    public function index()
    {
        return view('admin.bidang.index');
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
        Bidang::create([
            'bidang' => $request->namaBidang,
            'kode_bidang' => $request->kodeBidang, 
            'email' => $request->email,
            'alternatif_email' => $request->alternatif_email,
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
        $p = Bidang::find($id);
        return response()->json($p);
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
        Bidang::whereId($request->idData)
            ->update([
                'bidang'  => $request->namaBidang,
                'kode_bidang'  => $request->kodeBidang,
                'email'  => $request->email,
                'alternatif_email'  => $request->alternatif_email,
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
        Bidang::whereId($request->idData)->delete();
        return response()->json('ok');
    }
}