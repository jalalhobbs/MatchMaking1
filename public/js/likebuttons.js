/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 45);
/******/ })
/************************************************************************/
/******/ ({

/***/ 3:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (immutable) */ __webpack_exports__["setLikeButtons"] = setLikeButtons;
function setLikeButtons() {
    var token = document.head.querySelector('meta[name="csrf-token"]').content;
    var targetId = 0;
    var urlLike = './updateLikeStatus';
    $('.btn-dislike').on('click', function (event) {

        event.preventDefault();
        targetId = event.target.parentNode.parentNode.dataset['userid'];

        $.ajax({
            method: 'POST',
            url: urlLike,
            data: { isLike: 0, targetId: targetId, _token: token }
        }).done(function () {
            $(event.target).closest('.profile-card', 'div').animate({
                opacity: 0.0,
                marginLeft: '-225px'
            }, 'fast', 'linear', function () {
                $(this).remove();
            });
            $('.modal-backdrop').css('z-index', '100').fadeOut(350);
            $('body').removeClass('modal-open').css("padding-right", "");
            if ($('.profile-card').length <= 1 && $('.card-header').html() == "Home") {
                getProfiles();
            }
        });
    });

    $('.btn-no-like-status').on('click', function (event) {

        event.preventDefault();
        targetId = event.target.parentNode.parentNode.dataset['userid'];

        $.ajax({
            method: 'POST',
            url: urlLike,
            data: { isLike: 1, targetId: targetId, _token: token }
        }).done(function () {
            $(event.target).closest('.profile-card', 'div').animate({
                opacity: 0.0,
                marginLeft: '-225px'
            }, 'fast', 'linear', function () {
                $(this).remove();
            });
            $('.modal-backdrop').css('z-index', '100').fadeOut(350);
            $('body').removeClass('modal-open').css("padding-right", "");
            if ($('.profile-card').length <= 1 && $('.card-header').html() == "Home") {
                getProfiles();
            }
        });
    });

    $('.btn-like').on('click', function (event) {

        event.preventDefault();
        targetId = event.target.parentNode.parentNode.dataset['userid'];

        $.ajax({
            method: 'POST',
            url: urlLike,
            data: { isLike: 2, targetId: targetId, _token: token }
        }).done(function () {
            $(event.target).closest('.profile-card', 'div').animate({
                opacity: 0.0,
                marginLeft: '-225px'
            }, 'fast', 'linear', function () {
                $(this).remove();
            });
            $('.modal-backdrop').css('z-index', '100').fadeOut(350);
            $('body').removeClass('modal-open').css("padding-right", "");
            if ($('.profile-card').length <= 1 && $('.card-header').html() == "Home") {
                getProfiles();
            }
        });
    });
};

/***/ }),

/***/ 45:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(3);


/***/ })

/******/ });