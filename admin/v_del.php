<?php session_start();

include "../actions.php"; ?>
<html>
<script src="../jquery.js"></script>
<link rel="stylesheet" type="text/css" href="../style.css">
<style>
.add_v{
    display: none;
    margin: 10px;
    font-size: 20px;
    padding: 10px 10px 10px 10px;
}
.add_v_hide{
    display: none;
    height:30px;
    position:relative;
    top:45px;
}
.block {
    display: block;
    height:50px;
    width:130px;
    float:left;
    margin: 50px 0px 50px 50px;
    font-size: 10px;
    padding: 40px 0px 0px 30px;
}
.row{
    height:200px;
    width:840px;
}
.del{
    display: block;
    height:19px;
    font-size: 10px;
    width:32px;
    float:left;
    margin:0px;
    padding:90px 0px 0px 0px;
}
</style>
<head>
            <?php 
            $del = '<a class="del"href="v_del.php?aid=\'+x+\'">删除</a>';
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $aid=$_GET[aid];
                $con=mysql_connect("localhost","root","");
                if(!$con){
                    die('Conld not connect :'.mysql_error());
                    }
                mysql_query("set names utf8");
                mysql_select_db("vote",$con);
                mysql_query("DELETE FROM `vote`.`votes` WHERE `votes`.`v_id` = '$aid'");//删投票类型
                mysql_query("DELETE FROM `activities` WHERE `v_id` = $aid");//删投票项
            }
            ?>
<script type="text/javascript">
$.ajax({
    url:"../choose/get_votes.php",
    datatype:"json",
    type:"GET",
    success: function(data){
        var inner="<div class='row'>";
        var n=0;
        data=eval("("+data+")");
        for (x in data){ 
            inner+='<a class="block" href="../voting/index.php?vid='+x+'">投票内容:'+data[x]+'</a><?php if($_SESSION[type]==1){echo $del; }?> '; 
            n+=1;
            if(n%3==0)
                inner+='</div><div class="row">';
        }
        inner+='</div>';
        $('.items').html(inner);
    }
});
$(document).ready(function(){
    $(".add_v").click(function(){
        $(".add_v_hide").slideToggle("slow");
    });
    $("#Btn").click(function(){
        $(".add_v").slideToggle("slow");
    });
    $("#Btn").click(function(){
        $(".del_v").slideToggle("slow");
    });
});
</script>
</head>

<body>
    <div class="container">
        <div class="background"> <?php 
        welcome();
        ?>
            <div class="title">
                标题
            </div> <?php suoyin(); ?>
                <div class="content">
                <div class="items"></div>
                <?php 
                if($_SESSION[type]==1){
                    echo "<div id='Btn'>管理</div><div class='add_v'>增加一个投票</div><div class='add_v_hide'><form action='../admin/add_v.php' method='get' name='add_v'>输入投票标题:<input type='text' name='add_v'><input type='submit'></form></div><a href='../admin/v_del.php' class='del_v'>删除一个投票</a>";
                }
                ?>
                </div>
                <div class="footer">
                QQ群:
                </div>
        </div>
    </div>
</body>

</html>
