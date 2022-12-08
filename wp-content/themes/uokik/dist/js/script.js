/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/app/gutenberg.js":
/*!*********************************!*\
  !*** ./src/js/app/gutenberg.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _gutenberg_slider__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./gutenberg/slider */ "./src/js/app/gutenberg/slider.js");
/* harmony import */ var _gutenberg_documentTemplatesCarousel__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./gutenberg/documentTemplatesCarousel */ "./src/js/app/gutenberg/documentTemplatesCarousel.js");
/* harmony import */ var _gutenberg_collapsedMenu__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./gutenberg/collapsedMenu */ "./src/js/app/gutenberg/collapsedMenu.js");
/* harmony import */ var _gutenberg_infoTabs__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./gutenberg/infoTabs */ "./src/js/app/gutenberg/infoTabs.js");




(0,_gutenberg_slider__WEBPACK_IMPORTED_MODULE_0__.slider)();
(0,_gutenberg_documentTemplatesCarousel__WEBPACK_IMPORTED_MODULE_1__.carouselDocumentTemplates)();
(0,_gutenberg_collapsedMenu__WEBPACK_IMPORTED_MODULE_2__.slideMenuItems)();
(0,_gutenberg_collapsedMenu__WEBPACK_IMPORTED_MODULE_2__.activeMenuItems)();
(0,_gutenberg_infoTabs__WEBPACK_IMPORTED_MODULE_3__.infoTabs)();

/***/ }),

/***/ "./src/js/app/gutenberg/collapsedMenu.js":
/*!***********************************************!*\
  !*** ./src/js/app/gutenberg/collapsedMenu.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "activeMenuItems": () => (/* binding */ activeMenuItems),
/* harmony export */   "slideMenuItems": () => (/* binding */ slideMenuItems)
/* harmony export */ });
/* harmony import */ var _slide_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../slide.js */ "./src/js/app/slide.js");

const slideMenuItems = () => {
  const slideMenuItems = document.querySelectorAll(".collapsedMenu .submenu--toggle a");

  for (let item of slideMenuItems) {
    item.addEventListener("click", function (e) {
      e.preventDefault();
      var parent = this.parentNode.querySelectorAll(".sub-menu")[0];

      if (typeof parent === "undefined" || parent === null) {
        window.location.href = this.getAttribute("href");
      } else {
        parent.classList.toggle("active");
        (0,_slide_js__WEBPACK_IMPORTED_MODULE_0__.slideToggle)(parent, 300);
        this.classList.toggle("active");
      }
    });
  }
};
const activeMenuItems = () => {
  const menuItems = document.querySelectorAll(".collapsedMenu .current-menu-ancestor");

  if (menuItems.length) {
    for (let el of menuItems) {
      el.firstElementChild.classList.add("active");
    }
  }
};

/***/ }),

/***/ "./src/js/app/gutenberg/documentTemplatesCarousel.js":
/*!***********************************************************!*\
  !*** ./src/js/app/gutenberg/documentTemplatesCarousel.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "carouselDocumentTemplates": () => (/* binding */ carouselDocumentTemplates)
/* harmony export */ });
const carouselDocumentTemplates = () => {
  const elms = document.querySelectorAll('.documentTemplates--carousel');

  for (let el of elms) {
    let splide = new Splide(el, {
      arrows: true,
      pagination: false,
      perPage: 4,
      padding: {
        right: '5%'
      },
      gap: '1rem',
      arrowPath: ' ',
      breakpoints: {
        991: {
          perPage: 2,
          padding: {
            right: '15%'
          }
        },
        640: {
          perPage: 1,
          padding: {
            right: '20%'
          }
        }
      }
    });
    splide.mount();
  }
};

/***/ }),

/***/ "./src/js/app/gutenberg/infoTabs.js":
/*!******************************************!*\
  !*** ./src/js/app/gutenberg/infoTabs.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "infoTabs": () => (/* binding */ infoTabs)
/* harmony export */ });
const infoTabs = () => {
  jQuery("body").on("click", ".tabsContent__tab_button", function () {
    const tab = jQuery(this).parent().data("tab");
    jQuery(`[data-tab="${tab}"]`).toggleClass("activeAccordion");
  });
  jQuery("body").on("click", ".tabsContent .changeReusltSearch__link", function () {
    jQuery(".changeReusltSearch__item, .tabsContent__tab").removeClass("active");
    const tab = jQuery(this).parent().data("tab");
    jQuery(`[data-tab="${tab}"]`).addClass("active");
  });
};

/***/ }),

/***/ "./src/js/app/gutenberg/slider.js":
/*!****************************************!*\
  !*** ./src/js/app/gutenberg/slider.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "slider": () => (/* binding */ slider)
/* harmony export */ });
const slider = () => {
  const elms = document.querySelectorAll('.blockSlider--slider');

  for (let el of elms) {
    let splide = new Splide(el, {
      type: 'loop',
      autoplay: true,
      pauseOnHover: false,
      pauseOnFocus: false,
      resetProgress: false,
      arrows: false,
      paination: true,
      interval: 6000
    });
    splide.mount();
    let button = el.querySelector('.splide__toggle');

    if (button && splide.length > 1) {
      splide.options = {
        pagination: true
      };
      let parentPag = el.querySelector('.blockSlider__navigation');
      let pag = el.querySelector('.splide__pagination');
      parentPag.appendChild(pag);
      var pausedClass = 'is-paused';
      var flag = 99;
      let Autoplay = splide.Components.Autoplay;
      button.addEventListener('click', () => {
        button.classList.toggle(pausedClass);

        if (button.classList.contains(pausedClass)) {
          Autoplay.pause(flag);
        } else {
          Autoplay.play(flag);
        }
      });
    }
  }
};

/***/ }),

/***/ "./src/js/app/scrollTo.js":
/*!********************************!*\
  !*** ./src/js/app/scrollTo.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "goTo": () => (/* binding */ goTo)
/* harmony export */ });
const goTo = (el, offset) => {
  if (el) {
    el.addEventListener('click', e => {
      e.preventDefault();
      window.scroll({
        top: offset,
        left: 0,
        behavior: 'smooth'
      });
    });
  }
};

const goToElements = () => {
  const buttonGoTop = document.querySelector('.scrollToTop');
  const buttonGoContent = document.querySelector('.headerTop--skip');
  const content = document.querySelector('#primary');
  goTo(buttonGoTop, 0);
  goTo(buttonGoContent, content.offsetTop);
};

goToElements();

/***/ }),

/***/ "./src/js/app/slide.js":
/*!*****************************!*\
  !*** ./src/js/app/slide.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "slideDown": () => (/* binding */ slideDown),
/* harmony export */   "slideToggle": () => (/* binding */ slideToggle),
/* harmony export */   "slideUp": () => (/* binding */ slideUp)
/* harmony export */ });
function slideToggle(el, duration, callback) {
  if (el.clientHeight === 0) {
    slide(el, duration, callback, true);
  } else {
    slide(el, duration, callback);
  }
}
function slideUp(el, duration, callback) {
  slide(el, duration, callback);
}
function slideDown(el, duration, callback) {
  slide(el, duration, callback, true);
}

