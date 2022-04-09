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

								<?php if ($hasil != null) : ?>
									<?php foreach ($hasil as $r) : ?>
										<div class="col-xs-12 col-sm-12 col-md-12">
											<div class="panel panel-success pricing-big">
												<h2 class="text-uppercase"><i class="fa fa-ambulance"></i> PENYAKIT <?= $r['nama'] ?> </h2>

												<!-- CEK HASIL -->
												<h3>HASIL : <?= ($r['status'] > 0) ? '<button class="btn btn-success">POSITIF </button></h3>' : '<button class="btn btn-danger">NEGATIVE </button></h3>' ?></h3>

												<?php if ($r['status'] > 0) : ?>
													<h3>Derajat Kepercayaan : <?= $r['derajat_kepercayaan'] ?> %</h3>
												<?php endif; ?>

												<!-- CEK SARAN -->
												<?php if ($r['status'] > 0) : ?>
													<h3><?= $r['data']['judul'] ?></h3>
													<p><?= $r['data']['keterangan'] ?></p>
												<?php else : ?>
													<h3>Sepertinya anda terhindar dari penyakit ini</h3>
												<?php endif; ?>
												<!-- CEK SARAN -->
											</div>
										</div>
									<?php endforeach ?>
								<?php else : ?>
									<div class="col-md-12">
										<h3 class="ml-5">ANDA SEHAT</h3>
									</div>
								<?php endif; ?>

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
<!-- END MAIN CONTENT
