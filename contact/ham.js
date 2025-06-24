$(function(){
    $('.hamburger').click(function(){
        $('.menu').toggleClass('open');
        $(this).toggleClass('active');
    });
});
var validateText = function(e) {
        var validated = '';
        Array.prototype.forEach.call(e.value, function(c) {
          if (
            c.match(/[A-Za-z0-9]/)
            || c.match(/[\n|\r\n|\r]/)
            || c.match(/[\u30a0-\u30ff\u3040-\u309f]/)
            || c.match(/[ｦ-ﾟ]/)
          ) {
            validated += c;
          }
        });
        e.value = validated;
      }
