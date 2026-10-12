#!/bin/bash
set -e

echo "🚀 Starting Production Deployment for Webyotic..."

# 1. Activate Maintenance Mode
php artisan down --retry=60 || true

# 2. Pull Latest Changes from Git
echo "📥 Pulling latest codebase from git..."
git pull origin main

# 3. Install/Update Composer Dependencies (No Dev, Optimized)
echo "📦 Installing production PHP dependencies..."
composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction

# 4. Install/Update NPM Dependencies & Compile Production Assets
echo "🎨 Compiling frontend assets..."
npm ci --prefer-offline --no-audit
npm run build

# 5. Database Migrations
echo "🗄️ Running database migrations..."
php artisan migrate --force

# 6. Ensure Storage Link Exists
echo "🔗 Creating storage symlink..."
php artisan storage:link || true

# 7. Optimize & Cache Configuration, Routes, Views, and Events
echo "⚡ Optimizing Laravel production cache..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# 8. Restart Background Queue Workers
echo "🔄 Restarting queue workers..."
php artisan queue:restart || true

# 9. Set Proper Directory Permissions
echo "🔒 Enforcing secure file permissions..."
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache || true

# 10. Bring Application Out of Maintenance Mode
php artisan up

echo "✅ Production deployment completed successfully!"
