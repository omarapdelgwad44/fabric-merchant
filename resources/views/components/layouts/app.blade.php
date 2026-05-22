@props(['title' => 'Maison de Tissu — Premium Fabric Merchant'])
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    <meta name="description" content="Purveyors of the world's finest fabrics. Silk, Velvet, Cotton, and Brocade collections for luxury fashion and interior design.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="fabric-body">
    {{-- 
    [Fix]: We removed the x-data="{ pageLoaded: false }" from the body and the preloader below.
    [Reason - EN]: Livewire 3 components are essentially Alpine components under the hood. 
    Wrapping the entire body in an Alpine component (x-data) and hiding the Livewire component 
    initially with x-show="pageLoaded" interferes with Livewire's ability to attach its Javascript 
    event listeners (like wire:submit) to the DOM elements. This causes forms to submit as standard GET requests.
    
    [السبب - AR]: إخفاء مكونات Livewire وقت تحميل الصفحة باستخدام Alpine.js (زي x-data و x-show على مستوى الـ body) 
    بيعمل تعارض مع Livewire 3 وبيمنعه من إنه يربط الأحداث بتاعته (زي عملية الإرسال wire:submit) 
    بالفورم. النتيجة إن الفورم كانت بتتبعت بالشكل العادي (GET request) والبيانات بتظهر في الرابط فوق.
    
    <div x-show="!pageLoaded"
         x-transition:leave="transition-opacity duration-500"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[9999] flex items-center justify-center"
         style="background:#f5f0e8;">
        <div class="loader-ring"></div>
    </div>

    <div x-show="pageLoaded"
         x-transition:enter="transition-opacity duration-700"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100">
        {{ $slot }}
    </div>
    --}}

    {{ $slot }}

    @livewireScripts
</body>
</html>
