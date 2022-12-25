<aside id="sidebar-left" class="sidebar-left" style="padding-bottom:0px;">

  <!--<div class="sidebar-header">
    <div class="sidebar-title">
      Navigation
    </div>
    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
      <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
    </div>
  </div>
    -->
  <div class="nano">
    <div class="nano-content">
      <nav id="menu" class="nav-main" role="navigation">
        <ul class="nav nav-main">

        
          <li class="<?php if(isset($active_menu)){ if($active_menu == 'dashboard'){ echo 'nav-active'; } } ?>" name="dashboard">
            <a href="<?php echo base_url(); ?>/dashboard">
              <i class="fa fa-home" aria-hidden="true"></i>
              <span>Dashboard</span>
            </a>
          </li>
       
          <!--<li>
            <a href="mailbox-folder.html">
              <span class="pull-right label label-primary">182</span>
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>Mailbox</span>
            </a>
          </li> -->
          
          <li class="<?php if(isset($active_menu)){ if($active_menu == 'map_location'){ echo 'nav-active'; } } ?>" name="track_location">
            <a href="<?php echo base_url(); ?>/map_location">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>Track Location</span>
            </a>

          </li>
          
            
          <li name="user" class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'user'){ echo 'nav-expanded nav-active'; } } ?>">
            <a>
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>User </span>
            </a>
            <ul class="nav nav-children active">
              <?php if( $this->session->userdata('user_role') == 'master admin'){ ?>          
              <li name="restorent" class="<?php if(isset($active_submenu)){ if($active_submenu == 'create_admin'){ echo 'nav-active'; } } ?>" >
                <a href="<?php echo base_url(); ?>users/user_list">
                   Create Admin
                </a>
              </li>
              <?php } ?>
                
                <?php // if($this->session->userdata('outlet_type') == 'restorent' || $this->session->userdata('outlet_type') == 'branch' ){ ?>   
                  <li name="add_branch" class="<?php if(isset($active_submenu)){ if($active_submenu == 'delivery_boy'){ echo 'nav-active'; } } ?>">
                    <a href="<?php echo base_url(); ?>users/delivery_boy_list">
                       Add Delivery Boy
                    </a>
                  </li>
                
                <?php // } ?>
              
            </ul>
          </li>  
          
           <?php if($this->session->userdata('outlet_type') == 'restorent' || $this->session->userdata('user_role') == 'master admin'){ ?>   
          <li name="restorent" class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'restorent'){ echo 'nav-expanded nav-active'; } } ?>">
            <a>
              <i class="fa fa-cutlery" aria-hidden="true"></i>
              <span>Outlet</span>
            </a>
            <ul class="nav nav-children">
                 
              <?php if($this->session->userdata('user_role') == 'master admin'){ ?>       
              <li name="restorent" class="<?php if(isset($active_submenu)){ if($active_submenu == 'add_restorent'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>restorent/restorent_list">
                   Add Outlet
                </a>
              </li>
              <?php } ?>  
                
             <?php if($this->session->userdata('user_role') == 'master admin'){ ?>  
                
              <li name="add_branch" class="<?php if(isset($active_submenu)){ if($active_submenu == 'add_branch'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>branch/branch_list">
                   Add Branch
                </a>
              </li>
             <?php } ?>  
            </ul>
          </li>
          <?php } ?>    

          <li class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'orders'){ echo 'nav-expanded nav-active'; } } ?>" name="orders">
            <a>
              <i class="fa fa-database" aria-hidden="true"></i>
              <span>Orders</span>
            </a>
            <ul class="nav nav-children">
              <li name="pending_orders" class="<?php if(isset($active_submenu)){ if($active_submenu == 'pending_orders'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>orders/orders">
                   <!-- <span class="pull-right label label-primary">182</span> -->
                    Pending Orders  <span id="new_order_span" style="float:right;"></span>
                </a>
              </li>
              <li name="placed_orders" class="<?php if(isset($active_submenu)){ if($active_submenu == 'placed_orders'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>orders/placed_orders">
                   Placed Orders <span id="placed_order_span" style="float:right;"></span>
                </a>
              </li>
              <li name="dispatch_orders" class="<?php if(isset($active_submenu)){ if($active_submenu == 'dispatched_orders'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>orders/dispatched_orders">
                   
                   Dispatch Orders <span id="dispatched_order_span" style="float:right;"></span>
                </a>
              </li>
              <li name="delivered_orders" class="<?php if(isset($active_submenu)){ if($active_submenu == 'delivered_orders'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>orders/delivered_orders">
                   
                   Delivered Orders <span id="delivered_order_span" style="float:right;"></span>
                </a>
              </li>
              <li name="cancel_orders" class="<?php if(isset($active_submenu)){ if($active_submenu == 'canceled_orders'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>orders/canceled_orders">
                  
                   Cancel Orders <span id="cancel_order_span" style="float:right;"></span>
                </a>
              </li>    
 
            </ul>
          </li>
            
         
          <li class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'parameter'){ echo 'nav-expanded nav-active'; } } ?>" name="paremeter">
            <a>
              <i class="fa fa-tasks" aria-hidden="true"></i>
              <span>Parameter</span>
            </a>
            <ul class="nav nav-children">
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'manage_service_charge'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>parameter/manage_service_charge">
                   Service Charge
                </a>
              </li>
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'add_unit'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>parameter/add_unit">
                   Unit
                </a>
              </li>
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'promocode'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>promo_code/promocode">
                   Promo Code
                </a>
              </li>
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'points'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>points/point_settings">
                   Points
                </a>
              </li>
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'add_gst'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>parameter/add_gst">
                   GST
                </a>
              </li>
            </ul>
          </li>
            
        

          <li name="notification" class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'send_msg'){ echo 'nav-expanded nav-active'; } } ?>">
            <a>
              <!--<span class="pull-right label label-primary">182</span>-->
              <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
              <span>Send Message</span>
            </a>
              <ul class="nav nav-children">
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'send_notification'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>notification/notification">
                   Notification
                </a>
              </li>
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'send_promocode'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>promo_code/send_promo_code_section">
                   Send Promocode
                </a>
              </li>    
              </ul>
              
          </li>
         


          <li class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'category'){ echo 'nav-expanded nav-active'; } } ?>" namme="category">
            <a>
              <i class="fa fa-list-alt" aria-hidden="true"></i>
              <span>Category</span>
            </a>
            <ul class="nav nav-children">
            <?php if($this->session->userdata('outlet_type') == 'restorent' ){ ?>  
                <!--
              <li name="add_category" class="<?php if(isset($active_submenu)){ if($active_submenu == 'add_category'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>/category/add_category">
                   Add Category
                </a>
                </li>  
                <li name="add_subcategory" class="<?php if(isset($active_submenu)){ if($active_submenu == 'add_subcategory'){ echo 'nav-active'; } } ?>">    
                <a href="<?php echo base_url(); ?>/subcategory/add_subcategory">
                   Add Sub Category
                </a>
                </li> -->
            <?php } ?>
              <li name="list_category" class="<?php if(isset($active_submenu)){ if($active_submenu == 'list_category'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>/category/list_category">
                   List Category
                </a>
              </li>
                
               <li name="list_subcategory" class="<?php if(isset($active_submenu)){ if($active_submenu == 'list_subcategory'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>/subcategory/list_subcategory">
                   List Sub Category
                </a>
              </li>    

            </ul>
          </li>
            
           <?php if($this->session->userdata('outlet_type') == 'restorent' || $this->session->userdata('outlet_type') == 'branch'){ ?>    
          <li class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'management'){ echo 'nav-expanded nav-active'; } } ?>" name="management">
            <a>
              <i class="fa fa-th" aria-hidden="true"></i>
              <span>Management</span>
            </a>
            <ul class="nav nav-children">
              <li name="banner" class="<?php if(isset($active_submenu)){ if($active_submenu == 'banner'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>/app_banner/add">
                   Banner
                </a>
              </li>
              <li name="offer_banner" class="<?php if(isset($active_submenu)){ if($active_submenu == 'offer_banner'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>/offer_banner/add">
                   Offer Banner
                </a>
              </li>
                
                
                <li name="app_background" class="<?php if(isset($active_submenu)){ if($active_submenu == 'app_background'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>/app_background/add">
                  App Background
                </a>
              </li>
              <!--<li name="outlet">
                <a href="tables-responsive.html">
                   Outlet
                </a>
              </li>-->

            </ul>
          </li>
          <?php } ?>    
            
          <li class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'product'){ echo 'nav-expanded nav-active'; } } ?>" name="product">
            <a>
              <i class="fa fa-barcode" aria-hidden="true"></i>
              <span>Product</span>
            </a>
              
            <ul class="nav nav-children">
            <?php if($this->session->userdata('outlet_type') == 'restorent'){ ?>   
              <li name="add_product" class="<?php if(isset($active_submenu)){ if($active_submenu == 'add_product'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>/product/add_product/0/0">
                   Add Product
                </a>
              </li>
             <?php } ?>
              <li name="list_product" class="<?php if(isset($active_submenu)){ if($active_submenu == 'list_product'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>/product/list_product">
                  List Product
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'report'){ echo 'nav-expanded nav-active'; } } ?>" name="report" >
            <a>
              <i class="fa fa-columns" aria-hidden="true"></i>
              <span>Report</span>
            </a>
            <ul class="nav nav-children">
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'customer_report'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>report/customer_report">
                   Customer Report
                </a>
              </li>
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'transaction_report'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>report/transaction_report">
                   Transaction report
                </a>
              </li>
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'recharge_report'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>report/recharge_report">
                   Rechange Report
                </a>
              </li>
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'order_report'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>report/order_report">
                   Orders report
                </a>
              </li>
                <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'product_report'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>report/product_report">
                  Product Sell
                </a>
              </li>
                
                 <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'feedback'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>report/feedback">
                 Feedback
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>

      <hr class="separator" />


      <hr class="separator" />


    </div>

  </div>
  <!--<div class="sidebar-widget widget-stats" style="position: absolute; bottom:0px; padding-bottom:20px; ">
    <div class="widget-header">
      <h6 style="color:#0088cc;">All right reserved</h6>

    </div>

  </div>-->
</aside>
