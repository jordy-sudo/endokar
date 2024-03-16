<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\Provincia;
use App\Models\Ciudad;
use App\Models\CategoriaIndustrial;
use App\Models\SubcategoriaIndustrial;
use App\Models\ElementoIndustrial;
use App\Models\Bank;
use App\Models\Provider;
use App\Models\ProviderLaboral;
use App\Models\ProviderBankRecord;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use RealRashid\SweetAlert\Facades\Alert;


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
                'certificado_ruc' => 'required|file|mimes:pdf,png,jpg,jpeg|max:10240'
            ]);

            if ($request->hasFile('certificado_ruc')) {
                $rutaCertificado = $this->storeFile($request->file('certificado_ruc'), 'certificados/ruc');
            }

            $approvedFields = $request->only([
                'ruc', 'telefono', 'provincia', 'direccion', 'sitio_web', 'industria', 'observaciones',
                'razon_social', 'celular', 'ciudad', 'geolocalizacion', 'email_retenciones', 'nombre_comercial'
            ]);
            $approvedFields['certificado_ruc'] = $rutaCertificado;

            session(['approvedFieldsStep1' => $approvedFields]);

            
            return redirect()->route('index.step2');
        } catch (ValidationException $e) {
            // Si hay errores de validación, redirige de nuevo a la página anterior con los errores
            // $exceptRuc = $request->except(['ruc']);
            // dd($exceptRuc);
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function backStep1()
    {
        $step1Data = session('approvedFieldsStep1');
        if (isset($step1Data['certificado_ruc'])) {
            $filePath = str_replace('/storage', 'public', $step1Data['certificado_ruc']);
            Storage::delete($filePath);
        }
        return redirect()->route('index.step1')->with('step1Data', $step1Data);
    }

    public function indexStep2()
    {
        return view('guest.registerProviderStep2');
    }

    public function processStep2(Request $request)
    {
        try {
            $request->validate([
                'vendedor' => 'required|string|max:60', 
                'vendedor_reemplazo' => 'nullable|string|max:60', 
                'email_ventas' => 'required|email',
                'horario_atencion' => 'required|string|max:30',
                'telefono_vendedor' => [
                    'required',
                    'numeric',
                    'digits:9',
                ], 
                'extension' => 'nullable|string|max:10',
                'celular' => [
                    'required',
                    'regex:/^09\d{8}$/',
                    'numeric',
                    'digits:10',
                ], 
                'servicio_entrega'=>'required|string|max:60',
            ], [
                'vendedor.required' => 'El campo vendedor es obligatorio.',
                'vendedor.string' => 'El campo vendedor debe ser una cadena de caracteres.',
                'vendedor.max' => 'El campo vendedor no puede tener más de :max caracteres.',
                'vendedor_reemplazo.max' => 'El campo vendedor reemplazo no puede tener más de :max caracteres.',
                'email_ventas.required' => 'El campo email ventas es obligatorio.',
                'email_ventas.email' => 'El campo email ventas debe ser una dirección de correo electrónico válida.',
                'horario_atencion.required' => 'El campo horario de atención es obligatorio.',
                'horario_atencion.string' => 'El campo horario de atención debe ser una cadena de caracteres.',
                'horario_atencion.max' => 'El campo horario de atención no puede tener más de :max caracteres.',
                'telefono_vendedor.required' => 'El campo teléfono vendedor es obligatorio.',
                'telefono_vendedor.numeric' => 'El campo teléfono vendedor debe ser numérico.',
                'telefono_vendedor.digits' => 'El campo teléfono vendedor debe tener exactamente :digits dígitos.',
                'extension.max' => 'El campo extensión no puede tener más de :max caracteres.',
                'celular.required' => 'El campo celular es obligatorio.',
                'celular.regex' => 'El formato del campo celular no es válido.',
                'celular.numeric' => 'El campo celular debe ser numérico.',
                'celular.digits' => 'El campo celular debe tener exactamente :digits dígitos.',
            ]);

            $approvedFields = $request->only([
                'vendedor',
                'vendedor_reemplazo',
                'email_ventas',
                'horario_atencion',
                'telefono_vendedor',
                'extension',
                'celular',
                'servicio_entrega'
            ]);

            session(['approvedFieldsStep2' => $approvedFields]);
            
            return redirect()->route('index.step3');
        } catch (ValidationException $e) {
            // Si hay errores de validación, redirige de nuevo a la página anterior con los errores
            // $exceptRuc = $request->except(['ruc']);
            // dd($exceptRuc);
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function backStep2()
    {
        $step2Data = session('approvedFieldsStep2');
        return redirect()->route('index.step2')->with('step2Data', $step2Data);
    }



    public function indexStep3()
    {
        $bancos = Bank::all();
        return view('guest.registerProviderStep3', compact('bancos'));
    }

    public function processStep3(Request $request)
    {
        
        try {
            $request->validate([
                'banco' => 'required|string|max:15', 
                'tipo_cuenta' => 'required|string|max:10', 
                'numero_cuenta_bancaria' => 'required|string|max:18',
                'certificado_bancario' => 'required|file|mimes:pdf,png,jpg,jpeg|max:10240', // 10 MB máximo
            ], [
                'banco.required' => 'El campo Banco es obligatorio.',
                'banco.string' => 'El campo Banco debe ser una cadena de caracteres.',
                'banco.max' => 'El campo Banco no puede tener más de :max caracteres.',
                'tipo_cuenta.required' => 'El campo Tipo es obligatorio.',
                'tipo_cuenta.string' => 'El campo Tipo debe ser una cadena de caracteres.',
                'tipo_cuenta.max' => 'El campo Tipo no puede tener más de :max caracteres.',
                'numero_cuenta_bancaria.required' => 'El campo No. Cta. Bancaria es obligatorio.',
                'numero_cuenta_bancaria.string' => 'El campo No. Cta. Bancaria debe ser una cadena de caracteres.',
                'numero_cuenta_bancaria.max' => 'El campo No. Cta. Bancaria no puede tener más de :max caracteres.',
                'certificado_bancario.file' => 'El campo Certificado Bancario debe ser un archivo.',
                'certificado_bancario.mimes' => 'El campo Certificado Bancario debe ser de tipo: pdf, png, jpg o jpeg.',
                'certificado_bancario.max' => 'El tamaño máximo permitido para el Certificado Bancario es de :max kilobytes.',
            ]);

            $approvedFields = $request->only([
                'banco', 'tipo_cuenta', 'numero_cuenta_bancaria',
            ]);

             // Obtener los datos de la sesión
            $approvedFieldsStep1 = session('approvedFieldsStep1');
            $approvedFieldsStep2 = session('approvedFieldsStep2');

            
            if ($this->saveInformationProvider($approvedFieldsStep1, $approvedFieldsStep2, $request->all())) {
                // Redirigir a la página de éxito
                $registerProvider = array_merge(
                    session('approvedFieldsStep1'),
                    session('approvedFieldsStep2'),
                    $approvedFields 
                );
                Alert::success('¡Listo!', 'Se ha registrado el proveedor exitosamente. ¡Gracias por su registro!');
                return redirect()->route('index.step1')->with([
                    'registerProvider' => $registerProvider
                ]);
            } else {
                Alert::error('¡Oops!', 'Hubo un error al registrar el proveedor. Por favor, inténtalo de nuevo más tarde.');
                return redirect()->route('index.step1');
            }
        } catch (ValidationException $e) {
            // Si hay errores de validación, redirige de nuevo a la página anterior con los errores
            // $exceptRuc = $request->except(['ruc']);
            // dd($exceptRuc);
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }



    protected function getCiudadesByProvincia($provinciaId)
    {
        // Obtener las ciudades asociadas a la provincia
        $ciudades = Ciudad::where('provincia_id', $provinciaId)->pluck('nombre', 'id');
        
        return response()->json($ciudades);
    }

    protected function validationCI($cedula) {
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

    protected function storeFile($archivo, $nombreDirectorio)
    {
        $nombreArchivo = uniqid() . '_' . $archivo->getClientOriginalName();
        
        $rutaArchivo = $archivo->storeAs($nombreDirectorio, $nombreArchivo, 'public');
        
        return '/storage/' . $rutaArchivo;
    }

    protected function saveInformationProvider($approvedFieldsStep1, $approvedFieldsStep2, $approvedFieldsStep3)
    {
        try {
            // Crear y guardar el proveedor en la tabla "providers"
            $provider = new Provider();
            $provider->fill($approvedFieldsStep1);
            $provider->save();

            // Crear y guardar los datos laborales del proveedor en la tabla "provider_laborals"
            $providerLaboral = new ProviderLaboral();
            $providerLaboral->fill($approvedFieldsStep2);
            $providerLaboral->provider_id = $provider->id; // Asociar con el proveedor recién creado
            $providerLaboral->save();

            // Crear y guardar los registros bancarios en la tabla "provider_bank_records"
            $providerBankRecord = new ProviderBankRecord();
            $providerBankRecord->fill($approvedFieldsStep3);
            $providerBankRecord->provider_id = $provider->id; // Asociar con el proveedor recién creado
            $providerBankRecord->bank_id = $approvedFieldsStep3['banco']; // Asociar con el banco elegido
            // Guardar el archivo certificado bancario
            if (isset($approvedFieldsStep3['certificado_bancario'])) {
                $rutaCertificado = $this->storeFile($approvedFieldsStep3['certificado_bancario'], 'certificados');
                $providerBankRecord->certificado_bancario = $rutaCertificado;
            }
            $providerBankRecord->save();

            return true;
        } catch (\Exception $e) {
            dd($e);
            return false; 
        }
    }

}
