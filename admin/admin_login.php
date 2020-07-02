<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>登录</title>

 <link rel="stylesheet" href="css/login.css">
 <link rel="stylesheet" href="../public/css/model.css">
 <link rel="stylesheet" href="../public/css/info-form.css">
 <link rel="stylesheet" href="../public/icon-font/iconfont.css">
</head>
<body>

<div id="container">

   <div class="log">
       admin
   </div>
   <form name="form1">
       <div class="input">
           账号: <input name="account" type="text" id="account" placeholder="account" value="1311282756">
       </div>
       <div class="input">
       密码: <input name="pwd" type="password" id="pwd" placeholder="Password" value="1311282756wwo">
       </div>
       <div class="sub-btn">
           <input name="Submit" type="submit" value="登陆" id="sub-btn">
       </div>
   </form>

   <div class="register">
       <!-- <a href="register.php">没有账号？ 申请一个</a> -->
   </div>
</div>


</body>
<script type="module" src="js/login.js"></script>
</html>
