<div class="fixed-content-box">
<div class="head-name">
<img src="{{url('public/images/logo-color.png')}}" class="logo-color" >
<span class="close-fixed-content fa-left d-lg-none">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24" /><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1" /><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) " /></g></svg>
</span>
</div>
<div class="fixed-content-body dz-scroll" id="DZ_W_Fixed_Contant">
<div class="tab-content" id="menu">
    
    <div class="tab-pane fade <?php if(session()->get('active_class')=='home'){ echo 'show active'; } ?>" id="home" role="tabpanel"> 
        <ul class="metismenu tab-nav-menu">
            <li class="nav-label">Main Menu</li>
            <li>
                <a class="has-arrow" href="javascript:void(0);" aria-expanded="false" onclick="activemenufunc('home','dashboard');">Home</a>
            </li>
        </ul>
    </div>

    <div class="tab-pane fade <?php if(session()->get('active_class')=='knowledge-base'){ echo 'show active'; } ?>" id="knowledge-base" role="tabpanel">
        <ul class="metismenu tab-nav-menu">
            <li class="nav-label">Main Menu</li>
            <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false"> Knowledge Base</a>
                <ul aria-expanded="false" class="mm-collapse mm-show">
                    <li><a href="javascript:void(0);" onclick="activemenufunc('knowledge-base','manual-list');">Manual</a></li>
                    <li><a href="issue-and-solution.html" onclick="activemenufunc('knowledge-base','');">Issues and Solution</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="tab-pane fade <?php if(session()->get('active_class')=='financial-management'){ echo 'show active'; } ?>" id="financial-management">
        <ul class="metismenu tab-nav-menu">
            <li class="nav-label">Main Menu</li>
            <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">Financial Management</a>
                <ul aria-expanded="false" class="mm-collapse mm-show">

                    <!--<li><a href="applying-leave.html">Applying Leave</a></li>
                    <li><a href="overtime-planing.html">Overtime Planning</a></li>
                    <li><a href="accounting-system.html">Accounting System</a></li>
                    <li><a href="user-management.html">User Management</a></li>-->
                    @foreach($fm_module_lists as $fm_module_list)
                    <li><a href="javascript:void(0);" onclick="activemenufunc('financial-management','video-detail','<?= $fm_module_list->video_id; ?>');">{{$fm_module_list->video_name}}</a></li>
                    @endforeach

                </ul>
            </li>
        </ul>
    </div>

    <div class="tab-pane fade <?php if(session()->get('active_class')=='human-resorce-management'){ echo 'show active'; } ?>" id="human-resorce-management">
    <ul class="metismenu tab-nav-menu">
        <li class="nav-label">Main Menu</li>
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">Human Resorce Management</a>
            <ul aria-expanded="false" class="mm-collapse mm-show">
                <li><a href="javascript:void();" onclick="activemenufunc('human-resorce-management','attendance-mangement.html');">Attendance Mangement</a></li>
                <li><a href="javascript:void();" onclick="activemenufunc('human-resorce-management','exit-process.html');">Exit Process</a></li>
                <li><a href="javascript:void();" onclick="activemenufunc('human-resorce-management','leave-management.html');">Leave Management</a></li>
                <li><a href="javascript:void();" onclick="activemenufunc('human-resorce-management','on-boarding.html');">On Boarding & Orientation</a></li>
                <li><a href="javascript:void();" onclick="activemenufunc('human-resorce-management','recruitment.html');">Recruitment</a></li>
                <li><a href="javascript:void();" onclick="activemenufunc('human-resorce-management','travel.html');">Travel</a></li>
                <li><a href="javascript:void();" onclick="activemenufunc('human-resorce-management','user-mangement.html');">User Mangement</a></li>
                <li><a href="javascript:void();" onclick="activemenufunc('human-resorce-management','sign-in.html');">Sign In & Sign Out</a></li>
                <li><a href="javascript:void();" onclick="activemenufunc('human-resorce-management','leave-mangement.html');">Leave Mangement</a></li>
            </ul>
        </li>
    </ul>
    </div>

    <div class="tab-pane fade <?php if(session()->get('active_class')=='productivity-tools'){ echo 'show active'; } ?>" id="productivity-tools">
        <ul class="metismenu tab-nav-menu">
            <li class="nav-label">Main Menu</li>
            <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">Productivity tools</a>
                <ul aria-expanded="false" class="mm-collapse mm-show">
                    <li><a href="javascript:void();" onclick="activemenufunc('productivity-tools','booking-system.html');">Booking System</a></li>
                    <li><a href="javascript:void();" onclick="activemenufunc('productivity-tools','CRM.html');">CRM</a></li>
                    <li><a href="javascript:void();" onclick="activemenufunc('productivity-tools','inventory.html');">Inventory</a></li>
                    <li><a href="javascript:void();" onclick="activemenufunc('productivity-tools','license.html');">License, Tax and Insurance</a></li>
                    <li><a href="javascript:void();" onclick="activemenufunc('productivity-tools','survey.html');">Survey</a></li>
                    <li><a href="javascript:void();" onclick="activemenufunc('productivity-tools','timesheet.html');">Timesheet</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="tab-pane fade <?php if(session()->get('active_class')=='talent-building-performance-measurement'){ echo 'show active'; } ?>" id="talent-building-performance-measurement">
        <ul class="metismenu tab-nav-menu">
            <li class="nav-label">Main Menu</li>
            <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">Talent Building & Performance Measurement</a>
                <ul aria-expanded="false" class="mm-collapse mm-show">
                    <li><a href="javascript:void();" onclick="activemenufunc('talent-building-performance-measurement','kpi.html');">KPI</a></li>
                    <li><a href="javascript:void();" onclick="activemenufunc('talent-building-performance-measurement','succession-planning.html');">Succession Planning</a></li>
                    <li><a href="javascript:void();" onclick="activemenufunc('talent-building-performance-measurement','training.html');">Training</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="tab-pane fade <?php if(session()->get('active_class')=='raise-a-ticket'){ echo 'show active'; } ?>" id="raise-a-ticket">
        <ul class="metismenu tab-nav-menu">
            <li class="nav-label">Main Menu</li>
            <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">Raise a Ticket</a>
                <ul aria-expanded="false" class="mm-collapse mm-show">
                    <li><a href="javascript:void();" onclick="activemenufunc('raise-a-ticket','raise-a-ticket.html');">Raise a Ticket</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="tab-pane fade <?php if(session()->get('active_class')=='setting'){ echo 'show active'; } ?>" id="setting" role="tabpanel"> 
        <ul class="metismenu tab-nav-menu">
            <li class="nav-label">Main Menu</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"> Setting</a>
                <ul aria-expanded="false" class="mm-collapse mm-show">
                    <li><a href="javascript:void();" onclick="activemenufunc('setting','menu-list');">Menu</a></li>
                    <li><a href="javascript:void();" onclick="activemenufunc('setting','role-list');">Role</a></li>
                    <li><a href="javascript:void();" onclick="activemenufunc('setting','user-list');">User</a></li>
                    <li><a href="javascript:void();" onclick="activemenufunc('setting','document-list');">Documents Upload</a></li>
                    <li><a href="javascript:void(0);" onclick="activemenufunc('setting','video-list');">Video Upload</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

</div>
</div>


