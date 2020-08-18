import $ from 'jquery';
import lightGallery from 'lightgallery';
import 'lg-video';
import { smoothScroll } from "foundation-sites";

require('particles.js');

class MainApplication {
    constructor() {
        $(document).foundation();
        window.particlesJS.load('particles-js-header', 'assets/particles.json');
        window.particlesJS.load('particles-js-listen', 'assets/particles-image.json');

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


    }
}

new MainApplication();

