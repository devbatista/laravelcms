<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Todas as actions serão baseadas na autenticação
    }

    public function index()
    {
        return view('admin.home');
    }
}
