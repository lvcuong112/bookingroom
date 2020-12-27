<template>
    <div class="container">
        <section class="banner-page">
            <div class="container">
                <div class="box-title mb-4">
                    <h2 class="text-center">  Thuê trọ trên cả nước   </h2>
                    <div class="d-flex justify-content-center">
                        <p class="m-0 " > Tìm kiếm nhà trọ theo giá cả, khu vực, loại phòng ở mọi nơi </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="rent">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="box-title mb-4">
                            <h2 class="mb-4">  Tìm kiếm phòng trọ   </h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="result-alert d-flex align-items-center justify-content-between">
                            <p class="m-0"> 9 kết quả </p>
                            <div class="sortSelect d-flex align-items-center">
                                <p class="m-0 mr-2"> <strong> Sắp xếp theo:  </strong></p>
                                <div class="form-group m-0">
                                    <select name="typedata" id="" class="select2">
                                        <option value="0"> Mới nhất   </option>
                                        <option value="1"> Nhiều người thuê </option>
                                        <option value="2"> Gần nhất   </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row result">
                            <div class="col-md-6" :key="data.id" v-for="(data,index) in searchData">
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

                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="pagination mt-2 d-flex justify-content-center">
                            <li> 1</li>
                            <li class="active"> 2</li>
                            <li> 3</li>
                            <li> 4</li>
                            <li> 5</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: "search",
    data() {
        return {
            searchData: [],
        }
    },
    created() {
        let a = window.location.href;
        let param = a.slice(29);
        this.getSearchData(param);
    },
    methods: {
        getSearchData($id) {
            axios.get('/user/search?' + $id).then((res) => {
                console.log(res);
                if (res.status === 200) {
                    this.searchData = res.data;
                }
            }).catch(() => {
                console.log(err);
            })
        },
    }
};
</script>


