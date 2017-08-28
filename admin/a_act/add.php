<?php 
    $con=mysql_connect("localhost","root","");
    if(!$con){
        die('Conld not connect :'.mysql_error());
        }
    mysql_query("set names utf8");
    mysql_select_db("vote",$con);
$vid=$_GET[vid];
$name=$_POST[name];
$query1="INSERT INTO `vote`.`activities` (`v_id`, `a_name`, `a_quan`) VALUES ( '$vid', '$name', '0');";
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
