<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Geliştirilmiş E-posta Şablonu</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css"
        rel="stylesheet">

</head>

<body>
    <div class="container mt-5 col-md-12">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card card-custom mb-3">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0"><i class="bi bi-envelope-fill me-2"></i>{{ $save->subject }}</h5>
                    </div>
                </div>

                <div class="card card-custom mb-3">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-person-fill me-2"></i>Kimden:</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-1"><strong>Gönderen Adı ve Soyadı</strong></p>
                        <p class="text-muted">Gönderen E-posta Adresi</p>
                    </div>
                </div>

                <div class="card card-custom mb-3">
                    <div class="card-header bg-info text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-info-circle-fill me-2"></i>Bilgi:</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-1"><strong>{{ $save->cc_email }}ı</strong></p>
                        <p class="text-muted">{{ $save->created_at }}</p>
                    </div>
                </div>

                <div class="card card-custom mb-3">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="card-title mb-0"><i class="bi bi-file-text-fill me-2"></i>İçerik:</h5>
                    </div>
                    <div class="card-body">
                        <p>{{ $save->descriptions }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>

</html>