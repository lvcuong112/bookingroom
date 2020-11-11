@extends('backend.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Chỉnh sửa Thông Tin Nhà Trọ <a href="" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin Thương Hiệu</h3>
                    </div>
                    <form role="form" action="" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                                <input value="lecuong" type="text" class="form-control" id="name" name="name" placeholder="Nhập tên tiêu đề">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Thay đổi ảnh</label>
                                <input type="file" id="new_image" name="new_image">
                                <br>
                                <img src="" width="250">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">WebSite</label>
                                <input value="lecuong" type="text" class="form-control" id="website" name="website" placeholder="Url">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input type="number" class="form-control" id="position" name="position" placeholder="Nhập tên vị trí" value="lecuong">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="is_active"  > Trạng thái hiển thị
                                </label>
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
