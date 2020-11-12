@extends('backend.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Danh Sách Loại Phòng Trọ <a href="{{route('admin.roomtype.create')}}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Thêm Loại Phòng Trọ</a>
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
                                    <th>Loại Phòng</th>
                                    <th>Tạo Bởi</th>
                                    <th>Cập Nhật Bởi</th>
                                    <th>Trạng Thái</th>
                                    <th>Ngày Tạo</th>
                                    <th>Ngày Cập Nhât</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                                </tbody>
                                @foreach($data as $key => $item)
                                    <tr class="item-{{ $item->roomType_id }}"> <!-- Thêm Class Cho Dòng -->
                                        <td>{{ $item->roomType_id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->create_by}}</td>
                                        <td>{{ $item->update_by }}</td>
                                        <td>{{ $item->is_active }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->update_at }}</td>

                                        <td class="text-center">
                                            <a href="" class="btn btn-info">Sửa</a>
                                            <!-- Thêm sự kiện onlick cho nút xóa -->
                                            <a href="javascript:void(0)" class="btn btn-danger" onclick="" >Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
