<h2>Edit Customer</h2>

<form action="<?php echo URL; ?>/customers/update" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $data['row']['customer_id']; ?>">
    <table>
        <tr>
            <td>USERNAME</td>
            <td><input type="text" name="username" value="<?php echo $data['row']['customer_username']; ?>" required></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td><input type="text" name="nama" value="<?php echo $data['row']['customer_nama']; ?>" required></td>
        </tr>
        <tr>
        <td>GAMBAR</td>
        <td>
            <input type="hidden" name="namaGambar" value="<?php echo $data['row']['customer_gambar']; ?>">
            <input type="file" name="gambar" id="fileInput" accept=".jpg, .jpeg, .png, .gif">
        </tr>
        <tr>
            <td>EMAIL</td>
            <td><input type="email" name="email" value="<?php echo $data['row']['customer_email']; ?>" required></td>
        </tr>
        <tr>
            <td>PASSWORD</td>
            <td><input type="password" name="password"required></td>
        </tr>
        <tr>
            <td>PHONE</td>
            <td><input type="number" name="phone" value="<?php echo $data['row']['customer_phone']; ?>" required></td>
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