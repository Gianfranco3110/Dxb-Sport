@extends('layouts.app')

@section('title', 'Vehículos — DXB Exports')
@section('description', 'Catálogo de vehículos disponibles desde Dubái. Toyota, Mitsubishi, Suzuki, Lexus, Nissan y más.')

@section('content')

<div class="pt-20 min-h-screen bg-[#0A0A0A]">

    {{-- Header --}}
    <div class="bg-[#111111] border-b border-[#1A1A1A] py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <p class="text-[#C9A84C] text-xs tracking-[0.3em] uppercase mb-3">Catálogo</p>
            <h1 class="section-title mb-2">Vehículos</h1>
            <div class="gold-line"></div>
            <p class="text-gray-400 text-sm mt-3 max-w-xl">Selecciona una marca para ver el catálogo disponible. Los precios se consultan según disponibilidad, origen, versión y destino.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-10">

        {{-- Filtro de marcas --}}
        <div class="flex flex-wrap gap-3 mb-10">
            @foreach($brands as $brand)
            <a href="{{ route('vehicles.brand', $brand->slug) }}"
               class="px-5 py-2.5 text-sm font-medium rounded-sm transition-all duration-200 border
                      {{ $activeBrand && $activeBrand->id === $brand->id
                         ? 'bg-[#C9A84C] text-black border-[#C9A84C]'
                         : 'border-[#2A2A2A] text-gray-400 hover:border-[#C9A84C] hover:text-[#C9A84C]' }}">
                {{ $brand->name }}
                @if($brand->vehicles_count > 0)
                <span class="ml-1 text-xs opacity-70">({{ $brand->vehicles_count }})</span>
                @endif
            </a>
            @endforeach
        </div>

        {{-- Grid de vehículos --}}
        @if($vehicles->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($vehicles as $vehicle)
            <div class="card-dark overflow-hidden group">
                {{-- Imagen --}}
                <div class="aspect-[16/10] bg-[#111111] overflow-hidden relative">
                    @if($vehicle->images && count($vehicle->images) > 0)
                        <img src="{{ asset('storage/' . $vehicle->images[0]) }}"
                             alt="{{ $vehicle->brand->name }} {{ $vehicle->model }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center gap-2">
                            <svg class="w-12 h-12 text-[#2A2A2A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="text-[#2A2A2A] text-xs">Foto próximamente</span>
                        </div>
                    @endif
                    {{-- Badge disponibilidad --}}
                    <div class="absolute top-3 right-3">
                        <span class="text-xs px-2 py-1 rounded-sm font-medium
                            {{ $vehicle->availability === 'available' ? 'bg-green-900/80 text-green-400' : '' }}
                            {{ $vehicle->availability === 'on_request' ? 'bg-[#C9A84C]/20 text-[#C9A84C]' : '' }}
                            {{ $vehicle->availability === 'sold' ? 'bg-red-900/80 text-red-400' : '' }}">
                            {{ $vehicle->availability_label }}
                        </span>
                    </div>
                </div>

                {{-- Info --}}
                <div class="p-5">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <p class="text-[#C9A84C] text-xs font-medium tracking-wide uppercase">{{ $vehicle->brand->name }}</p>
                            <h3 class="text-white font-bold text-lg leading-tight">{{ $vehicle->model }}</h3>
                        </div>
                        <span class="text-gray-500 text-sm font-medium">{{ $vehicle->year }}</span>
                    </div>

                    @if($vehicle->version)
                    <p class="text-gray-400 text-sm mb-4">{{ $vehicle->version }}</p>
                    @endif

                    <div class="grid grid-cols-2 gap-2 mb-4">
                        @if($vehicle->engine)
                        <div class="bg-[#111111] rounded px-3 py-2">
                            <p class="text-gray-600 text-xs">Motor</p>
                            <p class="text-gray-300 text-xs font-medium mt-0.5">{{ $vehicle->engine }}</p>
                        </div>
                        @endif
                        @if($vehicle->transmission)
                        <div class="bg-[#111111] rounded px-3 py-2">
                            <p class="text-gray-600 text-xs">Transmisión</p>
                            <p class="text-gray-300 text-xs font-medium mt-0.5">{{ $vehicle->transmission }}</p>
                        </div>
                        @endif
                        @if($vehicle->origin_country)
                        <div class="bg-[#111111] rounded px-3 py-2 col-span-2">
                            <p class="text-gray-600 text-xs">País de origen</p>
                            <p class="text-gray-300 text-xs font-medium mt-0.5">{{ $vehicle->origin_country }}</p>
                        </div>
                        @endif
                    </div>

                    <div class="flex items-center justify-between pt-3 border-t border-[#2A2A2A]">
                        <span class="text-gray-500 text-xs italic">Consultar precio</span>
                        <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '971558369427') }}?text=Hola,%20me%20interesa%20el%20{{ urlencode($vehicle->brand->name . ' ' . $vehicle->model . ' ' . $vehicle->year) }}"
                           target="_blank"
                           class="flex items-center gap-1.5 bg-[#25D366] hover:bg-[#20BA5A] text-white text-xs font-semibold px-3 py-2 rounded-sm transition-colors">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Cotizar
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-20">
            <svg class="w-16 h-16 text-[#2A2A2A] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10l2 2h10l2-2z"/></svg>
            <p class="text-gray-500 mb-2">No hay vehículos cargados aún.</p>
            <p class="text-gray-600 text-sm">Contáctanos para consultar disponibilidad.</p>
        </div>
        @endif
    </div>
</div>

@endsection
