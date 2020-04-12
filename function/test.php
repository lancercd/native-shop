
<?php

require_once('../function/function.php');
$p_menus = S('menus')->field('id, icon, menu_name, menu_link, target')->where('is_show=1 and pid=0')->order('sort ASC')->all();

$c_menus = S('menus')->field('pid, icon, menu_name, menu_link')->where('is_show=1 and pid!=0')->order('sort ASC')->all();

tidyMenus($p_menus, $c_menus);

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>




    <?php foreach ($p_menus as $p) {  ?>

    <?php echo $p['target']; ?>
        <?php echo $p['menu_link']; ?>
            <?php echo $p['icon']; ?>


        <?php if(isset($p['ch'])){ ?>


            <?php foreach ($p['ch'] as $c) { ?>
            <?php echo $c['menu_link']; ?><?php echo $c['menu_name']; ?>
            <?php }  ?>


        <?php } ?>

        <?php echo '<br>'; ?>

    <?php } ?>







</body>
</html>
