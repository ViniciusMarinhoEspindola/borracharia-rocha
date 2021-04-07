/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/assets/js/admin/app.js ***!
  \******************************************/
window.onload = function () {
  if (window.screen.availWidth > 750) {
    document.getElementById('sidebar').classList.add('active');
    document.getElementById('page-content').classList.add('active');
  }
};

document.getElementById('btn-toggle-menu').onclick = function (e) {
  document.getElementById('sidebar').classList.toggle('active');
  document.getElementById('page-content').classList.toggle('active');
};
/******/ })()
;