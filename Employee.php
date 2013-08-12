<html>
<body>
<?php 
mysql_connect (localhost, username, password);
mysql_select_db (dbname);
if ($User == "")
{$User = '%';}
if ($FName == "")
{$FName = '%';}
if ($Ssn == "")
{$Ssn = '%';}
$result = mysql_query ("SELECT * FROM tablename
WHERE User LIKE '$User%'
AND FName LIKE '$FName%'
AND Ssn LIKE '$Ssn%'
");
if ($row = mysql_fetch_array($result)) {
do {
print $row["User"];
print (" ");
print $row["FName"];
print (" ");
print $row["Ssn"];
print ("<p>");
} while($row = mysql_fetch_array($result));
} else {print "Sorry, no records were found!";}
?>
</body>
</html>