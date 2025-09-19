@php
    $val = fn($key, $default = '') => old($key, isset($novedad) ? ($novedad->{$key} ?? $default) : $default);
@endphp

<div class="space-y-4">

    {{-- Descripción de la novedad --}}
    <div>
        <label class="block text-sm font-medium mb-1">Descripción de la Novedad *</label>
        <input type="text" name="descripcion_novedad" value="{{ $val('descripcion_novedad') }}"
               class="w-full border rounded px-3 py-2" required maxlength="255">
        @error('descripcion_novedad')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Fecha de la novedad --}}
    <div>
        <label class="block text-sm font-medium mb-1">Fecha de la Novedad *</label>
        <input type="date" name="fecha_novedad" value="{{ $val('fecha_novedad', \Carbon\Carbon::now()->format('Y-m-d')) }}"
               class="w-full border rounded px-3 py-2" required>
        @error('fecha_novedad')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Estado de la novedad --}}
    <div>
        <label class="block text-sm font-medium mb-1">Estado *</label>
        <select name="estado_novedad" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Selecciona --</option>
            <option value="1" @selected($val('estado_novedad') == 0)>Resuelta</option>
            <option value="2" @selected($val('estado_novedad') == 1)>Cancelada</option>
        </select>
        @error('estado_novedad')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Botón de enviar --}}
    <div>
        <button type="submit"
                class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
            {{ isset($novedad) ? 'Actualizar Novedad' : 'Crear Novedad' }}
        </button>
    </div>

</div>
