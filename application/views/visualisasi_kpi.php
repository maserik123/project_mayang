<!-- Styles -->
<style>
    #chartdiv {
        width: 100%;
        height: 300px;
    }
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

<!-- Chart code -->
<script>
    var chart = AmCharts.makeChart("chartdiv", {
        "type": "serial",
        "theme": "none",
        "marginTop": 0,
        "marginRight": 10,
        "dataProvider": [{
            "year": "2001",
            "value": 0.411,
            "value1": 0.21
        }, {
            "year": "2002",
            "value": 0.462,
            "value1": 0.21

        }, {
            "year": "2003",
            "value": 0.47
        }, {
            "year": "2004",
            "value": 0.445
        }, {
            "year": "2005",
            "value": 0.47
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
            "lineColor": "#d1655d",
            "lineThickness": 2,
            "negativeLineColor": "#637bb6",
            "type": "smoothedLine",
            "valueField": "value"
        }, {
            "id": "g2",
            "balloonText": "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>",
            "bullet": "round",
            "bulletSize": 8,
            "lineColor": "#d1655d",
            "lineThickness": 2,
            "negativeLineColor": "#637bb6",
            "type": "smoothedLine",
            "valueField": "value1"
        }],
        "chartScrollbar": {
            "graph": "g1",
            "gridAlpha": 0,
            "color": "#888888",
            "scrollbarHeight": 25,
            "backgroundAlpha": 0,
            "selectedBackgroundAlpha": 0.1,
            "selectedBackgroundColor": "#888888",
            "graphFillAlpha": 0,
            "autoGridCount": true,
            "selectedGraphFillAlpha": 0,
            "graphLineAlpha": 0.2,
            "graphLineColor": "#c2c2c2",
            "selectedGraphLineColor": "#888888",
            "selectedGraphLineAlpha": 1

        },
        "chartCursor": {
            "categoryBalloonDateFormat": "YYYY",
            "cursorAlpha": 0,
            "valueLineEnabled": true,
            "valueLineBalloonEnabled": true,
            "valueLineAlpha": 0.5,
            "fullWidth": true
        },
        "dataDateFormat": "YYYY",
        "categoryField": "year",
        "categoryAxis": {
            "minPeriod": "YYYY",
            "parseDates": true,
            "minorGridAlpha": 0.1,
            "minorGridEnabled": true
        },

    });

    chart.addListener("rendered", zoomChart);
    if (chart.zoomChart) {
        chart.zoomChart();
    }

    function zoomChart() {
        chart.zoomToIndexes(Math.round(chart.dataProvider.length * 0.4), Math.round(chart.dataProvider.length * 0.55));
    }
</script>

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
                                            <h5> <i class="material-icons">bar_chart</i> Pola status ketidakhadiran tanpa keterangan siswa berdasarkan waktu, tingkatan dan jenis kelamin. </h5>
                                            <small>Data yang direpresentasikan adalah data 5 tahun terakhir.</small>
                                        </div>
                                    </div>
                                    <!-- Statistik per Tahun -->
                                    <div class="col-md-12">
                                        <div class=" text-right header-dropdown m-r--5">
                                            <div class="btn-group">
                                                <?php for ($i = date('Y'); $i > date('Y') - 5; $i--) { ?>
                                                    <a style="font-size: 10px;" href="<?php echo base_url('visualisasi/index/') . $i; ?>" class="btn btn-sm bg-red"><?php echo $i; ?></a>
                                                <?php } ?>
                                                <button class="btn btn-sm btn-primary" style="font-size: 10px;">Tahun</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ketidakhadiran siswa laki-laki -->
                                    <div class="col-md-6">
                                        <div class="header">
                                            <h5> Ketidakhadiran Tanpa Keterangan (Alpa) Siswa Laki-laki </h5>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="chartdiv"></div>
                                        </div>
                                    </div>
                                    <!-- end of ketidakhadiran siswa laki-laki -->
                                    <!-- ketidakhadiran siswa laki-laki -->
                                    <div class="col-md-6">
                                        <div class="header">
                                            <h5> Ketidakhadiran Tanpa Keterangan (Alpa) Siswa Laki-laki </h5>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="chartdiv"></div>
                                        </div>
                                    </div>
                                    <!-- end of ketidakhadiran siswa laki-laki -->
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