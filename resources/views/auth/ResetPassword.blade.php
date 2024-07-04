<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title mb-0">Parola Sıfırlama</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('SetNewPassword/'.$token)}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="password" class="form-label">Yeni Parola</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <span style="color:red;">{{ $errors->first('password') }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Yeni Parola Tekrarı</label>
                                <input type="password" class="form-control" id="confirm_password"
                                    name="confirm_password" required>
                                <span style="color:red;">{{ $errors->first('confirm_password') }}</span>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Parolayı Sıfırla</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="text-decoration-none">Giriş sayfasına dön</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>