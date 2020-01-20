@extends('backend.master')

@section('action')
<div class="page-title-actions">
    <a href="{{route('don-hang.create')}}" data-toggle="tooltip" title="Thêm mới" data-placement="bottom" class="btn-shadow mr-3 btn btn-primary">
        <i class="fa fa-plus"></i>
    </a>
</div>
@endsection

@section('main')
<div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Danh sách đơn hàng</h5>
        <table class="mb-0 table table-striped">
            <thead class="text-center">
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Ngày đặt</th>
                <th>Trạng thái đơn</th>
                <th>Địa chỉ nhận</th>
                <th>Thanh toán</th>
                <th>Tổng tiền</th>
                <th>Tác vụ</th>
            </tr>
            </thead>
            <tbody class="text-center">
            @foreach ($list as $item)
            <tr>
            <th scope="row">{{$item->MA}}</th>
                <td>{{$item->TEN}}</td>
                <td>{{$item->NGAYDAT}}</td>
                <td>{{$item->TRANGTHAIDONHANG}}</td>
                <td>{{$item->DIACHINHAN}}</td>
                <td>{{$item->THANHTOAN}}</td>
                <td>{{$item->TONGTIEN}}</td>
                <td style="display: flex; justify-content: center">
                        <a href="{{route('don-hang.show',$item->MA)}}" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-light"><i class="fa fa-eye"></i> Xem
                        </a>
                        <a href="{{route('don-hang.edit',$item->MA)}}" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-light"><i class="fa fa-edit"></i> Sửa
                        </a>
                        <form action="{{route('don-hang.destroy',$item->MA)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('ban co muon xoa dong nay khong?')"   class="mb-2 mr-2 border-0 btn-transition btn btn-outline-light"><i class="fa fa-trash"></i> Xóa
                            </button>
                        </form>
                    </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{$list->links()}}
    </div>
</div>
@endsection