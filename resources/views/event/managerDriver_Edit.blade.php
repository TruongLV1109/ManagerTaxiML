@extends('index')


@section("menu-manager-book")
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
    Sửa thông tin
  </li> 
</ol>
@endsection

@section('content')
<div class="container-fluid">
 <div class="card">
  <div class="card-body">
    <h2 class="text-center">Sửa thông tin lái xe</h2>
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
    <form action="{action('BookController@postManagerBook_Edit', $id)}}" method="POST" class="form-horizontal" role="form">
      @method('post')
      @csrf
      @foreach($driver as $driver1)
     <div class="row">
        <div class="col-sm-8">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group" style="display: none;">
                <label class="col-sm-12 control-label" for="">Mã số lái xe</label>
                <div class="col-sm-12">
                  <input class="form-control" name="DriverCd" type="text" value="{{$driver1->DriverCd}}">
                </div>
              </div> <!-- end form-group -->
              <div class="form-group">
                <label class="col-sm-12 control-label" for="">Họ tên lái xe</label>
                <div class="col-sm-12">
                  <input class="form-control" name="DriverNm" type="text" value="{{$driver1->DriverNm}}">
                </div>
              </div> <!-- end form-group -->
              <div class="form-group">
                <label class="col-sm-12 control-label" for="">Ngày sinh</label>
                <div class="col-sm-12">
                  <input class="form-control" name="Birthday" type="text" value="{{$driver1->Birthday}}">
                </div>
              </div> <!-- end form-group --> 
              <div class="form-group">
                <label class="col-sm-12 control-label" for="">Chứng minh nhân dân</label>
                <div class="col-sm-12">
                  <input class="form-control" name="Cmnd" type="text" value="{{$driver1->Cmnd}}">
                </div>
              </div> <!-- end form-group --> 
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="col-sm-12 control-label" for="">Địa chỉ</label>
                <div class="col-sm-12">
                  <input class="form-control" name="Address" type="text" value="{{$driver1->Address}}">
                </div>
              </div> <!-- end form-group -->
              <div class="form-group">
                <label class="col-sm-12 control-label" for="">Ngày vào làm</label>
                <div class="col-sm-12">
                  <input class="form-control" name="DayWork" type="text" value="{{$driver1->DayWork}}">
                </div>
              </div> <!-- end form-group --> 
              <div class="form-group">
                <label class="col-sm-12 control-label" for="">Trạng thái</label>
                <div class="col-sm-12">
                  <input class="form-control" name="Status" type="text" value="{{$driver1->Status}}">
                </div>
              </div> <!-- end form-group --> 
             </div>
        </div>
        <div class="row">
          <div class="col-sm-8">
           <div class="form-group">
            <label class="col-sm-12 control-label" for="">Ghi chú</label>
            <div class="col-sm-12">
              <textarea class="form-control" name="Notes" data-maxlength="500" cols="100" rows="8" style="height: 211px;width: 160%;">{{$driver1->Notes}}</textarea>
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
  @endforeach
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



