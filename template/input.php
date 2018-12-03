<form action="register.php" method="post" enctype="multipart/form-data">

<table border="0">
<tr>
<td>UserName：<input type="text" name="username" value="" ></td>
</tr>
<tr>
<td>Password：<input type="password" name="password" value="" ></td>
</tr>
<tr>
	<td>Sex
		<input type="radio" name="sex" value="１" checked>Male
		<input type="radio" name="sex" value="２">Female
	</td>
<tr>

<tr>
	<td>hobby
      <input type="checkbox" name="hobby[]" value="0">Game
      <input type="checkbox" name="hobby[]" value="1">Soccer
      <input type="checkbox" name="hobby[]" value="2">Music
      <input type="checkbox" name="hobby[]" value="3">Swiming
      <input type="checkbox" name="hobby[]" value="4">Reading
      <input type="checkbox" name="hobby[]" value="5">Other
    </td>
</tr>
<tr>
	<td>Job
     	<select name="job">
		<option value="1">Engineer</option>
		<option value="2">Student</option>
		<option value="3">Pupil</option>
		<option value="4">Actor</option>
		</select>
    </td>
</tr>
<tr>
	<td>Avatar  <input type="file" name="up_file" id="fileToUpload" >
    </td>
</tr>


<tr>
<td><input type="submit" name="input" value="登録">
<input type="reset" value="リセット"></td>
</tr>

</table>

</form>
