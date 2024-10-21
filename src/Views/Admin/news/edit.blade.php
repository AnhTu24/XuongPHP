<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cập nhật danh mục: {{ $new['tieuDe'] }}</title>

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
                <h1>Cập nhật danh mục: {{ $new['tieuDe'] }}</h1>
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

                <form action="{{ url("admin/news/{$new['idTinTuc']}/update") }}" enctype="multipart/form-data"
                    method="POST">

                    <div class="mb-3">
                        <label for="idTinTuc" class="form-label">ID</label>
                        <input readonly type="text" class="form-control" id="idDanhMuc"
                            placeholder="Enter -AUTO_INCREMENT-" value="{{ $new['idTinTuc'] }}" name= "idDanhMuc">
                    </div>

                    <div class="mb-3">
                        <label for="moTa" class="form-label">Danh mục:</label>
                        <select name="danhMucId" id="danhMucId" class="form-select">
                            <option value="">-None-</option>
                            @foreach ($lists as $list)
                                <option value="{{ $list['idDanhMuc'] }}"
                                    {{ $list['idDanhMuc'] == $checkDanhMuc ? 'selected' : '' }}>
                                    {{ $list['tenDanhMuc'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tenDanhMuc" class="form-label">Tiêu đề:</label>
                        <input type="text" class="form-control" id="tenDanhMuc" placeholder="Enter tenDanhMuc"
                            value="{{ $new['tieuDe'] }}" name= "tieuDe">
                    </div>

                    <div class="mb-3">
                        <label for="tenDanhMuc" class="form-label">Mô tả:</label>
                        <input type="text" class="form-control" id="moTa" placeholder="Enter moTa"
                            value="{{ $new['moTa'] }}" name= "moTa">
                    </div>

                    <div class="mb-3">
                        <label for="noiDung" class="form-label">Nội dung:</label>
                        <textarea name="noiDung" id="editor"></textarea>
                    </div>
                    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#editor'))
                            .then(editor => {
                                editor.setData(`{{ $new['noiDung'] }}`);
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    </script>

                    <div class="mb-3">
                        <label for="moTa" class="form-label">Hình ảnh:</label>
                        <img id="hinhAnh" src="{{ show_uploads($new['hinhAnh']) }}" alt=" " width="250px"
                            height="200px">
                        <input type="file" class="form-control" id="hinhAnh" name= "hinhAnh"
                            value="{{ $new['hinhAnh'] }}">
                    </div>


                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{ asset('admin/lists') }}" class="active m-5">Trở về</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
