<template>
    <div class="container">
        <section class="rent-detail">
            <div class="container">
                <div class="link-sumary mb-3 d-flex align-items-center" :key="data.id" v-for="(data,index) in roomDetailData">
                    <span> <a href="/">Trang chủ</a> </span>
                    <span> <i class="fas fa-caret-right"></i> </span>
                    <span> <a href="/room"> Thuê trọ </a> </span>
                    <span> <i class="fas fa-caret-right"></i> </span>
                    <span> <a href=""> Thông tin chi tiết trọ {{ data.title }} </a> </span>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div :key="data.id" v-for="(data,index) in roomDetailData">
                            <div class="box-title mb-4">
                                <h2>  {{ data.title}}  </h2>
                            </div>
                            <div class="info">
                                <p> <i class="fas fa-map-marker"></i> {{ data.address }} </p>
                                <p> <i class="fas fa-hotel"></i> {{ data.name }} </p>
                            </div>
                            <div class="content-detail">
                                <p>- Chỗ ở của chúng tôi thuộc loại {{ data.name }} . Có giá cả và các tiện tiện nghi phù hợp với nhiều phân khúc khách hàng.</p>

                                <p>- {{ data.description }}.</p>

                                <p>- Diện tích phòng trọ : <b>{{ data.area }} m2</b> , Số phòng : <b>{{ data.quantity }}</b></p>

                                <p v-if="data.live_with_owner === 1">- Chung chủ : <b>Có</b> </p>
                                <p v-else>- Chung chủ : <b>Không</b> </p>

                                <p>- {{ data.note }}</p>
                            </div>
                        </div>
                        <div class="box-title mt-5 mb-3">
                            <h2 class="title">  Tiện nghi phòng trọ  </h2>
                            <p class="desc"> <i>Các dịch vụ tiện nghi có tại phòng trọ </i></p>
                        </div>
                        <div class="utilities">
                            <div class="sub-title mb-3">
                                <ul class="d-flex flex-wrap">
                                    <li :key="data.id" v-for="(data,index) in roomFacilities">
                                        <i class="fas fa-tv"></i> {{ data.title }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-title mt-5 mb-3">
                            <h2 class="title">  Giá phòng   </h2>
                            <p class="desc"> <i>Giá phòng có thể thay đổi linh hoạt khi thống nhất với chủ trọ </i></p>
                        </div>
                        <ul class="table-price" :key="data.id" v-for="(data,index) in roomDetailData">
                            <li class="d-flex justify-content-between" >
                                <span> Một Tháng </span>
                                <strong> {{ data.price }}đ  </strong>
                            </li>
                            <li class="d-flex justify-content-between" >
                                <span> Ba Tháng </span>
                                <strong> {{ data.price + data.price + data.price }}đ  </strong>
                            </li>
                            <li class="d-flex justify-content-between" >
                                <span> Sáu Tháng </span>
                                <strong> {{ data.price + data.price + data.price + data.price + data.price + data.price }}đ  </strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="box-order" :key="data.id" v-for="(data,index) in roomDetailData">
                            <p class="price mb-4">
                                <strong>{{ data.price }}đ</strong>/Tháng
                            </p>
                            <div class="form-group">
                                <label for=""> Giá điện</label>
                                <input :value="data.electric_price + ' đ/1 số điện' " readonly>
                            </div>
                            <div class="form-group">
                                <label for=""> Giá nước </label>
                                <input :value="data.water_price + ' đ/1 khối nước' " readonly >
                            </div>

                            <div class="">
                                <button> <i class="fas fa-bolt"></i>
                                    Liên hệ thuệ phòng tại   {{ data.telephone }}
                                </button>
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
    name: "viewdetailroom",
    $route: window.location.href,

    data() {
        return {
            roomDetailData: [],
            roomFacilities: [],
            roomImage: []
        }
    },
    created() {
        let a = window.location.pathname;
        let param = a.slice(12);
        this.getDetailRoom(param);
        this.getRoomFacilities(param);
        this.getRoomImageDetail(param);
    },
    methods: {
        getDetailRoom($id) {
            axios.get('/roomDetailApi/' + $id).then((res) => {
                if (res.status === 200) {
                    this.roomDetailData = res.data;
                }
            }).catch(() => {
                console.log(err);
            })
        },
        getRoomFacilities($id) {
            axios.get('/roomFacilitiesApi/' + $id).then((res) => {
                if (res.status === 200) {
                    this.roomFacilities = res.data;
                }
            }).catch(() => {
                console.log(err);
            })
        },
        getRoomImageDetail($id) {
            axios.get('/roomImageDetailApi/' + $id).then((res) => {
                console.log(res);
                if (res.status === 200) {
                    this.roomImage = res.data;
                }
            }).catch(() => {
                console.log(err);
            })
        },
    }
};
</script>


