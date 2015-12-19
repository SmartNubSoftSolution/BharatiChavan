<!DOCTYPE  html>
<html lang="en">
<head>
	<meta charset="utf-8">
	 <title>CI Insert form</title>
	 </head>
<body>

<form method="post" action="<?php echo base_url();?>index.php/users/insert_user_db">

<table width="400" border="0" cellpadding="5">

<tr>

<th width="213" align="right" scope="row">Enter your id</th>

<td width="161"><input type="text" name="id" size="20" /></td>

</tr>




<tr>

<th width="213" align="right" scope="row">Enter your username</th>

<td width="161"><input type="text" name="name" size="20" /></td>

</tr>

<tr>

<th align="right" scope="row">Enter your email</th>

<td><input type="text" name="email" size="20" /></td>

</tr>

<tr>

<th align="right" scope="row">Enter your Mobile</th>

<td><input type="text" name="mobile" size="20" /></td>

</tr>


<tr>

<th align="right" scope="row">&nbsp;</th>

<td><input type="submit" name="submit" value="Send" /></td>

</tr>

</table>

</form>


</body>

</html>
