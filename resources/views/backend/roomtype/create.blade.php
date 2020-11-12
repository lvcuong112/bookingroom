@extends('backend.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Thêm Loại Phòng Trọ <a href="{{route('admin.roomtype.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách Loại Phòng Trọ</a>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <form role="form" action="{{route('admin.roomtype.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Loại Phòng</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên loại phòng trọ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Được Tạo Bởi</label>
                                    {{--@foreach($categories as $category)--}}
                                    <input type="text" class="form-control" id="create_by" name="create_by" placeholder="Nhập tên ngươi tạo">
                                    {{--@endforeach--}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cập Nhật Bởi</label>
                                    {{--@foreach($categories as $category)--}}
                                    <input type="text" class="form-control" id="update_by" name="update_by" placeholder="Nhập tên người cập nhật">
                                    {{--@endforeach--}}
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="is_active"> Trạng thái hiển thị
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Ngày Tạo Bài</label>
                                    <input type="text" class="form-control" id="created_at" name="created_at" placeholder="Ngày tạo bài">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Ngày Cập Nhật</label>
                                    <input type="text" class="form-control" id="updated  _at" name="updated_at" placeholder="Ngày cập nhật    ">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Tạo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
