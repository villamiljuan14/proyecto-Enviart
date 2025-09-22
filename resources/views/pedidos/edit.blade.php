<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">

                <form action="{{ route('pedidos.update', $pedido) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    @php
                        $val = fn($key, $default = '') => old($key, $pedido->{$key} ?? $default);
                    @endphp

                    {{-- Estado del pedido --}}
                    <div>
                        <label for="estado_pedido" class="block text-sm font-medium text-gray-700">Estado *</label>
                        <select name="estado_pedido" id="estado_pedido"
                            class="mt-1 block w-full border rounded px-3 py-2" required>
                            <option value="">-- Selecciona --</option>
                            <option value="En transito" @selected($val('estado_pedido') === 'En transito')>En tránsito</option>
                            <option value="bodega" @selected($val('estado_pedido') === 'bodega')>Bodega</option>
                            <option value="Entregado" @selected($val('estado_pedido') === 'Entregado')>Entregado</option>
                        </select>
                        @error('estado_pedido')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Fecha del pedido --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">Fecha del Pedido</label>
                        <input type="text" value="{{ $pedido->fecha_pedido->format('Y-m-d H:i') }}"
                               class="w-full border rounded px-3 py-2 bg-gray-100" readonly>
                    </div>

                    {{-- Novedades --}}
                    <div>
                        <label for="novedades" class="block text-sm font-medium text-gray-700">Novedades *</label>
                        <select name="novedades[]" id="novedades" multiple class="mt-1 block w-full border rounded px-3 py-2" required>
                            @foreach($novedades as $novedad)
                                <option value="{{ $novedad->id_novedad }}" @selected($pedido->novedades->contains($novedad->id_novedad))>
                                    {{ $novedad->descripcion_novedad }}
                                </option>
                            @endforeach
                        </select>
                        @error('novedades')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Pagos --}}
                    <div>
                        <label for="pagos" class="block text-sm font-medium text-gray-700">Pagos *</label>
                        <select name="pagos[]" id="pagos" multiple class="mt-1 block w-full border rounded px-3 py-2" required>
                            @foreach($pagos as $pago)
                                <option value="{{ $pago->id_pago }}" @selected($pedido->pagos->contains($pago->id_pago))>
                                    {{ $pago->metodo_de_pago }}
                                </option>
                            @endforeach
                        </select>
                        @error('pagos')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Peso, Largo, Alto --}}
                    <div class="grid grid-cols-3 gap-3">
                        <div>
                            <label>Peso (kg) *</label>
                            <input type="number" step="0.01" name="peso_pedido" value="{{ $val('peso_pedido') }}" required
                                   class="w-full border rounded px-3 py-2">
                            @error('peso_pedido')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label>Largo (cm) *</label>
                            <input type="number" step="0.01" name="largo_pedido" value="{{ $val('largo_pedido') }}" required
                                   class="w-full border rounded px-3 py-2">
                            @error('largo_pedido')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label>Alto (cm) *</label>
                            <input type="number" step="0.01" name="alto_pedido" value="{{ $val('alto_pedido') }}" required
                                   class="w-full border rounded px-3 py-2">
                            @error('alto_pedido')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- Frágil --}}
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="fragil" id="fragil" value="1" @checked($val('fragil'))>
                        <label for="fragil" class="text-sm font-medium text-gray-700">Frágil</label>
                    </div>

                    {{-- Botones --}}
                    <div class="pt-4 flex gap-3">
                        <button type="submit"
                                class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 
                                       focus:ring-4 focus:ring-blue-300 font-medium rounded-lg 
                                       text-sm px-5 py-2.5">
                            Actualizar
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
</x-app-layout>

