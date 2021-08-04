<!-- Styles -->
<style>
    #all {
        width: 100%;
        height: 300px;
    }

    #komparasiKarakter {
        width: 100%;
        height: 300px;
    }
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/radar.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />


<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
    var chart = AmCharts.makeChart("all", {
        "type": "pie",
        "theme": "none",

        "dataProvider": [{
            "country": "Kognitif",
            "value": <?php echo $getBerandaPrestasi[0]->total; ?>
        }, {
            "country": "Afektif",
            "value": <?php echo $getKomparasiDataKarakterBeranda[0]->total; ?>
        }, {
            "country": "Konatif",
            "value": <?php echo $getBerandaAbsensi[0]->total; ?>
        }, ],
        "valueField": "value",
        "titleField": "country",
        "outlineAlpha": 0.4,
        "depth3D": 15,
        "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
        "angle": 30,

    });
</script>

<!-- Diagram Komparasi Karakter -->
<!-- Chart code -->
<script>
    var chart = AmCharts.makeChart("karakter_tanggungjawab", {
        "type": "radar",
        "theme": "none",
        "dataProvider": [{
            "country": "Kognitif",
            "litres": <?php echo $getBerandaPrestasi[0]->total; ?>
        }, {
            "country": "Afektif",
            "litres": <?php echo $getKomparasiDataKarakterBeranda[0]->total; ?>
        }, {
            "country": "Konatif",
            "litres": <?php echo $getBerandaAbsensi[0]->total; ?>
        }, ],
        "valueAxes": [{
            "axisTitleOffset": 20,
            "minimum": 0,
            "axisAlpha": 0.15
        }],
        "startDuration": 2,
        "graphs": [{
            "balloonText": "[[value]] litres of beer per year",
            "bullet": "round",
            "lineThickness": 2,
            "valueField": "litres"
        }],
        "categoryField": "country",

    });
</script>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Absensi</h2>
        </div>

        <!-- summary bagian pertama -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">Jumlah Alpa</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">help</i>
                    </div>
                    <div class="content">
                        <div class="text">Jumlah Izin</div>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">forum</i>
                    </div>
                    <div class="content">
                        <div class="text">Jumlah Sakit</div>
                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Absensi -->

        <!-- Summary bagian kedua -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-grey hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">Jenis Prestasi</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">help</i>
                    </div>
                    <div class="content">
                        <div class="text">Jumlah Siswa</div>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">forum</i>
                    </div>
                    <div class="content">
                        <div class="text">Jumlah Guru</div>
                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Absensi -->

        <!-- CPU Usage -->
        <div class="row clearfix">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-12">
                                <h2>Komparasi Data</h2>
                                <small>Komparasi antara data Absensi, Karakter Siswa, dan Prestasi</small>
                            </div>
                        </div>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="all" class="dashboard-flot-chart"></div>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-12">
                                <h2>Komparasi Data Karakter</h2>
                                <small> Statistik karakater Tanggung Jawab</small>
                            </div>

                        </div>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="karakter_tanggungjawab" class="dashboard-flot-chart"></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- #END# CPU Usage -->
    </div>
</section>


</html>