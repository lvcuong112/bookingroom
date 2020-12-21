<?php


namespace App\Http\Controllers;


use App\Room;
use App\Room_facilities;
use App\Room_image;
use App\Room_type;
use App\District;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendController
{
    //home
    public function index()
    {
        $roomType = Room_type::all();
        return view('frontend.home', [
            'roomType' => $roomType
        ]);
    }
    public function homeApi()  // api trang chủ
    {
        $roomApi = Room::orderBy('views', 'desc')->limit(8)->get();
        return json_encode($roomApi);
    }
    public function cheapHomeApi() // top phòng trọ rẻ nhất
    {
        $roomApi = Room::orderBy('price', 'asc')->limit(3)->get();
        return json_encode($roomApi);
    }
    //room
    public function room()
    {
        $roomType = Room_type::all();
        return view('frontend.room', [
            'roomType' => $roomType
        ]);
    }
    public function roomDetail($id)
    {
        $data = Room::findorFail($id);
        $roomType = Room_type::all();
        $imageRoomDetail = DB::table('room_image')->where(['room_image.room_id' => $id])->get();
        $relateRoom = DB::table('room')->where(['room.roomType_id' => $data->roomType_id])->limit(7)->get();
        return view('frontend.roomdetail', [
            'roomType' => $roomType,
            'imageRoomDetail' => $imageRoomDetail,
            'relateRoom' => $relateRoom
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
    //search
    public function search(Request $request)
    {
        $city = $request->input('city');
        $district = $request->input('district');
        $price = $request->input('price');
        $minPrice = $price - $price/2;
        $maxPrice = $price + $price/2;
        $typeRoom = $request->input('typeRoom');
        $acreage = $request->input('acreage'); // diện tích

        $room = Room::query();
        if($request->has('city')) {
            $room->join('city', 'room.city_id', '=', 'city.id')
                 ->where('city.name', 'like', '%' . $city . '%');
        }
        if($request->has('district')) {
            $room->join('district', 'room.district_id', '=', 'district.id')
                 ->where('district.name' , 'like', '%' . $district . '%');
        }
        if($request->has('price')) {
            $room->where([
                ['price' , '>=', $minPrice],
                ['price' , '<=', $maxPrice]
            ]);
        }
        if($request->has('typeRoom')) {
            $room->where('room.roomType_id', 'like','%'. $typeRoom. '%');
        }
        if($request->has('acreage')) {
            $room->where('room.area', 'like','%'. $acreage .'%');
        }
        dd($room->get());
        $searchData = [];



        $totalResult = $products->total();

        return view('shop.search', [
            'products' => $products,
            'totalResult' => $totalResult,
            'keyword' => $keyword ? $keyword : ''
        ]);
        return view('frontend.search');
    }
}
