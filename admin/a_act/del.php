<?php 
    $con=mysql_connect("localhost","root","");
    if(!$con){
        die('Conld not connect :'.mysql_error());
        }
    mysql_query("set names utf8");
    mysql_select_db("vote",$con);
$id=$_POST[num];
$query2="SELECT `v_id` FROM `activities` WHERE `a_id` = '$id'";
$result2=mysql_query($query2);
$query1="DELETE FROM `vote`.`activities` WHERE `activities`.`a_id` = '$id'";
$result1=mysql_query($query1);
mysql_close();
$vid=mysql_fetch_array($result2)[0];
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
