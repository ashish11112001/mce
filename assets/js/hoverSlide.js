$(document).ready(function(){
  $(".tab").mouseover(function() {
    $(this).animate({ "left": "-=40px" }, 200 );
  });
  $(".tab").mouseout(function() {
    $(this).animate({ "left": "+=40px" }, 200 );
  });

  $(".tab-left").mouseover(function() {
    $(this).animate({ "left": "+=40px" }, 200 );
  });
  $(".tab-left").mouseout(function() {
    $(this).animate({ "left": "-=40px" }, 200 );
  });
});

(function ( $ ) {
    $.fn.hoverSlide = function( options ) {

        var settings = $.extend({
          position: "fixed",
          color: "white",
          backgroundColor: "#abc",
          padding: "10px 15px",
          // font:"700 15px Lato, sans-serif",
          fontWeight: "600",
          fontSize: "16px",
          lineHeight: "1.8",
          left: "",
          right: "-50px",
          width: "250px",
          borderRadius: "2px",
          top: "60px",
          zIndex: 99,
          opacity: "",
          cursor: "pointer"
        }, options );

        return this.css({
          position: settings.position,
          color: settings.color,
          backgroundColor: settings.backgroundColor,
          padding: settings.padding,
          fontWeight: settings.fontWeight,
          fontSize: settings.fontSize,
          lineHeight: settings.lineHeight,
          left: settings.left,
          right: settings.right,
          width: settings.width,
          borderRadius: settings.borderRadius,
          top: settings.top,
          zIndex: settings.zIndex,
          opacity: settings.opacity,
          cursor: settings.cursor
        });
    };
}( jQuery ));
