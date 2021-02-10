<!-- ƒŒƒrƒ…[“ŠeDB“o˜^‹@”\  -->
<?php
session_start();
$user_id    = $_SESSION['user_id'];
$menu_id    = $_POST['menu_id'];
$proc_id    = $_POST['proc_id'];
$user_m     = '';
$sex        = '';
$age        = '';
$review     = '';
$evaluation = '';
if (isset($_POST['user_m'])) {
	$user_m     = $_POST['user_m'];
	$sex        = $_POST['sex'];
	$age        = $_POST['age'];
	$review     = $_POST['review'];
	$evaluation = $_POST['evaluation'];
}

include('call_sp_review.php');
db_edit_sp_review((int)$proc_id, $menu_id, $user_id, $user_m, $sex, $age, $review, $evaluation, $user_id);
//“o˜^o—ˆ‚½H

//ƒƒjƒ…[‰æ–Ê‚Ö‘JˆÚ
$status  = '0';
$message = '';
header("Location:show.php?menu_id=$menu_id&status=$proc_id&message=$message");
exit();
?>