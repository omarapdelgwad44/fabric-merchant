<x-layouts.app title="Maison de Tissu — Premium Fabric Merchant">

    {{-- ============================================================
         NAVIGATION
    ============================================================ --}}
    <nav class="landing-nav" x-data="{ scrolled: false, menuOpen: false }" @scroll.window="scrolled = window.scrollY > 60">
        <div class="nav-inner" :class="{ 'nav-scrolled': scrolled }">
            <a href="/" class="nav-logo">
                <span class="logo-gem">⟡</span>
                <span>Maison de Tissu</span>
            </a>
            <ul class="nav-links">
                <li><a href="#catalog">{{ __('Catalog') }}</a></li>
                <li><a href="#categories">{{ __('Collections') }}</a></li>
                <li><a href="#about">{{ __('Heritage') }}</a></li>
                <li><a href="#inquiry">{{ __('Inquire') }}</a></li>
            </ul>
            <div class="nav-cta">
                <a href="/dashboard" class="btn-gold">{{ __('Dashboard') }} →</a>
            </div>
            <button class="mobile-menu-btn" @click="menuOpen = !menuOpen">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
            </button>
        </div>
        {{-- Mobile menu --}}
        <div class="mobile-menu" x-show="menuOpen" x-transition @click.away="menuOpen = false">
            <a href="#catalog" @click="menuOpen = false">{{ __('Catalog') }}</a>
            <a href="#categories" @click="menuOpen = false">{{ __('Collections') }}</a>
            <a href="#about" @click="menuOpen = false">{{ __('Heritage') }}</a>
            <a href="#inquiry" @click="menuOpen = false">{{ __('Inquire') }}</a>
            <a href="/dashboard">{{ __('Dashboard') }}</a>
        </div>
    </nav>

    {{-- ============================================================
         HERO SECTION — Parallax
    ============================================================ --}}
    <section class="hero-section" id="hero" x-data="heroParallax()">
        <div class="hero-bg" :style="`transform: translateY(${offset}px)`">
            <div class="hero-grain"></div>
            <div class="hero-weave-overlay"></div>
        </div>

        <div class="hero-content">
            <p class="hero-eyebrow" x-data="revealEl()" x-intersect="reveal()" :class="{ 'revealed': shown }">
                {{ __('Est. 1978 · Premium Textile House') }}
            </p>
            <h1 class="hero-headline" x-data="revealEl(200)" x-intersect="reveal()" :class="{ 'revealed': shown }">
                {!! nl2br(e(\App\Models\Setting::getValue('hero_title', "Where Luxury\nMeets the Loom"))) !!}
            </h1>
            <p class="hero-sub" x-data="revealEl(350)" x-intersect="reveal()" :class="{ 'revealed': shown }">
                {{ \App\Models\Setting::getValue('hero_subtitle', "Purveyors of the world's finest fabrics — Silk, Velvet, Brocade & Cotton — curated for haute couture and bespoke interiors.") }}
            </p>
            <div class="hero-actions" x-data="revealEl(500)" x-intersect="reveal()" :class="{ 'revealed': shown }">
                <a href="#catalog" class="btn-primary-gold">{{ __('Explore Catalog') }}</a>
                <a href="#inquiry" class="btn-outline-ivory">{{ __('Request Samples') }}</a>
            </div>
        </div>

        <div class="hero-scroll-hint">
            <span>{{ __('Scroll') }}</span>
            <div class="scroll-line"></div>
        </div>

        {{-- Floating fabric swatches --}}
        <div class="floating-swatches">
            <div class="swatch swatch-1" style="background:#1a4a3a;"></div>
            <div class="swatch swatch-2" style="background:#c8a96e;"></div>
            <div class="swatch swatch-3" style="background:#f5f0e8;"></div>
            <div class="swatch swatch-4" style="background:#8b1a4a;"></div>
        </div>
    </section>

    {{-- ============================================================
         STATS TICKER
    ============================================================ --}}
    <div class="stats-bar">
        <div class="stats-inner">
            @foreach([['120+','Fabric Collections'],['48','Countries Served'],['30K+','Metres Daily'],['4.9★','Client Rating']] as $stat)
            <div class="stat-item" x-data="revealEl()" x-intersect="reveal()" :class="{ 'revealed': shown }">
                <span class="stat-value">{{ $stat[0] }}</span>
                <span class="stat-label">{{ __($stat[1]) }}</span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ============================================================
         VIRTUAL CATALOG CATEGORIES
    ============================================================ --}}
    <section id="categories" class="categories-section">
        <div class="section-header" x-data="revealEl()" x-intersect="reveal()" :class="{ 'revealed': shown }">
            <span class="section-tag">{{ __('Collections') }}</span>
            <h2 class="section-title">{{ \App\Models\Setting::getValue('collection_title', __('Virtual Fabric Catalog')) }}</h2>
            <h2 class="section-desc">{{ \App\Models\Setting::getValue('collection_desc', __('Discover our curated collections, sourced from the finest mills across Italy, India, and Egypt.')) }}</h2>
        </div>

        <div class="categories-grid">
            @foreach([
                ['Silk', '#f5f0e8', '#c8a96e', 'The pinnacle of luxury — our silk collection spans hand-painted prints to solid duchess satins.', '48 variants', 'From $180/m'],
                ['Velvet', '#1a2a3a', '#4a7a9b', 'Rich, deep-pile velvet for fashion and upholstery. Available in 60+ colors.', '62 variants', 'From $240/m'],
                ['Cotton', '#e8d5b7', '#b8956e', 'Breathable Egyptian cotton — from fine muslin to heavy canvas weaves.', '95 variants', 'From $45/m'],
                ['Brocade', '#2d1810', '#c8a96e', 'Ornate woven brocades with metallic threads — perfect for ceremonial garments.', '35 variants', 'From $320/m'],
                ['Linen', '#d4c5a9', '#8d7050', 'Sustainable, stonewashed Belgian linen in natural earth tones.', '40 variants', 'From $65/m'],
                ['Cashmere', '#c4a882', '#6d4c41', 'Ultra-fine Mongolian cashmere blends — the softest luxury in our catalog.', '22 variants', 'From $680/m'],
            ] as $idx => [$name, $bg, $accent, $desc, $variants, $price])
            <div class="category-card" style="--card-bg:{{ $bg }};--card-accent:{{ $accent }};"
                 x-data="revealEl({{ $idx * 80 }})" x-intersect="reveal()" :class="{ 'revealed': shown }">
                <div class="card-texture"></div>
                <div class="card-inner">
                    <div class="card-badge">{{ __($variants) }}</div>
                    <h3 class="card-title">{{ __($name) }}</h3>
                    <p class="card-desc">{{ __($desc) }}</p>
                    <div class="card-footer">
                        <span class="card-price">{{ __($price) }}</span>
                        <a href="#inquiry" class="card-cta">{{ __('Inquire') }} →</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- ============================================================
         ABOUT / HERITAGE
    ============================================================ --}}
    <section id="about" class="heritage-section">
        <div class="heritage-inner">
            <div class="heritage-text" x-data="revealEl()" x-intersect="reveal()" :class="{ 'revealed': shown }">
                <span class="section-tag">{{ __('Our Heritage') }}</span>
                <h2 class="section-title">{{ \App\Models\Setting::getValue('about_title', __('Four Decades of Textile Excellence')) }}</h2>
                <p>{{ \App\Models\Setting::getValue('about_text', __("Founded in 1978 in the heart of Cairo's historic textile district, Maison de Tissu has grown from a single showroom to a global network serving haute couture houses, luxury hotels, and bespoke tailors across 48 countries.")) }}</p>
                <p>{{ __("Every fabric in our collection is hand-selected by our master textile specialists, who travel annually to the world's finest mills — from the silk looms of Como to the velvet factories of Bursa.") }}</p>
                <div class="heritage-features">
                    @foreach(['Certified organic & sustainable options','Custom dyeing and printing services','Minimum order from 10 metres','Worldwide express shipping','Dedicated account managers'] as $feat)
                    <div class="feature-item">
                        <span class="feature-check">✦</span>
                        <span>{{ __($feat) }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="heritage-visual" x-data="revealEl(200)" x-intersect="reveal()" :class="{ 'revealed': shown }">
                <div class="visual-mosaic">
                    <div class="mosaic-1" style="background: linear-gradient(135deg, #1a4a3a, #2d7a5a);"></div>
                    <div class="mosaic-2" style="background: linear-gradient(135deg, #c8a96e, #9a7c3e);"></div>
                    <div class="mosaic-3" style="background: linear-gradient(135deg, #f5f0e8, #e0d4bc);"></div>
                    <div class="mosaic-4" style="background: linear-gradient(135deg, #1a1a2e, #2d2d5e);"></div>
                    <div class="mosaic-center">
                        <span class="mosaic-year">1978</span>
                        <span class="mosaic-sub">{{ __('Est.') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         INQUIRY FORM (Livewire)
    ============================================================ --}}
    <section id="inquiry" class="inquiry-section">
        <div class="section-header light" x-data="revealEl()" x-intersect="reveal()" :class="{ 'revealed': shown }">
            <span class="section-tag gold">{{ __('Request a Sample') }}</span>
            <h2 class="section-title ivory">{{ __('Begin Your Fabric Journey') }}</h2>
            <p class="section-desc ivory">{{ __('Complete the form and our specialists will reach out within 24 hours with tailored recommendations.') }}</p>
        </div>
        @livewire('inquiry-form')
    </section>

    {{-- ============================================================
         FOOTER
    ============================================================ --}}
    <footer class="landing-footer">
        <div class="footer-inner">
            <div class="footer-brand">
                <span class="logo-gem large">⟡</span>
                <span class="footer-name">Maison de Tissu</span>
                <p class="footer-tagline">{{ __('Purveyors of Premium Textiles Since 1978') }}</p>
            </div>
            <div class="footer-links">
                <div class="footer-col">
                    <h4>{{ __('Collections') }}</h4>
                    <a href="#">{{ __('Silk') }}</a><a href="#">{{ __('Velvet') }}</a><a href="#">{{ __('Cotton') }}</a><a href="#">{{ __('Brocade') }}</a>
                </div>
                <div class="footer-col">
                    <h4>{{ __('Company') }}</h4>
                    <a href="#">{{ __('About Us') }}</a><a href="#">{{ __('Heritage') }}</a><a href="#">{{ __('Sustainability') }}</a>
                </div>
                <div class="footer-col">
                    <h4>{{ __('Contact') }}</h4>
                    <a href="#">inquiries@maisontissu.com</a>
                    <a href="#">+20 2 2391 4567</a>
                    <a href="/dashboard">{{ __('Merchant Portal') }}</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© {{ date('Y') }} Maison de Tissu. {{ __('All rights reserved.') }}</p>
        </div>
    </footer>

    <script>
        function heroParallax() {
            return {
                offset: 0,
                init() {
                    window.addEventListener('scroll', () => {
                        this.offset = window.scrollY * 0.4;
                    });
                }
            }
        }

        function revealEl(delay = 0) {
            return {
                shown: false,
                reveal() {
                    setTimeout(() => this.shown = true, delay);
                }
            }
        }
    </script>

</x-layouts.app>
