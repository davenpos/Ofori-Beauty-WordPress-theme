import $ from 'jquery'

class LiveSearch {
    constructor() {
        this.searchButton = $('#searchButton')
        this.closeButton = $('i.fa.fa-window-close.fa-3x')
        this.searchOverlay = $('div#searchOverlay')
        this.searchBar = $('.searchTerm.live')
        this.searchResultsDiv = $('#liveSearchResults')
        this.overlayOpen = false
        this.spinnerVisible = false
        this.typingTimer
        this.previousValue
        this.events()
    }

    events() {
        this.searchButton.on("click", () => this.openOverlay())
        this.closeButton.on("click", () => this.closeOverlay())
        $(document).on("keydown", (e) => this.keyPress(e))
        this.searchBar.on("keyup", () => this.userTypes())
    }

    openOverlay() {
        this.searchOverlay.css("opacity", "1")
        $('html, body').css({
            "height": "100%",
            "overflow": "hidden"
        })
        this.searchOverlay.addClass("searchActive")
        this.searchBar.trigger('focus')
        this.overlayOpen = true
        return false
    }

    closeOverlay() {
        this.searchOverlay.css("opacity", "0")
        $('html, body').css({
            "height": "",
            "overflow": ""
        })
        setTimeout(() => this.searchOverlay.removeClass("searchActive"), 300)
        this.overlayOpen = false
    }

    keyPress(e) {
        if (e.keyCode == 27 && this.overlayOpen && !$("input, textarea").is(':focus')) {
            this.closeOverlay()
        }
    }

    userTypes() {
        if (this.searchBar.val() != this.previousValue) {
            clearTimeout(this.typingTimer)
            if (this.searchBar.val()) {
                if (!this.spinnerVisible) {
                    this.searchResultsDiv.html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true">')
                    this.spinnerVisible = true
                }
                this.typingTimer = setTimeout(() => this.getSearchResults(), 800)
            } else {
                this.searchResultsDiv.html('')
                this.spinnerVisible = false
            }
        }
        this.previousValue = this.searchBar.val()
    }

    getSearchResults() {
        this.searchResultsDiv.html("There should be search results here")
        this.spinnerVisible = false
    }
}

export default LiveSearch