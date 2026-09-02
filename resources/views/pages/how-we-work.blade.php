@extends('layouts.app')

@section('title', 'Cómo Trabajamos — DXB Exports')
@section('description', 'Proceso paso a paso: desde que el cliente indica el vehículo hasta la exportación al puerto de destino.')

@section('content')

<div class="pt-20 min-h-screen bg-[#0D0E0E]">

    <div class="bg-[#0D0E0E] border-b border-[#686D6F]/20 py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <p class="inline-flex items-center bg-[#174638] text-[#F5F3EE] text-xs tracking-[0.25em] uppercase mb-3 font-semibold px-2.5 py-1 rounded-sm">El proceso</p>
            <h1 class="section-title mb-2">Cómo trabajamos</h1>
            <div class="brand-line"></div>
            <p class="text-[#F5F3EE]/70 text-sm mt-3 max-w-xl">Un proceso claro y transparente desde el primer contacto hasta la entrega en el puerto de destino.</p>
        </div>
    </div>

    {{-- Showcase operaciones — usa todo el ancho --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 pt-10 pb-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 rounded-sm overflow-hidden">
            {{-- Foto grande 1 — Carga --}}
            <div class="relative h-[320px] sm:h-[400px] lg:h-[520px] overflow-hidden group border border-[#686D6F]/20">
                <img src="{{ asset('storage/operations/how-we-work/carga-contenedor.jpg') }}"
                     alt="Carga de vehículo en contenedor — Dubái"
                     class="absolute inset-0 w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-black/10"></div>
                <div class="absolute top-4 left-4">
                    <span class="bg-[#174638] text-[#F5F3EE] text-[10px] tracking-[0.2em] uppercase px-3 py-1.5 rounded-sm font-semibold">Operación real — Dubái</span>
                </div>
                <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8">
                    <h3 class="text-white font-bold text-xl sm:text-2xl leading-tight">Carga y trincaje en contenedor</h3>
                    <p class="text-[#F5F3EE]/80 text-sm mt-2 max-w-lg">Montacargas Toyota y equipo DXB Exports supervisando la estiba — Paso 05 del proceso.</p>
                </div>
            </div>
            {{-- Foto grande 2 — Inspección --}}
            <div class="relative h-[320px] sm:h-[400px] lg:h-[520px] overflow-hidden group border border-[#686D6F]/20">
                <img src="{{ asset('storage/operations/how-we-work/inspeccion-detalle.jpg') }}"
                     alt="Inspección previa al embarque — Dubái"
                     class="absolute inset-0 w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-black/10"></div>
                <div class="absolute top-4 left-4">
                    <span class="bg-[#F5F3EE] border border-[#686D6F]/20 text-[#0D0E0E] text-[10px] tracking-[0.2em] uppercase px-3 py-1.5 rounded-sm font-semibold">Paso 04 — Inspección</span>
                </div>
                <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8">
                    <h3 class="text-white font-bold text-xl sm:text-2xl leading-tight">Inspección previa al embarque</h3>
                    <p class="text-[#F5F3EE]/80 text-sm mt-2 max-w-lg">Verificación de llantas, carrocería y protecciones antes del shipping marítimo.</p>
                </div>
            </div>
        </div>
        <p class="text-[#F5F3EE] text-xs text-center mt-3 tracking-wide">Fotos reales de operaciones DXB Exports — Business Bay, Dubái</p>
    </div>

    {{-- Timeline pasos — usa todo el ancho en grid horizontal --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 pb-16 md:pb-24">

        @php
        $steps = [
            [
                'num' => '01',
                'title' => 'El cliente indica el vehículo',
                'desc' => 'Nos indicas la marca, modelo, versión, cantidad, país y puerto de destino. Cuanta más información, mejor cotización podemos ofrecerte.',
            ],
            [
                'num' => '02',
                'title' => 'Buscamos la unidad',
                'desc' => 'DXB Exports busca la unidad con sus fábricas y proveedores en Dubái, China, India, Tailandia e Indonesia.',
            ],
            [
                'num' => '03',
                'title' => 'Confirmamos versión y cotización',
                'desc' => 'Se confirma la versión exacta, disponibilidad y se envía la cotización detallada al cliente.',
            ],
            [
                'num' => '04',
                'title' => 'Inspección y preparación',
                'desc' => 'Se inspecciona y prepara el vehículo. Verificamos especificaciones, versión y estado antes del embarque.',
            ],
            [
                'num' => '05',
                'title' => 'Documentación, carga y shipping',
                'desc' => 'Nuestro equipo coordina toda la documentación de exportación, la carga en contenedor y el shipping marítimo.',
            ],
            [
                'num' => '06',
                'title' => 'Exportación al destino',
                'desc' => 'El vehículo se exporta al puerto acordado en Latinoamérica. Te mantenemos informado durante todo el proceso.',
            ],
        ];
        @endphp

        <div class="mt-8 mb-8">
            <p class="inline-flex items-center bg-[#174638] text-[#F5F3EE] text-xs tracking-[0.25em] uppercase mb-2 font-semibold px-2.5 py-1 rounded-sm">El proceso paso a paso</p>
            <h3 class="text-[#F5F3EE] font-bold text-xl">6 pasos claros</h3>
            <div class="w-10 h-0.5 bg-[#174638] mt-3"></div>
        </div>

        {{-- Línea horizontal decorativa (desktop) --}}
        <div class="hidden lg:block h-px bg-gradient-to-r from-transparent via-[#686D6F]/30 to-transparent mb-10"></div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($steps as $step)
            <div class="card-dark p-6 flex flex-col hover:border-[#174638]/30 transition-colors group relative overflow-hidden">
                <div class="absolute top-0 right-0 w-20 h-20 bg-[#174638]/5 rounded-bl-full group-hover:bg-[#174638]/10 transition-colors"></div>
                <div class="w-10 h-10 rounded-sm bg-[#174638] flex items-center justify-center shrink-0 mb-4">
                    <span class="text-[#F5F3EE] font-bold text-sm">{{ $step['num'] }}</span>
                </div>
                <h3 class="text-[#F5F3EE] font-bold text-[15px] mb-2 leading-tight">{{ $step['title'] }}</h3>
                <p class="text-[#F5F3EE]/70 text-sm leading-relaxed flex-1">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- CTA — Fondo claro descanso visual --}}
        <div class="mt-14 text-center bg-[#F5F3EE] rounded-sm py-10 px-6 border border-[#686D6F]/20">
            <p class="text-[#686D6F] text-sm mb-6">¿Listo para comenzar? Contáctanos y arrancamos el proceso.</p>
            <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '971558369427') }}?text=Hola,%20quiero%20iniciar%20el%20proceso%20de%20importación%20de%20un%20vehículo"
               target="_blank"
               class="btn-gold inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                Iniciar proceso
            </a>
        </div>
    </div>
</div>

@endsection
