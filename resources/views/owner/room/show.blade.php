@extends('owner.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Chi Tiết Phòng Trọ <a href="{{route('')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Danh sách </a>
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
                                <td><b>Quận/Huyện</b></td>
                                <td>{{ \App\District::findOrFail($data->district_id)->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Tỉnh/Thành Phố</b></td>
                                <td>{{ \App\City::findOrFail($data->city_id)->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Số Lượng Phòng</b></td>
                                <td>{{ $data->quantity }}</td>
                            </tr>
                            <tr>
                                <td><b>Giá Phòng (VNĐ) </b></td>
                                <td>{{ $data->price }}</td>
                            </tr>
                            <tr>
                                <td><b>Hình ảnh tiêu đề:</b></td>
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
                                <td>{{ ($data->live_with_owner==1) ? 'Có' : 'Không' }}</td>
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
                                <td><b> Giá Điện / kWh </b></td>
                                <td>{{ $data->electric_price}}</td>
                            </tr>
                            <tr>
                                <td><b> Giá Nước / m3 </b></td>
                                <td>{{ $data->water_price}}</td>
                            </tr>
                            <tr>
                                <td><b> Ngày Phê Duyệt </b></td>
                                <td>{{ $data->approval_date }}</td>
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
