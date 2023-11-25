import $ from 'jquery'

class MobileMenu {
    constructor() {
        this.menuButton = $('i.fa.fa-bars')
        this.closeButton = $('i#closeMenu')
        this.navMenu = $('nav#headerMenu')
        this.navPosition = 0
        if ($('body').hasClass("admin-bar")) {
            if ($(window).width() < 782) {
                this.top = 46
            } else {
                this.top = 32
            }
        }
        alert(this.navMenu.outerHeight())
        this.hiddenPosition = this.top - this.navMenu.outerHeight()
        this.navMenu.css('top', this.hiddenPosition + 'px')
        this.events()
    }

    events() {
        $(window).on("resize", () => this.navMenu.css('top', this.navMenu.outerHeight() + 'px'))
        //$(window).on("scroll", () => this.navTop())
        this.menuButton.on("click", () => this.openMobileMenu())
        this.closeButton.on("click", () => this.closeMobileMenu())
    }

    openMobileMenu() {
        $('html, body').css({
            "height": "100%",
            "overflow": "hidden"
        })
        this.navMenu.css('top', this.top)
    }

    closeMobileMenu() {
        $('html, body').css({
            "height": "",
            "overflow": ""
        })
        this.navMenu.css('top', this.hiddenPosition + 'px')
    }

    /*navTop() {
        if ($(window).scrollTop() > $('header').outerHeight()) {
            this.top = 0
        } else {
            this.setTop()
        }
    }*/
}

export default MobileMenu