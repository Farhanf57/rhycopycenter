<h2>Produks</h2>

<a href="<?php echo URL; ?>/customers/input" class="btn">ADD CUSTOMERS</a>

<table>
    <tr>
            <th>NO</th>
            <th>USERNAME</th>
            <th>NAMA</th>
            <th>GAMBAR</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>PHONE</th>
            <th>EDIT</th>
            <th>DELETE</th>
    </tr>

    <?php $no = 1;
    foreach ($data['rows'] as $row) { ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['customer_username']; ?></td>
                <td><?php echo $row['customer_nama']; ?></td>
                <td><img src="public/img/<?php echo $row['customer_gambar']; ?>" alt="<?php echo $row['customer_gambar']; ?>"></td>
                <td><?php echo $row['customer_email']; ?></td>
                <td><?php echo $row['customer_password']; ?></td>
                <td><?php echo $row['customer_phone']; ?></td>
                <td><a href="<?php echo URL; ?>/customers/edit/<?php echo $row['customer_id']; ?>" class="btn">Edit</a></td>
                <td><a href="<?php echo URL; ?>/customers/delete/<?php echo $row['customer_id']; ?>" class="btn" onclick="return confirm('Are you sure?')">Delete</a></td>
            </tr>
    <?php $no++;
    } ?>

</table>