@extends('backend.master')
@section('main')

<div class="main-card mb-3 card">
<div class="card-body">
    @if (session('msg'))
        <div class="alert alert-{{session('type')}}">{{session('msg')}}</div>
    @endif
    <h5 class="card-title">{{$pagename}}</h5>
    <form class="needs-validation was-validateds" action="{{route($action,@$sanpham->id)}}" method="POST" novalidate="">
            @csrf
            @method($method)
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="name">Tên</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Tên sản phẩm" value="{{@$sanpham->name??''}}" required="">
                    @error('name')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="sku">SKU</label>
                    <input type="text" class="form-control" name="sku" id="sku" placeholder="Mã hiển thị" value="{{@$sanpham->sku}}">
                    @error('sku')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="alias">Đường dẫn</label>
                    <input type="text" class="form-control" name="alias" id="alias" value="{{@$sanpham->alias}}">
                    @error('alias')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="unitprice">Giá</label>
                    <input type="number" class="form-control" name="unitprice" id="unitprice" placeholder="Giá bán" value="{{@$sanpham->unitprice}}" required="">
                    {{-- <div class="invalid-feedback">
                        Vui lòng nhập giá bán
                    </div> --}}
                    @error('unitprice')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="qty">Số lượng</label>
                    <input type="number" class="form-control" name="qty" id="qty" placeholder="Số lượng" value="{{@$sanpham->qty}}" required="">
                    {{-- <div class="invalid-feedback">
                        Vui lòng nhập Số lượng
                    </div> --}}
                    @error('qty')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="image">Hình ảnh</label>
                    {{-- type="text" để hiển thị link --}}
                    <input type="hidden" class="form-control" name="image" id="image" value="{{@$sanpham->image}}" required="">
                    <img width="100"/>
                    <button type="button" class="btn btn-sm btn-success" onclick="openPopup('image')">Chọn hình</button>
                    {{-- <div class="invalid-feedback">
                        Vui lòng nhập Số lượng
                    </div> --}}
                    {{-- @error('qty')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror --}}
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control " id="description" value="{{@$sanpham->description}}"></textarea>
                <script> CKEDITOR.replace('description'); </script>
                    @error('description')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationid_cat">Danh mục</label>
                    <select type="text" class="form-control" name="id_cat" id="validationid_cat" placeholder="Danh mục" required="">
                        <option value="">---- Danh mục ----</option>
                        @foreach ($danhmuc as $m)
                            <option @if (@$sanpham->id_cat==$m->id)
                                selected
                            @endif value="{{$m->id}}">{{$m->name}}</option>
                        @endforeach
                    </select>
                    {{-- <div class="invalid-feedback">
                       Vui lòng chọn danh mục
                    </div> --}}
                    @error('id_cat')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                        <label for="id_sup">Nhà cung cấp</label>
                        <select type="text" class="form-control" name="id_sup" id="id_sup" placeholder="Nhà cung cấp" required="">
                            <option value="">---- Nhà cung cấp ----</option>
                            @foreach ($nhacc as $n)
                                <option @if (@$sanpham->id_sup==$n->id)
                                        selected
                                    @endif value="{{$n->id}}">{{$n->name}}</option>
                            @endforeach
                        </select>
                        {{-- <div class="invalid-feedback">
                           Vui lòng chọn nhà cung cấp
                        </div> --}}
                        @error('id_sup')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                            <label for="validationid_bra">Thương hiệu</label>
                            <select type="text" class="form-control" name="id_bra" id="validationid_bra" placeholder="Thương hiệu" required="">
                                <option value="">---- Thương hiệu ----</option>
                                @foreach ($thuonghieu as $t)
                                    <option @if (@$sanpham->id_bra==$t->id)
                                            selected
                                        @endif value="{{$t->id}}">{{$t->name}}</option>
                                @endforeach
                            </select>
                            {{-- <div class="invalid-feedback">
                               Vui lòng chọn thương hiệu
                            </div> --}}
                            @error('id_bra')
                        <div style="color: red;">{{ $message }}</div>
                        @enderror
                        </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" @if(@$sanpham->status==1) checked @endif  type="checkbox" value="1" name="status" id="invalidCheck">
                    <label class="form-check-label" for="invalidCheck">
                        Hiển thị
                    </label>
                    <div class="invalid-feedback">
                        vui lòng chọn trạng thái
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Ghi</button>
            <a class="btn btn-dark" href="{{route('san-pham.index')}}">Bỏ qua</a>
        </form>
    
    {{-- <script>
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
    </script> --}}
</div>
</div>
@endsection