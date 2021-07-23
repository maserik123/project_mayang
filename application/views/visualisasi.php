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
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/material.js"></script>
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
        am4core.useTheme(am4themes_animated);
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
        am4core.useTheme(am4themes_animated);
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
<script>
    var chart = AmCharts.makeChart("chartdiv_bagian_2", {
        "theme": "none",
        "type": "serial",
        "legend": {
            "horizontalGap": 10,
            "position": "bottom",
            "useGraphSettings": true,
            "markerSize": 10
        },
        "dataProvider": [
            <?php foreach ($getPerbandinganPrestasiAbsensi as $row) { ?> {
                    "country": "<?php echo !empty($row->tahun) ? $row->tahun : 0; ?>",
                    "absensi": "<?php echo !empty($row->total_absensi) ? $row->total_absensi : 0; ?>",
                    "prestasi": "<?php echo !empty($row->total_prestasi) ? $row->total_prestasi : 0; ?>",
                },
            <?php } ?>
        ],
        "valueAxes": [{
            "unit": "%",
            "position": "left",
            "title": "Perbandingan Prestasi dengan Absensi (Alpa)",
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "Absensi: <b>[[value]]</b>",
            "fillAlphas": 0.9,
            "lineAlpha": 0.2,
            "title": "Absensi",
            "type": "column",
            "valueField": "absensi"
        }, {
            "balloonText": "Prestasi: <b>[[value]]</b>",
            "fillAlphas": 0.9,
            "lineAlpha": 0.2,
            "title": "Prestasi",
            "type": "column",
            "clustered": false,
            "columnWidth": 0.5,
            "valueField": "prestasi"
        }],
        "plotAreaFillAlphas": 0.1,
        "categoryField": "country",
        "categoryAxis": {
            "gridPosition": "start"
        },
        "export": {
            "enabled": true
        }

    });
