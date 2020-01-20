<?php

namespace App\Http\Controllers\backend;
use App\model2\category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = category::orderBy('id','ASC')
        ->paginate(10);

        $data = [
            'pageicon' =>'fa fa-user',
            'pagename' =>'Danh mục',
            'pagetitle'=>'Danh mục',
            'list' =>$list
        ];
        return view('backend.categories.list', $data);
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
            'pagetitle'=>'Thêm danh mục',
            'method'=> 'POST',
            'action'=>'danh-muc.store'
        ];
        return view('backend.categories.form',$data);
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
        $id = category::insertGetId([
            "name" => $request->name,
            "image" => $request->image,
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
        $danhmuc = category::where('id',$id)->where('status','!=',0)->first();
        if($danhmuc){
            $data = [
                'pageicon' =>'fa fa-edit',
                'pagename' =>'Cập nhật - '.$danhmuc->name,
                'pagetitle'=>'Cập nhật - '.$danhmuc->name,
                'danhmuc'=>$danhmuc,
                'method'=> 'PUT',
                'action'=>'danh-muc.update'
            ];
            return view('backend.categories.form',$data );
        }else{
            return redirect()->route('danh-muc.index');
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
        $num = category::where('id',$id) // số dòng tác động, nếu dữ liệu không thay đổi => dd($num) = 0
        ->update([
            "name" => $request->name,
            "image" => $request->image,
            "description" => $request->description,
            "status" => $request->status?$request->status:2
        ]);
        //dd($a);
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
        $num = category::where('id',$id)//->first();
        ->update([
            "status" =>0
        ]);
        // dd($num);
        $msg = $num>0?['msg'=>'Xóa thành công','type'=>'success']:['msg'=>false];
        return redirect()->back()->with($msg);
    }
}