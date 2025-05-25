<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class Dashboard extends Controller
{
    public function index(): View
    {
        $total_siswa = Siswa::count();
        $total_guru = Guru::count();

        $user = Auth::user();
        return view("components.admin.content.dashboard", [
            "total_siswa" => $total_siswa,
            "total_guru" => $total_guru,
            "username" => $user->name,
            "email" => $user->email,
        ]);
    }
}
