<!-- prompt -->
<ol class="breadcrumb">
	<!-- 读取模版的提示信息 -->
       @if(session('success'))
        <div class="alert alert-success fade in" style="padding:2px 10px 2px;margin-top:-4px;">
          <button data-dismiss="alert" class="close close-sm" type="button">
              <i class="icon-remove"></i>
          </button>
          {{  session('success') }}
        </div>
         @endif 
        

        @if(session('error'))
        <div class="alert alert-block alert-danger fade in" style="padding:2px 10px 2px;margin-top:-4px;">
          <button data-dismiss="alert" class="close close-sm" type="button">
              <i class="icon-remove"></i>
          </button>
          {{  session('error') }}
        </div>
        @endif
    <!-- 读取模版的提示信息结束 -->
</ol>