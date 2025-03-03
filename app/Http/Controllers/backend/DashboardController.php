<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  // Pastikan untuk import Controller

class DashboardController extends Controller
{
    public function index(){
        return view('backend.dashboard');
    }
}
