import $ from 'jquery'

class StickyHeader {
    constructor() {
        this.header = $('header')
        this.mainContent = $('div#mainContent')
        this.headerHeight
        this.top
        this.setTopVariables()
        this.lastScrollTop
        this.events()
    }

    events() {
        $(window).on("scroll", () => this.toggleHeader())
        $(window).on("resize", () => this.setTopVariables())
    }

    setTopVariables() {
        this.headerHeight = this.header.outerHeight()
        
        this.top = 0
        if ($('body').hasClass("admin-bar")) {
            if ($(window).width() >= 782) {
                this.top = 32
            }
        }
    }

    toggleHeader() {
        const currentScroll = $(window).scrollTop()

        if ($(window).width() <= 450) {
            this.headerHeight += 46
        }

        if (currentScroll > this.headerHeight) {
            if (!this.lastScrollTop) {
                this.lastScrollTop = currentScroll - 0.01
            }
            if (currentScroll > this.lastScrollTop) {
                this.header.css({
                    "position": "fixed",
                    "width": "100%",
                    "top": "-" + this.headerHeight + "px"
                })
                if ($(window).width() <= 450) {
                    this.headerHeight -= 46
                }
                this.mainContent.css("padding-top", this.headerHeight + "px")
            } else {
                if ($(window).width() <= 450) {
                    this.headerHeight -= 46
                }
                this.header.css({
                    "top": this.top,
                    "transition": "top 0.3s ease-in-out"
                })
            }
        } else {
            if ($(window).width() <= 450) {
                this.headerHeight -= 46
            }
        }

        if (window.scrollY == 0 || (window.scrollY <= 46 && $(window).width() <= 450)) {
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