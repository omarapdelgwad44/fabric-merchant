<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'key' => 'hero_title',
                'value' => [
                    'en' => 'The Art of Rare Fabrics',
                    'ar' => 'فن الأقمشة النادرة'
                ],
                'group' => 'hero'
            ],
            [
                'key' => 'hero_subtitle',
                'value' => [
                    'en' => 'Maison de Tissu — Purveyors of the world\'s finest silks, velvets, and heritage textiles since 1924.',
                    'ar' => 'ميزون دي تيسو — موردو أفخر أنواع الحرير والمخمل والمنسوجات التراثية في العالم منذ عام 1924.'
                ],
                'group' => 'hero'
            ],
            [
                'key' => 'about_title',
                'value' => [
                    'en' => 'Our Heritage',
                    'ar' => 'تراثنا العريق'
                ],
                'group' => 'about'
            ],
            [
                'key' => 'about_text',
                'value' => [
                    'en' => 'For nearly a century, we have travelled the silk roads and hidden valleys of the world to bring you fabrics of unparalleled quality.',
                    'ar' => 'على مدار قرن من الزمان، سافرنا عبر طرق الحرير والوديان المخفية في العالم لنقدم لكم أقمشة ذات جودة لا تضاهى.'
                ],
                'group' => 'about'
            ],
        ];

        foreach ($settings as $s) {
            Setting::updateOrCreate(['key' => $s['key']], $s);
        }
    }
}
