@extends('layouts.master')

@section('title')
    Danh sách tin tức đã xóa
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Danh sách tin tức đã xóa</h1>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">

                   
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
                                    <th>Mô tả</th>
                                    <th>Ngày đăng</th>
                                    <th>Trạng thái</th>
                                    <th>Kích hoạt</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($news as $new)
                                    <tr>
                                        <td><?= $new['idTinTuc'] ?></td>
                                        <td>
                                            <img src="{{ show_uploads($new['hinhAnh']) }}" alt="" width="150px">
                                        </td>
                                        <td><?= $new['tenDanhMuc'] ?></td>
                                        <td><?= $new['tieuDe'] ?></td>
                                        <td><?= $new['moTa'] ?></td>
                                        <td><?= $new['ngayDang'] ?></td>

                                        <td>
                                            @php
                                                if ($new['trangThaiId'] == 0) {
                                                    echo 'Tạm ẩn';
                                                } elseif ($new['trangThaiId'] == 1) {
                                                    echo 'Hiển thị';
                                                }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                                if ($new['kichHoat'] == 0) {
                                                    echo 'Chưa kích hoạt';
                                                } elseif ($new['kichHoat'] == 1) {
                                                    echo 'Đang kích hoạt';
                                                }
                                            @endphp
                                        </td>
                                        <td>

                                            <form action="{{ url('admin/news/' . $new['idTinTuc'] . '/update_restore') }}"
                                                method="POST">
                                                <button class="btn btn-success" type="submit"
                                                    onclick="return confirm('Có muốn khôi phục lại bài viết?')">Khôi phục</button>
                                            </form>

                                            <form action="{{ url('admin/news/' . $new['idTinTuc'] . '/delete_new') }}"
                                                method="POST">
                                                <button class="btn btn-danger" type="submit"
                                                    onclick="return confirm('Chắc chắn muốn xóa?')">Xóa</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                    <a class="mb-3" href="{{ url('admin/news/') }}">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
