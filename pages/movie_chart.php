<?php
if (defined("GELANG") === false) {
    die("Anda tidak boleh mengakses halaman ini secara langsung!");
}
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 fw-bold">Data Movie Chart</h1>
</div>
<p>Grafik data film tahunan</p>
<?php
    $sql="select tahun,count(*) as num from movie group by tahun";
    $result = mysqli_query($koneksi,$sql);

    $labels = [];
    $data = [];

while($row = mysqli_fetch_assoc($result))
{
    $labels[] = $row['tahun'];
    $data[] = $row['num'];
}
?>
<div class="row">
    <div class="col-6">
        <canvas id="myChart" width="400" height="300"></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.1/dist/chart.min.js"></script>
<script>
    
        const data = {
        labels: [<?= implode(',',$labels)?>],
        datasets: [{
            label: 'Jumlah Movie per Tahun',
            data: [<?= implode(',',$data)?>],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
};
    const config = {
        type: 'line',
        data: data,
    };
    const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
