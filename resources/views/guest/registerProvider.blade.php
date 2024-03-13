@extends('layouts.guest')

@section('title', 'Registro de Proveedores')

@section('content')
    <!-- component -->

    <div class="min-h-screen flex justify-center bg-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
        style="background-image: url(/bg-providers.avif);">
        <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
        <div class="max-w-3xl w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
            <h1 class="text-3xl font-semibold text-gray-800">Registro de Proveedor</h1>
            <h2 class="text-xl font-semibold text-gray-600">Datos Personales</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('RegisterProviderController.step1') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">RUC <abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="RUC"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                required="requerido" type="text" name="ruc" id="ruc" maxlength="13">
                            @error('ruc')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                       
               
                      
                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Teléfono <abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Teléfono"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                required="requerido" type="text" name="telefono" id="telefono" maxlength="10">
                            @error('telefono')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                      
                    
                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Provincia <abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Provincia"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                required="requerido" type="text" name="provincia" id="provincia" maxlength="3">
                            @error('provincia')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Dirección <abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Dirección"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                required="requerido" type="text" name="direccion" id="direccion" maxlength="60">
                            @error('direccion')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Sitio Web</label>
                            <input placeholder="Sitio Web"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                type="text" name="sitio_web" id="sitio_web" maxlength="100">
                            @error('sitio_web')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Industria <abbr class=""
                                title="requerido">*</abbr></label>
                            <input placeholder="Industria"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                type="text" name="industria" id="industria" maxlength="100">
                            @error('industria')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Observaciones<abbr class=""
                                title="requerido">*</abbr></label>
                            <input placeholder="Observaciones"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                type="text" name="observaciones" id="observaciones" maxlength="100">
                            @error('observaciones')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Razon Social <abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Razon Social"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                required="requerido" type="text" name="razon_social" id="razon_social" maxlength="38">
                            @error('razon_social')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Celular</label>
                            <input placeholder="Celular"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                type="text" name="celular" id="celular" maxlength="10">
                            @error('celular')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Ciudad <abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Ciudad"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                required="requerido" type="text" name="ciudad" id="ciudad" maxlength="40">
                            @error('ciudad')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                   
                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Geolocalización<abbr class=""
                                title="requerido">*</abbr></label>
                            <input placeholder="Geolocalización"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                type="text" name="geolocalizacion" id="geolocalizacion" maxlength="60">
                            @error('geolocalizacion')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Email Retenciones <abbr class=""
                                title="requerido">*</abbr></label>
                            <input placeholder="Email Retenciones"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                type="text" name="email_retenciones" id="email_retenciones" maxlength="241">
                            @error('email_retenciones')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                 
                       
                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Nombre Comercial <abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Nombre Comercial"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                required="requerido" type="text" name="nombre_comercial" id="nombre_comercial" maxlength="60">
                            @error('nombre_comercial')
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
