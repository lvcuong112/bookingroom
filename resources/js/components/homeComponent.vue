<template>
    <div class="container">
        <section class="feature container  py-5">
            <div class="box-title mb-4">
                <h2> Sản phẩm thịnh hành  </h2>
                <div class="d-flex justify-content-between">
                    <p class="m-0"> Nhà trọ được quan tâm nhiều nhất? </p>
                    <p class="m-0"> <a href="/room" class="viewall"> View All <span> <i class="fas fa-chevron-right"></i> </span></a></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3" :key="data.id" v-for="(data,index) in homeData">
                        <a :href="'/roomDetail/' + data.id" :to="{params: {id: data.id }}">
                            <div class="product">
                                <div class="tab d-flex" >
                                    <span class="mr-2 city"> {{ data.title }} </span>
                                    <span class="mr-2 bg-red"> Top {{index + 1}} trending </span>
                                </div>
                                <div class="img">
                                    <img :src="data.image" alt="">
                                </div>
                                <div class="content">
                                    <p class="price mb-2"> <strong> {{ data.price }} </strong>/<span>{{ data.price_unit }}</span></p>
                                    <p class="name mb-2"> {{ data.address }} </p>
                                    <p class="desc m-0"> số phòng: {{ data.quantity }}, Diện tích : {{ data.area }}</p>
                                </div>
                            </div>
                        </a>
                </div>
            </div>


        </section>
        <section class="category">
            <div class="container">
                <div class="box-title mb-5">
                    <h2 class="text-center"> Bạn đang tìm kiếm những gì?   </h2>
                    <div class="d-flex justify-content-center">
                        <p class="m-0"> Chúng tôi cung cấp đủ các loại hình nhà trọ để phục vụ tốt nhất </p>
                    </div>
                </div>
                <div class="cate-box">
                    <div class="row">
                        <form action="user/search" class="col-md-4">
                                <div class="box-item">
                                    <div class="icon  d-flex justify-content-center align-items-center">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <input type="hidden" value="1" name="typeRoom">
                                    <p class="name text-center">Trung Cư</p>
                                    <p class="desc text-center"> Những trung cư với đầy đủ tiện nghi</p>
                                    <p class="text-center m-0"><button type="submit">Tìm kiếm</button></p>
                                </div>
                        </form>
                        <form action="user/search" class="col-md-4">
                            <div class="box-item">
                                <div class="icon  d-flex justify-content-center align-items-center">
                                    <i class="fas fa-hotel"></i>
                                </div>
                                <input type="hidden" value="2" name="typeRoom">
                                <p class="name text-center"> Trung Cư Mini  </p>
                                <p class="desc text-center"> Những trung cư nhỏ tiện nghi giá rẻ </p>
                                <p class="text-center m-0">  <button type="submit">Tìm kiếm</button></p>
                            </div>
                        </form>
                        <form action="user/search" class="col-md-4">
                            <div class="box-item">
                                <div class="icon  d-flex justify-content-center align-items-center">
                                    <i class="fas fa-memory"></i>
                                </div>
                                <input type="hidden" value="3" name="typeRoom">
                                <p class="name text-center"> Nhà Trọ  </p>
                                <p class="desc text-center"> Những trọ với những tiện nghi khác nhau</p>
                                <p class="text-center m-0"> <button type="submit">Tìm kiếm</button></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="address py-5">
            <div class="container">
                <div class="box-title mb-5">
                    <h2 class="text-center"> Thành phố bạn muốn thuê trọ </h2>
                    <div class="d-flex justify-content-center">
                        <p class="m-0"> Chúng tôi cung cấp đầy đủ dịch vụ thuê trọ các thành phố  </p>

                    </div>
                </div>
                <div class="cities">
                    <div class=" row">
                        <div class="col-md-6">
                            <form action="user/search">
                                <div class="product city">
                                    <button type="submit">
                                        <div class="img">
                                            <img src="https://images.pexels.com/photos/1838640/pexels-photo-1838640.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                                        </div>
                                    </button>
                                    <div class="content">
                                        <input type="hidden" value="1" name="city">
                                        <p class="price mb-2"> <strong> Hà Nội  </strong></p>
                                        <p class="desc m-0">  Thuê trọ tại khu vực Hà Nội </p>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <div class="col-md-6">
                            <form action="user/search">
                                <div class="product city">
                                    <button type="submit" style="width: 100%;height: 120%;" >
                                        <div class="img">
                                            <img src="https://images.pexels.com/photos/457882/pexels-photo-457882.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                                        </div>
                                    </button>
                                    <div class="content">
                                        <input type="hidden" value="2" name="city">
                                        <p class="price mb-2"> <strong> Hồ Chí Mình  </strong></p>
                                        <p class="desc m-0">  Thuê trọ tại khu vực Hồ Chí Minh </p>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <a href="/room" class="seemore">  Xem thêm </a>
                    </div>
                </div>

            </div>
        </section>
        <section class="relation-address">
            <div class="content">
                <div class="box-title mb-4">
                    <h2 class="text-center"> Tìm nhà trọ quanh địa điểm nổi tiếng</h2>
                    <p class="text-center"> Có thể tìm nhà xung quanh các trường đại học </p>
                </div>
                <div class="form-group d-flex justify-content-center">

                    <a href="/room"><button class="ml-3"> Tìm kiếm ngay  </button></a>
                </div>
            </div>
        </section>
        <section class="blog-index">
            <div class="container">
                <div class="box-title mb-5">
                    <h2 class="text-center"> Top phòng trọ rẻ nhất </h2>
                    <p class="text-center"> Tham khảo giá tiền để thuận tiện cho việc tìm kiếm trọ  </p>
                </div>
                <div class="row">
                    <div class="col-lg-4" :key="data.id" v-for="(data,index) in cheapHomeData">
                        <div class="blog">
                            <div class="img">
                                <img :src="data.image" alt="" class="img-fluid">
                            </div>
                            <div class="content">
                                <p class="price mb-2"> <strong> {{ data.price }} </strong>/<span>{{ data.price_unit }}</span></p>
                                <p class="name mb-2"> {{ data.address }} </p>
                                <p class="desc m-0"> số phòng: {{ data.quantity }}, Diện tích : {{ data.area }}</p>
                                <a :href="'/roomDetail/' + data.id" :to="{params: {id: data.id }}"><button> Xem chi tiết </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name:"viewhome",
    data () {
      return {
          homeData:[],
          cheapHomeData: []
      }
    },
    created() {
        this.getHomeData();
        this.getCheapHomeData();
    },
    methods : {
        getHomeData () {
            axios.get('/homeApi').then((res) => {
                console.log(res);
                if (res.status === 200) {
                    this.homeData = res.data;
                }
            }).catch(() => {
                console.log(err);
            })
        },
        getCheapHomeData () {
            axios.get('/cheapHomeApi').then((res) => {
                console.log(res);
                if (res.status === 200) {
                    this.cheapHomeData = res.data;
                }
            }).catch(() => {
                console.log(err);
            })
        }
    }
}
</script>


