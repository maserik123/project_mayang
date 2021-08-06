<!-- Styles -->
<style>
    #chartdiv_laki {
        width: 100%;
        height: 250px;
        font-size: 10px;
    }

    #chartdiv_perempuan {
        width: 100%;
        height: 250px;
        font-size: 10px;
    }

    #chartdiv_absensi_3 {
        width: 100%;
        height: 200px;
        font-size: 10px;
    }

    #chartdiv4 {
        width: 100%;
        height: 350px;
        font-size: 10px;
    }

    #chartdiv5 {
        width: 100%;
        height: 350px;
        font-size: 10px;
    }

    #chartdiv_bagian_2 {
        width: 100%;
        height: 400px;
        font-size: 10px;
    }

    #chartdiv_1_bagian_3 {
        width: 100%;
        height: 400px;
        font-size: 10px;
    }

    #chartdiv_1_bagian_4 {
        width: 100%;
        height: 400px;
        font-size: 10px;
    }

    #perbandingan_absensi {
        width: 100%;
        height: 350px;
        font-size: 10px;
    }

    #perbandingan_prestasi {
        width: 100%;
        height: 350px;
        font-size: 10px;
    }

    #grafik_tab_2_Akademik {
        width: 100%;
        height: 500px;
        font-size: 10px;
    }

    #grafik_tab_2_nonAkademik {
        width: 100%;
        height: 500px;
        font-size: 10px;
    }

    #grafik_jenis_prestasi {
        width: 100%;
        height: 300px;
        font-size: 10px;
    }
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/material.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/kelly.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />


<!-- Bagian Grafik Tab 1 -->
<!-- Chart Bagian absensi ketidakhadiran laki-laki-->
<script>
    am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_kelly);
        // Themes end

        var chart = am4core.create("chartdiv_laki", am4charts.PieChart3D);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

        chart.legend = new am4charts.Legend();

        chart.data = [
            <?php foreach ($getAbsensiLakiLaki as $row) { ?> {
                    country: "<?php echo $row->tingkatan; ?>",
                    litres: <?php echo $row->tot_absen; ?>
                },
            <?php  } ?>
        ];

        var series = chart.series.push(new am4charts.PieSeries3D());
        series.dataFields.value = "litres";
        series.dataFields.category = "country";

    }); // end am4core.ready()
</script>
<!-- End Bagian absensi ketidakhadiran laki-laki -->

<!-- Bagian absensi ketidakhadiran perempuan -->
<script>
    am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_material);
        // Themes end

        var chart = am4core.create("chartdiv_perempuan", am4charts.PieChart3D);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

        chart.legend = new am4charts.Legend();

        chart.data = [
            <?php foreach ($getAbsensiPerempuan as $row) { ?> {
                    country: "<?php echo $row->tingkatan; ?>",
                    litres: <?php echo $row->tot_absen; ?>
                },
            <?php  } ?>
        ];

        var series = chart.series.push(new am4charts.PieSeries3D());
        series.dataFields.value = "litres";
        series.dataFields.category = "country";

    }); // end am4core.ready()
</script>
<!-- End Bagian absensi ketidakhadiran perempuan -->

