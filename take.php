<?php
  header('Content-Type: application/json');
  $output = [];

	$num = $_POST['num'];
	$score = $_POST['score'];

  if(empty($num) || empty($score)){
      echo "[]"; //若客户端提交信息不足，则返回一个空数组，
      return;    //并退出当前页面的执行
  }

  //访问数据库
  $conn = mysqli_connect('127.0.0.1','root','','tiger');
  $sql = 'SET NAMES utf8';
  mysqli_query($conn, $sql);
  $sql = "INSERT INTO data VALUES('$num','$score')";
  $result = mysqli_query($conn, $sql);

  $arr = [];
  if($result){    //INSERT语句执行成功
      $arr['msg'] = 'succ';
      $arr['did'] = mysqli_insert_id($conn); //获取最近执行的一条INSERT语句生成的自增主键
  }else{          //INSERT语句执行失败
      $arr['msg'] = 'err';
      $arr['reason'] = "SQL语句执行失败：$sql";
  }
  $output[] = $arr;

  echo json_encode($output);

?>