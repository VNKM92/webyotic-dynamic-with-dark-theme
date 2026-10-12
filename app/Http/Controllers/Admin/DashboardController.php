<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Page;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'visitors' => Visitor::count(),
            'visitors_today' => Visitor::whereDate('visited_at', today())->count(),
            'inquiries' => Inquiry::count(),
            'inquiries_new' => Inquiry::where('status', 'new')->count(),
            'services' => Service::count(),
            'projects' => Project::count(),
            'posts' => Post::count(),
            'testimonials' => Testimonial::count(),
        ];

        $recentInquiries = Inquiry::latest()->take(5)->get();
        $recentVisitors = Visitor::latest('visited_at')->take(6)->get();
        $recentProjects = Project::latest()->take(4)->get();
        $systemInfo = [
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version(),
            'environment' => config('app.env'),
            'db_driver' => config('database.default'),
            'cache_driver' => config('cache.default'),
        ];

        return view('admin.dashboard', compact('stats', 'recentInquiries', 'recentVisitors', 'recentProjects', 'systemInfo'));
    }
}
