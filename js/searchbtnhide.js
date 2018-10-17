// Search button toggle add class
document.addEventListener('DOMContentLoaded', function() {
  document.querySelector('.mobile-header-inner .right-btn').addEventListener('click', function() {
    document.querySelectorAll('.astm-search-menu-wrapper')[0].classList.toggle('hidebtn');
  }, false);
});
