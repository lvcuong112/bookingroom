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
        <div class="Box-lh" style="max-width: 1140px;margin: 0 auto;  padding: 0 30px;">
            <button style="background: linear-gradient( #ff5a5f , #ff6d72);height: 50px;width: 160px; float: right" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                <i class="fas fa-bolt"></i>Báo cáo bài viết
            </button>
            @if(session('customer'))
            <form action="{{ route('like') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $roomId }}" name="roomId">
                <button style="height: 50px;width: 180px; float: right">
                    <span class="fi-heart" >Thích |</span>
                    <span><b> {{ $countLike }} Lượt thích </b></span>
                </button>
            </form>
            <button style="height: 50px;width: 200px" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalCmt"> Bình luận/Đánh giá</button>
            @else
            <button></button>
            @endif
        </div>
        @if(session('customer'))
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="max-width: 500px;">
                <div class="modal-content" style="padding:20px;margin-left: -12%;width: 130%;">
                    <form action="{{ route('report') }}" method="POST">
                        @csrf
                        <div class="dialog-report" title="Báo cáo" style="width: 100%;text-align: left">
                            <input type="hidden" value="{{ $roomId }}" name="roomId">
                            <div class="input-report-content" id="title">
                                <label> Tiêu đề (<span id="label-required">*</span>)</label><br>
                                <input class="report-input" id="input-report-title" type="text" name="title" required>
                            </div>
                            <div class="input-report-content" id="content">
                                <label> Nội dung (<span id="label-required">*</span>)</label><br>
                                <input class="report-input"  id="input-report-content" type="text" placeholder="Nhập nội dung vào đây" style="height: 200px;" name="content" required>
                            </div>
                            <div class="report-footer">
                                <button class="report-button" id="send-report" type="submit"><span class="Save-text">Gửi Báo Cáo</span></button>
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

<div id="myModalCmt" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 500px;">
        <!-- Modal content-->
        <div class="modal-content" style="padding:20px;margin-left: -12%;width: 130%;">
            <form action="{{ route('comment') }}" method="POST">
                @csrf
                <div class="dialog-report" title="Báo cáo" style="width: 100%;text-align: left">
                    <input type="hidden" value="{{ $roomId }}" name="roomId">
                    <div class="input-report-content" id="title">
                        <label> Đánh giá (<span id="label-required">*</span>)</label><br>
                        <select name="vote" id="input-report-title" class="report-input" required>
                            <option value="1">1 Sao</option>
                            <option value="2">2 Sao</option>
                            <option value="3">3 Sao</option>
                            <option value="4">4 Sao</option>
                            <option value="5">5 Sao</option>
                        </select>
                    </div>
                    <div class="input-report-content" id="content">
                        <label> Nội dung bình luận (<span id="label-required">*</span>)</label><br>
                        <input class="report-input"  id="input-report-content" type="text" placeholder="Nhập nội dung vào đây" style="height: 200px;" name="content" required>
                    </div>
                    <div class="report-footer">
                        <button class="report-button" id="send-report" type="submit"><span class="Save-text">Gửi Bình Luận</span></button>
                    </div>
                </div>
            </form>
            <form action="{{ route('allComment') }}" method="get">
                <input type="hidden" value="{{ $roomId }}" name="roomId">
                <button class="report-footer">Xem tất cả bình luận bài viết</button>
            </form>
        </div>

    </div>
</div>

