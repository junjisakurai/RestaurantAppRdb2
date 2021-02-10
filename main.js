{
//https://oc-technote.com/javascript/javascript-post-params-move-to-page/
//https://techacademy.jp/magazine/26536
//画面遷移
//使う場合は、下記のように使います。
//post("index.php", {val:"hogehoge"});
function post(path, params, method='post') {
  const form = document.createElement('form');
  form.method = method;
  form.action = path;
  for (const key in params) {
    if (params.hasOwnProperty(key)) {
      const hiddenField = document.createElement('input');
      hiddenField.type = 'hidden';
      hiddenField.name = key;
      hiddenField.value = params[key];

      form.appendChild(hiddenField);
    }
  }
  document.body.appendChild(form);
  form.submit();
}

//画面遷移2
function post_2() {
  xhr = new XMLHttpRequest();
  xhr.open('POST', 'calc.php', true);
  xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=UTF-8');
  // フォームに入力した値をリクエストとして設定
  var request = "arg1=" + arg1.value + "&arg2=" + arg2.value;
  xhr.send(request);
}

//子画面を開く
function post_open($action) {
  window.open('', 'new_window','width=400,height=300,left=100,top=150');
  document.form1.action = $action;
  document.form1.method = 'POST';
  document.form1.target = 'new_window';
  document.form1.submit();
}
//子画面を閉じる
function child(){
  var parantExistanceFlag = true;
  if ( !window.opener || !Object.keys(window.opener).length ) {
    window.alert('親画面が存在しません')
    parantExistanceFlag = false
  }

    //親画面に値を挿入
    if(parantExistanceFlag){
      window.opener.document.getElementById("code1").value
       = document.getElementById("searchCode").value
      }
       //ウィンドウを閉じる
      window.close();
}

}