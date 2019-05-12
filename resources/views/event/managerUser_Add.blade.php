@extends('index')

@section("menu-admin")
active
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('get.manager')}}">Trang chủ</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{route('get.manager.users')}}">Quản lý người dùng</a>
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
    <h2 class="text-center">Thêm mới người dùng</h2>
    <br/>  
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
    <form action="{{route('post.manager.users.add')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" role="form">
      @method('post')
      @csrf
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label class="col-sm-12 control-label" for="">Họ tên</label>
            <div class="col-sm-12">
              <input class="form-control" name="name" type="text">
            </div>
          </div> <!-- end form-group -->
          <div class="form-group">
            <label class="col-sm-12 control-label" for="">Tài khoản</label>
            <div class="col-sm-12">
              <input class="form-control" name="username" type="text">
            </div>
          </div> <!-- end form-group --> 
          <div class="form-group">
            <label class="col-sm-12 control-label" for="">Mã người dùng</label>
            <div class="col-sm-12">
              <input class="form-control" name="userNo" type="text">
            </div>
          </div> <!-- end form-group --> 
          <div class="form-group">
            <label class="col-sm-12 control-label" for="">Email</label>
            <div class="col-sm-12">
              <input class="form-control" name="email" type="text">
            </div>
          </div> <!-- end form-group --> 
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <div class="col-sm-12">
              <label class="control-label">Chức vụ</label>
              <select class="form-control" name="level">
                <option value="0">Lái xe</option>
                <option value="1">Quản lý</option>
                <option value="2">Khách hàng</option>
                <option value="3">Điều phối viên</option>
              </select>
            </div>
          </div> <!-- end form-group -->
          <div class="form-group">
            <label class="col-sm-12 control-label" for="">Mật khẩu</label>
            <div class="col-sm-12">
              <input class="form-control" name="password" type="password">
            </div>
          </div> <!-- end form-group -->
          <div class="form-group">
            <label class="col-sm-12 control-label" for="">Nhập lại mật khẩu</label>
            <div class="col-sm-12"><input class="form-control" name="password_confirmation" type="password"></div>
          </div> <!-- end form-group -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-sm-12 col-sm-offset-5">
          <div class="form-group">
            <input type="submit" name="btnAdd" class="btn btn-primary" value="Thêm">
            <a href="{{route('get.manager.users')}}" class="btn btn-default">Thoát</a>
          </div> <!-- end form-group -->
        </div>
      </div>
    </form>
  </div>
</div>
</div>
@endsection




