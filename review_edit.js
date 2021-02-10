init();
//ロードデータを表示する
triggerEvent(document.getElementsByClassName('pfReview-form-star-label')[document.getElementById('evaluation').value -1], 'click');
triggerEvent(document.getElementsByClassName('icon-user')[document.getElementById('sex').value], 'click');

function init(){
	 var $prev_labels = document.getElementsByClassName('pfReview-form-star-label');
	 for($i=0; $i<$prev_labels.length; $i++) {
		$prev_labels[$i].addEventListener("mouseenter", prev_hover, false);
		$prev_labels[$i].addEventListener("click", prev_checked, false);
	 }

	var $pfReview_form = document.getElementById('pfReview_form');
	//星群入った時に消すクラスチェック
	$pfReview_form.addEventListener("mouseenter", function(){
		remove_star_class('is_checked');
	}, false);
	//出た時に消すクラスホバー
	//星群の確定星観て星着色(確定クラスあるなら処理しない)
	$pfReview_form.addEventListener("mouseleave", function(){
		document.getElementById('pfReview_form').attributes['now_checked'].value = "false";
		remove_star_class('is_hover');
		if(document.getElementsByClassName('is_checked')){
			for($i=0; $i<Number(document.getElementById('evaluation').value); $i++) {
				$prev_labels[$i].classList.add('is_checked');
			}
		}
	}, false);
	
	//アイコン選択囲に入った時にクラスを消す
	document.getElementById('icon-wrapper').addEventListener("mouseenter", function(){
		remove_star_class('icon_checked');
	}, false);
	//アイコン選択囲に入った時にクラスを消す
	var $icon_user = document.getElementsByClassName('icon-user');
	document.getElementById('icon-wrapper').addEventListener("mouseleave", function(){
		for($i=0; $i<$icon_user.length; $i++) {
			if(document.getElementById('sex').value == $icon_user[$i].attributes['sex'].value){
				$icon_user[$i].classList.add('icon_checked');
			}
		}
	}, false);
	document.getElementsByClassName('icon-user')[0].addEventListener("click", icon_checked, false);
	document.getElementsByClassName('icon-user')[1].addEventListener("click", icon_checked, false);
}

function remove_star_class($class_name){
    if(document.getElementsByClassName($class_name) ){
		var $elements = document.getElementsByClassName($class_name);
		for($i=0; $i<$elements.length; ) {
			$elements[0].classList.remove($class_name);
		}
    }
}

function prev_hover(){
	if(document.getElementById('pfReview_form').attributes['now_checked'].value == "false"){
		chenge_star_label(this, 'is_hover');
	}
}

function prev_checked(){
	remove_star_class('is_hover');
	document.getElementById('evaluation').value = this.attributes['data-star'].value;
	document.getElementById('pfReview_form').attributes['now_checked'].value = "true";
	chenge_star_label(this, 'is_checked');
}

function chenge_star_label($this, $add_class){
	var $elements = document.getElementsByClassName('pfReview-form-star-label');
	for($i=0; $i<$elements.length; $i++) {
		if($i<$this.attributes['data-star'].value){
			$elements[$i].classList.add($add_class);
		}else{
			$elements[$i].classList.remove($add_class);
		}
	}
}

function icon_checked(){
    remove_star_class('icon_checked');
	this.classList.add('icon_checked');
	document.getElementById('sex').value = this.attributes['sex'].value;
}
<!-- イベントハンドラ強制発火  -->
function triggerEvent(element, event) {
   if (element === undefined) {
       return;
   }
   if (document.createEvent) {
       // IE以外
       var evt = document.createEvent("HTMLEvents");
       evt.initEvent(event, true, true ); // event type, bubbling, cancelable
       return element.dispatchEvent(evt);
   } else {
       // IE
       var evt = document.createEventObject();
       return element.fireEvent("on"+event, evt);
   }
}

<!-- 投稿ボタン押下時のチェック  -->
 function check(){
   var $check =  true;
   var $error_comment = [];
   <!-- ユーザー名  -->
   if(user_m.value == ""){
		$error_comment.push("ユーザー名を入力してください\n");
		$check = false;
   }
   <!-- 年齢  -->
   if(age.value == ""){
		$error_comment.push("年齢を入力してください\n");
		$check = false;
   }
   <!-- アイコン  -->
   if(document.getElementById('sex').value == ""){
		$error_comment.push("アイコンを選択してください\n");
		$check = false;
   }
   <!-- 評価  -->
   if(document.getElementById('evaluation').value == "0"){
		$error_comment.push("評価を選択してください\n");
		$check = false;
   }
   <!-- コメント  -->
   
   if(!$check) alert($error_comment);
   return $check;
 }
