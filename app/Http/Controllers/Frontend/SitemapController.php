<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function sitemap()
    {
        $urls = [];
        $urls[] = [
            'loc' => URL::to('/'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'weekly',
            'priority' => '1.0',
        ];
        $named = ['about', 'services', 'gallery', 'testimonials', 'contact', 'blog'];
        foreach ($named as $routeName) {
            $urls[] = [
                'loc' => route($routeName),
                'lastmod' => now()->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ];
        }
        $posts = Post::select(['slug', 'updated_at'])->latest()->get();
        foreach ($posts as $post) {
            $urls[] = [
                'loc' => route('blog.show', $post->slug),
                'lastmod' => optional($post->updated_at)->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($urls as $u) {
            $xml .= '<url>';
            $xml .= '<loc>' . e($u['loc']) . '</loc>';
            if (!empty($u['lastmod'])) {
                $xml .= '<lastmod>' . e($u['lastmod']) . '</lastmod>';
            }
            $xml .= '<changefreq>' . e($u['changefreq']) . '</changefreq>';
            $xml .= '<priority>' . e($u['priority']) . '</priority>';
            $xml .= '</url>';
        }
        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }

    public function rss()
    {
        $siteTitle = config('app.name', 'Webyotic');
        $siteLink = URL::to('/');
        $posts = Post::with(['user'])->latest()->take(20)->get();

        $rss = '<?xml version="1.0" encoding="UTF-8"?>';
        $rss .= '<rss version="2.0">';
        $rss .= '<channel>';
        $rss .= '<title>' . e($siteTitle) . '</title>';
        $rss .= '<link>' . e($siteLink) . '</link>';
        $rss .= '<description>' . e($siteTitle . ' RSS Feed') . '</description>';
        $rss .= '<language>en-us</language>';

        foreach ($posts as $post) {
            $link = route('blog.show', $post->slug);
            $desc = \Illuminate\Support\Str::limit(strip_tags($post->body), 300);
            $rss .= '<item>';
            $rss .= '<title>' . e($post->title) . '</title>';
            $rss .= '<link>' . e($link) . '</link>';
            $rss .= '<guid>' . e($link) . '</guid>';
            $rss .= '<pubDate>' . e(optional($post->created_at)->toRfc822String()) . '</pubDate>';
            $rss .= '<description>' . e($desc) . '</description>';
            if (!empty($post->seo_keywords)) {
                $rss .= '<category>' . e($post->seo_keywords) . '</category>';
            }
            $rss .= '</item>';
        }

        $rss .= '</channel>';
        $rss .= '</rss>';

        return response($rss, 200)->header('Content-Type', 'application/rss+xml');
    }
}
