<!-- Styles -->
<style>
    #absensi {
        width: 100%;
        height: 300px;
    }

    #prestasi {
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
        "dataProvider": [{
            "year": "2001",
            "value": 0.411,
            "value1": 1
        }, {
            "year": "2002",
            "value": 0.462,
            "value1": 0.5
        }, {
            "year": "2003",
            "value": 0.47,
            "value1": 1.1
        }, {
            "year": "2004",
            "value": 0.445,
            "value1": 0.8
        }, {
            "year": "2005",
            "value": 0.47,
            "value1": 0.2
        }],
        "valueAxes": [{
            "axisAlpha": 0,
            "position": "left"
        }],
        "graphs": [{
                "id": "g1",
                "balloonText": "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>",
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
                "balloonText": "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>",
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
    var chart = AmCharts.makeChart("prestasi", {
        "type": "serial",
        "theme": "none",
        "marginTop": 20,
        "marginRight": 10,
        "dataProvider": [{
            "year": "2001",
            "value": 0.411,
            "value1": 1
        }, {
            "year": "2002",
            "value": 0.462,
            "value1": 0.5
        }, {
            "year": "2003",
            "value": 0.47,
            "value1": 1.1
        }, {
            "year": "2004",
            "value": 0.445,
            "value1": 0.8
        }, {
            "year": "2005",
            "value": 0.47,
            "value1": 0.2
        }],
        "valueAxes": [{
            "axisAlpha": 0,
            "position": "left"
        }],
        "graphs": [{
                "id": "g1",
                "balloonText": "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>",
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
                "balloonText": "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>",
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

<!-- karakter Tanggung Jawab -->
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
<!-- End karakter tanggung jawab -->



<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Statistics & Visualization</h2>
            <?php foreach ($getKPIAbsensi as $r) { ?>
                <?php echo $r->tahun; ?> -
                <?php echo ($r->nilai_target); ?> -
                <?php echo ($r->total); ?> <br>
            <?php } ?>
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
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
                                        <div class="header">
                                            <h5> Target Pencapaian Prestasi </h5>
                                            <small>Data target pencapaian ditampilkan seluruh tahun</small>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="prestasi"></div>
                                        </div>
                                    </div>
                                    <!-- end KPI Prestasi-->
                                    <div class="col-md-12">
                                        <div class="header">
                                            <h5> <i class="material-icons">bar_chart</i> Target Pencapaian (Key Performance Indicators) Penilaian Karakter Siswa. </h5>
                                            <small>Data yang direpresentasikan sebagai perbandingan target dan pencapaian.</small>
                                        </div>
                                    </div>
                                    <!-- Karakter tanggung jawab -->
                                    <div class="col-md-6">
                                        <div class="header">
                                            <h5> Karakter Tanggung Jawab </h5>
                                            <small>Target Capaian Karakter Tanggung Jawab</small>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="karakter_tanggungJawab"></div>
                                        </div>
                                    </div>
                                    <!-- end karakter tanggung jawab-->
                                    <!-- Karakter kepemimpinan -->
                                    <div class="col-md-6">
                                        <div class="header">
                                            <h5> Karakter Kepemimpinan</h5>
                                            <small>Target Capaian Karakter Kepemimpinan</small>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="karakter_kepemimpinan"></div>
                                        </div>
                                    </div>
                                    <!-- end karakter kepemimpinan-->

                                    <!-- Karakter disiplin -->
                                    <div class="col-md-6">
                                        <div class="header">
                                            <h5> Karakter Disiplin</h5>
                                            <small>Target Capaian Karakter Kedisiplinan</small>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="karakter_disiplin"></div>
                                        </div>
                                    </div>
                                    <!-- end karakter disiplin-->

                                    <!-- Karakter kejujuran -->
                                    <div class="col-md-6">
                                        <div class="header">
                                            <h5> Karakter Kejujuran</h5>
                                            <small>Target Capaian Karakter Kejujuran</small>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="karakter_kejujuran"></div>
                                        </div>
                                    </div>
                                    <!-- end karakter kejujuran-->

                                    <!-- Karakter kesopanan -->
                                    <div class="col-md-12">
                                        <div class="header">
                                            <h5> Karakter Kesopanan</h5>
                                            <small>Target Capaian Karakter Kesopanan</small>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="karakter_sopanSantun"></div>
                                        </div>
                                    </div>
                                    <!-- end karakter kesopanan-->


                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="manajemen">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="header">
                                            <h5> Perbandingan Absensi(Alpa) dengan Prestasi Keseluruhan </h5>
                                        </div>
                                        <div class="thumbnail">

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