@extends('backend.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Chỉnh sửa Thông Tin Nhà Trọ <a href="" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="box box-primary">
                    <form role="form" action="{{route('admin.room.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Loại Phòng</label>
                                <select class="form-control w-50" name="typeRoom">
                                    <option value="0">-- Chọn Loại Phòng  --</option>
                                    {{--                                    @foreach($categories as $category)--}}
                                    <option value="{{$room->roomType_id}}">Lê Cường</option>
                                    {{--                                    @endforeach--}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Tiêu Đề</label>
                                <input value="{{ $room->title }}" type="text" class="form-control" id="title" name="title" placeholder="Nhập tên tiêu đề">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input value="{{ $room->address }}" type="text" class="form-control" id="address" name="address" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quận/Huyện</label>
                                <select class="form-control w-50" name="district">
                                    <option value="0">-- Chọn Quận Huyện  --</option>
                                    {{--@foreach($categories as $category)--}}
                                    <option value="1">le cuong</option>
                                    {{--@endforeach--}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tỉnh/Thành Phố</label>
                                <select class="form-control w-50" name="city">
                                    <option value="0">-- Chọn Tỉnh/Thành Phố  --</option>
                                    {{--@foreach($categories as $category)--}}
                                    <option value="1">le cuong</option>
                                    {{--@endforeach--}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số Lượng Phòng</label>
                                <input  value="{{ $room->quantity }}" type="text" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá Phòng</label>
                                <input value="{{ $room->price }}" type="text" class="form-control" id="price" name="price" placeholder="Nhập giá phòng">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh Phòng Trọ</label>
                                <input value="{{ $room->image }}" type="file" class="" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Diện Tích Phòng</label>
                                <input value="{{ $room->area }}" type="text" class="form-control" id="area" name="area" placeholder="Nhập diện tích">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ghi Chú</label>
                                <input value="{{ $room->note }}" type="text" class="form-control" id="note" name="note" placeholder="Ghi chú">
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" value="{{$room->live_with_owner}}" name="owner"> Chung Chủ
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ngày Đăng Bài</label>
                                <input value="{{ $room->public_date }}" type="text" class="form-control" id="publicDate" name="publicDate" placeholder="Ngày đăng bài">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ngày Hết Hạn</label>
                                <input value="{{ $room->expired_date }}" type="text" class="form-control" id="expiredDate" name="expiredDate" placeholder="Ngày hết hạn">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Giá Điện</label>
                                <input value="{{ $room->electric_price }}" type="text" class="form-control" id="electricPrice" name="electricPrice" placeholder="Ngày hết hạn">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Giá Nước</label>
                                <input value="{{ $room->water_price }}" type="text" class="form-control" id="waterPrice" name="waterPrice" placeholder="Ngày hết hạn">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Id Người Đăng</label>
                                <select class="form-control w-50" name="userID">
                                    <option value="0">-- Chọn ID Người Đăng  --</option>
                                    {{--     @foreach($categories as $category)--}}
                                    <option value="{{$room->approval_id}}">le cuong</option>
                                    {{--    @endforeach--}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Id Người Phê Duyệt</label>
                                <select class="form-control w-50" name="approvalID">
                                    <option value="0">-- Chọn ID Người Phê Duyệt  --</option>
                                    {{--     @foreach($categories as $category)--}}
                                    <option value="1">le cuong</option>
                                    {{--    @endforeach--}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ngày Phê Duyệt</label>
                                <input value="{{ $room->approval_date }}" type="text" class="form-control" id="approvalDate" name="approvalDate" placeholder="Ngày phê duyệt">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="{{$room->is_active}}" name="is_active"> Trạng thái hiển thị
                                </label>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
