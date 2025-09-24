@php
    $val = fn($key, $default = '') => old($key, isset($novedad) ? ($novedad->{$key} ?? $default) : $default);
@endphp

<div class="space-y-4">

    {{-- Descripción --}}
    <div>
        <label class="block text-sm font-medium mb-1">Descripción *</label>
        <textarea
            name="descripcion_novedad"
            class="w-full border rounded px-3 py-2"
            rows="3"
            required
            maxlength="500"
        >{{ $val('descripcion_novedad') }}</textarea>
        @error('descripcion_novedad')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Fecha de la novedad --}}
    <div>
        <label class="block text-sm font-medium mb-1">Fecha de la novedad *</label>
        <input
            type="datetime-local"
            name="fecha_novedad"
            class="w-full border rounded px-3 py-2"
            value="{{ $val('fecha_novedad') ? \Carbon\Carbon::parse($val('fecha_novedad'))->format('Y-m-d\TH:i') : '' }}"
            required
        >
        @error('fecha_novedad')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Estado --}}
    <div>
        <label class="block text-sm font-medium mb-1">Estado *</label>
        <select name="estado_novedad" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Selecciona --</option>
            <option value="PENDIENTE" @selected($val('estado_novedad') === 'PENDIENTE')>Pendiente</option>
            <option value="RESUELTA" @selected($val('estado_novedad') === 'RESUELTA')>Resuelta</option>
            <option value="CANCELADA" @selected($val('estado_novedad') === 'CANCELADA')>Cancelada</option>
        </select>
        @error('estado_novedad')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Asociar pedidos --}}
    <div>
        <label class="block text-sm font-medium mb-1">Pedidos asociados</label>
        <div class="border rounded p-3 space-y-2 max-h-48 overflow-y-auto">
            @foreach($pedidos as $pedido)
                <div class="flex items-center">
                    <input
                        type="checkbox"
                        name="pedidos[]"
                        value="{{ $pedido->id_pedido }}"
                        id="pedido_{{ $pedido->id_pedido }}"
                        @checked(old('pedidos', $novedad?->pedidos->pluck('id_pedido')->toArray() ?? []) && in_array($pedido->id_pedido, old('pedidos', $novedad?->pedidos->pluck('id_pedido')->toArray())))
                    >
                    <label for="pedido_{{ $pedido->id_pedido }}" class="ml-2 text-sm">
                        Pedido #{{ $pedido->id_pedido }}
                        @if($pedido->nombre_cliente ?? false)
                            - {{ $pedido->nombre_cliente }}
                        @endif
                    </label>
                </div>
            @endforeach
        </div>
        @error('pedidos')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Observaciones por pedido (solo en edición) --}}
    @if(isset($novedad) && $novedad->pedidos->isNotEmpty())
        <div class="space-y-3">
            <label class="block text-sm font-medium mb-1">Observaciones por pedido</label>
            @foreach($novedad->pedidos as $pedido)
                <div class="flex gap-2 items-start">
                    <span class="text-sm font-medium">Pedido #{{ $pedido->id_pedido }}:</span>
                    <input
                        type="text"
                        name="observacion_pedido[{{ $pedido->id_pedido }}]"
                        value="{{ old("observacion_pedido.{$pedido->id_pedido}", $pedido->pivot->observacion_pedido ?? '') }}"
                        class="flex-1 border rounded px-2 py-1 text-sm"
                        placeholder="Observación opcional"
                    >
                </div>
            @endforeach
        </div>
    @endif

</div>
