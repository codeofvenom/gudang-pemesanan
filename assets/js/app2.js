// Tombol konfirmasi.
$(".tombol-konfirmasi").click(function() {
    var pesan = $(this).attr('data-confirm');

    if (confirm(pesan)) {
        return true;
    }
    return false;
});

// Alert box.
$( ".alert" ).delay(3000).fadeOut(500);

// Auto refesh untuk halaman yang menjalankan proses secara otomatis.
function autoRefresh()
{
   window.location.reload();
}

// Datetime Time Picker.
$('.waktu').datetimepicker({
    // Date format.
    yearRange: '2016:+0',
    dateFormat: "yy-mm-dd",

    // Time format.
    timeInput: true,
    timeFormat: "HH:mm"
});