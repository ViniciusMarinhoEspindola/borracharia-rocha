/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/js/admin/app.js":
/*!******************************************!*\
  !*** ./resources/assets/js/admin/app.js ***!
  \******************************************/
/***/ (function() {

window.onload = function () {
  if (window.screen.availWidth < 750) {
    document.getElementById('sidebar').classList.remove('active');
    document.getElementById('page-content').classList.remove('active');
  }
};

document.getElementById('btn-toggle-menu').onclick = function (e) {
  document.getElementById('sidebar').classList.toggle('active');
  document.getElementById('page-content').classList.toggle('active');
};

var dropdown = document.querySelectorAll(".dropdown-toggle");

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener('click', function (i) {
    var id = dropdown[i].getAttribute('aria-labelledby');
    var menu = document.getElementById(id);
    menu.classList.toggle('active');
  }.bind(this, i));
}

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/js/admin/app.js"]();
/******/ 	
/******/ })()
;