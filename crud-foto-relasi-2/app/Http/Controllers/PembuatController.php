<?php

namespace App\Http\Controllers;

use App\Pembuat;
use Illuminate\Http\Request;
use File;
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
    public function edit($id)
    {
        $items = Pembuat::find($id);
        return view("pembuat.edit",['items'=>$items]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembuat  $pembuat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'  => 'required|min:5',
            'foto'  => 'mimes:jpg,jpeg,png'
         ]);

        $pembuat = Pembuat::find($id);
        $pembuat->name = $request->input('name');

        if($request->hasFile('foto')){
            $path = 'public/Image/'.$pembuat->foto;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('public/Image/',$filename);
            $pembuat->foto =$filename;
        }
        $pembuat->save();
        return redirect()->route('pembuat.index');
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
