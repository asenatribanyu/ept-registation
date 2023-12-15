<div class="container mt-7">
    <div class="row">
        <div class="col-md-6">
            <h2>Data Mahasiswa</h2>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nama Mahasiswa</h5>
                    <p class="card-text" id="nama">Muhammad Gilang Ariyana</p>
                    
                    <h5 class="card-title">NPM</h5>
                    <p class="card-text" id="npm">0620101021</p>
                    
                    <h5 class="card-title">Fakultas</h5>
                    <p class="card-text" id="fakultas">Teknik</p>
                    
                    <h5 class="card-title">Program Studi</h5>
                    <p class="card-text" id="prodi">Informatika</p>
                    
                    <h5 class="card-title">Jumlah Pengulangan Ujian</h5>
                    <p class="card-text" id="jumlah_pengulangan">5</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>Peningkatan Hasil Ujian</h2>
            <div id="chartContainer"></div>
        </div>
    </div>

    <div class="col-md-6">
        <h2>Hasil Setiap Ujian</h2>
        <div id="donutchart" style="height: 300px; width: 100%;"></div>
    </div>
</div>


<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script type="text/javascript">

window.onload = function () {
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
            dataPoints: [      
            { x: 1, y: 423, label: "Ujian 1"},
            { x: 2, y: 410, label: "Ujian 2" },
            { x: 3, y: 417, label: "Ujian 3"},
            { x: 4, y: 430, label: "Ujian 4"},
            { x: 5, y: 400, label: "Ujian 5"},
            ]
        }
    ]
    });
    chart.render();

    var chart = new CanvasJS.Chart("donutchart",
    {
        title:{
        text: "Ujian 1",
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
        {  y: 50, legendText:"Section 1", indexLabel: "Section 1" },
        {  y: 50, legendText:"Section 2", indexLabel: "Section 2" },
        {  y: 50, legendText:"Section 3", indexLabel: "Section 3" },
        ]
        }
        ]
    });

    chart.render();
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
</style>