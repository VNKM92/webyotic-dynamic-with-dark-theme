<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        if (Post::count() > 0) {
            return;
        }

        $author = User::first();
        if (!$author) {
            $author = User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'role' => 'admin',
            ]);
        }

        $posts = [
            [
                'title' => 'The Future of SEO: 5 Trends to Watch in 2025',
                'category' => 'SEO Strategy',
                'image' => 'https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?auto=format&fit=crop&w=1200&q=80',
                'body' => '<p>Discover the emerging trends that will shape search: AI-driven experiences, voice search, UX ranking signals, and more.</p>',
                'seo_title' => 'Future of SEO in 2025',
                'seo_description' => '5 SEO trends to watch in 2025 including AI, voice search, and Core Web Vitals.',
                'seo_keywords' => 'SEO, AI, voice search, core web vitals',
                'focus_keyword' => 'SEO Trends 2025',
            ],
            [
                'title' => 'Mastering Content Marketing for B2B Growth',
                'category' => 'Marketing',
                'image' => 'https://images.unsplash.com/photo-1499750310159-5b600aaf0320?auto=format&fit=crop&w=1200&q=80',
                'body' => '<p>Learn how to create a B2B content strategy that drives qualified leads and nurtures relationships.</p>',
                'seo_title' => 'B2B Content Marketing',
                'seo_description' => 'A practical guide to B2B content marketing and compounding growth.',
                'seo_keywords' => 'content marketing, b2b, lead generation',
                'focus_keyword' => 'B2B Content',
            ],
            [
                'title' => 'Technical SEO: A Comprehensive Guide for Developers',
                'category' => 'Technical',
                'image' => 'https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=1200&q=80',
                'body' => '<p>Dive deep into technical SEO: performance, mobile, structured data, rendering, and indexability.</p>',
                'seo_title' => 'Technical SEO Guide',
                'seo_description' => 'Comprehensive guide to technical SEO for developers.',
                'seo_keywords' => 'technical seo, performance, structured data',
                'focus_keyword' => 'Technical SEO',
            ],
            [
                'title' => 'Social Media Signals and Search Rankings',
                'category' => 'Social Media',
                'image' => 'https://images.unsplash.com/photo-1611162617474-5b21e879e113?auto=format&fit=crop&w=1200&q=80',
                'body' => '<p>An analysis on whether social media signals impact search rankings and best practices.</p>',
                'seo_title' => 'Social Signals and SEO',
                'seo_description' => 'Do social media signals affect SEO? Data and best practices.',
                'seo_keywords' => 'social signals, seo, rankings',
                'focus_keyword' => 'Social Signals',
            ],
        ];

        foreach ($posts as $p) {
            $category = Category::where('name', $p['category'])->first();
            $post = Post::create([
                'title' => $p['title'],
                'slug' => Str::slug($p['title']),
                'body' => $p['body'],
                'user_id' => $author->id,
                'category_id' => optional($category)->id,
                'image' => $p['image'],
                'seo_title' => $p['seo_title'],
                'seo_description' => $p['seo_description'],
                'seo_keywords' => $p['seo_keywords'],
                'focus_keyword' => $p['focus_keyword'],
            ]);
        }
    }
}
