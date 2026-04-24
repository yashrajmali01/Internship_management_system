<?php

class FB{
    public $link='';

    function __construct($category)
    {
        $this-> connect();
        $this->storeInDB($category);
        
    }

    function connect()
    {
        $this->link= mysqli_connect('localhost','root','') or die('select the db');
        mysqli_select_db($this->link,'sandesh_ecs') or die('cannot select db');
        
    }

    function storeInDB($category)
    {
        $query="insert into category(category) values('$category')";

        $result=mysqli_query($this->link,$query) or die('errant query'.$query);

        echo "success";

    }
}
if($_GET['category']!='')
{
$FB =new FB($_GET['category']);
}
?>