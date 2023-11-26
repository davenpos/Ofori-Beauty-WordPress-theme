import $ from 'jquery'

class MobileMenu {
    constructor() {
        this.menuButton = $('i.fa.fa-bars')
        this.closeButton = $('i#closeMenu')
        this.navMenu = $('nav#headerMenu')
        this.navPosition = 0
        this.top = 0
        if ($('body').hasClass("admin-bar")) {
            if ($(window).width() < 782) {
                this.top = 46
            } else {
                this.top = 32
            }
        } else {
            this.top = 0
        }
        this.navMenu.css('top', -this.navMenu.outerHeight() + 'px')
        this.events()
    }

    events() {
        $(window).on("resize", () => {
            setTimeout(() => {
                this.navMenu.css('top', -this.navMenu.outerHeight() + 'px')
            }, 1)
        })
        this.menuButton.on("click", () => this.openMobileMenu())
        this.closeButton.on("click", () => this.closeMobileMenu())
    }

    openMobileMenu() {
        if ($(window).scrollTop() > $('header').outerHeight()) {
            this.navMenu.css('top', '0')
        } else {
            this.navMenu.css('top', this.top + 'px')
        }
        $('html, body').css('overflow', 'hidden')
    }

    closeMobileMenu() {
        $('html, body').css('overflow', '')
        this.navMenu.css('top', -this.navMenu.outerHeight() + 'px')
    }
}

export default MobileMenu