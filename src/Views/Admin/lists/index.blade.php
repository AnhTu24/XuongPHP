@extends('layouts.master')

@section('title')
    Danh sách danh mục
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Danh sách danh mục</h1>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">

                    <a class="btn btn-primary mb-5" href="{{ url('admin/lists/create') }}">Thêm mới</a>

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
                                            @php
                                                if ($list['kichHoat'] == 0) {
                                                    echo 'Chưa kích hoạt';
                                                } elseif ($list['kichHoat'] == 1) {
                                                    echo 'Đang kích hoạt';
                                                }
                                            @endphp
                                        </td>
                                        <td>
                                            <div class="flex">
                                                <form action="{{ url('admin/lists/' . $list['idDanhMuc'] . '/show') }}"
                                                    method="GET">
                                                    <button class="btn btn-info m-2" type="submit">Xem</button>
                                                </form>

                                                <form action="{{ url('admin/lists/' . $list['idDanhMuc'] . '/edit') }}"
                                                    method="GET">
                                                    <button class="btn btn-warning m-2" type="submit">Sửa</button>
                                                </form>

                                                <form action="{{ url('admin/lists/' . $list['idDanhMuc'] . '/delete') }}"
                                                    method="POST">
                                                    <button class="btn btn-danger m-2" type="submit"
                                                        onclick="return confirm('Chắc chắn muốn xóa?')">Xóa</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <a class="mb-3" href="{{ url('admin/lists/restore') }}">Xem mục đã xóa</a>
                            </tbody>
                        </table>
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
