<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
use App\Facilities;
use App\Room_facilities;
use App\Room;
use App\Room_image;
use App\Room_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
//     Controller nay chua test dc gi vi chua co frontend, du lieu, route
    public function getAllRoom()
    {
        $user = Auth::user();
        $list = Room::where([
            'user_id' => $user->id,
            'is_active' => 1
        ])->orderBy('created_at', 'ASC')->get();
        return view('owner.room.index', [
            'list' => $list
        ]);
        // or return json ?
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
        $data = Room::findOrFail($id);
        $edit_post = 1;
        if($data->approved_id == null) {
            $edit_post = 0;
        }
        return view('owner.room.show', [
            'data' => $data,
            'edit_post' => $edit_post,
            'facilities' => $data->facilities()->get()
        ]);
    }

    public function extendDate(Request $request, $room_id)
    {
//        trong request se co $count, $date_unit, so ngay/thang/nam
        $room = Room::findorFail($room_id);
        $room->extend_date = $request->input('extended_date');
        $room->save();
        return view('', [

        ]);
    }

    public function register() {
        return view('owner.register');
    }

    public function postRegister() {
        dd(1);
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
        if($user->role_id == 1) {
            $room->approval_id = $user->role_id;
            $room->approval_date = now();
        }
        $is_active = 0;
        if ($request->has('is_active')) {
            $is_active = $request->input('is_active');
        }
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
        return redirect()->route('owner.room.index')->with('msg', 'Tạo Phòng Thành Công.Đợi Admin Duyệt');
    }

}
