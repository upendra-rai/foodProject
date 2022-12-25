<!doctype html>
<html class="no-js" lang="en">

<head>
   <?php $this->load->view('common/header_link'); ?>

     <!-- Preloader CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/preloader/preloader-style.css">

    <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/datepicker-active.js"></script>
   <style type="text/css">
      .box_head_bard{

           width:100%;
           height:30px;
           padding: 6px 15px;

           color:#5f5f5f;
           border: 1px solid #b5b5b5;
       }
       .box_head_bard h5{
           font-size: 14px;
           display: inline-block;
           font-weight: 500;
       }
       .box_head_bard span{
           display: inline-block;
           float: right;
           font-size: 20px;
           margin-top: -4px;
       }
       .box_head_bard span i{
           color:#5f5f5f;

       }

     .stackcard_ul{
           padding: 0;
           margin: 0;

       }
       .stackcard_ul li{
           padding: 0px 5px;
           width: 19.7%;
           display: inline-block;
       }

	  .vacation_a{
		margin: 0;
        color:red;
	  }

	  .analysis-progrebar .analysis-progrebar-content .vacation_a h5{
		  color:#ffffff;
		  transform: scale(1);
	  }

	  .analysis-progrebar .analysis-progrebar-content .vacation_a h5:hover{

		  font-weight:900;
		  transform: scale(1.1);
	  }

	  #map {
	  width: 100%;
        height: 85vh;
		box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.6);
        border:2px solid #03a9f4;
      }
   </style>
</head>

<body>

    <div class="preloader-single shadow-inner mg-b-30" id="my_loader" style="position:fixed; background: rgba(0,0,0,0.8); width:100%; height:100vh; z-index: 9999; display:none;">
        <div class="ts_preloading_box" style="">
            <div id="ts-preloader-absolute09" style="position:fixed; margin:auto;   border-radius:70px;">
                <div class="tsperloader9" id="tsperloader9_one"></div>
                <div class="tsperloader9" id="tsperloader9_two"></div>
                <div class="tsperloader9" id="tsperloader9_three"></div>
                <div class="tsperloader9" id="tsperloader9_four"></div>
            </div>
        </div>
    </div>

    <?php $this->load->view('common/sidemenu'); ?>
    <div class="all-content-wrapper">

        <?php $this->load->view('common/titlebar'); ?>

		<div class="container-fluid" style="margin-top:0px;">
                <div id="map" class="image-thumbnail" style="margin-top:20px;"></div>
				<div id="agent_location" style="display:none;"><?php if(isset($agent_location)){ echo json_encode($agent_location); } ?></div>
                
                <div id="customer_location" style="display:none;"><?php if(isset($customer_location)){ echo json_encode($customer_location); } ?></div>
		</div>

	</div>

   <?php $this->load->view('common/footer_script'); ?>


     <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/datepicker-active.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeATEzCO0x7VxVVHV23Rg_FLAUnaO6iMU"></script>
    <script type="text/javascript">


      $(document).ready(function(){

		   function track_agent(){

			 // 23.2380198

			 // 77.4902991
			   var myLatlng = new google.maps.LatLng(23.1815,79.9864);
	           var mapOptions = {
                    zoom: 13,
                    center: myLatlng
                }

                var map  = new google.maps.Map(document.getElementById("map"), mapOptions);

				// start agent loop
             // agent  marker
				var agent_data = $("#agent_location").html();
			    var agent_data = JSON.parse(agent_data);
				var marker = [];

			    for(var i = 0; i < agent_data.length; i++){

				   var agent_id = agent_data[i].agent_id;
				   var agent_lat = Number(agent_data[i].lat);
				   var agent_lng = Number(agent_data[i].lng);

				   var pin = new google.maps.LatLng(agent_lat,agent_lng);
				   marker[i] = new google.maps.Marker({
                      position: pin,
                      title: agent_id,
					  icon: "<?php echo base_url(); ?>catalogs/img/t2.png",
                   });
				   marker[i].setMap(map);

			    }
               
               // customer marker
                var customer_location_data = $("#customer_location").html();
			    var customer_data = JSON.parse(customer_location_data);
                var customer_marker = [];
              
                for(var i = 0; i < customer_data.length; i++){
			         var customer_lat  = customer_data[i].customer_lat;
		             var customer_lng = customer_data[i].customer_lng;
			         var customer_name = customer_data[i].first_name;
			   
			     var customer_latLong = new google.maps.LatLng(customer_lat, customer_lng);
			     customer_marker[i] = new google.maps.Marker({
                 position: customer_latLong,
			     title: customer_name,
			     icon: "<?php echo base_url(); ?>catalogs/img/h1.png",
				 
                });
			       customer_marker[i].setMap(map);
			
			
		         }
               

				function update_marker(result){

					           var agent_updated_data = JSON.parse(result);

								for(var i = 0; i < agent_updated_data.position.length; i++){
									var agent_id2 = agent_updated_data.position[i].agent_id;
									var update_agent_lat = Number(agent_updated_data.position[i].lat);
				                    var update_agent_lng = Number(agent_updated_data.position[i].lng);

				                	var latlng = new google.maps.LatLng(update_agent_lat,update_agent_lng);
		                            marker[i].setPosition(latlng);
								}
				}

				function update_position(){
				   $.ajax({
					        type: 'POST',
     		         		url: '<?php echo base_url(); ?>map_location/update_location',
	                        success: function(data){
								//alert(result);
								update_marker(data);
                            }});
				}

				window.setInterval(function(){
                   update_position();
                }, 2*6000);


				var directionService = new google.maps.DirectionsService;
				var directionDisplay = new google.maps.DirectionsRenderer;
				directionDisplay.setMap(map);
				function calculateAndDisplayRoute(directionService,directionDisplay){
					var my_origin = new google.maps.LatLng(23.2313,77.4326);
					var my_destination = new google.maps.LatLng(23.2356,77.4006);

					directionService.route({
						origin: my_origin,
						destination: my_destination,
						travelMode: "DRIVING"
					},function(responce,status){

						if(status === 'OK'){
							directionDisplay.setDirections(responce);
						}else{

							alert(status);
						}


					})


				}

				// calculateAndDisplayRoute(directionService,directionDisplay);
              
        }

	   track_agent();




      });

    </script>

    </body>
</html>
