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
											<h2><i class="fa fa-hospital-o"></i> DOKTER</h2>
										</div>

										<!-- FILTER PENYAKIT -->
										<div class="row">
											<form method="get" action="<?= base_url() ?>chat/start">
												<div class="col-xs-8 col-sm-10 col-md-10">
													<select name="dokter" id="dokter" class="form-control">
														<option>-- Pilih Dokter --</option>
														<?php foreach ($dokter as $d) : ?>
															<option <?= (isset($doc)) ? ($doc == $d['user_id']) ? 'selected' : '' : '' ?> value="<?= $d['user_id'] ?>"><?= $d['user_nama'] ?></option>
														<?php endforeach; ?>
													</select>
												</div>
												<div class="col-xs-4 col-sm-2 col-md-2">
													<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Submit</button>
												</div>
											</form>
										</div>
										<!-- / FILTER PENYAKIT -->

										<!-- BAGIAN GEJALA -->
										<?php if ($member == 0) : ?>
											<div class="row m-5">
												<br>
												<?php foreach ($program as $p) : ?>
													<div class="col-xs-12 col-sm-6 col-md-3">
														<div class="panel panel-success pricing-big">

															<div class="panel-heading">
																<h3 class="panel-title">
																	<?= $p['judul']; ?></h3>
															</div>
															<div class="panel-body no-padding text-align-center">
																<div class="the-price">
																	<h1>
																		<strong>Rp.<?= $p['harga']; ?></strong></h1>
																</div>
																<div class="price-features">
																	<ul class="list-unstyled text-left">
																		<li><i class="fa fa-check text-success"></i> <strong><?= $p['keterangan']; ?></strong></strong></li>
																		<li><i class="fa fa-check text-success"></i> <strong>Masa Berlaku : <?= $p['masa_berlaku']; ?> Hari</strong></strong></li>
																	</ul>
																</div>
															</div>
															<div class="panel-footer text-align-center">
																<a href="<?= base_url('langganan/') . $p['id_program']; ?>" class="btn btn-primary btn-block" role="button">Pilih</a>
															</div>
														</div>
													</div>
													</div>
												<?php endforeach; ?>
											</div>
										<?php else : ?>
										<?php endif; ?>
										<?php if (isset($doc)) :  ?>
											<br>
											<hr>
											<div class="text-center">
												<h2><i class="fa fa-comments-o"></i> CHAT</h2>
											</div>
											<form id="form">
												<div class="row" style="margin: 10px; overflow:auto; height: 400px">

													<table class="table table-responsive table-bordered" id="show-data">
														<?php foreach ($last_chat->result_array() as $r) : ?>
															<tr class="<?= ($this->session->userdata('data')['id'] == $r['user_id'] ? 'bg-success' : 'bg-primary') ?>">
																<td width="10%"><?= $r['user_nama'] ?> </td>
																<td class="pull-left"><?= $r['message'] ?></td>
															</tr>
														<?php endforeach; ?>
													</table>

												</div>
												<div class="row">
													<?php if ($member == 0) : ?>
														<h1 class="text-center">
															Harap Berlangganan terlebih dahulu untuk mengirim Pesan
														</h1>
													<?php else : ?>
														<div class="col-xs-12 col-sm-12 col-md-12">
															<textarea class="form-control" placeholder="Write Message .." id="message" rows="4"></textarea>
															<input type="hidden" name="doc" id="doc" value="<?= $doc ?>">
														</div>
														<div class="col-xs-12 col-sm-12 col-md-12">
															<br>
															<div class="pull-right">
																<button type="submit" class="btn btn-success btn-md"><i class="fa fa-paper-plane"></i> Submit</button>
															</div>
														</div>
													<?php endif; ?>
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