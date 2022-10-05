<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all(); //mengambil semua data dari data siswa

        return view('guru.index',[
        'page_title' => "Data Guru",
        'guru' => $guru
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create',[
        "page_title" => 'Tambah Data',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'nip' => 'required',
        'nama' => 'required',
        'alamat' => 'required',
        ]);
        Guru::create($request->all());

        return redirect()->route('guru.index')->with('success','Data Berhasil Di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        return view('guru.show',compact('guru'),[
        "page_title" => 'Lihat Data',
        'guru' => $guru
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        return view('guru.edit',compact('guru'),[
        "page_title" => 'Edit Data',
        'guru' => $guru
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
        'nip'=>'required',
        'nama'=>'required',
        'alamat' => 'required'
        ]
        );
        $guru->update($request->all());
        return redirect()->route('guru.index')->with('success','Guru Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('success','Guru Berhasil di Hapus');
    }
}
