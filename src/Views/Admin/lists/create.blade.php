<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm danh mục</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card-header h1 {
            color: #ff6f6f;
        }

        .form-control.short-input {
            max-width: 300px;
        }

        .custom-select {
            border: 1.5px solid;
            border-image-slice: 1;
            border-image-source: linear-gradient(to right, purple, pink, rgb(64, 37, 67));
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Thêm danh mục</h1>
            </div>
            <div class="card-body">
                @if (!empty($_SESSION['errors']))
                    <div class="alert alert-warning">
                        <ul>
                            @foreach ($_SESSION['errors'] as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                        @php
                            unset($_SESSION['errors']);
                        @endphp
                    </div>
                @endif

                @if (isset($_SESSION['status']) && $_SESSION['status'])
                    <div class="alert alert-success">
                        {{ $_SESSION['msg'] }}
                    </div>

                    @php
                        unset($_SESSION['status']);
                        unset($_SESSION['msg']);
                    @endphp
                @endif

                <form action="{{ url("admin/lists/store") }}" enctype="multipart/form-data"
                    method="POST">

                    <div class="mb-3">
                        <label for="idDanhMuc" class="form-label">ID</label>
                        <input readonly type="text" class="form-control" id="idDanhMuc"
                            placeholder="Enter -AUTO_INCREMENT-" value="-AUTO_INCREMENT-" name= "idDanhMuc">
                    </div>

                    <div class="mb-3">
                        <label for="tenDanhMuc" class="form-label">Tên danh mục:</label>
                        <input type="text" class="form-control" id="tenDanhMuc"
                            placeholder="Nhập tên danh mục" name= "tenDanhMuc">
                    </div>

                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <a href="{{ asset('admin/lists')}}" class="active m-5">Trở về</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