<!-- Bagian absensi ketidak hadiran grafik ke 3-->
<script>
    am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        /**
         * Source data
         */
        var data = [
            <?php
            $data_warna = ['#FF8C00', '#228B22', '#00CED1'];
            $no = 0;
            foreach ($getJenisKelaminAlpaPertahun as $row) { ?> {
                    "category": "<?php echo $row->jenis_kelamin ?>",
                    "value": <?php echo $row->tot_absen ?>,
                    "color": am4core.color("<?php echo $data_warna[$no++]; ?>"),
                    "breakdown": [
                        <?php
                        $getAlpaByTingkatanPertahun = $this->Visualisasi_model->getAlpaByTingkatanPertahun($tahun, $row->jenis_kelamin);
                        foreach ($getAlpaByTingkatanPertahun as $b) { ?> {
                                "category": "<?php echo $b->tingkatan; ?>",
                                "value": <?php echo $b->tot_absen; ?>
                            },
                        <?php } ?>
                    ]
                },
            <?php } ?>
        ]

        /**
         * Chart container
         */

        // Create chart instance
        var chart = am4core.create("chartdiv_absensi_3", am4core.Container);
        chart.width = am4core.percent(100);
        chart.height = am4core.percent(100);
        chart.layout = "horizontal";


        /**
         * Column chart
         */

        // Create chart instance
        var columnChart = chart.createChild(am4charts.XYChart);

        // Create axes
        var categoryAxis = columnChart.yAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "category";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.inversed = true;

        var valueAxis = columnChart.xAxes.push(new am4charts.ValueAxis());

        // Create series
        var columnSeries = columnChart.series.push(new am4charts.ColumnSeries());
        columnSeries.dataFields.valueX = "value";
        columnSeries.dataFields.categoryY = "category";
        columnSeries.columns.template.strokeWidth = 0;

        /**
         * Pie chart
         */

        // Create chart instance
        var pieChart = chart.createChild(am4charts.PieChart);
        pieChart.data = data;
        pieChart.innerRadius = am4core.percent(50);

        // Add and configure Series
        var pieSeries = pieChart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "value";
        pieSeries.dataFields.category = "category";
        pieSeries.slices.template.propertyFields.fill = "color";
        pieSeries.labels.template.disabled = true;

        // Set up labels
        var label1 = pieChart.seriesContainer.createChild(am4core.Label);
        label1.text = "";
        label1.horizontalCenter = "middle";
        label1.fontSize = 35;
        label1.fontWeight = 600;
        label1.dy = -30;

        var label2 = pieChart.seriesContainer.createChild(am4core.Label);
        label2.text = "";
        label2.horizontalCenter = "middle";
        label2.fontSize = 12;
        label2.dy = 20;

        // Auto-select first slice on load
        pieChart.events.on("ready", function(ev) {
            pieSeries.slices.getIndex(0).isActive = true;
        });

        // Set up toggling events
        pieSeries.slices.template.events.on("toggled", function(ev) {
            if (ev.target.isActive) {

                // Untoggle other slices
                pieSeries.slices.each(function(slice) {
                    if (slice != ev.target) {
                        slice.isActive = false;
                    }
                });

                // Update column chart
                columnSeries.appeared = false;
                columnChart.data = ev.target.dataItem.dataContext.breakdown;
                columnSeries.fill = ev.target.fill;
                columnSeries.reinit();

                // Update labels
                label1.text = pieChart.numberFormatter.format(ev.target.dataItem.values.value.percent, "#.'%'");
                label1.fill = ev.target.fill;

                label2.text = ev.target.dataItem.category;
            }
        });

    }); // end am4core.ready()
</script>
<!-- Bagian absensi ketidakhadiran grafik ke 3 -->

<!-- Untuk membuat absensi berdasarkan tingkatan -->
<script>
    var chart = AmCharts.makeChart("chartdiv4", {
        "type": "serial",
        "theme": "none",
        "legend": {
            "horizontalGap": 10,
            "position": "bottom",
            "useGraphSettings": true,
            "markerSize": 10
        },
        "dataProvider": [
            <?php foreach ($getAbsensiLakiAllTahun as $row) { ?> {
                    <?php $getTingkatanTk = $this->Visualisasi_model->getTingkatanTkLaki($row->tahun); ?>
                    <?php $getTingkatanSD = $this->Visualisasi_model->getTingkatanSDLaki($row->tahun); ?>
                    <?php $getTingkatanSMP = $this->Visualisasi_model->getTingkatanSMPLaki($row->tahun); ?>

                        "year": <?php echo $row->tahun; ?>,
                        "tk": <?php echo !empty($getTingkatanTk->total_tk) ? $getTingkatanTk->total_tk : 0  ?>,
                        "sd": <?php echo !empty($getTingkatanSD->total_sd) ? $getTingkatanSD->total_sd : 0 ?>,
                        "smp": <?php echo !empty($getTingkatanSMP->total_smp) ? $getTingkatanSMP->total_smp : 0 ?>

                },
            <?php } ?>
        ],
        "valueAxes": [{
            "stackType": "regular",
            "axisAlpha": 0.5,
            "gridAlpha": 0
        }],
        "graphs": [{
                "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
                "fillAlphas": 0.8,
                "labelText": "[[value]]",
                "lineAlpha": 0.3,
                "title": "TK",
                "type": "column",
                "color": "#000000",
                "valueField": "tk"
            }, {
                "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
                "fillAlphas": 0.8,
                "labelText": "[[value]]",
                "lineAlpha": 0.3,
                "title": "SD",
                "type": "column",
                "color": "#000000",
                "valueField": "sd"
            },
            {
                "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
                "fillAlphas": 0.8,
                "labelText": "[[value]]",
                "lineAlpha": 0.3,
                "title": "SMP",
                "type": "column",
                "color": "#000000",
                "valueField": "smp"
            },
        ],
        "rotate": true,
        "categoryField": "year",
        "categoryAxis": {
            "gridPosition": "start",
            "axisAlpha": 0,
            "gridAlpha": 0,
            "position": "left"
        },
        "export": {
            "enabled": true
        }
    });
