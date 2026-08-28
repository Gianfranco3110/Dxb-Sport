@extends('layouts.app')

@section('title', 'DXB Exports — Vehículos desde Dubái hacia Latinoamérica')
@section('description', 'Suministro de vehículos, logística y shipping marítimo desde Dubái hacia Latinoamérica. Atención 24/7 en español e inglés.')

@section('content')

{{-- HERO --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    {{-- Background Video Parallax --}}
    <div class="absolute inset-0 z-0">
        <video autoplay muted loop playsinline
               class="absolute inset-0 w-full h-full object-cover scale-110"
               style="transform: scale(1.1);">
            <source src="{{ asset('storage/operations/loading/83187734b4544af8b44b304189167351.MP4') }}" type="video/mp4">
        </video>
        {{-- Fallback imagen --}}
        <img src="{{ asset('images/hero.webp') }}"
             alt="DXB Exports"
             class="absolute inset-0 w-full h-full object-cover"
             style="display:none"
             id="hero-fallback">
        <div class="absolute inset-0 bg-gradient-to-b from-black/75 via-black/60 to-[#0A0A0A]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 text-center pt-24 pb-16">
        <p class="text-[#C9A84C] text-xs sm:text-sm tracking-[0.3em] uppercase mb-6 font-medium">Dubái · Latinoamérica</p>
        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight mb-6 max-w-5xl mx-auto">
            Vehículos directamente desde fábrica o proveedor hasta el cliente.
        </h1>
        <p class="text-gray-300 text-base sm:text-lg md:text-xl max-w-2xl mx-auto mb-10 leading-relaxed">
            Suministro de vehículos, logística y shipping marítimo desde Dubái hacia Latinoamérica, con atención 24/7 en español e inglés.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="https://wa.me/971585440869?text=Hola,%20me%20interesa%20información%20sobre%20vehículos"
               target="_blank"
               class="btn-gold flex items-center gap-2 w-full sm:w-auto justify-center">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                Habla con un asesor
            </a>
            <a href="{{ route('vehicles') }}" class="btn-outline w-full sm:w-auto justify-center text-center">Ver vehículos</a>
            <a href="https://wa.me/971585440869?text=Hola,%20quisiera%20solicitar%20una%20cotización"
               target="_blank"
               class="text-sm text-gray-400 hover:text-white border border-gray-600 hover:border-gray-400 px-6 py-3 rounded-sm transition-all w-full sm:w-auto text-center">
                Solicitar cotización
            </a>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 animate-bounce">
        <svg class="w-5 h-5 text-[#C9A84C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
    </div>
</section>

{{-- INDICADORES --}}
<section class="bg-[#111111] border-y border-[#1A1A1A] py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 text-center">
            @foreach([
                ['5+', 'Años de experiencia'],
                ['🇦🇪', 'Operación desde Dubái'],
                ['LATAM', 'Exportaciones hacia Latinoamérica'],
                ['24/7', 'Atención en español e inglés'],
                ['360°', 'Suministro, logística y shipping'],
            ] as $stat)
            <div class="flex flex-col items-center gap-2">
                <span class="text-[#C9A84C] text-2xl sm:text-3xl font-bold">{{ $stat[0] }}</span>
                <span class="text-gray-400 text-xs sm:text-sm leading-tight">{{ $stat[1] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- MARCAS DESTACADAS --}}
<section class="py-16 bg-[#0A0A0A] border-y border-[#1A1A1A]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex items-end justify-between mb-8">
            <div>
                <p class="text-[#C9A84C] text-xs tracking-[0.3em] uppercase mb-2">Catálogo por marca</p>
                <h2 class="section-title text-2xl">Explora por marca</h2>
            </div>
            <a href="{{ route('vehicles') }}" class="hidden sm:inline text-xs text-[#C9A84C] hover:underline">Ver todos →</a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($brands as $brand)
            <a href="{{ route('vehicles.brand', $brand->slug) }}" class="card-dark p-6 flex flex-col items-center justify-center gap-3 hover:border-[#C9A84C] transition-colors group">
                <span class="text-white font-bold text-lg tracking-widest group-hover:text-[#C9A84C] transition-colors">{{ $brand->name }}</span>
                <span class="text-[#C9A84C] text-xs font-medium">{{ $brand->vehicles_count }} modelos</span>
                <span class="text-gray-500 text-xs group-hover:text-gray-300">Ver catálogo →</span>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- POR QUÉ DXB EXPORTS --}}
<section class="py-20 md:py-28 bg-[#0A0A0A]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="max-w-2xl mb-14">
            <p class="text-[#C9A84C] text-xs tracking-[0.3em] uppercase mb-3">Nuestra diferencia</p>
            <h2 class="section-title mb-4">Por qué DXB Exports</h2>
            <div class="gold-line"></div>
            <p class="text-gray-400 leading-relaxed mt-4">
                DXB Exports no es un showroom limitado a los vehículos que tiene en inventario. Tenemos acceso directo a fábricas y proveedores en múltiples países.
            </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach([
                ['Acceso directo a fábricas y proveedores', 'Trabajamos directamente con fabricantes, sin intermediarios.'],
                ['Vehículos desde múltiples orígenes', 'Dubái, China, India, Tailandia e Indonesia.'],
                ['Mayor variedad de modelos', 'Acceso a versiones y especificaciones no disponibles localmente.'],
                ['Nuevos y usados', 'Suministro de vehículos nuevos y usados según tu necesidad.'],
                ['Precios competitivos', 'Para particulares, importadores y showrooms.'],
                ['Inspección antes del embarque', 'Verificación y revisión de especificaciones garantizada.'],
                ['Logística propia', 'Equipo propio de coordinación logística y carga.'],
                ['Shipping marítimo', 'Exportación directa hacia puertos de Latinoamérica.'],
                ['Soporte 24/7', 'Atención en español e inglés en todo momento.'],
            ] as $item)
            <div class="card-dark p-5 flex gap-4 items-start">
                <div class="w-2 h-2 rounded-full bg-[#C9A84C] mt-2 shrink-0"></div>
                <div>
                    <h3 class="text-white font-semibold text-sm mb-1">{{ $item[0] }}</h3>
                    <p class="text-gray-500 text-xs leading-relaxed">{{ $item[1] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA CENTRAL --}}
<section class="py-16 bg-[#111111] border-y border-[#1A1A1A]">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center">
        <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">¿Tienes un vehículo en mente?</h2>
        <p class="text-gray-400 mb-8">Dinos la marca, modelo, cantidad y destino. Nosotros buscamos la unidad con nuestros proveedores y te enviamos la cotización.</p>
        <a href="https://wa.me/971585440869?text=Hola,%20quisiera%20solicitar%20una%20cotización%20de%20vehículo"
           target="_blank"
           class="btn-gold inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            Solicitar cotización por WhatsApp
        </a>
    </div>
</section>

@endsection
