<h2>Edit Order</h2>

<form action="<?php echo URL; ?>/orders/update" method="post">
    <input type="hidden" name="id_order" value="<?php echo $data['row']['id_order']; ?>">
    <table>
    <tr>
            <td>NAMA PENERIMA</td>
            <td><input type="text" name="nama_penerima" value="<?php echo $data['row']['nama_penerima']; ?>" required></td>
        </tr>
        <tr>
            <td>ALAMAT PENERIMA</td>
            <td><input type="text" name="alamat_penerima" value="<?php echo $data['row']['alamat_penerima']; ?>" required></td>
        </tr>
        <tr>
            <td>JUMLAH BARANG</td>
            <td><input type="text" name="jumlah_barang" value="<?php echo $data['row']['jumlah_barang']; ?>" required></td>
        </tr>
        <tr>
            <td>JENIS PENGIRIMAN</td>
            <td><input type="text" name="jenis_pengiriman" value="<?php echo $data['row']['jenis_pengiriman']; ?>" required></td>
        </tr>
        <tr>
            <td>TOTAL HARGA</td>
            <td><input type="text" name="total_harga" value="<?php echo $data['row']['total_harga']; ?>" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn_update" value="UPDATE"></td>
        </tr>
    </table>
</form>