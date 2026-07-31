<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('settings')->updateOrInsert(
            ['id' => 1],
            [
                'portfolio_name' => 'Mokaddes Hosain',
                'portfolio_image' => 'assets/images/mokaddes.png',
                'favicon' => 'assets/images/mokaddes.png',
                'seo_image' => 'assets/images/hero.png',

                'meta_title' => 'Mokaddes Hosain | Laravel Developer | SaaS | Automation',
                'meta_description' => 'Content-driven Laravel portfolio with live projects, services, about details, and blog articles.',
                'keywords' => 'Laravel developer, SaaS, automation, web development, portfolio, Bangladesh',

                'is_captcha_enable' => false,
                'captcha_key' => null,
                'captcha_secret' => null,

                // Certificate SEO
                'certificate_title' => 'Software Developer Experience Certificate | Mokaddes Hosain ',
                'certificate_issuer' => 'Dhaka Softwares',

                'certificate_image' => 'assets/images/certificate.png',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