</script>

<script>
    var chart = AmCharts.makeChart("chartdiv5", {
        "type": "serial",
        "theme": "none",
        "legend": {
            "horizontalGap": 10,
            "position": "bottom",
            "useGraphSettings": true,
            "markerSize": 10
        },
        "dataProvider": [
            <?php foreach ($getAbsensiPerempuanAllTahun as $r) { ?> {
                    <?php $getTingkatanTkPerempuan = $this->Visualisasi_model->getTingkatanTkPerempuan($r->tahun); ?>
                    <?php $getTingkatanSDPerempuan = $this->Visualisasi_model->getTingkatanSDPerempuan($r->tahun); ?>
                    <?php $getTingkatanSMPPerempuan = $this->Visualisasi_model->getTingkatanSMPPerempuan($r->tahun); ?>
                        "year": <?php echo $r->tahun; ?>,
                        "tk": <?php echo !empty($getTingkatanTkPerempuan->total_tk) ? $getTingkatanTkPerempuan->total_tk : 0; ?>,
                        "sd": <?php echo !empty($getTingkatanSDPerempuan->total_sd) ? $getTingkatanSDPerempuan->total_sd : 0; ?>,
                        "smp": <?php echo !empty($getTingkatanSMPPerempuan->total_smp) ? $getTingkatanSMPPerempuan->total_smp : 0; ?>,
                },
            <?php } ?>
        ],
        "valueAxes": [{
            "stackType": "regular",
            "axisAlpha": 0.5,
            "gridAlpha": 0
        }],
        "graphs": [{
                "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
                "fillAlphas": 0.8,
                "labelText": "[[value]]",
                "lineAlpha": 0.3,
                "title": "TK",
                "type": "column",
                "color": "#000000",
                "valueField": "tk"
            },
            {
                "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
                "fillAlphas": 0.8,
                "labelText": "[[value]]",
                "lineAlpha": 0.3,
                "title": "SD",
                "type": "column",
                "color": "#000000",
                "valueField": "sd"
            },
            {
                "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
                "fillAlphas": 0.8,
                "labelText": "[[value]]",
                "lineAlpha": 0.3,
                "title": "SMP",
                "type": "column",
                "color": "#000000",
                "valueField": "smp"
            },
        ],
        "rotate": true,
        "categoryField": "year",
        "categoryAxis": {
            "gridPosition": "start",
            "axisAlpha": 0,
            "gridAlpha": 0,
            "position": "left"
        },
        "export": {
            "enabled": true
        }
    });
</script>
<!-- End Grafik bagian Tab 1 -->

<!-- Grafik bagian tab 2 -->

<!-- Chart 1 -->

