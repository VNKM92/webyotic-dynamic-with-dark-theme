<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Alexander Vance',
                'position' => 'Chief Technology Officer',
                'company' => 'Nexis Global Technologies',
                'content' => 'Webyotic transformed our core customer platform. Vinay and Shivam brought architectural depth that cut our API response times by 68% while shipping ahead of our Q3 deadline. Their enterprise craftsmanship is unmatched.',
                'rating' => 5,
                'image' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=300&q=80',
            ],
            [
                'name' => 'Sophia Montgomery',
                'position' => 'VP of Digital Growth',
                'company' => 'Aetheris FinTech Solutions',
                'content' => 'Working with Webyotic on our technical SEO and Next-gen portal was a complete game-changer. Our organic qualified pipeline surged by 310% within 4 months, and our site speed now hits a perfect 99 on Google PageSpeed Insights.',
                'rating' => 5,
                'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=300&q=80',
            ],
            [
                'name' => 'Marcus Chen',
                'position' => 'Founder & Managing Director',
                'company' => 'OmniCore Logistics',
                'content' => 'The attention to detail and design flair Webyotic delivered made our enterprise dashboard feel like a high-tier Silicon Valley product. Our enterprise clients are blown away by how slick and fast the entire app operates.',
                'rating' => 5,
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=300&q=80',
            ],
            [
                'name' => 'Elena Rostova',
                'position' => 'Head of Product Marketing',
                'company' => 'Vanguard Health Systems',
                'content' => 'Reliable, highly communicative, and profoundly skilled. Webyotic tackled both our complex backend database optimizations and an ultra-modern front-facing corporate website seamlessly. Truly enterprise grade.',
                'rating' => 5,
                'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=300&q=80',
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate([
                'name' => $t['name'],
                'company' => $t['company'],
            ], $t);
        }
    }
}
