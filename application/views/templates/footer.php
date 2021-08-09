   <!-- Jquery Core Js -->
   <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

   <!-- Bootstrap Core Js -->
   <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

   <!-- Select Plugin Js -->
   <script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

   <!-- Slimscroll Plugin Js -->
   <script src="<?php echo base_url() ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

   <!-- Waves Effect Plugin Js -->
   <script src="<?php echo base_url() ?>assets/plugins/node-waves/waves.js"></script>

   <!-- Jquery CountTo Plugin Js -->
   <script src="<?php echo base_url() ?>assets/plugins/jquery-countto/jquery.countTo.js"></script>

   <!-- Morris Plugin Js -->
   <script src="<?php echo base_url() ?>assets/plugins/raphael/raphael.min.js"></script>
   <script src="<?php echo base_url() ?>assets/plugins/morrisjs/morris.js"></script>

   <!-- ChartJs -->
   <script src="<?php echo base_url() ?>assets/plugins/chartjs/Chart.bundle.js"></script>
   <script src="<?php echo base_url() . 'assets/' ?>plugins/sweetalert/sweetalert.min.js"></script>
   <!-- Flot Charts Plugin Js -->
   <script src="<?php echo base_url() ?>assets/plugins/flot-charts/jquery.flot.js"></script>
   <script src="<?php echo base_url() ?>assets/plugins/flot-charts/jquery.flot.resize.js"></script>
   <script src="<?php echo base_url() ?>assets/plugins/flot-charts/jquery.flot.pie.js"></script>
   <script src="<?php echo base_url() ?>assets/plugins/flot-charts/jquery.flot.categories.js"></script>
   <script src="<?php echo base_url() ?>assets/plugins/flot-charts/jquery.flot.time.js"></script>

   <!-- Sparkline Chart Plugin Js -->
   <script src="<?php echo base_url() ?>assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

   <!-- Custom Js -->
   <script src="<?php echo base_url() ?>assets/js/admin.js"></script>
   <script src="<?php echo base_url() ?>assets/js/pages/index.js"></script>

   <!-- Demo Js -->
   <script src="<?php echo base_url() ?>assets/js/demo.js"></script>


   </body>

   <script>
     // Create the chart
     Highcharts.chart('container', {
       chart: {
         type: 'column'
       },
       title: {
         text: 'Browser market shares. January, 2018'
       },
       subtitle: {
         text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
       },
       accessibility: {
         announceNewData: {
           enabled: true
         }
       },
       xAxis: {
         type: 'category'
       },
       yAxis: {
         title: {
           text: 'Total percent market share'
         }

       },
       legend: {
         enabled: false
       },
       plotOptions: {
         series: {
           borderWidth: 0,
           dataLabels: {
             enabled: true,
             format: '{point.y:.1f}%'
           }
         }
       },

       tooltip: {
         headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
         pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
       },

       series: [{
         name: "Browsers",
         colorByPoint: true,
         data: [{
           name: "Chrome",
           y: 62.74,
           drilldown: "Chrome"
         }]
       }]
     });
   </script>