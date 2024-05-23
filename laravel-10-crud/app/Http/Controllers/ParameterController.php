<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parameter;

class ParameterController extends Controller
{
    public function index()
    {
        $parameters = Parameter::all();
        dd($parameters);
        
        return view('parameters', [
            'parameters' => $parameters
        ]);
    }
}
