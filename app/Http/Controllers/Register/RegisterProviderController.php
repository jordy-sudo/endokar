<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\Provincia;
use App\Models\Ciudad;
use App\Models\CategoriaIndustrial;
use App\Models\SubcategoriaIndustrial;
use App\Models\ElementoIndustrial;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;



class RegisterProviderController extends Controller
{
    public function index()
    {
        $provincias = Provincia::all();
        $categorias = CategoriaIndustrial::all();
        $subcategorias = SubcategoriaIndustrial::all();
        $elementos = ElementoIndustrial::all();
        return view('guest.registerProvider',compact('provincias','categorias', 'subcategorias', 'elementos'));
    }

    public function processStep1(Request $request)
    {
        
        try {
            if (!$this->validationCI($request->ruc)) {
                throw ValidationException::withMessages(['ruc' => 'El RUC proporcionado no es válido.']);
            }
            $request->validate([
                'ruc' => 'required|string|max:13', 
                'telefono' => 'required|string|max:10', 
                'provincia' => 'required|numeric',
                'direccion' => 'required|string|max:60',
                'sitio_web' => 'nullable|url|max:100', 
                'industria' => 'nullable|string',
                'observaciones' => 'nullable|string|max:100',
                'razon_social' => 'required|string|max:38',
                'celular' => 'required|string|max:10', 
                'ciudad' => 'required|numeric',
                'geolocalizacion' => 'required|string|max:60', 
                'email_retenciones' => 'required|email|max:241', 
                'nombre_comercial' => 'required|string|max:60', 
            ]);


            return  view('guest.registerProviderStep2');
        } catch (ValidationException $e) {
            // Si hay errores de validación, redirige de nuevo a la página anterior con los errores
            $exceptRuc = $request->except(['ruc']);
            dd($exceptRuc);
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

    public function getCiudadesByProvincia($provinciaId)
    {
        // Obtener las ciudades asociadas a la provincia
        $ciudades = Ciudad::where('provincia_id', $provinciaId)->pluck('nombre', 'id');
        
        return response()->json($ciudades);
    }

    private function validationCI($cedula) {
        $cedula = substr($cedula, 0, 10);
        $cedula = preg_replace("/[^0-9]/", "", $cedula);
    
        if (strlen($cedula) !== 10) {
            return false;
        }
    
        $digitoVerificador = substr($cedula, -1);
    
        $coeficientes = [2, 1, 2, 1, 2, 1, 2, 1, 2];
        $suma = 0;
        foreach ($coeficientes as $i => $coeficiente) {
            $producto = $cedula[$i] * $coeficiente;
            if ($producto >= 10) {
                $producto -= 9;
            }
            $suma += $producto;
        }
        $digitoEsperado = 10 - ($suma % 10);
        if ($digitoEsperado === 10) {
            $digitoEsperado = 0;
        }
    
        return $digitoEsperado == $digitoVerificador;
    }
}
