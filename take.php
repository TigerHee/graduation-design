<?php
  header('Content-Type: application/json');
  $output = [];

	$num = $_POST['num'];
	$score = $_POST['score'];

  if(empty($num) || empty($score)){
      echo "[]"; //���ͻ����ύ��Ϣ���㣬�򷵻�һ�������飬
      return;    //���˳���ǰҳ���ִ��
  }

  //�������ݿ�
  $conn = mysqli_connect('127.0.0.1','root','','tiger');
  $sql = 'SET NAMES utf8';
  mysqli_query($conn, $sql);
  $sql = "INSERT INTO data VALUES('$num','$score')";
  $result = mysqli_query($conn, $sql);

  $arr = [];
  if($result){    //INSERT���ִ�гɹ�
      $arr['msg'] = 'succ';
      $arr['did'] = mysqli_insert_id($conn); //��ȡ���ִ�е�һ��INSERT������ɵ���������
  }else{          //INSERT���ִ��ʧ��
      $arr['msg'] = 'err';
      $arr['reason'] = "SQL���ִ��ʧ�ܣ�$sql";
  }
  $output[] = $arr;

  echo json_encode($output);

?>