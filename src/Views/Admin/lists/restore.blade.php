@extends('layouts.master')

@section('title')
    Danh sách danh mục đã xóa
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Danh sách danh mục đã xóa</h1>
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
                                    <th>Tên danh mục</th>
                                    <th>Kích hoạt</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($lists as $list)
                                    <tr>
                                        <td><?= $list['idDanhMuc'] ?></td>
                                        <td><?= $list['tenDanhMuc'] ?></td>
                                        <td>
                                            <?php
                                            if ($list['kichHoat'] == 0) {
                                                echo 'Chưa kích hoạt';
                                            } elseif ($list['kichHoat'] == 1) {
                                                echo 'Đang kích hoạt';
                                            }
                                            ?>
                                        </td>
                                        <td>

                                            <form action="{{ url('admin/lists/' . $list['idDanhMuc'] . '/update_restore') }}"
                                                method="POST">
                                                <button class="btn btn-success m-2" type="submit"
                                                    onclick="return confirm('Có muốn khôi phục?')">Khôi phục</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                <a class="mb-3" href="{{ url('admin/lists/') }}">Quay lại</a>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
