<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parameter;

class ParameterController extends Controller
{
    public function index()
    {
        $parameters = Parameter::all()->last();
        
        return view('parameters', [
            'parameters' => $parameters
        ]);
    }

    public function save(Request $request)
    {
        Parameter::create([
            'classes_quantity' => $request->classes_quantity,
            'promotion_percentage' => $request->promotion_percentage,
            'regular_percentage' => $request->regular_percentage
        ]);

        return redirect()->route('parameters.index')->withSuccess('Parametros guardados con éxito.');
    }
}
