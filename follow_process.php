<?php
require_once('config.php');
require_once('auth.php');

if(!empty($_POST['follow'])){
  debug('お気に入りのPOST送信があります');
  $current_user = get_user($_SESSION['user_id']);
  $user_id = $_POST['user_id'];

  // 自分をフォローできないように
  if ( $current_user['id'] !== $user_id){
    // すでに登録されているか確認して登録、削除のSQL切り替え
    if(check_follow($current_user['id'],$user_id)){
      $action = '解除';
      $flash_type = 'error';
      $sql1 ="DELETE
              FROM follows
              WHERE :follow_id = follow_id AND :followed_id = followed_id";
      $sql2 ="DELETE
              FROM followers
              WHERE :follow_id = follow_id AND :followed_id = followed_id";
    }else{
      $action = '登録';
      $flash_type = 'sucsess';
      $sql1 ="INSERT INTO follows(follow_id,followed_id)
              VALUES(:follow_id,:followed_id)";
      $sql2 ="INSERT INTO followers(follow_id,followed_id)
              VALUES(:follow_id,:followed_id)";

    }
    try {
      $dbh = dbConnect();
      $dbh->beginTransaction();
      //followsテーブル
      $stmt1 = $dbh->prepare($sql1);
      $stmt1->execute(array(':follow_id' => $current_user['id'] , ':followed_id' => $user_id));
      //followersテーブル
      $stmt2 = $dbh->prepare($sql2);
      $stmt2->execute(array(':follow_id' => $current_user['id'] , ':followed_id' => $user_id));
      // 全てのクエリが成功していたら結果を保存する
      if (query_result($stmt1) && query_result($stmt2)) {
        $dbh->commit();
        debug("フォロー${action}成功");

        $return = array('action' => $action,
                        'profile_count' => current(get_user_count('follow',$current_user['id'])) ,
                        'user_count' => current(get_user_count('follower',$user_id)));
        echo json_encode($return);

      }
    } catch (\Exception $e) {
      $dbh->rollback();
      debug("フォロー${action}失敗");
      error_log('エラー発生:' . $e->getMessage());
      set_flash('error',ERR_MSG1);
      echo json_encode("error");
    }
  }
}
debug('------------------------------');
