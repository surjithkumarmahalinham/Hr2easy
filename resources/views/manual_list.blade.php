@include('common.header')
@include('common.leftsidemenu_icon')

<div class="content-body">

<div class="container-fluid">
<div class="row page-titles mx-0">
<div class="col-sm-6 p-md-0">
<div class="welcome-text">
<h4>Hi, welcome back!</h4>

</div>
</div>
<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
<li class="breadcrumb-item active"><a href="javascript:void(0)">Manual List</a></li>
</ol>
</div>
</div>

<div class="row">
<div class="col-xl-9 col-xxl-12">
<div class="row">

    @foreach($document_lists as $document_list)
        <div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
        <div class="card">
        <a href="{{url('manual-detail/'.$document_list->document_id)}}">
        <img src="{{url('public/document/'.$document_list->doc_image)}}" class="img-full" >
        <img src="{{url('public/document/'.$document_list->doc_image)}}" class="img-full-tops" >
        <div class="text-overlay">Apply Leave</div>
        </a>
        </div>
        </div>
    @endforeach

<!--<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
<div class="card">
<a href="apply-leave-doc.html">
<img src="images/pdfimage/sign-in.png" class="img-full" >
<img src="images/pdfimage/play.png" class="img-full-tops" >
<div class="text-overlay">Approve Leave</div>
</a>
</div>
</div>

<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
<div class="card">
<a href="apply-leave-doc.html">
<img src="images/pdfimage/apply-overtime.png" class="img-full" >
<img src="images/pdfimage/play.png" class="img-full-tops" >
<div class="text-overlay"> Apply Overtime</div>
</a>
</div>
</div>



<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
<div class="card">
<a href="apply-leave-doc.html">
<img src="images/pdfimage/apply-timesheet.png" class="img-full" >
<img src="images/pdfimage/play.png" class="img-full-tops" >
<div class="text-overlay"> Apply Timesheet</div>
</a>
</div>
</div>


<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
<div class="card">
<a href="apply-leave-doc.html">
<img src="images/pdfimage/apply-replacement-leave.png" class="img-full" >
<img src="images/pdfimage/play.png" class="img-full-tops" >
<div class="text-overlay"> Apply Replacement Leave</div>
</a>
</div>
</div>

<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
<div class="card">
<a href="apply-leave-doc.html">
<img src="images/pdfimage/claim.png" class="img-full" >
<img src="images/pdfimage/play.png" class="img-full-tops" >
<div class="text-overlay"> Apply Claim</div>
</a>
</div>
</div>



<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
<div class="card">
<a href="apply-leave-doc.html">
<img src="images/pdfimage/apply-nomiee.png" class="img-full" >
<img src="images/pdfimage/play.png" class="img-full-tops" >
<div class="text-overlay"> Apply Nominee</div>
</a>
</div>
</div>


<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
<div class="card">
<a href="apply-leave-doc.html">
<img src="images/pdfimage/travel.png" class="img-full" >
<img src="images/pdfimage/play.png" class="img-full-tops" >
<div class="text-overlay"> Apply Claim Replacement leave</div>
</a>
</div>
</div>

<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
<div class="card">
<a href="apply-leave-doc.html">
<img src="images/pdfimage/apply-booking.png" class="img-full" >
<img src="images/pdfimage/play.png" class="img-full-tops" >
<div class="text-overlay"> Apply Booking</div>
</a>
</div>
</div>

<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
<div class="card">
<a href="apply-leave-doc.html">
<img src="images/pdfimage/apply-travel.png" class="img-full" >
<img src="images/pdfimage/play.png" class="img-full-tops" >
<div class="text-overlay"> Apply Travel</div>
</a>
</div>
</div>

<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
<div class="card">
<a href="apply-leave-doc.html">
<img src="images/pdfimage/apply-travel-claim.png" class="img-full" >
<img src="images/pdfimage/play.png" class="img-full-tops" >
<div class="text-overlay"> Apply Travel Claim</div>
</a>
</div>
</div>-->

</div>
</div>
</div>
</div>
</div>

@include('common.footer')

</body>
</html>