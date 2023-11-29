import $ from 'jquery'

class LiveSearch {
    constructor() {
        this.searchHTML()
        this.searchButton = $('#searchButton')
        this.closeButton = $('i#closeSearch')
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
        //$(window).on("resize", () => this.getSearchResults())
    }

    openOverlay() {
        this.searchOverlay.css("opacity", "1")
        $('html, body').css('overflow', 'hidden')
        this.searchOverlay.addClass("searchActive")
        this.searchBar.val('')
        this.searchResultsDiv.html('')
        setTimeout(() => this.searchBar.trigger('focus'), 301)
        this.overlayOpen = true
        return false
    }

    closeOverlay() {
        this.searchOverlay.css("opacity", "0")
        $('html, body').css('overflow', '')
        setTimeout(() => this.searchOverlay.removeClass("searchActive"), 300)
        this.overlayOpen = false
    }

    searchHTML() {
        $("body").append(`
            <div id="searchOverlay">
                <input type="text" class="searchTerm live" placeholder="Search for..." autocomplete="off">
                <i id="closeSearch" class="fa fa-window-close fa-3x" aria-hidden="true"></i>
                <div id="liveSearchResults"></div>
            </div>
        `)
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
        $.getJSON(siteData.url + '/wp-json/oforibeauty/v1/liveSearchResults?term=' + this.searchBar.val(), results => {
            this.searchResultsDiv.html(`
                <div class="threeColumns">
                    <div>
                        <h2>Blog Posts</h2>
                        ${results.posts.length ? '' : '<p>No blog posts found</p>'}
                        ${results.posts.map(item => `<h3><a href="${item.permalink}">${item.title}</a><span class="smallBlogPostText"> by ${item.authorName}</span></h3>`).join('')}
                    </div>
                    <div>
                        <h2>Pages</h2>
                        ${results.pages.length ? '' : '<p>No pages found</p>'}
                        ${results.pages.map(item => `<h3><a href="${item.permalink}">${item.title}</a></h3>`).join('')}
                    </div>
                    <div id="servicesSearchResults">
                        <h2>Services</h2>
                        ${results.services.length ? '' : '<p>No services found</p>'}
                        ${results.services.map(item => `<h3><a href="${item.permalink}">${item.title}</a></h3><p class="price">${item.price}</p>`).join('')}
                    </div>
                </div>
            `)
            this.spinnerVisible = false
        })
    }
}

export default LiveSearch