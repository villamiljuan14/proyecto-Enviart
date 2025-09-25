@php
    $val = fn($key, $default = '') => old($key, isset($direccion) ? ($direccion->{$key} ?? $default) : $default);
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div>
        <label for="tipo_origen" class="block text-sm font-medium text-gray-700">Tipo *</label>
        <select name="tipo_origen" id="tipo_origen" class="mt-1 block w-full border rounded px-3 py-2" required>
            <option value="">-- Selecciona --</option>
            <option value="Origen" @selected($val('tipo_origen') === 'Origen')>Origen</option>
            <option value="Destino" @selected($val('tipo_origen') === 'Destino')>Destino</option>
        </select>
        @error('tipo_origen')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="calle_dir" class="block text-sm font-medium text-gray-700">Calle *</label>
        <input type="text" name="calle_dir" id="calle_dir" class="mt-1 block w-full border rounded px-3 py-2" required maxlength="100" value="{{ $val('calle_dir') }}">
        @error('calle_dir')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="carrera_dir" class="block text-sm font-medium text-gray-700">Carrera *</label>
        <input type="text" name="carrera_dir" id="carrera_dir" class="mt-1 block w-full border rounded px-3 py-2" required maxlength="100" value="{{ $val('carrera_dir') }}">
        @error('carrera_dir')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="numero_dir" class="block text-sm font-medium text-gray-700">Número *</label>
        <input type="text" name="numero_dir" id="numero_dir" class="mt-1 block w-full border rounded px-3 py-2" required maxlength="45" value="{{ $val('numero_dir') }}">
        @error('numero_dir')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="barrio_dir" class="block text-sm font-medium text-gray-700">Barrio *</label>
        <input type="text" name="barrio_dir" id="barrio_dir" class="mt-1 block w-full border rounded px-3 py-2" required maxlength="100" value="{{ $val('barrio_dir') }}">
        @error('barrio_dir')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="codigo_postal" class="block text-sm font-medium text-gray-700">Código Postal *</label>
        <input type="text" name="codigo_postal" id="codigo_postal" class="mt-1 block w-full border rounded px-3 py-2" required maxlength="8" value="{{ $val('codigo_postal') }}">
        @error('codigo_postal')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="cuidad" class="block text-sm font-medium text-gray-700">Ciudad *</label>
        <input type="text" name="cuidad" id="cuidad" class="mt-1 block w-full border rounded px-3 py-2" required maxlength="45" value="{{ $val('cuidad') }}">
        @error('cuidad')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="departamento" class="block text-sm font-medium text-gray-700">Departamento *</label>
        <input type="text" name="departamento" id="departamento" class="mt-1 block w-full border rounded px-3 py-2" required maxlength="45" value="{{ $val('departamento') }}">
        @error('departamento')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="punto_referencia" class="block text-sm font-medium text-gray-700">Punto de Referencia</label>
        <input type="text" name="punto_referencia" id="punto_referencia" class="mt-1 block w-full border rounded px-3 py-2" maxlength="45" value="{{ $val('punto_referencia') }}">
        @error('punto_referencia')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

</div>