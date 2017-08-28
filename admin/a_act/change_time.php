<?php 
    $con=mysql_connect("localhost","root","");
    if(!$con){
        die('Conld not connect :'.mysql_error());
        }
    mysql_query("set names utf8");
    mysql_select_db("vote",$con);
$vid=$_GET[vid];
$time=$_POST[change_time];
$query1="UPDATE `vote`.`votes` SET `v_time` = '$time' WHERE `votes`.`v_id` = '$vid'";
$result1=mysql_query($query1);
mysql_close();
?>
<!DOCTYPE html>
<html>
<meta http-equiv="refresh" content='0;url=/lxy/vote2.0/admin/add_a.php?vid=<?php echo $vid; ?>'> 
<head>
    <title></title>
</head>
<body>

</body>
</html>
