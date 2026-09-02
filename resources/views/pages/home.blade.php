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
        <div class="absolute inset-0 bg-gradient-to-b from-black/75 via-black/60 to-[#0D0E0E]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 text-center pt-20 pb-12">
        <p class="text-[#F5F3EE] text-xs tracking-[0.3em] uppercase mb-4 font-medium">DUBÁI · ASIA · GCC · LATINOAMÉRICA</p>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white leading-tight mb-4 max-w-3xl mx-auto">
            Vehículos directamente de fábrica a Latinoamérica.
        </h1>
        <p class="text-[#F5F3EE]/80 text-sm sm:text-base max-w-xl mx-auto mb-8 leading-relaxed">
            Acceso a vehículos desde fábricas y proveedores en Asia y todo el GCC, con inspección, logística y shipping marítimo coordinados desde Dubái.
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
               class="text-sm text-[#F5F3EE] hover:text-white border border-[#686D6F] hover:border-[#F5F3EE] px-6 py-3 rounded-sm transition-all w-full sm:w-auto text-center">
                Solicitar cotización
            </a>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 animate-bounce">
        <svg class="w-5 h-5 text-[#686D6F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
    </div>
</section>

{{-- INDICADORES — Fondo claro para descanso visual --}}
<section class="bg-[#F5F3EE] border-y border-[#686D6F]/20 py-10">
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
                <span class="text-[#174638] text-2xl sm:text-3xl font-bold">{{ $stat[0] }}</span>
                <span class="text-[#686D6F] text-xs sm:text-sm leading-tight">{{ $stat[1] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- MARCAS DESTACADAS --}}
<section class="py-16 bg-[#0D0E0E] border-y border-[#686D6F]/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex items-end justify-between mb-8">
            <div>
                <p class="inline-flex items-center bg-[#174638] text-[#F5F3EE] text-xs tracking-[0.25em] uppercase mb-2 font-semibold px-2.5 py-1 rounded-sm">Catálogo por marca</p>
                <h2 class="section-title text-2xl">Explora por marca</h2>
            </div>
            <a href="{{ route('vehicles') }}" class="hidden sm:inline text-xs text-[#174638] hover:text-[#1f5a48] hover:underline">Ver todos →</a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($brands as $brand)
            <a href="{{ route('vehicles.brand', $brand->slug) }}" class="card-dark p-6 flex flex-col items-center justify-center gap-3 hover:border-[#174638]/50 transition-colors group min-h-[170px]">
                @if($brand->logo)
                    @if($brand->slug === 'lexus')
                        {{-- Lexus: placa blanca para contraste, mismo alto visual que resto (h-14 sm:h-16) --}}
                        <div class="bg-white rounded-full w-14 h-14 sm:w-16 sm:h-16 flex items-center justify-center p-2 shadow-sm shrink-0">
                            <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="max-h-9 sm:max-h-11 w-auto max-w-[44px] sm:max-w-[52px] object-contain" loading="lazy">
                        </div>
                    @else
                        <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="h-14 sm:h-16 w-auto max-w-[120px] object-contain" loading="lazy">
                    @endif
                    <span class="sr-only">{{ $brand->name }}</span>
                @else
                    <span class="text-[#F5F3EE] font-bold text-lg tracking-widest group-hover:text-[#174638] transition-colors">{{ $brand->name }}</span>
                @endif
                <span class="text-white text-xs font-medium">{{ $brand->vehicles_count }} modelos</span>
                <span class="text-[#686D6F] text-xs group-hover:text-[#F5F3EE]">Ver catálogo →</span>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- POR QUÉ DXB EXPORTS — Rediseño premium bento --}}
