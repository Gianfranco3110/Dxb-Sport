@extends('layouts.app')

@section('title', 'Vehículos — DXB Exports')
@section('description', 'Catálogo de vehículos disponibles desde Dubái. Toyota, Mitsubishi, Suzuki, Lexus, Nissan y más.')

@section('content')

<div class="pt-20 min-h-screen bg-[#0D0E0E]" x-data="vehicleGallery()">

    {{-- Header --}}
    <div class="bg-[#0D0E0E] border-b border-[#686D6F]/20 py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <p class="inline-flex items-center bg-[#174638] text-[#F5F3EE] text-xs tracking-[0.25em] uppercase mb-3 font-semibold px-2.5 py-1 rounded-sm">Catálogo</p>
            <h1 class="section-title mb-2">Vehículos</h1>
            <div class="brand-line"></div>
            <p class="text-[#F5F3EE]/70 text-sm mt-3 max-w-xl">Selecciona una marca para ver el catálogo disponible. Los precios se consultan según disponibilidad, origen, versión y destino.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-10">

        {{-- Filtro de marcas --}}
        <div class="flex flex-wrap gap-3 mb-6">
            @foreach($brands as $brand)
            <a href="{{ route('vehicles.brand', $brand->slug) }}"
               class="px-5 py-2.5 text-sm font-medium rounded-sm transition-all duration-200 border
                      {{ $activeBrand && $activeBrand->id === $brand->id
                         ? 'bg-[#174638] text-[#F5F3EE] border-[#174638]'
                         : 'border-[#686D6F] text-[#686D6F] hover:border-[#F5F3EE] hover:text-[#F5F3EE]' }}">
                {{ $brand->name }}
                @if($brand->vehicles_count > 0)
                <span class="ml-1 text-xs opacity-70">({{ $brand->vehicles_count }})</span>
                @endif
            </a>
            @endforeach
        </div>

        {{-- Subfiltro por familia/modelo --}}
        @if($activeBrand && isset($families) && $families->count() > 0)
        <div class="flex flex-wrap gap-2 mb-8">
            <a href="{{ route('vehicles.brand', $activeBrand->slug) }}"
               class="px-4 py-2 text-xs font-medium rounded-full transition-all duration-200 border
                      {{ empty($activeFamily) ? 'bg-[#F5F3EE] text-[#0D0E0E] border-[#F5F3EE]' : 'border-[#686D6F] text-[#686D6F] hover:border-[#F5F3EE] hover:text-[#F5F3EE]' }}">
                Todas ({{ $activeBrand->vehicles_count }})
            </a>
            @foreach($families as $family)
            @php $famCount = \App\Models\Vehicle::where('brand_id', $activeBrand->id)->where('model', $family)->where('estatus', 'activo')->count(); @endphp
            <a href="{{ route('vehicles.brand', $activeBrand->slug) }}?family={{ urlencode($family) }}"
               class="px-4 py-2 text-xs font-medium rounded-full transition-all duration-200 border
                      {{ $activeFamily === $family ? 'bg-[#174638] text-[#F5F3EE] border-[#174638]' : 'border-[#686D6F] text-[#686D6F] hover:border-[#F5F3EE] hover:text-[#F5F3EE]' }}">
                {{ $family }} <span class="opacity-60">({{ $famCount }})</span>
            </a>
            @endforeach
        </div>
        @endif

        {{-- Contador --}}
        @if($vehicles->count() > 0)
        @php
            $isPaginator = $vehicles instanceof \Illuminate\Contracts\Pagination\Paginator;
            $totalShowing = $isPaginator ? $vehicles->total() : $vehicles->count();
            $currentCount = $vehicles->count();
        @endphp
        <p class="text-[#F5F3EE]/60 text-xs mb-4">
            @if($isPaginator)
                Mostrando {{ $vehicles->firstItem() }}–{{ $vehicles->lastItem() }} de {{ $vehicles->total() }} {{ $activeFamily ? 'unidades de ' . $activeFamily : 'vehículos de ' . $activeBrand->name }}
            @else
                Mostrando {{ $currentCount }} {{ $activeFamily ? 'unidades de ' . $activeFamily : 'vehículos de ' . $activeBrand->name }}
            @endif
            @if($activeFamily)
            — <a href="{{ route('vehicles.brand', $activeBrand->slug) }}" class="text-[#174638] hover:text-[#1f5a48] hover:underline">ver todos</a>
            @endif
        </p>
        @endif

        {{-- Grid de vehículos --}}
        @if($vehicles->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($vehicles as $vehicle)
            @php
                $vehicleData = [
                    'id' => $vehicle->id,
                    'brand' => $vehicle->brand->name,
                    'model' => $vehicle->model,
                    'year' => $vehicle->year,
                    'version' => $vehicle->version,
                    'engine' => $vehicle->engine,
                    'transmission' => $vehicle->transmission,
                    'origin_country' => $vehicle->origin_country,
                    'availability' => $vehicle->availability,
                    'availability_label' => $vehicle->availability_label,
                    'images' => $vehicle->images ?? [],
                ];
            @endphp
            <div class="card-dark overflow-hidden group cursor-pointer flex flex-col"
                 @click="openVehicle(@js($vehicleData))">
                {{-- Imagen --}}
                <div class="aspect-[16/10] bg-[#111313] overflow-hidden relative">
                    @if($vehicle->images && count($vehicle->images) > 0)
                        <img src="{{ asset('storage/' . $vehicle->images[0]) }}"
                             alt="{{ $vehicle->brand->name }} {{ $vehicle->model }} {{ $vehicle->version }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                             loading="lazy">
                        {{-- Overlay profesional al hover --}}
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-colors duration-300 flex items-center justify-center">
                            <span class="opacity-0 group-hover:opacity-100 bg-black/70 text-white text-xs tracking-widest uppercase px-3 py-2 rounded-sm border border-white/20 transition-all duration-300 translate-y-2 group-hover:translate-y-0">
                                Ver galería
                            </span>
                        </div>
                        @if(count($vehicle->images) > 1)
                        <div class="absolute bottom-2 left-2 bg-black/70 backdrop-blur-sm text-white text-[11px] px-2 py-1 rounded-sm flex items-center gap-1.5 border border-white/10">
                            <svg class="w-3.5 h-3.5 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ count($vehicle->images) }} fotos
                        </div>
                        {{-- Tira de miniaturas sutil en hover (solo CSS) --}}
                        @if(count($vehicle->images) > 1)
                        <div class="absolute bottom-2 right-2 hidden sm:flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            @foreach(array_slice($vehicle->images, 0, 3) as $thumb)
                            <div class="w-8 h-8 rounded-sm overflow-hidden border border-white/30 shadow">
                                <img src="{{ asset('storage/' . $thumb) }}" class="w-full h-full object-cover" alt="">
                            </div>
                            @endforeach
                            @if(count($vehicle->images) > 4)
                            <div class="w-8 h-8 rounded-sm bg-black/80 text-white text-[10px] flex items-center justify-center font-medium border border-white/30">+{{ count($vehicle->images) - 3 }}</div>
                            @endif
                        </div>
                        @endif
                        @endif
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center gap-2">
                            <svg class="w-12 h-12 text-[#686D6F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="text-[#F5F3EE]/50 text-xs">Foto próximamente</span>
                        </div>
                    @endif
                    {{-- Badge disponibilidad --}}
                    <div class="absolute top-3 right-3">
                        <span class="text-xs px-2.5 py-1 rounded-sm font-medium
                            {{ $vehicle->availability === 'available' ? 'bg-[#174638] text-[#F5F3EE]' : '' }}
                            {{ $vehicle->availability === 'on_request' ? 'bg-[#174638] text-[#F5F3EE]' : '' }}
                            {{ $vehicle->availability === 'sold' ? 'bg-red-700 text-white' : '' }}">
                            {{ $vehicle->availability_label }}
                        </span>
                    </div>
                </div>

                {{-- Info --}}
                <div class="p-5 flex flex-col flex-1">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <p class="text-[#174638] text-xs font-semibold tracking-wide uppercase">{{ $vehicle->brand->name }}</p>
                            <h3 class="text-[#F5F3EE] font-bold text-lg leading-tight">{{ $vehicle->model }}</h3>
                        </div>
                        <span class="text-[#686D6F] text-sm font-medium">{{ $vehicle->year }}</span>
                    </div>

                    @if($vehicle->version)
                    <p class="text-[#F5F3EE]/60 text-sm mb-4">{{ $vehicle->version }}</p>
                    @endif

                    <div class="grid grid-cols-2 gap-2 mb-4">
                        @if($vehicle->engine)
                        <div class="bg-[#0D0E0E] rounded px-3 py-2 border border-[#686D6F]/20">
                            <p class="text-[#686D6F] text-xs">Motor</p>
                            <p class="text-[#F5F3EE] text-xs font-medium mt-0.5">{{ $vehicle->engine }}</p>
                        </div>
                        @endif
                        @if($vehicle->transmission)
                        <div class="bg-[#0D0E0E] rounded px-3 py-2 border border-[#686D6F]/20">
                            <p class="text-[#686D6F] text-xs">Transmisión</p>
                            <p class="text-[#F5F3EE] text-xs font-medium mt-0.5">{{ $vehicle->transmission }}</p>
                        </div>
                        @endif
                        @if($vehicle->origin_country)
                        <div class="bg-[#0D0E0E] rounded px-3 py-2 col-span-2 border border-[#686D6F]/20">
                            <p class="text-[#686D6F] text-xs">País de origen</p>
                            <p class="text-[#F5F3EE] text-xs font-medium mt-0.5">{{ $vehicle->origin_country }}</p>
                        </div>
                        @endif
                    </div>

                    <div class="flex items-center justify-between pt-3 border-t border-[#686D6F]/20 mt-auto">
                        <span class="text-[#686D6F] text-xs italic">Consultar precio</span>
                        <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '971558369427') }}?text=Hola,%20me%20interesa%20el%20{{ urlencode($vehicle->brand->name . ' ' . $vehicle->model . ' ' . $vehicle->year) }}"
                           target="_blank"
                           @click.stop
                           class="flex items-center gap-1.5 bg-[#174638] hover:bg-[#1f5a48] text-[#F5F3EE] text-xs font-semibold px-3 py-2 rounded-sm transition-colors">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Cotizar
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Paginación --}}
        @if($vehicles instanceof \Illuminate\Contracts\Pagination\Paginator && $vehicles->hasPages())
        <div class="mt-10 flex justify-center">
            {{ $vehicles->links() }}
        </div>
        @endif
        @else
        <div class="text-center py-20">
            <svg class="w-16 h-16 text-[#686D6F] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10l2 2h10l2-2z"/></svg>
            <p class="text-[#F5F3EE]/70 mb-2">No hay vehículos cargados aún.</p>
            <p class="text-[#F5F3EE]/50 text-sm">Contáctanos para consultar disponibilidad.</p>
        </div>
        @endif
    </div>

    {{-- Modal Detalle Vehículo — Profesional --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6"
         style="display: none;"
         @keydown.escape.window="close()"
         @click.self="close()">

        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" @click="close()"></div>

        {{-- Panel --}}
        <div x-show="open"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95 translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="relative w-full max-w-5xl max-h-[90vh] bg-[#0D0E0E] rounded-lg overflow-hidden shadow-2xl border border-[#686D6F]/30 flex flex-col"
             @click.away="close()">

            {{-- Botón cerrar --}}
            <button @click="close()"
                    class="absolute top-3 right-3 z-20 w-9 h-9 rounded-full bg-black/60 hover:bg-black/80 text-white flex items-center justify-center border border-[#686D6F]/30 backdrop-blur-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <div class="overflow-y-auto flex-1 flex flex-col lg:flex-row">
                {{-- Galería izquierda --}}
                <div class="flex-1 bg-black p-3 sm:p-4 flex flex-col gap-3 min-w-0">
                    {{-- Imagen principal --}}
                    <div class="relative aspect-[16/10] bg-[#0D0E0E] rounded-lg overflow-hidden flex items-center justify-center border border-[#686D6F]/20">
                        <template x-if="images.length > 0">
                            <img :src="currentImage"
                                 :alt="vehicle ? vehicle.brand + ' ' + vehicle.model : ''"
                                 class="w-full h-full object-contain">
                        </template>
                        <template x-if="!images.length">
                            <div class="flex flex-col items-center justify-center gap-2 text-[#686D6F]">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span class="text-xs">Sin imágenes</span>
                            </div>
                        </template>

                        {{-- Flechas --}}
                        <template x-if="images.length > 1">
                            <div>
                                <button @click.stop="prev()"
                                        class="absolute left-2 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-black/60 hover:bg-black/80 text-white flex items-center justify-center border border-[#686D6F]/30 backdrop-blur-sm transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                </button>
                                <button @click.stop="next()"
                                        class="absolute right-2 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-black/60 hover:bg-black/80 text-white flex items-center justify-center border border-[#686D6F]/30 backdrop-blur-sm transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </button>
                            </div>
                        </template>

                        {{-- Contador --}}
                        <div x-show="images.length > 1" class="absolute bottom-3 left-1/2 -translate-x-1/2 bg-black/70 text-white text-xs px-2.5 py-1 rounded-full border border-[#686D6F]/30 backdrop-blur-sm">
                            <span x-text="(current + 1) + ' / ' + images.length"></span>
                        </div>
                    </div>

                    {{-- Grid thumbnails --}}
                    <div x-show="images.length > 1" class="grid grid-cols-4 sm:grid-cols-6 lg:grid-cols-4 xl:grid-cols-5 gap-2">
                        <template x-for="(img, idx) in images" :key="idx">
                            <button @click="go(idx)"
                                     :class="current === idx ? 'ring-2 ring-[#174638] opacity-100' : 'opacity-60 hover:opacity-100 ring-1 ring-[#686D6F]/20'"
                                    class="aspect-[4/3] rounded-md overflow-hidden bg-[#1A1C1C] transition-all duration-200">
                                <img :src="'/storage/' + img" class="w-full h-full object-cover" :alt="'Foto ' + (idx+1)">
                            </button>
                        </template>
                    </div>
                </div>

                {{-- Info derecha --}}
                <div class="w-full lg:w-[380px] shrink-0 bg-[#0D0E0E] p-6 flex flex-col border-t lg:border-t-0 lg:border-l border-[#686D6F]/20">
                    <template x-if="vehicle">
                        <div class="flex flex-col h-full">
                            <div>
                                <p class="text-[#174638] text-xs tracking-[0.2em] uppercase font-semibold" x-text="vehicle.brand"></p>
                                <h2 class="text-[#F5F3EE] text-2xl font-bold leading-tight mt-1" x-text="vehicle.model"></h2>
                                <p class="text-[#F5F3EE]/60 text-sm mt-1" x-text="vehicle.year + (vehicle.version ? ' · ' + vehicle.version : '')"></p>

                                <div class="mt-3 inline-flex">
                                    <span class="text-xs px-2.5 py-1 rounded-sm font-medium border"
                                          :class="{
                                              'bg-[#174638] text-[#F5F3EE]': vehicle.availability === 'available',
                                              'bg-[#174638] text-[#F5F3EE]': vehicle.availability === 'on_request',
                                              'bg-red-700 text-white': vehicle.availability === 'sold'
                                          }"
                                          x-text="vehicle.availability_label"></span>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-2 mt-6">
                                <template x-if="vehicle.engine">
                                    <div class="bg-[#1A1C1C] rounded px-3 py-3 border border-[#686D6F]/20">
                                        <p class="text-[#686D6F] text-[11px] tracking-wide uppercase">Motor</p>
                                        <p class="text-[#F5F3EE] text-sm font-medium mt-1" x-text="vehicle.engine"></p>
                                    </div>
                                </template>
                                <template x-if="vehicle.transmission">
                                    <div class="bg-[#1A1C1C] rounded px-3 py-3 border border-[#686D6F]/20">
                                        <p class="text-[#686D6F] text-[11px] tracking-wide uppercase">Transmisión</p>
                                        <p class="text-[#F5F3EE] text-sm font-medium mt-1" x-text="vehicle.transmission"></p>
                                    </div>
                                </template>
                                <template x-if="vehicle.origin_country">
                                    <div class="bg-[#1A1C1C] rounded px-3 py-3 border border-[#686D6F]/20 col-span-2">
                                        <p class="text-[#686D6F] text-[11px] tracking-wide uppercase">País de origen</p>
                                        <p class="text-[#F5F3EE] text-sm font-medium mt-1" x-text="vehicle.origin_country"></p>
                                    </div>
                                </template>
                            </div>

                            <div class="mt-auto pt-6 space-y-3">
                                <a :href="'https://wa.me/{{ env('WHATSAPP_NUMBER', '971558369427') }}?text=' + encodeURIComponent('Hola, me interesa el ' + vehicle.brand + ' ' + vehicle.model + ' ' + vehicle.year)"
                                   target="_blank"
                                   class="w-full flex items-center justify-center gap-2 bg-[#174638] hover:bg-[#1f5a48] text-[#F5F3EE] text-sm font-semibold px-4 py-3 rounded-sm transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                    Cotizar por WhatsApp
                                </a>
                                <button @click="close()" class="w-full text-[#686D6F] hover:text-[#F5F3EE] text-sm py-2 transition-colors">Cerrar</button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
