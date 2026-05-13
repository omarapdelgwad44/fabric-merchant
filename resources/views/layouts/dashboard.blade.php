<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" data-theme="dark">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Dashboard — Maison de Tissu' }}</title>
    <meta name="description" content="Premium Fabric Merchant Management Dashboard">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="dashboard-body" x-data="dashboardState()" :data-theme="theme">

    {{-- Sidebar --}}
    <aside class="sidebar" :class="{ 'sidebar-collapsed': sidebarCollapsed }">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <span class="logo-icon">⟡</span>
                <span class="logo-text" x-show="!sidebarCollapsed" x-transition>Maison Tissu</span>
            </div>
            <button @click="sidebarCollapsed = !sidebarCollapsed" class="sidebar-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
            </button>
        </div>

        <nav class="sidebar-nav">
            <a href="/{{ app()->getLocale() }}/dashboard" class="nav-item active">
                <span class="nav-icon">◈</span>
                <span class="nav-label" x-show="!sidebarCollapsed" x-transition>{{ __('Overview') }}</span>
            </a>
            <a href="#inventory" class="nav-item">
                <span class="nav-icon">▦</span>
                <span class="nav-label" x-show="!sidebarCollapsed" x-transition>{{ __('Inventory') }}</span>
            </a>
            <a href="#analytics" class="nav-item">
                <span class="nav-icon">◎</span>
                <span class="nav-label" x-show="!sidebarCollapsed" x-transition>{{ __('Analytics') }}</span>
            </a>
            <a href="#orders" class="nav-item">
                <span class="nav-icon">◫</span>
                <span class="nav-label" x-show="!sidebarCollapsed" x-transition>{{ __('Orders') }}</span>
            </a>
            <a href="/" class="nav-item">
                <span class="nav-icon">⌂</span>
                <span class="nav-label" x-show="!sidebarCollapsed" x-transition>Landing Page</span>
            </a>
        </nav>

        <div class="sidebar-footer" x-show="!sidebarCollapsed" x-transition>
            <div class="sidebar-user">
                <div class="user-avatar">M</div>
                <div class="user-info">
                    <div class="user-name">Merchant Admin</div>
                    <div class="user-role">Super Admin</div>
                </div>
            </div>
        </div>
    </aside>

    {{-- Main Layout --}}
    <div class="dashboard-main" :class="{ 'main-expanded': sidebarCollapsed }">

        {{-- Top Navbar --}}
        <header class="dashboard-header">
            <div class="header-left">
                <h1 class="header-title">{{ __($pageTitle ?? 'Dashboard') }}</h1>
                <span class="header-subtitle">{{ now()->translatedFormat('l, F j, Y') }}</span>
            </div>
            <div class="header-right">
                <div class="header-search" x-data="{ open: false }">
                    <button @click="open = !open" class="search-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                    </button>
                </div>
                <button class="notification-btn" @click="notifOpen = !notifOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"/></svg>
                    <span class="notif-badge">3</span>
                </button>

                <div class="lang-switcher">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a rel="alternate" hreflang="{{ $localeCode }}" 
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                           class="lang-link {{ app()->getLocale() == $localeCode ? 'active' : '' }}">
                            {{ $localeCode == 'ar' ? 'عربي' : 'EN' }}
                        </a>
                    @endforeach
                </div>

                <button @click="toggleTheme()" class="theme-toggle-btn">
                    <span x-show="theme === 'dark'">☀</span>
                    <span x-show="theme === 'light'">🌙</span>
                </button>
            </div>
        </header>

        {{-- Page Content --}}
        <main class="dashboard-content">
            {{ $slot }}
        </main>
    </div>

    <script>
        function dashboardState() {
            return {
                sidebarCollapsed: false,
                notifOpen: false,
                theme: localStorage.getItem('theme') || 'dark',
                toggleTheme() {
                    this.theme = this.theme === 'dark' ? 'light' : 'dark';
                    localStorage.setItem('theme', this.theme);
                    document.documentElement.setAttribute('data-theme', this.theme);
                },
                init() {
                    document.documentElement.setAttribute('data-theme', this.theme);
                }
            }
        }
    </script>

    @livewireScripts
</body>
</html>
