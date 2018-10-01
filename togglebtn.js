// SNS button toggle add class
window.addEventListener('load', function() {
  document.querySelectorAll('.cosmosfarm-share-button-title')[0].addEventListener('click', function() {
    document.querySelectorAll('.cosmosfarm-naver')[0].classList.toggle('showbtn');
    document.querySelectorAll('.cosmosfarm-facebook')[0].classList.toggle('showbtn');
    document.querySelectorAll('.cosmosfarm-kakaotalk')[0].classList.toggle('showbtn');
    document.querySelectorAll('.cosmosfarm-band')[0].classList.toggle('showbtn');
    document.querySelectorAll('.cosmosfarm-kakaostory')[0].classList.toggle('showbtn');
    document.querySelectorAll('.cosmosfarm-line')[0].classList.toggle('showbtn');
  }, false);
});
