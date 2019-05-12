@extends('index')

@section("menu-manager-driver")
sl-active
@endsection

@section('collapseDriver')
show
@endsection

@section("menu-manager-contract")
sm-active
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('get.manager')}}">Trang chủ</a>
  </li>
  <li class="breadcrumb-item active">
    Quản lý hợp đồng
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
            <a class="btn btn-secondary" href="{{route('get.manager.contract.add')}}">
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
            <th scope="col">Mã số hợp đồng</th>
            <th scope="col">Tên hợp đồng</th>
            <th scope="col">Mã số lái xe</th>
            <th scope="col">Họ tên lái xe</th>
            <th scope="col">Loại hợp đồng</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($contracts as $contract)
          <tr class="tr-info">
            <th scope="row">
              <div class="checkbox checkbox-primary">
                <input type="checkbox" class="check" name="check[]" value="{{$contract->id}}">
              </div>
            </th>
            <td>{{++$stt}}</td>
            <td>{{$contract->ContractNo}}</td>
            <td>{{$contract->ContractName}}</td>
            <td>{{$contract->DriverNo}}</td>
            <td>{{$contract->DriverName}}</td>
            <td>{{$contract->ContractTypeName}}</td>
            @if($contract->status == 1)
              <td style="color: red;">Hết hiệu lực</td>
            @else
              <td style="color: blue;">Còn hiệu lực</td>
            @endif
            <td class="action-button">
              <a class="btn btn-primary" href="{{action('ContractController@getManagerContract_Edit',$contract->id)}}"><i class="fa fa-edit"></i></a>
              <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" href="{action('ContractController@getManagerContract_Delete',$contracts['id'])}}"><i class="fa fa-trash"></i></a>
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




