const flashData = $('.flash-data').data('flashdata');
if(flashData){
    Swal.fire({
        title: 'Success',
        text: flashData,
        icon: 'success',
        timer: 1250
    });
}

const flashGagal = $('.flash-gagal').data('flashdata');
if(flashGagal){
    Swal.fire({
        title: 'Gagal',
        text: flashGagal,
        icon: 'error',
        timer: 2000
    });
}

//tombol hapus
$('.tombol-hapus').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!!'
      }).then((result) => {
        if (result.isConfirmed) {
         document.location.href = href;
        }
      })
});

