<?php
/*���ݿͻ����ύ�Ĳ�Ʒ����ţ���������Ӧ�Ĳ�Ʒ*/
header('Content-Type:application/json');
$output=[];

$conn = mysqli_connect('127.0.0.1','root','','tiger');//�������ݿ�
$sql='SET NAMES utf8';
mysqli_query($conn,$sql);
$sql="SELECT num,score FROM data";
$result=mysqli_query($conn,$sql);
while(($row=mysqli_fetch_assoc($result))!==NULL){
    $output[]=$row;
}

echo json_encode($output);
?>