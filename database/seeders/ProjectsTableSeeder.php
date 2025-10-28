<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Proxima Digital',
                'slug' => Str::slug('Proxima Digital'),
                'category_id' => 1,
                'description' => 'A comprehensive IT solution platform built with Laravel, Vue.js, and MySQL, designed using TailwindCSS for a modern and responsive UI.',
                'url' => 'http://www.proximadigital.co/',
                'image' => 'assets/images/proxima.png',
                'order' => 1,
                'is_featured' => true,
                'status' => 1,
            ],
            [
                'name' => 'Vinitycard',
                'slug' => Str::slug('Vinitycard'),
                'category_id' => 5,
                'description' => 'A Smart Business Card solution with interactive features, instant contact sharing, and real-time updates. Developed with Laravel and Livewire.',
                'url' => 'https://vinitycard.com/',
                'image' => 'assets/images/vinitycard.png',
                'order' => 2,
                'is_featured' => true,
                'status' => 1,
            ],
            [
                'name' => 'MH ZONE',
                'slug' => Str::slug('MH ZONE'),
                'category_id' => 2,
                'description' => 'A fully functional multi-vendor eCommerce platform using Laravel and MySQL. The platform allows users to seamlessly switch between two modes: Seller and Buyer.',
                'url' => 'https://mhzone.mokaddes.com/',
                'image' => 'assets/images/mhzone.png',
                'order' => 3,
                'is_featured' => true,
                'status' => 1,
            ],
            [
                'name' => 'Real Time Chat App',
                'slug' => Str::slug('Real Time Chat App'),
                'category_id' => 1,
                'description' => 'A real-time chat application that allows users to create chat rooms and send messages. Built using Laravel, Vue.js, and Pusher.',
                'url' => 'https://chat.mokaddes.com/',
                'image' => 'assets/images/chat.png',
                'order' => 4,
                'is_featured' => false,
                'status' => 1,
            ],
            [
                'name' => 'BRP',
                'slug' => Str::slug('BRP'),
                'category_id' => 2,
                'description' => 'A comprehensive e-commerce platform for tuning, racing, drifting, drag racing, and conversions.',
                'url' => 'https://www.brp.online',
                'image' => 'assets/images/brp.gif',
                'order' => 5,
                'is_featured' => false,
                'status' => 1,
            ],
            [
                'name' => 'Franchises Available Now',
                'slug' => Str::slug('Franchises Available Now'),
                'category_id' => 3,
                'description' => 'A platform that helps users discover and evaluate franchise opportunities by interest, budget, and location, providing details on costs & requirements for informed decision-making.',
                'url' => 'https://franchisesavailablenow.com/',
                'image' => 'assets/images/franchises.png',
                'order' => 6,
                'is_featured' => false,
                'status' => 1,
            ],
            [
                'name' => 'Zentune',
                'slug' => Str::slug('Zentune'),
                'category_id' => 3,
                'description' => 'A platform that develops modified files for all vehicles including stage. Utilized Laravel REST API for smooth app integration.',
                'url' => 'https://www.zentune.online',
                'image' => 'assets/images/zentune.png',
                'order' => 7,
                'is_featured' => false,
                'status' => 1,
            ],
            [
                'name' => 'Everisamting',
                'slug' => Str::slug('Everisamting'),
                'category_id' => 3,
                'description' => 'A classified platform that seamlessly incorporates event management, leveraging Laravel REST API for seamless app integration.',
                'url' => 'https://everisamting.com/',
                'image' => 'assets/images/everisamting.png',
                'order' => 8,
                'is_featured' => false,
                'status' => 1,
            ],
            [
                'name' => 'Service Provider',
                'slug' => Str::slug('Service Provider'),
                'category_id' => 5,
                'description' => 'A platform facilitating interaction between service providers and customers, offering a range of services.',
                'url' => 'https://serviceprovider.ae/',
                'image' => 'assets/images/sp.png',
                'order' => 9,
                'is_featured' => false,
                'status' => 1,
            ],
            [
                'name' => 'Enjoy City Tour',
                'slug' => Str::slug('Enjoy City Tour'),
                'category_id' => 4,
                'description' => 'A car booking platform for users to find and book exciting activities, guided tours, and sightseeing adventures.',
                'url' => 'https://enjoycitytours.com/',
                'image' => 'assets/images/ect.png',
                'order' => 10,
                'is_featured' => false,
                'status' => 1,
            ],
            [
                'name' => 'TCLI Library',
                'slug' => Str::slug('TCLI Library'),
                'category_id' => 4,
                'description' => 'An innovative online library management platform with integrated forums, clubs, and REST API support for seamless app integration.',
                'url' => 'https://www.tclibrary.com',
                'image' => 'assets/images/tcli.png',
                'order' => 11,
                'is_featured' => false,
                'status' => 1,
            ],
            [
                'name' => 'Dhereye Delivery',
                'slug' => Str::slug('Dhereye Delivery'),
                'category_id' => 5,
                'description' => 'A courier management platform catering to both corporate and retail customers, featuring product tracking capabilities.',
                'url' => 'https://enjoycitytours.com/',
                'image' => 'assets/images/dhereye.png',
                'order' => 12,
                'is_featured' => false,
                'status' => 1,
            ],
        ];

        DB::table('projects')->insert($projects);
    }
}
