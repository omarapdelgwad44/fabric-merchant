<div class="analytics-component" x-data="salesChart(@js($chartData), '{{ $period }}', '{{ $chartType }}')" x-init="init()" wire:key="analytics-{{ $period }}-{{ $chartType }}">

    {{-- Stats Row --}}
    <div class="analytics-stats">
        @foreach($stats as $stat)
        <div class="analytics-stat">
            <div class="astat-label">{{ __($stat['label']) }}</div>
            <div class="astat-value">{{ $stat['value'] }}</div>
            <div class="astat-change {{ $stat['up'] ? 'positive' : 'negative' }}">{{ $stat['change'] }}</div>
        </div>
        @endforeach
    </div>

    {{-- Chart Controls --}}
    <div class="chart-controls">
        <div class="period-tabs">
            @foreach(['monthly' => 'Monthly', 'quarterly' => 'Quarterly', 'yearly' => 'Yearly'] as $key => $label)
            <button wire:click="$set('period', '{{ $key }}')"
                    class="period-tab {{ $period === $key ? 'active' : '' }}">{{ __($label) }}</button>
            @endforeach
        </div>
        <div class="chart-type-tabs">
            @foreach(['bar' => '▦ Bar', 'line' => '◎ Line'] as $type => $label)
            <button wire:click="$set('chartType', '{{ $type }}')"
                    class="chart-type-btn {{ $chartType === $type ? 'active' : '' }}">{{ __($label) }}</button>
            @endforeach
        </div>
    </div>

    {{-- Chart Canvas --}}
    <div class="chart-container">
        <canvas id="salesChart" wire:ignore></canvas>
    </div>

    {{-- Category Legend --}}
    <div class="chart-legend">
        @foreach([
            ['Silk', '#c8a96e'],
            ['Cotton', '#d4b483'],
            ['Velvet', '#1a4a3a'],
            ['Brocade', '#8b6914'],
        ] as [$name, $color])
        <div class="legend-item">
            <span class="legend-dot" style="background:{{ $color }};"></span>
            <span>{{ __($name) }}</span>
        </div>
        @endforeach
    </div>
</div>

<script>
function salesChart(data, period, chartType) {
    return {
        chart: null,
        data,
        period,
        chartType,
        init() {
            this.$nextTick(() => this.renderChart());
            this.$watch('data', () => this.renderChart());
        },
        renderChart() {
            const ctx = document.getElementById('salesChart');
            if (!ctx) return;
            if (this.chart) this.chart.destroy();

            const colors = ['#c8a96e', '#d4b483', '#1a4a3a', '#8b6914'];
            const datasets = [
                { label: 'Silk',    data: this.data.silk,    backgroundColor: colors[0] + 'cc', borderColor: colors[0] },
                { label: 'Cotton',  data: this.data.cotton,  backgroundColor: colors[1] + 'cc', borderColor: colors[1] },
                { label: 'Velvet',  data: this.data.velvet,  backgroundColor: colors[2] + 'cc', borderColor: colors[2] },
                { label: 'Brocade', data: this.data.brocade, backgroundColor: colors[3] + 'cc', borderColor: colors[3] },
            ];

            this.chart = new Chart(ctx, {
                type: this.chartType === 'line' ? 'line' : 'bar',
                data: { labels: this.data.labels, datasets },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#1a1a1a',
                            titleColor: '#c8a96e',
                            bodyColor: '#e8e0d0',
                            borderColor: '#c8a96e',
                            borderWidth: 1,
                            callbacks: {
                                label: ctx => ` ${ctx.dataset.label}: $${ctx.raw.toLocaleString()}`
                            }
                        }
                    },
                    scales: {
                        x: { grid: { color: '#2a2a2a' }, ticks: { color: '#888' } },
                        y: {
                            grid: { color: '#2a2a2a' },
                            ticks: { color: '#888', callback: v => '$' + (v/1000).toFixed(0) + 'k' }
                        }
                    },
                    elements: {
                        line: { tension: 0.4, fill: false },
                        point: { radius: 4, hoverRadius: 7 },
                        bar: { borderRadius: 4 }
                    },
                    animation: { duration: 800, easing: 'easeInOutQuart' }
                }
            });
        }
    }
}
</script>
