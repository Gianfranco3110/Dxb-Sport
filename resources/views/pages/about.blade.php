@extends('layouts.app')

@section('title', 'Nosotros — DXB Exports')
@section('description', 'Cinco años conectando Dubái con Latinoamérica. 10KA FZC, empresa legalmente constituida en Emiratos Árabes Unidos.')

@section('content')

<div class="pt-20 min-h-screen bg-[#0A0A0A]">

    <div class="bg-[#111111] border-b border-[#1A1A1A] py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <p class="text-[#C9A84C] text-xs tracking-[0.3em] uppercase mb-3">La empresa</p>
            <h1 class="section-title mb-2">Nosotros</h1>
            <div class="gold-line"></div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 md:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">

            {{-- Texto --}}
            <div>
                <h2 class="text-2xl sm:text-3xl font-bold text-white mb-6 leading-tight">
                    Cinco años conectando Dubái con Latinoamérica.
                </h2>
                <div class="space-y-4 text-gray-400 text-sm leading-relaxed">
                    <p>
                        DXB Exports cuenta con cinco años de experiencia en el suministro y exportación de vehículos desde Emiratos Árabes Unidos hacia Colombia, Venezuela y otros mercados de Latinoamérica.
                    </p>
                    <p>
                        Somos una operación respaldada por una empresa legalmente constituida en Emiratos Árabes Unidos, con presencia operativa en Dubái y experiencia coordinando el suministro, inspección, documentación, carga y shipping marítimo de vehículos.
                    </p>
                    <p>
                        Nuestro equipo opera directamente desde Dubái, con acceso a fábricas y proveedores en múltiples países, lo que nos permite ofrecer mayor variedad, mejores precios y un servicio integral en un solo lugar.
                    </p>
                </div>

                {{-- Indicadores --}}
                <div class="grid grid-cols-2 gap-4 mt-10">
                    @foreach([
                        ['5+', 'Años de experiencia'],
                        ['🇦🇪', 'Operación en Dubái'],
                        ['LATAM', 'Mercados atendidos'],
                        ['24/7', 'Soporte disponible'],
                    ] as $stat)
                    <div class="card-dark p-5 text-center">
                        <div class="text-[#C9A84C] text-2xl font-bold mb-1">{{ $stat[0] }}</div>
                        <div class="text-gray-500 text-xs">{{ $stat[1] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Datos legales --}}
            <div>
                <div class="card-dark p-8">
                    <h3 class="text-white font-bold text-lg mb-6 flex items-center gap-3">
                        <span class="w-8 h-8 rounded-sm bg-[#C9A84C]/10 flex items-center justify-center">
                            <svg class="w-4 h-4 text-[#C9A84C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </span>
                        Información legal
                    </h3>
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
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between py-3 border-b border-[#2A2A2A] last:border-0 gap-1">
                            <dt class="text-gray-500 text-xs uppercase tracking-wide">{{ $item[0] }}</dt>
                            <dd class="text-white text-sm font-medium
                                {{ $item[0] === 'Estado de licencia' ? 'text-green-400' : '' }}">
                                @if($item[0] === 'Estado de licencia')
                                    <span class="flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-400 inline-block"></span>
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

                <div class="mt-6">
                    <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '971558369427') }}?text=Hola,%20quisiera%20más%20información%20sobre%20DXB%20Exports"
                       target="_blank"
                       class="btn-gold flex items-center justify-center gap-2 w-full">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Habla con un asesor
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
