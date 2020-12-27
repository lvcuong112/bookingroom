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
                            <h2 class="mb-4">  Tìm kiếm chỗ nghỉ  </h2>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="rent-filter">
                            <div class="form-group">
                                <select name="city" class="form-control" v-model="searchInput.city" @change="onSearch(); filterDistrict()">
                                    <option :value="null"> Chọn tỉnh/thành phố </option>
                                    <option :value="data.id" :key="data.id" v-for="(data,index) in city"> {{ data.name }} </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="district" class="form-control" v-model="searchInput.district" @change="onSearch">
                                    <option :value="null"> Chọn quận/huyện </option>
                                    <option :value="data.id" :key="data.id" v-for="(data,index) in district"> {{ data.name }} </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="typeRoom" class="form-control" v-model="searchInput.typeRoom" @change="onSearch">
                                    <option :value="null"> Chọn loại phòng </option>
                                    <option :value="data.id" :key="data.id" v-for="(data,index) in typeRoom"> {{ data.name }} </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="price" class="form-control" v-model="searchInput.price" @change="onSearch">
                                    <option :value="null"> Chọn giá phòng (VNĐ)</option>
                                    <option :value="2000000"> Dưới 2 triệu </option>
                                    <option :value="2500000"> Từ 2 triệu đến 3 triệu </option>
                                    <option :value="3500000"> Từ 3 triệu đến 4 triệu </option>
                                    <option :value="4500000"> Từ 4 triệu đến 5 triệu </option>
                                    <option :value="5000000"> Trên 5 triệu </option>
                                </select>
                            </div>
                            <div class="form-group">
                                    <select v-model="searchInput.area" class="form-control" @change="onSearch">
                                    <option :value="null"> Chọn diện tích (m2)  </option>
                                    <option :value="15">Dưới 15m2</option>
                                    <option :value="20">Tư 15m2 đến 25m2</option>
                                    <option :value="30">Từ 25m2 đến 35m2 </option>
                                    <option :value="40">Từ 35m2 đến 45m2</option>
                                    <option :value="45">Trên 45m2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="result-alert d-flex align-items-center justify-content-between">
                            <p class="m-0"> {{ roomData.length }} kết quả </p>
                            <div class="sortSelect d-flex align-items-center">
                                <p class="m-0 mr-2"> <strong> Sắp xếp theo:  </strong></p>
                                <div class="form-group m-0">
                                    <select v-model="sortType" @change="onSort" class="form-control">
                                        <option :value="0"> Mới nhất   </option>
                                        <option :value="1"> Giá Phòng Giảm Dần</option>
                                        <option :value="2"> Giá Phòng Tăng Dần</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row result">
<!--                            {{roomData.slice(1, 2)}}-->
                            <div class="col-md-6" :key="data.id" v-for="data in roomData.slice((page - 1) * 6, page * 6)">
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
                                            Điện : {{ data.electric_price }}VNĐ/1 số , Nước : {{ data.water_price }}VNĐ/1 khối
                                        </p>
                                        <b class="desc" style="color: black">
                                            Ngày đăng bài : {{ data.public_date }}
                                        </b>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="pagination mt-2 d-flex justify-content-center">
                            <li v-for="index in total"
                                :class="page==index ? 'active' : ''"
                                @click="changePage(index)"> {{index}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name:"viewallroom",
    data () {
        return {
            roomData:[],
            city: [],
            district: [],
            typeRoom: [],
            allRoom: [],
            searchInput: {
                'city': null,
                'district': null,
                'typeRoom': null,
                'price': null,
                'area': null
            },
            sortType: null,
            total: 0,
            page: 1,
            allDistrict: []
        }
    },
    created() {
        this.getRoomData();
        this.getCity();
        this.getDistrict();
        this.getTypeRoom();
    },
    methods : {
        changePage (index) {
            console.log(index)
            this.page = index
        },
        getRoomData () {
            axios.get('/roomApi').then((res) => {
                if (res.status === 200) {
                    this.roomData = res.data;
                    this.allRoom = res.data;
                    this.total = parseInt(res.data.length / 6) + 1
                    // let count = count(this.roomData);
                    // console.log(count);
                }
            }).catch(() => {
                console.log(err);
            })
        },
        getCity () {
            axios.get('/cityApi').then((res) => {
                if (res.status === 200) {
                    this.city = res.data;
                }
            }).catch(() => {
                console.log(err);
            })
        },
        getDistrict () {
            axios.get('/districtApi').then((res) => {
                if (res.status === 200) {
                    this.allDistrict = res.data;
                }
            }).catch(() => {
                console.log(err);
            })
        },
        getTypeRoom () {
            axios.get('/roomTypeApi').then((res) => {
                if (res.status === 200) {
                    this.typeRoom = res.data;
                }
            }).catch(() => {
                console.log(err);
            })
        },
        filterDistrict () {
            this.district = [];
            this.allDistrict.forEach( district => {
                if (district.city_id == this.searchInput.city) {
                    this.district.push(district);
                }
            })
        },
        onSearch () {
            let roomFilter = []
            if (this.searchInput.city == null) {

            }
            if (this.searchInput.typeRoom == null) {

            }
            if (this.searchInput.district == null) {

            }
            this.allRoom.forEach(room => {
                let check = true
                if (this.searchInput.typeRoom != null && room.roomType_id != this.searchInput.typeRoom) {
                    check = false
                }
                if (this.searchInput.city != null && room.city_id != this.searchInput.city) {
                    check = false
                }
                if (this.searchInput.district != null && room.district_id != this.searchInput.district) {
                    check = false
                }
                if (this.searchInput.price != null) {
                    let price = this.searchInput.price
                    switch (price) {
                        case 2000000:
                            if (room.price > 2000000) check = false;
                            break;
                        case 2500000:
                            if (room.price < 2000000 || room.price > 3000000) check = false;
                            break;
                        case 3500000:
                            if (room.price < 3000000 || room.price > 4000000) check = false;
                            break;
                        case 4500000:
                            if (room.price < 4000000 || room.price > 5000000) check = false;
                            break;
                        case 5000000:
                            if (room.price < 5000000) check = false;
                            break;
                    }
                }
                if (this.searchInput.area != null) {
                    let area = this.searchInput.area
                    switch (area) {
                        case 15:
                            if (room.area > 15) check = false;
                            break;
                        case 20:
                            if (room.area < 15 || room.area > 25) check = false;
                            break;
                        case 30:
                            if (room.area < 25 || room.area > 35) check = false;
                            break;
                        case 40:
                            if (room.area < 35 || room.area > 45) check = false;
                            break;
                        case 45:
                            if (room.area < 45) check = false;
                            break;
                    }
                }

                if (check == true) {
                    roomFilter.push(room)
                }
            })
            this.roomData = roomFilter
            this.total = parseInt(roomFilter.length / 6) + 1
        },
        onSort () {
            switch (this.sortType) {
                case 0:
                    this.roomData.sort((a,b) => {
                        if (Date.parse(a.public_date) > Date.parse(b.public_date)) return -1
                        if (Date.parse(a.public_date) < Date.parse(b.public_date)) return 1
                        return 0
                    })
                    break;
                case 1:
                    this.roomData.sort((a,b) => {
                        if (a.price > b.price) return -1
                        if (a.price < b.price) return 1
                        return 0
                    })
                    break;
                case 2:
                    this.roomData.sort((a,b) => {
                        if (a.price > b.price) return 1
                        if (a.price < b.price) return -1
                        return 0
                    })
                    break;
            }
        }
    }
}
</script>


