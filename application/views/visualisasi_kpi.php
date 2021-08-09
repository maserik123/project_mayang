<!-- Styles -->
<style>
    #absensi {
        width: 100%;
        height: 300px;
    }

    #prestasi_akademik {
        width: 100%;
        height: 300px;
    }

    #prestasi_non_akademik {
        width: 100%;
        height: 300px;
    }

    #karakter_kepemimpinan {
        width: 100%;
        height: 300px;
    }

    #karakter_tanggungJawab {
        width: 100%;
        height: 300px;
    }

    #karakter_disiplin {
        width: 100%;
        height: 300px;
    }

    #karakter_kejujuran {
        width: 100%;
        height: 300px;
    }

    #karakter_sopanSantun {
        width: 100%;
        height: 300px;
    }
</style>
<!-- Bootstrap Select Css -->
<link href="<?php echo base_url('assets') ?>/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

<!-- Absensi -->
<script>
    var chart = AmCharts.makeChart("absensi", {
        "type": "serial",
        "theme": "none",
        "marginTop": 20,
        "marginRight": 10,
        "dataProvider": [
            <?php foreach ($getKPIAbsensi as $r) { ?> {
                    "year": "<?php echo $r->tahun; ?>",
                    "value": <?php echo ($r->nilai_target); ?>,
                    "value1": <?php echo ($r->total); ?>
                },
            <?php } ?>
        ],
        "valueAxes": [{
            "axisAlpha": 0,
            "position": "left"
        }],
        "graphs": [{
                "id": "g1",
                "balloonText": "Nilai Target<br><b><span style='font-size:14px;'>[[value]]</span></b>",
                "bullet": "round",
                "bulletSize": 8,
                "lineColor": "#00CED1",
                "lineThickness": 2,
                "negativeLineColor": "#637bb6",
                "type": "smoothedLine",
                "valueField": "value"
            },
            {
                "id": "g2",
                "balloonText": "Nilai Pencapaian<br><b><span style='font-size:14px;'>[[value1]]</span></b>",
                "bullet": "round",
                "bulletSize": 8,
                "lineColor": "#FF8C00",
                "lineThickness": 2,
                "negativeLineColor": "#637bb6",
                "type": "smoothedLine",
                "valueField": "value1"
            }
        ],

        "dataDateFormat": "YYYY",
        "categoryField": "year",
        "categoryAxis": {
            "minPeriod": "YYYY",
            "parseDates": true,
            "minorGridAlpha": 0.1,
            "minorGridEnabled": true
        },

    });
</script>
<!-- End Absensi -->

<!-- Prestasi -->
<script>
    var chart = AmCharts.makeChart("prestasi_akademik", {
        "type": "serial",
        "theme": "none",
        "marginTop": 20,
        "marginRight": 10,
        "dataProvider": [
            <?php foreach ($getKPIPrestasiAkademik as $r) { ?> {
                    "year": "<?php echo $r->tahun; ?>",
                    "value": <?php echo $r->nilai_target; ?>,
                    "value1": <?php echo $r->total; ?>
                },
            <?php } ?>
        ],
        "valueAxes": [{
            "axisAlpha": 0,
            "position": "left"
        }],
        "graphs": [{
                "id": "g1",
                "balloonText": "Nilai Target<br><b><span style='font-size:14px;'>[[value]]</span></b>",
                "bullet": "round",
                "bulletSize": 8,
                "lineColor": "#00CED1",
                "lineThickness": 2,
                "negativeLineColor": "#637bb6",
                "type": "smoothedLine",
                "valueField": "value"
            },
            {
                "id": "g2",
                "balloonText": "Pencapaian<br><b><span style='font-size:14px;'>[[value]]</span></b>",
                "bullet": "round",
                "bulletSize": 8,
                "lineColor": "#FF8C00",
                "lineThickness": 2,
                "negativeLineColor": "#637bb6",
                "type": "smoothedLine",
                "valueField": "value1"
            }
        ],
        "dataDateFormat": "YYYY",
        "categoryField": "year",
        "categoryAxis": {
            "minPeriod": "YYYY",
            "parseDates": true,
            "minorGridAlpha": 0.1,
            "minorGridEnabled": true
        },

    });
</script>

