
"use strict";
(() => {
  window.addEventListener('scroll', stickyFn);
  var navbar = document.getElementById("sidebar");
  var sticky = navbar.offsetTop;
  function stickyFn() {
    if (window.pageYOffset >= 75) {
      navbar.classList.add("sticky-pin")
    } else {
      navbar.classList.remove("sticky-pin");
    }
  }
})();

window.addEventListener('unload', () => {
  // removing the scroll function
  window.removeEventListener('scroll', stickyFn);
})
function confirmation(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    console.log(urlToRedirect);
    swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willCancel) => {
            if (willCancel) {
                window.location.href = urlToRedirect;
            }
        });
}
