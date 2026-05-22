@props(['title' => 'Dashboard — Maison de Tissu', 'pageTitle' => 'Dashboard'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    <meta name="description" content="Premium Fabric Merchant Management Dashboard">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="dashboard-body" 
      x-data="dashboardState()" 
      :data-theme="theme"
      :dir="locale === 'ar' ? 'rtl' : 'ltr'">

    {{-- Sidebar --}}
    <aside class="sidebar" :class="{ 'sidebar-collapsed': sidebarCollapsed }">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <span class="logo-icon">⟡</span>
                <span class="logo-text" x-show="!sidebarCollapsed" x-transition>Maison Tissu</span>
            </div>
            <button @click="sidebarCollapsed = !sidebarCollapsed" class="sidebar-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:20px;height:20px"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
            </button>
        </div>
        <nav class="sidebar-nav">
            <a href="/dashboard" class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <span class="nav-icon">◈</span>
                <span class="nav-label" x-show="!sidebarCollapsed" x-transition>{{ __('Overview') }}</span>
            </a>
            <a href="/dashboard/inventory" class="nav-item {{ request()->is('dashboard/inventory*') ? 'active' : '' }}">
                <span class="nav-icon">▦</span>
                <span class="nav-label" x-show="!sidebarCollapsed" x-transition>{{ __('Inventory Manager') }}</span>
            </a>
            <a href="/dashboard/orders" class="nav-item {{ request()->is('dashboard/orders*') ? 'active' : '' }}">
                <span class="nav-icon">◫</span>
                <span class="nav-label" x-show="!sidebarCollapsed" x-transition>{{ __('Orders & CRM') }}</span>
            </a>
            <a href="/dashboard/inquiries" class="nav-item {{ request()->is('dashboard/inquiries*') ? 'active' : '' }}">
                <span class="nav-icon">✉</span>
                <span class="nav-label" x-show="!sidebarCollapsed" x-transition>{{ __('Messages') }}</span>
            </a>
            <a href="/dashboard/settings" class="nav-item {{ request()->is('dashboard/settings*') ? 'active' : '' }}">
                <span class="nav-icon">⚙</span>
                <span class="nav-label" x-show="!sidebarCollapsed" x-transition>{{ __('CMS Settings') }}</span>
            </a>
            <div class="sidebar-sep"></div>
            <a href="/" class="nav-item">
                <span class="nav-icon">⌂</span>
                <span class="nav-label" x-show="!sidebarCollapsed" x-transition>{{ __('Live Website') }}</span>
            </a>
            <a href="{{ route('logout') }}" class="nav-item text-red-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20">
                <span class="nav-icon" style="color: inherit;">⎋</span>
                <span class="nav-label" style="color: inherit;" x-show="!sidebarCollapsed" x-transition>{{ __('Logout') }}</span>
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

    {{-- Main --}}
    <div class="dashboard-main" :class="{ 'main-expanded': sidebarCollapsed }">
        <header class="dashboard-header">
            <div class="header-left">
                <h1 class="header-title">{{ __($pageTitle) }}</h1>
                <span class="header-subtitle">{{ now()->translatedFormat('l, F j, Y') }}</span>
            </div>
            <div class="header-right">
                {{-- Language Switcher --}}
                <div class="lang-switcher">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a rel="alternate" hreflang="{{ $localeCode }}" 
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                           class="lang-link {{ App::getLocale() == $localeCode ? 'active' : '' }}">
                            {{ strtoupper($localeCode) }}
                        </a>
                    @endforeach
                </div>

                {{-- Theme Toggle --}}
                <button @click="toggleTheme()" class="theme-toggle-btn">
                    <span x-show="theme === 'dark'">☀️</span>
                    <span x-show="theme === 'light'">🌙</span>
                </button>

                <button class="notification-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:20px;height:20px"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"/></svg>
                    <span class="notif-badge">3</span>
                </button>
                <a href="/" class="btn-gold" style="font-size:0.78rem;padding:0.4rem 1rem;">← {{ __('Landing') }}</a>
            </div>
        </header>
        <main class="dashboard-content">
            {{ $slot }}
        </main>
    </div>

    <script>
        function dashboardState() {
            return { 
                sidebarCollapsed: false,
                theme: localStorage.getItem('theme') || 'dark',
                locale: '{{ App::getLocale() }}',
                toggleTheme() {
                    this.theme = this.theme === 'dark' ? 'light' : 'dark';
                    localStorage.setItem('theme', this.theme);
                }
            }
        }
    </script>

    @livewireScripts
</body>
</html>
