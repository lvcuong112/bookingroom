@extends('owner.layouts.main')
@section('content')
<style>
    .listImg{
        width: 50%;
        float: left;
    }
    .listImg img{
        -webkit-shape-image-threshold: 100%;
        width:100%;
        object-fit: cover;
        height: 150px;
    }
    .Pad-img{
        padding: 10px;
    }
</style>
<section class="content-header">
    <h1>
        Chi Tiết Phòng Trọ <a href="{{route('owner.room.index')}}" class="btn btn-success pull-right"> Danh sách phòng trọ </a>
    </h1>
</section>
<section class="content">
    <div class="row">
        <form role="form" action="{{route('owner.room.extend', ['roomID' => $data->roomType_id])}}"method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td><b>Id Loại Phòng</b></td>
                                <td>{{ $data->roomType_id }}</td>
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
                                <td><b> Giá Điện / kWh </b></td>
                                <td>{{ $data->electric_price}}</td>
                            </tr>
                            <tr>
                                <td><b> Giá Nước / m3 </b></td>
                                <td>{{ $data->water_price}}</td>
                            </tr>
                            <tr>
                                <td><b> Ngày Phê Duyệt </b></td>
                                @if($data->approval_date != null)
                                    <td>{{ $data->approval_date }}</td>
                                @else
                                    <td>Chưa được phê duyệt</td>
                                @endif
                            </tr>
                            <tr>
                                <td><b> Ngày Hết Hạn </b></td>
                                @if($data->expired_date != null)
                                    <td>{{ $data->expired_date }}</td>
                                @else
                                    <td>Chưa được phê duyệt</td>
                                @endif
                            </tr>
                            <tr>
                                <td><b> Tiện Ích </b></td>
                                <td>
                                    @foreach($facilities as $facility)
                                        {{$facility->title . ' | '}}
                                    @endforeach
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    @if ($getDate > $data->expired_date)
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Gia Hạn Bài Đăng</button>
                            <span style="color: red"> Gia hạn để có thể tiếp tục hiển thị bài đăng</span>
                        </div>
                    @else
                        @if ($data->canbe_edit == 1)
                            <div class="box-footer">
                                <a href="{{route('owner.room.edit', ['id'=> $data->id ])}}" class="btn btn-info">Sửa</a>
                            </div>
                        @else
                            @if($show_Request == 1)
                                <div class="box-footer">

                                    <a href="{{route('owner.room.requestEdit', [ 'room_id' => $data->id ])}}" class="btn btn-info" >Yêu Cầu Quyền Sửa</a>
                                </div>
                            @else
                                <p style="padding: 15px; color: red;">Yêu cầu chỉnh sửa đã được gửi. Vui lòng đợi admin phê duyệt</p>
                            @endif
                        @endif
                    @endif

                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <h3>Ảnh chi tiết phòng trọ</h3>
                        @foreach($room_detailImages as $item)
                            <div class="listImg">
                                <div class="Pad-img">
                                    <img src="{{ asset($item->image) }}">
                                </div>
                            </div>
                        @endforeach
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
