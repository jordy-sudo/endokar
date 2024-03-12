<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RegisterProviderController extends Controller
{
    public function index()
    {
        return view('guest.registerProvider');
    }

    public function processStep1(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'email'=> 'required|email|max:255',
                'direccion' => 'required|string|max:255',
                'ciudad' => 'required|numeric',
            ]);    
            return  view('guest.registerProviderStep2');
        } catch (ValidationException $e) {
            // Si hay errores de validación, redirige de nuevo a la página anterior con los errores
            // dd($e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function indexStep2()
    {
        return view('guest.registerProviderStep2');
    }


    public function indexStep3()
    {
        return view('guest.registerProviderStep3');
    }
}
