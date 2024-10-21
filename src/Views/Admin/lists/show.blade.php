<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi tiết danh mục: {{ $list['tenDanhMuc'] }}</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h1 class="mb-3 mt-5">Chi tiết danh mục: {{ $list['tenDanhMuc'] }}</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Trường</th>
                <th>Giá trị</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($list as $field => $value)
                <tr>
                    <td>{{ $field }}</td>
                    <td>
                        @if ($field == 'kichHoat')
                            @if ($value == 1)
                                Kích hoạt
                            @else
                                Không kích hoạt
                            @endif
                        @else
                            {{ $value }}
                        @endif
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
