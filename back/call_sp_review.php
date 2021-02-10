<?php 
function exce_sp_review($proc, $menu_id, $user_id) {
    require_once('db_conn.php');
    $dbh = connection_db();
	//DB取得
	$stmt = $dbh->prepare("CALL sp_review(?,?,?)");
    $stmt->bindParam(1, $proc, PDO::PARAM_INT);
    $stmt->bindParam(2, $menu_id);
    $stmt->bindParam(3, $user_id);
	// ストアドプロシージャをコールします
	$stmt->execute();
	// Webブラウザにこれから表示するものがUTF-8で書かれたHTMLであることを伝える
	// (これか <meta charset="utf-8"> の最低限どちらか1つがあればいい． 両方あっても良い．)
	header('Content-Type: text/html; charset=utf-8');

    return $stmt;
}

function db_edit_sp_review($proc, $menu_id, $user_id, $user_m, $sex, $age, $review, $evaluation) {
    require_once('db_conn.php');
    $dbh = connection_db();
	//DB更新
	$stmt = $dbh->prepare("CALL sp_review(?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1, $proc, PDO::PARAM_INT);
    $stmt->bindParam(2, $menu_id);
    $stmt->bindParam(3, $user_id);
    $stmt->bindParam(4, $user_m);
    $stmt->bindParam(5, $sex);
    $stmt->bindParam(6, $age);
    $stmt->bindParam(7, $review);
    $stmt->bindParam(8, $evaluation);
	$stmt->execute();
	header('Content-Type: text/html; charset=utf-8');

    return $stmt;
}
?>