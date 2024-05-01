<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistant;

class IndexController extends Controller
{
    public function index()
    {
        $asistants = Asistant::get();

         return view('index', compact('asistants'));
    }


}
