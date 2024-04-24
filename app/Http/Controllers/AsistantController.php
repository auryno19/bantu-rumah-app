<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistant;

class AsistantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        $request->validate([
            'nama' => 'required',
            'umur' => 'required|numeric',
            'gender' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
            'deskripsi' => 'required',
            'foto' => 'mimes:png,jpeg,jpg|max:2048',
        ]);

        $PhotoName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('images/photo-assist/'), $PhotoName);

        $asistant = new Asistant;
        // dd($asistant);
        $asistant->nama = $request->get('nama');
        $asistant->umur = $request->get('umur');
        $asistant->gender = $request->get('gender');
        $asistant->alamat = $request->get('alamat');
        $asistant->keterangan = $request->get('keterangan');
        $asistant->deskripsi = $request->get('deskripsi');
        $asistant->foto = $PhotoName;
        // dd($asistant);

        
        $asistant->save();

        return redirect('/register')->with('success', 'Kategori baru telah ditambahkan');
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
        //
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
