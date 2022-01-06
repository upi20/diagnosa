<!-- MAIN CONTENT -->
<div id="content">

	<!-- row -->
	<div class="row">
		
		<!-- col -->
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
				<!-- PAGE HEADER -->
				<i class="fa-fw fa fa-medkit"></i> 
				
				<?= $title ?>
			</h1>
		</div>
		<!-- end col -->
		
	</div>
	<!-- end row -->
	
	<!--
		The ID "widget-grid" will start to initialize all widgets below 
		You do not need to use widgets if you dont want to. Simply remove 
		the <section></section> and you can use wells or panels instead 
		-->
	
	<!-- widget grid -->
	<section id="widget-grid" class="">
	
		<!-- row -->
		<div class="row">
			
			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="row">
					
					<div class="col-sm-12">
						
						<div class="well well-light container">

							<div class="row">
								
						        <div class="col-xs-12 col-sm-12 col-md-12">
						            <div class="panel panel-success pricing-big">
						            	
						            	<div class="text-center">
							            	<h2><i class="fa fa-hospital-o"></i> PASIEN</h2>
						            	</div>
						            	
						                <!-- FILTER PENYAKIT -->
						            	<div class="row">
						            		<form method="get" action="<?= base_url() ?>chat/start_dokter">
							            		<div class="col-xs-8 col-sm-10 col-md-10">
								                    <select name="pasien" id="pasien" class="form-control">
								                    	<option>-- Pilih Pasien --</option>
								                    	<?php foreach($pasien as $p) : ?>
								                    		<option <?= (isset($pas)) ? ($pas == $p['user_id']) ? 'selected' : '' : '' ?>  value="<?= $p['user_id'] ?>"><?= $p['user_nama'] ?></option>
								                    	<?php endforeach; ?>
								                    </select>
								                </div>
								                <div class="col-xs-4 col-sm-2 col-md-2">
								                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Submit</button>
								                </div>
							                </form>
						                </div>
						                <!-- / FILTER PENYAKIT -->

						                <?php if(isset($list_pasien)) : ?>
					                		<br>
							                <hr>
					                		<div class="text-center">
								            	<h2><i class="fa fa-users"></i> LIST CHAT PASIEN</h2>
							            	</div>
					                		<div class="row">
							                	<?php foreach($list_pasien as $l) : ?>
						                			<div class="col-xs-4 col-sm-3 col-md-3 text-center">
						                				<h2><i class="fa fa-user fa-lg"></i></h2>
							                			<a href="<?= base_url() ?>chat/start_dokter?pasien=<?= $l['user_id'] ?>"><?= $l['user_nama'] ?></a>
						                			</div>
							                	<?php endforeach; ?>
					                		</div>
						                <?php endif; ?>

						                <!-- BAGIAN GEJALA -->
						                <?php if(isset($pas)) :  ?>
							                <br>
							                <hr>
						                	<div class="text-center">
								            	<h2><i class="fa fa-comments-o"></i> CHAT</h2>
							            	</div>
						                	<form id="form">
								                <div class="row" style="margin: 10px; overflow:auto; height: 400px">
								                	
							                		<table class="table table-responsive table-bordered" id="show-data">
									                	<?php foreach($last_chat->result_array() as $r) : ?>
									                		<tr class="<?= ($this->session->userdata('data')['id'] == $r['user_id'] ? 'bg-success' : 'bg-primary') ?>">
									                			<td width="10%"><?= $r['user_nama'] ?> </td>
									                			<td class="pull-left"><?= $r['message'] ?></td>
									                		</tr>
														<?php endforeach; ?>
								                	</table>

								                </div>
												<div class="row">
													<div class="col-xs-12 col-sm-12 col-md-12">
														<textarea class="form-control" placeholder="Write Message .." id="message" rows="4"></textarea>
														<input type="hidden" name="pas" id="pas" value="<?= $pas ?>">
													</div>
													<div class="col-xs-12 col-sm-12 col-md-12">
														<br>
														<div class="pull-right">
															<button type="submit" class="btn btn-success btn-md"><i class="fa fa-paper-plane"></i> Submit</button>
														</div>
													</div>
												</div>
											</form>
							            <?php endif; ?>
						                <!-- / BAGIAN GEJALA -->							            

						            </div>
						        </div>	    	
				    		</div>
				
							<hr>			
							
						</div>
						
					</div>
					
				</div>
				<!-- end widget -->
	
			</article>
			<!-- WIDGET END -->
			
		</div>
	
		<!-- end row -->
	
		<!-- row -->
	
		<div class="row">
	
			<!-- a blank row to get started -->
			<div class="col-sm-12">
				<!-- your contents here -->
			</div>
				
		</div>
	
		<!-- end row -->
	
	</section>
	<!-- end widget grid -->

	</div>
</div>
<!-- END MAIN CONTENT -->

<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
<script type="text/javascript">
	let user_id = <?php echo $this->session->userdata('data')['id'] ?>
</script>