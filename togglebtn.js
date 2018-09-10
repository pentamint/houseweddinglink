<script>
function toggle_btn() {
  var a = document.getElementsByClassName ("cosmosfarm-share-button-title");
  a.onClick = function() {
    var b = document.getElementsByClassName ('cosmosfarm-naver cosmosfarm-facebook');
    b.addClass.classList.toggle('showbtn');
  }
}
</script>
