<?php

namespace App\Http\Controllers;

use App\Models\Asistant;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $asistants = Asistant::paginate(8);
        $iteration = $asistants->firstItem();
         return view('admin.index', compact('asistants', 'iteration'));
    }

}
