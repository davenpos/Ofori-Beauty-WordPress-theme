import $ from 'jquery'

class StickyHeader {
    constructor() {
        this.header = $('header')
        this.headerHeight = this.header.outerHeight()
        this.top = 0
        if ($('body').hasClass("admin-bar")) {
            if ($(window).width() < 782) {
                this.top = 46
            } else {
                this.top = 32
            }
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
                this.header.css({
                    "top": this.top,
                    "transition": "top 0.3s ease-in-out"
                })
            }
        }

        if (window.scrollY == 0) {
            this.header.css({
                "position": "",
                "width": "",
                "transition": ""
            })
            this.mainContent.css("padding-top", "")
        }

        this.lastScrollTop = currentScroll <= 0 ? 0 : currentScroll
    }
}

export default StickyHeader;