<h2>Edit Produk</h2>

<form action="<?php echo URL; ?>/produks/update" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $data['row']['produk_id']; ?>">
    <table>
        <tr>
            <td>NAMA</td>
            <td><input type="text" name="nama" value="<?php echo $data['row']['produk_nama']; ?>" required></td>
        </tr>
        <tr>
        <td>GAMBAR</td>
        <td>
            <input type="hidden" name="namaGambar" value="<?php echo $data['row']['produk_gambar']; ?>">
            <input type="file" name="gambar" id="fileInput" accept=".jpg, .jpeg, .png, .gif">
        </tr>
        <tr>
            <td>DESKRIPSI</td>
            <td><textarea name="deskripsi" id="" cols="30" rows="10"><?php echo $data['row']['produk_deskripsi']; ?></textarea></td>
        </tr>
        <tr>
            <td>STOK</td>
            <td><input type="number" name="stok" value="<?php echo $data['row']['produk_stok']; ?>" required></td>
        </tr>
        <tr>
            <td>HARGA</td>
            <td><input type="number" name="harga" value="<?php echo $data['row']['produk_harga']; ?>" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn_update" value="UPDATE"></td>
        </tr>
    </table>
</form>

<script>
document.getElementById('fileInput').addEventListener('change', function() {
    var fileInput = this;
    var allowedExtensions = ['jpg', 'jpeg', 'png'];
    var maxSizeInBytes = 2 * 1024 * 1024;

    if (fileInput.files.length > 0) {
        var fileName = fileInput.files[0].name;
        var fileSize = fileInput.files[0].size;
        var fileExtension = fileName.split('.').pop().toLowerCase();

        if (!allowedExtensions.includes(fileExtension)) {
            alert('Jenis file tidak diizinkan.');
            fileInput.value = '';
            return;
        }

        if (fileSize > maxSizeInBytes) {
            alert('Ukuran file melebihi batas yang diizinkan.');
            fileInput.value = '';
            return;
        }

        console.log('File valid:', fileName, fileSize, fileExtension);
    }
});
</script>