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
                                <h4 class="card-title">Sign up</h4>
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
                            <form action="{{ url('register-handle') }}" method="POST" style="display:inline-block;">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="" name="tenDangNhap">
                                    </div> <!-- form-group end.// -->

                                </div> <!-- form-row end.// -->
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="" name="email">
                                    <small class="form-text text-muted">We'll never share your email with anyone
                                        else.</small>
                                </div> <!-- form-group end.// -->


                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Create password</label>
                                        <input class="form-control" type="password" name="matKhau">
                                    </div> <!-- form-group end.// -->
                                    <div class="form-group col-md-6">
                                        <label>Repeat password</label>
                                        <input class="form-control" type="password" name="confirm_matKhau">
                                    </div> <!-- form-group end.// -->
                                </div>


                                <div class="form-group">
                                    <label class="custom-control custom-checkbox"> <input type="checkbox"
                                            class="custom-control-input" checked="">
                                        <span class="custom-control-label"> I am agree with <a href="#">terms and
                                                contitions</a> </span>
                                    </label>
                                </div> <!-- form-group end.// -->


                                <button class="btn btn-primary btn-block" type="submit">Register</button>
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
