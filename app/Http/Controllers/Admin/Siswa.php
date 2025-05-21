<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Siswa extends Controller
{
    public function index(): View
    {
        return view("components.admin.content.dashboard");
    }

    public function showList(): View
    {
        return view("components.admin.content.siswa");
    }
}
