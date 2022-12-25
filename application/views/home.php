<!doctype html>
<html class="fixed">
	<head>
		<?php $this->load->view('common/header_link'); ?>
	</head>
	<body>
		<section class="body">
      <?php $this->load->view("common/titlebar"); ?>

			<div class="inner-wrapper">
			  <?php $this->load->view('common/sidemenu'); ?>

				<section role="main" class="content-body" style="">
              <section class="my_cards">
								     <p class="my_cards_title">Sales</p>
                      <ul class="my_cards_ul">
												 <li>
													 <div class="my_cards_box" style="background-color:#3f51b5;">
														 <div class="left_div">
																	<p class="title">Today</p>
																	<p><i class="fa fa-rupee"></i> <?php echo number_format($today_sell[0]->total,1); ?></p>
														 </div>
														 <div class="right_div">
																	<i class="ion-calendar"></i>
														 </div>
													 </div>
											  </li>
												<li>
													<div class="my_cards_box" style="background-color:#673ab7;">
														<div class="left_div">
																 <p class="title">Yesterday</p>
																 <p><i class="fa fa-rupee"></i> <?php echo number_format($yesterday_sell[0]->total,1); ?></p>
														</div>
														<div class="right_div">
																 <i class="ion-chatbubbles"></i>
														</div>
													</div>
											 </li>
											 <li>
												 <div class="my_cards_box" style="background-color:#9c27b0;">
													 <div class="left_div">
																<p class="title">This Month</p>
																<p><i class="fa fa-rupee"></i> <?php echo number_format($month_sell[0]->total,1); ?></p>
													 </div>
													 <div class="right_div">
																<i class="ion-clipboard"></i>
													 </div>
												 </div>
											</li>
											<li>
												<div class="my_cards_box" style="background-color:#e91e63;">
													<div class="left_div">
															 <p class="title">Last Month</p>
															 <p><i class="fa fa-rupee"></i> <?php echo number_format($lastmonth_sell[0]->total,1); ?></p>
													</div>
													<div class="right_div">
															 <i class="ion-clock"></i>
													</div>
												</div>
										 </li>
										 <li>
												<div class="my_cards_box" style="background-color:#e91e63;">
													<div class="left_div">
															 <p class="title">This Year</p>
															 <p><i class="fa fa-rupee"></i> <?php echo number_format($thisyear_sell[0]->total,1); ?></p>
													</div>
													<div class="right_div">
															 <i class="ion-contrast"></i>
													</div>
												</div>
										 </li>
                      </ul>
              </section>

			              <section class="my_cards">
											     <p class="my_cards_title">Recharge</p>
			                      <ul class="my_cards_ul">
															 <li>
																 <div class="my_cards_box" style="background-color:#3f51b5;">
																	 <div class="left_div">
																				<p class="title">Today</p>
																				<p><i class="fa fa-rupee"></i> <?php echo number_format($today_recharge[0]->total); ?></p>
																	 </div>
																	 <div class="right_div">
																				<i class="ion-calendar"></i>
																	 </div>
																 </div>
														  </li>
															<li>
																<div class="my_cards_box" style="background-color:#673ab7;">
																	<div class="left_div">
																			 <p class="title">Yesterday</p>
																			 <p><i class="fa fa-rupee"></i> <?php echo number_format($yesterday_recharge[0]->total); ?></p>
																	</div>
																	<div class="right_div">
																			 <i class="ion-chatbubbles"></i>
																	</div>
																</div>
														 </li>
														 <li>
															 <div class="my_cards_box" style="background-color:#9c27b0;">
																 <div class="left_div">
																			<p class="title">This Month</p>
																			<p><i class="fa fa-rupee"></i> <?php echo number_format($month_recharge[0]->total); ?></p>
																 </div>
																 <div class="right_div">
																			<i class="ion-clipboard"></i>
																 </div>
															 </div>
														</li>
														<li>
															<div class="my_cards_box" style="background-color:#e91e63;">
																<div class="left_div">
																		 <p class="title">Last Month</p>
																		 <p><i class="fa fa-rupee"></i> <?php echo number_format($lastmonth_recharge[0]->total); ?></p>
																</div>
																<div class="right_div">
																		 <i class="ion-clock"></i>
																</div>
															</div>
													 </li>
													 <li>
															<div class="my_cards_box" style="background-color:#e91e63;">
																<div class="left_div">
																		 <p class="title">This Year</p>
																		 <p><i class="fa fa-rupee"></i> <?php echo number_format($thisyear_recharge[0]->total); ?></p>
																</div>
																<div class="right_div">
																		 <i class="ion-contrast"></i>
																</div>
															</div>
													 </li>
			                      </ul>
			              </section>

						              <section class="my_cards">
														     <p class="my_cards_title">Orders</p>
						                      <ul class="my_cards_ul">
																		
															 <li>
																 <div class="my_cards_box" style="background-color:#3f51b5;">
																	 <div class="left_div">
																				<p class="title">Today</p>
																				<p> <?php echo number_format($today_orders[0]->total); ?></p>
																	 </div>
																	 <div class="right_div">
																				<i class="ion-calendar"></i>
																	 </div>
																 </div>
														  </li>
															<li>
																<div class="my_cards_box" style="background-color:#673ab7;">
																	<div class="left_div">
																			 <p class="title">Yesterday</p>
																			 <p> <?php echo number_format($yesterday_orders[0]->total); ?></p>
																	</div>
																	<div class="right_div">
																			 <i class="ion-chatbubbles"></i>
																	</div>
																</div>
														 </li>
														 <li>
															 <div class="my_cards_box" style="background-color:#9c27b0;">
																 <div class="left_div">
																			<p class="title">This Month</p>
																			<p> <?php echo number_format($month_orders[0]->total); ?></p>
																 </div>
																 <div class="right_div">
																			<i class="ion-clipboard"></i>
																 </div>
															 </div>
														</li>
														<li>
															<div class="my_cards_box" style="background-color:#e91e63;">
																<div class="left_div">
																		 <p class="title">Last Month</p>
																		 <p> <?php echo number_format($lastmonth_orders[0]->total); ?></p>
																</div>
																<div class="right_div">
																		 <i class="ion-clock"></i>
																</div>
															</div>
													 </li>
													 <li>
															<div class="my_cards_box" style="background-color:#e91e63;">
																<div class="left_div">
																		 <p class="title">This Year</p>
																		 <p> <?php echo number_format($thisyear_orders[0]->total); ?></p>
																</div>
																<div class="right_div">
																		 <i class="ion-contrast"></i>
																</div>
															</div>
													 </li>
						                      </ul>
						              </section>

													<section class="my_cards">
														     <p class="my_cards_title">Customer Ragistration</p>
						                      <ul class="my_cards_ul">
																		 <li>
																			 <div class="my_cards_box" style="background-color:#3f51b5;">
																				 <div class="left_div">
																							<p class="title">Today</p>
																							<p><?php echo number_format($today_registration[0]->total); ?></p>
																				 </div>
																				 <div class="right_div">
																							<i class="ion-calendar"></i>
																				 </div>
																			 </div>
																	  </li>
																		<li>
																			<div class="my_cards_box" style="background-color:#673ab7;">
																				<div class="left_div">
																						 <p class="title">Yesterday</p>
																						 <p><?php echo number_format($yesterday_registration[0]->total); ?></p>
																				</div>
																				<div class="right_div">
																						 <i class="ion-chatbubbles"></i>
																				</div>
																			</div>
																	 </li>
																	 <li>
																		 <div class="my_cards_box" style="background-color:#9c27b0;">
																			 <div class="left_div">
																						<p class="title">This Month</p>
																						<p> <?php echo number_format($month_registration[0]->total); ?></p>
																			 </div>
																			 <div class="right_div">
																						<i class="ion-clipboard"></i>
																			 </div>
																		 </div>
																	</li>
																	<li>
																		<div class="my_cards_box" style="background-color:#e91e63;">
																			<div class="left_div">
																					 <p class="title">Last Month</p>
																					 <p> <?php echo number_format($lastmonth_registration[0]->total); ?></p>
																			</div>
																			<div class="right_div">
																					 <i class="ion-clock"></i>
																			</div>
																		</div>
																 </li>
																 <li>
																		<div class="my_cards_box" style="background-color:#e91e63;">
																			<div class="left_div">
																					 <p class="title">This Year</p>
																					 <p><?php echo number_format($thisyear_registration[0]->total); ?></p>
																			</div>
																			<div class="right_div">
																					 <i class="ion-contrast"></i>
																			</div>
																		</div>
																 </li>
						                      </ul>
						              </section>

			</div>

		  <?php $this->load->view('common/sidebar_right'); ?>

		</section>
         <?php $this->load->view('common/footer_script'); ?>

	</body>
</html>
