$(function () {
  var updateCSS = function () {
    $("#codesavages_css").val(editor.getSession().getValue());
  }
  $("#save-custom-css-form").submit(updateCSS);
});

var editor = ace.edit("customCss");
editor.setTheme("ace/theme/monokai");
editor.getSession().setMode("ace/mode/css");