<!-- Grafik 2 -->
<!-- bagian absensi -->
<!-- Chart code -->
<script>
    var chart = AmCharts.makeChart("perbandingan_absensi", {
        "type": "serial",
        "theme": "none",
        "legend": {
            "horizontalGap": 10,
            "maxColumns": 4,
            "position": "bottom",
            "useGraphSettings": true,
            "markerSize": 10
        },
        "dataProvider": [
            <?php foreach ($getPerbandinganAbsensi as $row) {
                $getPerbandinganAbsensiTK = $this->Visualisasi_model->getPerbandinganAbsensiTingkatan($row->tahun, 'TK');
                $getPerbandinganAbsensiSD = $this->Visualisasi_model->getPerbandinganAbsensiTingkatan($row->tahun, 'SD');
                $getPerbandinganAbsensiSMP = $this->Visualisasi_model->getPerbandinganAbsensiTingkatan($row->tahun, 'SMP');

            ?> {
                    "year": <?php echo $row->tahun; ?>,
                    "tk": <?php echo $getPerbandinganAbsensiTK[0]->total; ?>,
                    "sd": <?php echo $getPerbandinganAbsensiSD[0]->total; ?>,
                    "smp": <?php echo $getPerbandinganAbsensiSMP[0]->total; ?>,
                },
            <?php } ?>
        ],
        "valueAxes": [{
            "stackType": "regular",
            "axisAlpha": 0.5,
            "gridAlpha": 0
        }],
        "graphs": [{
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
            "fillAlphas": 0.8,
            "labelText": "[[value]]",
            "lineAlpha": 0.3,
            "title": "Tingkat TK",
            "type": "column",
            "color": "#000000",
            "valueField": "tk"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
            "fillAlphas": 0.8,
            "labelText": "[[value]]",
            "lineAlpha": 0.3,
            "title": "Tingkat SD",
            "type": "column",
            "color": "#000000",
            "valueField": "sd"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
            "fillAlphas": 0.8,
            "labelText": "[[value]]",
            "lineAlpha": 0.3,
            "title": "Tingkat SMP",
            "type": "column",
            "color": "#000000",
            "valueField": "smp"
        }, ],
        "rotate": true,
        "categoryField": "year",
        "categoryAxis": {
            "gridPosition": "start",
            "axisAlpha": 0,
            "gridAlpha": 0,
            "position": "left"
        },
        "export": {
            "enabled": true
        }
    });
</script>
<!-- End Bagian absensi -->

<!-- bagian prestasi -->
<script>
    var chart = AmCharts.makeChart("perbandingan_prestasi", {
        "type": "serial",
        "theme": "none",
        "legend": {
            "horizontalGap": 10,
            "maxColumns": 4,
            "position": "bottom",
            "useGraphSettings": true,
            "markerSize": 10
        },
        "dataProvider": [
            <?php foreach ($getPerbandinganPrestasi as $row) {
                $getPerbandinganPrestasiTK = $this->Visualisasi_model->getPerbandinganPrestasiTingkatan($row->tahun, 'TK');
                $getPerbandinganPrestasiSD = $this->Visualisasi_model->getPerbandinganPrestasiTingkatan($row->tahun, 'SD');
                $getPerbandinganPrestasiSMP = $this->Visualisasi_model->getPerbandinganPrestasiTingkatan($row->tahun, 'SMP');

            ?> {
                    "year": <?php echo $row->tahun; ?>,
                    "tk": <?php echo $getPerbandinganPrestasiTK[0]->total; ?>,
                    "sd": <?php echo $getPerbandinganPrestasiSD[0]->total; ?>,
                    "smp": <?php echo $getPerbandinganPrestasiSMP[0]->total; ?>,
                },
            <?php } ?>
        ],
        "valueAxes": [{
            "stackType": "regular",
            "axisAlpha": 0.5,
            "gridAlpha": 0
        }],
        "graphs": [{
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
            "fillAlphas": 0.8,
            "labelText": "[[value]]",
            "lineAlpha": 0.3,
            "title": "Tingkat TK",
            "type": "column",
            "color": "#000000",
            "valueField": "tk"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
            "fillAlphas": 0.8,
            "labelText": "[[value]]",
            "lineAlpha": 0.3,
            "title": "Tingkat SD",
            "type": "column",
            "color": "#000000",
            "valueField": "sd"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
            "fillAlphas": 0.8,
            "labelText": "[[value]]",
            "lineAlpha": 0.3,
            "title": "Tingkat SMP",
            "type": "column",
            "color": "#000000",
            "valueField": "smp"
        }, ],
        "rotate": true,
        "categoryField": "year",
        "categoryAxis": {
            "gridPosition": "start",
            "axisAlpha": 0,
            "gridAlpha": 0,
            "position": "left"
        },
        "export": {
            "enabled": true
        }
    });
</script>
<!-- End bagian prestasi -->

