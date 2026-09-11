(function () {
    'use strict';

    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var sectionSelector = 'section';
    var groupSelector = [
        '[class*="__grid"]',
        '[class*="_grid"]',
        '[class*="__items"]',
        '[class*="_items"]',
        '.swiper-wrapper'
    ].join(',');

    function topLevelSections() {
        return Array.prototype.filter.call(document.querySelectorAll(sectionSelector), function (section) {
            var parentSection = section.parentElement && section.parentElement.closest('section');
            return !parentSection && !section.closest('footer');
        });
    }

    function addReveal(element, delay, isCard) {
        if (element.classList.contains('wpds-reveal')) {
            return;
        }

        element.classList.add('wpds-reveal');
        if (isCard) {
            element.classList.add('wpds-reveal--card');
        }
        element.style.setProperty('--wpds-reveal-delay', delay + 'ms');
    }

    function prepareElements() {
        var sections = topLevelSections();

        sections.forEach(function (section) {
            addReveal(section, 0, false);

            section.querySelectorAll(groupSelector).forEach(function (group) {
                var items = Array.prototype.filter.call(group.children, function (item) {
                    return item.matches('article, li, a, [class*="card"], [class*="Card"], .swiper-slide');
                });

                if (items.length < 2 || items.length > 12) {
                    return;
                }

                items.forEach(function (item, index) {
                    addReveal(item, Math.min(index * 70, 350), true);
                });
            });
        });

        return document.querySelectorAll('.wpds-reveal');
    }

    function init() {
        var elements = prepareElements();

        if (!elements.length || reduceMotion || !('IntersectionObserver' in window)) {
            elements.forEach(function (element) {
                element.classList.add('is-visible');
            });
            return;
        }

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            });
        }, {
            rootMargin: '0px 0px -8% 0px',
            threshold: 0.08
        });

        elements.forEach(function (element) {
            observer.observe(element);
        });
    }

    document.documentElement.classList.add('wpds-motion-ready');

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init, { once: true });
    } else {
        init();
    }
}());
