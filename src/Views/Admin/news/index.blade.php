@extends('layouts.master')

@section('title')
    Danh sách tin tức
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Danh sách tin tức</h1>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">

                    <a class="btn btn-primary mb-5" href="{{ url('admin/news/create') }}">Thêm mới</a>

                    @if (isset($_SESSION['status']) && $_SESSION['status'])
                        <div class="alert alert-success">
                            {{ $_SESSION['msg'] }}
                        </div>

                        @php
                            unset($_SESSION['status']);
                            unset($_SESSION['msg']);
                        @endphp
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Hình ảnh</th>
                                    <th>Danh mục</th>
                                    <th>Tiêu đề</th>
                                    <th>Ngày đăng</th>
                                    <th>Trạng thái</th>
                                    <th>Kích hoạt</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($news as $new)
                                    <tr>
                                        <td>{{ $new['idTinTuc'] }}</td>
                                        <td>
                                            <img src="{{ show_uploads($new['hinhAnh']) }}" alt="" width="150px">
                                        </td>
                                        <td>{{ $new['tenDanhMuc'] }}</td>
                                        <td>{{ $new['tieuDe'] }}</td>
                                        <td>{{ $new['ngayDang'] }}</td>
                                        <td>
                                            @if ($new['trangThaiId'] == 0)
                                                Tạm ẩn
                                            @elseif ($new['trangThaiId'] == 1)
                                                Hiển thị
                                            @endif
                                        </td>
                                        <td>
                                            @if ($new['kichHoat'] == 0)
                                                Chưa kích hoạt
                                            @elseif ($new['kichHoat'] == 1)
                                                Đang kích hoạt
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ url('admin/news/' . $new['idTinTuc'] . '/show') }}"
                                                method="GET" style="display:inline-block;">
                                                <button class="btn btn-info" type="submit">Xem</button>
                                            </form>
                                            <form action="{{ url('admin/news/' . $new['idTinTuc'] . '/edit') }}"
                                                method="GET" style="display:inline-block;">
                                                <button class="btn btn-warning" type="submit">Sửa</button>
                                            </form>
                                            <form action="{{ url('admin/news/' . $new['idTinTuc'] . '/delete') }}"
                                                method="POST" style="display:inline-block;">

                                                <button class="btn btn-danger" type="submit"
                                                    onclick="return confirm('Chắc chắn muốn xóa?')">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <a class="mb-3" href="{{ url('admin/news/restore') }}">Xem mục đã xóa</a>
                    {{-- Phân trang --}}
                    <div class="col-12 text-center mt-5 flex">
                        <ul class="pagination justify-content-center">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center pagination-lg">
                                    {{-- Nút về trang đầu --}}
                                    <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                                        <a class="page-link" href="?page=1" aria-label="First">
                                            <span aria-hidden="true">&laquo;&laquo;</span>
                                        </a>
                                    </li>

                                    {{-- Nút về trang trước --}}
                                    @if ($currentPage > 1)
                                        <li class="page-item">
                                            <a class="page-link" href="?page={{ $currentPage - 1 }}" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Hiển thị số trang --}}
                                    @php
                                        $startPage = max(1, $currentPage - 1);
                                        $endPage = min($totalPage, $currentPage + 1);
                                    @endphp

                                    @for ($i = $startPage; $i <= $endPage; $i++)
                                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                            <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    {{-- Nút đến trang sau --}}
                                    @if ($currentPage < $totalPage)
                                        <li class="page-item">
                                            <a class="page-link" href="?page={{ $currentPage + 1 }}" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Nút đến trang cuối --}}
                                    <li class="page-item {{ $currentPage == $totalPage ? 'disabled' : '' }}">
                                        <a class="page-link" href="?page={{ $totalPage }}" aria-label="Last">
                                            <span aria-hidden="true">&raquo;&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .flex {
        display: flex;

    }
</style>
