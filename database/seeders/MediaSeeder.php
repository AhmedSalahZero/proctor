<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::factory()->create([
            'name'=>[
                'en'=>'Website',
                'ar'=>'الموقع'
            ],
            'slug'=>'Website',
            'link'=>'https://stc-eg.com'
        ]);

        Media::factory()->create([
            'name'=>[
                'en'=>'Facebook',
                'ar'=>'فيسبوك'
            ],
            'slug'=>'Facebook',
            'link'=>'https://www.facebook.com'
        ]);
        Media::factory()->create([
            'name'=>[
                'en'=>'Twitter',
                'ar'=>'تويتر'
            ],
            'slug'=>'Twitter',
            'link'=>'https://www.twitter.com'
        ]);
        Media::factory()->create([
            'name'=>[
                'en'=>'Youtube',
                'ar'=>'يوتيوب'
            ],
            'slug'=>'Youtube',
            'link'=>'https://www.youtube.com'
        ]);
        Media::factory()->create([
            'name'=>[
                'en'=>'Instagram',
                'ar'=>'انستجرام'
            ],
            'slug'=>'Instagram',
            'link'=>'https://www.instagram.com'
        ]);

        Media::factory()->create([
            'name'=>[
                'en'=>'Other',
                'ar'=>'غير ذلك',

            ],
            'slug'=>'Other',
        ]);
    }
}
