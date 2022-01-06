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

                            <div class="pull-right">
                                <button class="btn btn-success btn-sm" id="tambah">
                                    <i class="fa fa-plus"></i> Tambah
                                </button>
                            </div>

                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Kode Penyakit</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Nama Penyakit</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-ambulance text-muted hidden-md hidden-sm hidden-xs"></i> Kode Gejala</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-ambulance text-muted hidden-md hidden-sm hidden-xs"></i> Nama Gejala</th>
                                        <th><i class="fa fa-fw fa-thumb-tack text-muted hidden-md hidden-sm hidden-xs"></i>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $q) : ?>
                                        <tr data-id="<?= $q['id']; ?>">
                                            <td><?= $q['kode_penyakit']; ?></td>
                                            <td><?= $q['nama_penyakit']; ?></td>
                                            <td><?= $q['kode_gejala']; ?></td>
                                            <td><?= $q['nama_gejala']; ?></td>
                                            <td>
                                                <a data class=" btn btn-primary btn-sm btn-ubah" data-id="<?= $q['id']; ?>">
                                                    <i class="fa fa-edit"></i> Ubah
                                                </a>
                                                <button class="btn btn-danger btn-sm" onclick="Hapus(<?= $q['id'] ?>)">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </button>
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
                                <label for="penyakit"> Penyakit</label>
                                <select class="form-control" id="id_penyakit" name="id_penyakit" required="">
                                    <option value="">--Penyakit--</option>
                                    <?php foreach ($penyakit as $p) : ?>
                                        <option value="<?= $p['id_penyakit']; ?>"><?= $p['kode_penyakit']; ?> | <?= $p['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="gejala"> Gejala</label>
                                <select class="form-control" id="id_gejala" name="id_gejala" required="">
                                    <option value="" selected>--Gejala--</option>
                                    <?php foreach ($gejala as $g) : ?>
                                        <option value="<?= $g['id_gejala']; ?>"><?= $g['kode_gejala']; ?> | <?= $g['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
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