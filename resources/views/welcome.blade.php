<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Ini title</title>
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <form action="{{url('save')}}" method="POST" enctype="multipart/form-data">
                        <div class="card-body shadow">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="name" placeholder="Masukkan name" value="sendi"> <br>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Masukkan email" value="sendi@sendi.com {{rand(1,100)}}"> <br>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="password" placeholder="Masukkan password" value="111111"> <br>
                            </div>
                            <div class="form-group">
                                <!-- multiple file -->
                                <input type="file" class="form-control" name="file_photo[]" multiple placeholder="Masukkan poto"> <br> 
                                <!-- single file -->
                                <!-- <input type="file" name="file_photo" placeholder="Masukkan poto"> <br> -->
                            </div>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>