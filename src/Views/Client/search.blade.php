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

    <!-- search -->
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="wrap__search-result">
                        <div class="wrap__search-result-keyword">
                            <h2>
                                Kết quả tìm kiếm cho từ khóa:
                                <span class="text-primary">
                                    {!! $word !!}
                                </span>

                            </h2>
                        </div>
                    </div>
                    <!-- Post Article List -->
                    <div class="card__post card__post-list card__post__transition mt-30">
                        <div class="row">
                            @foreach ($news as $new)
                                <div class="col-md-4 mb-4">
                                    <div class="card__post__transition">
                                        <a href="#">
                                            <img src="{{ show_uploads($new['hinhAnh']) }}" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="card__post__body mt-2">
                                        <div class="card__post__content">
                                            <div class="card__post__category">
                                                {{ $new['tenDanhMuc'] }}
                                            </div>
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
                                                <h5>
                                                    <a href="#">
                                                        {{ $new['moTa'] }}
                                                    </a>
                                                </h5>
                                                <p class="d-none d-lg-block d-xl-block mb-0">
                                                    {{ $new['tieuDe'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


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
    </section>



    {{-- Footer --}}
    @include('layouts.partials.footer')


    @include('layouts.partials.script')
</body>


<!-- Mirrored from retnews.netlify.app/search-result-v1 by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 May 2024 15:08:15 GMT -->

</html>
