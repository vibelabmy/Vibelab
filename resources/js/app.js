import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/**
 * Smooth exit before full page navigation for header links (demo, pakej, menu, etc.).
 */
const pageTransitionNavSelector = '[data-page-transition-nav]';

function shouldEnhanceHeaderNavigation(anchor) {
    if (anchor.target === '_blank') {
        return false;
    }

    const href = anchor.getAttribute('href');

    if (! href || href.startsWith('#') || href.startsWith('javascript:')) {
        return false;
    }

    try {
        const url = new URL(anchor.href, window.location.href);

        if (url.origin !== window.location.origin) {
            return false;
        }
    } catch {
        return false;
    }

    return anchor.closest(pageTransitionNavSelector) !== null;
}

document.addEventListener('click', (event) => {
    const anchor = event.target.closest('a[href]');

    if (! anchor || ! shouldEnhanceHeaderNavigation(anchor)) {
        return;
    }

    event.preventDefault();

    const main = document.querySelector('#page-transition-root');

    if (! main) {
        window.location.assign(anchor.href);

        return;
    }

    main.classList.add('page-transition-exit');

    window.setTimeout(() => {
        window.location.assign(anchor.href);
    }, 320);
});
