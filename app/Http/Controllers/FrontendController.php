<?php


namespace App\Http\Controllers;


use App\Room;
use App\Room_facilities;
use App\Room_image;
use App\Room_type;
use App\District;
use App\City;
use App\User;
use App\User_comment;
use App\User_like;
use App\User_views;
use App\User_vote;
use App\UserAcc;
use App\User_report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FrontendController
{
    //home
    public function index()
    {
        $roomType = Room_type::all();
        $city = City::all();
        $district = District::all();
        $roomApi = Room::orderBy('views', 'desc')->where(['is_active' => 1])->limit(8)->get();
        return view('frontend.home', [
            'roomType' => $roomType,
            'city' => $city,
            'district' => $district,
            'roomApi' => $roomApi
        ]);
    }
    public function homeApi()  // api trang chủ
    {
        $roomApi = Room::orderBy('views', 'desc')->where(['is_active' => 1])->limit(8)->get();
        return json_encode($roomApi);
    }
    public function cheapHomeApi() // top phòng trọ rẻ nhất
    {
        $roomApi = Room::orderBy('price', 'asc')->limit(3)->get();
        return json_encode($roomApi);
    }
    //room
    public function room ()
    {
        $roomType = Room_type::all();
        return view('frontend.room', [
            'roomType' => $roomType
        ]);
    }
    public function roomApi ()
    {
        $roomData = Room::where(['is_active' => 1])->get();
        return json_encode($roomData);

    }
    public function cityApi ()
    {
        $dataCity = City::all();
        return json_encode($dataCity);
    }
    public function districtApi ()
    {
        $dataDistrict = District::all();
        return json_encode($dataDistrict);
    }
    public function roomTypeApi ()
    {
        $dataRoomType = Room_type::all();
        return json_encode($dataRoomType);
    }
    public function roomDetail($id)
    {
        $data = Room::findorFail($id);
        $roomId = $data->id;
        $roomType = Room_type::all();
        $imageRoomDetail = DB::table('room_image')->where(['room_image.room_id' => $id])->get();
        $countLike = User_like::where(['room_id' => $roomId])->count();
        return view('frontend.roomdetail', [
            'roomType' => $roomType,
            'imageRoomDetail' => $imageRoomDetail,
            'roomId' => $roomId,
            'countLike' => $countLike
        ]);
    }
    public function roomDetailApi($id)
    {
        $roomDetailApi = DB::table('room')
                ->join('room_type', 'room.roomType_id', '=', 'room_type.id')
                ->where(['room.id' => $id])->get();
        return json_encode($roomDetailApi);
    }
    public function roomFacilitiesApi ($id)
    {
        $roomFacilitiesApi = DB::table('room_facilities')
            ->join('facilities', 'room_facilities.facilities_id', '=', 'facilities.id')
            ->where(['room_facilities.room_id' => $id])->get();
        return json_encode($roomFacilitiesApi);
    }
    public function imageRoomDetailApi ($id)
    {
        $imageRoomDetailApi = DB::table('room_image')
            ->where(['room_image.room_id' => $id])->get();
        return json_encode($imageRoomDetailApi);
    }
    //login register
    public function customerLogin (Request $Request)
    {
        $username = $Request->input('username');
        $password = md5($Request->input('password'));
        $is_active = 1;
        $roleCustomerId = 3;
        $roleOwnerId = 2;
        $customer = UserAcc::where([
            'email' => $username,
            'password' => $password
        ])->get();
        if (count($customer) == 0) {
            return redirect()->route('home')->with('msg', 'Vùi lòng kiểm tra lại tài khoản !!');
        } else {
            $checkStatus = UserAcc::where([
                'email' => $username,
                'is_active' => $is_active
            ])->get();
            if (count($checkStatus) == 0) {
                return redirect()->route('home')->with('msg', 'Tài khoản của bạn đã bị vô hiệu hóa !!');
            } else {
                foreach ($checkStatus as $data)
                if($data->role_id == $roleCustomerId) {
                    session(['customer'=>$username]);
                    return redirect(route('home'));
                } else if ($data->role_id == $roleOwnerId) {
                    session(['owner'=>$data->name]);
                    return redirect(route('home'));
                }
            }
        }
    }
    public function logout ()
    {
        if (session('customer')) {
            session()->forget('customer');
            return redirect(route('home'));
        }
        if (session('owner')) {
            session()->forget('owner');
            return redirect(route('home'));
        }
    }
    public function register ()
    {
        return view('frontend.register');
    }
    public function CustomerRegister (Request $Request)
    {
        $email = $Request->input('email');
        $customer = UserAcc::where([
            'email' => $email
        ])->get();
        if (count($customer) == 0) {
            $email = $Request->input('email');
            $password = md5($Request->input('password'));
            $role = $Request->input('roleId');
            $name = $Request->input('name');
            $birthday = $Request->input('birthday');
            $cmnd = $Request->input('cmnd');
            $mobile =$Request->input('phone');
            $address = $Request->input('address');
            $image = $Request->input('image');
            UserAcc::insert(
                array(
                    'email' => $email,
                    'password' => $password,
                    'role_id' => $role,
                    'name' => $name,
                    'address' => $address,
                    'birthday' => $birthday,
                    'CMND' => $cmnd,
                    'phone' => $mobile,
                    'image' => $image,
                    'is_active' => 1
                )
            );
            return redirect(route('home'))->with('msg', 'Đăng ký thành công . Vui lòng đăng nhập để sử dụng tiện ích ');
        } else {
            return redirect(route('frontRegister'))->with('msg','Tài khoản đã tồn tại');
        }
    }
    public function myAccount () {
        return view('frontend.myaccount');
    }
    public function accountApi (Request $request)
    {
        $userData = $request->session('customer')->get('customer');
        $customerData = UserAcc::where(['email' => $userData])->get();
        foreach ($customerData as $data) {
            $userId = $data->id;
        }
        $info = UserAcc::where(['id' => $userId])->get();
        return json_encode($info);
    }
    public function rePassword (Request $request)
    {
        $userData = $request->session('customer')->get('customer');
        $customerData = UserAcc::where(['email' => $userData])->get();
        foreach ($customerData as $data) {
            $userId = $data->id;
        }
        $customer = UserAcc::findorFail($userId);
        $oldPass = md5($request->input('password'));
        $newPass = md5($request->input('newPassword'));
        $checkPass = UserAcc::where(['id' => $userId])->get();
        foreach ($checkPass as $data) {
            $checkPass = $data->password;
        }
        if ($oldPass != $checkPass){
            return redirect()->back()->with('msg', 'Mật Khẩu của bạn nhập không đúng . Xin vui lòng kiểm tra lại !!');
        } else {
            $customer->password = $newPass;
            $customer->save();
            return redirect()->back()->with('msg', 'Đổi mật khẩu thành công !!');
        }
    }
    public function likeRoom ()
    {
        return view('frontend.likeRoom');
    }
    public function likeRoomApi (Request $request)
    {
        $userData = $request->session('customer')->get('customer');
        $customerData = UserAcc::where(['email' => $userData])->get();
        foreach ($customerData as $data) {
            $userId = $data->id;
        }
        $likeRoom = DB:: table('user_like')->join('room' , 'room.id', '=', 'user_like.room_id')
                                                ->where(['user_like.user_id' => $userId])->get();
        return json_encode($likeRoom);
    }

    //search
    public function search ()
    {
        return view('frontend.search');
    }
    public function searchApi(Request $request)
    {
        $city = $request->input('city');
        $district = $request->input('district');
        $price = $request->input('price');
        $typeRoom = $request->input('typeRoom');
        $acreage = $request->input('acreage'); // diện tích

        $room = Room::query();
        if($request->has('city')) {
            $room->where('city_id', '=', $city);
        }
        if($request->has('district')) {
            $room->where('district_id' , '=', $district);
        }
        if($request->has('typeRoom')) {
            $room->where('room.roomType_id', 'like','%'. $typeRoom. '%');
        }
        if($request->has('acreage')) {
            $room->where('area', '=', $acreage );
        }
        $data = $room->get();
        return json_encode($data);
    }
    public function customerLike (Request $request)
    {
        $userData = $request->session('customer')->get('customer');
        $customerData = UserAcc::where(['email' => $userData])->get();
        foreach ($customerData as $data) {
            $userId = $data->id;
        }
        $roomId = $request->input('roomId');
        if (User_like::where(['room_id' => $roomId, 'user_id' => $userId])->exists()) {
            return redirect()->back()->with('msg','Bạn đã thích bài viết này trước đó rồi !!');
        } else {
            User_like::insert([
                'user_id' => $userId,
                'room_id' => $roomId
            ]);
            return redirect()->back()->with('msg', 'Bạn đã thích bài viết này !!');
        }

    }
    public function reportRoom (Request $request)
    {
        $userData = $request->session('customer')->get('customer');
        $customerData = UserAcc::where(['email' => $userData])->get();
        foreach ($customerData as $data) {
            $userId = $data->id;
        }
        $roomId = $request->input('roomId');
        $title = $request->input('title');
        $content = $request->input('content');
        $created_at = date(now());

        User_report::insert([
            'receive_id' => $roomId,
            'title' => $title,
            'content' => $content,
            'sender_id' => $userId,
            'created_at' => $created_at
        ]);
        return redirect()->back()->with('msg','Cảm ơn bạn đã có những phản hồi về cho đội ngũ Admin !!');
    }
    public function commentVote (Request $request)
    {
        $userData = $request->session('customer')->get('customer');
        $customerData = UserAcc::where(['email' => $userData])->get();
        foreach ($customerData as $data) {
            $userId = $data->id;
        }
        $roomId = $request->input('roomId');
        $comment = $request->input('content');
        $created_at = date(now());
        $vote = $request->input('vote');

        User_comment::insert([
            'user_id' => $userId,
            'room_id' => $roomId,
            'comment' => $comment,
            'created_at' => $created_at
        ]);
        User_vote::insert([
            'user_id' => $userId,
            'room_id' => $roomId,
            'star' => $vote,
            'created_at' => $created_at
        ]);
        return redirect()->back()->with('msg','Bình luận của bạn đã được gửi . Vui lòng đợi Admin duyệt');
    }
    public function allComment (Request $request) {
        $roomId = $request->input('roomId');
        $data = DB::table('user_comment')
                ->join('user_vote', 'user_comment.room_id', '=', 'user_vote.room_id')
                ->where([
                    'user_comment.room_id' => $roomId,
                    'user_comment.is_approved' => 1
                ])->get();
        return view('frontend.comment',[
            'data' => $data
        ]);
    }
}
