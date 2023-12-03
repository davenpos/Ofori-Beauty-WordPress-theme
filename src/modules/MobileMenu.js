import $ from 'jquery'

class MobileMenu {
    constructor() {
        this.menuButton = $('i.fa.fa-bars')
        this.closeButton = $('i#closeMenu')
        this.navMenu = $('nav#headerMenu')
        this.menuOpen = false
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
        $(window).on("resize", () => this.navMenu.css('top', -this.navMenu.outerHeight() + 'px'))
        this.menuButton.on("click", () => this.openMobileMenu())
        this.closeButton.on("click", () => this.closeMobileMenu())
        $(document).on("click", (e) => {
            if (this.menuOpen && !$(e.target).closest('nav#headerMenu').length && !$(e.target).closest('div#wpadminbar').length && !$(e.target).is(this.menuButton)) {
                this.closeMobileMenu()
            }
        })
    }

    openMobileMenu() {
        if ($(window).scrollTop() > $('header').outerHeight()) {
            this.navMenu.css('top', '0')
        } else {
            this.navMenu.css('top', this.top + 'px')
        }
        $('html, body').css('overflow', 'hidden')
        this.menuOpen = true
    }

    closeMobileMenu() {
        $('html, body').css('overflow', '')
        this.navMenu.css('top', -this.navMenu.outerHeight() + 'px')
        this.menuOpen = false
    }
}

export default MobileMenu