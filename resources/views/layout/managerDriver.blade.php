@extends('index')

@section("menu-manager-book")
sl-active
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('get.manager')}}">Trang chủ</a>
  </li>
  <li class="breadcrumb-item active">
    Hồ sơ lái xe
  </li> 
</ol>
@endsection

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <div class="portlet-title">
        <div class="row">
          <div class="col-sm-7">
            <div class="caption">
              <div class="wrapper-action">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Bulk Actions
                </button>
                <div class="dropdown-menu">
                 <a class="dropdown-item" href="#">Update</a>
                 <a class="dropdown-item" href="#">Delete</a>
               </div>  
             </div>
           </div>
        </div>
        <div class="col-sm-5">
          <div class="portlet-title-right">
            <a class="btn btn-secondary" href="{{route('get.manager.driver.add')}}">
             <i class="fa fa-plus"></i> Create </a>
             <button class="btn btn-secondary">
              <i class="fas fa-sync"></i> Reload
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="table-responsive-xl">
      <table class="table table-sm table-hover">
        <thead class="thead-light">
          <tr>
            <th scope="col">
              <div class="checkbox checkbox-primary table-checkbox">
                <input type="checkbox" id="checkAll" class="checkboxes"value="">
              </div>
            </th>
            <th scope="col">STT</th>
            <th scope="col">Mã số lái xe</th>
            <th scope="col">Họ tên lái xe</th>
            <th scope="col">Ngày sinh</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Ngày vào làm</th>
            <th scope="col">Cmnd</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Điện thoại</th>
            <th scope="col">Email</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Ghi chú</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($drivers as $driver)
          <tr class="tr-info">
            <th scope="row">
              <div class="checkbox checkbox-primary">
                <input type="checkbox" class="check" name="check[]" value="{{$driver['id']}}">
              </div>
            </th>
            <td>{{++$stt}}</td>
            <td>{{$driver["DriverNo"]}}</td>
            <td>{{$driver["DriverName"]}}</td>
            <td>{{$driver["Birthday"]}}</td>
            <td>{{$driver["Address"]}}</td>
            <td>{{$driver["FrWork"]}}</td>
            <td>{{$driver["Cmnd"]}}</td>
            <td>{{$driver["Sex"]}}</td>
            <td>{{$driver["Phone"]}}</td>
            <td>{{$driver["Email"]}}</td>
            <td>{{$driver["Status"]}}</td>
            <td>{{$driver["Notes"]}}</td>
            <td class="action-button">
              <a class="btn btn-primary" href="{{action('DriverController@getManagerDriver_Edit',$driver['id'])}}"><i class="fa fa-edit"></i></a>
              <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" href="{{action('DriverController@getManagerDriver_Delete',$driver['id'])}}"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>


@endsection


@section('scriptBottom')
<script>
  $(document).ready(function() {
    $("#checkAll").click(function() {
      $(".check").prop("checked", this.checked);
    });

    $('.check').click(function() {
      if ($('.check:checked').length == $('.check').length) {
        $('#checkAll').prop('checked', true);
      } else {
        $('#checkAll').prop('checked', false);
      }
    });
  });
</script>
@endsection




