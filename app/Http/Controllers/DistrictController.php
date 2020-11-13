<?php

namespace App\Http\Controllers;

use App\District;
use App\City;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = District::latest()->paginate(20);
        return view('backend.district.index', [
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
        $district = City::all();
        return view('backend.district.create', [
            'city' => $district
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
            'name' => 'required|max:255',
        ]);

        $district = new District(); // khởi tạo model
        $district->name = $request->input('city');
        $district->name = $request->input('name');
        $district->create_by = $request->input('create_by');
        $district->update_by = $request->input('update_by');
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $district->status = $request->input('status');
        }
        $district->save();
        // chuyển hướng đến trang
        return redirect()->route('admin.district.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::all();
        $choseCity = City::findorFail($id);
        $district = District::findorFail($id);
        return view('backend.district.edit', [
            'district' => $district,
            'city'=> $city
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
            'name' => 'required|max:255',
        ]);

        $district = District::findorFail($id); // khởi tạo model
        $district->city_id = $request->input('city');
        $district->name = $request->input('name');
        $district->create_by = $request->input('create_by');
        $district->update_by = $request->input('update_by');
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $district->status = $request->input('is_active');
        }
        $district->save();
        // chuyển hướng đến trang
        return redirect()->route('admin.district.index');
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
        District::destroy($id);

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json([
            'status' => true
        ], 200);
    }
}
