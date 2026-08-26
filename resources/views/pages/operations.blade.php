@extends('layouts.app')

@section('title', 'Operaciones Reales — DXB Exports')
@section('description', 'Galería de operaciones reales: inspecciones, carga, contenedores, embarques y entregas desde Dubái.')

@section('content')

<div class="pt-20 min-h-screen bg-[#0A0A0A]">

    <div class="bg-[#111111] border-b border-[#1A1A1A] py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <p class="text-[#C9A84C] text-xs tracking-[0.3em] uppercase mb-3">Evidencia real</p>
            <h1 class="section-title mb-2">Operaciones Reales</h1>
            <div class="gold-line"></div>
            <p class="text-gray-400 text-sm mt-3 max-w-xl">Aquí mostramos nuestra operación real en Dubái: inspecciones, carga, contenedores, embarques y entregas en destino.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-10 md:py-16"
         x-data="{ activeCategory: 'all' }">

        @if($categories->count() > 0)
        {{-- Filtros --}}
        <div class="flex flex-wrap gap-3 mb-10">
            <button @click="activeCategory = 'all'"
                    :class="activeCategory === 'all' ? 'bg-[#C9A84C] text-black border-[#C9A84C]' : 'border-[#2A2A2A] text-gray-400 hover:border-[#C9A84C] hover:text-[#C9A84C]'"
                    class="px-4 py-2 text-sm font-medium rounded-sm transition-all border">
                Todos
            </button>
            @foreach($categories as $cat)
            <button @click="activeCategory = '{{ $cat }}'"
                    :class="activeCategory === '{{ $cat }}' ? 'bg-[#C9A84C] text-black border-[#C9A84C]' : 'border-[#2A2A2A] text-gray-400 hover:border-[#C9A84C] hover:text-[#C9A84C]'"
                    class="px-4 py-2 text-sm font-medium rounded-sm transition-all border">
                {{ \App\Models\Operation::categoryLabel($cat) }}
            </button>
            @endforeach
        </div>

        {{-- Galería --}}
        <div class="columns-1 sm:columns-2 lg:columns-3 gap-4 space-y-4">
            @foreach($items as $category => $ops)
                @foreach($ops as $op)
                <div x-show="activeCategory === 'all' || activeCategory === '{{ $category }}'"
                     x-transition
                     class="break-inside-avoid">
                    @if($op->type === 'video')
                        <div class="relative aspect-video bg-[#111111] rounded-sm overflow-hidden">
                            <video src="{{ asset('storage/' . $op->url) }}"
                                   class="w-full h-full object-cover"
                                   controls
                                   preload="metadata">
                            </video>
                        </div>
                    @else
                        <div class="relative overflow-hidden rounded-sm group">
                            <img src="{{ asset('storage/' . $op->url) }}"
                                 alt="{{ $op->caption ?? 'Operación DXB Exports' }}"
                                 class="w-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @if($op->caption)
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4 opacity-0 group-hover:opacity-100 transition-opacity">
                                <p class="text-white text-xs">{{ $op->caption }}</p>
                            </div>
                            @endif
                        </div>
                    @endif
                </div>
                @endforeach
            @endforeach
        </div>
        @else
        {{-- Estado vacío --}}
        <div class="text-center py-24">
            <svg class="w-16 h-16 text-[#2A2A2A] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            <p class="text-gray-500 mb-2">La galería de operaciones se está cargando.</p>
            <p class="text-gray-600 text-sm">Pronto encontrarás aquí fotos y videos de nuestras operaciones reales en Dubái.</p>
        </div>
        @endif

        {{-- CTA --}}
        <div class="mt-16 text-center">
            <p class="text-gray-400 text-sm mb-6">¿Quieres ver más o tienes preguntas sobre nuestro proceso?</p>
            <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '971558369427') }}?text=Hola,%20quisiera%20más%20información%20sobre%20sus%20operaciones"
               target="_blank"
               class="btn-gold inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                Habla con un asesor
            </a>
        </div>
    </div>
</div>

@endsection
