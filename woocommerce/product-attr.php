<?php
/**
 * product attribute html code
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php
// If checked, the string is 'attr-on', otherwise empty
$get_field = get_field( 'available_amenities' );
$venue = in_array( 'venue', $get_field) ? 'attr-on' : '';
$catering = in_array( 'catering', $get_field) ? 'attr-on' : '';
$seats = in_array( 'seats', $get_field) ? 'attr-on' : '';
$sound = in_array( 'sound', $get_field) ? 'attr-on' : '';
$parking = in_array( 'parking', $get_field) ? 'attr-on' : '';
$flower = in_array( 'flower', $get_field) ? 'attr-on' : '';
$photo = in_array( 'photo', $get_field) ? 'attr-on' : '';
$directing = in_array( 'directing', $get_field) ? 'attr-on' : '';
$makeup = in_array( 'makeup', $get_field) ? 'attr-on' : '';
$venue1 = in_array( 'venue', $get_field) ? '' : 'attr-on';
$catering1 = in_array( 'catering', $get_field) ? '' : 'attr-on';
$seats1 = in_array( 'seats', $get_field) ? '' : 'attr-on';
$sound1 = in_array( 'sound', $get_field) ? '' : 'attr-on';
$parking1 = in_array( 'parking', $get_field) ? '' : 'attr-on';
$flower1 = in_array( 'flower', $get_field) ? '' : 'attr-on';
$photo1 = in_array( 'photo', $get_field) ? '' : 'attr-on';
$directing1 = in_array( 'directing', $get_field) ? '' : 'attr-on';
$makeup1 = in_array( 'makeup', $get_field) ? '' : 'attr-on';
?>

<div class="clearfix"></div>
<div class="attr-container center" style="margin-top:3%;margin-bottom:5%">
  <h2 class="attr-title">기본 제공항목</h2>
  <ul class="attr-inner">
    <li>
      <div class="rent">
        <div class="icon-container">
          <i class="fas fa-home attr-icon <?php echo $venue; ?>"></i><i class="fas fa-home attr-icon icon2 <?php echo $venue1; ?>"></i>
        </div>
        <p class="attr-text">대관</p>
      </div>
    </li>
    <li>
      <div class="dining">
        <div class="icon-container">
          <i class="fas fa-utensils attr-icon  <?php echo $catering; ?>"></i><i class="fas fa-utensils attr-icon icon2 <?php echo $catering1; ?>"></i>
        </div>
        <p class="attr-text">식사</p>
      </div>
    </li>
    <li>
      <div class="seats">
        <div class="img-container">
          <img class="attr-iconimg attr-icon <?php echo $seats; ?>" src="http://s3-ap-northeast-2.amazonaws.com/houseweddinglink/wp-content/uploads/2018/09/03142650/%EC%A2%8C%EC%84%9D-3pt-0828.svg" alt=""/><img class="attr-iconimg attr-icon icon2 <?php echo $seats1; ?>" src="http://s3-ap-northeast-2.amazonaws.com/houseweddinglink/wp-content/uploads/2018/09/03142652/%EC%A2%8C%EC%84%9D-gary-3pt-0828.svg" alt=""/>
        </div>
        <p class="attr-text">좌석</p>
      </div>
    </li>
    <li>
      <div class="sound">
        <div class="icon-container">
          <i class="fas fa-volume-down attr-icon <?php echo $sound; ?>"></i><i class="fas fa-volume-down attr-icon icon2 <?php echo $sound1; ?>"></i>
        </div>
        <p class="attr-text">음향</p>
      </div>
    </li>
    <li>
      <div class="parking">
        <div class="icon-container">
          <i class="fas fa-parking attr-icon <?php echo $parking; ?>"></i><i class="fas fa-parking attr-icon icon2 <?php echo $parking1; ?>"></i>
        </div>
        <p class="attr-text">주차</p>
      </div>
    </li>
    <li>
      <div class="flower">
        <div class="img-container">
          <img class="attr-iconimg attr-icon <?php echo $flower; ?>" src="http://s3-ap-northeast-2.amazonaws.com/houseweddinglink/wp-content/uploads/2018/09/03142645/%EA%BD%83%EC%9E%A5%EC%8B%9D-3pt-0828.svg" alt=""/><img class="attr-iconimg attr-icon icon2 <?php echo $flower1; ?>" src="http://s3-ap-northeast-2.amazonaws.com/houseweddinglink/wp-content/uploads/2018/09/03142647/%EA%BD%83%EC%9E%A5%EC%8B%9D-gray-3pt-0828.svg" alt=""/>
        </div>
        <p class="attr-text">꽃장식</p>
      </div>
    </li>
    <li>
      <div class="photo">
        <div class="icon-container">
          <i class="fas fa-camera attr-icon <?php echo $photo; ?>"></i><i class="fas fa-camera attr-icon icon2 <?php echo $photo1; ?>"></i>
        </div>
        <p class="attr-text">포토</p>
      </div>
    </li>
    <li>
      <div class="coordi">
        <div class="icon-container">
          <i class="fas fa-headphones attr-icon <?php echo $directing; ?>"></i><i class="fas fa-headphones attr-icon icon2 <?php echo $directing1; ?>"></i>
        </div>
        <p class="attr-text">진행</p>
      </div>
    </li>
    <li>
      <div class="makeup">
        <div class="img-container">
          <img class="attr-iconimg attr-icon <?php echo $makeup; ?>" src="http://s3-ap-northeast-2.amazonaws.com/houseweddinglink/wp-content/uploads/2018/09/03142648/%EB%A9%94%EC%9D%B4%ED%81%AC%EC%97%85-3pt-0828.svg" alt=""/><img class="attr-iconimg icon2 <?php echo $makeup1; ?>" src="http://s3-ap-northeast-2.amazonaws.com/houseweddinglink/wp-content/uploads/2018/09/03142649/%EB%A9%94%EC%9D%B4%ED%81%AC%EC%97%85-gray-3pt-0828.svg" alt=""/>
        </div>
        <p class="attr-text">메이크업</p>
      </div>
    </li>
  </ul>
</div>
