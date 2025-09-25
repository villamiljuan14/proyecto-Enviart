<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">

                <form action="{{ route('pedidos.update', $pedido->id_pedido) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    @php
                        $val = fn($key, $default = '') => old($key, $pedido->{$key} ?? $default);
                    @endphp

                    {{-- Usuario (solo lectura) --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Usuario</label>
                        <input
                            type="text"
                            value="{{ $pedido->usuario->primer_nombre ?? '' }} {{ $pedido->usuario->primer_apellido ?? '' }}"
                            class="w-full border rounded px-3 py-2 bg-gray-100"
                            readonly
                        />
                    </div>

                    {{-- Dirección Origen --}}
                    <div>
                        <label for="id_direccion_origen" class="block text-sm font-medium text-gray-700">
                            Dirección Origen *
                        </label>
                        <select name="id_direccion_origen" id="id_direccion_origen"
                            class="mt-1 block w-full border rounded px-3 py-2" required>
                            <option value="">-- Selecciona --</option>
                            @foreach($direcciones as $direccion)
                                <option value="{{ $direccion->id_direccion }}"
                                    @selected($val('id_direccion_origen') == $direccion->id_direccion)>
                                    {{ $direccion->calle_dir }} #{{ $direccion->carrera_dir }} - {{ $direccion->numero_dir }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_direccion_origen')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Dirección Destino --}}
                    <div>
                        <label for="id_direccion_destino" class="block text-sm font-medium text-gray-700">
                            Dirección Destino *
                        </label>
                        <select name="id_direccion_destino" id="id_direccion_destino"
                            class="mt-1 block w-full border rounded px-3 py-2" required>
                            <option value="">-- Selecciona --</option>
                            @foreach($direcciones as $direccion)
                                <option value="{{ $direccion->id_direccion }}"
                                    @selected($val('id_direccion_destino') == $direccion->id_direccion)>
                                    {{ $direccion->calle_dir }} #{{ $direccion->carrera_dir }} - {{ $direccion->numero_dir }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_direccion_destino')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

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
                        @error('estado_pedido')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Fecha del pedido (solo lectura) --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">Fecha del Pedido</label>
                        <input type="text"
                            value="{{ $pedido->fecha_pedido ? \Carbon\Carbon::parse($pedido->fecha_pedido)->format('Y-m-d H:i') : now()->format('Y-m-d H:i') }}"
                            class="w-full border rounded px-3 py-2 bg-gray-100" readonly>
                    </div>

                    {{-- Novedades --}}
                    <div>
                        <label for="novedad" class="block text-sm font-medium text-gray-700">Novedades</label>
                        <input
                            type="text"
                            name="novedad"
                            id="novedad"
                            class="mt-1 block w-full border rounded px-3 py-2"
                            value="{{ $val('novedad') }}"
                            maxlength="255"
                            placeholder="Describe la novedad (máx. 255 caracteres)"
                        />
                        @error('novedad')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Métodos de Pago --}}
                    <div>
                        <label for="pagos" class="block text-sm font-medium text-gray-700">Métodos de Pago *</label>
                        <select name="pagos[]" id="pagos" multiple class="mt-1 block w-full border rounded px-3 py-2" required>
                            @foreach($pagos as $pago)
                                <option value="{{ $pago->id_pago }}"
                                    @selected(
                                        (old('pagos') && in_array($pago->id_pago, old('pagos'))) ||
                                        (isset($pedidoPagos) && in_array($pago->id_pago, $pedidoPagos))
                                    )>
                                    {{ $pago->metodo_de_pago }}
                                </option>
                            @endforeach
                        </select>
                        @error('pagos')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Peso, Largo, Ancho, Alto --}}
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <div>
                            <label>Peso (kg) *</label>
                            <input type="number" step="0.01" name="peso_pedido"
                                value="{{ $val('peso_pedido') }}" required
                                class="w-full border rounded px-3 py-2">
                            @error('peso_pedido')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Largo (cm) *</label>
                            <input type="number" step="0.01" name="largo_pedido"
                                value="{{ $val('largo_pedido') }}" required
                                class="w-full border rounded px-3 py-2">
                            @error('largo_pedido')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Ancho (cm) *</label>
                            <input type="number" step="0.01" name="ancho_pedido"
                                value="{{ $val('ancho_pedido') }}" required
                                class="w-full border rounded px-3 py-2">
                            @error('ancho_pedido')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Alto (cm) *</label>
                            <input type="number" step="0.01" name="alto_pedido"
                                value="{{ $val('alto_pedido') }}" required
                                class="w-full border rounded px-3 py-2">
                            @error('alto_pedido')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Frágil --}}
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="fragil" id="fragil" value="1"
                            @checked($val('fragil'))>
                        <label for="fragil" class="text-sm font-medium text-gray-700">Frágil</label>
                    </div>

                    {{-- Botones --}}
                    <div class="pt-4 flex gap-3">
                        <button type="submit"
                            class="focus:outline-none text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
                            Actualizar Pedido
                        </button>

                        <a href="{{ route('pedidos.index') }}"
                            class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-100">
                            Cancelar
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>

