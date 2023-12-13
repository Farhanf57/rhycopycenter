<h2>Input Produk</h2>

<form action="<?php echo URL; ?>/produks/save" method="post" enctype="multipart/form-data">
    <table>
    <tr>
            <td>NAMA</td>
            <td><input type="text" name="nama" required></td>
        </tr>
        <tr>
        <td>GAMBAR</td>
        <td><input type="file" name="gambar" id="fileInput" accept=".jpg, .jpeg, .png, .gif" required></td>
        </tr>
        <tr>
            <td>DESKRIPSI</td>
            <td><textarea name="deskripsi" id="" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td>STOK</td>
            <td><input type="number" name="stok" required></td>
        </tr>
        <tr>
            <td>HARGA</td>
            <td><input type="number" name="harga" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn_save" value="SAVE"></td>
        </tr>
    </table>
</form>

<script>
document.getElementById('fileInput').addEventListener('change', function() {
    var fileInput = this;
    var allowedExtensions = ['jpg', 'jpeg', 'png'];
    var maxSizeInBytes = 2 * 1024 * 1024; // 2 MB

    if (fileInput.files.length > 0) {
        var fileName = fileInput.files[0].name;
        var fileSize = fileInput.files[0].size;
        var fileExtension = fileName.split('.').pop().toLowerCase();

        // Validasi ekstensi file
        if (!allowedExtensions.includes(fileExtension)) {
            alert('Jenis file tidak diizinkan.');
            fileInput.value = ''; // Menghapus pilihan file
            return;
        }

        // Validasi ukuran file
        if (fileSize > maxSizeInBytes) {
            alert('Ukuran file melebihi batas yang diizinkan.');
            fileInput.value = ''; // Menghapus pilihan file
            return;
        }

        // Lanjutkan dengan proses yang diinginkan, misalnya, mengirim file ke server
        // (Anda dapat menggunakan AJAX atau mengisi formulir untuk mengirim file ke server)
        console.log('File valid:', fileName, fileSize, fileExtension);
    }
});
</script>