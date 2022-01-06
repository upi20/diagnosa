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
                                            <h2><i class="fa fa-ambulance"></i> Pembayaran Paket</h2>
                                        </div>
                                        <div class="row">
                                            <h2>Anda Memlilih paket : <?= $data['judul'] ?></h2>
                                        </div>
                                        <!-- FILTER PENYAKIT -->
                                        <form action="<?= base_url('langganan/pembayaran/') . $data['id_program'] ?>" enctype="multipart/form-data" method="POST">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nama">Nama</label>
                                                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tujuan">Tujuan Pembayaran</label>
                                                        <select name="tujuan_pembayaran" class="form-control">
                                                            <option value="">====Tujuan Pembayaran====</option>
                                                            <option value="BNI-002312313131(Puter)">BNI-783564846646</option>
															<option value="BNI-002312313131(Puter)">BRI-89353964694</option>
															<option value="BNI-002312313131(Puter)">BCA-89452312313131</option>
															<option value="BNI-002312313131(Puter)">MANDIRI-854975934804</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tanggal">Tanggal</label>
                                                        <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Example input placeholder">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="gambar">Gambar</label>
                                                        <input type="file" name="gambar" class="form-control" id="gambar">
                                                    </div>
                                                </div>
                                            </div>
                                            <center>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </center>
                                        </form>
                                        <!-- / FILTER PENYAKIT -->

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