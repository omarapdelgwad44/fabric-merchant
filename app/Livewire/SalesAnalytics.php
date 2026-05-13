<?php

namespace App\Livewire;

use Livewire\Component;

class SalesAnalytics extends Component
{
    public string $period = 'monthly';
    public string $chartType = 'bar';

    public function getChartDataProperty(): array
    {
        $data = [
            'monthly' => [
                'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                'silk'    => [42000, 38000, 55000, 61000, 49000, 72000, 68000, 81000, 74000, 63000, 89000, 95000],
                'cotton'  => [28000, 31000, 29000, 35000, 42000, 38000, 45000, 51000, 47000, 53000, 48000, 62000],
                'velvet'  => [15000, 18000, 22000, 19000, 14000, 11000, 13000, 16000, 24000, 31000, 38000, 44000],
                'brocade' => [8000,  12000, 9000,  14000, 11000, 8000,  10000, 15000, 18000, 22000, 28000, 35000],
            ],
            'quarterly' => [
                'labels' => ['Q1', 'Q2', 'Q3', 'Q4'],
                'silk'    => [135000, 182000, 223000, 247000],
                'cotton'  => [88000,  115000, 143000, 163000],
                'velvet'  => [55000,  44000,  53000,  113000],
                'brocade' => [29000,  33000,  43000,  85000],
            ],
            'yearly' => [
                'labels' => ['2021', '2022', '2023', '2024', '2025'],
                'silk'    => [520000, 680000, 790000, 910000, 787000],
                'cotton'  => [310000, 380000, 430000, 509000, 432000],
                'velvet'  => [180000, 220000, 265000, 310000, 247000],
                'brocade' => [90000,  130000, 165000, 190000, 210000],
            ],
        ];

        return $data[$this->period];
    }

    public function getStatsProperty(): array
    {
        return [
            ['label' => 'Total Revenue', 'value' => '$847,240', 'change' => '+18.4%', 'up' => true],
            ['label' => 'Orders This Month', 'value' => '1,284', 'change' => '+12.1%', 'up' => true],
            ['label' => 'Avg Order Value', 'value' => '$660', 'change' => '+5.7%', 'up' => true],
            ['label' => 'Returns Rate', 'value' => '2.3%', 'change' => '-0.8%', 'up' => false],
        ];
    }

    public function render()
    {
        return view('livewire.sales-analytics', [
            'chartData' => $this->chartData,
            'stats' => $this->stats,
        ]);
    }
}
