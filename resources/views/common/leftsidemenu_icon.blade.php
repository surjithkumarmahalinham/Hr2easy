<div class="deznav">
    <div class="deznav-scroll">
        <ul class="nav menu-tabs">
            <?php 
            $uerpermission = array();
            if($userpermission_list!=''){
                $uerpermission = explode(',',$userpermission_list);
            }
            $home=0;$knowledge_base =0;$financial_management=0;$human_resorce_management =0;$productivity_tools=0;
            $talent_building_performance_measurement=0;$raise_a_ticket=0;$setting=0;
            foreach($sidemenu_lists as $sidemenu_list) { 
                if(in_array($sidemenu_list->menu_id,$uerpermission) && $sidemenu_list->menu_slug=='home')
                {
                    $home = 1;
                }
                if(in_array($sidemenu_list->menu_id,$uerpermission) && $sidemenu_list->menu_slug=='knowledge-base')
                {
                    $knowledge_base = 1;
                }
                if(in_array($sidemenu_list->menu_id,$uerpermission) && $sidemenu_list->menu_slug=='financial-management')
                {
                    $financial_management = 1;
                }
                if(in_array($sidemenu_list->menu_id,$uerpermission) && $sidemenu_list->menu_slug=='human-resorce-management')
                {
                    $human_resorce_management = 1;
                }
                if(in_array($sidemenu_list->menu_id,$uerpermission) && $sidemenu_list->menu_slug=='productivity-tools')
                {
                    $productivity_tools = 1;
                } 
                if(in_array($sidemenu_list->menu_id,$uerpermission) && $sidemenu_list->menu_slug=='talent-building-performance-measurement')
                {
                    $talent_building_performance_measurement = 1;
                }
                if(in_array($sidemenu_list->menu_id,$uerpermission) && $sidemenu_list->menu_slug=='raise-a-ticket')
                {
                    $raise_a_ticket = 1;
                }
                if(in_array($sidemenu_list->menu_id,$uerpermission) && $sidemenu_list->menu_slug=='setting')
                {
                    $setting = 1;
                }
            }?>
            
            <?php if($home==1 || session()->get('ses_role_id')==1){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if(session()->get('active_class')=='home'){ echo 'active'; } ?>" data-toggle="tab" href="#home" >
                <svg id="icon-home1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>

                </a>
            </li>
            <?php } ?>

            <?php if($knowledge_base==1 || session()->get('ses_role_id')==1){ ?>
            <li class="nav-item" >
                <a class="nav-link <?php if(session()->get('active_class')=='knowledge-base'){ echo 'active'; } ?>" data-toggle="tab" href="#knowledge-base">
                <svg id="icon-home" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                </a>
            </li>
            
            <?php } if($financial_management==1 || session()->get('ses_role_id')==1){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if(session()->get('active_class')=='financial-management'){ echo 'active'; } ?>" data-toggle="tab" href="#financial-management">
                <svg id="icon-apps" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </a>
            </li>
            
            <?php } if($human_resorce_management==1 || session()->get('ses_role_id')==1){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if(session()->get('active_class')=='human-resorce-management'){ echo 'active'; } ?>" data-toggle="tab" href="#human-resorce-management">
                <svg id="icon-bootstrap" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                </a>
            </li>
            
            <?php } if($productivity_tools==1 || session()->get('ses_role_id')==1){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if(session()->get('active_class')=='productivity-tools'){ echo 'active'; } ?>" data-toggle="tab" href="#productivity-tools">
                <svg id="icon-forms" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" style="stroke-dasharray: 66, 86; stroke-dashoffset: 0;"></path><path d="M14,2L14,8L20,8" style="stroke-dasharray: 12, 32; stroke-dashoffset: 0;"></path><path d="M16,13L8,13" style="stroke-dasharray: 8, 28; stroke-dashoffset: 0;"></path><path d="M16,17L8,17" style="stroke-dasharray: 8, 28; stroke-dashoffset: 2;"></path><path d="M10,9L9,9L8,9" style="stroke-dasharray: 2, 22; stroke-dashoffset: 12;"></path></svg>
                </a>
            </li>
            
            <?php } if($talent_building_performance_measurement==1 || session()->get('ses_role_id')==1){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if(session()->get('active_class')=='talent-building-performance-measurement'){ echo 'active'; } ?>" data-toggle="tab" href="#talent-building-performance-measurement">
                <svg id="icon-table" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
                </a>
            </li>
            
            <?php } if($raise_a_ticket==1 || session()->get('ses_role_id')==1){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if(session()->get('active_class')=='raise-a-ticket'){ echo 'active'; } ?>" data-toggle="tab" href="#raise-a-ticket">
                <svg id="icon-pages" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                    <rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect>
                </svg>
                </a>
            </li>
            
            <?php } if($setting==1 || session()->get('ses_role_id')==1){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if(session()->get('active_class')=='setting'){ echo 'active'; } ?>" data-toggle="tab" href="#setting">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="setting feather-grid">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"/>
                            <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"/>
                        </g>
                    </svg>
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>