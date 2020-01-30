<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\model2\product;
use App\model2\order;
use App\model2\orderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Cart;

class cartController extends Controller
{
    public function index()
    {
        if(session('cart')){
            $data = [
                'pagetitle' => "Giỏ hàng",
            ];
            return view('frontend.carts.index', $data);
        }
        return redirect()->route('home');
    }
    public function add($id)
    {
        $cart_temp = session('cart');
        // kiem tra thong tin san pham co trong he thong hay khong
        $sanpham = product::where('id',$id)
            ->where('status',1)
            ->where('qty','>',0)
            ->first();
        if($sanpham){
            //Kiểm tra tồn tại sản phẩm: Nếu có thì cộng dồn, chưa có thì thêm mới
            if(isset($cart_temp[$sanpham->id]))
            {
                $cart_temp[$sanpham->id]['qty_add'] += 1;
            }
            else {
                $cart_temp[$sanpham->id] = [
                    'id'=>$sanpham->id,
                    'name'=>$sanpham->name,
                    'image'=>$sanpham->image,
                    'unitprice'=>$sanpham->unitprice,
                    'qty_add'=>1,
                    'qty'=>$sanpham->qty,
                ];
            }
            //bỏ vào giỏ
            session(['cart'=>$cart_temp]);
            return redirect()->route('cart');
        }
        else
        {
            return redirect()->route('home');
        }
    }
    public function updatecart(Request $rq)
    {
        $cart_temp = session('cart');
        if($cart_temp)
        {
            //kiem tra xem hang no co trong gio dang mua hay khong
            foreach($rq->soluong as $id=>$sl)
            {
                if(isset($cart_temp[$id]) && $cart_temp[$id]['qty']>=$sl)
                {
                    $cart_temp[$id]['qty_add'] = $sl;
                }
            }
            session(['cart'=>$cart_temp]);
            return redirect()->route('cart');
        }else
        {
            return redirect()->route('home');
        }
    }
    public function removeitem($id)
    {
        $cart_temp = session('cart');
        if(isset($cart_temp[$id]))
        {
            unset($cart_temp[$id]);
            $type='success';
            $msg = 'Xóa thành công';
        }else
        {
            $type='danger';
            $msg = 'Không tìm thấy sản phẩm này trong giỏ hàng';
        }
        //bỏ vào giỏ
        session(['cart'=>$cart_temp]);
        return redirect()->route('cart')->with(['type'=>$type,'msg'=>$msg]);
    }
    public function orderindex()
    {
        $data = [
            'pagetitle' => 'Đơn hàng',
        ];
        return view('frontend.orders.index', $data);
    }
    public function checkout(Request $rq)
    {
        // dd($rq->all());
        //validation
        $validatedData = $rq->validate([
            'name_buy'=> 'required|max:50',
            'address_buy'=> 'required',
            'email_buy'=> 'required | email:rfc',
            'phoneNum_buy'=> 'required',
        ]);
        //Write order
        $numOrder = time();
        $iddh = order::insertGetId([
            'numOrder'=>$numOrder,
            'id_cus'=>0,
            'orderDate'=>now(),
            'orderDelivery'=>'Tu van chuyen',
            'total'=>session('tongtien'),
            'sttOrder'=>1,
            'portage'=>'Free',
            'payment'=>$rq->payment,
            'name_buy'=>$rq->name_buy,
            'address_buy'=>$rq->address_buy,
            'email_buy'=>$rq->email_buy,
            'phoneNum_buy'=>$rq->phoneNum_buy,
            'name_rec'=>$rq->nhankhacmua?$rq->name_rec:$rq->name_buy,
            'address_rec'=>$rq->nhankhacmua?$rq->address_rec:$rq->address_buy,
            'email_rec'=>$rq->nhankhacmua?$rq->email_rec:$rq->email_buy,
            'phoneNum_rec'=>$rq->nhankhacmua?$rq->phoneNum_rec:$rq->phoneNum_buy,
        ]);
        if($iddh)
        {
            //ghi chi tiet don
            foreach (session('cart') as $id=>$item)
            {
                orderDetail::insert([
                    'id_pro'=>$id,
                    'id_order'=>$iddh,
                    'qty'=>$item['qty_add'],
                    'price'=>$item['unitprice'],
                ]);
            }
            // Send email
            Mail::raw('Chúc mừng bạn đã đặt hàng thành công', function ($message) use($rq) {
                //$message->from('john@johndoe.com', 'John Doe');                //đã cấu hình rồi
                //$message->sender('john@johndoe.com', 'John Doe');
                $message->to($rq->email_buy, 'Test mail');
                // $message->cc('john@johndoe.com', 'John Doe');
                // $message->bcc('john@johndoe.com', 'John Doe');
                // $message->replyTo('john@johndoe.com', 'John Doe');
                $message->subject('NM Store thông báo đặt hàng');
                //$message->priority(3);                                        // độ ưu tiên mail
                //$message->attach('pathToFile');
            });
            session()->forget(['cart','tongtien']);
            session()->flash('ordered',order::where('numOrder',$numOrder)->first());
            return redirect()->route('thongbaodathang');
        }else
        {
            return redirect()->back()->with(['msg'=>'Lỗi đặt hàng','type'=>'danger']);
        }
    }
    public function thongbaodathang()
    {
        if(session('ordered')){
            $data = [
                'pagetitle' => 'Thông báo đặt hàng',
            ];
            return view('frontend.orders.alert', $data);
        }
        return redirect()->route('home');
    }
}