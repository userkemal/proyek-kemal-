<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->latest()->first();
        return view('dashboard_user', compact('pendaftaran'));
    }
}