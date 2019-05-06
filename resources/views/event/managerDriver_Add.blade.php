@extends('index')

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
    <form action="{route('post.manager.book.add')}}" method="POST" class="form-horizontal" role="form">
      @method('post')
      @csrf
    <div class="row">
        <div class="col-sm-8">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="col-sm-12 control-label" for="">Mã Số Sách</label>
                <div class="col-sm-12">
                  <input class="form-control" name="maSoSach" type="text">
                </div>
              </div> <!-- end form-group -->
              <div class="form-group">
                <label class="col-sm-12 control-label" for="">Tên Sách</label>
                <div class="col-sm-12">
                  <input class="form-control" name="tenSach" type="text">
                </div>
              </div> <!-- end form-group --> 
              <div class="form-group">
                <label class="col-sm-12 control-label" for="">Tác Giả</label>
                <div class="col-sm-12">
                  <input class="form-control" name="tacGia" type="text">
                </div>
              </div> <!-- end form-group --> 
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="col-sm-12 control-label" for="">Mã Số Sách</label>
                <div class="col-sm-12">
                  <input class="form-control" name="maSoSach" type="text">
                </div>
              </div> <!-- end form-group -->
              <div class="form-group">
                <label class="col-sm-12 control-label" for="">Tên Sách</label>
                <div class="col-sm-12">
                  <input class="form-control" name="tenSach" type="text">
                </div>
              </div> <!-- end form-group --> 
              <div class="form-group">
                <label class="col-sm-12 control-label" for="">Tác Giả</label>
                <div class="col-sm-12">
                  <input class="form-control" name="tacGia" type="text">
                </div>
              </div> <!-- end form-group --> 
             </div>
        </div>
        <div class="row">
          <div class="col-sm-8">
           <div class="form-group">
            <label class="col-sm-12 control-label" for="">Nội dung tóm lược</label>
            <div class="col-sm-12">
              <textarea class="form-control" name="noiDungTomLuoc" data-maxlength="500" cols="100" rows="8" style="height: 211px;width: 160%;"></textarea>
            </div>
          </div>
        </div>
      </div>
      </div>
        <div class="col-sm-4">
        <fieldset class="form-group">
          <img class="form-control card-img-top img-fluid" src="{{asset('images/FImage.jpg')}}" id="img" style="height: auto; width: 300px; margin-top:20px; ">
          <input type="file" id="avatar" name="fileAvatar" onchange="AutoUpload();">
          <input type="hidden" id="avatarHidden" name="linkAnh" value="FImage.jpg">
        </fieldset>
      </div>
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