<script>
    var chart = AmCharts.makeChart("prestasi_non_akademik", {
        "type": "serial",
        "theme": "none",
        "marginTop": 20,
        "marginRight": 10,
        "dataProvider": [
            <?php foreach ($getKPIPrestasiNonAkademik as $r) { ?> {
                    "year": "<?php echo $r->tahun; ?>",
                    "value": <?php echo $r->nilai_target; ?>,
                    "value1": <?php echo $r->total; ?>
                },
            <?php } ?>
        ],
        "valueAxes": [{
            "axisAlpha": 0,
            "position": "left"
        }],
        "graphs": [{
                "id": "g1",
                "balloonText": "Nilai Target<br><b><span style='font-size:14px;'>[[value]]</span></b>",
                "bullet": "round",
                "bulletSize": 8,
                "lineColor": "#00CED1",
                "lineThickness": 2,
                "negativeLineColor": "#637bb6",
                "type": "smoothedLine",
                "valueField": "value"
            },
            {
                "id": "g2",
                "balloonText": "Pencapaian<br><b><span style='font-size:14px;'>[[value]]</span></b>",
                "bullet": "round",
                "bulletSize": 8,
                "lineColor": "#FF8C00",
                "lineThickness": 2,
                "negativeLineColor": "#637bb6",
                "type": "smoothedLine",
                "valueField": "value1"
            }
        ],
        "dataDateFormat": "YYYY",
        "categoryField": "year",
        "categoryAxis": {
            "minPeriod": "YYYY",
            "parseDates": true,
            "minorGridAlpha": 0.1,
            "minorGridEnabled": true
        },

    });
</script>
<!-- End Prestasi -->

<!-- Tanggung Jawab -->
<script>
    var chart = AmCharts.makeChart("karakter_tanggungJawab", {
        "type": "serial",
        "theme": "none",
        "marginTop": 20,
        "marginRight": 10,
        "dataProvider": [
            <?php foreach ($getKPIAbsensi as $r) { ?> {
                    "year": "<?php echo $r->tahun; ?>",
                    "value": <?php echo ($r->nilai_target); ?>,
                    "value1": <?php echo ($r->total); ?>
                },
            <?php } ?>
        ],
        "valueAxes": [{
            "axisAlpha": 0,
            "position": "left"
        }],
        "graphs": [{
                "id": "g1",
                "balloonText": "Nilai Target<br><b><span style='font-size:14px;'>[[value]]</span></b>",
                "bullet": "round",
                "bulletSize": 8,
                "lineColor": "#00CED1",
                "lineThickness": 2,
                "negativeLineColor": "#637bb6",
                "type": "smoothedLine",
                "valueField": "value"
            },
            {
                "id": "g2",
                "balloonText": "Nilai Capaian<br><b><span style='font-size:14px;'>[[value]]</span></b>",
                "bullet": "round",
                "bulletSize": 8,
                "lineColor": "#FF8C00",
                "lineThickness": 2,
                "negativeLineColor": "#637bb6",
                "type": "smoothedLine",
                "valueField": "value1"
            }
        ],
        "legend": {
            "horizontalGap": 10,
            "maxColumns": 4,
            "position": "bottom",
            "useGraphSettings": true,
            "markerSize": 10
        },
        "dataDateFormat": "YYYY",
        "categoryField": "year",


    });
</script>
<!-- End Tanggung Jawab-->



