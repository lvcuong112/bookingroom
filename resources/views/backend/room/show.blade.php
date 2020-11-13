@extends('backend.layouts.main')
@section('content')
<section class="content-header">
    <h1>
        Chi Tiết Phòng Trọ <a href="{{route('admin.room.index')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Danh sách </a>
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><b>Id Loại Nhà Trọ</b></td>
                                <td>{{ $data->_id }}</td>
                            </tr>
                            <tr>
                                <td><b>Tiêu Đề</b></td>
                                <td>{{ $data->title }}</td>
                            </tr>
                            <tr>
                                <td><b>Mô Tả</b></td>
                                <td>{{ $data->description }}</td>
                            </tr>
                            <tr>
                                <td><b>Địa Chỉ</b></td>
                                <td>{{ $data->address }}</td>
                            </tr>
                            <tr>
                                <td><b>Id Quận/Huyện</b></td>
                                <td>{{ $data->district_id }}</td>
                            </tr>
                            <tr>
                                <td><b>Id Tỉnh/Thành Phố</b></td>
                                <td>{{ $data->city_id }}</td>
                            </tr>
                            <tr>
                                <td><b>Số Lượng Phòng</b></td>
                                <td>{{ $data->quantity }}</td>
                            </tr>
                            <tr>
                                <td><b>Giá Phòng</b></td>
                                <td>{{ $data->price }}</td>
                            </tr>
                            <tr>
                                <td><b>Hình ảnh:</b></td>
                                <td><img src="{{ $data->image }}" width="250"></td>
                            </tr>
                            <tr>
                                <td><b>Ghi Chú</b></td>
                                <td>{{ $data->note }}</td>
                            </tr>
                            <tr>
                                <td><b>Số Lượng Phòng</b></td>
                                <td>{{ $data->quantity }}</td>
                            </tr>
                            <tr>
                                <td><b>Ở Chung Chủ </b></td>
                                <td>{{ $data->live_with_owner }}</td>
                            </tr>
                            <tr>
                                <td><b>Ngày Đăng Bài</b></td>
                                <td>{{ $data->public_date }}</td>
                            </tr>
                            <tr>
                                <td><b> Ngày Gỡ Bài </b></td>
                                <td>{{ $data->expired_date }}</td>
                            </tr>
                            <tr>
                                <td><b> Giá Điện </b></td>
                                <td>{{ $data->electric_price}}</td>
                            </tr>
                            <tr>
                                <td><b> Giá Nước </b></td>
                                <td>{{ $data->water_price}}</td>
                            </tr>
                            <tr>
                                <td><b> Ngày Phê Duyệt </b></td>
                                <td>{{ $data->approval_date}}</td>
                            </tr>
                            <tr>
                                <td><b> Id Người Phê Duyệt </b></td>
                                <td>{{ $data->approval_id}}</td>
                            </tr>
                            <tr>
                                <td><b> Tiện Ích </b></td>
                                <td>
                                    @foreach($facilities as $facility)
                                    {{$facility->title}}
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
