@extends('layouts.app')

@section('title', 'Operaciones Reales — DXB Exports')
@section('description', 'Galería de operaciones reales: inspecciones, carga, contenedores, embarques y entregas desde Dubái.')

@section('content')

<div class="pt-20 min-h-screen bg-[#0A0A0A]">

    {{-- Hero Section --}}
    <div class="bg-gradient-to-b from-[#111111] to-[#0A0A0A] border-b border-[#1A1A1A] py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
            <p class="text-[#C9A84C] text-xs tracking-[0.3em] uppercase mb-2">Transparencia y confianza</p>
            <h1 class="section-title mb-3">Operaciones Reales</h1>
            <div class="gold-line mx-auto"></div>
            <p class="text-gray-400 text-sm mt-4 max-w-2xl mx-auto leading-relaxed">
                Cada vehículo que exportamos pasa por un proceso riguroso de inspección, preparación y carga.
                Aquí mostramos <span class="text-white">evidencia real</span> de nuestras operaciones en Dubái.
            </p>
        </div>
    </div>

    {{-- Trust Indicators --}}
    <div class="bg-[#0A0A0A] py-6 border-b border-[#1A1A1A]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="p-4">
                    <p class="text-[#C9A84C] text-3xl md:text-4xl font-bold">500+</p>
                    <p class="text-gray-500 text-xs mt-1 uppercase tracking-wide">Vehículos exportados</p>
                </div>
                <div class="p-4">
                    <p class="text-[#C9A84C] text-3xl md:text-4xl font-bold">15+</p>
                    <p class="text-gray-500 text-xs mt-1 uppercase tracking-wide">Países destino</p>
                </div>
                <div class="p-4">
                    <p class="text-[#C9A84C] text-3xl md:text-4xl font-bold">100%</p>
                    <p class="text-gray-500 text-xs mt-1 uppercase tracking-wide">Documentación legal</p>
                </div>
                <div class="p-4">
                    <p class="text-[#C9A84C] text-3xl md:text-4xl font-bold">24/7</p>
                    <p class="text-gray-500 text-xs mt-1 uppercase tracking-wide">Soporte al cliente</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Video / Galería --}}
    <div class="bg-[#111111] py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-10">
                <h2 class="text-xl md:text-2xl font-bold text-white mb-2">Galería de Operaciones</h2>
                <p class="text-gray-500 text-sm">Videos y fotos reales de nuestras operaciones en Dubái</p>
            </div>

            @if($categories->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($items as $category => $ops)
                    @foreach($ops as $op)
                    <div>
                        @if($op->type === 'video')
                            <div class="relative aspect-video bg-[#0A0A0A] rounded-sm overflow-hidden border border-[#2A2A2A]">
                                <video src="{{ asset('storage/' . $op->url) }}"
                                       class="w-full h-full object-cover"
                                       controls
                                       preload="metadata">
                                </video>
                            </div>
                            @if($op->caption)
                            <p class="text-gray-500 text-xs mt-2 text-center">{{ $op->caption }}</p>
                            @endif
                        @else
                            <div class="relative aspect-video bg-[#0A0A0A] rounded-sm overflow-hidden border border-[#2A2A2A] group">
                                <img src="{{ asset('storage/' . $op->url) }}"
                                     alt="{{ $op->caption ?? 'Operación DXB Exports' }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
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
            <div class="text-center py-24">
                <svg class="w-16 h-16 text-[#2A2A2A] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <p class="text-gray-500 mb-2">La galería de operaciones se está cargando.</p>
                <p class="text-gray-600 text-sm">Pronto encontrarás aquí fotos y videos de nuestras operaciones reales en Dubái.</p>
            </div>
            @endif
        </div>
    </div>

    {{-- Trust Section --}}
    <div class="bg-[#0A0A0A] py-12 border-t border-[#1A1A1A]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-[#111111] p-6 rounded-sm border border-[#2A2A2A]">
                    <svg class="w-8 h-8 text-[#C9A84C] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <h4 class="text-white font-semibold mb-2">Inspección Detallada</h4>
                    <p class="text-gray-500 text-sm">Cada vehículo es inspeccionado y documentado antes del embarque.</p>
                </div>
                <div class="bg-[#111111] p-6 rounded-sm border border-[#2A2A2A]">
                    <svg class="w-8 h-8 text-[#C9A84C] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    <h4 class="text-white font-semibold mb-2">Carga Profesional</h4>
                    <p class="text-gray-500 text-sm">Aseguramos una carga segura con personal especializado.</p>
                </div>
                <div class="bg-[#111111] p-6 rounded-sm border border-[#2A2A2A]">
                    <svg class="w-8 h-8 text-[#C9A84C] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                    <h4 class="text-white font-semibold mb-2">Documentación Completa</h4>
                    <p class="text-gray-500 text-sm">Todos los documentos legales para exportación desde Dubái.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- CTA --}}
    <div class="bg-gradient-to-t from-[#111111] to-[#0A0A0A] py-16 text-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <h3 class="text-xl md:text-2xl font-bold text-white mb-3">¿Listo para importar tu vehículo?</h3>
            <p class="text-gray-400 text-sm mb-6">Nuestro equipo te guía paso a paso en todo el proceso</p>
            <a href="https://wa.me/971585440869?text=Hola,%20quisiera%20más%20información%20sobre%20sus%20operaciones"
               target="_blank"
               class="btn-gold inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z\"/></svg>
                Habla con un asesor
            </a>
        </div>
    </div>
</div>

@endsection
