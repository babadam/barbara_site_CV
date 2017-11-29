//alert('HI');

// fonction menu burger
(function() {

// old browser or not ?
if ( !('querySelector' in document && 'addEventListener' in window) ) {
return;
}
window.document.documentElement.className += ' js-enabled';

function toggleNav() {

// Define targets
var target = document.querySelector('.navigation');
var button = document.querySelector('.nav-button');

// click-touch event
if ( button ) {
  button.addEventListener('click',
  function (e) {
    target.classList.toggle('is-opened');
    e.preventDefault();
  }, false );
}
} // end toggleNav()

toggleNav();
}());


$(document).ready(function() {

  // typing animation
  (function($) {
    $.fn.writeText = function(content) {
        var contentArray = content.split(""),
            current = 0,
            elem = this;
        setInterval(function() {
            if(current < contentArray.length) {
                elem.text(elem.text() + contentArray[current++]);
            }
        }, 80);
    };

  })(jQuery);

  // input text for typing animation
  $("#holder").writeText("Développeuse - intégratrice web : je recherche un stage ");
})
