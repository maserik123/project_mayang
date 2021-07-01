<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="row">
<div class="col-md-6">
<canvas id="myChart" weight="30" height="30"></>
</div>
<div class="col-md-6">
<canvas id="line" weight="30" height="30"></canvas>
</div>

<script>
<?php foreach($queryAbsenTingkatan as $data)
{
  $tingkatan[] = $data->tingkatan;
  $jumlahAbsensi[] = $data->JumlahAbsensi;
}
?>

var ctx = document.getElementById('myChart').getContext('2d');
ctx.height = 10;
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      //label sumbu x
        labels: <?php echo json_encode($tingkatan);?>,
        datasets: [{
            label: 'Absensi',
            data: <?php echo json_encode($jumlahAbsensi);?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

//prestasi akademik dan non akademik

<?php foreach($queryJenisPrestasi as $data2)
{
  $tingkatann[] = $data2->TKT;
  $kategori[] = $data2->kategori;
}
?>

var ctx = document.getElementById('line').getContext('2d');
ctx.height = 10;
var line = new Chart(ctx, {
    type:'bar',
    data: {
      //label sumbu x
        labels: <?php echo json_encode($kategori);?>,
        datasets: [{
            label: 'Kategori',
            data: <?php echo json_encode($tingkatann);?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>