<section class="banner-index">
    <div class="img">
        <img src="https://images.pexels.com/photos/1571470/pexels-photo-1571470.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Ảnh banner" class="w-100">
    </div>
    <div class="title">
        <h1 class="text-center"> Enjoy The Finest Homes</h1>
        <p class="text-center">From as low as $10 per day with limited time offer discounts.</p>
    </div>
    <div class="filter">
        <div class="container">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="buy" role="tabpanel" aria-labelledby="home-tab">
                    <form action="{{ route('user.search') }}" method="GET">
                        <div class="box-filter d-flex justify-content-between">
                            <div class="form-group m-0">
                                <select name="city" id="" class="select2">
                                    <option value=""> Chọn tỉnh/thành phố </option>
                                    @foreach($city as $cities)
                                        <option value="{{ $cities->id }}">{{ $cities->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group m-0">
                                <select name="district" id="" class="select2">
                                    <option value=""> Chọn quận/huyện </option>
                                    @foreach($district as $districts)
                                        <option value="{{ $districts->id }}">{{ $districts->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group m-0">
                                <select name="typeRoom" id="" class="select2">
                                    <option value=""> Loại phòng </option>
                                    @foreach($roomType as $type)
                                        <option value="{{ $type->id }}"> {{ $type->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group m-0">
                                <select name="price" id="" class="select2">
                                    <option value=""> Giá phòng (VNĐ)</option>
                                    <option value="2000000"> Dưới 2 triệu </option>
                                    <option value="2500000"> Từ 2 triệu đến 3 triệu </option>
                                    <option value="3500000"> Từ 3 triệu đến 4 triệu </option>
                                    <option value="4500000"> Từ 4 triệu đến 5 triệu </option>
                                    <option value="5000000"> Trên 5 triệu </option>
                                </select>
                            </div>
                            <div class="form-group m-0">
                                <select name="acreage" id="" class="select2">
                                    <option value=""> Diện tích (m2) </option>
                                    <option value="15">Dưới 15m2</option>
                                    <option value="20">Tư 15m2 đến 25m2</option>
                                    <option value="30">Từ 25m2 đến 35m2 </option>
                                    <option value="40">Từ 35m2 đến 45m2</option>
                                    <option value="45">Trên 45m2</option>
                                </select>
                            </div>
                            <div class="form-group m-0">
                                <button> Tìm Kiếm </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="rental" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="box-filter d-flex justify-content-between">
                        <div class="form-group m-0">
                            <input type="text" placeholder="Enter keyword">

                        </div>
                        <div class="form-group m-0">
                            <input type="text" placeholder="Enter keyword">

                        </div>
                        <div class="form-group m-0">
                            <input type="text" placeholder="Enter keyword">

                        </div>
                        <div class="form-group m-0">
                            <input type="text" placeholder="Enter keyword">

                        </div>
                        <div class="form-group m-0">
                            <button> Search  </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
