<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DXB Exports — Vehículos desde Dubái')</title>
    <meta name="description" content="@yield('description', 'Suministro de vehículos, logística y shipping marítimo desde Dubái hacia Latinoamérica.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0D0E0E] text-[#F5F3EE] font-sans antialiased" x-data>

    {{-- NAVBAR --}}
    <nav x-data="{ open: false, scrolled: false }"
         x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 50)"
         :class="scrolled ? 'shadow-lg' : ''"
         class="fixed top-0 left-0 right-0 z-50 bg-[#0D0E0E]/95 backdrop-blur-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between h-16 md:h-20">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('images/logos/463A2B30-FD73-4844-BFB5-5AC622CE91C7.PNG') }}" alt="DXB Exports" class="h-9 md:h-10 w-auto object-contain">
                </a>

                {{-- Desktop menu --}}
                <div class="hidden xl:flex items-center gap-6">
                    <a href="{{ route('home') }}" class="text-sm text-[#686D6F] hover:text-[#F5F3EE] transition-colors {{ request()->routeIs('home') ? 'text-[#F5F3EE]' : '' }}">Inicio</a>
                    <a href="{{ route('vehicles') }}" class="text-sm text-[#686D6F] hover:text-[#F5F3EE] transition-colors {{ request()->routeIs('vehicles*') ? 'text-[#F5F3EE]' : '' }}">Vehículos</a>
                    <a href="{{ route('services') }}" class="text-sm text-[#686D6F] hover:text-[#F5F3EE] transition-colors {{ request()->routeIs('services') ? 'text-[#F5F3EE]' : '' }}">Servicios</a>
                    <a href="{{ route('how-we-work') }}" class="text-sm text-[#686D6F] hover:text-[#F5F3EE] transition-colors {{ request()->routeIs('how-we-work') ? 'text-[#F5F3EE]' : '' }}">Cómo trabajamos</a>
                    <a href="{{ route('about') }}" class="text-sm text-[#686D6F] hover:text-[#F5F3EE] transition-colors {{ request()->routeIs('about') ? 'text-[#F5F3EE]' : '' }}">Nosotros</a>
                    <a href="{{ route('operations') }}" class="text-sm text-[#686D6F] hover:text-[#F5F3EE] transition-colors {{ request()->routeIs('operations') ? 'text-[#F5F3EE]' : '' }}">Operaciones</a>
                </div>

                {{-- CTA Desktop --}}
                <a href="https://wa.me/971585440869?text=Hola,%20me%20interesa%20información%20sobre%20vehículos"
                   target="_blank"
                   class="hidden xl:inline-flex items-center gap-2 btn-gold text-sm px-5 py-2.5">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Habla con un asesor
                </a>

                {{-- Mobile hamburger --}}
                <button @click="open = !open" class="lg:hidden p-2 text-[#686D6F] hover:text-[#F5F3EE]">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            {{-- Mobile menu --}}
            <div x-show="open" x-transition class="lg:hidden pb-4 border-t border-[#686D6F]/30">
                <div class="flex flex-col gap-1 pt-4">
                    <a href="{{ route('home') }}" @click="open=false" class="px-4 py-3 text-sm text-[#686D6F] hover:text-[#F5F3EE] hover:bg-[#1A1C1C] rounded transition-colors">Inicio</a>
                    <a href="{{ route('vehicles') }}" @click="open=false" class="px-4 py-3 text-sm text-[#686D6F] hover:text-[#F5F3EE] hover:bg-[#1A1C1C] rounded transition-colors">Vehículos</a>
                    <a href="{{ route('services') }}" @click="open=false" class="px-4 py-3 text-sm text-[#686D6F] hover:text-[#F5F3EE] hover:bg-[#1A1C1C] rounded transition-colors">Servicios</a>
                    <a href="{{ route('how-we-work') }}" @click="open=false" class="px-4 py-3 text-sm text-[#686D6F] hover:text-[#F5F3EE] hover:bg-[#1A1C1C] rounded transition-colors">Cómo trabajamos</a>
                    <a href="{{ route('about') }}" @click="open=false" class="px-4 py-3 text-sm text-[#686D6F] hover:text-[#F5F3EE] hover:bg-[#1A1C1C] rounded transition-colors">Nosotros</a>
                    <a href="{{ route('operations') }}" @click="open=false" class="px-4 py-3 text-sm text-[#686D6F] hover:text-[#F5F3EE] hover:bg-[#1A1C1C] rounded transition-colors">Operaciones</a>
                    <div class="px-4 pt-3">
                        <a href="https://wa.me/971585440869?text=Hola,%20me%20interesa%20información%20sobre%20vehículos"
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
    <footer class="bg-[#0D0E0E] border-t border-[#686D6F]/30 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                <div>
                    <img src="{{ asset('images/logos/463A2B30-FD73-4844-BFB5-5AC622CE91C7.PNG') }}" alt="DXB Exports" class="h-9 w-auto object-contain mb-4">
                    <p class="text-[#F5F3EE]/90 text-sm leading-relaxed">Suministro de vehículos, logística y shipping marítimo desde Dubái hacia Latinoamérica.</p>
                    <p class="text-[#686D6F] text-xs mt-3">10KA FZC — Licencia N° 4305704.01</p>
                </div>
                <div>
                    <h4 class="text-[#F5F3EE] font-semibold text-sm mb-4 tracking-wide uppercase">Navegación</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('vehicles') }}" class="text-[#F5F3EE]/80 hover:text-[#F5F3EE] text-sm transition-colors">Vehículos</a></li>
                        <li><a href="{{ route('services') }}" class="text-[#F5F3EE]/80 hover:text-[#F5F3EE] text-sm transition-colors">Servicios</a></li>
                        <li><a href="{{ route('how-we-work') }}" class="text-[#F5F3EE]/80 hover:text-[#F5F3EE] text-sm transition-colors">Cómo trabajamos</a></li>
                        <li><a href="{{ route('about') }}" class="text-[#F5F3EE]/80 hover:text-[#F5F3EE] text-sm transition-colors">Nosotros</a></li>
                        <li><a href="{{ route('operations') }}" class="text-[#F5F3EE]/80 hover:text-[#F5F3EE] text-sm transition-colors">Operaciones</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-[#F5F3EE] font-semibold text-sm mb-4 tracking-wide uppercase">Contacto</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-[#F5F3EE] shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            <a href="https://wa.me/971585440869" target="_blank" class="text-[#F5F3EE]/90 hover:text-[#F5F3EE] text-sm transition-colors">+971 58 544 0869</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-[#F5F3EE] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <a href="tel:+971585440869" class="text-[#F5F3EE]/90 hover:text-[#F5F3EE] text-sm transition-colors">+971 58 544 0869</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-[#F5F3EE] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <a href="mailto:info.dxbexports@gmail.com" class="text-[#F5F3EE]/90 hover:text-[#F5F3EE] text-sm transition-colors">info.dxbexports@gmail.com</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-[#F5F3EE] shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/></svg>
                            <a href="https://www.tiktok.com/@dxb_exports" target="_blank" class="text-[#F5F3EE]/90 hover:text-[#F5F3EE] text-sm transition-colors">@dxb_exports</a>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-4 h-4 text-[#F5F3EE] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="text-[#F5F3EE]/90 text-sm">Business Bay, Dubái<br>Emiratos Árabes Unidos</span>
                        </li>
                    </ul>
                </div>
                {{-- Instagram --}}
                <div>
                    <h4 class="text-[#F5F3EE] font-semibold text-sm mb-4 tracking-wide uppercase">Síguenos</h4>
                    <a href="https://www.instagram.com/dxb_exports" target="_blank" class="block group">
                        <div class="relative overflow-hidden rounded-sm border border-[#686D6F]/20 hover:border-[#174638]/50 transition-colors">
                            <img src="{{ asset('images/logos/B62F5B51-D2B6-42EB-AE0A-63524F5033DD.PNG') }}" alt="DXB Exports Instagram" class="w-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/50 transition-colors duration-300 flex items-center justify-center">
                                <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center gap-2 bg-[#174638] text-[#F5F3EE] text-xs font-semibold px-4 py-2 rounded-sm">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.072-4.949-.072zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                    Ver en Instagram
                                </span>
                            </div>
                        </div>
                        <p class="text-[#686D6F] text-xs mt-2 text-center tracking-wide">@dxb_exports</p>
                    </a>
                </div>
            </div>
            <div class="border-t border-[#686D6F]/30 pt-6 flex flex-col sm:flex-row items-center justify-between gap-3">
                <p class="text-[#686D6F] text-xs">© {{ date('Y') }} DXB Exports — 10KA FZC. Todos los derechos reservados.</p>
                <p class="text-[#686D6F] text-xs">Atención 24/7 en español e inglés</p>
            </div>
        </div>
    </footer>

</body>
</html>
