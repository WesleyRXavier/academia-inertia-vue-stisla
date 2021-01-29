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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/register.js":
/*!**********************************!*\
  !*** ./resources/js/register.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $(".toggle-password").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));

    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
  $(function () {
    $("#password").keyup(function (e) {
      var senha = $(this).val();

      if (senha == "") {
        document.getElementById("password").className = "form-control";
        $("#senhaBarra").hide();
        $("#labelSenha").show();
      } else if (senha.length < 6) {
        //  document.getElementById("password").className =
        //      "form-control is-invalid";
        document.getElementById("alert-senha").innerHTML = "A senha deve ter pelo menos 6 caracteres";
        $("#senhaBarra").hide();
        $("#labelSenha").show();
      } else {
        var fSenha = forcaSenha(senha);
        var texto = ""; //   document.getElementById("password").className =
        //      "form-control is-valid";

        document.getElementById("alert-senha").innerHTML = texto;
        $("#senhaForca").css("width", fSenha + "%");
        $("#senhaForca").removeClass();
        $("#senhaForca").addClass("progress-bar");

        if (fSenha <= 40) {
          texto = "Fraca";
          $("#senhaForca").addClass("bg-light");
          $("#senhaForca").addClass("text-dark");
        }

        if (fSenha > 40 && fSenha <= 70) {
          texto = "Media";
          $("#senhaForca").addClass("bg-warning");
        }

        if (fSenha > 70 && fSenha <= 90) {
          texto = "Boa";
          $("#senhaForca").addClass("bg-success");
        }

        if (fSenha > 90) {
          texto = "Muito boa";
          $("#senhaForca").addClass("bg-danger");
        }

        $("#senhaForca").text(texto);
        $("#senhaBarra").show();
        $("#labelSenha").show();
      }
    });
  });

  function forcaSenha(senha) {
    var forca = 0;
    var regLetrasMa = /[A-Z]/;
    var regLetrasMi = /[a-z]/;
    var regNumero = /[0-9]/;
    var regEspecial = /[!@#$%&*?]/;
    var tam = false;
    var tamM = false;
    var letrasMa = false;
    var letrasMi = false;
    var numero = false;
    var especial = false;
    if (senha.length >= 6) tam = true;
    if (senha.length >= 10) tamM = true;
    if (regLetrasMa.exec(senha)) letrasMa = true;
    if (regLetrasMi.exec(senha)) letrasMi = true;
    if (regNumero.exec(senha)) numero = true;
    if (regEspecial.exec(senha)) especial = true;
    if (tam) forca += 10;
    if (tamM) forca += 10;
    if (letrasMa) forca += 10;
    if (letrasMi) forca += 10;
    if (letrasMa && letrasMi) forca += 20;
    if (numero) forca += 20;
    if (especial) forca += 20;
    return forca;
  }
});

/***/ }),

/***/ 1:
/*!****************************************!*\
  !*** multi ./resources/js/register.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\spreadingVueInertia\resources\js\register.js */"./resources/js/register.js");


/***/ })

/******/ });