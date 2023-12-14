<h2>Input Order</h2>

<form action="<?php echo URL; ?>/orders/save" method="post">
    <table>
        <tr>
            <td>NAMA PENERIMA</td>
            <td><input type="text" name="nama_penerima" required></td>
        </tr>
        <tr>
            <td>ALAMAT PENERIMA</td>
            <td><input type="text" name="alamat_penerima" required></td>
        </tr>
        <tr>
            <td>JUMLAH BARANG</td>
            <td><input type="text" name="jumlah_barang" required></td>
        </tr>
        <tr>
            <td>JENIS PENGIRIMAN</td>
            <td><input type="text" name="jenis_pengiriman" required></td>
        </tr>
        <tr>
            <td>TOTAL HARGA</td>
            <td><input type="text" name="total_harga" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn_save" value="SAVE"></td>
        </tr>
    </table>
</form>