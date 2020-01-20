<?php

namespace App\Http\Controllers\backend;
use App\model2\supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class suppliercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = supplier::orderBy('id','ASC')
        ->paginate(10);

        $data = [
            'pageicon' =>'fa fa-user',
            'pagename' =>'Nhà cung cấp',
            'pagetitle'=>'Nhà cung cấp',
            'list' =>$list
        ];
        return view('backend.suppliers.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'pageicon' =>'fa fa-plus',
            'pagename' =>'Thêm mới',
            'pagetitle'=>'Thêm nhà cung cấp',
            'method'=> 'POST',
            'action'=>'nha-cung-cap.store'
        ];
        return view('backend.suppliers.form',$data);
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
            'email' => 'required|email:rfc',
            'phoneNum' => 'required',
            'address' => 'required',
        ]);
        $id = supplier::insertGetId([
            "name" => $request->name,
            "email" => $request->email,
            "phoneNum" => $request->phoneNum,
            "address" => $request->address,
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
        $nhacungcap = supplier::where('id',$id)->where('status','!=',0)->first();
        if($nhacungcap){
            $data = [
                'pageicon' =>'fa fa-edit',
                'pagename' =>'Cập nhật - '.$nhacungcap->name,
                'pagetitle'=>'Cập nhật - '.$nhacungcap->name,
                'nhacungcap'=>$nhacungcap,
                'method'=> 'PUT',
                'action'=>'nha-cung-cap.update'
            ];
            return view('backend.suppliers.form',$data );
        }else{
            return redirect()->route('nha-cung-cap.index');
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
            'email' => 'required|email:rfc',
            'phoneNum' => 'required',
            'address' => 'required',
        ]);
        $num = supplier::where('id',$id) // số dòng tác động, nếu dữ liệu không thay đổi => dd($num) = 0
        ->update([
            "name" => $request->name,
            "email" => $request->email,
            "phoneNum" => $request->phoneNum,
            "address" => $request->address,
            "status" => $request->status?$request->status:2
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
        $num = supplier::where('id',$id)//->first();
        ->update([
            "status" =>0
        ]);
        // dd($num);
        $msg = $num>0?['msg'=>'Xóa thành công','type'=>'success']:['msg'=>false];
        return redirect()->back()->with($msg);
    }
}