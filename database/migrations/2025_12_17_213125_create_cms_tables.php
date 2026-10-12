<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Pages Table (for Home, About, Contact, etc.)
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content')->nullable(); // For rich text content
            $table->string('template')->default('default'); // To identify special pages like 'home'
            
            // SEO Fields
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->string('focus_keyword')->nullable();
            
            $table->timestamps();
        });

        // 2. Services Table
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('icon')->nullable(); // FontAwesome class or Image URL
            $table->string('image')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            
            // SEO Fields
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->string('focus_keyword')->nullable();
            
            $table->timestamps();
        });

        // 3. Projects (Gallery) Table
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->nullable(); // Web App, Mobile App, etc.
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('link')->nullable(); // Live link
            $table->json('tags')->nullable(); // Technologies used
            
            // SEO Fields
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->string('focus_keyword')->nullable();
            
            $table->timestamps();
        });

        // 4. Testimonials Table
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position')->nullable();
            $table->string('company')->nullable();
            $table->text('content');
            $table->integer('rating')->default(5);
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // 5. Settings Table (Global configuration)
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->longText('value')->nullable();
            $table->string('group')->default('general'); // general, social, theme, etc.
            $table->string('type')->default('text'); // text, image, boolean, json
            $table->timestamps();
        });

        // 6. Ads Table
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location'); // header_top, sidebar, footer_bottom, etc.
            $table->longText('code'); // JS/HTML code
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 7. Visitors Table
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('page_url')->nullable();
            $table->timestamp('visited_at');
            $table->timestamps();
        });

        // 8. Update Posts Table with SEO fields
        Schema::table('posts', function (Blueprint $table) {
            $table->string('image')->nullable()->after('body');
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->string('focus_keyword')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
        Schema::dropIfExists('services');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('ads');
        Schema::dropIfExists('visitors');
        
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['image', 'seo_title', 'seo_description', 'seo_keywords', 'focus_keyword']);
        });
    }
};
