<div class="footer">
<div class="copyright">
<p>Copyrights © 2007 - 2009. HR2eazy Sdn. Bhd. All Rights Reserved.</p>
</div>
</div>



</div>
<script>
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{url('vendor/global/global.min.js')}}"></script>
<script src="{{url('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{url('vendor/chart.js/Chart.bundle.min.js')}}"></script>
<script src="{{url('js/custom.min.js')}}"></script>
<script src="{{url('js/deznav-init.js')}}"></script>

<script src="{{url('vendor/apexchart/apexchart.js')}}"></script>


<script src="{{url('vendor/peity/jquery.peity.min.js')}}"></script>

<script src="{{url('vendor/chartist/js/chartist.min.js')}}"></script>

<script src="{{url('js/dashboard/dashboard-1.js')}}"></script>
	<script src="{{url('js/plyr.min.js')}}"></script>
<script src="{{url('vendor/svganimation/vivus.min.js')}}"></script>
<script src="{{url('vendor/svganimation/svg.animation.js')}}"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>

    $(document).ready(function () { 
        function disableBack() {window.history.forward()}  // disable browser back arrow button
        window.onload = disableBack();
        window.onpageshow = function (evt) {if (evt.persisted) disableBack()}

        $(this).bind("contextmenu", function(e) { // disable right click
            e.preventDefault();
        });
    });

	function isNumberKey(e){
        if((e.which >= 48) && (e.which <= 57)){
            return true;
        }
        return false;
    }

    
    function activemenufunc(menuid,urls,id=''){

        $.ajax({

            url: "{{ url('active-class') }}",
            type: 'GET',
            data: "menuid="+menuid,
            dataType: 'json',
            success: function (response)
            {
                if(response.status==200){
                    if(id!=''){
                        window.location.href="{{url('')}}/"+urls+"/"+id;
                    }else{
                        window.location.href="{{url('')}}/"+urls;
                    }
                    
                }
            }

        });
    }
</script>