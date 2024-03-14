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
                                required="requerido" type="text" name="ruc" id="ruc" maxlength="13"
                                value="{{ old('ruc') }}">
                            @error('ruc')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>



                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Teléfono <abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Teléfono"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                required="requerido" type="text" name="telefono" id="telefono" maxlength="10"
                                value="{{ old('telefono') }}">
                            @error('telefono')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Provincia <abbr class=""
                                    title="requerido">*</abbr></label>

                            <select name="provincia" id="provincia"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4">
                                <option value="">Selecciona una provincia</option>
                                @foreach ($provincias as $provincia)
                                    <option value="{{ $provincia->id }}"
                                        {{ old('provincia') == $provincia->id ? 'selected' : '' }}>{{ $provincia->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('provincia')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Dirección <abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Dirección"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                required="requerido" value="{{ old('direccion') }}" type="text" name="direccion"
                                id="direccion" maxlength="60">
                            @error('direccion')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Sitio Web</label>
                            <input placeholder="Sitio Web"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                type="text" name="sitio_web" value="{{ old('sitio_web') }}" id="sitio_web"
                                maxlength="100">
                            @error('sitio_web')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Observaciones<abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Observaciones"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                type="text" name="observaciones" value="{{ old('observaciones') }}" id="observaciones"
                                maxlength="100">
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
                                required="requerido" type="text" value="{{ old('razon_social') }}" name="razon_social"
                                id="razon_social" maxlength="38">
                            @error('razon_social')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Celular</label>
                            <input placeholder="Celular"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                type="text" name="celular" value="{{ old('celular') }}" id="celular"
                                maxlength="10">
                            @error('celular')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2">
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

                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Geolocalización<abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Geolocalización"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                type="text" value="{{ old('geolocalizacion') }}" name="geolocalizacion"
                                id="geolocalizacion" maxlength="60">
                            @error('geolocalizacion')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Email Retenciones <abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Email Retenciones"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                type="text" name="email_retenciones" value="{{ old('email_retenciones') }}"
                                id="email_retenciones" maxlength="241">
                            @error('email_retenciones')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="md:space-y-2">
                            <label class="text-xs font-semibold text-gray-600 py-2">Nombre Comercial <abbr class=""
                                    title="requerido">*</abbr></label>
                            <input placeholder="Nombre Comercial"
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                required="requerido" value="{{ old('nombre_comercial') }}" type="text"
                                name="nombre_comercial" id="nombre_comercial" maxlength="60">
                            @error('nombre_comercial')
                                <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="md:col-span-2 md:space-y-2 mt-0">
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
                                            <option value="{{ $elemento->id }}">{{ $elemento->nombre }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            @endforeach
                        </select>
                        @error('industria')
                            <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                        @enderror
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
    <script>
        $(document).ready(function() {
            // Función para cargar las ciudades automáticamente cuando se selecciona una provincia
            function cargarCiudades(provinciaId) {
                // Obtener el token CSRF
                var token = $('meta[name="csrf-token"]').attr('content');
                // Realizar la solicitud AJAX
                $.ajax({
                    url: '/ciudades/' + provinciaId,
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    success: function(response) {
                        // Limpiar el select de ciudades
                        $('#ciudad').empty();
                        // Agregar las nuevas opciones de ciudades
                        $.each(response, function(key, value) {
                            $('#ciudad').append('<option value="' + key + '">' +
                                value + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error); // Manejar errores si los hay
                    }
                });
            }

            // Cargar automáticamente las ciudades si existe un valor anterior de provincia
            var provinciaAnterior = "{{ old('provincia') }}";
            if (provinciaAnterior) {
                cargarCiudades(provinciaAnterior);
            }

            // Detectar cambios en el campo de provincia y cargar las ciudades correspondientes
            $('#provincia').change(function() {
                var provinciaId = $(this).val();
                if (provinciaId) {
                    cargarCiudades(provinciaId);
                } else {
                    // Limpiar el select de ciudades si no se selecciona ninguna provincia
                    $('#ciudad').empty();
                }
            });
        });

        function validarCampoInput(inputId, maxLength, allowNonNumeric) {
            document.getElementById(inputId).addEventListener('input', function(event) {
                let inputValue = event.target.value;

                // Permitir caracteres no numéricos si se especifica
                if (!allowNonNumeric) {
                    // Reemplazar cualquier caracter que no sea un dígito con una cadena vacía
                    inputValue = inputValue.replace(/\D/g, '');
                }

                // Limitar la longitud del valor al máximo especificado
                inputValue = inputValue.slice(0, maxLength);

                // Actualizar el valor del campo
                event.target.value = inputValue;
            });
        }
        validarCampoInput('telefono', 10, false);
        validarCampoInput('ruc', 13, false);
        validarCampoInput('celular', 10, false);

        //campos texto
        validarCampoInput('direccion', 60, true);
        validarCampoInput('sitio_web', 100, true);
        validarCampoInput('observaciones', 100, true);
        validarCampoInput('razon_social', 38, true);
        validarCampoInput('geolocalizacion', 60, true);
        validarCampoInput('email_retenciones', 241, true);
        validarCampoInput('nombre_comercial', 60, true);

        document.addEventListener('DOMContentLoaded', function() {
            const buscador = document.getElementById('buscador');
            const select = document.getElementById('industria');

            buscador.addEventListener('input', function() {
                const filtro = buscador.value.toLowerCase();
                const opciones = select.querySelectorAll('optgroup');

                opciones.forEach(function(optgroup) {
                    const visible = optgroup.label.toLowerCase().includes(filtro);
                    optgroup.style.display = visible ? 'block' : 'none';
                });
            });
        });
    </script>
@endsection
