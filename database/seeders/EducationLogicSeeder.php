<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Str;

class EducationLogicSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('is_admin', true)->first() ?? User::factory()->create(['is_admin' => true]);

        $content = [
            'Tips' => [
                [
                    'title' => 'Top 10 Breastfeeding Tips for Beginners',
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Focus on comfort, hydration, and patience...',
                ],
                [
                    'title' => 'Nighttime Breastfeeding: Survival Guide',
                    'content' => 'How to manage those middle-of-the-night sessions without losing your mind or sleep rhythm...',
                ]
            ],
            'Latching & Attaching' => [
                [
                    'title' => 'Mastering the Deep Latch',
                    'content' => 'A step-by-step guide to ensuring your baby is attached correctly for painless feeding...',
                ],
                [
                    'title' => 'Common Latching Problems & Solutions',
                    'content' => 'Dealing with shallow latches, nipple soreness, and fussy babies during attachment...',
                ]
            ],
            'Proper Nutrition' => [
                [
                    'title' => 'Best Foods for Lactation Support',
                    'content' => 'Discover the superfoods that help boost your milk supply naturally and healthily...',
                ],
                [
                    'title' => 'Staying Hydrated While Nursing',
                    'content' => 'Why water intake is critical and how to stay hydrated throughout your busy day...',
                ]
            ]
        ];

        foreach ($content as $category => $articles) {
            foreach ($articles as $articleData) {
                Article::updateOrCreate(
                    ['slug' => Str::slug($articleData['title'])],
                    [
                        'title' => $articleData['title'],
                        'content' => $articleData['content'],
                        'category' => $category,
                        'author_id' => $admin->id,
                        'is_published' => true,
                        'published_at' => now(),
                    ]
                );
            }
        }
    }
}
