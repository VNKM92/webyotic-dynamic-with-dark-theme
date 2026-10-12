import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Next.js-style Instant Hover Prefetcher for ultra-fast navigation
document.addEventListener('DOMContentLoaded', () => {
    const prefetched = new Set();
    const isInternalLink = (url) => {
        try {
            const parsed = new URL(url, window.location.href);
            return parsed.origin === window.location.origin && 
                   !parsed.pathname.includes('/admin') &&
                   !parsed.pathname.includes('/logout') &&
                   !url.startsWith('#') &&
                   !url.startsWith('mailto:') &&
                   !url.startsWith('tel:');
        } catch {
            return false;
        }
    };

    const prefetch = (url) => {
        if (!isInternalLink(url) || prefetched.has(url)) return;
        prefetched.add(url);
        const link = document.createElement('link');
        link.rel = 'prefetch';
        link.href = url;
        link.as = 'document';
        document.head.appendChild(link);
    };

    // Prefetch on pointerover/touch
    document.addEventListener('pointerover', (e) => {
        const anchor = e.target.closest('a');
        if (anchor && anchor.href) {
            prefetch(anchor.href);
        }
    }, { passive: true });

    document.addEventListener('touchstart', (e) => {
        const anchor = e.target.closest('a');
        if (anchor && anchor.href) {
            prefetch(anchor.href);
        }
    }, { passive: true });
});

Alpine.start();
