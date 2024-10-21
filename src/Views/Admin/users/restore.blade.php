@extends('layouts.master')

@section('title')
    Danh sách User đã xóa
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Danh sách User đã xóa</h1>
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
                                    <th>Avatar</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Ngày đăng ký</th>
                                    <th>Vai trò</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user)
                                    <tr>
                                        <td><?= $user['idNguoiDung'] ?></td>
                                        <td>
                                            <img src="{{ asset($user['hinhAnh']) }}" alt="" width="150px">
                                        </td>
                                        <td><?= $user['tenDangNhap'] ?></td>
                                        <td><?= $user['soDienThoai'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= $user['ngayDangKy'] ?></td>
                                        <td>
                                            <?php
                                            if ($user['vaiTro'] == 0) {
                                                echo 'Admin';
                                            } elseif ($user['vaiTro'] == 1) {
                                                echo 'Tác giả';
                                            } elseif ($user['vaiTro'] == 2) {
                                                echo 'Người dùng';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <form
                                                action="{{ url('admin/users/' . $user['idNguoiDung'] . '/update_restore') }}" method="POST">
                                                <button class="btn btn-success" type="submit"
                                                    onclick="return confirm('Chắc chắn muốn khôi phục?')">Khôi phục</button>
                                            </form>



                                        </td>
                                    </tr>
                                @endforeach
                                <a href="{{ url('admin/users') }}">Quay lại</a>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
