<h2>Order</h2>

<a href="<?php echo URL; ?>/orders/input" class="btn">Input Order</a>

<table>
      <tr>
            <th>NO</th>
            <th>NAMA PENERIMA</th>
            <th>ALAMAT PENERIMA</th>
            <th>JUMLAH BARANG</th>
            <th>JENIS PENGIRIMAN</th>
            <th>TOTAL HARGA</th>
            <th>EDIT</th>
            <th>DELETE</th>
      </tr>

      <?php $no = 1;
      foreach ($data['rows'] as $row) { ?>
            <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['nama_penerima']; ?></td>
                  <td><?php echo $row['alamat_penerima']; ?></td>
                  <td><?php echo $row['jumlah_barang']; ?></td>
                  <td><?php echo $row['jenis_pengiriman']; ?></td>
                  <td><?php echo $row['total_harga']; ?></td>
                  <td><a href="<?php echo URL; ?>/orders/edit/<?php echo $row['id_order']; ?>" class="btn">Edit</a></td>
                  <td><a href="<?php echo URL; ?>/orders/delete/<?php echo $row['id_order']; ?>" class="btn" onclick="return confirm('Are you sure?')">Delete</a></td>
            </tr>
      <?php $no++;
      } ?>

</table>