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
    public function search(Request $request)
    {
        $city = $request->input('city');
        $district = $request->input('district');
        $price = $request->input('price');
        $minPrice = $price - $price/2;
        $maxPrice = $price + $price/2;
        $typeRoom = $request->input('typeRoom');
        $acreage = $request->input('acreage'); // diện tích

        $room = DB::table('room')
                    ->join('city', 'room.city_id', '=', 'city.id')
                    ->join('district', 'room.district_id', '=', 'district.id')
                    ->where([
                        ['city.name', 'like', '%' . $city . '%'],
                        ['district.name' , 'like', '%' . $district . '%'],
                        ['room.roomType_id', 'like','%'. $typeRoom. '%'],
                        ['room.area', 'like','%'. $acreage .'%']
                    ])
                    ->whereBetween('room.price', [$minPrice, $maxPrice])->get();


        dd($room);

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
