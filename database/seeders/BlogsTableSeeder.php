<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogsTableSeeder extends Seeder
{
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'How I Structure Laravel Projects for Long-Term Growth',
                'slug' => Str::slug('How I Structure Laravel Projects for Long-Term Growth'),
                'excerpt' => 'A practical look at the patterns I use to keep Laravel apps maintainable as they grow.',
                'content' => "I start every Laravel project with a clear boundary between application logic, data access, and presentation. That usually means models stay lean, controllers stay focused, and reusable business logic is placed into dedicated classes or repositories when the project needs it.\n\nI also pay attention to naming, relationships, and content structure early so the system can grow without turning into a maze of special cases. The goal is to keep shipping quickly without creating avoidable technical debt.\n\nFor most client projects, this approach makes handoff easier, debugging faster, and future feature work much less painful.",
                'category' => 'Laravel',
                'cover_image' => 'assets/images/proxima.png',
                'published_at' => now()->subDays(12),
                'is_featured' => true,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Why Business Software Needs Better Content Structure',
                'slug' => Str::slug('Why Business Software Needs Better Content Structure'),
                'excerpt' => 'If your software feels hard to use, the problem is often the structure of the content, not only the UI.',
                'content' => "Business users do not want to decode your interface. They want to find the right data, understand the current state, and complete work quickly. That is why content structure matters just as much as styling.\n\nGood dashboards, strong labels, clear hierarchy, and meaningful empty states make software easier to trust. This is especially important for admin panels, workflow tools, and SaaS products where people spend many hours a day inside the application.\n\nI build with that in mind so the final system feels calm, readable, and practical under real-world pressure.",
                'category' => 'Product Design',
                'cover_image' => 'assets/images/mhzone.png',
                'published_at' => now()->subDays(8),
                'is_featured' => true,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'A Simple Way to Think About Automation Opportunities',
                'slug' => Str::slug('A Simple Way to Think About Automation Opportunities'),
                'excerpt' => 'Look for repeated tasks, frequent handoffs, and data entry that can be reduced or removed.',
                'content' => "The best automation opportunities usually show up in repetitive, boring work. If a task happens every day, follows the same steps, and wastes human attention, it is probably a candidate for automation.\n\nI often look at lead intake, notification flows, report generation, and administrative approvals. Those are common areas where even a small improvement can save a team a lot of time.\n\nAutomation is most valuable when it removes friction without making the process harder to understand. That balance is what I try to build into the systems I deliver.",
                'category' => 'Automation',
                'cover_image' => 'images/coding2.jpg',
                'published_at' => now()->subDays(3),
                'is_featured' => false,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('blogs')->insert($blogs);
    }
}
