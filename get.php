<?php
/*根据客户端提交的菜品的序号，返回所对应的菜品*/
header('Content-Type:application/json');
$output=[];

$conn = mysqli_connect('127.0.0.1','root','','tiger');//连接数据库
$sql='SET NAMES utf8';
mysqli_query($conn,$sql);
$sql="SELECT num,score FROM data";
$result=mysqli_query($conn,$sql);
while(($row=mysqli_fetch_assoc($result))!==NULL){
    $output[]=$row;
}

echo json_encode($output);
?>