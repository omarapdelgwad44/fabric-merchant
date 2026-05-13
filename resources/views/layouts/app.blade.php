<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Maison de Tissu — Premium Fabric Merchant' }}</title>
    <meta name="description" content="Purveyors of the world's finest fabrics. Silk, Velvet, Cotton, and Brocade collections for luxury fashion and interior design.">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Vite assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="fabric-body" x-data="{ pageLoaded: false }" x-init="setTimeout(() => pageLoaded = true, 100)">

    {{-- Page loader --}}
    <div x-show="!pageLoaded"
         x-transition:leave="transition-opacity duration-500"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[9999] flex items-center justify-center bg-ivory">
        <div class="loader-ring"></div>
    </div>

    {{-- Main content --}}
    <div x-show="pageLoaded"
         x-transition:enter="transition-opacity duration-700"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100">
        {{ $slot }}
    </div>

    @livewireScripts
</body>
</html>