<!-- Chart 2 Akademik-->
<script>
    var chart = AmCharts.makeChart("grafik_tab_2_Akademik", {
        "type": "serial",
        "theme": "none",
        "legend": {
            "horizontalGap": 10,
            "maxColumns": 1,
            "position": "bottom",
            "useGraphSettings": true,
            "markerSize": 10
        },
        "dataProvider": [
            <?php foreach ($getAkademik as $t) {
                $getTingkatanTKByTahun = $this->Visualisasi_model->getTingkatanByTahun('Akademik', 'TK', $t->tahun);
                $getTingkatanSDByTahun = $this->Visualisasi_model->getTingkatanByTahun('Akademik', 'SD', $t->tahun);
                $getTingkatanSMPByTahun = $this->Visualisasi_model->getTingkatanByTahun('Akademik', 'SMP', $t->tahun);

            ?> {
                    "year": "<?php echo $t->tahun; ?>",
                    "tk": <?php echo empty($getTingkatanTKByTahun[0]->total) ? 0 : $getTingkatanTKByTahun[0]->total; ?>,
                    "sd": <?php echo empty($getTingkatanSDByTahun[0]->total) ? 0 : $getTingkatanSDByTahun[0]->total; ?>,
                    "smp": <?php echo empty($getTingkatanSMPByTahun[0]->total) ? 0 : $getTingkatanSMPByTahun[0]->total; ?>,
                },
            <?php } ?>
        ],
        "valueAxes": [{
            "stackType": "regular",
            "axisAlpha": 0.3,
            "gridAlpha": 0
        }],
        "graphs": [{
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
            "fillAlphas": 0.8,
            "labelText": "[[value]]",
            "lineAlpha": 0.3,
            "title": "TK",
            "type": "column",
            "color": "#000000",
            "valueField": "tk"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
            "fillAlphas": 0.8,
            "labelText": "[[value]]",
            "lineAlpha": 0.3,
            "title": "SD",
            "type": "column",
            "color": "#000000",
            "valueField": "sd"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
            "fillAlphas": 0.8,
            "labelText": "[[value]]",
            "lineAlpha": 0.3,
            "title": "SMP",
            "type": "column",
            "color": "#000000",
            "valueField": "smp"
        }, ],
        "categoryField": "year",
        "categoryAxis": {
            "gridPosition": "start",
            "axisAlpha": 0,
            "gridAlpha": 0,
            "position": "left"
        },
        "export": {
            "enabled": true
        }

    });
</script>
<!-- End Chart Akademik-->

<!-- Chart 2 nonAkademik-->
<script>
    var chart = AmCharts.makeChart("grafik_tab_2_nonAkademik", {
        "type": "serial",
        "theme": "none",
        "legend": {
            "horizontalGap": 10,
            "maxColumns": 1,
            "position": "bottom",
            "useGraphSettings": true,
            "markerSize": 10
        },
        "dataProvider": [
            <?php foreach ($getNonAkademik as $t) {
                $getTingkatanTKByTahun = $this->Visualisasi_model->getTingkatanByTahun('Non-Akademik', 'TK', $t->tahun);
                $getTingkatanSDByTahun = $this->Visualisasi_model->getTingkatanByTahun('Non-Akademik', 'SD', $t->tahun);
                $getTingkatanSMPByTahun = $this->Visualisasi_model->getTingkatanByTahun('Non-Akademik', 'SMP', $t->tahun);

            ?> {
                    "year": "<?php echo $t->tahun; ?>",
                    "tk": <?php echo empty($getTingkatanTKByTahun[0]->total) ? 0 : $getTingkatanTKByTahun[0]->total; ?>,
                    "sd": <?php echo empty($getTingkatanSDByTahun[0]->total) ? 0 : $getTingkatanSDByTahun[0]->total; ?>,
                    "smp": <?php echo empty($getTingkatanSMPByTahun[0]->total) ? 0 : $getTingkatanSMPByTahun[0]->total; ?>,
                },
            <?php } ?>
        ],
        "valueAxes": [{
            "stackType": "regular",
            "axisAlpha": 0.3,
            "gridAlpha": 0
        }],
        "graphs": [{
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
            "fillAlphas": 0.8,
            "labelText": "[[value]]",
            "lineAlpha": 0.3,
            "title": "TK",
            "type": "column",
            "color": "#000000",
            "valueField": "tk"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
            "fillAlphas": 0.8,
            "labelText": "[[value]]",
            "lineAlpha": 0.3,
            "title": "SD",
            "type": "column",
            "color": "#000000",
            "valueField": "sd"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
            "fillAlphas": 0.8,
            "labelText": "[[value]]",
            "lineAlpha": 0.3,
            "title": "SMP",
            "type": "column",
            "color": "#000000",
            "valueField": "smp"
        }, ],
        "categoryField": "year",
        "categoryAxis": {
            "gridPosition": "start",
            "axisAlpha": 0,
            "gridAlpha": 0,
            "position": "left"
        },
        "export": {
            "enabled": true
        }

    });
