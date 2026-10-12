<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the sliders.
     */
    public function index()
    {
        $sliders = Slider::orderBy('order', 'asc')->orderBy('id', 'desc')->paginate(10);
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new slider.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created slider in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'highlight' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'image_url' => 'nullable|string|max:500',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|string|max:255',
            'secondary_button_text' => 'nullable|string|max:100',
            'secondary_button_url' => 'nullable|string|max:255',
            'seo_stat_label_1' => 'nullable|string|max:100',
            'seo_stat_val_1' => 'nullable|string|max:100',
            'seo_stat_label_2' => 'nullable|string|max:100',
            'seo_stat_val_2' => 'nullable|string|max:100',
            'seo_stat_label_3' => 'nullable|string|max:100',
            'seo_stat_val_3' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = $request->input('image_url');

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'slider_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/sliders'), $filename);
            $imagePath = 'uploads/sliders/' . $filename;
        }

        Slider::create([
            'title' => $validated['title'],
            'highlight' => $validated['highlight'] ?? null,
            'badge' => $validated['badge'] ?? null,
            'subtitle' => $validated['subtitle'] ?? null,
            'image' => $imagePath,
            'button_text' => $validated['button_text'] ?? null,
            'button_url' => $validated['button_url'] ?? null,
            'secondary_button_text' => $validated['secondary_button_text'] ?? null,
            'secondary_button_url' => $validated['secondary_button_url'] ?? null,
            'seo_stat_label_1' => $validated['seo_stat_label_1'] ?? null,
            'seo_stat_val_1' => $validated['seo_stat_val_1'] ?? null,
            'seo_stat_label_2' => $validated['seo_stat_label_2'] ?? null,
            'seo_stat_val_2' => $validated['seo_stat_val_2'] ?? null,
            'seo_stat_label_3' => $validated['seo_stat_label_3'] ?? null,
            'seo_stat_val_3' => $validated['seo_stat_val_3'] ?? null,
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'SEO Hero Slide created successfully!');
    }

    /**
     * Show the form for editing the specified slider.
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified slider in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'highlight' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'image_url' => 'nullable|string|max:500',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|string|max:255',
            'secondary_button_text' => 'nullable|string|max:100',
            'secondary_button_url' => 'nullable|string|max:255',
            'seo_stat_label_1' => 'nullable|string|max:100',
            'seo_stat_val_1' => 'nullable|string|max:100',
            'seo_stat_label_2' => 'nullable|string|max:100',
            'seo_stat_val_2' => 'nullable|string|max:100',
            'seo_stat_label_3' => 'nullable|string|max:100',
            'seo_stat_val_3' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = $slider->image;

        if ($request->hasFile('image_file')) {
            // Delete old uploaded file if local
            if (!empty($slider->image) && str_starts_with($slider->image, 'uploads/sliders/') && File::exists(public_path($slider->image))) {
                File::delete(public_path($slider->image));
            }
            $file = $request->file('image_file');
            $filename = 'slider_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/sliders'), $filename);
            $imagePath = 'uploads/sliders/' . $filename;
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->input('image_url');
        }

        $slider->update([
            'title' => $validated['title'],
            'highlight' => $validated['highlight'] ?? null,
            'badge' => $validated['badge'] ?? null,
            'subtitle' => $validated['subtitle'] ?? null,
            'image' => $imagePath,
            'button_text' => $validated['button_text'] ?? null,
            'button_url' => $validated['button_url'] ?? null,
            'secondary_button_text' => $validated['secondary_button_text'] ?? null,
            'secondary_button_url' => $validated['secondary_button_url'] ?? null,
            'seo_stat_label_1' => $validated['seo_stat_label_1'] ?? null,
            'seo_stat_val_1' => $validated['seo_stat_val_1'] ?? null,
            'seo_stat_label_2' => $validated['seo_stat_label_2'] ?? null,
            'seo_stat_val_2' => $validated['seo_stat_val_2'] ?? null,
            'seo_stat_label_3' => $validated['seo_stat_label_3'] ?? null,
            'seo_stat_val_3' => $validated['seo_stat_val_3'] ?? null,
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'SEO Hero Slide updated successfully!');
    }

    /**
     * Remove the specified slider from storage.
     */
    public function destroy(Slider $slider)
    {
        if (!empty($slider->image) && str_starts_with($slider->image, 'uploads/sliders/') && File::exists(public_path($slider->image))) {
            File::delete(public_path($slider->image));
        }

        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'SEO Hero Slide deleted successfully!');
    }
}
