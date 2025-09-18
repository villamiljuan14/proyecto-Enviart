@php
    $val = fn($key, $default = '') => old($key, isset($pedido) ? ($pedido->{$key} ?? $default) : $default);
@endphp

<div class="space-y-4">

    {{-- Fecha del pedido (solo lectura) --}}
    <div>
        <label class="block text-sm font-medium mb-1">Fecha del Pedido</label>
        <input type="text" 
               value="{{ isset($pedido) ? $pedido->fecha_pedido->format('Y-m-d H:i') : now()->format('Y-m-d H:i') }}" 
               class="w-full border rounded px-3 py-2 bg-gray-100" 
               readonly>
    </div>

    {{-- Estado del pedido --}}
    <div>
        <label class="block text-sm font-medium mb-1">Estado del Pedido *</label>
        <select name="estado_pedido" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Selecciona --</option>
            <option value="En transito" @selected($val('estado_pedido') === 'En transito')>En tránsito</option>
            <option value="bodega" @selected($val('estado_pedido') === 'bodega')>Bodega</option>
            <option value="Entregado" @selected($val('estado_pedido') === 'Entregado')>Entregado</option>
        </select>
        @error('estado_pedido')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Novedad (texto libre) --}}
    <div>
        <label class="block text-sm font-medium mb-1">Novedad *</label>
        <input type="text" 
               name="novedad" 
               value="{{ $val('novedad') }}"
               class="w-full border rounded px-3 py-2"
               placeholder="Escribe la novedad"
               required>
        @error('novedad')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Campo oculto para usuario logueado --}}
    <input type="hidden" name="usuario_id_usuario" value="{{ auth()->id() }}">

</div>

</div>