<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Statistics & Visualization</h2>
        </div>
        <!-- Siswa Laki-laki -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="active"><a href="#visualisasi" class="btn bg-green" data-toggle="tab">Visualisasi KPI</a></li>
                            <li role="presentation"><a href="#manajemen" class="btn bg-green" data-toggle="tab">Manajemen Nilai KPI</a></li>
                        </ul>
                    </div>
                    <div class="body">

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="visualisasi">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="header">
                                            <h5> <i class="material-icons">bar_chart</i> Target Pencapaian (Key Performance Indicators). </h5>
                                            <small>Data yang direpresentasikan sebagai perbandingan target dan pencapaian.</small>
                                        </div>
                                    </div>
                                    <!-- Statistik per Tahun -->

                                    <!-- KPI Absensi -->
                                    <div class="col-md-12">
                                        <div class="header">
                                            <h5> Target Pencapaian Absensi </h5>
                                            <small>Data target pencapaian ditampilkan seluruh tahun</small>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="absensi"></div>
                                        </div>
                                    </div>
                                    <!-- end KPI Absensi -->
                                    <!-- KPI Prestasi -->
                                    <div class="col-md-12">
                                        <div class="header">
                                            <h5> <i class="material-icons">bar_chart</i> Target Pencapaian (Key Performance Indicators) Data Prestasi Akademik dan Non Akademik. </h5>
                                            <small>Data yang direpresentasikan sebagai perbandingan target dan pencapaian.</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="akademik">
                                        <div class="header">
                                            <h5> Target Pencapaian Prestasi Akademik </h5>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="prestasi_akademik"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6" id="nonAkademik">
                                        <div class="header">
                                            <h5> Target Pencapaian Prestasi Non Akademik </h5>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="prestasi_non_akademik"></div>
                                        </div>
                                    </div>

                                    <!-- end KPI Prestasi-->
                                    <!-- <div class="col-md-12">
                                        <div class="header">
                                            <h5> <i class="material-icons">bar_chart</i> Target Pencapaian (Key Performance Indicators) Penilaian Karakter Siswa. </h5>
                                            <small>Data yang direpresentasikan sebagai perbandingan target dan pencapaian.</small>
                                        </div>
                                    </div> -->
                                    <!-- Karakter tanggung jawab -->
                                    <!-- <div class="col-md-6">
                                        <div class="header">
                                            <h5> Karakter Tanggung Jawab </h5>
                                            <small>Target Capaian Karakter Tanggung Jawab</small>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="karakter_tanggungJawab"></div>
                                        </div>
                                    </div> -->
                                    <!-- end karakter tanggung jawab-->
                                    <!-- Karakter kepemimpinan -->
                                    <!-- <div class="col-md-6">
                                        <div class="header">
                                            <h5> Karakter Kepemimpinan</h5>
                                            <small>Target Capaian Karakter Kepemimpinan</small>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="karakter_kepemimpinan"></div>
                                        </div>
                                    </div> -->
                                    <!-- end karakter kepemimpinan-->

                                    <!-- Karakter disiplin -->
                                    <!-- <div class="col-md-6">
                                        <div class="header">
                                            <h5> Karakter Disiplin</h5>
                                            <small>Target Capaian Karakter Kedisiplinan</small>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="karakter_disiplin"></div>
                                        </div>
                                    </div> -->
                                    <!-- end karakter disiplin-->

                                    <!-- Karakter kejujuran -->
                                    <!-- <div class="col-md-6">
                                        <div class="header">
                                            <h5> Karakter Kejujuran</h5>
                                            <small>Target Capaian Karakter Kejujuran</small>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="karakter_kejujuran"></div>
                                        </div>
                                    </div> -->
                                    <!-- end karakter kejujuran-->

                                    <!-- Karakter kesopanan -->
                                    <!-- <div class="col-md-12">
                                        <div class="header">
                                            <h5> Karakter Kesopanan</h5>
                                            <small>Target Capaian Karakter Kesopanan</small>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="karakter_sopanSantun"></div>
                                        </div>
                                    </div> -->
                                    <!-- end karakter kesopanan -->
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="manajemen">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="header">
                                            <h5> Perbandingan Absensi(Alpa) dengan Prestasi Keseluruhan </h5>
                                        </div>
                                        <div class="thumbnail">
                                            <div class="row clearfix">
                                                <div class="col-md-12">

                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <div class="card">
                                                        <div class="header">
                                                            <h2>
                                                                KPI Absensi
                                                            </h2>
                                                            <ul class="header-dropdown m-r--5">
                                                                <li class="dropdown">
                                                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal1">Tambah</button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="body">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>Nilai Target</th>
                                                                            <th>Tahun</th>
                                                                            <th>Tools</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $no = 0;
                                                                        foreach ($getNilaiKPIAbsensi as $row) { ?>
                                                                            <tr>
                                                                                <td><?php echo ++$no; ?></td>
                                                                                <td><?php echo $row->nilai_target; ?></td>
                                                                                <td><?php echo $row->tahun; ?></td>
                                                                                <td><a href="<?php echo base_url('Visualisasi/performanceIndicators/deleteKPIAbsensi/') . $row->kpi_absensi_id; ?>" onclick="alert('Apakah anda yakin akan menghapus ?')" class="btn btn-danger btn-sm" style="font-size: 10px;">Hapus</a></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div id="modal1" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-md">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">
                                                                    Form KPI Absensi
                                                                </h4>
                                                            </div>
                                                            <?php echo form_open('Visualisasi/performanceIndicators/addKPIAbsensi', array('id' => 'form_inputan', 'method' => 'post')); ?>
                                                            <div class="modal-body">
                                                                <?php echo form_input(array('id' => 'kpi_absensi_id', 'name' => 'kpi_absensi_id', 'type' => 'hidden')); ?>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="field item form-group">
                                                                            <label class="col-form-label col-md-3">Nilai Target<span class="required">*</span></label>
                                                                            <div class=" col-md-9">
                                                                                <input type="text" class="form-control " id="nilai_target1" placeholder="Nilai Target" name="nilai_target1" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="field item form-group">
                                                                            <label class="col-form-label col-md-3">Tahun<span class="required">*</span></label>
                                                                            <div class="col-md-9">
                                                                                <select name="tahun1" id="tahun1" class="form-control show-tick" required>
                                                                                    <option value="">--Pilih Tahun--</option>
                                                                                    <?php for ($i = (date('Y') - 10); $i <= date('Y'); $i++) { ?>
                                                                                        <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                                <button type="submit" onclick="alert('Apakah anda sudah yakin ?')" class="btn btn-success btn-sm">Simpan</button>

                                                            </div>
                                                            <?php echo form_close() ?>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <div class="card">
                                                        <div class="header">
                                                            <h2>
                                                                KPI Prestasi
                                                            </h2>
                                                            <ul class="header-dropdown m-r--5">
                                                                <li class="dropdown">
                                                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal2">Tambah</button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="body">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>Nilai Target</th>
                                                                            <th>Tahun</th>
                                                                            <th>Jenis Kategori</th>
                                                                            <th>Tools</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $no = 0;
                                                                        foreach ($getNilaiKpiPrestasi as $row) { ?>
                                                                            <tr>
                                                                                <td><?php echo ++$no; ?></td>
                                                                                <td><?php echo $row->nilai_target; ?></td>
                                                                                <td><?php echo $row->tahun; ?></td>
                                                                                <td><?php echo $row->jenis; ?></td>
                                                                                <td><a href="<?php echo base_url('Visualisasi/performanceIndicators/deleteKPIPrestasi/') . $row->kpi_prestasi_id; ?>" onclick="alert('Apakah anda yakin akan menghapus ?')" class="btn btn-danger btn-sm" style="font-size: 10px;">Hapus</a></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="modal2" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-md">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">
                                                                    Form KPI Prestasi
                                                                </h4>
                                                            </div>
                                                            <?php echo form_open('Visualisasi/performanceIndicators/addKPIPrestasi', array('id' => 'form_inputan', 'method' => 'post')); ?>
                                                            <div class="modal-body">
                                                                <?php echo form_input(array('id' => 'kpi_prestasi_id', 'name' => 'kpi_prestasi_id', 'type' => 'hidden')); ?>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="field item form-group">
                                                                            <label class="col-form-label col-md-3">Nilai Target<span class="required">*</span></label>
                                                                            <div class=" col-md-9">
                                                                                <input type="text" class="form-control " id="nilai_target2" placeholder="Nilai Target" name="nilai_target2" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="field item form-group">
                                                                            <label class="col-form-label col-md-3">Tahun<span class="required">*</span></label>
                                                                            <div class="col-md-9">
                                                                                <select name="tahun2" id="tahun2" class="form-control show-tick" required>
                                                                                    <option value="">--Pilih Tahun--</option>
                                                                                    <?php for ($i = (date('Y') - 10); $i <= date('Y'); $i++) { ?>
                                                                                        <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="field item form-group">
                                                                            <label class="col-form-label col-md-3">Kategori<span class="required">*</span></label>
                                                                            <div class="col-md-9">
                                                                                <select name="jenis" id="jenis" class="form-control show-tick" required>
                                                                                    <option value="">--Kategori--</option>
                                                                                    <option value="Akademik">Akademik</option>
                                                                                    <option value="Non-Akademik">Non Akademik</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                                <button type="submit" onclick="alert('Apakah anda sudah yakin ?')" class="btn btn-success btn-sm">Simpan</button>

                                                            </div>
                                                            <?php echo form_close() ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Siswa laki-laki -->
        <!-- Siswa Perempuan -->
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            </div>
        </div>
        <!-- #END# Siswa Perempuan -->
    </div>
</section>


</html>