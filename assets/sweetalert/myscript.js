const flashData = $('.flash-data').data('flashdata');

if (flashData == true) {
    Swal ({
        title : 'Data Gedung',
        text : 'Berhasil' + flashData,
        type : 'success'
    });
}