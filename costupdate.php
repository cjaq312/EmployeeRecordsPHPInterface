<?php
$cost=$_POST['cost'];
$size=sizeof($cost);
$id=$_POST['id'];
$size1=sizeof($id);
include("connection.php");
for($i=0;$i<$size;$i++)
{
mysql_query("update item set cost=\"".$cost[$i]."\" where id = \"".$id[$i]."\"");

}
?>