@extends('backend.master')
@section('action')


<div class="page-title-actions">
    <a href="" data-toggle="tooltip" title="Thêm mới" data-placement="bottom" class="btn-shadow mr-3 btn btn-primary">
        <i class="fa fa-plus"></i>
    </a>
</div>
@endsection
@section('main')
<div class="row">
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Table responsive</h5>
            <div class="table-responsive">
                <table class="mb-0 table" style="text-align: center">
                    <thead>
                        <tr >
                            <th>#</th>
                            <th>Hình</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Danh mục</th>
                            <th>Thương hiệu</th>
                            <th>Trạng thái</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                        <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td><img src="{{asset('backend/'.$item->image)}}" width="60px" height="60px"></td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->unitprice}}</td>
                                <td>{{$item->tendanhmuc}}</td>
                                <td>{{$item->tenthuonghieu}}</td>
                                <td>
                                    @if ($item->status==1)
                                        <span class="badge badge-pill badge-success">Sử dụng</span>
                                    @else
                                        <span class="badge badge-pill badge-dark">Ẩn</span>
                                    @endif

                                </td>
                                <td style="display: flex; justify-content: center">
                                    <a href="{{route('san-pham.show',$item->id)}}" class="mb-2 mr-2 mt-3 border-0 btn-transition btn btn-outline-light"><i class="fa fa-eye"></i> Xem
                                    </a>
                                    <a href="{{route('san-pham.edit',$item->id)}}" class="mb-2 mr-2 mt-3 border-0 btn-transition btn btn-outline-light"><i class="fa fa-edit"></i> Sửa
                                    </a>
                                    <form action="{{route('san-pham.destroy',$item->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('ban co muon xoa dong nay khong?')"   class="mb-2 mr-2 mt-3 border-0 btn-transition btn btn-outline-light"><i class="fa fa-trash"></i> Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                        {{-- <tr>
                            <th scope="row" colspan="8"><div class="alert alert-danger">Không có dữ liệu</div></th>
                        </tr> --}}
                    </tbody>
                </table>
                {{$list->links()}}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
