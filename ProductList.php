<html>
<body>
<?php 
mysql_connect (localhost, username, password);
mysql_select_db (dbname);
if ($Id == "")
{$Id = '%';}
if ($ProductName == "")
{$ProductName = '%';}
if ($AmountNo == "")
{$AmountNo = '%';}
$result = mysql_query ("SELECT * FROM tablename
WHERE Id LIKE '$Id%'
AND ProductName LIKE '$ProductName%'
");
if ($row = mysql_fetch_array($result)) {
do {
print $row["Id"];
print (" ");
print $row["ProductName"];
print (" ");
print $row["AmountNo"];
print ("<p>");
} while($row = mysql_fetch_array($result));
} else {print "Sorry, no records were found!";}
?>
</body>
</html>