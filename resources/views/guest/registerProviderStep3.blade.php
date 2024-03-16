@extends('layouts.guest')

@section('title', 'Registro de Proveedores')

@section('content')
    <!-- component -->
    <div class="min-h-screen flex justify-center bg-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
        style="background-image: url(/bg-providers.avif);">
        <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
        <div class="max-w-3xl w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
            <h1 class="text-3xl font-semibold text-gray-800">Registro de Proveedor</h1>
            <h2 class="text-xl font-semibold text-gray-600">Datos Bancarios</h2>
            <form method="post" action="{{ route('RegisterProviderController.step3') }}" enctype="multipart/form-data">
                @csrf
                <div class="md:flex md:items-center md:space-x-4 md:mt-2">
                    <div class="w-full">
                        <label class="text-xs font-semibold text-gray-600 py-2">Banco <abbr class="hidden"
                                title="required">*</abbr></label>
                        <div class="flex flex-col sm:flex-row ">
                            <input type="text" id="searchBanco" placeholder="Buscar banco..."
                                class="w-full sm:w-auto px-4 py-2 mb-2 sm:mr-2 rounded-lg border border-gray-300">
                            <select name="banco" id="banco" required
                                class="flex-1 bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3">
                                <option value="">Selecciona un banco</option>
                                @foreach ($bancos as $banco)
                                    <option value="{{ $banco->id }}"
                                        {{ old('banco') == $banco->id || (session('step3Data') && session('step3Data')['banco'] == $banco->id) ? 'selected' : '' }}>
                                        {{ $banco->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                @error('banco')
                    <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                @enderror
                <div class="md:space-y-2">
                    <label class="text-xs font-semibold text-gray-600 py-2">Tipo <abbr class="hidden"
                            title="required">*</abbr></label>
                    <select name="tipo_cuenta" id="tipo_cuenta"
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                        required="required">
                        <option value="">Selecciona el tipo de cuenta</option>
                        <option value="Ahorros"
                            {{ old('tipo_cuenta') == 'Ahorros' || (session('step3Data') && session('step3Data')['tipo_cuenta'] == 'Ahorros') ? 'selected' : '' }}>
                            Ahorros
                        </option>
                        <option value="Corriente"
                            {{ old('tipo_cuenta') == 'Corriente' || (session('step3Data') && session('step3Data')['tipo_cuenta'] == 'Corriente') ? 'selected' : '' }}>
                            Corriente
                        </option>
                    </select>
                    @error('tipo_cuenta')
                        <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:space-y-2">
                    <label class="text-xs font-semibold text-gray-600 py-2">No. Cta. Bancaria <abbr class="hidden"
                            title="required">*</abbr></label>
                    <input placeholder="No. Cta. Bancaria"
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                        required="required" type="text" name="numero_cuenta_bancaria" id="numero_cuenta_bancaria"
                        maxlength="18"
                        value="{{ old('numero_cuenta_bancaria') ?: (session('step3Data') ? session('step3Data')['numero_cuenta_bancaria'] : '') }}">
                    @error('numero_cuenta_bancaria')
                        <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-3 md:space-y-2 mb-1 mt-0 md:w-full ">
                    <label class="text-xs font-semibold text-gray-600 py-2">Certificado de RUC <abbr class=""
                            title="requerido">*</abbr></label>
                    <div class="w-full">
                        <div class="md:flex md:items-center md:w-2/3">
                            <label for="certificado_bancario"
                                class="flex flex-col items-center justify-center w-full h-30 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-3 pb-4">
                                    <svg class="w-6 h-6 mb-3 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p id="certificado_bancario_text" class="mb-1 text-xs text-gray-500 dark:text-gray-400">
                                        <span class="font-semibold">Haz clic para subir</span> el archivo
                                    </p>
                                </div>
                                <input id="certificado_bancario" type="file" class="hidden" name="certificado_bancario"
                                    accept=".pdf, .doc, .docx" onchange="showFileName(this)" />
                            </label>
                            <span class="text-xs text-red-500 ml-2 md:ml-4">
                                @error('certificado_bancario')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                    <button type="button" onclick="backStep2()"
                        class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                        Atras </button>
                    <button
                        class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('searchBanco').addEventListener('input', function() {
            var searchText = this.value.toLowerCase();
            var options = document.querySelectorAll('#banco option');
            for (var i = 0; i < options.length; i++) {
                var option = options[i];
                var text = option.textContent.toLowerCase();
                var found = text.indexOf(searchText) !== -1;
                option.style.display = found ? 'block' : 'none';
            }
        });

        function showFileName(input) {
            const label = document.getElementById('certificado_bancario_text');
            if (input.files.length > 0) {
                label.textContent = 'Archivo seleccionado: ' + input.files[0].name;
            } else {
                label.textContent = 'Haz clic para subir el archivo';
            }
        }

        function backStep2() {
            window.location.href = "{{ route('RegisterProviderController.backStep2') }}";
        }
    </script>
@endsection
