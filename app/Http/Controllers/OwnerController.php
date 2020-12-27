<?php

namespace App\Http\Controllers;

use App\ExtendPost;
use App\City;
use App\District;
use App\Facilities;
use App\RequestEditRoom;
use App\Room_facilities;
use App\Room;
use App\Room_image;
use App\Room_type;
use App\User;
use App\User_like;
use App\UserAcc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{


    public function  login() {
        if(!Auth::check()) {
            return view('owner.login');
        } else {

            $user = Auth::user();
            if($user->role_id == 2 ) {
                return redirect(route('owner.room.index'));
            } else if($user->role_id == 3) {
                return redirect('/');
            } else if ($user->role_id == 1 ) {
                return redirect('/admin');
            }
        }
    }

    public function postLogin(Request $request)
    {
        //validate du lieu
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];


        // check success
        if (Auth::attempt($data, $request->has('remember'))) {
            $user = Auth::user();
            if($user->is_active == 0) {
                Auth::logout();
                return redirect()->back()->with('msg', 'Tài khoản của bạn chưa được kích hoạt');
            } else {
                if($user->role_id == 2 ) {
                    return redirect(route('owner.room.index'));
                } else if($user->role_id == 1) {
                    return redirect('/');
                }
            }
        }
        return redirect()->back()->with('msg', 'Email hoặc Password không chính xác');
    }

    public function logout()
    {
        $user = Auth::user();
        Auth::logout();
        // chuyển về trang đăng nhập
        if($user->role_id == 2) {
            return redirect()->route('owner.login');
        }
        else if ($user->role_id == 1 || $user->role_id == 3) {
            return redirect('/');
        }
    }

    public function getAllRoom()
    {
        $user = Auth::user();
        $list = Room::where(['user_id' => $user->id])->orderBy('created_at', 'ASC')->get();

        // xu ly het han bai dang
        $getDate = date('Y-m-d');
        foreach ($list as $value) {
            if ($getDate > $value->expired_date) {
                $value->is_active = 0;
            }
            $checkEdit = $value->canbe_edit;
        }
        return view('owner.room.index', [
            'list' => $list,
            'checkEdit' => $checkEdit
        ]);
    }

    public function getAllUnApprovedRoom()
    {
        $user = Auth::user();
        $list = Room::where(['user_id' => $user->id, 'approved_id' => null])->orderBy('created_at', 'ASC')->get();
        return view('', [
            'list' => $list
        ]);
    }

    public function showRoomDetail($id)
    {
        $data = Room::findorFail($id);
        $roomTypeName = Room_type::where('id', $data->roomType_id)->first();
        $facilities = $data->facilities()->get();
        $room_detailImages =  Room_image::where(['room_id' => $data->id ])->orderBy('position', 'ASC')->get();
        $getDate = date('Y-m-d');
        $expiredDate = $data->expired_date;
        if ($getDate > $expiredDate) {
            $data->is_active = 0;
        }

        $show_Request = 0;
        $request_edit = RequestEditRoom::where(['room_id' => $id])->first();
        if($request_edit == null) {
            $show_Request = 1;
        }

        $canEdit = $data->canbe_edit;
        return view('owner.room.show', [
            'data' => $data,
            'roomTypeName' => $roomTypeName->name,
            'room_detailImages' => $room_detailImages,
            'facilities' => $facilities,
            'getDate' => $getDate,
            'show_Request' => $show_Request

        ]);
    }
    public function require_extendDate(Request $request, $room_id)
    {
        // mac dinh unit_date: 1 la tuan, 2 la thang, 3 la nam
        // mac dinh gia tien cho thue la 50k 1 tuan
        $p = 50000;
        $total_price = 0;
        $unit_date = $request->input('unit_date');
        $q = $request->input('quantity');
        $r = new ExtendPost();
        $user = Auth::user();
        $r->room_id = $room_id;
        $r->user_id = $user->id;
        $r->quantity = $request->input('quantity');
        $r->unit_date = $unit_date;
        if($unit_date == 1) { // tuan
            $total_price = $p*$q;
        } else if ($unit_date == 2 ) { // thang
            $total_price = $p*$q*4;
        } else { // nam
            $total_price = $p*$q*52;
        }
        $r->total_price = $total_price;
        $r->save();
    }

    public function register() {
        return view('owner.register');
    }

    public function postRegister() {
        dd(1);
        // luu thong tin dang ki
    }

    public function viewCreateRoom() {
        $typeRoom = Room_type::all();
        $city = City::all();
        $district = District::all();
        $facility = Facilities::all();
        return view('owner.room.create', [
            'typeRoom' => $typeRoom,
            'city' => $city,
            'district' => $district,
            'facility' => $facility
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);
        $user = Auth::user();
        $room = new Room(); // khởi tạo model
        $room->roomType_id = $request->input('typeRoom');
        $room->title = $request->input('title');
        $room->address = $request->input('address');
        $room->district_id = $request->input('district');
        $room->city_id = $request->input('city');
        $room->quantity = $request->input('quantity');
        $room->price = $request->input('price');
        $room->price_unit = $request->input('priceUnit');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path_upload = 'uploads/room/';
            $request->file('image')->move($path_upload, $filename);
            $room->image = $path_upload . $filename;
        }
        $room->area = $request->input('area');
        $room->note = $request->input('note');
        $room->description = $request->input('description');
        $live_with_owner = 0;
        if ($request->has('with_owner')) {
            $live_with_owner = $request->input('with_owner');
        }
        $room->live_with_owner = $live_with_owner;

        $room->electric_price = $request->input('electricPrice');
        $room->water_price = $request->input('waterPrice');
        $room->user_id = $user->id;
        $is_active = 0;
        $room->is_active = $is_active;
        $facilities = $request->input('facilities');
        $room->save();
        if ($request->hasFile('detailImage')) {
            $file = $request->file('detailImage');
            $path_upload = 'uploads/room/';
            foreach ($file as $key => $item){
                $r_image = new Room_image();
                $r_image->room_id = $room->id;
                $r_image->position = $key;
                $f_name = time().'_'.$item->getClientOriginalName();
                $item->move($path_upload, $f_name);
                $r_image ->image = $path_upload.$f_name;
                $r_image->save();
            };
        }
        $room->Facilities()->syncWithoutDetaching($facilities);
        return redirect()->route('owner.room.index')->with('msg', 'Hãy Click vào xem thông tin chi tiết để gia hạn bài đăng và đợi Amdin duyệt .Xin cảm ơn !!');
    }

    public function viewEditRoom($id)
    {
        $room = Room::findorFail($id);
        $typeRoom = Room_type::all();
        $facility = Facilities::all();
        $room_facilities = Room_facilities::where(['room_id' => $id])->get();
        $exists_facilities = [];
        $room_detailImages =  Room_image::where(['room_id' => $room->id ])->orderBy('position', 'ASC')->get();
        $city = City::all();
        $district = District::all();
        foreach($room_facilities as $item) {
            array_push($exists_facilities,$item->facilities_id );
        }
        $arrPickedCity = DB::table('room')->join('city', 'room.city_id', '=', 'city.id')->where([
            'room.id' => $id
        ])->get();
        $pickedCity = $arrPickedCity[0];
        $arrPickedDistrict = DB::table('room')->join('district', 'room.district_id', '=', 'district.id')->where([
            'room.id' => $id
        ])->get();
        $pickedDistrict = $arrPickedDistrict[0];
        $arrPickedTypeRoom = DB::table('room')->join('room_type', 'room.roomType_id', '=', 'room_type.id')->where([
            'room.id' => $id
        ])->get();
        $pickedTypeRoom = $arrPickedTypeRoom[0];

        return view('owner.room.edit', [
            'room' => $room,
            'typeRoom' => $typeRoom,
            'city' => $city,
            'district' => $district,
            'facility' => $facility,
            'room_detailImages' => $room_detailImages,
            'exists_facilities' => $exists_facilities,
            'pickedCity'=> $pickedCity,
            'pickedDistrict' => $pickedDistrict,
            'pickedTypeRoom' =>$pickedTypeRoom
        ]);
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);

        $room =  Room::findorFail($id); // khởi tạo model
        $room->roomType_id = $request->input('typeRoom');
        $room->title = $request->input('title');
        $room->address = $request->input('address');
        $room->district_id = $request->input('district');
        $room->city_id = $request->input('city');
        $room->quantity = $request->input('quantity');
        $room->price = $request->input('price');
        // Upload file
        if ($request->hasFile('new_image')) { // dòng này Kiểm tra xem có image có được chọn

            @unlink(public_path($room->image)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi
            // get file
            $file = $request->file('new_image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/room/';
            // Thực hiện upload file
            $request->file('new_image')->move($path_upload,$filename); // upload lên thư mục public/uploads/product

            $room->image = $path_upload.$filename;
        }
        // edit anh chi tiet da co
        $list_ImageDetail = Room_image::where(['room_id' => $room->id])->get();
        foreach ($list_ImageDetail as $item)
        {
            if ($request->hasFile('new_image'.$item->id)) { // dòng này Kiểm tra xem có image có được chọn
                $i_detail = Room_image::findOrFail($item->id);
                @unlink(public_path($i_detail->image)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi
                // get file
                $file = $request->file('new_image'.$item->id);
                // đặt tên cho file image
                $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
                // Định nghĩa đường dẫn sẽ upload lên
                $path_upload = 'uploads/room/';
                // Thực hiện upload file
                $request->file('new_image'.$item->id)->move($path_upload,$filename); // upload lên thư mục public/uploads/product

                $i_detail->image = $path_upload.$filename;
                $i_detail->save();
            }
        }
//         them anh chi tiet sp
        if ($request->hasFile('new_detailImage')) {
            // get file
            $file = $request->file('new_detailImage');
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/room/';
//                // Thực hiện upload file
            foreach ($file as $key => $item){
                $r_image = new Room_image();
                $r_image->room_id = $room->id;
                $r_image->position = $key;
                $f_name = time().'_'.$item->getClientOriginalName();
                $item->move($path_upload, $f_name);
                $r_image ->image = $path_upload.$f_name;
                $r_image->save();
            }

        }

        $room->area = $request->input('area'); // diện tích
        $room->note = $request->input('note');
        $live_with_owner = 0;
        if ($request->has('with_owner')){
            $live_with_owner = $request->input('with_owner');
        }
        $room->live_with_owner = $live_with_owner;
        $room->expired_date = $request->input('expiredDate');
        $room->electric_price = $request->input('electricPrice');
        $room->water_price = $request->input('waterPrice');
        $is_active = 0;
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $room->is_active = $is_active;
        $room->price_unit = $request->input('priceUnit');
        $facilities = $request->input('facilities');
        $room->save();
        $room->Facilities()->syncWithoutDetaching($facilities);
//        $room->Room_image()->syncWithoutDetaching($detaiImage);


        // chuyển hướng đến trang
        return redirect(route('owner.room.index'))->with('msg', 'Sửa Đổi Thông Tin Phòng Thành Công');
    }

    public function viewExtend ($roomId)
    {
        $data = $roomId;
        return view('owner.room.extend', [
            'data' => $data,
        ]);
    }
    public function postExtend (Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;
        $userData = UserAcc::where(['id' => $userId])->get();
        foreach ($userData as $data) {
            $phoneData = $data->phone;
        }
        $postExtend = new ExtendPost(); // khởi tạo model
        $postExtend->room_id = $request->input('room_id');
        $postExtend->unit_date = $request->input('unit_date');
        $postExtend->quantity = $request->input('quantity');
        $postExtend->total_price = $request->input('total_price');
        $postExtend->user_id = $userId ;
        $postExtend->phone = $phoneData;
        $postExtend->save();
        return redirect(route('owner.room.index'))->with('msg', 'Yêu cầu thành công . Vui lòng đợi Admin duyệt');
    }

    public function requestEditRoom($room_id)
    {
        $room = Room::findOrFail($room_id);
        return view('owner.room.requestEditRoom', [
            'room_id' => $room_id,
            'room_title' => $room->title
        ]);
    }
    public function sendRequestEditRoom(Request $request)
    {
        $r = new RequestEditRoom();
        $user = Auth::user();
        $r->user_id = $user->id;
        $r->room_id = $request->input('room_id');
        $r->reason = $request->input('reason');
        $r->save();

        return redirect()->route('owner.room.show', ['id'=> $request->input('room_id') ]);
    }
    public function userIndex ()
    {
        $user = Auth::user();
        $data = User::where(['id' => $user->id])->get();
        return view('owner.account.index', [
            'data' => $data // truyền dữ liệu sang view Index
        ]);
    }
    public function userShow ($id)
    {
        $user = User::findorFail($id);
        return view('owner.account.show', [
            'user' => $user
        ]);
    }
    public function userEdit ($id)
    {
        $user = User::findorFail($id);
        return view('owner.account.edit', [
            'user' => $user
        ]);
    }
    public function postUserEdit(Request $request, $id)
    {
        //validate
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);

        $user = User::findorFail($id);

        $is_active = 0;
        if ($request->has('is_active')) { // kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }

        //luu vào csdl
        $user->name = $request->input('name'); // họ tên
        $user->email = $request->input('email'); // email
        $user->role_id = $request->input('role_id'); // phân quyền
        $user->birthday = $request->input('birthday');
        $user->phone = $request->input('phone');
        $user->cmnd = $request->input('cmnd');
        $user->address = $request->input('address');
        if ($request->input('new_password')) {
            $user->password = bcrypt($request->input('new_password')); // mật khẩu mới
        }

        if ($request->hasFile('new_avatar')) {
            // xóa file cũ
            @unlink(public_path($user->avatar)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi
            // get file
            $file = $request->file('new_avatar');
            // get ten
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/user/';
            // upload file
            $request->file('new_avatar')->move($path_upload,$filename);

            $user->image = $path_upload.$filename;
        }

        $user->is_active = $is_active;
        $user->save();

        // chuyen dieu huong trang
        return redirect()->route('owner.userShow', ['id' => $user->id])->with('msg', 'Cập nhật tài khoản thành công.');
    }
    public function countLike ()
    {
        $user = Auth::user();
        $data = User::where(['id' => $user->id])->get();
        foreach ($data as $userData) {
            $userId = $userData->id;
        }
        $roomData = [];
        $likeData = Room::where(['room.user_id' => $userId])->get();
        foreach ($likeData as $data) {
            $roomId = $data->id;
            $countLike = User_like::where(['room_id' => $roomId])->count();
            array_push($roomData, $data);
            array_push($roomData, $countLike);
        }
        return view('owner.countLike', [
            'roomData' => $roomData
        ]);
    }
    public function search (Request $request) {
        $searchInput = $request->input('table_search');
        $searchData = DB::table('room')->where('title','like', '%'. $searchInput.'%')->get();
        foreach ($searchData as $check) {
            $checkEdit = $check->canbe_edit;
        }
        return view('owner.search', [
            'searchData' => $searchData,
            'checkEdit' => $checkEdit
        ]);
    }
}
