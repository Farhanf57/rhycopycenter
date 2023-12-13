<h2>Produks</h2>

<a href="<?php echo URL; ?>/produks/input" class="btn">Input Produk</a>

<table>
      <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>GAMBAR</th>
            <th>DESKRIPSI</th>
            <th>STOK</th>
            <th>HARGA</th>
            <th>RATING</th>
            <th>EDIT</th>
            <th>DELETE</th>
      </tr>

      <?php $no = 1;
      foreach ($data['rows'] as $row) { ?>
            <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['produk_nama']; ?></td>
                  <td><img src="public/img/<?php echo $row['produk_gambar']; ?>" alt="<?php echo $row['produk_gambar']; ?>"></td>
                  <td><?php echo $row['produk_deskripsi']; ?></td>
                  <td><?php echo $row['produk_stok']; ?></td>
                  <td><?php echo $row['produk_harga']; ?></td>
                  <td><?php echo $row['produk_rating']; ?>/5</td>
                  <td><a href="<?php echo URL; ?>/produks/edit/<?php echo $row['produk_id']; ?>" class="btn">Edit</a></td>
                  <td><a href="<?php echo URL; ?>/produks/delete/<?php echo $row['produk_id']; ?>" class="btn" onclick="return confirm('Are you sure?')">Delete</a></td>
            </tr>
      <?php $no++;
      } ?>

</table>