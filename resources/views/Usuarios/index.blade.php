<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <a href="{{ route('Usuarios.create') }}" 
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
               Crear Nuevo Usuario
            </a>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <table id="usuarios" class="table-auto w-full border-collapse border border-blue-400 shadow-lg">
                    <thead class="bg-blue-600 text-black">
                        <tr>
                            <th class="border border-blue-400 px-4 py-2">ID</th>
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
                                <td class="border border-blue-400 px-4 py-2">{{ $usuario->ID_USUARIO }}</td>
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

                {{-- jQuery + DataTables (CDN) --}}
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
                <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
                <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

                <script>
                    $(function () {
                        $('#usuarios').DataTable({
                            pageLength: 20,
                            dom: 'Bfrtip',
                            language: {
                                url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                            },
                            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                        });
                    });
                </script>

                {{-- Estilo para separar botones de la tabla --}}
                <style>
                    div.dt-buttons {
                        margin-bottom: 1rem; 
                    }
                </style>

            </div>
        </div>
    </div>
</x-app-layout>
