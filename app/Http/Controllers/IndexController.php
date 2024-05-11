<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistant;

class IndexController extends Controller
{
    public function index()
    {
        $asistants = Asistant::paginate(5);

         return view('index', compact('asistants'));
    }
    public function profile($id)
    {
        $asistant = Asistant::find($id);

        return view('profile', compact('asistant'));
    }

    public function register(){
        return view('register');
    }

}
