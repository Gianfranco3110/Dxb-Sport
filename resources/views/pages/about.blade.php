@extends('layouts.app')

@section('title', 'Nosotros — DXB Exports')
@section('description', 'Cinco años conectando Dubái con Latinoamérica. 10KA FZC, empresa legalmente constituida en Emiratos Árabes Unidos.')

@section('content')

<div class="pt-20 min-h-screen bg-[#0D0E0E]">

    <div class="bg-[#0D0E0E] border-b border-[#686D6F]/20 py-6 md:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <p class="inline-flex items-center bg-[#174638] text-[#F5F3EE] text-xs tracking-[0.25em] uppercase mb-3 font-semibold px-2.5 py-1 rounded-sm">La empresa</p>
            <h1 class="section-title mb-2">Nosotros</h1>
            <div class="brand-line"></div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 md:py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">

            {{-- Foto sola a la izquierda --}}
            <div class="rounded-sm overflow-hidden border border-[#686D6F]/20">
                <div class="relative">
                    <img src="{{ asset('storage/operations/containers/28695839-6C5F-4D4E-ADBC-C26D52BF1E81.JPG') }}"
                         alt="Operación contenedores DXB Exports"
                         class="w-full h-auto object-contain bg-[#0D0E0E] block">
                    <div class="absolute top-4 left-4">
                        <span class="bg-[#174638] text-[#F5F3EE] text-[10px] tracking-[0.2em] uppercase px-3 py-1.5 rounded-sm font-semibold">Operación real — Dubái</span>
                    </div>
                </div>
            </div>

            {{-- Datos legales --}}
            <div x-data="{ showLicense: false }">

                {{-- Modal licencia --}}
                <div x-show="showLicense"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 z-[100] bg-black/90 flex items-center justify-center p-4"
                     @click.self="showLicense = false"
                     @keydown.escape.window="showLicense = false">
                    <div class="relative bg-[#F5F3EE] border border-[#686D6F]/20 rounded-sm max-w-lg w-full p-4">
                        <button @click="showLicense = false" class="absolute top-3 right-3 text-[#686D6F] hover:text-[#0D0E0E]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                        <p class="text-[#174638] text-xs uppercase tracking-widest mb-3 font-semibold">Licencia Comercial</p>
                        <div class="w-full rounded-sm border border-[#686D6F]/20 overflow-hidden select-none"
                             style="background-image: url('{{ asset('images/Licencia.PNG') }}'); background-size: contain; background-repeat: no-repeat; background-position: center; aspect-ratio: 3/4;"
                             oncontextmenu="return false;"
                             ondragstart="return false;">
                        </div>
                        <p class="text-[#686D6F] text-xs mt-3 text-center">10KA FZC — Licencia N° 4305704.01 — SPC FZ, Sharjah, UAE</p>
                    </div>
                </div>

                <div class="card-dark p-8">
                    <h3 class="text-[#F5F3EE] font-bold text-lg mb-6 flex items-center gap-3">
                        <span class="w-8 h-8 rounded-sm bg-[#174638] flex items-center justify-center">
                            <svg class="w-4 h-4 text-[#F5F3EE]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </span>
                        Respaldo Legal
                    </h3>
                    <p class="text-[#F5F3EE]/70 text-xs leading-relaxed mb-6">DXB Exports es una marca comercial operada por 10KA FZC, empresa legalmente constituida en Emiratos Árabes Unidos.</p>
                    <dl class="space-y-4">
                        @foreach([
                            ['Nombre legal', '10KA FZC'],
                            ['Nombre comercial', 'DXB Exports'],
                            ['Licencia comercial', '4305704.01'],
                            ['Free Zone', 'SPC FZ'],
                            ['Emirato de registro', 'Sharjah'],
                            ['Año de constitución', '2023'],
                            ['Dirección', 'Business Bay, Dubái'],
                            ['Estado de licencia', 'Activa'],
                            ['País', 'Emiratos Árabes Unidos'],
                        ] as $item)
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between py-3 border-b border-[#686D6F]/20 last:border-0 gap-1">
                            <dt class="text-[#686D6F] text-xs uppercase tracking-wide">{{ $item[0] }}</dt>
                            <dd class="text-[#F5F3EE] text-sm font-medium
                                {{ $item[0] === 'Estado de licencia' ? 'text-[#174638]' : '' }}">
                                @if($item[0] === 'Estado de licencia')
                                    <span class="flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#174638] inline-block"></span>
                                        {{ $item[1] }}
                                    </span>
                                @else
                                    {{ $item[1] }}
                                @endif
                            </dd>
                        </div>
                        @endforeach
                    </dl>
                </div>

                <div class="mt-6 space-y-3">
                    <button @click="showLicense = true"
                            class="btn-outline flex items-center justify-center gap-2 w-full">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Ver información de licencia
                    </button>
                    <a href="https://wa.me/971585440869?text=Hola,%20quisiera%20más%20información%20sobre%20DXB%20Exports"
                       target="_blank"
                       class="btn-gold flex items-center justify-center gap-2 w-full">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Habla con un asesor
                    </a>
                </div>

                {{-- Bloque movido desde columna izquierda — ahora debajo de Habla con asesor --}}
                <div class="mt-8 rounded-sm overflow-hidden border border-[#686D6F]/20">
                    <div class="bg-[#1A1C1C] px-6 py-5 border-b border-[#686D6F]/20">
                        <h2 class="text-xl md:text-2xl font-bold text-[#F5F3EE] leading-tight">
                            Cinco años conectando Dubái con Latinoamérica.
                        </h2>
                        <div class="w-10 h-0.5 bg-[#174638] mt-3"></div>
                    </div>
                    <div class="bg-[#0D0E0E] px-6 py-6">
                        <p class="text-[#686D6F] text-sm leading-relaxed">Operación respaldada por <span class="text-[#F5F3EE] font-medium">10KA FZC</span> en Dubái — logística integral en un solo lugar.</p>
                        <div class="grid grid-cols-4 gap-3 mt-6">
                            @foreach([
                                ['5+', 'Años'],
                                ['🇦🇪', 'Dubái'],
                                ['LATAM', 'Destinos'],
                                ['24/7', 'Soporte'],
                            ] as $stat)
                            <div class="bg-[#174638] border border-[#174638] py-3.5 text-center rounded-sm">
                                <div class="text-[#F5F3EE] text-lg md:text-xl font-bold leading-none">{{ $stat[0] }}</div>
                                <div class="text-[#F5F3EE]/80 text-[10px] uppercase tracking-wide mt-1">{{ $stat[1] }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
