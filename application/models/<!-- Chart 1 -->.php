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
            "tanggung_jawab": <?php echo !empty($tanggungJawabTK[0]->total_tanggung_jawab_tk) ? (($tanggungJawabTK[0]->total_tanggung_jawab_tk / $tanggungJawab_TK[0]->total_tk) * 100) : 0; ?>,
            "disiplin": <?php echo !empty($disiplinTK[0]->total_disiplin_tk) ? (($disiplinTK[0]->total_disiplin_tk / $disiplin_TK[0]->total_tk) * 100) : 0; ?>,
            "kepemimpinan": <?php echo !empty($kepemimpinanTK[0]->total_kepemimpinan_tk) ? (($kepemimpinanTK[0]->total_kepemimpinan_tk / $kepemimpinan_TK[0]->total_tk) * 100) : 0; ?>,
            "sopan_santun": <?php echo !empty($sopanSantunTK[0]->total_sopansantun_tk) ? (($sopanSantunTK[0]->total_sopansantun_tk / $sopanSantun_TK[0]->total_tk) * 100)  : 0; ?>,
            "kejujuran": <?php echo !empty($kejujuranTK[0]->total_kejujuran_tk) ? (($kejujuranTK[0]->total_kejujuran_tk / $kejujuran_TK[0]->total_tk) * 100) : 0; ?>,
        }, {
            "year": "SD",
            "tanggung_jawab": <?php echo !empty($tanggungJawabSD[0]->total_tanggung_jawab_sd) ? (($tanggungJawabSD[0]->total_tanggung_jawab_sd / $tanggungJawab_SD[0]->total_sd) * 100) : 0; ?>,
            "disiplin": <?php echo !empty($disiplinSD[0]->total_disiplin_sd) ? (($disiplinSD[0]->total_disiplin_sd / $disiplin_SD[0]->total_sd) * 100) : 0; ?>,
            "kepemimpinan": <?php echo !empty($kepemimpinanSD[0]->total_kepemimpinan_sd) ? (($kepemimpinanSD[0]->total_kepemimpinan_sd / $kepemimpinan_SD[0]->total_sd) * 100) : 0; ?>,
            "sopan_santun": <?php echo !empty($sopanSantunSD[0]->total_sopansantun_sd) ? (($sopanSantunSD[0]->total_sopansantun_sd / $sopanSantun_SD[0]->total_sd) * 100) : 0; ?>,
            "kejujuran": <?php echo !empty($kejujuranSD[0]->total_kejujuran_sd) ? (($kejujuranSD[0]->total_kejujuran_sd / $kejujuran_SD[0]->total_sd) * 100) : 0; ?>,
        }, {
            "year": "SMP",
            "tanggung_jawab": <?php echo !empty($tanggungJawabSMP[0]->total_tanggung_jawab_smp) ?  (($tanggungJawabSMP[0]->total_tanggung_jawab_smp / $tanggungJawab_SMP[0]->total_smp) * 100) : 0; ?>,
            "disiplin": <?php echo !empty($disiplinSMP[0]->total_disiplin_smp) ?  (($disiplinSMP[0]->total_disiplin_smp / $disiplin_SMP[0]->total_smp) * 100) : 0; ?>,
            "kepemimpinan": <?php echo !empty($kepemimpinanSMP[0]->total_kepemimpinan_smp) ?  (($kepemimpinanSMP[0]->total_kepemimpinan_smp / $kepemimpinan_SMP[0]->total_smp) * 100) : 0; ?>,
            "sopan_santun": <?php echo !empty($sopanSantunSMP[0]->total_sopansantun_smp) ? (($sopanSantunSMP[0]->total_sopansantun_smp / $sopanSantun_SMP[0]->total_smp) * 100) : 0; ?>,
            "kejujuran": <?php echo !empty($kejujuranSMP[0]->total_kejujuran_smp) ?  (($kejujuranSMP[0]->total_kejujuran_smp / $kejujuran_SMP[0]->total_smp) * 100) : 0; ?>,
        }, ],
        "valueAxes": [{
            "stackType": "regular",
            "axisAlpha": 0,
            "gridAlpha": 0
        }],
        "graphs": [{
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'><?php echo $tanggungJawabTK[0]->tanggungjawab == 1 ? 'Sangat Buruk' : ($tanggungJawabTK[0]->tanggungjawab == 2 ? 'Buruk' : ($tanggungJawabTK[0]->tanggungjawab == 3 ? 'Baik' : ($tanggungJawabTK[0]->tanggungjawab == 4 ? 'Sangat Baik' : ''))) ?>: <b>[[value]] %</b></span>",
            "fillAlphas": 0.8,
            "labelText": "<?php echo $tanggungJawabTK[0]->tanggungjawab == 1 ? 'Sangat Buruk' : ($tanggungJawabTK[0]->tanggungjawab == 2 ? 'Buruk' : ($tanggungJawabTK[0]->tanggungjawab == 3 ? 'Baik' : ($tanggungJawabTK[0]->tanggungjawab == 4 ? 'Sangat Baik' : ''))) ?> : <br> [[value]] %",
            "lineAlpha": 0.3,
            "title": "Tanggung Jawab",
            "type": "column",
            "color": "#000000",
            "valueField": "tanggung_jawab"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'><?php echo $disiplinTK[0]->disiplin == 1 ? 'Sangat Buruk' : ($disiplinTK[0]->disiplin == 2 ? 'Buruk' : ($disiplinTK[0]->disiplin == 3 ? 'Baik' : ($disiplinTK[0]->disiplin == 4 ? 'Sangat Baik' : ''))) ?>: <b>[[value]] %</b></span>",
            "fillAlphas": 0.8,
            "labelText": "<?php echo $disiplinTK[0]->disiplin == 1 ? 'Sangat Buruk' : ($disiplinTK[0]->disiplin == 2 ? 'Buruk' : ($disiplinTK[0]->disiplin == 3 ? 'Baik' : ($disiplinTK[0]->disiplin == 4 ? 'Sangat Baik' : ''))) ?> : <br> [[value]] %",
            "lineAlpha": 0.3,
            "title": "Disiplin",
            "type": "column",
            "color": "#000000",
            "valueField": "disiplin"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'><?php echo $kepemimpinanTK[0]->kepemimpinan == 1 ? 'Sangat Buruk' : ($kepemimpinanTK[0]->kepemimpinan == 2 ? 'Buruk' : ($kepemimpinanTK[0]->kepemimpinan == 3 ? 'Baik' : ($kepemimpinanTK[0]->kepemimpinan == 4 ? 'Sangat Baik' : ''))) ?>: <b>[[value]] %</b></span>",
            "fillAlphas": 0.8,
            "labelText": "<?php echo $kepemimpinanTK[0]->kepemimpinan == 1 ? 'Sangat Buruk' : ($kepemimpinanTK[0]->kepemimpinan == 2 ? 'Buruk' : ($kepemimpinanTK[0]->kepemimpinan == 3 ? 'Baik' : ($kepemimpinanTK[0]->kepemimpinan == 4 ? 'Sangat Baik' : ''))) ?> : <br> [[value]] %",
            "lineAlpha": 0.3,
            "title": "Kepemimpinan",
            "type": "column",
            "newStack": true,
            "color": "#000000",
            "valueField": "kepemimpinan"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'><?php echo $sopanSantunTK[0]->sopansantun == 1 ? 'Sangat Buruk' : ($sopanSantunTK[0]->sopansantun == 2 ? 'Buruk' : ($sopanSantunTK[0]->sopansantun == 3 ? 'Baik' : ($sopanSantunTK[0]->sopansantun == 4 ? 'Sangat Baik' : ''))) ?>: <b>[[value]] %</b></span>",
            "fillAlphas": 0.8,
            "labelText": "<?php echo $sopanSantunTK[0]->sopansantun == 1 ? 'Sangat Buruk' : ($sopanSantunTK[0]->sopansantun == 2 ? 'Buruk' : ($sopanSantunTK[0]->sopansantun == 3 ? 'Baik' : ($sopanSantunTK[0]->sopansantun == 4 ? 'Sangat Baik' : ''))) ?> : <br> [[value]] %",
            "lineAlpha": 0.3,
            "title": "Sopan Santun",
            "type": "column",
            "color": "#000000",
            "valueField": "sopan_santun"
        }, {
            "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'><?php echo $kejujuranTK[0]->kejujuran == 1 ? 'Sangat Buruk' : ($kejujuranTK[0]->kejujuran == 2 ? 'Buruk' : ($kejujuranTK[0]->kejujuran == 3 ? 'Baik' : ($kejujuranTK[0]->kejujuran == 4 ? 'Sangat Baik' : ''))) ?>: <b>[[value]] %</b></span>",
            "fillAlphas": 0.8,
            "labelText": "<?php echo $kejujuranTK[0]->kejujuran == 1 ? 'Sangat Buruk' : ($kejujuranTK[0]->kejujuran == 2 ? 'Buruk' : ($kejujuranTK[0]->kejujuran == 3 ? 'Baik' : ($kejujuranTK[0]->kejujuran == 4 ? 'Sangat Baik' : ''))) ?> : <br> [[value]] %",
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
