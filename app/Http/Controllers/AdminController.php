<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    

    public function index()
    {
        $data = DB::table('transaksis')->paginate(5); 
        return view('Admin.index', compact('data'));
    }
}
