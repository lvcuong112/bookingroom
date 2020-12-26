<template>
    <div class="container">
        <section class="banner-page">
            <div class="container">
                <div class="box-title mb-4">
                    <h2 class="text-center">  Thuê nhà ở khắp cả nước  </h2>
                    <div class="d-flex justify-content-center">
                        <p class="m-0 " > Đặt phòng home stay, nhà nghỉ, khách sạn, resort ở mọi nơi bạn dừng chân </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="rent">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="box-title mb-4">
                            <h2 class="mb-4">  Những Bài Viết Đã Thích  </h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="result-alert d-flex align-items-center justify-content-between">
                            <p class="m-0"> {{ likeRoomData.length }} kết quả </p>
                        </div>
                        <div class="row result">
                            <div class="col-md-6" :key="data.id" v-for="data in likeRoomData">
                                <div class="house-item">
                                    <a :href="'/roomDetail/' + data.id">
                                        <div class="box-img d-flex align-items-center justify-content-center">
                                            <img :src="data.image" alt="Ảnh ngôi nhà">
                                            <p class="tab">
                                            </p>
                                        </div>
                                    </a>
                                    <div class="info">
                                        <p class="cate"> Giá Phòng <span> {{ data.price }} VNĐ</span> </p>
                                        <p class="name"> <a :href="'/roomDetail/' + data.id"> {{ data.title }}</a>  </p>
                                        <p class="address"> <i class="fas fa-map-marker-alt mr-2"></i> {{ data.address }}</p>
                                        <p class="desc">
                                            Số phòng ngủ: {{ data.quantity }}, Diện tích: {{ data.area }} m2
                                        </p>
                                        <p class="desc">
                                            Điện : {{ data.electric_price }}VNĐ/1 số , Nước : {{ water_price }}VNĐ/1 khối
                                        </p>
                                        <b class="desc" style="color: black">
                                            Ngày đăng bài : {{ data.public_date }}
                                        </b>

                                    </div>
                                </div>
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
    name:"viewLikeRoom",
    data () {
        return {
            likeRoomData:[]
        }
    },
    created() {
        this.getLikeRoomData();
    },
    methods : {
        getLikeRoomData () {
            axios.get('/likeRoomApi').then((res) => {
                if (res.status === 200) {
                    this.likeRoomData = res.data;
                    console.log(this.likeRoomData);
                }
            }).catch(() => {
                console.log(err);
            })
        }
    }
}
</script>


