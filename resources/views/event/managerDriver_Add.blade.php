@extends('index')

@section("datepicker")
<link href="{{asset('vendor/dist/css/datepicker.min.css')}}" rel="stylesheet" type="text/css">
<script src="{{asset('vendor/dist/js/datepicker.min.js')}}"></script>
<script src="{{asset('vendor/dist/js/i18n/datepicker.en.js')}}"></script>
@endsection

@section("menu-manager-driver")
sl-active
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('get.manager')}}">Trang chủ</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{route('get.manager.driver')}}">Hồ sơ lái xe</a>
  </li>
  <li class="breadcrumb-item active">
    Thêm mới
  </li> 
</ol>
@endsection

@section('content')
<div class="container-fluid">
 <div class="card">
  <div class="card-body">
    <h2 class="text-center">Thêm mới lái xe</h2>
    <br/>  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          @if ($errors->any())
          <div class="alert alert-danger alert-dismissible">
            <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div><br />
          @endif
          @if (Session::has('success'))
          <div class="alert alert-success alert-dismissible">
            <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('success') }}
          </div>
          @endif
        </div>
      </div>
    </div> 
    <form action="{{route('post.manager.driver.add')}}" method="POST" class="form-horizontal" role="form">
      @method('post')
      @csrf
    <div class="row">
        <div class="col-sm-8">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="col-sm-12 d-b c-red control-label" for="">Mã số lái xe</label>
                <div class="col-sm-12">
                  <input class="form-control" name="DriverNo" type="text">
                </div>
              </div> <!-- end form-group -->
              <div class="form-group">
                <label class="col-sm-12 d-b c-red control-label" for="">Họ tên lái xe</label>
                <div class="col-sm-12">
                  <input class="form-control" name="DriverName" type="text">
                </div>
              </div> <!-- end form-group --> 
              <div class="form-group">
                <label class="col-sm-12 d-b c-red control-label" for="">Ngày Sinh</label>
                <div class="col-sm-12"><input class="form-control datepicker-here" name="Birthday" type="text" data-language='en'></div>
              </div> <!-- end form-group -->
              <div class="form-group">
                <div class="col-sm-12">
                  <label class="control-label d-b c-red">Giới Tính</label>
                  <select class="form-control" name="Sex">
                    <option value="1">Nam</option>
                    <option value="0">Nữ</option>
                  </select>
                </div>
              </div> <!-- end form-group -->
              <div class="form-group">
                <label class="col-sm-12 d-b c-red control-label" for="">Chứng minh nhân dân</label>
                <div class="col-sm-12">
                  <input class="form-control" name="Cmnd" type="text">
                </div>
              </div> <!-- end form-group --> 
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="col-sm-12 d-b c-red control-label" for="">Số điện thoại</label>
                <div class="col-sm-12">
                  <input class="form-control" name="Phone" type="text">
                </div>
              </div> <!-- end form-group -->
              <div class="form-group d-n">
                <label class="col-sm-12 c-red control-label" for="">idUser</label>
                <div class="col-sm-12">
                  <input class="form-control" name="idUser" type="text">
                </div>
              </div> <!-- end form-group -->
              <div class="form-group">
                <label class="col-sm-12 d-b c-red control-label" for="">Địa chỉ</label>
                <div class="col-sm-12">
                  <input class="form-control" name="Address" type="text">
                </div>
              </div> <!-- end form-group -->
              <div class="form-group">
                <label class="col-sm-12 d-b c-red control-label" for="">Ngày vào làm</label>
                <div class="col-sm-12"><input class="form-control datepicker-here" name="FrWork" type="text" data-language='en'></div>
              </div> <!-- end form-group -->
              <div class="form-group">
                <div class="col-sm-12">
                  <label class="control-label d-b c-red">Trạng thái lái xe</label>
                  <select class="form-control" name="Status">
                    <option value="0">Ứng tuyển</option>
                    <option value="1">Nhân viên</option>
                    <option value="2">Nghỉ làm</option>
                  </select>
                </div>
              </div> <!-- end form-group -->
              <div class="form-group">
                <label class="col-sm-12 d-b control-label" for="">Email</label>
                <div class="col-sm-12">
                  <input class="form-control" name="Email" type="text">
                </div>
              </div> <!-- end form-group --> 
             </div>
        </div>
        <div class="row">
          <div class="col-sm-8">
           <div class="form-group">
            <label class="col-sm-12 d-b control-label" for="">Ghi chú</label>
            <div class="col-sm-12">
              <textarea class="form-control" name="Notes" data-maxlength="500" cols="100" rows="8" style="height: 211px;width: 160%;"></textarea>
            </div>
          </div>
        </div>
      </div>
      </div>
        <div class="col-sm-4">
        <fieldset class="form-group">
          <img class="form-control card-img-top img-fluid" src="{{asset('images/FImage.jpg')}}" id="img" style="height: auto; width: 300px; margin-top:20px; ">
          <input type="file" id="avatar" name="fileAvatar" onchange="AutoUpload();">
          <input type="hidden" id="avatarHidden" name="Avatar" value="FImage.jpg">
        </fieldset>
      </div>
    </div>
<div class="row">
    <div class="col-sm-8">
      <div class="form-group">
        <div class="col-sm-12 ml-12">
          <input type="submit" name="btnAdd" class="btn btn-primary" value="Thêm">
          <a href="{{route('get.manager.driver')}}" class="btn btn-default">Thoát</a>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
</div>
</div>
@endsection


@section('scriptBottom')
<script> 
  function AutoUpload() {
   var avatar = document.getElementById("avatar").value;
   var img = document.getElementById("img");
   var avatarHidden = document.getElementById("avatarHidden");
   var res = avatar.split('\\');
   var resImg = img.src.split('/');
   avatar = res[res.length-1];
   avatarHidden.value = avatar;
   resImg[resImg.length-1] = avatar;
   img.src = resImg.join("/");
 }
</script>
@endsection



