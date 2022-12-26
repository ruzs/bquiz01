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
  public function save(){}
  public function del(){}
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


function dd(){

}
function to(){

}
function q(){

}
$db=new DB('bottom');
$bot=$db->find(1);
print_r($bot);
echo "<hr>";
$db=new DB('bottom');
$bot=$db->all();
print_r($bot);
echo "<hr>";
?>