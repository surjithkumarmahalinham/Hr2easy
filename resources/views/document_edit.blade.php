@include('common.header')
@include('common.leftsidemenu_icon')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Document Edit</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('document-list')}}">Document List</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Document Edit</a></li>
                </ol>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Document Edit</h4>
                    </div>

                    <div class="card-body">
                        <form id="document-form" data-parsley-validate="">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>Document Name</label>
                                </div>

                                <div class="col-6">
                                    <input type="text" class="form-control" name="doc_name" id="doc_name" value="{{$document_detail->doc_name}}"required/>
                                </div>

                            </div>


                            <div class="row form-group">
                                
                                    <div class="col-3">
                                        <label>Document Cover Image</label>
                                    </div>

                                    <div class="col-6">
                                        <input type="file" class="form-control" name="doc_image" id="doc_image"  />
                                    </div>
                                    @if($document_detail->doc_image!='')
                                        <img src="{{url('public/document/'.$document_detail->doc_image)}}"  width="70" height="50">
                                    @endif
                                
                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>Document PDF</label>
                                </div>

                                <div class="col-6">
                                    <input type="file" class="form-control" name="doc_pdf" id="doc_pdf"  />
                                </div>
                                @if($document_detail->doc_pdf!='')
                                    <a href="{{url('public/document/'.$document_detail->doc_pdf)}}" class="btn btn-primary" target="_blank">View PDF</a>
                                @endif
                            
                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label></label>
                                </div>

                                <div class="col-6">
                                    <input type="button" class="btn btn-primary" value="Update" onclick="Update_document();" />
                                    <a href="{{url('document-list')}}" class="btn btn-secondary">Cancel</a>
                                </div>

                            
                            </div>
                        </form>   


                        
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


@include('common.footer')

    <script>
        function Update_document(){
            var valdate = $('#document-form').parsley().validate();
            if(valdate){
                var formdata=new FormData(document.getElementById('document-form'));;

                $.ajax({

                    url: "{{ url('document-update/'.$document_detail->document_id) }}",
                    type: 'POST',
                    data: formdata,
                    dataType: 'json',
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function (response)
                    {
                        if(response.status==200){
                            alert(response.msg);
                            window.location.href = "{{ url('document-list')}}";
                        }else if(response.status==201){
                            alert(response.msg);
                        }

                    }

                });

            }
        }
    </script>

</body>
</html>