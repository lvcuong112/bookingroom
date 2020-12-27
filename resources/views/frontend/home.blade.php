@extends('frontend.layouts.main')
@section('content')
    <div id="app">
        <section class="feature container  py-5">
            <div class="box-title mb-4">
                <h2> Sản phẩm thịnh hành  </h2>
                <div class="d-flex justify-content-between">
                    <p class="m-0"> Nhà trọ được quan tâm nhiều nhất? </p>
                    <p class="m-0"> <a href="/room" class="viewall"> View All <span> <i class="fas fa-chevron-right"></i> </span></a></p>
                </div>
            </div>
            <div class="product-slick">
                 <@php($i = 1)
                @foreach($roomApi as $data)
                    <div class="product-slick-item">
                        <a href="/roomDetail/{{ $data->id }}">
                            <div class="product">
                                <div class="tab d-flex" >
                                    <span class="mr-2 city"> {{ $data->title }} </span>
                                    <span class="mr-2 bg-red"> Top {{ $i++ }} trending </span>
                                </div>
                                <div class="img">
                                    <img src="{{ $data->image }}" alt="">
                                </div>
                                <div class="content">
                                    <p class="price mb-2"> <strong> {{ $data->price }} </strong>/<span>{{ $data->price_unit }}</span></p>
                                    <p class="name mb-2"> {{ $data->address }} </p>
                                    <p class="desc m-0"> Số phòng: {{ $data->quantity }}, Diện tích : {{ $data->area }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
        <home-component><home-component>
    </div>
@endsection


