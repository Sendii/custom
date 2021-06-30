<!DOCTYPE html>
<html>
<head>
	<title>Ini title</title>
</head>
<body>
	<form action="{{url('save')}}" method="POST" enctype="multipart/form-data">
		@csrf
		<input type="text" name="name" placeholder="Masukkan name" value="sendi"> <br>
		<input type="text" name="email" placeholder="Masukkan email" value="sendi@sendi.com {{rand(1,100)}}"> <br>
		<input type="text" name="password" placeholder="Masukkan password" value="111111"> <br>
		<!-- multiple file -->
		<input type="file" name="file_photo[]" multiple placeholder="Masukkan poto"> <br> 
		<!-- single file -->
		<!-- <input type="file" name="file_photo" placeholder="Masukkan poto"> <br> -->
		<button type="submit">Kirim</button>
	</form>
</body>
</html>