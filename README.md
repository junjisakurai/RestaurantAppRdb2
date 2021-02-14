# RestaurantApp2
レストラン料理注文WEBアプリ
<br>
<br>
<br>
<br>
■ VIEW  (サーバー：Heroku　DB：ClearDB MySQL)<br>
https://restaurant-app-rdb2-junji.herokuapp.com/
<br>
<br>
<br>
■ 画面構成
<br>
![ポートフォリオ画面-01](https://user-images.githubusercontent.com/54252926/95788642-e0fc3a00-0d16-11eb-8caf-847d587d7cde.jpg)
<br>
■ ファイル構成
<pre>
●画面クラス ------------------------------------
トップ画面
index.php

レビュー閲覧画面
show.php

レビュー投稿・編集画面
review_edit.php

注文内容確認画面
confirm.php

★スタイルシート ----------------
stylesheet.css

■topへ戻る機能  ----------------
index.js
■画面遷移機能   ----------------
main.js

■レビュー      ----------------
レビュー表示機能
review_item.php

レビューDB登録機能
review_confirm.php

評価機能_チェック機能
review_edit.js

■チャート      -----------------
チャート描画スクリプト
Chart.js
チャートデータ作成
chartData.php

●DB関連    ----------------------------------------
■SP (ストアドプロシージャ)
sp_menu   (メニューデータ関連のSP)
sp_review (レビューデータ関連のSP)

■SP呼出 (ストアドプロシージャ呼出)
call_sp_menu.php   (メニューSP呼出)
call_sp_review.php (レビューSP呼出)

●データベース[Mysql]   ---------------------
menu_m  (メニューマスタ)
drink   (ドリンクテーブル)
food    (フードテーブル)
user_m  (ユーザーマスタ)
review  (レビューテーブル)
</pre>
