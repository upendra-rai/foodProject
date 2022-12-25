<!-- start: header -->
<header class="header" style="background:#1e1e2f; border:none; border-bottom: 1px solid #424351;">
  <div class="logo-container">
    <a href="" class="logo">
      <img src="<?php echo base_url(); ?>/catalogs/assets/images/logo.png" height="40" alt="JSOFT Admin" style="margin-left:10px;"/>
       <span class="role" style="color:#ffffff;">Sannata the tea house</span>
    </a>


    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
      <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
    </div>
  </div>

  <!-- start: search & user box -->
  <div class="header-right">
      <div class="col-md-6">
        <p style="color: #ffffff; font-size: 20px;  line-height: 55px; text-transform: uppercase; letter-spacing: 1px;
padding-left: 0px;">Food Delivery Menagement System</p>
  <!--   <ul class="quick_report">
        <li><button class="btn btn-primary" style="background-color:#203457; color:#2489fd; "><i class="ion-ios-settings-strong"></i></button></li>
        <li><button class="btn btn-primary" style="background-color:#49392c; color:#f6a726; "><i class="ion-ios-gear-outline"></i></button></li>
      <li><button class="btn btn-primary" style="background-color:#2f3e2b; color:#72c015; "><i class="ion-ios-cart-outline"></i></button></li>
        <li><button class="btn btn-primary" style="background-color:#4c2635; color:#ff4747; "><i class="ion-ios-close-outline"></i></button></li>
      <li><button class="btn btn-primary" style="background-color:#203457; color:#2489fd; "><i class="ion-ios-settings-strong"></i></button></li>
        <li><button class="btn btn-primary" style="background-color:#49392c; color:#f6a726; "><i class="ion-ios-gear-outline"></i></button></li>
      <li><button class="btn btn-primary" style="background-color:#2f3e2b; color:#72c015; "><i class="ion-ios-cart-outline"></i></button></li>
        <li><button class="btn btn-primary" style="background-color:#4c2635; color:#ff4747; "><i class="ion-ios-close-outline"></i></button></li>


      <li><button class="btn btn-primary" style="background-color:#203457; color:#2489fd; "><i class="ion-ios-settings-strong"></i></button></li>
        <li><button class="btn btn-primary" style="background-color:#49392c; color:#f6a726; "><i class="ion-ios-gear-outline"></i></button></li>
      <li><button class="btn btn-primary" style="background-color:#2f3e2b; color:#72c015; "><i class="ion-ios-cart-outline"></i></button></li>
        <li><button class="btn btn-primary" style="background-color:#4c2635; color:#ff4747; "><i class="ion-ios-close-outline"></i></button></li>
      <li><button class="btn btn-primary" style="background-color:#203457; color:#2489fd; "><i class="ion-ios-settings-strong"></i></button></li>
        <li><button class="btn btn-primary" style="background-color:#49392c; color:#f6a726; "><i class="ion-ios-gear-outline"></i></button></li>

     </ul> -->
         <!--<ul id="breadcrumbs-four">
                  <li><a href="">Home ></a></li>
                  <li><a class="" href="">Customer</a></li>

                </ul> -->
    </div>
    <!--<div class="col-md-3">
    <form action="pages-search-results.html" class="search nav-form">
      <div class="input-group input-search" style="width:100%;">
        <input type="text" class="form-control" name="q" id="q" placeholder="Search..." style="background-color:#1e1e2f; border:1px solid #1e1e2f; ">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
        </div> -->
    <span class="separator"></span>

    <ul class="notifications">

      <li>
        <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
          <i class="fa fa-envelope"></i>
          <span class="badge feedback_noti_span" ></span>
        </a>

        <div class="dropdown-menu notification-menu">
          <div class="notification-title" style="background-color:#27293d;">
            <span class="pull-right label label-default feedback_noti_span"></span>
            Messages
          </div>

          <div class="content" style="background-color:#1d1d2e; padding:0px;">
            <ul id="feedback_notification">
            
            </ul>

           <!-- <div class="text-right">
              <a href="#" class="view-more">View All</a>
            </div> -->
          </div>
        </div>
      </li>
      <li>
        <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
          <i class="fa fa-bell"></i>
          <span class="badge" id="noti_order_span"></span>
        </a>

        <div class="dropdown-menu notification-menu">
          <div class="notification-title" style="background-color:#27293d;">
            <span class="pull-right label label-default "></span>
            New Order
          </div>

          <div class="content" style="background-color:#1d1d2e; padding:0px;">
            <ul id="order_notification">
              
            </ul>
              
              
           <!--
            <div class="text-right">
              <a href="#" class="view-more">View All</a>
            </div>-->
          </div>
         <!--   <div class="notification-title" style="background-color:#27293d;">
            <span class="pull-right label label-default "></span>
            New Order
          </div> -->
        </div>
      </li>
    </ul>

    <span class="separator"></span>

    <?php if($this->session->userdata('user_role') == 'master admin'){ ?>
    <div  class="userbox" >
     <a href="#" data-toggle="dropdown">
       
        <div class="profile-info" style="width:80px; overflow:hidden;">
          
          <span class="role"> <?php   if($this->session->userdata('outlet_name')){ echo str_ireplace("%20"," ",$this->session->userdata('outlet_name')) ; }else{ echo 'All Outlet'; }; ?> </span>
        </div>

        <i class="fa custom-caret"></i>
        </a>

      <div class="dropdown-menu" style="background-color:#28263a;">
        <ul class="list-unstyled" id="append_outlet">
        
           
        </ul>
      </div>
    </div>
      
    <?php } ?>  
      
      <div id="userbox" class="userbox" style="ont-weight:700; background-color:<?php if($this->session->userdata('user_role') == 'master admin'){ echo '#ff4748'; }else if($this->session->userdata('user_role') == 'admin'){ echo '#673ab7'; }else if($this->session->userdata('user_role') == 'sub admin'){ echo '#b5f43e'; } ?>; color:#ffffff; padding:5px 5px; border-radius:30px; width: 160px; text-align:center; float:right; margin-top:10px;">
      <a href="#" data-toggle="dropdown">
        
        <div class="profile-info">
          <!--<span class="name" style="font-size:10px;"><?php echo $this->session->userdata('user_name'); ?></span>-->
          <span class="role" style="font-size:14px; font-weight:700; text-transform:capitalize;"><?php echo $this->session->userdata('user_role'); ?></span>
        </div>

        <i class="fa custom-caret" style="color:#ffffff;"></i>
      </a>

      <div class="dropdown-menu" style="background-color:#28263a;">
        <ul class="list-unstyled">
          <li class="divider"></li>
          <li>
            <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> Profile</a>
          </li>
          <li>
            <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock</a>
          </li>
          <li>
            <a role="menuitem" tabindex="-1" href="<?php echo base_url() ?>dashboard/logout"><i class="fa fa-power-off"></i> Logout</a>
          </li>
        </ul>
      </div>
    </div>
     
      
  </div>
  <!-- end: search & user box -->
</header>
<!-- end: header -->
