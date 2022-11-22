@extends('client.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/KienThuc.css')}}">
@endsection
@section('content')
    <section>
        <div class="container">
            <h2>KIẾN THỨC</h2>
            <div class="row main">
                <div class="col-md-4 col-xl-3">
                    <div class="science__info">
                        <div class="science__search d-flex justify-content-start align-items-center">
                            <input type="text" placeholder="Tìm kiếm...">
                            <button>
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                    <div class="science__news">
                        <p>Bài viết mới</p>
                        <ul>
                            @foreach ($tintuc as $item)
                                <li>
                                    <a href="#">
                                        <div class="science__news__img">
                                            <img src="../img/{{ $item->Anh }}" alt="">
                                        </div>
                                        <p>{{ $item->MoTa }}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 col-xl-9">
                    <div class="row ">
                        @foreach ($tintuc as $item)
                            <div class="col-md-6 col-xl-4 mb-4">
                                <a href="#" class="news_item">
                                    <div class="item__img">
                                        <img src="../img/{{ $item->Anh }}" alt="">
                                    </div>
                                    <div class="item_date">
                                        <p>16</p>
                                        <span>Th5</span>
                                    </div>
                                    <div class="new_item__info">
                                        <p>{{ $item->MoTa }}</p>
                                        <span>{{ $item->ND }}</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
