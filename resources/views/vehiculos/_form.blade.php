@php
    $val = fn($key, $default = '') => old($key, isset($vehiculo) ? ($vehiculo->{$key} ?? $default) : $default);
@endphp

<div class="space-y-4">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Tipo de Vehículo *</label>
            <input type="text" name="tipo_vehiculo" value="{{ $val('tipo_vehiculo') }}"
                   class="w-full border rounded px-3 py-2" required maxlength="45">
            @error('tipo_vehiculo')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Marca *</label>
            <input type="text" name="marca_vehiculo" value="{{ $val('marca_vehiculo') }}"
                   class="w-full border rounded px-3 py-2" required maxlength="45">
            @error('marca_vehiculo')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Modelo *</label>
            <input type="text" name="modelo_vehiculo" value="{{ $val('modelo_vehiculo') }}"
                   class="w-full border rounded px-3 py-2" required maxlength="45">
            @error('modelo_vehiculo')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Año</label>
            <input type="number" name="año_vehiculo" value="{{ $val('año_vehiculo') }}"
                   class="w-full border rounded px-3 py-2" min="1900" max="2099">
            @error('año_vehiculo')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Placa *</label>
            <input type="text" name="placa_vehiculo" value="{{ $val('placa_vehiculo') }}"
                   class="w-full border rounded px-3 py-2" required maxlength="45">
            @error('placa_vehiculo')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Capacidad de Carga</label>
            <input type="text" name="capacidad_carga" value="{{ $val('capacidad_carga') }}"
                   class="w-full border rounded px-3 py-2" maxlength="45">
            @error('capacidad_carga')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Estado *</label>
        <select name="estado_vehiculo" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Selecciona --</option>
            <option value="Activo" @selected($val('estado_vehiculo') === 'Activo')>Activo</option>
            <option value="Inactivo" @selected($val('estado_vehiculo') === 'Inactivo')>Inactivo</option>
        </select>
        @error('estado_vehiculo')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Usuario Asignado</label>
        <select name="usuarios_id_usuario" class="w-full border rounded px-3 py-2">
            <option value="">-- Sin asignar --</option>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id_usuario }}" @selected($val('usuarios_id_usuario') == $usuario->id_usuario)>
                    {{ $usuario->primer_nombre }} {{ $usuario->primer_apellido }}
                </option>
            @endforeach
        </select>
        @error('usuarios_id_usuario')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

</div>