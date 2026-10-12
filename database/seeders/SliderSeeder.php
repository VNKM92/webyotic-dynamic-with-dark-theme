<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Slider::count() === 0) {
            Slider::create([
                'badge' => '⚡ AI-POWERED SEARCH DOMINANCE',
                'title' => 'Next-Gen Semantic SEO & #1 SERP Domination',
                'highlight' => '#1 SERP Domination',
                'subtitle' => 'Outpace algorithmic updates with automated Knowledge Graph schemas, generative AI search optimization (AEO), and programmatic high-intent keyword clustering.',
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1600&q=85',
                'button_text' => 'Get Free SEO Audit',
                'button_url' => '/contact',
                'secondary_button_text' => 'View Case Studies',
                'secondary_button_url' => '/gallery',
                'seo_stat_label_1' => 'Organic Traffic Surge',
                'seo_stat_val_1' => '+420%',
                'seo_stat_label_2' => 'Core Web Vitals',
                'seo_stat_val_2' => '100/100',
                'seo_stat_label_3' => 'Top 3 SERPs',
                'seo_stat_val_3' => '4,850+',
                'order' => 1,
                'is_active' => true,
            ]);

            Slider::create([
                'badge' => '🚀 LIGHTNING EDGE INFRASTRUCTURE',
                'title' => 'Sub-Second Speed Architecture Engineered for Maximum Crawl Budget',
                'highlight' => 'Maximum Crawl Budget',
                'subtitle' => 'Search engines prioritize instantaneous rendering. We combine edge server caching, zero Cumulative Layout Shift (CLS), and sub-20ms TTFB for dominant indexation.',
                'image' => 'https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=1600&q=85',
                'button_text' => 'Audit Speed Score',
                'button_url' => '/contact',
                'secondary_button_text' => 'Explore Solutions',
                'secondary_button_url' => '/services',
                'seo_stat_label_1' => 'Global TTFB',
                'seo_stat_val_1' => '12ms',
                'seo_stat_label_2' => 'Edge Availability',
                'seo_stat_val_2' => '99.99%',
                'seo_stat_label_3' => 'Contentful Paint',
                'seo_stat_val_3' => '0.3s',
                'order' => 2,
                'is_active' => true,
            ]);

            Slider::create([
                'badge' => '📈 REVENUE-FIRST ORGANIC CONVERSION',
                'title' => 'Programmatic SEO & High-Authority Organic Conversion Engines',
                'highlight' => 'Organic Conversion Engines',
                'subtitle' => 'Transform search traffic into enterprise client pipeline. Mathematically linked architecture, high-trust entity validation, and data-backed conversion rate optimization.',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1600&q=85',
                'button_text' => 'Schedule Consultation',
                'button_url' => '/contact',
                'secondary_button_text' => 'View Proof of Work',
                'secondary_button_url' => '/gallery',
                'seo_stat_label_1' => 'Pipeline Return',
                'seo_stat_val_1' => '18.4x',
                'seo_stat_label_2' => 'Indexed Landers',
                'seo_stat_val_2' => '32,000+',
                'seo_stat_label_3' => 'Conversion Lift',
                'seo_stat_val_3' => '4.6x',
                'order' => 3,
                'is_active' => true,
            ]);
        }
    }
}