</script>
<!-- End Chart nonAkademik-->

<!-- Chart pie akademikNonAkademik -->
<script>
    am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        var chart = am4core.create("grafik_jenis_prestasi", am4charts.PieChart3D);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

        chart.legend = new am4charts.Legend();

        chart.data = [
            <?php foreach ($getAllAkademikNonAkademik as $row) { ?> {
                    country: "<?php echo $row->kategori; ?>",
                    litres: <?php echo $row->total; ?>
                },
            <?php } ?>
        ];

        var series = chart.series.push(new am4charts.PieSeries3D());
        series.dataFields.value = "litres";
        series.dataFields.category = "country";

    }); // end am4core.ready()
</script>
<!-- End pie chart -->

<!-- End grafik bagian 2 -->

<!-- Grafik bagian tab 3 -->

<!-- Chart 1 -->
<script>
    var chart = AmCharts.makeChart("chartdiv_1_bagian_3", {
        "type": "serial",
        "theme": "none",
        "depth3D": 20,
        "angle": 30,
        "legend": {
            "horizontalGap": 10,
            "useGraphSettings": true,
            "markerSize": 10
        },
        "dataProvider": [
            <?php foreach ($getPerbandinganKarakter as $r) { ?> {
                    "year": "<?php echo $r->tingkatan; ?>",
                    "tanggung_jawab": <?php echo $r->persentase_tanggungJawab; ?>,
                    "kepemimpinan": <?php echo $r->persentase_kepemimpinan ?>,
                    "disiplin": <?php echo $r->Persentase_Disiplin ?>,
                    "sopan_santun": <?php echo $r->Persentase_SopanSantun ?>,
                    "kejujuran": <?php echo $r->Persentase_Kejujuran ?>,
                },
            <?php } ?>
        ],
        "valueAxes": [{
            "stackType": "regular",
            "axisAlpha": 0,
            "gridAlpha": 0
        }],
        "graphs": [{
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>Tanggung Jawab: <b>[[value]] %</b></span>",
            "fillAlphas": 0.8,
            "labelText": "Tanggung Jawab : <br> [[value]] %",
            "lineAlpha": 0.3,
            "title": "Tanggung Jawab",
            "type": "column",
            "color": "#000000",
            "valueField": "tanggung_jawab"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>Kepemimpinan : <b>[[value]] %</b></span>",
            "fillAlphas": 0.8,
            "labelText": "Kepemimpinan : <br> [[value]] %",
            "lineAlpha": 0.3,
            "title": "Kepemimpinan",
            "type": "column",
            "color": "#000000",
            "valueField": "kepemimpinan"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>Disiplin : <b>[[value]] %</b></span>",
            "fillAlphas": 0.8,
            "labelText": "Disiplin : <br> [[value]] %",
            "lineAlpha": 0.3,
            "title": "Disiplin",
            "type": "column",
            "color": "#000000",
            "valueField": "disiplin"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>Sopan Santun : <b>[[value]] %</b></span>",
            "fillAlphas": 0.8,
            "labelText": "Sopan Santun : <br> [[value]] %",
            "lineAlpha": 0.3,
            "title": "Sopan Santun",
            "type": "column",
            "color": "#000000",
            "valueField": "sopan_santun"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>Kejujuran: <b>[[value]] %</b></span>",
            "fillAlphas": 0.8,
            "labelText": "Kejujuran : <br> [[value]] %",
            "lineAlpha": 0.3,
            "title": "Kejujuran",
            "type": "column",
            "color": "#000000",
            "valueField": "kejujuran"
        }, ],
        "categoryField": "year",
        "categoryAxis": {
            "gridPosition": "start",
            "axisAlpha": 0,
            "gridAlpha": 0,
            "position": "left"
        },
        "export": {
            "enabled": true
        }

    });
