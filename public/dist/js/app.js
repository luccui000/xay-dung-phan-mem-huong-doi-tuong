/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/apis/index.js":
/*!************************************!*\
  !*** ./resources/js/apis/index.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony import */ var _thanhtoan__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./thanhtoan */ \"./resources/js/apis/thanhtoan.js\");\n\n\nconst apis = {\n    danhSachHuyen: _thanhtoan__WEBPACK_IMPORTED_MODULE_0__.danhSachHuyen,\n    danhSachXa: _thanhtoan__WEBPACK_IMPORTED_MODULE_0__.danhSachXa,\n    tinhPhi: _thanhtoan__WEBPACK_IMPORTED_MODULE_0__.tinhPhi,\n}\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (apis);\n\n\n//# sourceURL=webpack://lara-ecommerce/./resources/js/apis/index.js?");

/***/ }),

/***/ "./resources/js/apis/thanhtoan.js":
/*!****************************************!*\
  !*** ./resources/js/apis/thanhtoan.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"danhSachHuyen\": () => (/* binding */ danhSachHuyen),\n/* harmony export */   \"danhSachXa\": () => (/* binding */ danhSachXa),\n/* harmony export */   \"tinhPhi\": () => (/* binding */ tinhPhi)\n/* harmony export */ });\n\nconst danhSachHuyen = function (maTinh) {\n    return $.ajax({\n        'type': 'GET',\n        'url': \"/api/dia-chi/danh-sach-huyen\",\n        'data': {\n            'ma_tinh': maTinh\n        }\n    })\n}\nconst danhSachXa = function(maHuyen) {\n    return $.ajax({\n        'type': 'GET',\n        'url': '/api/dia-chi/danh-sach-xa',\n        'data': {\n            'ma_huyen': maHuyen\n        }\n    })\n}\nconst tinhPhi = function (maXa, maHuyen) {\n    return $.ajax({\n        type: \"POST\",\n        url: \"/api/giao-hang/tinh-phi\",\n        data: {\n            'ma_huyen': maHuyen,\n            'ma_xa': maXa\n        }\n    })\n}\n\n\n\n//# sourceURL=webpack://lara-ecommerce/./resources/js/apis/thanhtoan.js?");

/***/ }),

/***/ "./resources/js/config/index.js":
/*!**************************************!*\
  !*** ./resources/js/config/index.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\nconst config = {}\n\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (config);\n\n\n//# sourceURL=webpack://lara-ecommerce/./resources/js/config/index.js?");

/***/ }),

/***/ "./resources/js/global/index.js":
/*!**************************************!*\
  !*** ./resources/js/global/index.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\nconst global = {\n    DIA_CHI: 'DIA_CHI'\n}\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (global);\n\n\n//# sourceURL=webpack://lara-ecommerce/./resources/js/global/index.js?");

/***/ }),

/***/ "./resources/js/index.js":
/*!*******************************!*\
  !*** ./resources/js/index.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _utils_MyLocalStorage__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./utils/MyLocalStorage */ \"./resources/js/utils/MyLocalStorage.js\");\n/* harmony import */ var _apis__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./apis */ \"./resources/js/apis/index.js\");\n/* harmony import */ var _global__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./global */ \"./resources/js/global/index.js\");\n/* harmony import */ var _config__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./config */ \"./resources/js/config/index.js\");\n/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./utils */ \"./resources/js/utils/index.js\");\n\n\n\n\n\n\nconst HDTShop =  {\n    global: _global__WEBPACK_IMPORTED_MODULE_2__[\"default\"],\n    apis: _apis__WEBPACK_IMPORTED_MODULE_1__[\"default\"],\n    config: _config__WEBPACK_IMPORTED_MODULE_3__[\"default\"],\n    utils: _utils__WEBPACK_IMPORTED_MODULE_4__[\"default\"],\n    MyLocalStorage: _utils_MyLocalStorage__WEBPACK_IMPORTED_MODULE_0__[\"default\"]\n};\n\nwindow.HDTShop = HDTShop;\n\n\n//# sourceURL=webpack://lara-ecommerce/./resources/js/index.js?");

/***/ }),

/***/ "./resources/js/utils/MyLocalStorage.js":
/*!**********************************************!*\
  !*** ./resources/js/utils/MyLocalStorage.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (/* binding */ MyLocalStorage)\n/* harmony export */ });\nclass MyLocalStorage {\n    static get(key) {\n        return JSON.parse(window.localStorage.getItem(key));\n    }\n    static add(key, value) {\n        window.localStorage.setItem(key, JSON.stringify(value));\n    }\n    static remove(key) {\n        window.localStorage.removeItem(key);\n    }\n    static clear() {\n        window.localStorage.clear();\n    }\n    static key(index) {\n        return window.localStorage.key(index);\n    }\n    static get length() {\n        return window.localStorage.length;\n    }\n}\n\n\n//# sourceURL=webpack://lara-ecommerce/./resources/js/utils/MyLocalStorage.js?");

/***/ }),

/***/ "./resources/js/utils/VNDFormat.js":
/*!*****************************************!*\
  !*** ./resources/js/utils/VNDFormat.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"VNDFormat\": () => (/* binding */ VNDFormat)\n/* harmony export */ });\nfunction VNDFormat(money) {\n    return new Intl.NumberFormat('vi-VN', {\n        style: 'currency',\n        currency: 'VND'\n    }).format(money);\n}\n\n\n//# sourceURL=webpack://lara-ecommerce/./resources/js/utils/VNDFormat.js?");

/***/ }),

/***/ "./resources/js/utils/index.js":
/*!*************************************!*\
  !*** ./resources/js/utils/index.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony import */ var _VNDFormat__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./VNDFormat */ \"./resources/js/utils/VNDFormat.js\");\n\n\nconst utils = {\n    VNDFormat: _VNDFormat__WEBPACK_IMPORTED_MODULE_0__.VNDFormat,\n}\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (utils);\n\n\n//# sourceURL=webpack://lara-ecommerce/./resources/js/utils/index.js?");

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
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./resources/js/index.js");
/******/ 	
/******/ })()
;