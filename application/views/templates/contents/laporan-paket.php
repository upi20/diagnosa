<!-- MAIN CONTENT -->
<div id="content">

    <!-- row -->
    <div class="row">

        <!-- col -->
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">
                <!-- PAGE HEADER -->
                <i class="fa-fw fa fa-table"></i>

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
                <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                            <input class="form-control" type="text">
                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body">
                            <div class="pull-left mb-2">
                                <form class="form-inline" method="GET">
                                    <input type="date" name="start_date" class="form-control date mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Date Start">

                                    <label class="" for="inlineFormInputGroupUsername2">Sampai</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="date" name="end_date" class="form-control date" id="inlineFormInputGroupUsername2" placeholder="Date End">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Filter</button>
                                </form>
                                <br>
                                <form class="form-inline" method="GET">
                                    <select name="filter" class="form-control">
                                        <option value="">====Semua====</option>
                                        <option value="valid">valid</option>
                                        <option value="invalid">invalid</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mb-2">Filter</button>
                                </form>
                            </div>
                            <div class="pull-right">
                                <?php if ($this->input->get('start_date') != '' && $this->input->get('end_date') != '') : ?>
                                    <a target="_blank" style="float: right;" href="<?= base_url('laporan/paket/cetak?start_date=' . $this->input->get('start_date') . '&end_date=' . $this->input->get('end_date')) ?>" class="btn btn-danger">
                                        <i class="fa fa-file fa-fw"></i><b> CETAK PDF</b>
                                    </a>
                                <?php elseif ($this->input->get('filter') != '') : ?>
                                    <a target="_blank" style="float: right;" href="<?= base_url('laporan/paket/cetak?filter=') . $this->input->get('filter') ?>" class="btn btn-danger">
                                        <i class="fa fa-file fa-fw"></i><b> CETAK PDF</b>
                                    </a>
                                <?php else : ?>
                                    <a target="_blank" style="float: right;" href="<?= base_url('laporan/paket/cetak') ?>" class="btn btn-danger">
                                        <i class="fa fa-file fa-fw"></i><b> CETAK PDF</b>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Nama Pasien</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-ambulance text-muted hidden-md hidden-sm hidden-xs"></i> Email Pasien</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Nama Paket</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Status</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Masa Berlaku</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Tanggal Membeli</th>
                                        <th data-hide="phone"><i class="fa fa-fw fa-check text-muted hidden-md hidden-sm hidden-xs"></i> Bukti Pembayaran</th>
                                        <th data-hide="phone"><i class="fa fa-fw fa-check text-muted hidden-md hidden-sm hidden-xs"></i> Tujuan Pembayaran</th>
                                        <th data-hide="phone"><i class="fa fa-fw fa-check text-muted hidden-md hidden-sm hidden-xs"></i> Tanggal Diterima</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($records as $q) : ?>
                                        <tr>
                                            <td><?= $q['user_nama'] ?></td>
                                            <td><?= $q['user_email'] ?></td>
                                            <td><?= $q['judul'] ?></td>
                                            <td><?= $q['status'] == '' ? 'Belum Dikonfirmasi' : $q['status'] ?></td>
                                            <td><?= $q['masa_berlaku'] ?> Hari</td>
                                            <td><?= $q['tanggal'] ?></td>
                                            <td><img style="width:50px;height:50px;" src="<?= base_url('uploads/pembayaran/') . $q['gambar']; ?>" alt=""></td>
                                            <td><?= $q['tujuan_pembayaran']; ?></td>
                                            <td><?= $q['tanggal_diterima'] == '' ? 'Belum Dikonfirmasi' : $q['tanggal_diterima'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

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
<!-- END MAIN CONTENT -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="judul"> Judul</label>
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="judul">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan"> Keterangan</label>
                                <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="keterangan"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga"> Harga</label>
                                <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="masa_berlaku"> Masa Berlaku</label>
                                <input type="number" class="form-control" name="masa_berlaku" id="masa_berlaku" placeholder="masa_berlaku" required />
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->