</script>
<!-- End Chart 1 -->

<!-- End of grafik bagian 3 -->

<!-- Start to Bagian Tab 4 -->
<script>
    var chart = AmCharts.makeChart("chartdiv_1_bagian_4", {
        "type": "serial",
        "theme": "none",
        "legend": {
            "horizontalGap": 10,
            "maxColumns": 1,
            "position": "right",
            "useGraphSettings": true,
            "markerSize": 10
        },
        "dataProvider": [{
            "year": "TK",
            "relevan": <?php echo !empty($getGuruAjarRelevanTK[0]->total_relevan_tk) ? $getGuruAjarRelevanTK[0]->total_relevan_tk : 0; ?>,
            "tidak_relevan": <?php echo !empty($getGuruAjarTidakRelevanTK[0]->total_tidak_relevan_tk) ? $getGuruAjarTidakRelevanTK[0]->total_tidak_relevan_tk : 0; ?>,
        }, {
            "year": "SD",
            "relevan": <?php echo !empty($getGuruAjarRelevanSD[0]->total_relevan_sd) ? $getGuruAjarRelevanSD[0]->total_relevan_sd : 0; ?>,
            "tidak_relevan": <?php echo !empty($getGuruAjarTidakRelevanSD[0]->total_tidak_relevan_sd) ? $getGuruAjarTidakRelevanSD[0]->total_tidak_relevan_sd : 0; ?>,
        }, {
            "year": "SMP",
            "relevan": <?php echo !empty($getGuruAjarRelevanSMP[0]->total_relevan_smp) ? $getGuruAjarRelevanSMP[0]->total_relevan_smp : 0; ?>,
            "tidak_relevan": <?php echo !empty($getGuruAjarTidakRelevanSMP[0]->total_tidak_relevan_smp) ? $getGuruAjarTidakRelevanSMP[0]->total_tidak_relevan_smp : 0; ?>,
        }],
        "valueAxes": [{
            "stackType": "regular",
            "axisAlpha": 0.5,
            "gridAlpha": 0
        }],
        "graphs": [{
            "balloonText": "<b>[[title]]</b><br><span style='font-size:12px'>[[category]]: <b>[[value]] Relevan</b></span>",
            "fillAlphas": 0.8,
            "labelText": "[[value]]",
            "lineAlpha": 0.3,
            "title": "Relevan",
            "type": "column",
            "color": "#000000",
            "valueField": "relevan"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:12px'>[[category]]: <b>[[value]] Tidak Relevan</b></span>",
            "fillAlphas": 0.8,
            "labelText": "[[value]]",
            "lineAlpha": 0.3,
            "title": "Tidak Relevan",
            "type": "column",
            "color": "#000000",
            "valueField": "tidak_relevan"
        }, ],
        "rotate": true,
        "categoryField": "year",
        "categoryAxis": {
            "gridPosition": "start",
            "axisAlpha": 0,
            "gridAlpha": 0,
            "position": "left"
        },
        "export": {
            "enabled": true
        }
    });
