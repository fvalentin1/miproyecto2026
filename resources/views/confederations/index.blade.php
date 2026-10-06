<x-app-layout>

    <x-slot name="title">
        {{ __('Confederaciones - Laravel') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Confederaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <p class="mb-4">
                <a href="{{ route('confederations.create') }}">
                    <x-button variant="success"><b>+</b> Crear una confederación</x-button>
                </a>
            </p>

            <hr>

            @if (session('success'))
                @push('scripts')
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'success',
                                title: @json(session('success')),
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

            @if ($confederations->count() > 0)

                <div class="overflow-x-auto bg-white shadow-sm sm:rounded-lg p-4">
                    <table id="confederations-table" class="min-w-full">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Logo</th>
                                <th>Nombre</th>
                                <th>Sigla</th>
                                <th>Continente</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($confederations as $confederation)
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ $confederation->id }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        @if ($confederation->logo)
                                            <img src="{{ asset('storage/' . $confederation->logo) }}"
                                                alt="Logo {{ $confederation->acronym }}" class="h-10">
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ $confederation->name }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ $confederation->acronym }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ $confederation->continent }}</td>

                                    <td class="whitespace-nowrap">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('confederations.show', $confederation) }}" title="Ver confederación">
                                                <x-button variant="info" aria-label="Ver confederación">
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

                                            <a href="{{ route('confederations.edit', $confederation) }}" title="Editar confederación">
                                                <x-button variant="warning" aria-label="Editar confederación">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>
                                                </x-button>
                                            </a>

                                            <form id="delete-form-{{ $confederation->id }}"
                                                action="{{ route('confederations.destroy', $confederation) }}"
                                                method="POST" onsubmit="return false;">
                                                @csrf
                                                @method('DELETE')

                                                <x-button variant="danger" type="button" aria-label="Eliminar confederación"
                                                    onclick="confirmDelete('{{ $confederation->id }}', @js($confederation->name))">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </x-button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>No hay confederaciones registradas</p>
            @endif
        </div>

    </div>

    @push('styles')
        <link href="https://cdn.datatables.net/v/dt/dt-3.0.4/datatables.min.css" rel="stylesheet"
            integrity="sha384-dyhRde+GiWmmWsTApLdW2QzwCxs+V2Q57kWn4HEDkUlnQ0W3FBcOdFQOTi6GH93I" crossorigin="anonymous">

        <style>
            .dt-length select {
                min-width: 60px !important;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.datatables.net/v/dt/dt-3.0.4/datatables.min.js"
            integrity="sha384-owKiaRfArzkmDUy/DJR5R0F81FUlK4DvQF4+zi5iiIWH0rxoBGI61yjrqiWr4PdX" crossorigin="anonymous">
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tabla = document.getElementById('confederations-table');

                if (tabla) {
                    new DataTable('#confederations-table', {
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
                            targets: [1, -1],
                            orderable: false,
                            searchable: false
                        }],
                    });
                }
            });

            function confirmDelete(id, name) {
                Swal.fire({
                    title: '¿Eliminar confederación?',
                    text: `¿Seguro que deseas eliminar la confederación "${name}"?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#dc2626',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`delete-form-${id}`).submit();
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>
