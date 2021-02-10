DROP PROCEDURE sp_review;
DELIMITER //
CREATE PROCEDURE sp_review( IN proc INT, 
                            IN menu_id VARCHAR(10), 
                            IN user_id VARCHAR(10), 
                            IN user_m VARCHAR(255), 
                            IN sex VARCHAR(1), 
                            IN age VARCHAR(3), 
                            IN review VARCHAR(255), 
                            IN evaluation VARCHAR(1), 
                            IN op_cd VARCHAR(10))

BEGIN
-- 取得件数格納用
DECLARE row_count INT;

IF proc = 1 THEN
  -- レビュー一覧表示
  SELECT
  	review.menu_id,
  	review.user_id,
  	user_m.user_name,
  	user_m.sex,
  	CASE
  	 WHEN user_m.sex = '1' THEN 'male'
  	 WHEN user_m.sex = '2' THEN 'female'
      END as sex_m,
  	user_m.age,
  	review.review,
  	review.evaluation
  FROM review
  LEFT JOIN user_m
  ON review.user_id = user_m.user_id
  AND review.menu_id = menu_id
  WHERE
  review.menu_id = menu_id;
ELSEIF proc = 2 THEN
  -- レビュー表示
  SELECT
  	review.menu_id,
  	review.user_id,
  	user_m.user_name,
  	user_m.sex,
  	CASE
  	 WHEN user_m.sex = '1' THEN 'male'
  	 WHEN user_m.sex = '2' THEN 'female'
      END as sex_m,
  	user_m.age,
  	review.review,
  	review.evaluation
  FROM review
  LEFT JOIN user_m
  ON review.user_id = user_m.user_id
  AND review.menu_id = menu_id
  WHERE
  review.menu_id = menu_id AND 
  review.user_id = user_id;
ELSEIF proc = 3 THEN
  -- ユーザー登録/更新
  -- レビュー登録/更新
  
  -- ユーザーマスタ 存在確認後, 登録/更新
  select count(*) from user_m where user_m.user_id = user_id INTO row_count;
  IF row_count = 0 THEN
  	INSERT INTO user_m (`user_id`, `user_name`, `sex`, `age`, `user_kbn`, `create_date`, `create_op_cd`, `update_date`, `update_op_cd`, `abolish_date`, `abolish_op_cd`) VALUES
  	(user_id, user_m, sex, age, '0', CURRENT_TIMESTAMP, op_cd, CURRENT_TIMESTAMP, op_cd, NULL, 'Umknown');
  ELSE
  	UPDATE user_m
  	    SET user_m.user_name = user_name, user_m.sex = sex, user_m.age = age, user_m.update_date = CURRENT_TIMESTAMP, user_m.update_op_cd = op_cd
  	    WHERE user_m.user_id = user_id;
  END IF;
  -- レビューマスタ 存在確認後, 登録/更新
  select count(*) from review where review.user_id = user_id and review.menu_id = menu_id INTO row_count;
  IF row_count = 0 THEN
  	INSERT INTO review (`menu_id`, `user_id`, `review`, `evaluation`, `create_date`, `create_op_cd`, `update_date`, `update_op_cd`, `abolish_date`, `abolish_op_cd`) VALUES
  	(menu_id, user_id, review, evaluation, CURRENT_TIMESTAMP, op_cd, CURRENT_TIMESTAMP, op_cd, NULL, 'Umknown');
  ELSE
  	UPDATE review
  	    SET review.review = review, review.evaluation = evaluation, review.update_date = CURRENT_TIMESTAMP, review.update_op_cd = op_cd
  	    WHERE review.user_id = user_id AND review.menu_id = menu_id;
  END IF;
ELSEIF proc = 4 THEN
	-- レビュー削除
	DELETE FROM review WHERE review.user_id = user_id AND review.menu_id = menu_id;
ELSE
  SELECT "input is else";
END IF;
END
//
DELIMITER ;