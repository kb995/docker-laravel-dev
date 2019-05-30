<?php
require_once('login_process.php');

$site_title = 'ログイン';
$css_file_title = $js_file_title = 'login';
require_once('head.php');
?>

<body>
<?php require_once('header.php'); ?>
  <div class="form_container">
    <h2 class="page_title dq">ログイン</h2>


    <?php if (isset($flash_messages)): ?>
      <?php foreach ((array)$flash_messages as $message): ?>
        <p class ="flash_message <?php echo $flash_type ?>"><?php echo $message?></p>
      <?php endforeach ?>
    <?php endif ?>

    <div class="form_inner">
      <span class="flash_cursor">｝</span>
      <form action="#" method="post">
        <input id="email" type="email" name="email" placeholder="メールアドレス">
        <input id="password" type="password" name="password" placeholder="パスワード"><br>
        <label id="pass_save" for="checkbox">
          <input id="checkbox" type="checkbox" name="pass_save">ログインを維持する
        </label><br>
        <input id="login_btn" class="btn dq" type="submit" name="" value="ログイン">
        <a href="signup_form.php" class="signup">新規登録はこちら</a>
      </form>
    </div>
  </div>
<?php require_once('footer.php'); ?>
