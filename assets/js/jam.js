function startTime() {
	var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
	var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
    var today=new Date(),
			curr_hour=today.getHours(),
			curr_min=today.getMinutes(),
			curr_sec=today.getSeconds();
			var day = today.getDate();
			var month = today.getMonth();
			var thisDay = today.getDay(),
				thisDay = myDays[thisDay];
			var yy = today.getYear();
			var year = (yy < 1000) ? yy + 1900 : yy;
	 curr_hour=checkTime(curr_hour);
		curr_min=checkTime(curr_min);
		curr_sec=checkTime(curr_sec);
	document.getElementById('clock').innerHTML = thisDay + ' ' + day + ' ' + months[month] + ' ' + year+ ' ,' + curr_hour+":"+curr_min+":"+curr_sec;
	}
function checkTime(i) {
    if (i<10) {
			i = "0" + i;
		}
		return i;
	}
	setInterval(startTime, 500);

window.setTimeout(function () {
	$(".alert").fadeTo(6000, 500).slideUp(500, function () {
		$(this).remove();
	});
});
