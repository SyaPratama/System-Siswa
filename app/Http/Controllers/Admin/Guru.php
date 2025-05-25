<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru as ModelsGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class Guru extends Controller
{
    public function showList(): View
    {
        $guru = ModelsGuru::all();
        return view("components.admin.content.guru", ['guru' => $guru]);
    }

    public function guruAdd(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'nama' => 'required|min:5',
            'umur' => 'required|numeric',
            'jenkel' => 'required|in:laki-laki,perempuan',
            'nip' => 'required|numeric',
            'mapel' => 'required',
        ]);

        if ($validated->fails()) return redirect()->back()->withErrors($validated)->withInput();

        ModelsGuru::create([
            'nama' => $request->nama,
            'jenkel' => $request->jenkel,
            'nip' => $request->nip,
            'umur' => $request->umur,
            'mapel' => $request->mapel,
        ]);

        return redirect()->back()->with('success', 'Berhasil Membuat Guru');
    }

    public function findGuru(int $id)
    {
        $guru = ModelsGuru::find($id);
        return response()->json($guru, 200, [
            'Content-Type' => "application/json"
        ]);
    }

    public function guruUpdate(Request $request, int $id)
    {
        $validated = Validator::make($request->all(), [
            'nama' => 'required|min:5',
            'umur' => 'required|numeric',
            'jenkel' => 'required|in:laki-laki,perempuan',
            'nip' => 'required|numeric',
            'mapel' => 'required',
        ]);

        if ($validated->fails()) return redirect()->back()->withErrors($validated)->withInput();

        $findGuru = ModelsGuru::find($id);

        $findGuru->update([
            'nama' => $request->nama,
            'jenkel' => $request->jenkel,
            'nip' => $request->nip,
            'umur' => $request->umur,
            'mapel' => $request->mapel,
        ]);


        return redirect()->back()->with('success', 'Berhasil Memperbarui Guru');
    }

    public function guruDelete(int $id)
    {
        ModelsGuru::destroy($id);

        return redirect()->back()->with('success', 'Berhasil Menghapus Guru');
    }
}
