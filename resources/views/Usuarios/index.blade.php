<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <table class="table-auto w-full border-collapse border border-blue-400 shadow-lg">
                    <thead class="bg-blue-600 text-black">
                        <tr>
                            <th class="border border-blue-400 px-4 py-2">Email</th>
                            <th class="border border-blue-400 px-4 py-2">Nombre</th>
                            <th class="border border-blue-400 px-4 py-2">Apellido</th>
                            <th class="border border-blue-400 px-4 py-2">Estado</th>
                            <th class="border border-blue-400 px-4 py-2">Rol (ID)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr class="hover:bg-blue-50">
                                <td class="border border-blue-400 px-4 py-2">{{ $usuario->EMAIL_USUARIO }}</td>
                                <td class="border border-blue-400 px-4 py-2">
                                    {{ $usuario->PRIMER_NOMBRE_USUARIO }}
                                    {{ $usuario->SEGUNDO_NOMBRE_USUARIO }}
                                </td>
                                <td class="border border-blue-400 px-4 py-2">
                                    {{ $usuario->PRIMER_APELLIDO_USUARIO }}
                                    {{ $usuario->SEGUNDO_APELLIDO_USUARIO }}
                                </td>
                                <td class="border border-blue-400 px-4 py-2 text-center">
                                    @if($usuario->ESTADO_USUARIO === 1)
                                        <span class="px-2 py-1 bg-green-200 text-green-800 rounded">Activo</span>
                                    @else
                                        <span class="px-2 py-1 bg-red-200 text-red-800 rounded">Inactivo</span>
                                    @endif
                                </td>
                                <td class="border border-blue-400 px-4 py-2 text-center">
                                    {{ $usuario->ROL_ID_ROL }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
