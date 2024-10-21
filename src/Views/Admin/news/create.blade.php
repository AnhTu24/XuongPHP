<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm tin tức</title>

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

        .ck-editor__editable[role="textbox"] {
            /* Editing area */
            min-height: 20rem;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Thêm tin tức</h1>
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

                <form action="{{ url('admin/news/store') }}" enctype="multipart/form-data" method="POST">

                    <div class="mb-3">
                        <label for="idTinTuc" class="form-label">ID</label>
                        <input readonly type="text" class="form-control" id="idDanhMuc"
                            placeholder="Enter -AUTO_INCREMENT-" value="-AUTO_INCREMENT-" name= "idDanhMuc">
                    </div>

                    <div class="mb-3">
                        <label for="moTa" class="form-label">Danh mục:</label>
                        <select name="idDanhMuc" id="idDanhMuc" class="form-select">
                            <option value="">-None-</option>
                            @foreach ($lists as $list)
                                <option value="{{$list['idDanhMuc']}}">{{$list['tenDanhMuc']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tieuDe" class="form-label">Tiêu đề:</label>
                        <input type="text" class="form-control" id="tieuDe" placeholder="Nhập tiêu đề"
                            name= "tieuDe">
                    </div>

                    <div class="mb-3">
                        <label for="moTa" class="form-label">Mô tả:</label>
                        <input type="text" class="form-control" id="moTa" placeholder="Nhập mô tả"
                            name= "moTa">
                    </div>

                    <div class="mb-3">
                        <label for="noiDung" class="form-label">Nội dung:</label>
                        <textarea name="noiDung" id="editor"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="moTa" class="form-label">Hình ảnh:</label>
                        <input type="file" class="form-control" id="hinhAnh" name= "hinhAnh">
                    </div>


                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <a href="{{ asset('admin/lists') }}" class="active m-5">Trở về</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>
