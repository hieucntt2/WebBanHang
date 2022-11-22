@extends('client.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/GioiThieu.css')}}">
@endsection
@section('content')
    <section>
        <div class="banner">
            <h2>GIỚI THIỆU</h2>
            <ul class="d-flex justify-content-center p-0">
                <li><a href="{{ route('Trangchu') }}">TRANG CHỦ</a></li>
                <li>/</li>
                <li><a href="javascript:void(0)">GIỚI THIỆU</a></li>
            </ul>
        </div>
        <div class="main">
            <div class="container">
                <h1>MONA MEDIA</h1>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.</p>
                <div class="row">
                    <div class="col-md-3">
                        <div class="item">
                            <div class="item__img">
                                <img src="../img/imgslide11.png" alt="">
                            </div>
                            <h5>New Features</h5>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt.</p>
                        </div>
                        <div class="item">
                            <div class="item__img">
                                <img src="../img/imgslide11.png" alt="">
                            </div>
                            <h5>New Features</h5>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main__img">
                            <img src="../img/imgslide22-768x495.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <div class="item__img">
                                <img src="../img/imgslide11.png" alt="">
                            </div>
                            <h5>New Features</h5>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt.</p>
                        </div>
                        <div class="item">
                            <div class="item__img">
                                <img src="../img/imgslide11.png" alt="">
                            </div>
                            <h5>New Features</h5>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
