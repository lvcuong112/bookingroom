@extends('backend.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Danh Sách Phòng Trọ <a href="" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Thêm Phòng Trọ</a>
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
                                <th>Tên Thương Hiệu</th>
                                <th>Hình ảnh</th>
                                <th>WebSite</th>
                                <th>Vị trí</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </tbody>
                            <tr class="item-1"> <!-- Thêm Class Cho Dòng -->
                                <td>Le cuong}</td>
                                <td>
                                    <img src="" width="50" height="50">
                                </td>
                                <td>lecuong</td>
                                <td>lecuong</td>
                                <td>lecuong</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-default">Xem</a>
                                    <a href="" class="btn btn-info">Sửa</a>
                                    <!-- Thêm sự kiện onlick cho nút xóa -->
                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="" >Xóa</a>
                                </td>
                            </tr>
                            <tr class="item-1"> <!-- Thêm Class Cho Dòng -->
                            <td>Le cuong}</td>
                            <td>
                                <img src="" width="50" height="50">
                            </td>
                            <td>lecuong</td>
                            <td>lecuong</td>
                            <td>lecuong</td>
                            <td class="text-center">
                                <a href="" class="btn btn-default">Xem</a>
                                <a href="" class="btn btn-info">Sửa</a>
                                <!-- Thêm sự kiện onlick cho nút xóa -->
                                <a href="javascript:void(0)" class="btn btn-danger" onclick="" >Xóa</a>
                            </td>
                        </tr>
                            <tr class="item-1"> <!-- Thêm Class Cho Dòng -->
                            <td>Le cuong}</td>
                            <td>
                                <img src="" width="50" height="50">
                            </td>
                            <td>lecuong</td>
                            <td>lecuong</td>
                            <td>lecuong</td>
                            <td class="text-center">
                                <a href="" class="btn btn-default">Xem</a>
                                <a href="" class="btn btn-info">Sửa</a>
                                <!-- Thêm sự kiện onlick cho nút xóa -->
                                <a href="javascript:void(0)" class="btn btn-danger" onclick="" >Xóa</a>
                            </td>
                        </tr>
                            <tr class="item-1"> <!-- Thêm Class Cho Dòng -->
                                <td>Le cuong}</td>
                                <td>
                                    <img src="" width="50" height="50">
                                </td>
                                <td>lecuong</td>
                                <td>lecuong</td>
                                <td>lecuong</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-default">Xem</a>
                                    <a href="" class="btn btn-info">Sửa</a>
                                    <!-- Thêm sự kiện onlick cho nút xóa -->
                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="" >Xóa</a>
                                </td>
                            </tr>
                            <tr class="item-1"> <!-- Thêm Class Cho Dòng -->
                                <td>Le cuong}</td>
                                <td>
                                    <img src="" width="50" height="50">
                                </td>
                                <td>lecuong</td>
                                <td>lecuong</td>
                                <td>lecuong</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-default">Xem</a>
                                    <a href="" class="btn btn-info">Sửa</a>
                                    <!-- Thêm sự kiện onlick cho nút xóa -->
                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="" >Xóa</a>
                                </td>
                            </tr>
                            <tr class="item-1"> <!-- Thêm Class Cho Dòng -->
                                <td>Le cuong}</td>
                                <td>
                                    <img src="" width="50" height="50">
                                </td>
                                <td>lecuong</td>
                                <td>lecuong</td>
                                <td>lecuong</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-default">Xem</a>
                                    <a href="" class="btn btn-info">Sửa</a>
                                    <!-- Thêm sự kiện onlick cho nút xóa -->
                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="" >Xóa</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
