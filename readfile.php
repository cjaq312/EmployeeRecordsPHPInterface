<?php

//-----------Function for extracting data from files and transfering them to database--------
function general($filename,$attrib,$row)
{

//----------To assign the contents in file to a variable as a string-------------
$f=file_get_contents("$filename");
$s=$f;

//----------Pattern search to exclude (' and , and space) and return only the values in text------------
$lines = preg_split('/[\'|\,|\s]+/', $s);


$k=0;
if($filename=="item.txt")
{
for($i=0;$i<=$row;$i++)
{
for($j=0;$j<=$attrib;$j++)
{
$a[$i][$j]=$lines[$k+$j];
$sum=$k+$j;
}
$k=$sum+1;
}
return($a);
}

//---------------For the rest of the text files that support my search pattern-------------------
else
{
for($i=1;$i<=$row;$i++)
{
for($j=1;$j<=$attrib;$j++)
{
$a[$i][$j]=$lines[$k+$j];
$sum=$k+$j;

//--------To convert date in to format that MYSQL supports------------

if($j==10 && $filename=="employee.txt")
{

//--------Pattern search to explode date format in text file at (-) and retrieve the data needed (day,month and year) and put it together as (year-month-day)------------

$date = preg_split('/[\-|\s]+/', $a[$i][$j]);
if($date[1]=="JAN")
$date[1]=1;
elseif($date[1]=="FEB")
$date[1]=2;
elseif($date[1]=="MAR")
$date[1]=3;
elseif($date[1]=="APR")
$date[1]=4;
elseif($date[1]=="MAY")
$date[1]=5;
elseif($date[1]=="JUN")
$date[1]=6;
elseif($date[1]=="JUL")
$date[1]=7;
elseif($date[1]=="AUG")
$date[1]=8;
elseif($date[1]=="SEP")
$date[1]=9;
elseif($date[1]=="OCT")
$date[1]=10;
elseif($date[1]=="NOV")
$date[1]=11;
elseif($date[1]=="DEC")
$date[1]=12;

$a[$i][$j]="$date[2]-$date[1]-$date[0]";
}
}
$k=$sum;
}
return($a);
}
}
//--------------------defining parameters for the retrieval of data from text files---------
$filename="employee.txt";
$col=11;
$row=10;
$v=general("$filename","$col","$row");

$filename="login.txt";
$col=3;
$row=10;
$x=general("$filename","$col","$row");


$filename="item.txt";
$col=4;
$row=9;
$y=general("$filename","$col","$row");

include("connection.php");

for($u=1;$u<=10;$u++)
{
$r="insert into employee values(\"".$v[$u][1]."\",\"".$v[$u][2]."\",\"".$v[$u][3]."\",\"".$v[$u][4]."\",\"".$v[$u][5]."\",\"".$v[$u][6].",".$v[$u][7].",".$v[$u][8].",".$v[$u][9]."\",\"".$v[$u][10]."\",\"NULL\")";
mysql_query("$r");
}

for($u=1;$u<=10;$u++)
{
$r="insert into login(user,password,status) values(\"".$x[$u][1]."\",\"".$x[$u][2]."\",\"".$x[$u][3]."\")";
echo "insert into login(user,password,status) values(\"".$x[$u][1]."\",\"".$x[$u][2]."\",\"".$x[$u][3]."\")";
mysql_query("$r");
}

for($u=0;$u<10;$u++)
{
$r="insert into item values(\"".$y[$u][0]."\",\"".$y[$u][1]."\",\"".$y[$u][2]."\",\"".$y[$u][3]."\",\"".$y[$u][4]."\")";
mysql_query("$r");
}

echo "Datas have been sucessfully uploaded in to the database";
?>