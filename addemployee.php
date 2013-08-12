<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/index.css" />
			
	</head>

	<body id="backgroundbody">
		<div id="outerdiv">
			<div id = "headerdiv">
				SHOP n SHOP
			</div>
			<div id="left_panel">
				<div id="left_panel_row">

					<a href="addemployee.php">Add Employee</a>
					<br/>
					<br/>
					<a href="additem.php">Add Item</a>
					<br/>
					<br/>
					<a href="SearchEmp.html">Search Employee</a>
					<br/>
					<br/>
					<a href="SearchItem.html">Search Item</a>
					<br/>
					<br/>
					<a href="Records.html">PreRecords</a>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<a href="logout.php">LogOut</a>

			  </div>
			</div>
			
			<div id="right_panel">
			
<?php
echo"
<form method='post' action='register.php'>
<table>
	<tr>
		<td>
			Username:
		</td>
		<td>
			<input type='text' size='10' maximam='20' name='user'/>
		</td>
	</tr>
	<tr>
		<td>
			Password:
		</td>
		<td>
			<input type='password' size='10' maximam='20' name='pass'/>
		</td>
	</tr>
	<tr>
		<td>
			SSN:
		</td>
		<td>
			<input type='text' size='10' maximam='20' name='ssn'/>
		</td>
	</tr>
	<tr>
		<td>
			Firstname:
		</td>
		<td>
			<input type='text' size='10' maximam='20' name='first'/>
		</td>
	</tr>
	<tr>
		<td>
			Lastname:
		</td>
		<td>
			<input type='text' size='10' maximam='20' name='second'/>
		</td>
	</tr>
	<tr>
		<td>
			Age:
		</td>
		<td>
			<input type='text' size='10' maximam='20' name='age'/>
		</td>
	</tr>
	<tr>
		<td>
			Address:
		</td>
		<td>
			<input type='text' size='10' maximam='20' name='address'/>
		</td>
	</tr>
</table>		
<input type='submit' value='Add'/>
</form>";
		
?>

</div>
		</div>
	</body>
</html>