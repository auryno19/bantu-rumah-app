<?php

namespace App\Http\Controllers;

use App\Models\Asistant;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $asistants = Asistant::get();

         return view('admin.index', compact('asistants'));
    }

}
