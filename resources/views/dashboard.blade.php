<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-6">

                <!-- Kompeten -->
                <div>
                    <h3 class="text-base font-semibold text-green-600 mb-2 flex items-center">
                        <span class="w-2.5 h-2.5 bg-green-500 rounded-full mr-2"></span>
                        Kompeten
                    </h3>
                    <ul class="pl-5 space-y-1 text-sm text-gray-700">
                        @forelse($mahasiswaKompeten ?? [] as $mhs)
                            <li>
                                <span class="font-medium text-gray-900">{{ $mhs->nama_lengkap }}</span> — {{$mhs->skema->nama_skema ?? '-' }}
                            </li>
                        @empty
                            <li class="text-gray-400 italic">Tidak ada data.</li>
                        @endforelse
                    </ul>
                </div>

                <!-- Belum Kompeten -->
                <div>
                    <h3 class="text-base font-semibold text-red-600 mb-2 flex items-center">
                        <span class="w-2.5 h-2.5 bg-red-500 rounded-full mr-2"></span>
                        Belum Kompeten
                    </h3>
                    <ul class="pl-5 space-y-1 text-sm text-gray-700">
                        @forelse($mahasiswaBelumKompeten ?? [] as $mhs)
                            <li>
                                <span class="font-medium text-gray-900">{{ $mhs->nama_lengkap }}</span> — {{$mhs->skema->nama_skema ?? '-' }}
                            </li>
                        @empty
                            <li class="text-gray-400 italic">Tidak ada data.</li>
                        @endforelse
                    </ul>
                </div>

                <!-- Menunggu -->
                <div>
                    <h3 class="text-base font-semibold text-yellow-600 mb-2 flex items-center">
                        <span class="w-2.5 h-2