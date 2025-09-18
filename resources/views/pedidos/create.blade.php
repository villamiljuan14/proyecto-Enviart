<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-8">
                    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white p-6 shadow sm:rounded-lg">

                            <form action="{{ route('pedidos.store') }}" method="POST" class="space-y-6">
                                @csrf

                                {{-- Estado --}}
                                <div>
                                    <label for="estado_pedido" class="block text-sm font-medium text-gray-700">
                                        Estado del Pedido *
                                    </label>
                                    <select name="estado_pedido" id="estado_pedido"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        required>
                                        <option value="">-- Selecciona --</option>
                                        <option value="En transito">En tránsito</option>
                                        <option value="bodega">Bodega</option>
                                        <option value="Entregado">Entregado</option>
                                    </select>
                                    @error('estado_pedido')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Fecha del pedido (solo lectura) --}}
                                <div>
                                    <label for="fecha_pedido" class="block text-sm font-medium text-gray-700">
                                        Fecha del Pedido
                                    </label>
                                    <input type="text"
                                        value="{{ now()->format('Y-m-d H:i') }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 text-gray-700"
                                        readonly>
                                </div>

                                {{-- Usuario oculto (logueado automáticamente) --}}
                                <input type="hidden" name="usuario_id_usuario" value="{{ auth()->id() }}">

                                {{-- Novedad --}}
                                <div>
                                    <label for="novedad" class="block text-sm font-medium text-gray-700">
                                        Novedad *
                                    </label>
                                    <input type="text" name="novedad" id="novedad"
                                        value="{{ old('novedad') }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Escribe la novedad" required>
                                    @error('novedad')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Botones --}}
                                <div class="pt-4 flex gap-3">
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 
                                               focus:ring-4 focus:ring-green-300 font-medium rounded-lg 
                                               text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 
                                               dark:focus:ring-green-800">
                                        Guardar
                                    </button>

                                    <a href="{{ route('pedidos.index') }}"
                                        class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-medium 
                                               text-gray-700 bg-white hover:bg-gray-100">
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
