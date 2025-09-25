<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Dirección') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                {{-- ✅ Alerta de éxito --}}
                @if (session('ok'))
                    <div id="alert-success"
                         class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative transition-opacity duration-500"
                         role="alert">
                        <strong class="font-bold">¡Éxito! </strong>
                        <span class="block sm:inline">{{ session('ok') }}</span>
                        <button type="button"
                                class="absolute top-0 bottom-0 right-0 px-4 py-3 text-green-500"
                                onclick="document.getElementById('alert-success').remove();">✖</button>
                    </div>
                    <script>
                        setTimeout(() => {
                            const alert = document.getElementById('alert-success');
                            if (alert) {
                                alert.style.opacity = '0';
                                setTimeout(() => alert.remove(), 500);
                            }
                        }, 3000);
                    </script>
                @endif

                {{-- ❌ Alerta de error --}}
                @if ($errors->any())
                    <div id="alert-error"
                         class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative transition-opacity duration-500"
                         role="alert">
                        <strong class="font-bold">Error: </strong>
                        <ul class="list-disc pl-6">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button"
                                class="absolute top-0 bottom-0 right-0 px-4 py-3 text-red-500"
                                onclick="document.getElementById('alert-error').remove();">✖</button>
                    </div>
                    <script>
                        setTimeout(() => {
                            const alert = document.getElementById('alert-error');
                            if (alert) {
                                alert.style.opacity = '0';
                                setTimeout(() => alert.remove(), 500);
                            }
                        }, 5000);
                    </script>
                @endif

                <form action="{{ route('direcciones.update', $direccion->id_direccion) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    @include('direcciones._form')

                    <div class="pt-4 flex gap-3">
                        <button type="submit"
                                class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Actualizar Dirección
                        </button>

                        <a href="{{ route('direcciones.index') }}"
                           class="inline-block bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            Cancelar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>