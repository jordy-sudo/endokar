@extends('layouts.guest')

@section('title', 'Registro de Proveedores')

@vite('resources/js/providers.js')

@section('content')
    <!-- component -->

    <div class="min-h-screen flex justify-center bg-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
        style="background-image: url(/bg-providers.avif);">
        <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
        <div class="max-w-4xl w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
            <h1 class="text-3xl font-semibold text-gray-800">Registro de Proveedor</h1>
            <h2 class="text-xl font-semibold text-gray-600">Datos Personales</h2>
            <form method="post" action="{{ route('RegisterProviderController.step1') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="py-2 ">
                        <div class="md:space-y-2 mb-1">
                            <label class="text-xs font-semibold text-gray-600 py-2">RUC <abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="RUC"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                required="requerido" type="text" name="ruc" id="ruc" maxlength="13"
                                value="{{ session()->has('step1Data') ? session('step1Data')['ruc'] : old('ruc') }}">
                            @error('ruc')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2 mb-1">
                            <label class="text-xs font-semibold text-gray-600 py-2">Razon Social <abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Razon Social"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                required="requerido" type="text"
                                value="{{ session()->has('step1Data') ? session('step1Data')['razon_social'] : old('razon_social') }}"
                                name="razon_social" id="razon_social" maxlength="38">
                            @error('razon_social')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2 mb-1">
                            <label class="text-xs font-semibold text-gray-600 py-2">Dirección <abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Dirección"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                required="requerido"
                                value="{{ session()->has('step1Data') ? session('step1Data')['direccion'] : old('direccion') }}"
                                type="text" name="direccion" id="direccion" maxlength="60">
                            @error('direccion')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2 mb-1">
                            <label class="text-xs font-semibold text-gray-600 py-2">Nombre Comercial <abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Nombre Comercial"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                required="requerido"
                                value="{{ session()->has('step1Data') ? session('step1Data')['nombre_comercial'] : old('nombre_comercial') }}"
                                type="text" name="nombre_comercial" id="nombre_comercial" maxlength="60">
                            @error('nombre_comercial')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="py-2 ">
                        <div class="md:space-y-2 mb-1">
                            <label class="text-xs font-semibold text-gray-600 py-2">Celular</label>
                            <input placeholder="Celular"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                type="text" name="celular"
                                value="{{ session()->has('step1Data') ? session('step1Data')['celular'] : old('celular') }}"
                                id="celular" maxlength="10">
                            @error('celular')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2 mb-1">
                            <label class="text-xs font-semibold text-gray-600 py-2">Provincia <abbr class=""
                                    title="requerido">*</abbr></label>

                            <select name="provincia" id="provincia"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4">
                                <option value="">Selecciona una provincia</option>
                                @foreach ($provincias as $provincia)
                                    @php
                                        $selected = '';
                                        if (
                                            session()->has('step1Data') &&
                                            session('step1Data')['provincia'] == $provincia->id
                                        ) {
                                            $selected = 'selected';
                                        } elseif (old('provincia') == $provincia->id) {
                                            $selected = 'selected';
                                        }
                                    @endphp
                                    <option value="{{ $provincia->id }}" {{ $selected }}>
                                        {{ $provincia->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('provincia')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2 mb-1">
                            <label class="text-xs font-semibold text-gray-600 py-2">Geolocalización<abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Geolocalización"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                type="text"
                                value="{{ session()->has('step1Data') ? session('step1Data')['geolocalizacion'] : old('geolocalizacion') }}"
                                name="geolocalizacion" id="geolocalizacion" maxlength="60">
                            @error('geolocalizacion')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2 mb-1">
                            <label class="text-xs font-semibold text-gray-600 py-2">Email Retenciones <abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Email Retenciones"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                type="text" name="email_retenciones"
                                value="{{ session()->has('step1Data') ? session('step1Data')['email_retenciones'] : old('email_retenciones') }}"
                                id="email_retenciones" maxlength="241">
                            @error('email_retenciones')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="py-2 ">
                        <div class="md:space-y-2 mb-1">
                            <label class="text-xs font-semibold text-gray-600 py-2">Teléfono <abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Teléfono"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                required="requerido" type="text" name="telefono" id="telefono" maxlength="10"
                                value="{{ session()->has('step1Data') ? session('step1Data')['telefono'] : old('telefono') }}">
                            @error('telefono')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2 mb-1">
                            <label class="text-xs font-semibold text-gray-600 py-2">Ciudad <abbr class=""
                                    title="requerido">*</abbr></label>
                            <select
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                required="requerido" name="ciudad" id="ciudad">
                                <option value="">Selecciona una ciudad</option>
                                {{-- Aquí puedes incluir opciones dinámicamente con JavaScript --}}
                            </select>
                            @error('ciudad')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2 mb-1">
                            <label class="text-xs font-semibold text-gray-600 py-2">Sitio Web</label>
                            <input placeholder="Sitio Web"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                type="text" name="sitio_web"
                                value="{{ session()->has('step1Data') ? session('step1Data')['sitio_web'] : old('sitio_web') }}"
                                id="sitio_web" maxlength="100">
                            @error('sitio_web')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2 mb-1">
                            <label class="text-xs font-semibold text-gray-600 py-2">Observaciones<abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Observaciones"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                type="text" name="observaciones"
                                value="{{ session()->has('step1Data') ? session('step1Data')['observaciones'] : old('observaciones') }}"
                                id="observaciones" maxlength="100">
                            @error('observaciones')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="md:flex">
                    <div class="md:col-span-3 md:space-y-2 mb-1 mt-0 md:w-full md:px-0">
                        <label class="text-xs font-semibold text-gray-600 py-2">Industria <abbr class=""
                                title="requerido">*</abbr></label>
                        <input type="text" id="buscador" placeholder="Buscar industria"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 mb-2">

                        <select name="industria" id="industria"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-12 px-4">
                            <option value="">Selecciona una opción</option>
                            @foreach ($categorias as $categoria)
                                @foreach ($categoria->subcategorias as $subcategoria)
                                    <optgroup label="{{ $categoria->nombre }} / {{ $subcategoria->nombre }}">
                                        @foreach ($subcategoria->elementos as $elemento)
                                            <option value="{{ $elemento->id }}"
                                                {{ isset(session('step1Data')['industria']) && session('step1Data')['industria'] == $elemento->id ? 'selected' : (old('industria') == $elemento->id ? 'selected' : '') }}>
                                                {{ $elemento->nombre }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            @endforeach
                        </select>
                        @error('industria')
                            <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:col-span-3 md:space-y-2 mb-1 mt-0 md:w-full md:px-4">
                        <label class="text-xs font-semibold text-gray-600 py-2">Certificado de RUC <abbr class=""
                                title="requerido">*</abbr></label>
                        <div class="w-full">
                            <label for="certificado_ruc"
                                class="flex flex-col items-center justify-center w-full h-30 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-3 pb-4">
                                    <svg class="w-6 h-6 mb-3 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p id="certificado_ruc_text" class="mb-1 text-xs text-gray-500 dark:text-gray-400">
                                        <span class="font-semibold">Haz clic para subir</span> el archivo
                                    </p>
                                </div>
                                <input id="certificado_ruc" type="file" class="hidden" name="certificado_ruc"
                                    accept=".pdf, .doc, .docx" onchange="showFileName(this)" />
                            </label>
                            <span class="mt-1 text-xs text-gray-500 dark:text-gray-300" id="certificado_ruc_help">PDF,
                                DOC, DOCX (MAX. 10 MB).</span>
                            @error('certificado_ruc')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">

                    <button
                        class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Siguiente</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function loadCities(provinceId, oldCity) {
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/ciudades/' + provinceId,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    $('#ciudad').empty();
                    $.each(response, function(key, value) {
                        $('#ciudad').append('<option value="' + key + '">' +
                            value + '</option>');
                    });

                    // Asigna el valor de old ciudad si existe
                    if (oldCity && $('#ciudad option[value="' + oldCity + '"]').length) {
                        $('#ciudad').val(oldCity);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        $(document).ready(function() {
            var step1Data = @json(session('step1Data'));
            var oldProvince = "{{ old('provincia') }}";
            var oldCity = "{{ old('ciudad') }}";

            if (step1Data && step1Data.provincia) {
                loadCities(step1Data.provincia, step1Data.ciudad);
            } else if (oldProvince) {
                loadCities(oldProvince, oldCity);
            }

            $('#provincia').change(function() {
                var provinceId = $(this).val();
                if (provinceId) {
                    loadCities(provinceId, '');
                } else {
                    $('#ciudad').empty();
                }
            });
        });

        function showFileName(input) {
            const fileName = input.files[0].name;
            const textElement = document.getElementById('certificado_ruc_text');
            textElement.innerText = fileName;
        }

        const fileInput = document.getElementById('certificado_ruc');
        fileInput.addEventListener('change', function() {
            if (this.files.length > 1) {
                this.value = '';
                const textElement = document.getElementById('certificado_ruc_text');
                textElement.innerText = 'Solo se permite un archivo';
            }
        });
    </script>
@endsection
