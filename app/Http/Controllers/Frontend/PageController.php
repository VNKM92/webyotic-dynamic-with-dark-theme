<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Page;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $page = Page::where('template', 'about')->first();
        $seo_title = $page->seo_title ?? 'About Webyotic - Enterprise Digital Engineering';
        $seo_description = $page->seo_description ?? 'Learn about Webyotic, founded by Vinay & Shivam, delivering mission-critical web software and high-impact SEO.';
        $seo_keywords = $page->seo_keywords ?? 'about webyotic, vinay shivam, digital engineering founders, enterprise it team';
        return view('frontend.about', compact('page', 'seo_title', 'seo_description', 'seo_keywords'));
    }

    public function contact()
    {
        $page = Page::where('template', 'contact')->first();
        $seo_title = $page->seo_title ?? 'Contact Webyotic - Start Your Enterprise Project';
        $seo_description = $page->seo_description ?? 'Connect with our engineering and growth specialists. Request an architecture consultation or project estimate.';
        $seo_keywords = $page->seo_keywords ?? 'contact webyotic, hire developers, request quote, web engineering consultation';
        $services = Service::all();
        return view('frontend.contact', compact('page', 'services', 'seo_title', 'seo_description', 'seo_keywords'));
    }

    public function contactSubmit(Request $request)
    {
        // Honeypot spam protection
        if (!empty($request->input('website_honeypot'))) {
            return back()->with('success', 'Thank you! Your message has been received.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'service' => 'nullable|string|max:100',
            'budget' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:5000',
        ]);

        Inquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'service' => $validated['service'] ?? null,
            'budget' => $validated['budget'] ?? null,
            'subject' => $validated['subject'] ?? 'Direct Contact Form Inquiry',
            'message' => $validated['message'],
            'status' => 'new',
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', 'Thank you for reaching out! Our executive team will review your inquiry and respond within 24 hours.');
    }

    public function quoteSubmit(Request $request)
    {
        if (!empty($request->input('website_honeypot'))) {
            return response()->json(['success' => true, 'message' => 'Estimate received!']);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'project_type' => 'required|string|max:100',
            'scope' => 'nullable|string|max:200',
            'timeline' => 'nullable|string|max:50',
            'estimated_budget' => 'nullable|string|max:50',
            'details' => 'nullable|string|max:3000',
        ]);

        $messageContent = "PROJECT ESTIMATE REQUEST:\n" .
            "Project Type: " . $validated['project_type'] . "\n" .
            "Scope: " . ($validated['scope'] ?? 'Not specified') . "\n" .
            "Estimated Timeline: " . ($validated['timeline'] ?? 'Flexible') . "\n" .
            "Target Budget: " . ($validated['estimated_budget'] ?? 'TBD') . "\n" .
            "Notes: " . ($validated['details'] ?? 'None provided');

        Inquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'service' => $validated['project_type'],
            'budget' => $validated['estimated_budget'] ?? null,
            'subject' => 'Interactive Calculator Quote Request',
            'message' => $messageContent,
            'status' => 'new',
            'ip_address' => $request->ip(),
        ]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your project estimate has been saved and our senior architect will prepare your customized scope.',
            ]);
        }

        return back()->with('success', 'Thank you! Your project estimate has been saved and our senior architect will prepare your customized scope.');
    }

    public function blog()
    {
        $posts = Post::with(['category', 'user'])->latest()->paginate(9);
        $page = Page::where('template', 'blog')->first();
        $seo_title = $page->seo_title ?? 'Insights & Engineering Blog | Webyotic';
        $seo_description = $page->seo_description ?? 'Articles and blueprints on modern web architecture, SEO performance, cloud scalability, and digital strategy.';
        $seo_keywords = $page->seo_keywords ?? 'web engineering blog, technical seo articles, software architecture insights';
        return view('frontend.blog', compact('posts', 'page', 'seo_title', 'seo_description', 'seo_keywords'));
    }

    public function blogShow($slug)
    {
        $post = Post::with(['category', 'user'])->where('slug', $slug)->firstOrFail();
        $relatedPosts = Post::where('id', '!=', $post->id)
            ->where('category_id', $post->category_id)
            ->take(3)
            ->get();
        if ($relatedPosts->isEmpty()) {
            $relatedPosts = Post::where('id', '!=', $post->id)->latest()->take(3)->get();
        }

        $seo_title = $post->seo_title ?? ($post->title . ' | Webyotic Blog');
        $seo_description = $post->seo_description ?? substr(strip_tags($post->body), 0, 160);
        $seo_keywords = $post->seo_keywords ?? 'web development, seo, software engineering';
        return view('frontend.blog-details', compact('post', 'relatedPosts', 'seo_title', 'seo_description', 'seo_keywords'));
    }

    public function services()
    {
        $services = Service::all();
        $page = Page::where('template', 'services')->first();
        $seo_title = $page->seo_title ?? 'Enterprise Solutions & Services | Webyotic';
        $seo_description = $page->seo_description ?? 'High-concurrency web engineering, custom AI workflows, organic search dominance, and cloud architecture.';
        $seo_keywords = $page->seo_keywords ?? 'web services, ai development, seo solutions, cloud devops';
        return view('frontend.services', compact('services', 'page', 'seo_title', 'seo_description', 'seo_keywords'));
    }

    public function gallery(Request $request)
    {
        $projects = Project::all();
        $categories = Project::pluck('category')->filter()->unique()->values();
        $page = Page::where('template', 'gallery')->first();
        $seo_title = $page->seo_title ?? 'Engineering Showcase & Case Studies | Webyotic';
        $seo_description = $page->seo_description ?? 'Explore enterprise applications, web platforms, and custom digital systems delivered by Webyotic.';
        $seo_keywords = $page->seo_keywords ?? 'case studies, portfolio, web apps, enterprise software showcase';
        return view('frontend.gallery', compact('projects', 'categories', 'page', 'seo_title', 'seo_description', 'seo_keywords'));
    }

    public function testimonials()
    {
        $testimonials = Testimonial::all();
        $page = Page::where('template', 'testimonials')->first();
        $seo_title = $page->seo_title ?? 'Client Testimonials & Enterprise Trust | Webyotic';
        $seo_description = $page->seo_description ?? 'Read authentic feedback from founders, CTOs, and leaders who scale with Webyotic.';
        $seo_keywords = $page->seo_keywords ?? 'client reviews, webyotic testimonials, verified ratings';
        return view('frontend.testimonials', compact('testimonials', 'page', 'seo_title', 'seo_description', 'seo_keywords'));
    }
}
