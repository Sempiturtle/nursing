<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Video;
use App\Models\Clinic;
use App\Models\Hotline;
use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@milkyway.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        // Regular User
        User::updateOrCreate(
            ['email' => 'user@milkyway.com'],
            [
                'name' => 'Demo Mother',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ]
        );

        // Articles
        Article::updateOrCreate(
            ['title' => 'Mastering the Latch: A Guide for New Mothers'],
            [
                'content' => "A good latch is the foundation of successful breastfeeding. Ensure your baby's mouth is wide open before bringing them to the breast. The chin should touch the breast first, and the nose should be clear. If it hurts, gently break the seal with your finger and try again. Don't be afraid to ask for help from a lactation consultant.",
                'category' => 'Latching & Attaching',
                'is_published' => true,
                'published_at' => now(),
            ]
        );

        Article::updateOrCreate(
            ['title' => 'Proper Nutrition During Breastfeeding'],
            [
                'content' => "Eating a balanced diet is crucial when nursing. Focus on nutrient-dense foods like leafy greens, lean proteins, and healthy fats. Stay hydrated by drinking plenty of water throughout the day. Avoid excessive caffeine and processed sugars. Your body needs extra calories to produce high-quality milk for your little one.",
                'category' => 'Proper Nutrition',
                'is_published' => true,
                'published_at' => now(),
            ]
        );

        // Videos
        Video::updateOrCreate(
            ['title' => 'Step-by-Step Latching Technique'],
            [
                'description' => 'A visual guide to achieving a perfect latch every time.',
                'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'thumbnail' => 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'category' => 'Tutorials',
            ]
        );

        Video::updateOrCreate(
            ['title' => 'Safe Milk Storage Guidelines'],
            [
                'description' => 'Learn how to store and handle expressed breast milk safely.',
                'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'thumbnail' => 'https://images.unsplash.com/photo-1596464716127-f2a82984de30?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'category' => 'Education',
            ]
        );

        // Clinics
        Clinic::updateOrCreate(
            ['name' => 'Metro Maternal Care Center'],
            [
                'address' => 'Suite 101, Medical Plaza, Makati City',
                'contact_number' => '+63 2 8888 0000',
                'operating_hours' => 'Mon-Sat: 8am - 6pm',
                'services' => 'Lactation Consultation, Prenatal Care, Postnatal Support',
            ]
        );

        Clinic::updateOrCreate(
            ['name' => 'Quezon City Breastfeeding Station'],
            [
                'address' => 'Ground Floor, City Hall, Quezon City',
                'contact_number' => '+63 2 9999 1111',
                'operating_hours' => 'Daily: 9am - 5pm',
                'services' => 'Public Breastfeeding Room, Sanitary Station',
            ]
        );

        // Hotlines
        Hotline::updateOrCreate(
            ['name' => 'Breastfeeding PH Support'],
            [
                'number' => '1-800-MILK-WAY',
                'region' => 'National',
                'description' => '24/7 National hotline for breastfeeding support and emergencies.',
            ]
        );

        Hotline::updateOrCreate(
            ['name' => 'NCR Maternal Link'],
            [
                'number' => '02-888-HELP',
                'region' => 'NCR',
                'description' => 'Dedicated link for mothers within the National Capital Region.',
            ]
        );

        // FAQs
        Faq::updateOrCreate(
            ['question' => 'How often should I breastfeed my newborn?'],
            [
                'answer' => 'Newborns should typically be fed on demand, which is usually 8 to 12 times in a 24-hour period.',
                'category' => 'General',
            ]
        );
    }
}
