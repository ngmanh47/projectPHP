@extends('backend.master')

@section('action')
<div class="page-title-actions">
    <a href="{{route('nha-cung-cap.create')}}" data-toggle="tooltip" title="Thêm mới" data-placement="bottom" 
    class="btn-shadow mr-3 btn btn-primary">
        <i class="fa fa-plus"></i>
    </a>
</div>
@endsection

@section('main')
<div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Table striped</h5>
        <table class="mb-0 table table-striped">
            <thead class="text-center">
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>SDT</th>
                <th>Trạng thái</th>
                <th>Tác vụ</th>
            </tr>
            </thead>
            <tbody class="text-center">
            @foreach ($list as $item)
            <tr>
            <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->phoneNum}}</td>
                <td>
                        @if ($item->status==1)
                            <span class="badge badge-pill badge-success">Sử dụng</span>
                        @else
                            <span class="badge badge-pill badge-dark">Ẩn</span>
                        @endif    
                    </td>
                <td style="display: flex; justify-content: center">
                        <a href="{{route('nha-cung-cap.show',$item->id)}}" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-light"><i class="fa fa-eye"></i> Xem
                        </a>
                        <a href="{{route('nha-cung-cap.edit',$item->id)}}" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-light"><i class="fa fa-edit"></i> Sửa
                        </a>
                        <form action="{{route('nha-cung-cap.destroy',$item->id)}}" method="POST">
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