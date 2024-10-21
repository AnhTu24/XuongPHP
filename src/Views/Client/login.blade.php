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
                                <h4 class="card-title">Sign in</h4>

                                @if (!empty($_SESSION['error']))
                                    <div class="alert alert-warning mt-3 mb-3">
                                        {{ $_SESSION['error'] }}
                                    </div>

                                    @php
                                        unset($_SESSION['error']);
                                    @endphp
                                @endif
                            </header>

                            <form action="{{ url('login-handle') }}" method="POST" style="display:inline-block;">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="" name="tenDangNhap">
                                    </div> <!-- form-group end.// -->

                                </div> <!-- form-row end.// -->

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label>Create password</label>
                                        <input class="form-control" type="password" name="matKhau">
                                    </div> <!-- form-group end.// -->

                                </div>


                                <div class="form-group">
                                    <label class="custom-control custom-checkbox"> <input type="checkbox"
                                            class="custom-control-input" checked="">
                                        <span class="custom-control-label"> I am agree with <a href="#">terms and
                                                contitions</a> </span>
                                    </label>
                                    <a href="{{ url('register')}}">Sign up</a>
                                </div> <!-- form-group end.// -->

                                <button type="submit" class="btn btn-primary btn-block"> Login </button>
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
