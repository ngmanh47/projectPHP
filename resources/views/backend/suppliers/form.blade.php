@extends('backend.master')
@section('main')

<div class="main-card mb-3 card">
<div class="card-body">
    @if (session('msg'))
        <div class="alert alert-{{session('type')}}">{{session('msg')}}</div>
    @endif
    <h5 class="card-title">{{$pagename}}</h5>
    <form class="needs-validation was-validateds" action="{{route($action,@$nhacungcap->id)}}" method="POST" novalidate="">
            @csrf
            @method($method)
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="name">Tên</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Tên nhà cung cấp" value="{{@$nhacungcap->name??''}}" required="">
                    @error('name')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="abc@gmail.com" value="{{@$nhacungcap->email}}">
                    @error('email')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="phoneNum">SDT</label>
                    <input type="text" class="form-control" name="phoneNum" id="phoneNum" placeholder="" value="{{@$nhacungcap->phoneNum}}">
                    @error('phoneNum')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="address">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="" value="{{@$nhacungcap->address}}">
                    @error('address')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" @if(@$nhacungcap->status==1) checked @endif  type="checkbox" value="1" name="status" id="invalidCheck">
                    <label class="form-check-label" for="invalidCheck">
                        Hiển thị
                    </label>
                    <div class="invalid-feedback">
                        vui lòng chọn trạng thái
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Ghi</button>
            <a class="btn btn-dark" href="{{route('nha-cung-cap.index')}}">Bỏ qua</a>
        </form>
    
</div>
</div>
@endsection