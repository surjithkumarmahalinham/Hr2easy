@include('common.header')
@include('common.leftsidemenu_icon')


<div class="content-body">

<div class="container-fluid">
<div class="row page-titles mx-0">
<div class="col-sm-6 p-md-0">
<div class="welcome-text">
<h4>Document List</h4>

</div>
</div>
<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
<li class="breadcrumb-item active"><a href="javascript:void(0)">Document List</a></li>
</ol>
</div>
</div>
<div class="row">

<div class="col-xl-9 col-xxl-12">
 <div class="card-body bg-white" style="padding:10px;">
<div class="row" >
<div class="col-xl-12 col-xxl-12">
<div class="menu-list">
<div class="row" style="border-bottom: 1px solid #085e81;margin-bottom: 15px;margin-right: -13px;margin-left: -13px;">
<div class="col-xl-6">
<h4>Document Details</h4>
    </div>
<div class="col-xl-6">

        <a  class="btn btn-primary" href="{{url('document-add')}}" style="margin-bottom: 10px;float:right;">Add Document</a>
    </div>
</div>


    <form id="document-delete">
       @csrf
    </form>
        <table class="table table-striped" id="display">
            <thead class="custom-thead">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Document Name</th>
                    <th scope="col">Document Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $cnt = 1; ?>
                @foreach($document_lists as $document_list)
                <tr>
                    <th scope="row">{{$cnt}}</th>
                    <td>{{$document_list->doc_name}}</td>
                    <td>
                        @if($document_list->doc_image!='')
                        <img src="{{url('public/document/'.$document_list->doc_image)}}"  width="70" height="50">
                        @endif
                    <td>
                        <a class="btn-sm btn-primary" href="{{url('document-edit/'.$document_list->document_id)}}"><i class="fa fa-edit"></i></a>
                        <a class="btn-sm btn-danger" href="javascript:void(0);" onclick="document_delete('{{ $document_list->document_id }}');"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php $cnt++; ?>
                @endforeach
            </tbody>
        </table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


@include('common.footer')



<script>

    $(document).ready(function () {
        $('#display').DataTable();
    });

    function document_delete(document_id){

        if(window.confirm('Are you sure, you want to delete!')){
            
            var formdata = $("#document-delete").serialize();
            $.ajax({

                url: "{{url('document-delete/')}}/"+document_id,
                type: 'post',
                dataType: 'json',
                data: formdata,
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