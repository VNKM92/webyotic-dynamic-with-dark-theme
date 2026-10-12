<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $page = Page::where('template', 'home')->first();
        $seo_title = $page->seo_title ?? 'Webyotic - Enterprise Digital Engineering & Growth Agency';
        $seo_description = $page->seo_description ?? 'High-performance web architecture, custom AI automation, and enterprise SEO engineered for fast-scaling companies.';
        $seo_keywords = $page->seo_keywords ?? 'enterprise web development, custom software, nextjs agency, laravel solutions, ai engineering, technical seo';

        $sliders = Slider::where('is_active', true)->orderBy('order', 'asc')->get();
        $services = Service::take(6)->get();
        $projects = Project::take(6)->get();
        $testimonials = Testimonial::take(4)->get();
        $posts = Post::with(['category', 'user'])->latest()->take(3)->get();

        return view('frontend.home', compact('page', 'sliders', 'services', 'projects', 'testimonials', 'posts', 'seo_title', 'seo_description', 'seo_keywords'));
    }
}
