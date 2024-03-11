@include('common.header')
@include('common.leftsidemenu_icon')

<div class="content-body">

<div class="container-fluid">
<div class="row page-titles mx-0">
<div class="col-sm-6 p-md-0">
<div class="welcome-text">
<h4>{{$document_detail->doc_name}}</h4>

</div>
</div>
<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('dashborad')}}">Home</a></li>
<li class="breadcrumb-item"><a href="{{url('manual-list')}}">Manual List</a></li>
<li class="breadcrumb-item active"><a href="javascript:void(0)">Manual Detail</a></li>
</ol>
</div>
</div>
<div class="row">
<div class="col-xl-9 col-xxl-12">
<div class="row">
<div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
<div class="card-body bg-white">

<div id="pdfdoc" onload="">
  <object width="100%" height="500px" type="application/pdf" oncontextmenu="return false" 
data="{{url('public/document/'.$document_detail->doc_pdf)}}#toolbar=0" id="pdf_content"></object>

</div>
</div>
</div>



</div>
</div>
</div>
</div>
</div>

@include('common.footer')

</body>
</html>