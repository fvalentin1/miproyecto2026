<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }}

                    <x-button variant="primary" class="mt-4">
                        Primary Button
                    </x-button>

                    <x-button variant="secondary" class="mt-4">
                        Secondary Button
                    </x-button>

                    <x-button variant="success" class="mt-4">
                        Success Button
                    </x-button>

                    <x-button variant="danger" class="mt-4">
                        Danger Button
                    </x-button>

                    <x-button variant="warning" class="mt-4">
                        Warning Button
                    </x-button>

                    <x-button variant="info" class="mt-4">
                        Info Button
                    </x-button>

                    <br>
                    <br>
                    <hr> --}}

                    <div class="mt-8 max-w-md">
                        <canvas id="clubsChart"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @push('styles')

    @endpush

    @push('scripts')
        <script>
            // app.js es un módulo diferido: Chart existe solo cuando el DOM ya cargó.
            document.addEventListener('DOMContentLoaded', () => {
                new Chart(document.getElementById('clubsChart'), {
                    type: 'doughnut',
                    data: {
                        labels: ['Antes del 2000', 'Desde el 2000'],
                        datasets: [{
                            data: [{{ $before2000 }}, {{ $after2000 }}],
                            backgroundColor: ['#3b82f6', '#f59e0b'],
                        }],
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Clubes según año de fundación',
                                font: {
                                    size: 18,
                                },
                            },
                        },
                    },
                });
            });
        </script>
    @endpush
</x-app-layout>
