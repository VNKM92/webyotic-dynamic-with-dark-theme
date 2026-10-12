<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Enterprise Web Applications',
                'slug' => 'enterprise-web-applications',
                'icon' => 'code-bracket',
                'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=1200&q=80',
                'short_description' => 'Scalable, fault-tolerant web applications engineered with modern Laravel, Next.js, and high-concurrency microservices.',
                'description' => 'We engineer bespoke enterprise web platforms built for speed, high transaction volumes, and ironclad security. From complex ERPs to customer-facing SaaS products, our systems run with sub-second latency and seamless responsiveness.',
                'seo_title' => 'Enterprise Web Application Development | Webyotic',
                'seo_description' => 'Bespoke enterprise web development with Laravel, Next.js, and cloud architectures built for speed and reliability.',
                'seo_keywords' => 'enterprise web development, laravel development, nextjs agency, scalable web apps',
                'focus_keyword' => 'Enterprise Web Applications',
            ],
            [
                'title' => 'AI Engineering & Automation',
                'slug' => 'ai-engineering-and-automation',
                'icon' => 'cpu-chip',
                'image' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&w=1200&q=80',
                'short_description' => 'Custom AI agents, LLM integrations, automated business workflows, and predictive analytics pipelines.',
                'description' => 'Supercharge your operations with intelligent automation. We embed autonomous AI agents, enterprise search RAG pipelines, and automated intelligence directly into your core business software.',
                'seo_title' => 'AI Engineering & Automation Solutions | Webyotic',
                'seo_description' => 'Custom AI workflows, LLM agents, and business process automation engineered for modern enterprises.',
                'seo_keywords' => 'ai engineering, llm integration, business automation, ai agents',
                'focus_keyword' => 'AI Engineering',
            ],
            [
                'title' => 'High-Impact Data-Driven SEO',
                'slug' => 'high-impact-data-driven-seo',
                'icon' => 'arrow-trending-up',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80',
                'short_description' => 'Dominate competitive SERPs with advanced technical audits, semantic keyword mapping, and programmatic content architecture.',
                'description' => 'Move beyond basic SEO. We optimize Core Web Vitals, implement structured schema graphs, execute precision content strategies, and build high-authority backlink foundations that drive real commercial pipeline.',
                'seo_title' => 'Enterprise SEO & Organic Growth Strategy | Webyotic',
                'seo_description' => 'Data-driven technical SEO, Core Web Vitals tuning, and organic revenue scaling for fast-growing companies.',
                'seo_keywords' => 'enterprise seo, technical seo agency, organic growth, search ranking',
                'focus_keyword' => 'Technical SEO',
            ],
            [
                'title' => 'Cloud Architecture & DevOps',
                'slug' => 'cloud-architecture-devops',
                'icon' => 'cloud',
                'image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1200&q=80',
                'short_description' => 'Zero-downtime CI/CD pipelines, containerized AWS/GCP clusters, serverless orchestration, and SOC2-compliant security.',
                'description' => 'Ensure 99.99% uptime with cloud-native infrastructure. We design resilient auto-scaling Kubernetes clusters, automated deployment pipelines, Redis caching clusters, and disaster recovery architectures.',
                'seo_title' => 'Cloud Architecture & DevOps Services | Webyotic',
                'seo_description' => 'Resilient cloud migrations, AWS infrastructure, CI/CD pipelines, and enterprise DevOps automation.',
                'seo_keywords' => 'devops services, aws architecture, cloud consulting, docker kubernetes',
                'focus_keyword' => 'Cloud Architecture',
            ],
            [
                'title' => 'Bespoke UI/UX Design Systems',
                'slug' => 'bespoke-ui-ux-design-systems',
                'icon' => 'paint-brush',
                'image' => 'https://images.unsplash.com/photo-1581291518857-4e27b48ff24e?auto=format&fit=crop&w=1200&q=80',
                'short_description' => 'Next-generation user interfaces, interactive design systems, and conversion-optimized customer journeys.',
                'description' => 'Design that captivates and converts. We craft cohesive design tokens, fluid micro-interactions, dark/light visual modes, and enterprise dashboard interfaces tailored for effortless product adoption.',
                'seo_title' => 'UI/UX Design Systems & Product Strategy | Webyotic',
                'seo_description' => 'Award-winning UI/UX design systems, clickable prototypes, and conversion-focused web product designs.',
                'seo_keywords' => 'ui ux design, design system, enterprise dashboard design, web design agency',
                'focus_keyword' => 'UI/UX Design Systems',
            ],
            [
                'title' => 'Mobile Application Engineering',
                'slug' => 'mobile-application-engineering',
                'icon' => 'device-phone-mobile',
                'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=1200&q=80',
                'short_description' => 'Cross-platform iOS and Android apps powered by Flutter and React Native with native fluidity.',
                'description' => 'Engage users anywhere. We build high-performance mobile applications with offline storage, real-time push synchronization, biometrics authentication, and hardware-accelerated animations.',
                'seo_title' => 'Mobile App Development Services | Webyotic',
                'seo_description' => 'High-performance iOS and Android applications built with Flutter, React Native, and robust cloud APIs.',
                'seo_keywords' => 'mobile app development, flutter developer, ios android apps, mobile agency',
                'focus_keyword' => 'Mobile Application Engineering',
            ],
        ];

        foreach ($services as $data) {
            Service::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
