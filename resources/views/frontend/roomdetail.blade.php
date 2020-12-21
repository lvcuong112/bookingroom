@extends('frontend.layouts.mainNoBanner')
@section('content')
    <div id="app">
        <section class="list-image">
            <div class="slick-images">
                @foreach($imageRoomDetail as $data)
                <div class="img d-flex justify-content-center align-items-center">
                    <img src="{{ $data->image  }}" alt="" style="height: 414px; width: 650px;">
                </div>
                @endforeach
            </div>
        </section>
        <section class="rent-detail">
            <div class="container">
                <div class="box-title mt-5 mb-4">
                    <h2 class="title">  Phòng Trọ Liên Quan   </h2>
                </div>
                <div class="product-slick">
                    @foreach($relateRoom as $dataRelate)
                    <div class="product-slick-item">
                        <a href="#">
                            <div class="product">
                                <div class="tab d-flex" >
                                    <span class="mr-2 city"> {{ $dataRelate->title }} </span>
                                </div>
                                <div class="img">
                                    <img src="{{ $dataRelate->image }}" alt="">
                                </div>
                                <div class="content">
                                    <p class="price mb-2"> <strong> {{ $dataRelate->price }}VNĐ </strong>/<span>tháng</span></p>
                                    <p class="name mb-2"> {{ $dataRelate->address }} </p>
                                    <p class="desc m-0"> {{ $dataRelate->quantity }}, Diện tích : {{ $dataRelate->area }} </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="Box-lh" style="max-width: 1140px;margin: 0 auto;  padding: 0 30px;">
            <form action="" style="float: right;">
                <button style="background: linear-gradient( #ff5a5f , #ff6d72);height: 50px;width: 160px"> <i class="fas fa-bolt"></i>Báo cáo bài viết</button>
            </form>
        </div>
        <room-detail-component><room-detail-component>
    </div>
@endsection


