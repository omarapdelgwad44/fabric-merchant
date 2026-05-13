<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fabric;
use App\Models\Order;

class FabricSeeder extends Seeder
{
    public function run(): void
    {
        // Fabrics
        $fabrics = [
            [
                'name' => ['en' => 'Royal Silk Ivory', 'ar' => 'حرير ملكي عاجي'],
                'category' => ['en' => 'Silk', 'ar' => 'حرير'],
                'stock' => 85, 'price' => 320, 'color' => '#f5f0e8', 'color2' => '#d4b483', 'status' => 'In Stock', 'rolls' => 34
            ],
            [
                'name' => ['en' => 'Emerald Velvet', 'ar' => 'مخمل زمردي'],
                'category' => ['en' => 'Velvet', 'ar' => 'مخمل'],
                'stock' => 45, 'price' => 480, 'color' => '#1a4a3a', 'color2' => '#2d7a5a', 'status' => 'In Stock', 'rolls' => 18
            ],
            [
                'name' => ['en' => 'Egyptian Cotton', 'ar' => 'قطن مصري'],
                'category' => ['en' => 'Cotton', 'ar' => 'قطن'],
                'stock' => 92, 'price' => 150, 'color' => '#e8d5b7', 'color2' => '#c9a96e', 'status' => 'In Stock', 'rolls' => 46
            ],
            [
                'name' => ['en' => 'Gold Brocade', 'ar' => 'بروكار ذهبي'],
                'category' => ['en' => 'Brocade', 'ar' => 'بروكار'],
                'stock' => 22, 'price' => 650, 'color' => '#c8a96e', 'color2' => '#9a7c3e', 'status' => 'Low Stock', 'rolls' => 9
            ],
        ];

        foreach ($fabrics as $f) {
            Fabric::create($f);
        }

        // Orders (Keep orders simple for now as they relate to fabric names)
        Order::create([
            'order_number' => 'ORD-2847',
            'client' => 'Al-Rashid Trading Co.',
            'fabric_name' => 'Royal Silk Ivory',
            'qty' => '120m',
            'total' => '$38,400',
            'status' => 'In Transit',
            'timeline' => [
                ['step' => 'Order Placed', 'date' => 'May 10, 09:14', 'done' => true, 'icon' => '📋'],
                ['step' => 'Shipped', 'date' => 'May 13, 16:45', 'done' => true, 'icon' => '🚚'],
            ]
        ]);
    }
}
