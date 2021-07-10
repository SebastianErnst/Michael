import $ from 'jquery';
import lightGallery from 'lightgallery';
import 'lg-video';
import { smoothScroll } from "foundation-sites";
import Swiper from '../node_modules/swiper/swiper-bundle.min.js';

require('particles.js');

class MainApplication {
    constructor() {
        $(document).foundation();
        window.particlesJS.load('particles-js-header', 'assets/particles.json');

        const $swiperContainer = $('.swiper-container');

        const swiper = new Swiper('.swiper-container', {
            speed: 500,
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            loop: true,
            coverflowEffect: {
                rotate: 30,
                stretch: 0,
                depth: 500,
                modifier: 1,
                slideShadows: true,
            },
            navigation: {
                nextEl: $swiperContainer.parent().find('.swiper-button-next')[0],
                prevEl: $swiperContainer.parent().find('.swiper-button-prev')[0],
            }
        });

        $('.horizontal-teaser a').on('click', (event) => {
            event.preventDefault();
        });

        $('[data-gallery]').each((index, element) => {
            $(element).lightGallery({
                download: false,
                controls: false,
                counter: false,
                enableDrag: false,
                enableTouch: false
            });
        });

        $('[data-modal-open]').on('click', (event) => {
            event.preventDefault();
            $('[data-modal]').toggleClass('is-active');
        });

        $('[data-modal-close]').on('click', (event) => {
            event.preventDefault();
            $('[data-modal]').toggleClass('is-active');
        });

        $('.burger').on('click', (event) => {
            event.preventDefault()
            $('.burger').toggleClass('active');
            $('.main-menu').toggleClass('active');
        });

        $('.main-menu a').on('click', () => {
            event.preventDefault()
            $('.burger').toggleClass('active');
            $('.main-menu').toggleClass('active');
        });
    }
}

new MainApplication();