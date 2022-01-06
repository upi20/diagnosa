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

										<!-- BAGIAN GEJALA -->
										<?php if (isset($gejala)) :  ?>
											<br>
											<hr>
											<div class="row" style="margin: 10px">
												<form method="post" action="<?= base_url() ?>diagnosa/data/insert">
													<div class="text-center">
														<h2><i class="fa fa-bug"></i> GEJALA</h2>
													</div>
													<?php $no = 1;
													$no1 = 1;
													$no2 = 1;
													$no3 = 1;
													$no4 = 1;
													foreach ($gejala as $g) : ?>

														<div class="col-md-12">
															<div class="form-group">

																<!-- Buat ngitung -->
																<input type="hidden" name="hittung[]" value="<?= $g['id_gejala'] ?>">

																<input type="hidden" name="id-<?= $no1++ ?>" value="<?= $g['id_gejala'] ?>">
																<label for="nama"> <?= $no++ ?>. <?= $g['nama'] ?></label>
																<div class="radio">
																	<div class="row">
																		<div class="col-md-6">
																			<label><input type="radio" name="optradio-<?= $no3++ ?>" value="1">Ya</label>
																		</div>
																		<div class="col-md-6">
																			<label><input type="radio" name="optradio-<?= $no4++ ?>" value="0">Tidak</label>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													<?php endforeach; ?>
													<div class="pull-right">
														<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-paper-plane"></i> Submit</button>
													</div>
												</form>
											</div>
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