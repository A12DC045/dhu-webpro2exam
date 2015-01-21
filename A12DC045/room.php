<?php 
class room{
  public function roomname(){
    $dsn = "mysql:host=localhost;dbname=chatRoom;charset=utf8";
    try{
    $pdo = new PDO($dsn,'root');
    $pdo -> setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    

    $stmt = $pdo->query('SELECT * FROM rooms');
    if (!$stmt) {
      $info = $pdo->errorInfo();

      exit($info);
    }
    $row = $stmt->fetchall(PDO::FETCH_ASSOC);

    include("index.php");
    } catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
    }
  }
}
$room = new room();
$room->roomname();
 ?>