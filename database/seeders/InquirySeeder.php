<?php

namespace Database\Seeders;

use App\Models\Inquiry;
use Illuminate\Database\Seeder;

class InquirySeeder extends Seeder
{
    public function run(): void
    {
        if (Inquiry::count() === 0) {
            Inquiry::create([
                'name' => 'Dr. Robert Stirling',
                'email' => 'rstirling@medtech-global.org',
                'phone' => '+1 (415) 890-2341',
                'service' => 'Enterprise Web Applications',
                'budget' => '$15k - $30k',
                'subject' => 'Clinical Trial Patient Portal Redesign',
                'message' => 'We require an ultra-secure, HIPAA-compliant patient dashboard and API layer built in Laravel with sub-200ms query latency. Please arrange an architectural review with Vinay & Shivam.',
                'status' => 'new',
                'ip_address' => '127.0.0.1',
            ]);

            Inquiry::create([
                'name' => 'Camilla Dupond',
                'email' => 'c.dupond@luxuryliving.fr',
                'phone' => '+33 6 12 34 56 78',
                'service' => 'High-Impact Data-Driven SEO',
                'budget' => '$5k - $15k',
                'subject' => 'International Multi-lingual SEO Overhaul',
                'message' => 'Our European luxury real estate portal needs programmatic SEO restructuring, schema markup, and speed optimization for peak international sales.',
                'status' => 'in_review',
                'ip_address' => '127.0.0.1',
            ]);
        }
    }
}
