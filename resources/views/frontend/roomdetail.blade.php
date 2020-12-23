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
            <button style="background: linear-gradient( #ff5a5f , #ff6d72);height: 50px;width: 160px; float: right" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                <i class="fas fa-bolt"></i>Báo cáo bài viết
            </button>
            @if(session('customer'))
            <button>
                <span class="fi-heart">Thích</span>
            </button>
            @else
            <button></button>
            @endif
        </div>
        @if(session('customer'))
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="max-width: 500px;">
                <div class="modal-content" style="padding:20px;margin-left: -12%;width: 130%;">
                    <form action="" method="POST">
                        @csrf
                        <div class="dialog-report" title="Báo cáo" style="width: 100%;text-align: left">
                            <div class="input-report-content" id="title">
                                <label> Tiêu đề (<span id="label-required">*</span>)</label><br>
                                <input class="report-input" id="input-report-title" type="text" />
                            </div>
                            <div class="input-report-content" id="content">
                                <label> Nội dung (<span id="label-required">*</span>)</label><br>
                                <input class="report-input"  id="input-report-content" type="text" placeholder="Nhập nội dung vào đây" style="height: 200px;"/>
                            </div>
                            <div class="report-footer">
                                <button class="report-button" id="send-report"><span class="Save-text">Gửi Báo Cáo</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @else
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="max-width: 500px;">
                <div class="modal-content" style="padding:20px;margin-left: -12%;width: 130%;">
                    <div class="pad margin no-print">
                        <div class="alert alert-success alert-dismissible" style="" id="thongbao">
                            <h4><i class="icon fa fa-check"></i> Thông báo !</h4>
                            Vui lòng đăng nhập để báo cáo bài viết !!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <room-detail-component><room-detail-component>
    </div>
@endsection


