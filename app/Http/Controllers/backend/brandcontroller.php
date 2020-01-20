<?php

namespace App\Http\Controllers\backend;
use App\model2\brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class brandcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = brand::get();

        $data = [
            'pageicon' =>'fa fa-user',
            'pagename' =>'Thương hiệu',
            'pagetitle'=>'Thương hiệu',
            'list' =>$list
        ];
        return view('backend.brands.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$thuonghieu = thuonghieu::get();
        $data = [
            'pageicon' =>'fa fa-plus',
            'pagename' =>'Thêm mới',
            'pagetitle'=>'Thêm thương hiệu',
            'method'=> 'POST',
            'action'=>'thuong-hieu.store'
        ];
        return view('backend.brands.form',$data);
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
            'name' => 'required|max:50',
            'description' => 'required',
        ]);
        $id = brand::insertGetId([
            "name" => $request->name,
            "description" => $request->description,
            "status" => $request->status?$request->status:2
        ]);
        //dd($a);
        $msg = $id?['msg'=>'Thêm thành công','type'=>'success']:['msg'=>'Thêm thất bại','type'=>'danger'];
        return redirect()->back()->with($msg);
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
        $thuonghieu = brand::where('id',$id)->where('status','!=',0)->first();
        if($thuonghieu){
            $data = [
                'pageicon' =>'fa fa-edit',
                'pagename' =>'Cập nhật - '.$thuonghieu->name,
                'pagetitle'=>'Cập nhật - '.$thuonghieu->name,
                'thuonghieu'=>$thuonghieu,
                'method'=> 'PUT',
                'action'=>'thuong-hieu.update'
            ];
            return view('backend.brands.form',$data );
        }else{
            return redirect()->route('thuong-hieu.index');
        }
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
            'name' => 'required|max:50',
            'description' => 'required',
        ]);
        $num = brand::where('id',$id) // số dòng tác động, nếu dữ liệu không thay đổi => dd($num) = 0
        ->update([
            "name" => $request->name,
            "description" => $request->description,
            "status" => (int)$request->status?$request->status:2
        ]);
       // dd($num);
        $msg = $num>0?['msg'=>'Cập nhật thành công','type'=>'success']:['msg'=>false];
        return redirect()->back()->with($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $num = brand::where('id',$id)//->first();
        ->update([
            "status" =>0
        ]);
        // dd($num);
        $msg = $num>0?['msg'=>'Xóa thành công','type'=>'success']:['msg'=>false];
        return redirect()->back()->with($msg);
    }
}