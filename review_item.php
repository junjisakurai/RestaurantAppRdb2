<?php
function view_review_item($exit_my_review, $sex, $user_name, $star, $review){
	$delete_button = '';
	if($exit_my_review == true){
		$delete_button = '<button onclick="delete_review()" style="margin-left: 120px;">削除する</button>';
	}
	echo	'<table border="0" width="100%">';
	echo	'	<tbody>';
	echo	'		<tr valign="top">';
	echo	'			<td class="" width="15%" rowspan="2">';
	echo	'	            <div class="review-user">';
	if ($sex == '1'){
		echo	'	                <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/male.png" class="icon-user">';
	}else{
		echo	'	                <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/female.png" class="icon-user">';
	}

	echo	'	              <p>'.$user_name.'</p>';
	echo	'	            </div>';
	echo	'			</td>';
	echo	'			<td class="" width="85%" height="31">';
	echo	'				<div class="pfReview__form--star-wrap" id="fn-box-star">';

	for($i=1; $i<=5; $i++){
		$class_type = '';
		if($star >= $i){
			$class_type = 'is_checked';
		}
		echo '				<span data-star="'.$i.'" class="star-label '.$class_type.'"></span>';
	}
	echo	$delete_button;
	echo	'				</div>';
	echo	'			</td>';
	echo	'		</tr>';
	echo	'		<tr valign="top">';
	echo	'			<td class="" width="85%">';
	echo	'				<p class="review-text">'.$review.'</p>';
	echo	'			</td>';
	echo	'		</tr>';
	echo	'	</tbody>';
	echo	'</table>';
}
?>