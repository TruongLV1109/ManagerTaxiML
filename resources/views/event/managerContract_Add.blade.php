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
    <a href="{{route('get.manager.contract')}}">Quản lý hợp đồng</a>
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
    <h2 class="text-center">Thêm mới hợp đồng</h2>
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
    <form action="{{route('post.manager.contract.add')}}" method="POST" class="form-horizontal" role="form">
      @method('post')
      @csrf
    <div class="row">
        <div class="col-sm-8">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="col-sm-12 d-b c-red control-label" for="">Mã số hợp đồng</label>
                <div class="col-sm-12">
                  <input class="form-control" name="ContractNo" type="text">
                </div>
              </div> <!-- end form-group -->
               <div class="form-group d-n">
                <label class="col-sm-12 d-b c-red control-label" for="">Số hợp đồng</label>
                <div class="col-sm-12">
                  <input class="form-control" name="ContractSeq" type="text">
                </div>
              </div> <!-- end form-group -->
             <div class="form-group">
              <div class="col-sm-12">
                <label class="control-label d-b c-red">Loại hợp đồng</label>
                <select class="form-control" id="IdContractType" name="IdContractType">
                  @foreach($ContractTypes as $ContractType)
                  <option value="{{$ContractType['id']}}">{{$ContractType['ContractTypeName']}}</option>
                  @endforeach
                </select>
              </div>
            </div> <!-- end form-group -->
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="col-sm-12 d-b c-red control-label" for="">Tên hợp đồng</label>
                <div class="col-sm-12">
                  <input class="form-control" name="ContractName" type="text">
                </div>
              </div> <!-- end form-group --> 
              <div class="form-group">
                <label class="col-sm-12 d-b c-red control-label" for="">Ngày hiệu lực</label>
                <div class="col-sm-12"><input class="form-control datepicker-here" name="FrDate" type="text" data-language='en'></div>
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
         <div class="form-group">
              <label class="col-sm-12 d-b c-red control-label" for="">Mã số lái xe</label>
              <div class="col-sm-12">
                <input class="form-control" name="IdDriver" type="text">
              </div>
          </div> <!-- end form-group --> 
          <div class="form-group vi-h" id="ExDate">
            <label class="col-sm-12 d-b c-red control-label" for="">Hết hiệu lực</label>
            <div class="col-sm-12"><input class="form-control datepicker-here" name="ExDate" type="text" data-language='en'></div>
          </div> <!-- end form-group -->
        <fieldset class="form-group">
          <label class="col-sm-12 d-b c-red control-label" for="">File đính kèm</label>
          <input type="file" id="avatar" name="FileContent" value="FImage.jpg" style="margin-left: 16px;">
        </fieldset>
        <div class="form-group" style="margin-top: 115px;margin-left: -15px;">
          <div class="col-sm-12 ml-12">
            <div class="waves-input-wrapper waves-effect waves-light"><input type="submit" name="btnAdd" class="btn btn-primary" value="Thêm"></div>
            <a href="http://localhost:8080/ManagerTaxiML/public/manager/Contract" class="btn btn-default waves-effect waves-light">Thoát</a>
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
$("#IdContractType").change(function() {
      console.log(this.value);
         if(this.value == 1){
            $('#ExDate').addClass("vi-h");
         }else {
            $('#ExDate').removeClass("vi-h");
         }
    });
</script>
@endsection
