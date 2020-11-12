@extends('backend.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Chỉnh sửa Thông Tin Nhà Trọ <a href="{{route('admin.roomtype.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="box box-primary">
                    <form role="form" action="{{route('admin.roomtype.update', ['id' => $roomType->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Loại Phòng</label>
                                <input value="{{$roomType->name}}" type="text" class="form-control" id="name" name="name" placeholder="Nhập tên loại phòng trọ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Được Tạo Bởi</label>
                                {{--@foreach($categories as $category)--}}
                                <input value="{{$roomType->create_by}}" type="text" class="form-control" id="create_by" name="create_by" placeholder="Nhập tên ngươi tạo">
                                {{--@endforeach--}}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cập Nhật Bởi</label>
                                {{--@foreach($categories as $category)--}}
                                <input value="{{$roomType->update_by}}" type="text" class="form-control" id="update_by" name="update_by" placeholder="Nhập tên người cập nhật">
                                {{--@endforeach--}}
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="{{$roomType->is_active}}" name="is_active"> Trạng thái hiển thị
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ngày Tạo Bài</label>
                                <input value="{{$roomType->created_at}}" type="text" class="form-control" id="created_at" name="created_at" placeholder="Ngày tạo bài">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ngày Cập Nhật</label>
                                <input value="{{$roomType->updated_at}}" type="text" class="form-control" id="updated  _at" name="updated_at" placeholder="Ngày cập nhật    ">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
