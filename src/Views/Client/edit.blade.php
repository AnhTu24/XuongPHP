<!DOCTYPE html>
<html lang="">


<!-- Mirrored from retnews.netlify.app/homepage-v1 by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 May 2024 15:07:37 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <title>Retnews &#8211; Best news, blog & magazine template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('layouts.partials.head')
</head>

<body>

    @include('layouts.partials.loading')


    @include('layouts.partials.nav')

    <!-- register -->
    <section class="wrap__section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- register -->
                    <!-- Form Register -->

                    <div class="card mx-auto" style="max-width:520px;">
                        <article class="card-body">
                            <header class="mb-4">
                                <h4 class="card-title">Chỉnh sửa tài khoản</h4>
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

                            </header>
                            <form action="{{url("{$user['idNguoiDung']}/update")}}" method="POST" style="display:inline-block">
                                <div class="form-row">

                                </div> <!-- form-row end.// -->

                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <img src="{{ $_SESSION['user']['hinhAnh'] }}" alt="" width="100px">
                                    <input type="file" class="form-control" id="email" placeholder="Enter email" name="hinhAnh">
                                    
                                </div> <!-- form-group end.// -->

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" value="{{ $_SESSION['user']['email'] }}" name="email">
                                    
                                </div> <!-- form-group end.// -->

                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" id="email" placeholder="Enter phone number" value="{{ $_SESSION['user']['soDienThoai'] }}" name="soDienThoai">
                                    
                                </div> <!-- form-group end.// -->

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label>Mật khẩu</label>
                                        <input class="form-control" type="password" name="matKhau">
                                    </div> <!-- form-group end.// -->
                                    
                                </div>

                                <button class="btn btn-primary btn-block" type="submit">Edit</button>
                            </form>

                            </form>
                        </article><!-- card-body.// -->
                    </div>
                    <!-- end register -->
                </div>
            </div>
        </div>
    </section>
    <!-- end register -->


    @include('layouts.partials.footer')

    @include('layouts.partials.script')


</body>


<!-- Mirrored from retnews.netlify.app/register by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 May 2024 15:08:15 GMT -->

</html>
