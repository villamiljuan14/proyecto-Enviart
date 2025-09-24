@php
    $val = fn($key, $default = '') => old($key, isset($pedido) ? ($pedido->{$key} ?? $default) : $default);
@endphp

<div class="space-y-4">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Cliente *</label>
            <input type="text" name="cliente" value="{{ $val('cliente') }}"
                   class="w-full border rounded px-3 py-2" required maxlength="100">
            @error('cliente')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Teléfono de contacto</label>
            <input type="text" name="telefono" value="{{ $val('telefono') }}"
                   class="w-full border rounded px-3 py-2" maxlength="20">
            @error('telefono')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Dirección de entrega *</label>
        <input type="text" name="direccion" value="{{ $val('direccion') }}"
               class="w-full border rounded px-3 py-2" required maxlength="150">
        @error('direccion')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Fecha Pedido *</label>
            <input type="date" name="fecha_pedido" value="{{ $val('fecha_pedido', now()->format('Y-m-d')) }}"
                   class="w-full border rounded px-3 py-2" required>
            @error('fecha_pedido')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Estado *</label>
            <select name="estado_pedido" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Selecciona --</option>
                <option value="pendiente" @selected($val('estado_pedido') === 'pendiente')>Pendiente</option>
                <option value="en_transito" @selected($val('estado_pedido') === 'en_transito')>En tránsito</option>
                <option value="entregado" @selected($val('estado_pedido') === 'entregado')>Entregado</option>
                <option value="cancelado" @selected($val('estado_pedido') === 'cancelado')>Cancelado</option>
            </select>
            @error('estado_pedido')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Total Pedido *</label>
        <input type="number" step="0.01" name="total_pedido" value="{{ $val('total_pedido') }}"
               class="w-full border rounded px-3 py-2" required>
        @error('total_pedido')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

</div>
