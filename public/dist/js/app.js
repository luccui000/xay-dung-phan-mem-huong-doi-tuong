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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./resources/js/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/apis/index.js":
/*!************************************!*\
  !*** ./resources/js/apis/index.js ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _thanhtoan__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./thanhtoan */ "./resources/js/apis/thanhtoan.js");


const apis = {
    danhSachHuyen: _thanhtoan__WEBPACK_IMPORTED_MODULE_0__["danhSachHuyen"],
    danhSachXa: _thanhtoan__WEBPACK_IMPORTED_MODULE_0__["danhSachXa"],
    tinhPhi: _thanhtoan__WEBPACK_IMPORTED_MODULE_0__["tinhPhi"],
}
/* harmony default export */ __webpack_exports__["default"] = (apis);


/***/ }),

/***/ "./resources/js/apis/thanhtoan.js":
/*!****************************************!*\
  !*** ./resources/js/apis/thanhtoan.js ***!
  \****************************************/
/*! exports provided: danhSachHuyen, danhSachXa, tinhPhi */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "danhSachHuyen", function() { return danhSachHuyen; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "danhSachXa", function() { return danhSachXa; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "tinhPhi", function() { return tinhPhi; });

const danhSachHuyen = function (maTinh) {
    return $.ajax({
        'type': 'GET',
        'url': "/api/dia-chi/danh-sach-huyen",
        'data': {
            'ma_tinh': maTinh
        }
    })
}
const danhSachXa = function(maHuyen) {
    return $.ajax({
        'type': 'GET',
        'url': '/api/dia-chi/danh-sach-xa',
        'data': {
            'ma_huyen': maHuyen
        }
    })
}
const tinhPhi = function (maXa, maHuyen) {
    return $.ajax({
        type: "POST",
        url: "/api/giao-hang/tinh-phi",
        data: {
            'ma_huyen': maHuyen,
            'ma_xa': maXa
        }
    })
}



/***/ }),

/***/ "./resources/js/config/index.js":
/*!**************************************!*\
  !*** ./resources/js/config/index.js ***!
  \**************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
const config = {}

/* harmony default export */ __webpack_exports__["default"] = (config);


/***/ }),

/***/ "./resources/js/global/index.js":
/*!**************************************!*\
  !*** ./resources/js/global/index.js ***!
  \**************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
const global = {
    DIA_CHI: 'DIA_CHI'
}
/* harmony default export */ __webpack_exports__["default"] = (global);


/***/ }),

/***/ "./resources/js/index.js":
/*!*******************************!*\
  !*** ./resources/js/index.js ***!
  \*******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _utils_MyLocalStorage__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./utils/MyLocalStorage */ "./resources/js/utils/MyLocalStorage.js");
/* harmony import */ var _apis__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./apis */ "./resources/js/apis/index.js");
/* harmony import */ var _global__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./global */ "./resources/js/global/index.js");
/* harmony import */ var _config__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./config */ "./resources/js/config/index.js");
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./utils */ "./resources/js/utils/index.js");






const HDTShop =  {
    global: _global__WEBPACK_IMPORTED_MODULE_2__["default"],
    apis: _apis__WEBPACK_IMPORTED_MODULE_1__["default"],
    config: _config__WEBPACK_IMPORTED_MODULE_3__["default"],
    utils: _utils__WEBPACK_IMPORTED_MODULE_4__["default"],
    MyLocalStorage: _utils_MyLocalStorage__WEBPACK_IMPORTED_MODULE_0__["default"]
};

window.HDTShop = HDTShop;


/***/ }),

/***/ "./resources/js/utils/MyLocalStorage.js":
/*!**********************************************!*\
  !*** ./resources/js/utils/MyLocalStorage.js ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return MyLocalStorage; });
class MyLocalStorage {
    static get(key) {
        return JSON.parse(window.localStorage.getItem(key));
    }
    static add(key, value) {
        window.localStorage.setItem(key, JSON.stringify(value));
    }
    static remove(key) {
        window.localStorage.removeItem(key);
    }
    static clear() {
        window.localStorage.clear();
    }
    static key(index) {
        return window.localStorage.key(index);
    }
    static get length() {
        return window.localStorage.length;
    }
}


/***/ }),

/***/ "./resources/js/utils/VNDFormat.js":
/*!*****************************************!*\
  !*** ./resources/js/utils/VNDFormat.js ***!
  \*****************************************/
/*! exports provided: VNDFormat */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "VNDFormat", function() { return VNDFormat; });
function VNDFormat(money) {
    return new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND'
    }).format(money);
}


/***/ }),

/***/ "./resources/js/utils/index.js":
/*!*************************************!*\
  !*** ./resources/js/utils/index.js ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _VNDFormat__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./VNDFormat */ "./resources/js/utils/VNDFormat.js");


const utils = {
    VNDFormat: _VNDFormat__WEBPACK_IMPORTED_MODULE_0__["VNDFormat"],
}
/* harmony default export */ __webpack_exports__["default"] = (utils);


/***/ })

/******/ });
//# sourceMappingURL=app.js.map