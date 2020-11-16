<?php

namespace App\Http\Controllers;

use App\ExtendPost;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    // Controller nay chua test dc gi vi chua co frontend, du lieu, route
    public function getAllRoom()
    {
        $user = Auth::user();
        $list = Room::where(['user_id' => $user->id])->orderBy('created_at', 'ASC')->get();
        return view('', [
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
        return view('', [
            'data' => $data,
            'edit_post' => $edit_post
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




}
