(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/formulario_mascaras"],{

/***/ "./resources/js/formulario_mascaras.js":
/*!*********************************************!*\
  !*** ./resources/js/formulario_mascaras.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('.cnpj').mask('00.000.000/0000-00', {
    reverse: true
  });
  $('.cpf').mask('000.000.000-00', {
    reverse: true
  });
  $('.cep').mask('00000-000');
  $('.telefone').mask('(00) 0000-0000');
  $('.data_hora').mask('00/00/0000 00:00:00');
  $('.data').mask('00/00/0000');
  $('.hora').mask('00:00:00');
  $('.dinheiro').mask('#.##0,00', {
    reverse: true
  });

  var CLMaskBehavior = function CLMaskBehavior(val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  };

  var clOptions = {
    onKeyPress: function onKeyPress(val, e, field, options) {
      field.mask(CLMaskBehavior.apply({}, arguments), options);
    }
  };
  $('.celular').mask(CLMaskBehavior, clOptions);
  $('.rg').mask('99.999.999-9');
  $('.data').datepicker($.datepicker.regional['pt-BR']);
});

/***/ }),

/***/ 1:
/*!***************************************************!*\
  !*** multi ./resources/js/formulario_mascaras.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\ambiente_dev\maquinas_virtuais\vagrant_boxes\bolsa_de_leiloes\var\www\html\lanceyleiloes\resources\js\formulario_mascaras.js */"./resources/js/formulario_mascaras.js");


/***/ })

},[[1,"/js/manifest"]]]);