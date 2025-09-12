@php
    // Para edición, $usuario llega definido; en creación es null.
    $val = fn($key, $default = '') => old($key, isset($usuario) ? ($usuario->{$key} ?? $default) : $default);
@endphp

<div class="space-y-4">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Documento *</label>
            <input type="text" name="doc_usuario" value="{{ $val('doc_usuario') }}"
                   class="w-full border rounded px-3 py-2" required maxlength="45">
            @error('doc_usuario')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Tipo Documento *</label>
            <select name="tipo_documento" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Selecciona --</option>
                <option value="CE" @selected($val('tipo_documento') === 'CE')>CE</option>
                <option value="TI" @selected($val('tipo_documento') === 'TI')>TI</option>
                <option value="CC" @selected($val('tipo_documento') === 'CC')>CC</option>
            </select>
            @error('tipo_documento')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Correo electrónico *</label>
        <input type="email" name="email_usuario" value="{{ $val('email_usuario') }}"
               class="w-full border rounded px-3 py-2" required maxlength="100">
        @error('email_usuario')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Primer Nombre *</label>
            <input type="text" name="primer_nombre" value="{{ $val('primer_nombre') }}"
                   class="w-full border rounded px-3 py-2" required maxlength="80">
            @error('primer_nombre')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Segundo Nombre</label>
            <input type="text" name="segundo_nombre" value="{{ $val('segundo_nombre') }}"
                   class="w-full border rounded px-3 py-2" maxlength="80">
            @error('segundo_nombre')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Primer Apellido *</label>
            <input type="text" name="primer_apellido" value="{{ $val('primer_apellido') }}"
                   class="w-full border rounded px-3 py-2" required maxlength="80">
            @error('primer_apellido')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Segundo Apellido</label>
            <input type="text" name="segundo_apellido" value="{{ $val('segundo_apellido') }}"
                   class="w-full border rounded px-3 py-2" maxlength="80">
            @error('segundo_apellido')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Teléfono</label>
        <input type="text" name="telefono_usuario" value="{{ $val('telefono_usuario') }}"
               class="w-full border rounded px-3 py-2" maxlength="20">
        @error('telefono_usuario')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Contraseña *</label>
        <input type="password" name="contraseña_usuario" class="w-full border rounded px-3 py-2" required maxlength="45">
        @error('contraseña_usuario')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Rol *</label>
        <select name="rol_id_rol" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Selecciona --</option>
            @foreach($roles as $rol)
                <option value="{{ $rol->id_rol }}" @selected($val('rol_id_rol') == $rol->id_rol)>
                    {{ $rol->tipo_rol }}
                </option>
            @endforeach
        </select>
        @error('rol_id_rol')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

</div>
