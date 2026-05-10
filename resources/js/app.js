import './bootstrap';

import Alpine from 'alpinejs';
import Swiper from 'swiper';

import 'swiper/css';
import 'swiper/css/navigation';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const sliderEl = document.querySelector('[data-visual-catalog-swiper]');
    if (!sliderEl) return;

    // eslint-disable-next-line no-unused-vars
    const swiper = new Swiper(sliderEl, {
        // Use Swiper's built-in responsive breakpoints
        slidesPerView: 1,
        spaceBetween: 14,
        speed: 500,
        grabCursor: true,

        // Interactivity
        watchSlidesProgress: true,
        preloadImages: false,
        lazy: false,

        // Navigation
        navigation: {
            nextEl: sliderEl.querySelector('[data-swiper-next]'),
            prevEl: sliderEl.querySelector('[data-swiper-prev]'),
        },

        // Autoplay optional; disabled by default for performance.
        autoplay: false,

        // Infinite loop
        loop: true,

        // Responsive
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 14,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 16,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 18,
            },
            1280: {
                slidesPerView: 5,
                spaceBetween: 18,
            },
        },
    });
});

