<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa as ModelsSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class Siswa extends Controller
{

    public function showList(): View
    {
        $siswa = ModelsSiswa::all();
        $user = Auth::user();

        return view("components.admin.content.siswa",[
            'siswa' => $siswa,
            "username" => $user->name,
            "email" => $user->email,
        ]);
    }

    public function siswaAdd(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'nama' => 'required|min:5',
            'umur' => 'required|numeric',
            'jenkel' => 'required|in:laki-laki,perempuan',
            'kelas' => 'required',
        ]);

        if ($validated->fails()) return redirect()->back()->withErrors($validated)->withInput();

        ModelsSiswa::create([
            'nama' => $request->nama,
            'jenkel' => $request->jenkel,
            'kelas' => $request->kelas,
            'umur' => $request->umur,
        ]);

         return redirect()->back()->with('success','Berhasil Membuat Siswa');
    }

    public function findSiswa(int $id)
    {
        $siswa = ModelsSiswa::find($id);
        return response()->json($siswa,200,[
            'Content-Type' => "application/json"
        ]);
    }

    public function siswaUpdate(Request $request, int $id)
    {
        $validated = Validator::make($request->all(), [
            'nama' => 'required|min:5',
            'umur' => 'required|numeric',
            'jenkel' => 'required|in:laki-laki,perempuan',
            'kelas' => 'required',
        ]);

        if ($validated->fails()) return redirect()->back()->withErrors($validated)->withInput();

        $findSiswa = ModelsSiswa::find($id);

        $findSiswa->update([
            'nama'=> $request->nama,
            'jenkel'=> $request->jenkel,
            'kelas'=> $request->kelas,
            'umur'=> $request->umur,
        ]);

         return redirect()->back()->with('success','Berhasil Memperbarui Siswa');
    }

    public function siswaDelete(int $id){
        ModelsSiswa::destroy($id);

         return redirect()->back()->with('success','Berhasil Menghapus Siswa');
    }
}
