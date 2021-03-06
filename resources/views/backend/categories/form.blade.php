@extends('backend.master')
@section('main')

<div class="main-card mb-3 card">
<div class="card-body">
    @if (session('msg'))
        <div class="alert alert-{{session('type')}}">{{session('msg')}}</div>
    @endif
    <h5 class="card-title">{{$pagename}}</h5>
    <form class="needs-validation was-validateds" action="{{route($action,@$danhmuc->id)}}" method="POST" novalidate="">
            @csrf
            @method($method)
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationname">Tên</label>
                <input type="text" class="form-control" name="name" id="validationname" placeholder="Tên danh mục" value="{{@$danhmuc->name??''}}" required="">
                    @error('name')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationimage">Hình</label>
                    <input type="text" class="form-control" name="image" id="validationimage" placeholder="" value="{{@$danhmuc->image}}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationdescription">Mô tả</label>
                    <input type="text" class="form-control" name="description" id="validationdescription" placeholder="" value="{{@$danhmuc->description}}">
                    @error('description')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" @if(@$danhmuc->status==1) checked @endif  type="checkbox" value="1" name="status" id="invalidCheck">
                    <label class="form-check-label" for="invalidCheck">
                        Hiển thị
                    </label>
                    <div class="invalid-feedback">
                        vui lòng chọn trạng thái
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Ghi</button>
            <a class="btn btn-dark" href="{{route('danh-muc.index')}}">Bỏ qua</a>
        </form>
</div>
</div>
@endsection