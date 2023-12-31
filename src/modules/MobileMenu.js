import $ from 'jquery'

class MobileMenu {
    constructor() {
        this.menuButton = $('i.fa.fa-bars')
        this.closeButton = $('i#closeMenu')
        this.navMenu = $('nav#headerMenu')
        this.menuOpen = false
        this.headerHeight
        this.top
        this.setVariables()
        this.navMenu.removeClass('mobileMenuVisible')
        this.events()
    }

    events() {
        $(window).on("resize", () => this.setVariables())
        this.menuButton.on("click", () => this.openMobileMenu())
        this.closeButton.on("click", () => this.closeMobileMenu())
        $(document).on("click", (e) => {
            if (this.menuOpen && !$(e.target).closest('nav#headerMenu').length && !$(e.target).closest('div#wpadminbar').length && !$(e.target).is(this.menuButton)) {
                this.closeMobileMenu()
            }
        })
    }

    openMobileMenu() {
        if ($(window).scrollTop() > this.headerHeight) {
            this.navMenu.css('top', '0')
        } else {
            this.navMenu.css('top', this.top + 'px')
        }
        this.navMenu.addClass('mobileMenuVisible')
        $('body').addClass('noScroll')
        this.menuOpen = true
    }

    closeMobileMenu() {
        $('body').removeClass('noScroll')
        this.navMenu.removeClass('mobileMenuVisible')
        this.navMenu.css('top', '0')
        this.menuOpen = false
    }

    setVariables() {
        this.headerHeight = $('header').outerHeight()
        this.top = 0
        if ($('body').hasClass("admin-bar")) {
            this.top = ($(window).width() < 782) ? 46 : 32;
        }
    }
}

export default MobileMenu