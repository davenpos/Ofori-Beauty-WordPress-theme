import $ from 'jquery'

class StickyHeader {
    constructor() {
        this.header = $('header')
        this.headerHeight = this.header.outerHeight()
        this.top = 0
        if ($('body').hasClass("admin-bar")) {
            this.top = 32
        }
        this.mainContent = $('div#mainContent')
        this.lastScrollTop
        this.events()
    }

    events() {
        $(window).on("scroll", () => this.toggleHeader())
    }

    toggleHeader() {
        const currentScroll = $(window).scrollTop()

        if (currentScroll > this.headerHeight) {
            if (currentScroll > this.lastScrollTop) {
                this.header.css({
                    "position": "fixed",
                    "width": "100%",
                    "top": "-" + this.headerHeight + "px"
                })
                this.mainContent.css("padding-top", this.headerHeight + "px")
            } else {
                this.header.css("top", this.top)
            }
        }

        if (window.scrollY == 0) {
            this.header.css({
                "position": "",
                "width": ""
            })
            this.mainContent.css("padding-top", "")
        }

        this.lastScrollTop = currentScroll <= 0 ? 0 : currentScroll
    }
}

export default StickyHeader;

//https://jsfiddle.net/mariusc23/s6mLJ/31/
//https://webdesign.tutsplus.com/how-to-hide-reveal-a-sticky-header-on-scroll-with-javascript--cms-33756t