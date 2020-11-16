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
                                    @foreach($city as $t_city)
                                    <option value="{{$t_city->id}}">{{$t_city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
    {{--                            quận huyện--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quận/Huyện</label>
                                <select class="form-control w-50" name="district">
                                    <option value="0">-- Chọn Quận Huyện  --</option>
                                    @foreach($district as $t_district)
                                        <option value="{{$t_district->id}}">{{$t_district->name}}</option>
                                    @endforeach
                                </select>
                            </div>
    {{--                            địa chỉ--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ chính xác (số nhà ...) </label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ">
                            </div>
    {{--                            số lượng phòng--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số Lượng Phòng</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng phòng">
                            </div>
    {{--                            giá phòng--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá Phòng (vnđ)</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá phòng">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Đơn vị</label>
                                <input type="text" class="form-control" id="priceUnit" name="priceUnit" placeholder="Price Unit">
                            </div>
    {{--                            ảnh--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh Phòng Trọ</label>
                                <input type="file" class="" id="image" name="image" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Mô tả</label>
                                <input type="text" class="form-control" id="note" name="description" placeholder="Mô tả">
                            </div>
    {{--                            diện tích--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Diện Tích (m2)</label>
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
                                    <input type="checkbox" value="1" name="with_owner"> Chung Chủ
                                </label>
                            </div>
    {{--
    {{--                            giá điện--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Giá Điện</label>
                                <input type="text" class="form-control" id="electricPrice" name="electricPrice" placeholder="Nhập giá điện / 1 kWh">
                            </div>
    {{--                            giá nước--}}
                            <div class="form-group">
                                <label for="exampleInputFile">Giá Nước</label>
                                <input type="text" class="form-control" id="waterPrice" name="waterPrice" placeholder="Giá nước / m3">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Chọn thời gian muốn hiển thị bài đăng</label>
                                <div class="expired_date" style="display: flex;">
                                    <input type="text" class="form-control" id="waterPrice" name="date_quantity" placeholder="Số tuần/tháng/năm (ít nhất 1 tuần)">
                                    <select class="form-control w-50" name="unit_date">
                                        <option value="1"> tuần </option>
                                        <option value="2"> tháng</option>
                                        <option value="3"> năm</option>
                                    </select>
                                </div>
                            </div>


                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="is_active"> Trạng thái hiển thị
                                </label>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tạo</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tienich-box">
                    <span class="title-box">Tiện Ích</span>
                    <div class="form-group form-outBox fixfloat">
                        @foreach($facility as $facilities)
                            <label class="label-checkBox">
                                <input type="checkbox" value="{{$facilities->id}}" name="facilities[]"><span>{{$facilities->title}}</span>
                            </label>
                        @endforeach
                    </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title setmore">Thêm Chi Tiết Ảnh Phòng Trọ</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh Phòng Trọ</label>
                                <input type="file" class="" id="image" name="detailImage[]" multiple>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input type="reset" class="btn btn-default" value="Reset">
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
