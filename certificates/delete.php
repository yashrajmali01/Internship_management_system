
<?php
class FB
{
public $link='';

function __construct($id)
   {
        $this->connect();
        $this->storeInDB($id);
   }

function connect()
   {
        $this->link = mysqli_connect("182.50.133.77", "prabudh", "Prabudh@123") or die('Cannot connect to the DB');
        mysqli_select_db($this->link,'prabudhbharat') or die('Cannot select the DB');
   }

function storeInDB($id)
   {
    $query = "DELETE FROM sandesh1 WHERE Id = " . $id;
    $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
    echo 'Deleted Successfully';
   }

}
   if( $_GET['id'] != '' )
     {
      $FB=new FB($_GET['id']);
     }
?>
