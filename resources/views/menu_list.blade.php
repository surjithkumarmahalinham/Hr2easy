@include('common.header')
@include('common.leftsidemenu_icon')


<div class="content-body">

<div class="container-fluid">
<div class="row page-titles mx-0">
<div class="col-sm-6 p-md-0">
<div class="welcome-text">
<h4>Menu List</h4>

</div>
</div>
<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
<li class="breadcrumb-item active"><a href="javascript:void(0)">Menu List</a></li>
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
<h4>Menu Details</h4>
    </div>
<div class="col-xl-6">

        <a  class="btn btn-primary" href="{{url('menu-add')}}" style="margin-bottom: 10px;float:right;">Add Menu</a>
    </div>
</div>


    <form id="menu-delete">
       @csrf
    </form>
        <table class="table table-striped" id="display">
            <thead class="custom-thead">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu Name</th>
                    <th scope="col">Menu Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $cnt = 1; ?>
                @foreach($menu_lists as $menu_list)
                <tr>
                    <th scope="row">{{$cnt}}</th>
                    <td>{{$menu_list->menu_name}}</td>
                    @if($menu_list->menu_status=='1')
                    <td><button class="btn btn-success">Active</button></td>
                    @else
                    <td><button class="btn btn-danger">In-Active</button></td>
                    @endif
                    <td>
                        <a class="btn-sm btn-primary" href="{{url('menu-edit/'.$menu_list->menu_id)}}"><i class="fa fa-edit"></i></a>
                        <a class="btn-sm btn-danger" href="javascript:void(0);" onclick="menu_delete('{{ $menu_list->menu_id }}');"><i class="fa fa-trash"></i></a>
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

    function menu_delete(menu_id){

        if(window.confirm('Are you sure, you want to delete!')){
            
            var formdata = $("#menu-delete").serialize();
            $.ajax({

                url: "{{url('menu-delete/')}}/"+menu_id,
                type: 'post',
                dataType: 'json',
                data: formdata,
                success: function (response)
                {
                    if(response.status==200){
                            alert(response.msg);
                            window.location.href = "{{ url('menu-list')}}";
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