<!-- レビュー投稿画面  -->
<?php
session_start();
$user_id = $_SESSION['user_id'];
$menu_id = $_POST['menu_id'];
$menu_item = $_POST['menu_item'];

include('call_sp_review.php');
$rows = exce_sp_review(2, $menu_id, $user_id);
$review_item = $rows->fetch(PDO::FETCH_ASSOC);
$user_name = '';
$sex = '';
$age = '';
$review = '';
$evaluation = '';
if($review_item <> '' && count($review_item) > 0){
  $user_name  = $review_item['user_name'];
  $sex        = $review_item['sex'];
  $age        = $review_item['age'];
  $review     = $review_item['review'];
  $evaluation = $review_item['evaluation'];
}
//XSS
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Progate</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
  <div class="review-wrapper">
    <?php echo $menu_item ?>
    <form method="post" action="review_confirm.php" onsubmit="return check()">
	    <div class="review-item-wrapper">
			<table border="0" width="100%">
				<tbody>
					<input type="hidden" id="proc_id" value="3" name="proc_id">
					<input type="hidden" id="menu_id" value="<?php echo h($menu_id) ?>" name="menu_id">
					<input type="hidden" id="user_id" value="<?php echo h($user_id) ?>" name="user_id">
					<tr valign="top">
						<td class="item-title" width="30%" height="80"><p class="review-item-titlel">ユーザー名</p></td>
						<td class="item-content" width="70%" "height="80"><input type="text" id="user_m" value="<?php echo $user_name ?>" name="user_m"></td>
					</tr>
					<tr valign="top">
						<td class="item-title" width="30%" height="80"><p class="review-item-titlel">年齢</p></td>
						<td class="item-content" width="70%" "height="80"><input width="100" type="text" id="age" value="<?php echo $age ?>" name="age"></td>
					</tr>
					<tr valign="top">
						<td class="item-title" width="100" height="80"><p class="review-item-title">アイコン</p></td>
						<td class="item-content" width="100" height="80">
					        <div id="icon-wrapper" class="">
					          <input type="hidden" id="sex" value="<?php echo $sex ?>" name="sex">
					          <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/female.png" class="icon-user" sex="0">
					          <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/male.png" class="icon-user" sex="1">
					        </div>
						</td>
					</tr>
					<tr valign="top">
						<td class="item-title" width="100" height="80"><p class="review-item-title, pfReview__form--label">評価</p></td>
						<td class="item-content" width="100" height="80">
							<section id="pfReview_form" class="" now_checked="false">
								<input type="hidden" id="evaluation" value="<?php echo $evaluation ?>" name="evaluation">
								<div class="pfReview__area--evaluate" id="fn-area-star">
									<div class="pfReview__form--star-wrap" id="fn-box-star">
									<span data-star="1" class="pfReview-form-star-label"></span>
									<span data-star="2" class="pfReview-form-star-label"></span>
									<span data-star="3" class="pfReview-form-star-label"></span>
									<span data-star="4" class="pfReview-form-star-label"></span>
									<span data-star="5" class="pfReview-form-star-label"></span>
									</div>
								</div>
							</section>
						</td>
					</tr>
					<tr valign="top">
						<td colspan="2" class="item-title" width="100%" height="10"><p class="review-item-title, pfReview__form--label">コメント</p></td>
					</tr>
					<tr valign="top">
						<td colspan="2" class="item-coment" width="100" height="150"><textarea id="comment" name="review" rows="6" cols="45"><?php echo h($review) ?></textarea></td>
					</tr>
				</tbody>
			</table>
	      <input type="submit" id="review_done" value="<?php echo '投稿する'?>" >
	    </div>    
    </form>
  </div>
  <script src="main.js"></script>
  <script src="review_edit.js"></script>
</body>
</html>