</script>
<!-- End of grafik Tab 4 -->

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
                            <li role="presentation" class="active"><a href="#absen1" class="btn bg-green" data-toggle="tab">Ketidakhadiran Siswa</a></li>
                            <li role="presentation"><a href="#absen2" class="btn bg-green" data-toggle="tab">Ketidakhadiran Siswa Terhadap Prestasi</a></li>
                            <li role="presentation"><a href="#karakter" class="btn bg-green" data-toggle="tab">Karakter Siswa</a></li>
                            <li role="presentation"><a href="#keeratan" class="btn bg-green" data-toggle="tab">Keeratan Latar Belakang Guru</a></li>
                        </ul>
                    </div>
                    <div class="body">

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="absen1">
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


                                    <!-- Grafik bagian 4 -->
                                    <div class="col-md-6">
                                        <div class="header">
                                            <h5> Tanpa Keterangan (Alpa) Siswa Laki-laki Pertahun </h5>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="chartdiv4"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="header">
                                            <h5> Tanpa Keterangan (Alpa) Siswa Perempuan Pertahun </h5>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="chartdiv5"></div>
                                        </div>
                                    </div>
                                    <!-- end grafik bagian 4 -->
                                    <!-- Grafik Bagian 3 Bulat dan batang -->
                                    <div class="col-md-12">
                                        <div class="header">
                                            <h5> Pola Ketidakhadiran Tanpa Keterangan (Alpa) Siswa Tahun <?php echo $tahun; ?> </h5>
                                        </div>
                                        <div class="thumbnail">
                                            <?php if (!empty($getJenisKelaminAlpaPertahun)) { ?>
                                                <div id="chartdiv_absensi_3"></div>
                                            <?php } else { ?>
                                                <div style="height: 300px;text-align:center;">
                                                    <small>Belum ada data yang ditampilkan untuk tahun <?php echo $tahun; ?>.</small>
                                                </div>
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <!-- End of grafik bagian 3 bulat dan batang -->

                                    <!-- ketidakhadiran siswa laki-laki -->
                                    <div class="col-md-6">
                                        <div class="header">
                                            <h5> Ketidakhadiran Tanpa Keterangan (Alpa) Siswa Laki-laki <?php echo $tahun; ?> </h5>
                                        </div>
                                        <div class="thumbnail">
                                            <?php if (!empty($getAbsensiLakiLaki)) { ?>
                                                <div id="chartdiv_laki"></div>
                                            <?php } else { ?>
                                                <div style="height: 300px;text-align:center;">
                                                    <small>Belum ada data yang ditampilkan untuk tahun <?php echo $tahun; ?>.</small>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- end of ketidakhadiran siswa laki-laki -->

                                    <!-- start ketidakhadiran siswa perempuan -->
                                    <div class="col-md-6">
                                        <div class="header">
                                            <h5> Ketidakhadiran Tanpa Keterangan (Alpa) Siswa Perempuan <?php echo $tahun; ?> </h5>
                                        </div>
                                        <div class="thumbnail">
                                            <?php if (!empty($getAbsensiPerempuan)) { ?>
                                                <div id="chartdiv_perempuan"></div>
                                            <?php } else { ?>
                                                <div style="height: 300px;text-align:center;">
                                                    <small>Belum ada data yang ditampilkan untuk tahun <?php echo $tahun; ?>.</small>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- end of ketidakhadiran siswa perempuan -->

                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="absen2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="header">
                                            <h5> Perbandingan Absensi(Alpa) dengan Prestasi Keseluruhan </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="header">
                                            <h5> Tingkat Absensi </h5>
                                            <small>Data Absensi Pertahun</small>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="perbandingan_absensi"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="header">
                                            <h5> Tingkat Prestasi </h5>
                                            <small>Data Prestasi Keseluruhan Pertahun</small>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="perbandingan_prestasi"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="header">
                                            <h5> Perbandingan Jenis Prestasi </h5>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="grafik_jenis_prestasi"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="header">
                                            <h5> Jenis Prestasi Akademik</h5>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="grafik_tab_2_Akademik"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="header">
                                            <h5> Jenis Prestasi Non Akademik</h5>
                                        </div>
                                        <div class="thumbnail">
                                            <?php if (!empty($getPerbandinganPrestasiAbsensi)) { ?>
                                                <div id="grafik_tab_2_nonAkademik"></div>
                                            <?php } else { ?>
                                                <div style="height: 300px;text-align:center;">
                                                    <small>Belum ada data yang ditampilkan untuk tahun <?php echo $tahun; ?>.</small>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="karakter">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="header">
                                            <h5> Perbandingan Absensi(Alpa) dengan Prestasi Keseluruhan </h5>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="chartdiv_1_bagian_3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="keeratan">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="header">
                                            <h5> Keeratan Guru Berdasarakan Tingkatan </h5>
                                        </div>
                                        <div class="thumbnail">
                                            <div id="chartdiv_1_bagian_4"></div>
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