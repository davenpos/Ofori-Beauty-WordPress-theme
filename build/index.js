/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/modules/LiveSearch.js":
/*!***********************************!*\
  !*** ./src/modules/LiveSearch.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class LiveSearch {
  constructor() {
    this.searchHTML();
    this.searchButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#searchButton');
    this.closeButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()('i#closeSearch');
    this.searchOverlay = jquery__WEBPACK_IMPORTED_MODULE_0___default()('div#searchOverlay');
    this.searchBar = jquery__WEBPACK_IMPORTED_MODULE_0___default()('.searchTerm.live');
    this.searchResultsDiv = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#liveSearchResults');
    this.overlayOpen = false;
    this.spinnerVisible = false;
    this.typingTimer;
    this.previousValue;
    this.events();
  }
  events() {
    this.searchButton.on("click", () => this.openOverlay());
    this.closeButton.on("click", () => this.closeOverlay());
    jquery__WEBPACK_IMPORTED_MODULE_0___default()(document).on("keydown", e => this.keyPress(e));
    this.searchBar.on("keyup", () => this.userTypes());
    jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).on("resize", () => this.getSearchResults());
  }
  openOverlay() {
    this.searchOverlay.css("opacity", "1");
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('html, body').css('overflow', 'hidden');
    this.searchOverlay.addClass("searchActive");
    this.searchBar.val('');
    this.searchResultsDiv.html('');
    setTimeout(() => this.searchBar.trigger('focus'), 301);
    this.overlayOpen = true;
    return false;
  }
  closeOverlay() {
    this.searchOverlay.css("opacity", "0");
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('html, body').css('overflow', '');
    setTimeout(() => this.searchOverlay.removeClass("searchActive"), 300);
    this.overlayOpen = false;
  }
  searchHTML() {
    jquery__WEBPACK_IMPORTED_MODULE_0___default()("body").append(`
            <div id="searchOverlay">
                <input type="text" class="searchTerm live" placeholder="Search for..." autocomplete="off">
                <i id="closeSearch" class="fa fa-window-close fa-3x" aria-hidden="true"></i>
                <div id="liveSearchResults"></div>
            </div>
        `);
  }
  keyPress(e) {
    if (e.keyCode == 27 && this.overlayOpen && !jquery__WEBPACK_IMPORTED_MODULE_0___default()("input, textarea").is(':focus')) {
      this.closeOverlay();
    }
  }
  userTypes() {
    if (this.searchBar.val() != this.previousValue) {
      clearTimeout(this.typingTimer);
      if (this.searchBar.val()) {
        if (!this.spinnerVisible) {
          this.searchResultsDiv.html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true">');
          this.spinnerVisible = true;
        }
        this.typingTimer = setTimeout(() => this.getSearchResults(), 800);
      } else {
        this.searchResultsDiv.html('');
        this.spinnerVisible = false;
      }
    }
    this.previousValue = this.searchBar.val();
  }
  getSearchResults() {
    jquery__WEBPACK_IMPORTED_MODULE_0___default().getJSON(siteData.url + '/wp-json/oforibeauty/v1/liveSearchResults?term=' + this.searchBar.val(), results => {
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
            `);
      this.spinnerVisible = false;
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (LiveSearch);

/***/ }),

/***/ "./src/modules/MobileMenu.js":
/*!***********************************!*\
  !*** ./src/modules/MobileMenu.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class MobileMenu {
  constructor() {
    this.menuButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()('i.fa.fa-bars');
    this.closeButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()('i#closeMenu');
    this.navMenu = jquery__WEBPACK_IMPORTED_MODULE_0___default()('nav#headerMenu');
    this.top = 0;
    if (jquery__WEBPACK_IMPORTED_MODULE_0___default()('body').hasClass("admin-bar")) {
      if (jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).width() < 782) {
        this.top = 46;
      } else {
        this.top = 32;
      }
    } else {
      this.top = 0;
    }
    this.navMenu.css('top', -this.navMenu.outerHeight() + 'px');
    this.events();
  }
  events() {
    jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).on("resize", () => this.navMenu.css('top', -this.navMenu.outerHeight() + 'px'));
    this.menuButton.on("click", () => this.openMobileMenu());
    this.closeButton.on("click", () => this.closeMobileMenu());
  }
  openMobileMenu() {
    if (jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).scrollTop() > jquery__WEBPACK_IMPORTED_MODULE_0___default()('header').outerHeight()) {
      this.navMenu.css('top', '0');
    } else {
      this.navMenu.css('top', this.top + 'px');
    }
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('html, body').css('overflow', 'hidden');
  }
  closeMobileMenu() {
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('html, body').css('overflow', '');
    this.navMenu.css('top', -this.navMenu.outerHeight() + 'px');
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (MobileMenu);

/***/ }),

/***/ "./src/modules/StickyHeader.js":
/*!*************************************!*\
  !*** ./src/modules/StickyHeader.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class StickyHeader {
  constructor() {
    //alert($(window).width())
    this.header = jquery__WEBPACK_IMPORTED_MODULE_0___default()('header');
    this.mainContent = jquery__WEBPACK_IMPORTED_MODULE_0___default()('div#mainContent');
    this.headerHeight;
    this.top;
    this.setTopVariables();
    this.lastScrollTop;
    this.events();
  }
  events() {
    jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).on("scroll", () => this.toggleHeader());
    jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).on("resize", () => this.setTopVariables());
  }
  setTopVariables() {
    this.headerHeight = this.header.outerHeight();
    this.top = 0;
    if (jquery__WEBPACK_IMPORTED_MODULE_0___default()('body').hasClass("admin-bar")) {
      if (jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).width() >= 782) {
        this.top = 32;
      }
    }
  }
  toggleHeader() {
    const currentScroll = jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).scrollTop();
    if (jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).width() <= 450) {
      this.headerHeight += 46;
    }
    if (currentScroll > this.headerHeight) {
      if (currentScroll > this.lastScrollTop) {
        this.header.css({
          "position": "fixed",
          "width": "100%",
          "top": "-" + this.headerHeight + "px"
        });
        if (jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).width() <= 450) {
          this.headerHeight -= 46;
        }
        this.mainContent.css("padding-top", this.headerHeight + "px");
      } else {
        if (jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).width() <= 450) {
          this.headerHeight -= 46;
        }
        this.header.css({
          "top": this.top,
          "transition": "top 0.3s ease-in-out"
        });
      }
    } else {
      if (jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).width() <= 450) {
        this.headerHeight -= 46;
      }
    }
    if (window.scrollY == 0 || window.scrollY <= 46 && jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).width() <= 450) {
      this.header.css({
        "position": "",
        "width": "",
        "transition": ""
      });
      this.mainContent.css("padding-top", "");
    }
    this.lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (StickyHeader);

/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/***/ ((module) => {

module.exports = window["jQuery"];

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_StickyHeader__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/StickyHeader */ "./src/modules/StickyHeader.js");
/* harmony import */ var _modules_LiveSearch__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/LiveSearch */ "./src/modules/LiveSearch.js");
/* harmony import */ var _modules_MobileMenu__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/MobileMenu */ "./src/modules/MobileMenu.js");



var stickyHeader = new _modules_StickyHeader__WEBPACK_IMPORTED_MODULE_0__["default"]();
var liveSearch = new _modules_LiveSearch__WEBPACK_IMPORTED_MODULE_1__["default"]();
var mobileMenu = new _modules_MobileMenu__WEBPACK_IMPORTED_MODULE_2__["default"]();
})();

/******/ })()
;
//# sourceMappingURL=index.js.map