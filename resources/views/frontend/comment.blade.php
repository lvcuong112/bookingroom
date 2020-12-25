@extends('frontend.layouts.mainNoBanner')
@section('content')
    <div class="container">
        <section class="blog-index">
            <div class="container">
                <div class="box-title mb-5">
                    <h2 class="text-center"> Các Bình Luật Về Bài Viết Thuê Trọ </h2>
                    <p class="text-center"> Tham khảo các bình luận để biết thêm về dịch vụ và thông tin phòng trọ </p>
                </div>
                <div class="row">
                    @foreach($data as $comment)
                    <div class="col-lg-4">
                        <div class="blog">
                            <div class="img">
                                <p class="desc m-0">{{ $comment->comment }}</p>
                            </div>
                            <hr>
                            <div class="content">
                                <p class="desc m-0"> Ngày bình luận : {{ $comment->created_at }}</p>
                                <button> Đánh Giá : {{ $comment->star }} Sao </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection



