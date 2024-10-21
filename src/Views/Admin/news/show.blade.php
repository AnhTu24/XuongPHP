<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi tiết bài viết: {{ $new['tieuDe'] }}</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h1 class="mb-3 mt-5">Chi tiết bài viết: {{ $new['tieuDe'] }}</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Trường</th>
                <th>Giá trị</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($new as $field => $value)
                <tr>
                    <td>{{ $field }}</td>

                    <td>
                        @if ($field == 'kichHoat')
                            @if ($value == 1)
                                Kích hoạt
                            @else
                                Không kích hoạt
                            @endif
                        @elseif ($field == 'hinhAnh')
                            <img src="{{ show_uploads($value) }}" width="150px">
                        @elseif ($field == 'trangThaiId')
                            @if ($value == 1)
                                Hiển thị
                            @else
                                Tạm ẩn
                            @endif
                        @else
                           {!! $value !!}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($field == 'trangThaiId = 1')
        <form action="{{ url('admin/news/' . $new['idTinTuc'] . '/none') }}" method="POST">
            @csrf
            <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn muốn ẩn bài viết này?')">
                Tạm ẩn
            </button>
        </form>
    @else 
        <form action="{{ url('admin/news/' . $new['idTinTuc'] . '/show') }}" method="POST">
            @csrf
            <button class="btn btn-success m-5" type="submit"
                onclick="return confirm('Bạn muốn hiển thị bài viết này?')">
                Hiển thị
            </button>
        </form>
   
    @endif



</body>

</html>
