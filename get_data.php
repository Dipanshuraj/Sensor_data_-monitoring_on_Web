
<?php
class gd{
 public $link='';
 function __construct($p,$z,$t){
  $this->connect();
  $this->storeInDB($p,$z,$t);
  
 }
 
 function connect(){
  $this->link = mysqli_connect('HostName here','UserName here','Password here') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'DataBase_Name here') or die('Cannot select the DB');
 }
 
 function storeInDB($p,$z,$t){
     $d= date("y/m/d H:i:sa");
     
     $f = (int)$t;
     switch ($f) {
  case 1:
    $t="Normal";
    break;
  case 2:
    $t="Open";
    break;
  case 3:
    $t="Short";
    break;
  case 4:
    $t="Fire";
    break;
  default:
    echo "Type is out of RANGE";}


     
  $query = "insert into Table_Name set panel_id='".$p."', zone='".$z."',type='".$t."',date='".$d."'     ";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}
if($_GET['p'] != '' and  $_GET['z'] != '' and $_GET['t'] !=''){
 $gd=new gd($_GET['p'],$_GET['z'],$_GET['t']);
 echo "InDb";
}


?>