@extends('owner.layouts.main')
@section('content')
    @if (session('msg'))
        <div class="pad margin no-print">
            <div class="alert alert-success alert-dismissible" style="" id="thongbao">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Thông báo !</h4>
                {{ session('msg') }}
            </div>
        </div>
    @endif
    <section class="content-header">
        <h1>
            Danh Sách Yêu Thích Phòng Trọ
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>Tên Tiêu Đề</th>
                                <th>Địa Chỉ</th>
                                <th>Giá Phòng</th>
                                <th>Hình Ảnh</th>
                                <th>Số Lượt Thích</th>
                            </tr>
                            </tbody>
                                <tr> <!-- Thêm Class Cho Dòng -->
                                    <td>{{ $roomData[0]->title }}</td>
                                    <td>{{ $roomData[0]->address }}</td>
                                    <td>{{ $roomData[0]->price }}</td>
                                    <td>
                                        <img src="{{ $roomData[0]->image }}" width="50" height="50">
                                    </td>
                                    <td>{{ $roomData[1] }}</td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
