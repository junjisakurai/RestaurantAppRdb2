<!-- レビュー表示画面  -->
<?php
session_start();
$user_id = $_SESSION['user_id'];
$menu_id = $_GET['menu_id'];
$status  = '';
$message = '';
if (isset($_GET['status'])) {
  $status  = $_GET['status'];
  $message = $_GET['message'];
  $alert = "<script type='text/javascript'>alert('登録処理:" . $status . "');</script>";
  echo $alert;
}

include('call_sp_menu.php');
$rows = exce_sp_menu(2, $menu_id);
$row = $rows->fetch(PDO::FETCH_ASSOC);
$exit_my_review = false;

include('call_sp_review.php');
$reviews = exce_sp_review(1, $row['menu_id'], '');
//dtはforeachすると配列がなくなるので取り直し
$reviews2 = exce_sp_review(1, $row['menu_id'], '');
include('chartData.php');
$chartData = getChartData($reviews2);
include('review_item.php');
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
    <div class="review-menu-item">
      <img src="<?php echo $row['menu_img_url'] ?>" class="review-menu-item-image">
      <!-- 【メニュー名】  -->
      <h3 class="menu-item-name" 
      average=<?php echo $chartData["average"] ?> 
      totalCount=<?php echo $chartData["totalCount"] ?> 
      fiveCount=<?php echo $chartData["fiveCount"] ?> 
      foreCount=<?php echo $chartData["foreCount"] ?> 
      threeCount=<?php echo $chartData["threeCount"] ?> 
      twoCount=<?php echo $chartData["twoCount"] ?> 
      oneCount=<?php echo $chartData["oneCount"] ?>><?php echo $row['menu_name'] ?></h3>
  
      <?php if ($row['menu_kbn'] == '1'  ): ?>
        <p class="menu-item-type"><?php echo $row['hot_ice_m'] ?></p>
          <!-- アルコールクラスはアルコール表示  -->
          <?php if ($row['drink_kbn'] == '2' ): ?>
          	<p class="menu-item-alcohol">/アルコール <?php echo $row['alcol'] ?> %</p>
          <?php endif ?>
      <?php else: ?>
        <?php for ($i = 0; $i < $row['spicy']; $i++): ?>
          <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/chilli.png" class='icon-spiciness'>
        <?php endfor ?>
      <?php endif ?>
      <p class="price">¥<?php echo floor($row['price'] * 1.08) ?></p>
    </div>
    
    <div class="review-list-wrapper">
      <div class="review-list">
       <p>
       <!--グラフ描画-->
         <canvas id="ex_chart" height="50" width="150"></canvas>
       </p>
      
        <div class="review-list-title">
          <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/review.png" class='icon-review'>
          <h4>レビュー一覧</h4>
          <input id="review-edit" type="button" value="レビューを書く" onclick="edit_review_post()">
        </div>
        <?php foreach ($reviews as $review): ?>
          <?php if ($review['user_id'] == $user_id): ?>
            <?php $exit_my_review = true; ?>
            <script>
              document.getElementById('review-edit').value = "レビューを編集する";
            </script>
          <?php else: ?>
          	<?php $exit_my_review = false; ?>
          <?php endif ?>
          <div class="review-list-item">
          	<?php view_review_item($exit_my_review, $review['sex'], $review['user_name'], $review['evaluation'], $review['review']); ?>
          </div>
        <?php endforeach ?>
      </div>
    </div>
    <a href="index.php">← メニュー一覧へ</a>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <script src="Chart.js"></script>
  <script src="main.js"></script>
  <script>
function edit_review_post() {
  var $param  = {menu_id   : "<?php echo $menu_id ?>", 
                 menu_item : document.getElementsByClassName('review-menu-item')[0].outerHTML};
  post("review_edit.php", $param);
}
function delete_review() {
    var result = window.confirm('投稿を削除します。よろしいですか？');
    if(result){
        var $param  = {menu_id : "<?php echo $menu_id ?>", 
                       proc_id : "4"};
        post("review_confirm.php", $param);
    }
}
  </script>
</body>
</html>
