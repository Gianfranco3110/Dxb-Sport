<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DXB Exports — Vehículos desde Dubái')</title>
    <meta name="description" content="@yield('description', 'Suministro de vehículos, logística y shipping marítimo desde Dubái hacia Latinoamérica.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0A0A0A] text-white font-sans antialiased" x-data>

    {{-- NAVBAR --}}
    <nav x-data="{ open: false, scrolled: false }"
         x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 50)"
         :class="scrolled ? 'shadow-lg' : ''"
         class="fixed top-0 left-0 right-0 z-50 bg-[#0A0A0A]/95 backdrop-blur-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between h-16 md:h-20">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <span class="text-[#C9A84C] font-bold text-xl tracking-widest">DXB</span>
                    <span class="text-white font-light text-xl tracking-widest">EXPORTS</span>
                </a>

                {{-- Desktop menu --}}
                <div class="hidden xl:flex items-center gap-4">
                    <a href="{{ route('home') }}" class="text-xs text-gray-300 hover:text-[#C9A84C] transition-colors {{ request()->routeIs('home') ? 'text-[#C9A84C]' : '' }}">Inicio</a>
                    <a href="{{ route('vehicles') }}" class="text-xs text-gray-300 hover:text-[#C9A84C] transition-colors {{ request()->routeIs('vehicles*') ? 'text-[#C9A84C]' : '' }}">Vehículos</a>
                    <a href="{{ route('services') }}" class="text-xs text-gray-300 hover:text-[#C9A84C] transition-colors {{ request()->routeIs('services') ? 'text-[#C9A84C]' : '' }}">Servicios</a>
                    <a href="{{ route('how-we-work') }}" class="text-xs text-gray-300 hover:text-[#C9A84C] transition-colors {{ request()->routeIs('how-we-work') ? 'text-[#C9A84C]' : '' }}">Cómo trabajamos</a>
                    <a href="{{ route('about') }}" class="text-xs text-gray-300 hover:text-[#C9A84C] transition-colors {{ request()->routeIs('about') ? 'text-[#C9A84C]' : '' }}">Nosotros</a>
                    <a href="{{ route('operations') }}" class="text-xs text-gray-300 hover:text-[#C9A84C] transition-colors {{ request()->routeIs('operations') ? 'text-[#C9A84C]' : '' }}">Operaciones</a>
                </div>

                {{-- CTA Desktop --}}
                <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '971558369427') }}?text=Hola,%20me%20interesa%20información%20sobre%20vehículos"
                   target="_blank"
                   class="hidden xl:inline-flex items-center gap-2 btn-gold text-xs px-4 py-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Habla con un asesor
                </a>

                {{-- Mobile hamburger --}}
                <button @click="open = !open" class="lg:hidden p-2 text-gray-300 hover:text-white">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            {{-- Mobile menu --}}
            <div x-show="open" x-transition class="lg:hidden pb-4 border-t border-[#2A2A2A]">
                <div class="flex flex-col gap-1 pt-4">
                    <a href="{{ route('home') }}" @click="open=false" class="px-4 py-3 text-sm text-gray-300 hover:text-[#C9A84C] hover:bg-[#1A1A1A] rounded transition-colors">Inicio</a>
                    <a href="{{ route('vehicles') }}" @click="open=false" class="px-4 py-3 text-sm text-gray-300 hover:text-[#C9A84C] hover:bg-[#1A1A1A] rounded transition-colors">Vehículos</a>
                    <a href="{{ route('services') }}" @click="open=false" class="px-4 py-3 text-sm text-gray-300 hover:text-[#C9A84C] hover:bg-[#1A1A1A] rounded transition-colors">Servicios</a>
                    <a href="{{ route('how-we-work') }}" @click="open=false" class="px-4 py-3 text-sm text-gray-300 hover:text-[#C9A84C] hover:bg-[#1A1A1A] rounded transition-colors">Cómo trabajamos</a>
                    <a href="{{ route('about') }}" @click="open=false" class="px-4 py-3 text-sm text-gray-300 hover:text-[#C9A84C] hover:bg-[#1A1A1A] rounded transition-colors">Nosotros</a>
                    <a href="{{ route('operations') }}" @click="open=false" class="px-4 py-3 text-sm text-gray-300 hover:text-[#C9A84C] hover:bg-[#1A1A1A] rounded transition-colors">Operaciones</a>
                    <div class="px-4 pt-3">
                        <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '971558369427') }}?text=Hola,%20me%20interesa%20información%20sobre%20vehículos"
                           target="_blank"
                           class="flex items-center justify-center gap-2 btn-gold w-full">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Habla con un asesor
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{-- CONTENIDO --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-[#0A0A0A] border-t border-[#1A1A1A] pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-12">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="text-[#C9A84C] font-bold text-xl tracking-widest">DXB</span>
                        <span class="text-white font-light text-xl tracking-widest">EXPORTS</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">Suministro de vehículos, logística y shipping marítimo desde Dubái hacia Latinoamérica.</p>
                    <p class="text-gray-500 text-xs mt-3">10KA FZC — Licencia N° 4305704.01</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold text-sm mb-4 tracking-wide uppercase">Navegación</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('vehicles') }}" class="text-gray-400 hover:text-[#C9A84C] text-sm transition-colors">Vehículos</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-400 hover:text-[#C9A84C] text-sm transition-colors">Servicios</a></li>
                        <li><a href="{{ route('how-we-work') }}" class="text-gray-400 hover:text-[#C9A84C] text-sm transition-colors">Cómo trabajamos</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-[#C9A84C] text-sm transition-colors">Nosotros</a></li>
                        <li><a href="{{ route('operations') }}" class="text-gray-400 hover:text-[#C9A84C] text-sm transition-colors">Operaciones</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold text-sm mb-4 tracking-wide uppercase">Contacto</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-[#C9A84C] shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '971558369427') }}" target="_blank" class="text-gray-400 hover:text-[#C9A84C] text-sm transition-colors">+971 55 836 9427</a>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-4 h-4 text-[#C9A84C] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="text-gray-400 text-sm">Business Bay, Dubái<br>Emiratos Árabes Unidos</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-[#1A1A1A] pt-6 flex flex-col sm:flex-row items-center justify-between gap-3">
                <p class="text-gray-600 text-xs">© {{ date('Y') }} DXB Exports — 10KA FZC. Todos los derechos reservados.</p>
                <p class="text-gray-600 text-xs">Atención 24/7 en español e inglés</p>
            </div>
        </div>
    </footer>

    {{-- Botón flotante WhatsApp --}}
    <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '971558369427') }}?text=Hola,%20me%20interesa%20información%20sobre%20vehículos"
       target="_blank"
       class="fixed bottom-6 right-4 z-50 flex items-center gap-2 bg-[#25D366] hover:bg-[#20BA5A] text-white font-semibold px-4 py-3 rounded-full shadow-2xl transition-all duration-200 hover:scale-105 text-sm">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        <span class="hidden sm:inline">Habla con un asesor</span>
    </a>

</body>
</html>
