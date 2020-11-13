@extends('backend.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thêm Phòng Trọ <a href="{{route('admin.room.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <form role="form" action="{{route('admin.room.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-body">
    {{--                            loại phòng--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Loại Phòng</label>
                                <select class="form-control w-50" name="typeRoom">
                                    <option value="0">-- Chọn Loại Phòng  --</option>
                                    @foreach($typeRoom as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
    {{--                            tiêu đề--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Tiêu Đề</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tên tiêu đề">
                            </div>
    {{--                            tỉnh/thành phố--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tỉnh/Thành Phố</label>
                                <select class="form-control w-50" name="city">
                                    <option value="0">-- Chọn Tỉnh/Thành Phố  --</option>
                                    @foreach($city as $cities)
                                    <option value="{{$cities->id}}">{{$cities->name}}</option>
                                    @endforeach
                                </select>
                            </div>
    {{--                            quận huyện--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quận/Huyện</label>
                                <select class="form-control w-50" name="district">
                                    <option value="0">-- Chọn Quận Huyện  --</option>
                                    @foreach($district as $districts)
                                        <option value="{{$districts->id}}">{{$districts->name}}</option>
                                    @endforeach
                                </select>
                            </div>
    {{--                            địa chỉ--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ Cụ Thể</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                            </div>
    {{--                            số lượng phòng--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số Lượng Phòng</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng">
                            </div>
    {{--                            giá phòng--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá Phòng (vnđ)</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá phòng">
                            </div>
    {{--                            ảnh--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh Phòng Trọ</label>
                                <input type="file" class="" id="image" name="image" >
    {{--                                multiple--}}
                            </div>
    {{--                            diện tích--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Diện Tích Phòng</label>
                                <input type="text" class="form-control" id="area" name="area" placeholder="Nhập diện tích">
                            </div>
    {{--                            ghi chú--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Ghi Chú</label>
                                <input type="text" class="form-control" id="note" name="note" placeholder="Ghi chú">
                            </div>
    {{--                            chung chủ--}}
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" value="1" name="owner"> Chung Chủ
                                </label>
                            </div>
    {{--                            ngày đăng bài--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Ngày Đăng Bài</label>
                                <input type="text" class="form-control" id="publicDate" name="publicDate" placeholder="Ngày đăng bài">
                            </div>
    {{--                            ngày hết hạn--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Ngày Hết Hạn</label>
                                <input type="text" class="form-control" id="expiredDate" name="expiredDate" placeholder="Ngày hết hạn">
                            </div>
    {{--                            giá điện--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Giá Điện</label>
                                <input type="text" class="form-control" id="electricPrice" name="electricPrice" placeholder="Nhập giá điện/1 số">
                            </div>
    {{--                            giá nước--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Giá Nước</label>
                                <input type="text" class="form-control" id="waterPrice" name="waterPrice" placeholder="giá nước/1 khối">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Id Người Đăng</label>
                                    <select class="form-control w-50" name="userID">
                                        <option value="0">-- Chọn ID Người Đăng  --</option>
    {{--                                             @foreach($categories as $category)--}}
                                        <option value="1">le cuong</option>
    {{--                                            @endforeach--}}
                                    </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Id Người Phê Duyệt</label>
                                <select class="form-control w-50" name="approvalID">
                                    <option value="0">-- Chọn ID Người Phê Duyệt  --</option>
    {{--                                         @foreach($categories as $category)--}}
                                    <option value="1">le cuong</option>
    {{--                                        @endforeach--}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ngày Phê Duyệt</label>
                                <input type="text" class="form-control" id="approvalDate" name="approvalDate" placeholder="Ngày Phê Duyệt">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="is_active"> Trạng thái hiển thị
                                </label>
                            </div>
                            <span>Tiện Ích</span>
                            <div class="form-group">
                                @foreach($facility as $facilities)
                                <label style="margin-right: 20px;">
                                    <input type="checkbox" value="{{$facilities->id}}" name="facilities[]">{{$facilities->title}}
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tạo</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chi tiết ảnh sản phẩm</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">
                            @for($i=1; $i<=5; $i++)
                                <div class="form-group">
                                    <label for="exampleInputFile">Ảnh sản phẩm {{$i}}</label>
                                    <input type="file" class="" id="image" name="detailImage{{$i}}">
                                </div>
                            @endfor
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            {{--                                <button type="submit" class="btn btn-primary">Tạo</button>--}}
                            <input type="reset" class="btn btn-default" value="Reset">
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
