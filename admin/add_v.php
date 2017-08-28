<?php
    $v_name=$_GET[add_v];
    $v_time=$_GET[time];
    echo "已经新建完成 正在跳转".$v_name;
    $con=mysql_connect("localhost","root","");
    if(!$con){
        die('Conld not connect :'.mysql_error());
        }
    mysql_query("set names utf8");
    mysql_select_db("vote",$con);
    mysql_query("INSERT INTO `vote`.`votes`  (`v_id`, `v_name`,`v_time`) VALUES (NULL, '$v_name','$v_time')");
    mysql_close();
    ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content='1;url= ../choose/choose.php '> 
</head>
<body>

</body>
</html>
