<div class="container mt-7">
    <div class="row">
        <div class="col-md-6">
            <h2>Data Mahasiswa</h2>
            <div class="card">
                <div class="card-body">
                <?php
                foreach ($peserta as $peserta) :?>
                    <h5 class="card-title">Nama Mahasiswa</h5>
                    <p class="card-text" id="nama"><?php echo $peserta->nama ?></p>
                    
                    <h5 class="card-title">NPM</h5>
                    <p class="card-text" id="npm"><?php echo $peserta->npm ?></p>
                    
                    <h5 class="card-title">Fakultas</h5>
                    <p class="card-text" id="fakultas"><?php echo $peserta->nama_fakultas ?></p>
                    
                    <h5 class="card-title">Program Studi</h5>
                    <p class="card-text" id="prodi"><?php echo $peserta->nama_prodi ?></p>
                    
                    <h5 class="card-title">Jumlah Pengulangan Ujian</h5>
                    <p class="card-text" id="jumlah_pengulangan"><?php echo $pengulangan ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>Peningkatan Hasil Ujian</h2>
            <div id="chartContainer"></div>
        </div>
    </div>

    <div class="don col-md-6">
        <h2>Hasil Setiap Ujian</h2>
        <div class="con d-flex">
            <?php $no = 1;
                for($i = 1; $i <= $pengulangan;$i++) :?>
            <div id="donutchart<?php echo $no++ ?>" style="height: 300px; width: 100%;"></div>
            <?php endfor; ?>
        </div>
    </div>
</div>

<?php 
$dataPoints = array();
$data = array();
$no = 1;
foreach($score as $score){
    $data[] = array("sec1" => $score->sec1 , "sec2" => $score->sec2 , "sec3" => $score->sec3);
    $dataPoints[] = array("x" => $no, "y" => $score->score, "label" => "ujian ke-" . $no++, );
}
?>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script type="text/javascript">

window.onload = function () {
    <?php echo "var dataPoints = " . json_encode($dataPoints, JSON_NUMERIC_CHECK) . ";"; ?>
    var chart = new CanvasJS.Chart("chartContainer",
    {
        title:{
            text: "Peningkatan Ujian"    
        },
        axisY: {
            title: "Rata - rata Score"
        },
        legend: {
            verticalAlign: "bottom",
            horizontalAlign: "center"
        },
        data: [

        {        
            color: "#B0D0B0",
            type: "column",  
            showInLegend: true, 
            legendMarkerType: "none",
            legendText: "Hasil Ujian",
            dataPoints: dataPoints
        }
    ]
    });
    chart.render();
    <?php $no = 1;
    foreach($data as $data) :?>
    var chart = new CanvasJS.Chart("donutchart" + <?php echo $no ?>,
    {
        title:{
            text: "Ujian " + <?php echo $no++ ?>,
            fontFamily: "Impact",
            fontWeight: "normal"
        },

        legend:{
            verticalAlign: "bottom",
            horizontalAlign: "center"
        },
        data: [
            {
                //startAngle: 45,
                indexLabelFontSize: 20,
                indexLabelFontFamily: "Garamond",
                indexLabelFontColor: "darkgrey",
                indexLabelLineColor: "darkgrey",
                indexLabelPlacement: "outside",
                type: "doughnut",
                showInLegend: true,
                dataPoints: [
                    {  y: <?php echo $data['sec1'] ?>, legendText:"Section 1", indexLabel: "<?php echo $data['sec1'] ?>" },
                    {  y: <?php echo $data['sec2'] ?>, legendText:"Section 2", indexLabel: "<?php echo $data['sec2'] ?>" },
                    {  y: <?php echo $data['sec3'] ?>, legendText:"Section 3", indexLabel: "<?php echo $data['sec3'] ?>" },
                ]
            }
        ]
    });

    chart.render();
    <?php endforeach; ?>
}

</script>

<style>
    .chartujian {
        margin-top: 100px;
    }

    #chartContainer {
        height: 300px;
        margin: auto;
    }

    #donutchart {
        height: 300px; 
        width: 100%;
    }

    .don {
        width: 100%;
    }
</style>