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
    this.searchButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#searchButton');
    this.closeButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()('i.fa.fa-window-close.fa-3x');
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
  }
  openOverlay() {
    this.searchOverlay.css("opacity", "1");
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('html, body').css({
      "height": "100%",
      "overflow": "hidden"
    });
    this.searchOverlay.addClass("searchActive");
    this.searchBar.trigger('focus');
    this.overlayOpen = true;
    return false;
  }
  closeOverlay() {
    this.searchOverlay.css("opacity", "0");
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('html, body').css({
      "height": "",
      "overflow": ""
    });
    setTimeout(() => this.searchOverlay.removeClass("searchActive"), 300);
    this.overlayOpen = false;
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
    this.searchResultsDiv.html("There should be search results here");
    this.spinnerVisible = false;
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (LiveSearch);

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
    this.header = jquery__WEBPACK_IMPORTED_MODULE_0___default()('header');
    this.headerHeight = this.header.outerHeight();
    this.top = 0;
    if (jquery__WEBPACK_IMPORTED_MODULE_0___default()('body').hasClass("admin-bar")) {
      this.top = 32;
    }
    this.mainContent = jquery__WEBPACK_IMPORTED_MODULE_0___default()('div#mainContent');
    this.lastScrollTop;
    this.events();
  }
  events() {
    jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).on("scroll", () => this.toggleHeader());
  }
  toggleHeader() {
    const currentScroll = jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).scrollTop();
    if (currentScroll > this.headerHeight) {
      if (currentScroll > this.lastScrollTop) {
        this.header.css({
          "position": "fixed",
          "width": "100%",
          "top": "-" + this.headerHeight + "px"
        });
        this.mainContent.css("padding-top", this.headerHeight + "px");
      } else {
        this.header.css({
          "top": this.top,
          "transition": "top 0.3s ease-in-out"
        });
      }
    }
    if (window.scrollY == 0) {
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


var stickyHeader = new _modules_StickyHeader__WEBPACK_IMPORTED_MODULE_0__["default"]();
var liveSearch = new _modules_LiveSearch__WEBPACK_IMPORTED_MODULE_1__["default"]();
})();

/******/ })()
;
//# sourceMappingURL=index.js.map