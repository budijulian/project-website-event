
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Dashboard </li>
                        </ol>
                    </nav>

                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <h5>Participant</h5>
                                            </div>
                                            <div id="t_p" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                <h5>Event</h5>
                                            </div>
                                            <div id="t_events" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <h5>Visitor</h5>
                                            </div>
                                            <div id="t_ip" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                <h5>Time</h5>
                                            </div>
                                            <div id="tanggal" style="font-size : 16px" class="h5 mb-0 font-weight-bold text-gray-800">---</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row"> 
                        <div class="col-xl-12 col-md-12 mb-4">
                             <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-xl-12 col-md-12 mb-4">
                             <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                  <form action="<?php echo base_url();?>admin/dashboard/import_csv/" method="post" enctype="multipart/form-data">
                                        <input type="file" name="file"/>
                                        <input type="submit" value="Upload file"/>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                    </div> 

                        
                </div>
                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->

<script>
window.onload = setInterval(function () {

var dataPoints = [];
var dataPoints2 = [];   

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
    exportEnabled: true,
	theme: "light",
	title: {
		text: "Tingkat Jumlah Pengunjung & Peserta"
	},
	axisX: {
		valueFormatString: "MMM YYYY"
	},
	axisY: {
		prefix: "",
		labelFormatter: addSymbols
	},
	toolTip: {
		shared: true
	},
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [
	{
		type: "column",
		name: "Pengunjung",
		showInLegend: true,
		xValueFormatString: "MMMM YYYY",
		yValueFormatString: "#,##0",
		dataPoints: dataPoints
	},
	{
		type: "area",
		name: "Peserta",
		markerBorderColor: "white",
		markerBorderThickness: 2,
		showInLegend: true,
		yValueFormatString: "#,##0",
		dataPoints: dataPoints2
	}]
});

    function addData(data) {
       for (var i = 0; i < data.length; i++) {
                dataPoints.push({
                    x: new Date(data[i].tahun, (parseInt(data[i].bulan)-1)),
                    y: parseInt(data[i].c_pengunjung)
                });
            }
    chart.render();   
    }
    function addData2(data2) {
       for (var i = 0; i < data2.length; i++) {
                dataPoints2.push({
                    x: new Date(data2[i].tahun, (parseInt(data2[i].bulan)-1)),
                    y: parseInt(data2[i].c_peserta)
                });
            }
    chart.render();   
    }

// { x: new Date(2016, 3), y: 70000, indexLabel: "High Renewals" },
function addSymbols(e) {
	var suffixes = ["", "K", "M", "B"];
	var order = Math.max(Math.floor(Math.log(e.value) / Math.log(1000)), 0);

	if(order > suffixes.length - 1)                	
		order = suffixes.length - 1;

	var suffix = suffixes[order];      
	return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;
}

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}
    $.getJSON("<?=base_url()?>admin/dashboard/count_pengunjung_perbulan", addData);
    
    $.getJSON("<?=base_url()?>admin/dashboard/count_peserta_perbulan", addData2);
}, 5000);

</script>
<script>
 $(document).ready(function(){
    window.onload = setInterval(function () {
     $.ajax({
                type  : 'ajax',
                url   : '<?=base_url()?>admin/dashboard/count_dashboard',
                async : false,
                dataType : 'json',
                beforeSend: function() {
                    // setting a timeout loading data
                     
                },
                success : function(data){
                    var t_ev = data.t_events;
                    var t_ip = data.t_ip;
                    var t_p = data.t_peserta;
                    for(var i=0; i < t_ev.length; i++){
                        document.getElementById("t_events").innerText = t_ev[i].t_event;
                    }
                    for(var i=0; i < t_ip.length; i++){
                       document.getElementById("t_ip").innerText = t_ip[i].t_ip;
                    }
                    for(var i=0; i < t_p.length; i++){
                       document.getElementById("t_p").innerText = t_p[i].t_p;
                    }
                    
                }
            });
            
        //setting quickCount berupa waktu dan total suara masuk 
		var waktu = new Date();
        // modal data chart voting 
        var months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sept", "Okt", "Nov", "Des"];
        document.getElementById("tanggal").innerHTML = waktu.getDate()+ " "+months[waktu.getMonth()]+ " "+
        waktu.getFullYear()+ " " +waktu.getHours()+ ":"+ waktu.getMinutes()+ ":"+ waktu.getSeconds();
        

    }, 1000);
 });
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