<section class="py-8 md:py-12 bg-[#0D0E0E] relative overflow-hidden">
    {{-- sutil patrón decorativo --}}
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle at 1px 1px, #686D6F 1px, transparent 0); background-size: 32px 32px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative">
        {{-- Header centrado premium --}}
        <div class="max-w-3xl mx-auto text-center mb-12 md:mb-14">
            <p class="inline-flex items-center bg-[#174638] text-[#F5F3EE] text-[11px] tracking-[0.25em] uppercase font-semibold px-3 py-1.5 rounded-sm mb-4">Nuestra diferencia</p>
            <h2 class="text-3xl md:text-4xl font-bold text-[#F5F3EE] leading-tight">Por qué <span class="text-[#174638]">DXB Exports</span></h2>
            <p class="text-[#686D6F] text-sm mt-3 max-w-xl mx-auto leading-relaxed">Un sistema integral que une fábricas, inspección y logística bajo un mismo control desde Dubái.</p>
            <div class="w-12 h-0.5 bg-[#174638] mx-auto mt-5"></div>
        </div>

        {{-- Grid bento 3x2 equilibrado --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-5">

            {{-- 01 — Imagen --}}
            <div class="relative rounded-sm overflow-hidden h-[320px] group border border-[#686D6F]/15 hover:border-[#174638]/30 transition-colors">
                <img src="{{ asset('storage/operations/team/F893E822-4DA4-4947-824E-2BE4F4C547EF.PNG') }}"
                     alt="Red de proveedores"
                     class="absolute inset-0 w-full h-full object-cover group-hover:scale-[1.04] transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-[#0D0E0E] via-[#0D0E0E]/40 to-transparent"></div>
                <span class="absolute top-4 left-4 bg-[#174638] text-[#F5F3EE] text-[11px] font-bold tracking-widest px-2.5 py-1 rounded-sm">01</span>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <h3 class="text-[#F5F3EE] font-bold text-[15px] leading-tight">Red internacional de proveedores</h3>
                    <p class="text-[#F5F3EE]/60 text-xs mt-1.5 leading-relaxed">Acceso directo a fábricas en Asia, GCC y más de 8 países.</p>
                    <span class="inline-flex items-center gap-1 text-[#686D6F] group-hover:text-[#F5F3EE] text-[11px] mt-3 tracking-wide transition-colors">Explorar red <span class="group-hover:translate-x-1 transition-transform">→</span></span>
                </div>
            </div>

            {{-- 02 — Imagen --}}
            <div class="relative rounded-sm overflow-hidden h-[320px] group border border-[#686D6F]/15 hover:border-[#174638]/30 transition-colors">
                <img src="{{ asset('storage/vehicles/toyota/land-cruiser-300/land-cruiser-300-vxr-3-5-twin-turbo-gasoline-4x4-gcc/IMG_7100.PNG') }}"
                     alt="Múltiples países de fabricación"
                     class="absolute inset-0 w-full h-full object-cover group-hover:scale-[1.04] transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-[#0D0E0E] via-[#0D0E0E]/30 to-transparent"></div>
                <span class="absolute top-4 left-4 bg-[#F5F3EE] text-[#0D0E0E] text-[11px] font-bold tracking-widest px-2.5 py-1 rounded-sm">02</span>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <h3 class="text-[#F5F3EE] font-bold text-[15px] leading-tight">Múltiples países de fabricación</h3>
                    <p class="text-[#F5F3EE]/60 text-xs mt-1.5 leading-relaxed">Japón, Tailandia, China e India según disponibilidad.</p>
                </div>
            </div>

            {{-- 03 — Texto premium --}}
            <div class="card-dark p-6 md:p-7 flex flex-col h-[320px] relative overflow-hidden group hover:border-[#174638]/40 transition-colors">
                <span class="absolute -right-2 -top-2 text-[84px] font-bold leading-none text-[#F5F3EE]/[0.04] select-none group-hover:text-[#174638]/[0.06] transition-colors">03</span>
                <div class="flex items-start justify-between relative">
                    <span class="text-[#174638] font-bold text-2xl">03</span>
                    <span class="w-9 h-9 rounded-sm bg-[#174638]/10 border border-[#174638]/20 flex items-center justify-center">
                        <svg class="w-4 h-4 text-[#174638]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </span>
                </div>
                <div class="w-8 h-0.5 bg-[#174638] mt-4 mb-5"></div>
                <h3 class="text-[#F5F3EE] font-bold text-[15px] leading-tight">Verificación de versión y especificaciones</h3>
                <p class="text-[#686D6F] text-sm mt-2 leading-relaxed">Confirmamos motor, transmisión, acabado y país de origen antes de cotizar.</p>
                <span class="mt-auto inline-flex items-center gap-1 text-[#686D6F] group-hover:text-[#174638] text-xs font-medium transition-colors">Detalle verificado <span class="group-hover:translate-x-1 transition-transform">→</span></span>
            </div>

            {{-- 04 — Imagen --}}
            <div class="relative rounded-sm overflow-hidden h-[320px] group border border-[#686D6F]/15 hover:border-[#174638]/30 transition-colors">
                <img src="{{ asset('storage/operations/team/IMG_6975.PNG') }}"
                     alt="Inspección antes del embarque"
                     class="absolute inset-0 w-full h-full object-cover group-hover:scale-[1.04] transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-[#0D0E0E] via-[#0D0E0E]/30 to-transparent"></div>
                <span class="absolute top-4 left-4 bg-[#174638] text-[#F5F3EE] text-[11px] font-bold tracking-widest px-2.5 py-1 rounded-sm">04</span>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <h3 class="text-[#F5F3EE] font-bold text-[15px] leading-tight">Inspección antes del embarque</h3>
                    <p class="text-[#F5F3EE]/60 text-xs mt-1.5 leading-relaxed">Foto y video de cada unidad previo a la carga.</p>
                </div>
            </div>

            {{-- 05 — Imagen ancha (destacada) --}}
            <div class="relative rounded-sm overflow-hidden h-[320px] group border border-[#686D6F]/15 hover:border-[#174638]/30 transition-colors">
                <img src="{{ asset('storage/operations/how-we-work/carga-frontal.jpg') }}"
                     alt="Supervisión de carga"
                     class="absolute inset-0 w-full h-full object-cover group-hover:scale-[1.04] transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-[#0D0E0E] via-[#0D0E0E]/30 to-transparent"></div>
                <span class="absolute top-4 left-4 bg-[#F5F3EE] text-[#0D0E0E] text-[11px] font-bold tracking-widest px-2.5 py-1 rounded-sm">05</span>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <h3 class="text-[#F5F3EE] font-bold text-[15px] leading-tight">Supervisión de carga y logística</h3>
                    <p class="text-[#F5F3EE]/60 text-xs mt-1.5 leading-relaxed">Trincaje profesional y sellado en puerto supervisado por DXB.</p>
                </div>
            </div>

            {{-- 06 — Texto premium --}}
            <div class="card-dark p-6 md:p-7 flex flex-col h-[320px] relative overflow-hidden group hover:border-[#174638]/40 transition-colors">
                <span class="absolute -right-2 -top-2 text-[84px] font-bold leading-none text-[#F5F3EE]/[0.04] select-none group-hover:text-[#174638]/[0.06] transition-colors">06</span>
                <div class="flex items-start justify-between relative">
                    <span class="text-[#174638] font-bold text-2xl">06</span>
                    <span class="w-9 h-9 rounded-sm bg-[#174638]/10 border border-[#174638]/20 flex items-center justify-center">
                        <svg class="w-4 h-4 text-[#174638]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/></svg>
                    </span>
                </div>
                <div class="w-8 h-0.5 bg-[#174638] mt-4 mb-5"></div>
                <h3 class="text-[#F5F3EE] font-bold text-[15px] leading-tight">Shipping marítimo hacia Latinoamérica</h3>
                <p class="text-[#686D6F] text-sm mt-2 leading-relaxed">Exportación directa a puertos principales de Colombia, Venezuela y más.</p>
                <span class="mt-auto inline-flex items-center gap-1 text-[#686D6F] group-hover:text-[#174638] text-xs font-medium transition-colors">Ruta marítima <span class="group-hover:translate-x-1 transition-transform">→</span></span>
            </div>

        </div>
    </div>
</section>

{{-- CTA CENTRAL — Fondo claro para descanso visual --}}
<section class="py-16 bg-[#F5F3EE] border-y border-[#686D6F]/20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center">
        <h2 class="text-2xl sm:text-3xl font-bold text-[#0D0E0E] mb-4">¿Tienes un vehículo en mente?</h2>
        <p class="text-[#686D6F] mb-8">Dinos la marca, modelo, cantidad y destino. Nosotros buscamos la unidad con nuestros proveedores y te enviamos la cotización.</p>
        <a href="https://wa.me/971585440869?text=Hola,%20quisiera%20solicitar%20una%20cotización%20de%20vehículo"
           target="_blank"
           class="btn-gold inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            Solicitar cotización por WhatsApp
        </a>
    </div>
</section>

@endsection
