<?php

namespace App\Http\Controllers;

use App\Pembuat;
use Illuminate\Http\Request;

class PembuatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Pembuat::all();
        return view('pembuat.index',['item'=>$item]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembuat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $this->validate($request,[
        'name'  => 'required|min:5',
        'foto'  => 'mimes:jpg,jpeg,png'
     ]);

     //apload file 
    $data = new Pembuat;
    $data->name = $request->name;
    if($request->file('foto')){
        $file = $request->file('foto');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('public/Image'), $filename);
        $data['foto']= $filename;
    }
    $data->save();

     return redirect()->route('pembuat.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembuat  $pembuat
     * @return \Illuminate\Http\Response
     */
    public function show(Pembuat $pembuat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembuat  $pembuat
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembuat $pembuat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembuat  $pembuat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembuat $pembuat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembuat  $pembuat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembuat $pembuat)
    {
        $item = Pembuat::find($pembuat->id);
        unlink("public/Image/".$item->foto);
        Pembuat::where("id",$item->id)->delete();
        return redirect()->route('pembuat.index');
    }
}
