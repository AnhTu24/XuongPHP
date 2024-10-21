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
    {{-- Loading --}}
    @include('layouts.partials.loading')

    {{-- Nav --}}

    @include('layouts.partials.nav')

    <section class="pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Breadcrumb -->
                    <ul class="breadcrumbs bg-light mb-4">
                        <li class="breadcrumbs__item">
                            <a class='breadcrumbs__url' href='index.html'>
                                <i class="fa fa-home"></i> Trang chủ</a>
                        </li>
                        <li class="breadcrumbs__item">
                            <a class='breadcrumbs__url' href='index.html'>Tin tức</a>
                        </li>
                        <li class="breadcrumbs__item breadcrumbs__item--current">
                          {{$new['tenDanhMuc']}}
                        </li>
                    </ul>
                </div>
                <div class="col-md-8">

                    <!-- Article Detail -->
                    <div class="wrap__article-detail">
                        <div class="wrap__article-detail-title">
                            <h1>
                                {{ $new['tieuDe'] }}
                            </h1>
                            <h3>
                                {{ $new['moTa'] }}
                            </h3>
                        </div>
                        <hr>
                        <div class="wrap__article-detail-info">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <figure class="image-profile">
                                        <img src="images/profile2.png" alt="">
                                    </figure>
                                </li>
                                <li class="list-inline-item">

                                    <span>
                                        by
                                    </span>
                                    <a href="#">
                                        {{ $new['tenDangNhap'] }}
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize ml-1">
                                        {{ $new['ngayDang'] }}
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize">
                                        in
                                    </span>
                                    <a href="#">
                                        {{ $new['tenDanhMuc'] }}
                                    </a>


                                </li>
                            </ul>
                        </div>

                        <div class="wrap__article-detail-image mt-4">
                            <figure>
                               
                            </figure>
                        </div>
                        <div class="wrap__article-detail-content">
                            <div class="total-views">
                                <div class="total-views-read">
                                    {{ $new['luotXem'] }}
                                    <span>
                                        views
                                    </span>
                                </div>


                                <ul class="list-inline">
                                    <!-- <span class="share">share on:</span> -->
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o facebook" href="#">
                                            <i class="fa-brands fa-facebook-f"></i>
                                            <span>facebook</span>
                                        </a>

                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o twitter" href="#">
                                            <i class="fa-brands fa-twitter"></i>
                                            <span>twitter</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o whatsapp" href="#">
                                            <i class="fa-brands fa-whatsapp"></i>
                                            <span>whatsapp</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o telegram" href="#">
                                            <i class="fa-brands fa-telegram"></i>
                                            <span>telegram</span>
                                        </a>
                                    </li>

                                    <li class="list-inline-item">
                                        <a class="btn btn-linkedin-o linkedin" href="#">
                                            <i class="fa-brands fa-linkedin"></i>
                                            <span>linkedin</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <p class="has-drop-cap-fluid">
                                {!! $new['noiDung'] !!}
                            </p>

                        </div>


                    </div>


                    <!-- Profile author -->
                    <div class="wrap__profile">
                        <div class="wrap__profile-author">
                            <figure>
                                <img src="images/profile2.png" alt="">
                            </figure>
                            <div class="wrap__profile-author-detail">
                                <div class="wrap__profile-author-detail-name">author</div>
                                <h4>{{ $new['tenDangNhap'] }}</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis laboriosam ad
                                    beatae itaque ea non
                                    placeat officia ipsum praesentium! Ullam?</p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o facebook ">
                                            <i class="fa-brands fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o twitter ">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o instagram ">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o telegram ">
                                            <i class="fa-brands fa-telegram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o linkedin ">
                                            <i class="fa-brands fa-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <!-- Comment  -->
                    <div id="comments" class="comments-area">
                        <h3 class="comments-title">2 Comments:</h3>

                        <ol class="comment-list">
                            <li class="comment">
                                <aside class="comment-body">
                                    <div class="comment-meta">
                                        <div class="comment-author vcard">
                                            <img src="images/profile2.png" class="avatar" alt="image">
                                            <b class="fn">Sinmun</b>
                                            <span class="says">says:</span>
                                        </div>

                                        <div class="comment-metadata">
                                            <a href="#">
                                                <span>April 24, 2019 at 10:59 am</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="comment-content">
                                        <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s,
                                            when an unknown
                                            printer took a galley of type and scrambled it to make a type specimen book.
                                        </p>
                                    </div>

                                </aside>
                            </li>
                        </ol>

                        <div class="comment-respond">
                            <h3 class="comment-reply-title">Leave a Reply</h3>

                            <form class="comment-form">
                                <p class="comment-notes">
                                    <span id="email-notes">Your email address will not be published.</span>
                                    Required fields are marked
                                    <span class="required">*</span>
                                </p>
                                <p class="comment-form-comment">
                                    <label for="comment">Comment</label>
                                    <textarea name="comment" id="comment" cols="45" rows="5" maxlength="65525" required="required"></textarea>
                                </p>


                                <p class="form-submit">
                                    <input type="submit" name="submit" id="submit" class="submit"
                                        value="Post Comment">
                                </p>
                            </form>
                        </div>
                    </div>
                    <!-- Comment -->

                    <div class="clearfix"></div>


                </div>
                <div class="col-md-4">
                    <div class="sidebar-sticky">
                        <aside class="wrapper__list__article ">
                            <!-- <h4 class="border_section">Sidebar</h4> -->
                            <div class="mb-4">
                                <div class="widget__form-search-bar  ">
                                    <div class="row no-gutters">
                                        <div class="col">
                                            <input class="form-control border-secondary border-right-0 rounded-0"
                                                value="" placeholder="Search">
                                        </div>
                                        <div class="col-auto">
                                            <button
                                                class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </aside>


                        <aside class="wrapper__list__article">
                            <h4 class="border_section">Bản tin</h4>
                            <!-- Form Subscribe -->
                            <div class="widget__form-subscribe bg__card-shadow">
                                <h6>
                                    Những tin tức và sự kiện thế giới quan trọng nhất trong ngày.
                                </h6>
                                <p><small>Nhận bản tin hàng ngày của magzrenvi trên hộp thư đến của bạn.</small></p>
                                <div class="input-group ">
                                    <input type="text" class="form-control" placeholder="Your email address">
                                    <div class="input-group-append">
                                        
                                        <form action="{{url('register')}}" class="">
                                            <button class="btn btn-primary" type="submit">Sign up</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </aside>

                        <aside class="wrapper__list__article">
                            <h4 class="border_section">Advertise</h4>
                            <a href="#">
                                <figure>
                                    <img src="images/banner2.jpg" alt="" class="img-fluid">
                                </figure>
                            </a>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    @include('layouts.partials.footer')


    @include('layouts.partials.script')
</body>


<!-- Mirrored from retnews.netlify.app/homepage-v1 by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 May 2024 15:07:52 GMT -->

</html>
