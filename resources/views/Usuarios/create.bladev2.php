<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Registrar Nuevo Usuario') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-8 py-6">
        <!-- ⚠️ Aquí debes definir la ruta cuando tengas usuarios.store -->
        <form action="" method="POST" class="bg-white shadow-md rounded-lg p-8">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Documento -->
                <div>
                    <label class="block text-base font-semibold text-gray-700 mb-1">
                        Documento
                    </label>
                    <input type="text" name="documento" placeholder="Ej: 1000521888"
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                </div>


                <!-- Tipo Documento -->
                <div>
                    <label class="block text-base font-semibold text-gray-700 mb-1">
                        Tipo Documento
                    </label>
                    <select name="tipo_documento"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                        <option value="CC">Cédula de Ciudadanía</option>
                        <option value="TI">Tarjeta de Identidad</option>
                        <option value="CE">Cédula de Extranjería</option>
                    </select>
                </div>

                <!-- Primer Nombre -->
                <div>
                    <label class="block text-base font-semibold text-gray-700 mb-1">
                        Primer Nombre
                    </label>
                    <input type="text" name="primer_nombre" placeholder="Ej: Juan"
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                </div>

                <!-- Segundo Nombre -->
                <div>
                    <label class="block text-base font-semibold text-gray-700 mb-1">
                        Segundo Nombre
                    </label>
                    <input type="text" name="segundo_nombre" placeholder="Ej: Manuel"
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                </div>

                <!-- Primer Apellido -->
                <div>
                    <label class="block text-base font-semibold text-gray-700 mb-1">
                        Primer Apellido
                    </label>
                    <input type="text" name="primer_apellido" placeholder="Ej: Villamil"
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                </div>

                <!-- Segundo Apellido -->
                <div>
                    <label class="block text-base font-semibold text-gray-700 mb-1">
                        Segundo Apellido
                    </label>
                    <input type="text" name="segundo_apellido" placeholder="Ej: Vargas"
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                </div>

                <!-- Correo Electrónico -->
                <div>
                    <label class="block text-base font-semibold text-gray-700 mb-1">
                        Correo Electrónico
                    </label>
                    <input type="email" name="email" placeholder="ejemplo@correo.com"
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                </div>

                <!-- Número Teléfono -->
                <div>
                    <label class="block text-base font-semibold text-gray-700 mb-1">
                        Número Teléfono
                    </label>
                    <input type="text" name="telefono" placeholder="Ej: 3104942588"
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                </div>

                <!-- Contraseña -->
                <div>
                    <label class="block text-base font-semibold text-gray-700 mb-1">
                        Contraseña
                    </label>
                    <input type="password" name="password"
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                </div>

                <!-- Rol -->
                <div>
                    <label class="block text-base font-semibold text-gray-700 mb-1">
                        Rol
                    </label>
                    <select name="rol"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                        <option value="1">Proveedor</option>
                        <option value="2">Cliente</option>
                        <option value="3">Mensajero</option>
                        <option value="4">Administrador</option>
                    </select>
                </div>

                <!-- Estado -->
                <div>
                    <label class="block text-base font-semibold text-gray-700 mb-1">
                        Estado
                    </label>
                    <select name="estado"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex justify-center mt-8 gap-4">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md shadow">
                    Guardar
                </button>
                <a href="{{ url()->previous() }}"
                   class="bg-red-700 hover:bg-red-600 text-white font-semibold px-6 py-2 rounded-md shadow">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
