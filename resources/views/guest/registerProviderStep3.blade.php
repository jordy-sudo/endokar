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
                                <option value="{{ $banco->id }}">{{ $banco->name }}</option>
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
                    <input placeholder="Tipo"
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                        required="required" type="text" name="tipo_cuenta" id="tipo_cuenta" maxlength="2">
                    @error('tipo_cuenta')
                        <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:space-y-2">
                    <label class="text-xs font-semibold text-gray-600 py-2">No. Cta. Bancaria <abbr class="hidden"
                            title="required">*</abbr></label>
                    <input placeholder="No. Cta. Bancaria"
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                        required="required" type="text" name="numero_cuenta_bancaria" id="numero_cuenta_bancaria" maxlength="18">
                    @error('numero_cuenta_bancaria')
                        <p class="text-xs text-red-500 text-right my-3">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:flex md:items-center md:space-x-4 md:mt-2">
                    <label for="certificado_bancario" class="text-sm font-semibold text-gray-600 md:w-1/3">Certificado Bancario</label>
                    <div class="md:flex md:items-center md:w-2/3">
                        <label for="certificado_bancario" class="cursor-pointer">
                            <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-blue-400 hover:bg-blue-600 hover:shadow-lg">Buscar</span>
                            <input id="certificado_bancario" type="file" class="hidden" name="certificado_bancario" accept=".pdf, .doc, .docx">
                        </label>
                        <span class="text-xs text-red-500 ml-2 md:ml-4">
                            @error('certificado_bancario')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                    <button
                        class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                        Cancel </button>
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
                var text = option.text.toLowerCase();
                var found = text.indexOf(searchText) !== -1;
                option.style.display = found ? 'block' : 'none';
            }
        });
    </script>
@endsection
