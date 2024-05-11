<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistant;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class AsistantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistants = Asistant::paginate(8);
        $iteration = $asistants->firstItem();
        return view('admin.asistant.index', compact('asistants', 'iteration'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.asistant.create');
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
            'telepon' => 'required|numeric',
            'keterangan' => 'required',
            'deskripsi' => 'required',
            'foto' => 'mimes:png,jpeg,jpg|max:2048',
        ]);


        $asistant = new Asistant;
        // dd($asistant);
        $asistant->nama = $request->get('nama');
        $asistant->umur = $request->get('umur');
        $asistant->gender = $request->get('gender');
        $asistant->alamat = $request->get('alamat');
        $asistant->telepon = $request->get('telepon');
        $asistant->keterangan = $request->get('keterangan');
        $asistant->deskripsi = $request->get('deskripsi');

        if($request->foto){
            $PhotoName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images/photo-assist/'), $PhotoName);
            $asistant->foto = $PhotoName;
        }
        // dd($asistant)
        
        $asistant->save();

        return redirect('/admin/asistant')->with('success', 'Data baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asistant = Asistant::find($id);

        return view('admin.asistant.show', compact('asistant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

        // dd($request);
        $asistant = Asistant::find($id);

        if ($request->get('nama')) {
            $request->validate([
                'nama' => 'required',
            ]);
            $asistant->nama = $request->get('nama');
            $asistant->save();
        }

        if ($request->get('umur')) {
            $request->validate([
                'umur' => 'required|numeric',
            ]);
            $asistant->umur = $request->get('umur');
            $asistant->save();
        }

        if ($request->get('gender')) {
            $request->validate([
                'gender' => 'required',
            ]);

            $asistant->gender = $request->get('gender');
            $asistant->save();
        }

        if ($request->get('telepon')) {
            $request->validate([
                'telepon' => 'required|numeric',
            ]);

            $asistant->telepon = $request->get('telepon');
            $asistant->save();
        }

        if ($request->get('alamat')) {

            $request->validate([
                'alamat' => 'required',
            ]);
            $asistant->alamat = $request->get('alamat');
            $asistant->save();
        }

        if ($request->get('keterangan')) {
            $request->validate([
                'keterangan' => 'required',
            ]);

            $asistant->keterangan = $request->get('keterangan');
            $asistant->save();
        }

        if ($request->get('deskripsi')) {
            $request->validate([
                'deskripsi' => 'required',
            ]);        

            $asistant->deskripsi = $request->get('deskripsi');
            $asistant->save();
        }

        return redirect('/admin/asistant/' . $asistant->id )->with('success', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asistant = Asistant::findOrFail($id);

        if(isset($asistant->foto)){
            $path = "images/photo-assist/";
            File::delete($path . $asistant->foto);
        }

        $asistant->delete();

        return redirect('/admin/asistant/')->with('success', 'Data berhasil dihapus');
    }
}
