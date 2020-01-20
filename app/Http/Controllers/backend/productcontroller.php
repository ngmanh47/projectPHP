<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model2\product;
use App\model2\supplier;
use App\model2\category;
use App\model2\brand;
use App\Http\Requests\validation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // đọc dữ liệu lên
        $list = product::orderBy('id','ASC')
        ->paginate(10);

        $data = [
            'pageicon' =>'fa fa-home',
            'pagename' =>'Sản phẩm',
            'pagetitle'=>'Danh sách sản phẩm',
            'list' =>$list
        ];
        return view('backend.products.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuc = category::where('status',1)->get();
        $nhacc = supplier::get();
        $thuonghieu = brand::get();
        $data = [
            'pageicon' =>'fa fa-plus',
            'pagename' =>'Thêm mới',
            'pagetitle'=>'Thêm sản phẩm',
            'danhmuc'=>$danhmuc,
            'nhacc'=>$nhacc,
            'thuonghieu'=>$thuonghieu,
            'method'=> 'POST',
            'action'=>'san-pham.store'
        ];
        return view('backend.products.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(validation $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|max:50',
        //     'sku' => 'required',
        //     "alias" => 'required',
        //     "unitprice" => 'required',
        //     "qty" => 'required | integer | min:1',
        //     "id_cat" => 'required | integer',
        //     "id_sup" => 'required | integer',
        //     "id_bra" => 'required | integer',
        //     "status" => 'required | integer',
        // ]);
        dd($request->all());
        $id = product::insertGetId([
            "name" => $request->name,
            "sku" => $request->sku,
            "alias" => $request->alias,
            "unitprice" => $request->unitprice,
            "qty" => $request->qty,
            "id_cat" => $request->id_cat,
            "id_sup" => $request->id_sup,
            "id_bra" => $request->id_bra,
            "status" => $request->status?$request->status:2
        ]);
        //dd($request);
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
        $sanpham = product::where('id',$id)->where('status','!=',0)->first();
        $data = [
            'pageicon' =>'fa fa-eye',
            'pagename' =>'Sản phẩm chi tiết',
            'pagetitle'=>'Sản phẩm chi tiết',
            'sanpham'=>$sanpham
        ];
        return view('backend.products.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $danhmuc = category::where('status',1)->get();
        $nhacc = supplier::get();
        $thuonghieu = brand::get();
        $sanpham  =product::where('id',$id)->where('status','!=',0)->first();
        if($sanpham){
            $data = [
                'pageicon' =>'fa fa-edit',
                'pagename' =>'Cập nhật - '.$sanpham->name,
                'pagetitle'=>'Cập nhật - '.$sanpham->name,
                'danhmuc'=>$danhmuc,
                'nhacc'=>$nhacc,
                'thuonghieu'=>$thuonghieu,
                'sanpham'=>$sanpham,
                'method'=> 'PUT',
                'action'=>'san-pham.update'
            ];
            return view('backend.products.form',$data );
        }else{
            return redirect()->route('san-pham.index');
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
        $num = product::where('id',$id) // số dòng tác động, nếu dữ liệu không thay đổi => dd($num) = 0
       // dd($num);
        ->update([
            "name" => $request->name,
            "sku" => $request->sku,
            "alias" => $request->alias,
            "unitprice" => $request->unitprice,
            "qty" => $request->qty,
            "id_cat" => $request->id_cat,
            "id_sup" => $request->id_sup,
            "id_bra" => $request->id_bra,
            "status" => $request->status?$request->status:2
        ]);
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
        // coi du lieu de xoa
        $num = product::where('id',$id)//->first();
      // dd($num);
       ->update([
           "status" =>0
       ]);
      // dd($num);
       $msg = $num>0?['msg'=>'Xóa thành công','type'=>'success']:['msg'=>false];
       return redirect()->back()->with($msg);
    }
}