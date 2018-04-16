@extends('admin/layout/header')
@section('content')

<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa-files-o"></i> {{$title}}
      <!-- prompt -->
      </h3>
      
    </div>
  </div>
      <!-- Form validations -->              
      <div class="row">
          <div class="col-lg-12">
              <section class="panel">
                  
                  <div class="panel-body">
                      <div class="form">
                          <form class="form-validate form-horizontal" id="feedback_form" method="post" action="/admin/poster/{{$data['POid']}}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          {{ method_field('PUT') }}
                              <div class="form-group ">
                                  <label for="cname" class="control-label col-lg-2">广告商 <span class="required">*</span></label>
                                  <div class="col-lg-5">
                                      <input class="form-control" id="POauthor" name="POauthor" minlength="5" type="text" value="{{$data['POauthor']}}" required />
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="cemail" class="control-label col-lg-2">类型 <span class="required">*</span></label>
                                  <div class="col-lg-5">

                                      <input class="form" id="cemail" type="radio" name="POtype" value="商业广告" required style="outline:none;width:30px;height:20px;" <?php echo  $data['POtype'] == '商业广告'?'checked':'' ?>>
                                      <span style="font-size:16px;">商业广告</span>&nbsp;&nbsp;

                                      <input class="form" id="cemail" type="radio" name="POtype" value="公益广告" required style="outline:none;width:30px;height:20px" <?php echo  $data['POtype'] == '公益广告'?'checked':'' ?>>
                                      <span style="font-size:16px;">公益广告</span>&nbsp;&nbsp;

                                      <input class="form" id="cemail" type="radio" name="POtype" value="通知广告" required style="outline:none;width:30px;height:20px" <?php echo  $data['POtype'] == '通知广告'?'checked':'' ?>>
                                      <span style="font-size:16px;">通知广告</span>&nbsp;&nbsp;

                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="curl" class="control-label col-lg-2">价格</label>
                                  <div class="col-lg-5">
                                      <input class="form-control " id="POprice" type="text" name="POprice" value="{{$data['POprice']}}" />
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="cname" class="control-label col-lg-2">广告图 <span class="required">*</span></label>
                                  <div class="col-lg-5">
                                      <img src="{{$data['POpic']}}" alt="" style="width:450px;height:300px;">
                                      <input class="form-control btn btn-info" id="POpic" name="POpic" minlength="5" type="file" />
                                      <!-- 当没有上传文件时 -->
                                      <input name ="POpic2" type="hidden" value="{{$data['POpic']}}" />

                                  </div>
                              </div>                                      
                              
                              <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-success" type="submit">Edit</button>
                                      <button class="btn btn-default" type="reset">Cancel</button>
                                  </div>
                              </div>
                          </form>
                      </div>

                  </div>
              </section>
          </div>
      </div>
      <!-- page end-->
  </section>
</section>
<!--main content end-->


@endsection