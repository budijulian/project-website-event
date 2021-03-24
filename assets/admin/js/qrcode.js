// membuka camera
function OpenCamera() {

	var scanner = new Instascan.Scanner({
		video: document.getElementById('preview'),
		scanPeriod: 5,
		mirror: false
	});
	scanner.addListener('scan', function (content) {
		// add value database withcode php
		if (content != "") {
			alert("Anda Berhasil Absen");
			window.location = 'http://localhost/labbl/';
			// document.getElementById("text").innerHTML = content;
		} else {
			alert("Scan Ulang lagi");
		}
		//window.location.href=content;
	});
	Instascan.Camera.getCameras().then(function (cameras) {
		if (cameras.length > 0) {
			scanner.start(cameras[0]);
			$('[name="options"]').on('change', function () {
				if ($(this).val() == 1) {
					if (cameras[0] != "") {
						scanner.start(cameras[0]);
					} else {
						alert('No Front camera found!');
					}
				} else if ($(this).val() == 2) {
					if (cameras[1] != "") {
						scanner.start(cameras[1]);
					} else {
						alert('No Back camera found!');
					}
				}
			});
		} else {
			console.error('No cameras found.');
			alert('No cameras found.');
		}
	}).catch(function (e) {
		console.error(e);
		alert("Mulai Scan ?");
	});
}

function CloseCamera() {

	try {
		var scanner = new Instascan.Scanner({
			video: document.getElementById('preview'),
			scanPeriod: 5,
			mirror: false
		});
		scanner.destroy();
		scanner.hideCamera();
		this.scanner.stop(this.camera);
		_this.hideCamera();

	} catch (error) {}
}
