<section>
    <!-- Popular news  header-->
    <div class="popular__news-header">
        <div class="container">
            <div class="row no-gutters">

                <!-- News slideshow -->
                <div class="col-md-8 ">
                    <div class="card__post-carousel">
                        @foreach ($news as $new)
                            <div class="item">
                                <!-- Post Article -->
                                <div class="card__post">
                                    <div class="card__post__body">
                                        <a href='article-detail-v1.html'>
                                            <img src="{{ show_uploads($new['hinhAnh']) }}" class="img-fluid"
                                                alt="">
                                        </a>
                                        <div class="card__post__content bg__post-cover">
                                            <div class="card__post__category">
                                                {{ $new['tenDanhMuc'] }}
                                            </div>
                                            <div class="card__post__title">
                                                <h2>
                                                    <a href="#">
                                                        {{ $new['tieuDe'] }}
                                                    </a>
                                                </h2>
                                            </div>
                                            <div class="card__post__author-info">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="#">
                                                            by {{ $new['tenDangNhap'] }}
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span>
                                                            {{ $new['ngayDang'] }} </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>


                            {{-- <div class="item">
                            <!-- Post Article -->
                            <div class="card__post">
                                <div class="card__post__body">
                                    <a href='article-detail-v1.html'>
                                        <img src="images/medium/newsimage1.png" class="img-fluid" alt="">
                                    </a>
                                    <div class="card__post__content bg__post-cover">
                                        <div class="card__post__category">
                                            covid-19
                                        </div>
                                        <div class="card__post__title">
                                            <h2>
                                                <a href="#">
                                                    meeting room is empty because of the covid-19 virus
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="card__post__author-info">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="#">
                                                        by david hall
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span>
                                                        Descember 09, 2020
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div> --}}
                        @endforeach

                    </div>
                </div>


                <!-- Subnews-->
                <div class="col-md-4">
                    <div class="popular__news-right">
                        <!-- Post Article -->
                        <div class="card__post ">
                            <div class="card__post__body card__post__transition">
                                <a href="#">
                                    <img src="{{ show_uploads($new['hinhAnh']) }}" class="img-fluid" alt="">
                                </a>
                                <div class="card__post__content bg__post-cover">
                                    <div class="card__post__category">
                                        {{ $new['tenDanhMuc'] }}

                                    </div>
                                    <div class="card__post__title">
                                        <h5>
                                            <a href="#">
                                                {{ $new['tieuDe'] }}
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="card__post__author-info">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    by {{ $new['tenDangNhap'] }}

                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <span>
                                                    {{ $new['ngayDang'] }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <!-- Post Article -->
                        {{-- <div class="card__post ">
                            <div class="card__post__body card__post__transition">
                                <a href="#">
                                    <img src="{{ show_uploads($new['hinhAnh']) }}" class="img-fluid" alt="">
                                </a>
                                <div class="card__post__content bg__post-cover">
                                    <div class="card__post__category">
                                        {{ $new['tenDanhMuc'] }}

                                    </div>
                                    <div class="card__post__title">
                                        <h5>
                                            <a href="#">
                                                {{ $new['tieuDe'] }}
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="card__post__author-info">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    by {{ $new['tenDangNhap'] }}

                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <span>
                                                    {{ $new['ngayDang'] }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Popular news header-->

</section>
<!-- End Popular news -->

<section class="pt-0">
    <div class="popular__section-news">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <aside class="wrapper__list__article">
                        <h4 class="border_section">All News</h4>
                        <div class="wrapp__list__article-responsive">
                            @foreach ($news as $new)
                                <!-- Post Article List -->
                                <div class="card__post card__post-list card__post__transition mt-30">
                                    <div class="row ">
                                        <div class="col-md-5">
                                            <div class="card__post__transition">

                                                <!-- image news -->
                                                <a href="{{ url($new['idTinTuc'] . '/newDetail') }}">
                                                    <img src="{{ show_uploads($new['hinhAnh']) }}" class="img-fluid"
                                                        alt="" width="320px">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-7 my-auto pl-0">
                                            <div class="card__post__body ">
                                                <div class="card__post__content  ">

                                                    <!-- danh mục -->
                                                    <div class="card__post__category ">
                                                        {{ $new['tenDanhMuc'] }}
                                                    </div>

                                                    <!-- người đăng/ ngày đăng -->
                                                    <div class="card__post__author-info mb-2">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <span class="text-primary">
                                                                    {{ $new['tenDangNhap'] }}
                                                                </span>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <span class="text-dark text-capitalize">
                                                                    {{ $new['ngayDang'] }}

                                                                </span>
                                                            </li>

                                                        </ul>
                                                    </div>

                                                    <div class="card__post__title">
                                                        <!-- tiêu đề -->
                                                        <h5>
                                                            <a href="{{ url($new['idTinTuc'] . '/newDetail') }}">
                                                                {{ $new['moTa'] }}
                                                            </a>
                                                        </h5>
                                                        <!-- nội dung ngắn -->
                                                        <p class="d-none d-lg-block d-xl-block mb-0">
                                                            {{ $new['tieuDe'] }}
                                                        </p>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </aside>
                </div>


                <div class="col-md-12 col-lg-4">
                    <aside class="wrapper__list__article">
                        <h4 class="border_section">Bài viết views cao nhất</h4>
                        <div class="wrapper__list-number">
                            @foreach ($top5News as $news)
                                 <!-- List Article -->
                            <div class="card__post__list">
                                <!-- STT -->
                                <div class="list-number">
                                    <span>
                                       {{ $news['idTinTuc'] }}
                                    </span>
                                </div>

                                <!-- Danh mục -->
                                <a href="" class="category">
                                    {{ $news['tenDanhMuc'] }}
                                </a>
                                
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <!-- Tiêu đề -->
                                        <h5>
                                            <a href="{{url($news['idTinTuc'] . '/newDetail')}}">
                                                {{ $news['tieuDe'] }}

                                            </a>
                                        </h5>
                                    </li>
                                </ul>

                            </div>
                            @endforeach
                           
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>


    <!-- End Popular news category -->

    {{-- Phân trang --}}
    <div class="col-12 text-center mt-5 pagination-area">
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

                    
                </ul>
            </nav>
        </ul>
    </div>



</section>
<!-- End Popular news category -->
