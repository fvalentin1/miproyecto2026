<x-app-layout>

    <x-slot name="title">
        {{ __('Clubes de Futbol - Laravel') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clubes de Futbol') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <p class="mb-4">
                <a href="{{ route('clubs.create') }}">
                    <x-button variant="success"><b>+</b> Crear un club</x-button>
                </a>
            </p>

            <hr>

            {{-- @if (session('success'))
                <p class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4 rounded relative"
                    role="alert">
                    {{ session('success') }}
                </p>
            @endif --}}

            @if (session('success'))
                @push('scripts')
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'success',
                                title: '{{ session('success') }}',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        });
                    </script>
                @endpush
            @endif

            @if ($clubs->count() > 0)

                <div class="overflow-x-auto bg-white shadow-sm sm:rounded-lg p-4">
                    <table id="clubs-table" class="min-w-full">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Titulos</th>
                                <th>Ciudad</th>
                                <th>Pais</th>
                                <th>Colores</th>
                                <th>Estadio</th>
                                <th>Fundación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($clubs as $club)
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ $club->id }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ $club->name }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ $club->titles }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ $club->city }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ $club->country }}</td>
                                    <td class="px-4 py-3 max-w-40 truncate">{{ $club->colors }}</td>
                                    <td class="px-4 py-3 max-w-[200px] truncate">{{ $club->stadium }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ $club->founded_year }}</td>

                                    <td class="whitespace-nowrap">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('clubs.show', $club) }}" title="Ver club">
                                                <x-button variant="info" aria-label="Ver club">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">

                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />

                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                </x-button>
                                            </a>

                                            <a href="{{ route('clubs.edit', $club) }}" title="Editar club">
                                                <x-button variant="warning" aria-label="Editar club">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">

                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>
                                                </x-button>
                                            </a>


                                            <form id="delete-form-{{ $club->id }}"
                                                action="{{ route('clubs.destroy', $club) }}" method="POST"
                                                onsubmit="return false;">
                                                @csrf
                                                @method('DELETE')

                                                <x-button variant="danger" type="button" aria-label="Eliminar club"
                                                    onclick="confirmDelete('{{ $club->id }}', '{{ $club->name }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">

                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </x-button>
                                            </form>

                                            {{-- <form action="{{ route('clubs.destroy', $club) }}" method="POST"
                                                onsubmit="return confirm('¿Seguro que deseas eliminar el club {{ $club->name }}?');">

                                                @csrf
                                                @method('DELETE')

                                                <x-button variant="danger" type="submit" aria-label="Eliminar club">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">

                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </x-button> --}}
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>No hay clubes registrados</p>

            @endif
        </div>

    </div>



    {{-- CSS específico de esta vista --}}
    @push('styles')
        {{-- Estilos de DataTables --}}
        <link href="https://cdn.datatables.net/v/dt/dt-3.0.4/datatables.min.css" rel="stylesheet"
            integrity="sha384-dyhRde+GiWmmWsTApLdW2QzwCxs+V2Q57kWn4HEDkUlnQ0W3FBcOdFQOTi6GH93I" crossorigin="anonymous">

        {{-- Estilos de los botones de DataTables --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/4.0.3/css/buttons.dataTables.min.css">

        <style>
            /* Corrección Dropdown */
            .dt-length select {
                min-width: 60px !important;
            }


            /* Estilos para los botones de exportación */
            .btn-export-excel {
                background-color: #198754 !important;
                border: 1px solid #146c43 !important;
                color: white !important;
                border-radius: 0.375rem !important;
                padding: 0.5rem 1rem !important;
                font-weight: 600 !important;
            }

            .btn-export-excel:hover {
                background-color: #146c43 !important;
                border-color: #0f5132 !important;
            }
        </style>
    @endpush

    {{-- JavaScript específico de esta vista --}}
    @push('scripts')
        {{-- Scripts de DataTables --}}
        <script src="https://cdn.datatables.net/v/dt/dt-3.0.4/datatables.min.js"
            integrity="sha384-owKiaRfArzkmDUy/DJR5R0F81FUlK4DvQF4+zi5iiIWH0rxoBGI61yjrqiWr4PdX" crossorigin="anonymous">
        </script>

        {{-- Scripts de los botones de DataTables --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/4.0.3/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/4.0.3/js/buttons.html5.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tabla = document.getElementById('clubs-table');

                if (tabla) {
                    new DataTable('#clubs-table', {

                        // Configuración de la tabla
                        responsive: true,
                        language: {
                            url: 'https://cdn.datatables.net/plug-ins/3.0.4/i18n/es-ES.json'
                        },
                        pageLength: 10,

                        lengthMenu: [5, 10, 25, 50],

                        order: [
                            [0, 'asc']
                        ],

                        columnDefs: [{
                            targets: -1,
                            orderable: false,
                            searchable: false
                        }],

                        // Botones de exportación
                        layout: {
                            topStart: 'pageLength',

                            topEnd: [
                                'search',
                                {
                                    buttons: [{
                                        extend: 'excelHtml5',
                                        text: 'Exportar a Excel',
                                        className: 'btn-export-excel',
                                        title: 'Clubes de fútbol',
                                        exportOptions: {
                                            columns: ':not(:last-child)'
                                        }
                                    }]
                                }
                            ]
                        },
                    });
                }
            });
        </script>

        <script>
            function confirmDelete(clubId, clubName) {
                Swal.fire({
                    title: '¿Eliminar club?',
                    text: `¿Seguro que deseas eliminar el club "${clubName}"?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#dc2626',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`delete-form-${clubId}`).submit();
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>
