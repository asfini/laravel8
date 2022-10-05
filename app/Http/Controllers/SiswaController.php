<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all(); //mengambil semua data dari data siswa
        //$data = $request->session()->all();
        //dd($data); sama dengan var_dump
        return view('siswa.index',[
            'page_title' => "Data Siswa",
            'siswa' => $siswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $siswa = Siswa::all();
        return view('siswa.create',[
            "page_title" => 'Tambah Data',
            //'siswa' => $siswa
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
        // $request->validate([
        //     'nis' => 'required',
        //     'nama' => 'required',
        //     'alamat' => 'required',
        // ]);

        // Siswa::create($request->all());
        
        // return redirect()->route('siswa.index')->with('success','Data Berhasil Di Input');

        $siswa = new Siswa();
        $siswa->nis = $request->input('nis');
        $siswa->nama = $request->input('nama');
        $siswa->alamat = $request->input('alamat');
        
         if($request->hasfile('image'))
         {
            $file = $request->file('image');
            $nama_image = $file->getClientOriginalName();
            $extention = $file->getClientOriginalExtension();
            $filename = time().'_'.$nama_image.'.'.$extention;
            $file->move('uploads/students/', $filename);
            $siswa->image = $filename;
         }

         
        $siswa->save();
        return redirect()->route('siswa.index')->with('success','Data Berhasil Di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        return view('siswa.show',compact('siswa'),[
            "page_title" => 'Lihat Data',
            'siswa' => $siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
         return view('siswa.edit',compact('siswa'),[
            "page_title" => 'Edit Data'
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        // $request->validate([
        //     'nis' => 'required',
        //     'nama' => 'required',
        //     'alamat' => 'required'
        // ]
        // );
        // $siswa->update($request->all());

        // return redirect()->route('siswa.index')->with('succes','Siswa Berhasil di Update');

         $siswa = Siswa::find($siswa);
         $siswa->nis = $request->input('nis');
         $siswa->nama = $request->input('nama');
         $siswa->alamat = $request->input('alamat');

         if($request->hasfile('image'))
         {
            $folder = 'uploads/students/'.$siswa->image;
            if(File::exists($folder))
            {
            File::delete($folder);
            }
            $file = $request->file('image');
            $nama_image = $request->file('image')->getClientOriginalName();
            $extention = $file->getClientOriginalExtension();
            $filename = time().'_'.$nama_image.'.'.$extention;
            $file->move('uploads/students/', $filename);
            $siswa->image = $filename;
         }

         $siswa->update();
         return redirect()->route('siswa.index')->with('succes','Siswa Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success','Siswa Berhasil di Hapus');
    }
}
