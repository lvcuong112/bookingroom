<?php

namespace App\Http\Controllers;

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

    public function extendDate(Request $request, $room_id)
    {
//        trong request se co $count, $date_unit, so ngay/thang/nam
        $room = Room::findorFail($room_id);
        $room->extend_date = $request->input('extended_date');
        $room->save();
        return view('', [

        ]);
//        $room->

    }

}
