<x-layouts.dashboard title="Dashboard — Maison de Tissu" pageTitle="Inventory & Analytics">

    {{-- ============================================================
         KPI STATS ROW
    ============================================================ --}}
    <div class="kpi-grid" x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 100)">
        @foreach([
            ['Total Stock Value', '$' . number_format(\App\Models\Fabric::sum(\DB::raw('stock * price')) / 10), '+8.2%', '▦', '#c8a96e', true],
            ['Active Orders', \App\Models\Order::count(), '+12', '◫', '#1a4a3a', true],
            ['New Inquiries', \App\Models\Inquiry::count(), 'Response Needed', '✉', '#c0392b', false],
            ['Fabric Varieties', \App\Models\Fabric::count(), 'In Catalog', '◎', '#c8a96e', true],
        ] as $idx => [$label, $value, $change, $icon, $color, $up])
        <div class="kpi-card" :class="{ 'kpi-visible': shown }" style="--kpi-delay: {{ $idx * 100 }}ms; --kpi-color: {{ $color }}">
            <div class="kpi-icon">{{ $icon }}</div>
            <div class="kpi-content">
                <div class="kpi-label">{{ __($label) }}</div>
                <div class="kpi-value">{{ $value }}</div>
                <div class="kpi-change {{ $up ? 'positive' : 'negative' }}">{{ __($change) }}</div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- ============================================================
         MAIN DASHBOARD GRID
    ============================================================ --}}
    <div class="dashboard-grid">

        {{-- LEFT: Inventory + Analytics --}}
        <div class="dashboard-left">

            {{-- Inventory Grid --}}
            <div id="inventory" class="dash-card">
                <div class="dash-card-header">
                    <h2 class="dash-card-title">▦ {{ __('Fabric Inventory') }}</h2>
                </div>
                @livewire('inventory-grid')
            </div>

            {{-- Sales Analytics --}}
            <div id="analytics" class="dash-card">
                <div class="dash-card-header">
                    <h2 class="dash-card-title">◎ {{ __('Sales Analytics') }}</h2>
                </div>
                @livewire('sales-analytics')
            </div>

            {{-- Order Timeline --}}
            <div id="orders" class="dash-card">
                <div class="dash-card-header">
                    <h2 class="dash-card-title">◫ {{ __('Order Tracking') }}</h2>
                </div>
                @livewire('order-timeline')
            </div>

            {{-- Customer Inquiries --}}
            <div id="inquiries" class="dash-card">
                <div class="dash-card-header">
                    <h2 class="dash-card-title">✉ {{ __('Customer Inquiries') }}</h2>
                </div>
                @livewire('inquiry-manager')
            </div>

        </div>

        {{-- RIGHT: Quick Actions Sidebar --}}
        <div class="dashboard-right">
            @livewire('quick-actions')
        </div>

    </div>

</x-layouts.dashboard>
