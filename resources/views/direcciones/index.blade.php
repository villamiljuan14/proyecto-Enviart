<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Direcciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4" style="padding: 16px;">
            {{-- Botón para crear nueva dirección --}}
            <a href="{{ route('direcciones.create') }}"
               class="inline-block bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                + Nueva Dirección
            </a>

            {{-- ✅ Alerta de éxito --}}
            @if (session('ok'))
                <div id="alert-success"
                     class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative transition-opacity duration-500"
                     role="alert">
                    <strong class="font-bold">¡Éxito! </strong>
                    <span class="block sm:inline">{{ session('ok') }}</span>
                    <button type="button"
                            class="absolute top-0 bottom-0 right-0 px-4 py-3 text-green-500"
                            onclick="document.getElementById('alert-success').remove();">✖</button>
                </div>
                <script>
                    setTimeout(() => {
                        const alert = document.getElementById('alert-success');
                        if (alert) {
                            alert.style.opacity = '0';
                            setTimeout(() => alert.remove(), 500);
                        }
                    }, 3000);
                </script>
            @endif

            {{-- ❌ Alerta de error --}}
            @if ($errors->any())
                <div id="alert-error"
                     class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative transition-opacity duration-500"
                     role="alert">
                    <strong class="font-bold">Error: </strong>
                    <ul class="list-disc pl-6">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button"
                            class="absolute top-0 bottom-0 right-0 px-4 py-3 text-red-500"
                            onclick="document.getElementById('alert-error').remove();">✖</button>
                </div>
                <script>
                    setTimeout(() => {
                        const alert = document.getElementById('alert-error');
                        if (alert) {
                            alert.style.opacity = '0';
                            setTimeout(() => alert.remove(), 500);
                        }
                    }, 5000);
                </script>
            @endif
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                {{-- 🟦 Tabla de direcciones con DataTables --}}
                <table id="direccionesTable" class="table-auto w-full border-collapse border border-blue-400 shadow-lg">
                    <thead class="bg-blue-700 text-white">
                        <tr>
                            <th class="border border-blue-400 px-4 py-2">Tipo</th>
                            <th class="border border-blue-400 px-4 py-2">Calle</th>
                            <th class="border border-blue-400 px-4 py-2">Carrera</th>
                            <th class="border border-blue-400 px-4 py-2">Número</th>
                            <th class="border border-blue-400 px-4 py-2">Barrio</th>
                            <th class="border border-blue-400 px-4 py-2">Ciudad</th>
                            <th class="border border-blue-400 px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($direcciones as $direccion)
                            <tr class="hover:bg-blue-50">
                                <td class="border border-blue-400 px-4 py-2">{{ $direccion->tipo_origen ?? '—' }}</td>
                                <td class="border border-blue-400 px-4 py-2">{{ $direccion->calle_dir ?? '—' }}</td>
                                <td class="border border-blue-400 px-4 py-2">{{ $direccion->carrera_dir ?? '—' }}</td>
                                <td class="border border-blue-400 px-4 py-2">{{ $direccion->numero_dir ?? '—' }}</td>
                                <td class="border border-blue-400 px-4 py-2">{{ $direccion->barrio_dir ?? '—' }}</td>
                                <td class="border border-blue-400 px-4 py-2">{{ $direccion->cuidad ?? '—' }}</td>
                                <td class="border border-blue-400 px-4 py-2 text-center space-x-2">
                                    <a href="{{ route('direcciones.edit', $direccion->id_direccion) }}"
                                       class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold py-1 px-3 rounded">
                                        Editar
                                    </a>
                                    <form action="{{ route('direcciones.destroy', $direccion->id_direccion) }}" method="POST"
                                          class="inline-block"
                                          onsubmit="return confirm('¿Eliminar esta dirección?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-block bg-red-600 hover:bg-red-700 text-white text-sm font-bold py-1 px-3 rounded">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- DataTables con exportación (igual que en pedidos) --}}
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
                        $('#direccionesTable').DataTable({
                            pageLength: 20,
                            dom: 'Bfrtip',
                            language: {
                                url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                            },
                            buttons: [
                                { extend: 'copy', title: 'Reporte de Direcciones' },
                                { extend: 'csv', title: 'Reporte de Direcciones' },
                                { extend: 'excel', title: 'Reporte de Direcciones' },
                                { extend: 'pdf', title: 'Reporte de Direcciones' },
                                { extend: 'print', title: 'Reporte de Direcciones' }
                            ]
                        });
                    });
                </script>

                <style>
                    div.dt-buttons {
                        margin-bottom: 1rem;
                    }
                </style>
            </div>
        </div>
    </div>
</x-app-layout>