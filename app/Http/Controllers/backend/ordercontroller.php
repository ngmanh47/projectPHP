<?php

namespace App\Http\Controllers\backend;
use App\model\donhang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ordercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = donhang::orderBy('MA','ASC')
        ->paginate(10);

        $data = [
            'pageicon' =>'fa fa-user',
            'pagename' =>'Đơn hàng',
            'pagetitle'=>'Đơn hàng',
            'list' =>$list
        ];
        return view('backend.orders.list', $data);
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
            'pagetitle'=>'Thêm đơn hàng',
            'method'=> 'POST',
            'action'=>'don-hang.store'
        ];
        return view('backend.orders.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = donhang::insertGetId([
            "KHACHHANG" => $request->MAKH,
            "NGAYDAT" => $request->NGAYDAT,
            "NGAYGIAO" => $request->NGAYGIAO,
            "TONGTIEN" => $request->TONGTIEN,
            "TTDONHANG" => $request->TTDONHANG,
            "VANCHUYEN" => $request->VANCHUYEN,
            "THANHTOAN" => $request->THANHTOAN,
            "TEN" => $request->TEN,
            "DIACHI" => $request->DIACHI,
            "EMAIL" => $request->EMAIL,
            "SDT" => $request->SDT,
            "TENNHAN" => $request->TENNHAN,
            "DIACHINHAN" => $request->DIACHINHAN,
            "EMAILNHAN" => $request->EMAILNHAN,
            "SDTNHAN" => $request->SDTNHAN,
            
            "TRANGTHAI" => $request->TRANGTHAI?$request->TRANGTHAI:2
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
        $donhang = donhang::where('MA',$id)->where('TRANGTHAI','!=',0)->first();
        if($donhang){
            $data = [
                'pageicon' =>'fa fa-edit',
                'pagename' =>'Cập nhật - '.$donhang->TEN,
                'pagetitle'=>'Cập nhật - '.$donhang->TEN,
                'donhang'=>$donhang,
                'method'=> 'PUT',
                'action'=>'don-hang.update'
            ];
            return view('backend.orders.form',$data );
        }else{
            return redirect()->route('don-hang.index');
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
        $num = donhang::where('MA',$id) // số dòng tác động, nếu dữ liệu không thay đổi => dd($num) = 0
        ->update([
            "KHACHHANG" => $request->MAKH,
            "NGAYDAT" => $request->NGAYDAT,
            "NGAYGIAO" => $request->NGAYGIAO,
            "TONGTIEN" => $request->TONGTIEN,
            "TTDONHANG" => $request->TTDONHANG,
            "VANCHUYEN" => $request->VANCHUYEN,
            "THANHTOAN" => $request->THANHTOAN,
            "TEN" => $request->TEN,
            "DIACHI" => $request->DIACHI,
            "EMAIL" => $request->EMAIL,
            "SDT" => $request->SDT,
            "TENNHAN" => $request->TENNHAN,
            "DIACHINHAN" => $request->DIACHINHAN,
            "EMAILNHAN" => $request->EMAILNHAN,
            "SDTNHAN" => $request->SDTNHAN,
            "TRANGTHAI" => $request->TRANGTHAI?$request->TRANGTHAI:2
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
        $num = donhang::where('MA',$id)//->first();
        ->update([
            "TRANGTHAI" =>0
        ]);
        // dd($num);
        $msg = $num>0?['msg'=>'Xóa thành công','type'=>'success']:['msg'=>false];
        return redirect()->back()->with($msg);
    }
}