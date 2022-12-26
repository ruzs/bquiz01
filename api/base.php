<?php
session_start();
date_default_timezone_set("Asia/Taipei");

class DB{
  protected $dsn="mysql:host=localhost;charset=utf8;dbname=db13";
  protected $table="";
  protected $pdo;
  public function __construct($table){
    $this->table=$table;
    $this->pdo=new PDO($this->dsn,'root','');
  }
  public function find($id){
    $sql="select * from $this->table ";

    if(is_array($id)){
      $tmp=$this->arrayToSqlArray($id);
      $sql =$sql. " where " .join(" && ",$tmp);
    }else{
      $sql = $sql . " where `id`='$id'";
    }
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
  }

  public function all(...$arg){
    $sql="select * from $this->table ";
    if(isset($arg[0])){
      if(is_array($arg[0])){
        $tmp=$this->arrayToSqlArray($arg[0]);
        $sql =$sql. " where " .join(" && ",$tmp);
      }else{
        $sql = $sql . $arg[0];
      }
    }
    if(isset($arg[1])){
      $sql = $sql . $arg[1];
    }
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

  }
  public function save($array){
    if (isset($array['id'])){
      //更新
      $id=$array['id'];
      unset($array['id']);
      $tmp=$this->arrayToSqlArray($array);
      $sql="update $this->table set ".join(",",$tmp)." where `id`='$id'";
    }else{
      //新增
      $cols=array_keys($array);
      $sql="INSERT INTO $this->table (`".join("`,`",$cols)."`) values('".join("','",$array) ."' )";
    }
    echo $sql;
    $this->pdo->exec($sql);
  }
  public function del($id){
    $sql="delete from $this->table ";
    if(is_array($id)){
      $tmp=$this->arrayToSqlArray($id);
      $sql = $sql . " where " .join(" && ",$tmp);
    }else{
      $sql = $sql . " where `id`='$id'";
    }
    return $this->pdo->exec($sql);
  }
  public function sum(){}
  public function count(){}
  public function max(){}
  public function min(){}
  public function avg(){}
  private function arrayToSqlArray($array){
    foreach($array as $key =>$value){
      $tmp[]="`$key`='$value'";
    }
    return $tmp;
  }
}
function dd($array){
  echo "<pre>";
  print_r($array);
  echo "</pre>";
}
function to($location){
  header("location:$location");
}
function q($sql){
  global $pdo;
  echo $sql;
  return $pdo->query($sql)->fetchAll();
}

$db=new DB('bottom');
$bot=$db->find(1);
print_r($bot);
echo "<hr>";
$db=new DB('bottom');
$bot=$db->all();
print_r($bot);
echo "<hr>";
// $db=new DB('bottom');
// $bot=$db->del(2);
// print_r($bot);
// print_r($db->all());
// echo "<hr>";
$row=$db->find(3);
print_r($row);

$row['bottom']="bbb";
print_r($row);
$db->save($row);
echo "<hr>";
?>