@extends('backend.layouts.main')
@section('content')
<section class="content-header">
    <h1>
        Danh Sách Phòng Trọ <a href="{{route('admin.room.create')}}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Thêm Phòng Trọ</a>
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
                            <th>Loại Phòng</th>
                            <th>Địa Chỉ</th>
                            <th>Giá Phòng</th>
                            <th>Hình ảnh</th>
                            <th>Ngày Đăng Bài</th>
                            <th>Trạng thái</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                        </tbody>
                        @foreach($data as $key => $item)
                            <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->roomType_id  }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <img src="{{ $item->image }}" width="50" height="50">
                                </td>
                                <td>{{ $item->public_date }}</td>
                                <td>{{ $item->is_active }}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.room.show', ['id'=> $item->id ])}}" class="btn btn-default">Xem</a>
                                    <a href="{{route('admin.room.edit', ['id'=> $item->id ])}}" class="btn btn-info">Sửa</a>
                                    <!-- Thêm sự kiện onlick cho nút xóa -->
                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="destroyRoom({{ $item->id }})" >Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
