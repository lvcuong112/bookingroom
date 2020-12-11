<?php


namespace App\Http\Controllers;


use App\Room;
use App\Room_type;
use App\District;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendController
{
    public function index()
    {
        $roomType = Room_type::all();
        return view('frontend.home', [
            'roomType' => $roomType
        ]);
    }
    public function room()
    {
        $roomType = Room_type::all();
        return view('frontend.room', [
            'roomType' => $roomType
        ]);
    }
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