function slide(el, duration, callback, isDown) {
  if (typeof duration === 'undefined') duration = 400;
  if (typeof isDown === 'undefined') isDown = false;
  el.style.overflow = "hidden";
  if (isDown) el.style.display = "block";
  var elStyles = window.getComputedStyle(el);
  var elHeight = parseFloat(elStyles.getPropertyValue('height'));
  var elPaddingTop = parseFloat(elStyles.getPropertyValue('padding-top'));
  var elPaddingBottom = parseFloat(elStyles.getPropertyValue('padding-bottom'));
  var elMarginTop = parseFloat(elStyles.getPropertyValue('margin-top'));
  var elMarginBottom = parseFloat(elStyles.getPropertyValue('margin-bottom'));
  var stepHeight = elHeight / duration;
  var stepPaddingTop = elPaddingTop / duration;
  var stepPaddingBottom = elPaddingBottom / duration;
  var stepMarginTop = elMarginTop / duration;
  var stepMarginBottom = elMarginBottom / duration;
  var start;

  function step(timestamp) {
    if (start === undefined) start = timestamp;
    var elapsed = timestamp - start;

    if (isDown) {
      el.style.height = stepHeight * elapsed + "px";
      el.style.paddingTop = stepPaddingTop * elapsed + "px";
      el.style.paddingBottom = stepPaddingBottom * elapsed + "px";
      el.style.marginTop = stepMarginTop * elapsed + "px";
      el.style.marginBottom = stepMarginBottom * elapsed + "px";
    } else {
      el.style.height = elHeight - stepHeight * elapsed + "px";
      el.style.paddingTop = elPaddingTop - stepPaddingTop * elapsed + "px";
      el.style.paddingBottom = elPaddingBottom - stepPaddingBottom * elapsed + "px";
      el.style.marginTop = elMarginTop - stepMarginTop * elapsed + "px";
      el.style.marginBottom = elMarginBottom - stepMarginBottom * elapsed + "px";
    }

    if (elapsed >= duration) {
      el.style.height = "";
      el.style.paddingTop = "";
      el.style.paddingBottom = "";
      el.style.marginTop = "";
      el.style.marginBottom = "";
      el.style.overflow = "";
      if (!isDown) el.style.display = "none";
      if (typeof callback === 'function') callback();
    } else {
      window.requestAnimationFrame(step);
    }
  }

  window.requestAnimationFrame(step);
}

/***/ }),

/***/ "./src/js/app/stickyHeader.js":
/*!************************************!*\
  !*** ./src/js/app/stickyHeader.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "stickyHeader": () => (/* binding */ stickyHeader)
/* harmony export */ });
const stickyHeader = () => {
  const navbar = document.querySelector('#masthead');
  if (!navbar) return;

  let fixeMenuScroll = function () {
    if (window.scrollY >= 1) {
      navbar.classList.add('scrollDown');
    } else {
      navbar.classList.remove('scrollDown');
    }
  };

  window.addEventListener('scroll', fixeMenuScroll);
};

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
/*!**************************!*\
  !*** ./src/js/script.js ***!
  \**************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _js_app_stickyHeader__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../js/app/stickyHeader */ "./src/js/app/stickyHeader.js");
/* harmony import */ var _app_gutenberg__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./app/gutenberg */ "./src/js/app/gutenberg.js");
/* harmony import */ var _app_scrollTo__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./app/scrollTo */ "./src/js/app/scrollTo.js");



(0,_js_app_stickyHeader__WEBPACK_IMPORTED_MODULE_0__.stickyHeader)();

if (jQuery(".splideTabsSlider").length) {
  var splide = new Splide(".splideTabsSlider", {
    // type: "loop",
    pagination: false,
    autoWidth: true,
    perPage: 5 // padding: { left: 70, right: 70 },

  });
  splide.mount();
}

jQuery(".menu-toggle").on("click", function () {
  jQuery(".main-navigation ").toggleClass("toggled");
});
jQuery(".main-navigation .menu-item-has-children>a").on("click", function (e) {
  e.preventDefault();
  const subMenu = jQuery(this).next();

  if (subMenu.hasClass("active")) {
    subMenu.removeClass("active");
  } else {
    jQuery(".main-navigation .menu-item-has-children>ul.sub-menu").removeClass("active");
    subMenu.addClass("active");
  }
});
})();

/******/ })()
;
//# sourceMappingURL=script.js.map