</script>
<!-- End Chart 1 -->

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
        "dataProvider": [{
            "year": "TK",
            "tanggung_jawab": <?php echo !empty($tanggungJawabTK[0]->total_tanggung_jawab_tk) ? (($tanggungJawabTK[0]->total_tanggung_jawab_tk / $tanggungJawabTK[0]->total_tk) * 100) : 0; ?>,
            "disiplin": <?php echo !empty($disiplinTK[0]->total_disiplin_tk) ? (($disiplinTK[0]->total_disiplin_tk / $disiplinTK[0]->total_tk) * 100) : 0; ?>,
            "kepemimpinan": <?php echo !empty($kepemimpinanTK[0]->total_kepemimpinan_tk) ? (($kepemimpinanTK[0]->total_kepemimpinan_tk / $kepemimpinanTK[0]->total_tk) * 100) : 0; ?>,
            "sopan_santun": <?php echo !empty($sopanSantunTK[0]->total_sopansantun_tk) ? (($sopanSantunTK[0]->total_sopansantun_tk / $sopanSantunTK[0]->total_tk) * 100)  : 0; ?>,
            "kejujuran": <?php echo !empty($kejujuranTK[0]->total_kejujuran_tk) ? (($kejujuranTK[0]->total_kejujuran_tk / $kejujuranTK[0]->total_tk) * 100) : 0; ?>,
        }, {
            "year": "SD",
            "tanggung_jawab": <?php echo !empty($tanggungJawabSD[0]->total_tanggung_jawab_sd) ? (($tanggungJawabSD[0]->total_tanggung_jawab_sd / $tanggungJawabSD[0]->total_sd) * 100) : 0; ?>,
            "disiplin": <?php echo !empty($disiplinSD[0]->total_disiplin_sd) ? (($disiplinSD[0]->total_disiplin_sd / $disiplinSD[0]->total_sd) * 100) : 0; ?>,
            "kepemimpinan": <?php echo !empty($kepemimpinanSD[0]->total_kepemimpinan_sd) ? (($kepemimpinanSD[0]->total_kepemimpinan_sd / $kepemimpinanSD[0]->total_sd) * 100) : 0; ?>,
            "sopan_santun": <?php echo !empty($sopanSantunSD[0]->total_sopansantun_sd) ? (($sopanSantunSD[0]->total_sopansantun_sd / $sopanSantunSD[0]->total_sd) * 100) : 0; ?>,
            "kejujuran": <?php echo !empty($kejujuranSD[0]->total_kejujuran_sd) ? (($kejujuranSD[0]->total_kejujuran_sd / $kejujuranSD[0]->total_sd) * 100) : 0; ?>,
        }, {
            "year": "SMP",
            "tanggung_jawab": <?php echo !empty($tanggungJawabSMP[0]->total_tanggung_jawab_smp) ?  (($tanggungJawabSMP[0]->total_tanggung_jawab_smp / $tanggungJawabSMP[0]->total_smp) * 100) : 0; ?>,
            "disiplin": <?php echo !empty($disiplinSMP[0]->total_disiplin_smp) ?  (($disiplinSMP[0]->total_disiplin_smp / $disiplinSMP[0]->total_smp) * 100) : 0; ?>,
            "kepemimpinan": <?php echo !empty($kepemimpinanSMP[0]->total_kepemimpinan_smp) ?  (($kepemimpinanSMP[0]->total_kepemimpinan_smp / $kepemimpinanSMP[0]->total_smp) * 100) : 0; ?>,
            "sopan_santun": <?php echo !empty($sopanSantunSMP[0]->total_sopansantun_smp) ? (($sopanSantunSMP[0]->total_sopansantun_smp / $sopanSantunSMP[0]->total_smp) * 100) : 0; ?>,
            "kejujuran": <?php echo !empty($kejujuranSMP[0]->total_kejujuran_smp) ?  (($kejujuranSMP[0]->total_kejujuran_smp / $kejujuranSMP[0]->total_smp) * 100) : 0; ?>,
        }, ],
        "valueAxes": [{
            "stackType": "regular",
            "axisAlpha": 0,
            "gridAlpha": 0
        }],
        "graphs": [{
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'><?php echo $tanggungJawabTK[0]->tanggungjawab == 1 ? 'Sangat Buruk' : ($tanggungJawabTK[0]->tanggungjawab == 2 ? 'Buruk' : ($tanggungJawabTK[0]->tanggungjawab == 3 ? 'Baik' : ($tanggungJawabTK[0]->tanggungjawab == 4 ? 'Sangat Baik' : ''))) ?>: <b>[[value]] %</b></span>",
            "fillAlphas": 0.8,
            "labelText": "<?php echo $tanggungJawabTK[0]->tanggungjawab == 1 ? 'Sangat Buruk' : ($tanggungJawabTK[0]->tanggungjawab == 2 ? 'Buruk' : ($tanggungJawabTK[0]->tanggungjawab == 3 ? 'Baik' : ($tanggungJawabTK[0]->tanggungjawab == 4 ? 'Sangat Baik' : ''))) ?> : [[value]] %",
            "lineAlpha": 0.3,
            "title": "Tanggung Jawab",
            "type": "column",
            "color": "#000000",
            "valueField": "tanggung_jawab"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'><?php echo $disiplinTK[0]->disiplin == 1 ? 'Sangat Buruk' : ($disiplinTK[0]->disiplin == 2 ? 'Buruk' : ($disiplinTK[0]->disiplin == 3 ? 'Baik' : ($disiplinTK[0]->disiplin == 4 ? 'Sangat Baik' : ''))) ?>: <b>[[value]] %</b></span>",
            "fillAlphas": 0.8,
            "labelText": "<?php echo $disiplinTK[0]->disiplin == 1 ? 'Sangat Buruk' : ($disiplinTK[0]->disiplin == 2 ? 'Buruk' : ($disiplinTK[0]->disiplin == 3 ? 'Baik' : ($disiplinTK[0]->disiplin == 4 ? 'Sangat Baik' : ''))) ?> : [[value]] %",
            "lineAlpha": 0.3,
            "title": "Disiplin",
            "type": "column",
            "color": "#000000",
            "valueField": "disiplin"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'><?php echo $kepemimpinanTK[0]->kepemimpinan == 1 ? 'Sangat Buruk' : ($kepemimpinanTK[0]->kepemimpinan == 2 ? 'Buruk' : ($kepemimpinanTK[0]->kepemimpinan == 3 ? 'Baik' : ($kepemimpinanTK[0]->kepemimpinan == 4 ? 'Sangat Baik' : ''))) ?>: <b>[[value]] %</b></span>",
            "fillAlphas": 0.8,
            "labelText": "<?php echo $kepemimpinanTK[0]->kepemimpinan == 1 ? 'Sangat Buruk' : ($kepemimpinanTK[0]->kepemimpinan == 2 ? 'Buruk' : ($kepemimpinanTK[0]->kepemimpinan == 3 ? 'Baik' : ($kepemimpinanTK[0]->kepemimpinan == 4 ? 'Sangat Baik' : ''))) ?> : [[value]] %",
            "lineAlpha": 0.3,
            "title": "Kepemimpinan",
            "type": "column",
            "newStack": true,
            "color": "#000000",
            "valueField": "kepemimpinan"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'><?php echo $sopanSantunTK[0]->sopansantun == 1 ? 'Sangat Buruk' : ($sopanSantunTK[0]->sopansantun == 2 ? 'Buruk' : ($sopanSantunTK[0]->sopansantun == 3 ? 'Baik' : ($sopanSantunTK[0]->sopansantun == 4 ? 'Sangat Baik' : ''))) ?>: <b>[[value]] %</b></span>",
            "fillAlphas": 0.8,
            "labelText": "<?php echo $sopanSantunTK[0]->sopansantun == 1 ? 'Sangat Buruk' : ($sopanSantunTK[0]->sopansantun == 2 ? 'Buruk' : ($sopanSantunTK[0]->sopansantun == 3 ? 'Baik' : ($sopanSantunTK[0]->sopansantun == 4 ? 'Sangat Baik' : ''))) ?> : [[value]] %",
            "lineAlpha": 0.3,
            "title": "Sopan Santun",
            "type": "column",
            "color": "#000000",
            "valueField": "sopan_santun"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'><?php echo $kejujuranTK[0]->kejujuran == 1 ? 'Sangat Buruk' : ($kejujuranTK[0]->kejujuran == 2 ? 'Buruk' : ($kejujuranTK[0]->kejujuran == 3 ? 'Baik' : ($kejujuranTK[0]->kejujuran == 4 ? 'Sangat Baik' : ''))) ?>: <b>[[value]] %</b></span>",
            "fillAlphas": 0.8,
            "labelText": "<?php echo $kejujuranTK[0]->kejujuran == 1 ? 'Sangat Buruk' : ($kejujuranTK[0]->kejujuran == 2 ? 'Buruk' : ($kejujuranTK[0]->kejujuran == 3 ? 'Baik' : ($kejujuranTK[0]->kejujuran == 4 ? 'Sangat Baik' : ''))) ?> : [[value]] %",
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
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
            "fillAlphas": 0.8,
            "labelText": "[[value]]",
            "lineAlpha": 0.3,
            "title": "Relevan",
            "type": "column",
            "color": "#000000",
            "valueField": "relevan"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
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
                            <li role="presentation"><a href="#keeratan" class="btn bg-green" data-toggle="tab">Persentase Keeratan Latar Belakang Guru</a></li>
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
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="absen2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="header">
                                            <h5> Perbandingan Absensi(Alpa) dengan Prestasi Keseluruhan </h5>
                                        </div>
                                        <div class="thumbnail">
                                            <?php if (!empty($getPerbandinganPrestasiAbsensi)) { ?>
                                                <div id="chartdiv_bagian_2"></div>
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