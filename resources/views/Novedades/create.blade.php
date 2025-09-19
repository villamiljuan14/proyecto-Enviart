<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Novedad') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-8">
                    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white p-6 shadow sm:rounded-lg">
                            {{-- Formulario para crear novedad --}}
                            <form action="{{ route('novedades.store') }}" method="POST" class="space-y-6">
                                @csrf

                                {{-- Incluye el formulario parcial de novedades --}}
                                @include('novedades._form', [
                                    'novedad' => null
                                ])

                                {{-- Botones --}}
                                <div class="pt-4 flex gap-3">
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                        Guardar
                                    </button>
                                    <a href="{{ route('novedades.index') }}"
                                        class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-100">
                                        Cancelar
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
