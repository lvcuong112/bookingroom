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
                                    <option value=""> Chọn tỉnh </option>
                                    @foreach($city as $cities)
                                        <option value="{{ $cities->id }}">{{ $cities->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group m-0">
                                <input type="text" placeholder="Quận/Huyện" name="district">
                            </div>
                            <div class="form-group m-0">
                                <input type="number" placeholder="Giá tiền" name="price">
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
                                <input type="number" placeholder="Diện tích (m2)" name="acreage">
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
