(function( window ) {

    var uploadField = document.getElementById("file_bukti");
    uploadField.onchange = function() {
        if(this.files[0].size > 2000000){
            toastr.error('Maaf Ambil File Gagal, Maksimal Ukuran File Bukti Adalah 2 MB')
           this.value = "";
        };
        var ext = this.value.match(/\.([^\.]+)$/)[1];
        switch (ext) {
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'bmp':
          break;
        default:
            toastr.error('Maaf, Format yang diizinkan hanya jpg , jpeg , png , bmp')
           this.value = "";
        }
    };

    var uploadField = document.getElementById("file_akte");
    uploadField.onchange = function() {
        if(this.files[0].size > 2000000){
            toastr.error('Maaf Ambil File Gagal, Maksimal Ukuran File Akte Adalah 2 MB')
           this.value = "";
        };
        var ext = this.value.match(/\.([^\.]+)$/)[1];
        switch (ext) {
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'bmp':
          break;
        default:
            toastr.error('Maaf, Format yang diizinkan hanya jpg , jpeg , png , bmp')
           this.value = "";
        }
    };

    var uploadField = document.getElementById("file_kk");
    uploadField.onchange = function() {
        if(this.files[0].size > 2000000){
            toastr.error('Maaf Ambil File Gagal, Maksimal Ukuran File KK Adalah 2 MB')
           this.value = "";
        };
        var ext = this.value.match(/\.([^\.]+)$/)[1];
        switch (ext) {
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'bmp':
          break;
        default:
            toastr.error('Maaf, Format yang diizinkan hanya jpg , jpeg , png , bmp')
           this.value = "";
        }
    };

    var uploadField = document.getElementById("file_skl");
    uploadField.onchange = function() {
        if(this.files[0].size > 2000000){
            toastr.error('Maaf Ambil File Gagal, Maksimal Ukuran File SKL Adalah 2 MB')
           this.value = "";
        };
        var ext = this.value.match(/\.([^\.]+)$/)[1];
        switch (ext) {
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'bmp':
          break;
        default:
            toastr.error('Maaf, Format yang diizinkan hanya jpg , jpeg , png , bmp')
           this.value = "";
        }
    };

})();