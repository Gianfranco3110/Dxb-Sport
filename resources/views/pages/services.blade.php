@extends('layouts.app')

@section('title', 'Servicios — DXB Exports')
@section('description', 'Suministro, inspección, logística y shipping marítimo de vehículos desde Dubái hacia Latinoamérica.')

@section('content')

<div class="pt-20 min-h-screen bg-[#0A0A0A]">

    <div class="bg-[#111111] border-b border-[#1A1A1A] py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <p class="text-[#C9A84C] text-xs tracking-[0.3em] uppercase mb-3">Lo que hacemos</p>
            <h1 class="section-title mb-2">Servicios</h1>
            <div class="gold-line"></div>
            <p class="text-gray-400 text-sm mt-3 max-w-xl">Un solo equipo que cubre todo el proceso: desde la búsqueda del vehículo hasta su llegada al puerto de destino.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 md:py-24">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            @php
            $services = [
                [
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>',
                    'title' => 'Suministro',
                    'items' => [
                        'Búsqueda personalizada de vehículos',
                        'Compra directa desde fábrica o proveedor',
                        'Vehículos nuevos y usados',
                        'Atención a particulares, importadores y showrooms',
                    ],
                ],
                [
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                    'title' => 'Inspección y Documentación',
                    'items' => [
                        'Verificación del vehículo',
                        'Inspección antes del embarque',
                        'Revisión de versión y especificaciones',
                        'Preparación de documentación para exportación',
                    ],
                ],
                [
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>',
                    'title' => 'Logística y Carga',
                    'items' => [
                        'Coordinación logística',
                        'Preparación del vehículo',
                        'Carga y supervisión de contenedores',
                        'Seguimiento fotográfico',
                        'Sellado en puerto',
                    ],
                ],
                [
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>',
                    'title' => 'Shipping Marítimo',
                    'items' => [
                        'Coordinación del transporte marítimo',
                        'Exportación hacia puertos de Latinoamérica',
                        'Seguimiento durante el proceso',
                        'Atención 24/7 en español e inglés',
                    ],
                ],
            ];
            @endphp

            @foreach($services as $service)
            <div class="card-dark p-8">
                <div class="w-12 h-12 rounded-sm bg-[#C9A84C]/10 flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-[#C9A84C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $service['icon'] !!}
                    </svg>
                </div>
                <h2 class="text-white font-bold text-xl mb-5">{{ $service['title'] }}</h2>
                <ul class="space-y-3">
                    @foreach($service['items'] as $item)
                    <li class="flex items-start gap-3 text-gray-400 text-sm">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#C9A84C] mt-1.5 shrink-0"></span>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>

        {{-- CTA --}}
        <div class="mt-16 text-center">
            <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '971558369427') }}?text=Hola,%20quisiera%20más%20información%20sobre%20sus%20servicios"
               target="_blank"
               class="btn-gold inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                Consultar servicios
            </a>
        </div>
    </div>
</div>

@endsection
