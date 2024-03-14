@extends('layouts.guest')

@section('title', 'Registro de Proveedores')
@vite('resources/js/providersStep2.js')
@section('content')
    <!-- component -->

    <div class="min-h-screen flex justify-center bg-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
        style="background-image: url(/bg-providers.avif);">
        <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
        <div class="max-w-3xl w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
            <h1 class="text-3xl font-semibold text-gray-800">Registro de Proveedor</h1>
            <h2 class="text-xl font-semibold text-gray-600">Datos Laborales</h2>
   
            <form method="post" action="{{ route('RegisterProviderController.step2') }}" enctype="multipart/form-data">
                @csrf
        
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <!-- Campos de datos laborales -->
                            <div class="md:space-y-2">
                                <label class="text-xs font-semibold text-gray-600 py-2">Vendedor <abbr class=""
                                        title="required">*</abbr></label>
                                <input placeholder="Vendedor "
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                    required="required" type="text" name="vendedor" id="vendedor" maxlength="60" value="{{ old('vendedor') }}">
                                @error('vendedor')
                                    <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:space-y-2">
                                <label class="text-xs font-semibold text-gray-600 py-2">Vendedor Reemplazo</label>
                                <input placeholder="Vendedor Reemplazo "
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                    type="text" name="vendedor_reemplazo" id="vendedor_reemplazo" maxlength="60" value="{{ old('vendedor_reemplazo') }}">
                                @error('vendedor_reemplazo')
                                    <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:space-y-2">
                                <label class="text-xs font-semibold text-gray-600 py-2">Teléfono Vendedor <abbr class=""
                                        title="required">*</abbr></label>
                                <input placeholder="Teléfono Vendedor "
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                    required="required" type="text" name="telefono_vendedor" id="telefono_vendedor" maxlength="30" value="{{ old('telefono_vendedor') }}">
                                @error('telefono_vendedor')
                                    <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:space-y-2">
                                <label class="text-xs font-semibold text-gray-600 py-2">Extensión</label>
                                <input placeholder="Extensión "
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                    type="text" name="extension" id="extension" maxlength="10" value="{{ old('extension') }}">
                                @error('extension')
                                    <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="md:space-y-2">
                                <label class="text-xs font-semibold text-gray-600 py-2">Celular <abbr class=""
                                        title="required">*</abbr></label>
                                <input placeholder="Celular "
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                    required="required" type="text" name="celular" id="celular" maxlength="10" value="{{ old('celular') }}">
                                @error('celular')
                                    <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:space-y-2">
                                <label class="text-xs font-semibold text-gray-600 py-2">Email Ventas <abbr class=""
                                        title="required">*</abbr></label>
                                <input placeholder="Email Ventas "
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                    required="required" type="email" name="email_ventas" id="email_ventas" maxlength="30" value="{{ old('email_ventas') }}">
                                @error('email_ventas')
                                    <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:space-y-2">
                                <label class="text-xs font-semibold text-gray-600 py-2">Horario de Atención <abbr class=""
                                        title="required">*</abbr></label>
                                <input placeholder="Horario de Atención "
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                    required="required" type="text" name="horario_atencion" id="horario_atencion" maxlength="30" value="{{ old('horario_atencion') }}">
                                @error('horario_atencion')
                                    <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:space-y-2">
                                <label class="text-xs font-semibold text-gray-600 py-2">Servicio de Entrega</label>
                                <select
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                    name="servicio_entrega" id="servicio_entrega">
                                    <option value="si" {{ old('servicio_entrega') == 'si' ? 'selected' : '' }}>Si</option>
                                    <option value="no" {{ old('servicio_entrega') == 'no' ? 'selected' : '' }}>No</option>
                                </select>
                                @error('servicio_entrega')
                                    <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                
                <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                    <button
                        class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                        Cancel </button>
                    <button
                        class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Siguiente</button>
                </div>
            </form>
        </div>
    </div>
@endsection
