@extends('backend.master')
@section('main')

<div class="main-card mb-3 card">
<div class="card-body">
    @if (session('msg'))
        <div class="alert alert-{{session('type')}}">{{session('msg')}}</div>
    @endif
    <h5 class="card-title">{{$pagename}}</h5>
    <form class="needs-validation was-validateds" action="{{route($action,@$donhang->MA)}}" method="POST" novalidate="">
            @csrf
            @method($method)
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="KHACHHANG">Khách hàng</label>
                    <input type="text" class="form-control" name="KHACHHANG" id="KHACHHANG" value="{{@$donhang->MAKH}}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="NGAYDAT">Ngày đặt</label>
                    <input type="text" class="form-control" name="NGAYDAT" id="NGAYDAT" value="{{@$donhang->NGAYDAT}}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="NGAYGIAO">Ngày giao</label>
                    <input type="text" class="form-control" name="NGAYGIAO" id="NGAYGIAO" value="{{@$donhang->NGAYGIAO}}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="TONGTIEN">Tổng tiền</label>
                    <input type="text" class="form-control" name="TONGTIEN" id="TONGTIEN" value="{{@$donhang->TONGTIEN}}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="TTDONHANG">Trạng thái đơn hàng</label>
                    <input type="text" class="form-control" name="TTDONHANG" id="TTDONHANG" value="{{@$donhang->TRANGTHAIDONHANG}}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="VANCHUYEN">Vận chuyển</label>
                    <input type="text" class="form-control" name="VANCHUYEN" id="VANCHUYEN" value="{{@$donhang->VANCHUYEN}}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="THANHTOAN">Thanh toán</label>
                    <input type="text" class="form-control" name="THANHTOAN" id="THANHTOAN" value="{{@$donhang->THANHTOAN}}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="TEN">Tên</label>
                <input type="text" class="form-control" name="TEN" id="TEN" placeholder="Tên đơn hàng" value="{{@$donhang->TEN??''}}" required="">
                    <div class="invalid-feedback">
                        Vui lòng nhập tên đơn hàng
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="DIACHI">Địa chỉ</label>
                    <input type="text" class="form-control" name="DIACHI" id="DIACHI" value="{{@$donhang->DIACHI}}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="EMAIL">Email</label>
                    <input type="text" class="form-control" name="EMAIL" id="EMAIL" placeholder="abc@gmail.com" value="{{@$donhang->EMAIL}}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="SDT">SDT</label>
                    <input type="text" class="form-control" name="SDT" id="SDT" value="{{@$donhang->SDT}}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="TENNHAN">Tên nhận</label>
                <input type="text" class="form-control" name="TENNHAN" id="TENNHAN" placeholder="Tên người nhận" value="{{@$donhang->TENNHAN??''}}" required="">
                    <div class="invalid-feedback">
                        Vui lòng nhập tên đơn hàng
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="DIACHINHAN">Địa chỉ nhận</label>
                    <input type="text" class="form-control" name="DIACHINHAN" id="DIACHINHAN" placeholder="" value="{{@$donhang->DIACHINHAN}}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="EMAILNHAN">Email nhận</label>
                    <input type="text" class="form-control" name="EMAILNHAN" id="EMAILNHAN" placeholder="abc@gmail.com" value="{{@$donhang->EMAILNHAN}}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="SDTNHAN">SDT nhận</label>
                    <input type="text" class="form-control" name="SDTNHAN" id="SDTNHAN" placeholder="" value="{{@$donhang->SDTNHAN}}">
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" @if(@$donhang->TRANGTHAI==1) checked @endif  type="checkbox" value="1" name="TRANGTHAI" id="invalidCheck">
                    <label class="form-check-label" for="invalidCheck">
                        Hiển thị
                    </label>
                    <div class="invalid-feedback">
                        vui lòng chọn trạng thái
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Ghi</button>
            <a class="btn btn-dark" href="{{route('don-hang.index')}}">Bỏ qua</a>
        </form>
    
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</div>
</div>
@endsection