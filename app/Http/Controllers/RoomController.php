<?php

namespace App\Http\Controllers;

use App\Facilities;
use App\Room_facilities;
use App\Room_image;
use App\Room;
use App\Room_type;
use App\City;
use App\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Room::latest()->paginate(20);
        return view('backend.room.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeRoom = Room_type::all();
        $city = City::all();
        $district = District::all();
        $facility = Facilities::all();
        return view('backend.room.create', [
            'typeRoom' => $typeRoom,
            'city' => $city,
            'district' => $district,
            'facility' => $facility
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);
        $user = Auth::user();
        $room = new Room; // khởi tạo model
        $room->roomType_id = $request->input('typeRoom');
        $room->title = $request->input('title');
        $room->address = $request->input('address');
        $room->district_id = $request->input('district');
        $room->city_id = $request->input('city');
        $room->quantity = $request->input('quantity');
        $room->price = $request->input('price');
        $room->price_unit = $request->input('priceUnit');

        // Upload file
        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time() . '_' . $file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/room/';
            // Thực hiện upload file
            $request->file('image')->move($path_upload, $filename); // upload lên thư mục public/uploads/product

            $room->image = $path_upload . $filename;
        }
        $room->area = $request->input('area'); // diện tích
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
        }
        $room->approval_date = now();
        $is_active = 0;
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $room->is_active = $is_active;
        $facilities = $request->input('facilities');
        $room->save();
        if ($request->hasFile('detailImage')) {
            // get file
            $file = $request->file('detailImage');
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
                //alo
//
            };

        }


            $room->Facilities()->syncWithoutDetaching($facilities);
//            $room->Room_image()->syncWithoutDetaching($detailImage);

            // chuyển hướng đến trang
            return redirect()->route('admin.room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Room::findorFail($id);
        $roomTypeName = Room_type::where('id', $data->id)->first();
        return view('backend.room.show', [
            'data' => $data,
            '$roomTypeName' => $roomTypeName,
            'facilities' => $data->facilities()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::findorFail($id);
//        dd($room);

        $facility = Facilities::all();
        $room_facilities = Room_facilities::where(['room_id' => $id])->get();
        $exists_facilities = [];
        foreach($room_facilities as $item) {
            array_push($exists_facilities,$item->facilities_id );
        }

        return view('backend.room.edit', [
            'room' => $room,
            'facility' => $facility,
            'exists_facilities' => $exists_facilities
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            // get file
            $file = $request->file('new_image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/product/';
            // Thực hiện upload file
            $request->file('new_image')->move($path_upload,$filename); // upload lên thư mục public/uploads/product

            $room->image = $path_upload.$filename;
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
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $room->is_active = $request->input('is_active');
        }
        $room->price_unit = $request->input('priceUnit');
        $facilities = $request->input('facilities');

        $room->save();
        $room->Facilities()->syncWithoutDetaching($facilities);
//        $room->Room_image()->syncWithoutDetaching($detaiImage);


        // chuyển hướng đến trang
        return redirect()->route('admin.room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // gọi tới hàm destroy của laravel để xóa 1 object
        Room::destroy($id);

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json([
            'status' => true
        ], 200);
    }
}
