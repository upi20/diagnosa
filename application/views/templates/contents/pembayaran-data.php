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

                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th data-class="expand"><i class="fa fa-fw fa-ambulance text-muted hidden-md hidden-sm hidden-xs"></i> Tanggal</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> User ID</th>
                                        <th data-hide="phone"><i class="fa fa-fw fa-check text-muted hidden-md hidden-sm hidden-xs"></i> ID Program</th>
                                        <th data-hide="phone"><i class="fa fa-fw fa-check text-muted hidden-md hidden-sm hidden-xs"></i> Nama</th>
                                        <th data-hide="phone"><i class="fa fa-fw fa-check text-muted hidden-md hidden-sm hidden-xs"></i> Gambar</th>
                                        <th data-hide="phone"><i class="fa fa-fw fa-check text-muted hidden-md hidden-sm hidden-xs"></i> Tujuan Pembayaran</th>
                                        <th data-hide="phone"><i class="fa fa-fw fa-check text-muted hidden-md hidden-sm hidden-xs"></i> Status</th>
                                        <th data-hide="phone"><i class="fa fa-fw fa-check text-muted hidden-md hidden-sm hidden-xs"></i> Tanggal Diterima</th>
                                        <th><i class="fa fa-fw fa-thumb-tack text-muted hidden-md hidden-sm hidden-xs"></i>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($records as $q) : ?>
                                        <tr data-id="<?= $q['id_pembayaran']; ?>" class="detail">
                                            <td><?= $q['tanggal']; ?></td>
                                            <td><?= $q['user_id']; ?></td>
                                            <td><?= $q['id_program']; ?></td>
                                            <td><?= $q['nama']; ?></td>
                                            <td><img style="width:50px;height:50px;" src="<?= base_url('uploads/pembayaran/') . $q['gambar']; ?>" alt=""></td>
                                            <td><?= $q['tujuan_pembayaran']; ?></td>
                                            <td><?= $q['status'] == '' ? 'Belum Dikonfirmasi' : $q['status'] ?></td>
                                            <td><?= $q['tanggal_diterima'] == '' ? 'Belum Dikonfirmasi' : $q['tanggal_diterima'] ?></td>
                                            <td>
                                                <?php if ($q['status'] == '') : ?>
                                                    <div class="text-center">
                                                        <a class="btn btn-primary" href="<?= base_url('pembayaran/data/acc/') . $q['id_pembayaran'] ?>">accept</a>
                                                        <a class="btn btn-danger" href="<?= base_url('pembayaran/data/reject/') . $q['id_pembayaran'] ?>">reject</a>
                                                        <button data-id="<?= $q['id_pembayaran']; ?>" class="btn btn-success detail2">Detail</button>
                                                    </div>
                                                <?php else : ?>
                                                    <div class="text-center">
                                                        <button data-id="<?= $q['id_pembayaran']; ?>" class="btn btn-success detail2">Detail</button>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
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
    <div class="modal-dialog modal-lg">
        <form id="form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Data Detail Pembayaran[ <b><span class="nama-pasien"></span></b> ]</h4>
                    <p class="text-muted email-pasien"></p>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 text-center">
                                <p>Bukti Pembayaran</p>
                                <img src="" width="100%" alt="Pasien ini belum mengirim bukti pembayaran" class="bukti-pembayaran">
                            </div>
                            <div class="col-lg-8">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Paket Dipilih : <span class="paket-dipilih"></span></li>
                                    <li class="list-group-item">Status : <span class="status"></span></li>
                                    <li class="list-group-item">Masa Berlaku : <span class="masa-berlaku"></span> Hari</li>
                                    <li class="list-group-item">Tanggal Pembayaran : <span class="tanggal-diterima"></span></li>
                                    <li class="list-group-item">Tanggal Diterima: <span class="tanggal-diterima"></span></li>
                                    <li class="list-group-item">Tujuan Pembayaran: <span class="tujuan-pembayaran"></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->