// Avoid `console` errors in browsers that lack a console.
(function() {
  var method;
  var noop = function () {};
  var methods = [
    'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
    'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
    'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
    'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
  ];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop;
    }
  }
}());

// Place any jQuery/helper plugins in here.
document.addEventListener(
  "DOMContentLoaded", () => {
    const menu = new MmenuLight(
      document.querySelector( "#mobile-nav" ),
      "(max-width: 1000px)"
    );

    const navigator = menu.navigation();
    const drawer = menu.offcanvas();

    document.querySelector( "a[href='#mobile-nav']" )
      .addEventListener( "click", ( evnt ) => {
        evnt.preventDefault();
        drawer.open();
      });
  }
);
/*
document.addEventListener('click', ( evnt ) => {
  var target = evnt.target;
  let xmpl = target.closest('.xmpl');
  if ( xmpl ) {
    let webcomponent = xmpl.querySelector( 'm-burger' );
    if ( webcomponent ) {
      if ( webcomponent.getAttribute( 'state' ) ) {
        webcomponent.removeAttribute( 'state' );
      } else {
        webcomponent.setAttribute( 'state', 'cross' );
      }
    } else {
      xmpl.classList.toggle( 'mm-wrapper_opened' );
    }
  }
});
*/

