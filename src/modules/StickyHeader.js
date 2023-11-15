import $ from 'jquery'

class StickyHeader {
    constructor() {
        this.header = $('header')
        this.events()
    }

    events() {
        $(window).on("scroll", this.toggleHeader)
    }

    toggleHeader() {
        console.log(window.scrollY)

        /*if (window.scrollY > this.header.outerHeight()) {
            this.header.css("top", )
        }*/
    }
}

export default StickyHeader;

//https://jsfiddle.net/mariusc23/s6mLJ/31/
//https://webdesign.tutsplus.com/how-to-hide-reveal-a-sticky-header-on-scroll-with-javascript--cms-33756t