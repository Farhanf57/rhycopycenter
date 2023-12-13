<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class Produk extends Model
{

      public function show()
      {
            $query = "SELECT * FROM tb_produks";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            return $this->selects($stmt);
      }

      public function save()
      {
            $nama = $_POST['nama'];
            $gambar = $_FILES['gambar'];
            $deskripsi = $_POST['deskripsi'];
            $stok = $_POST['stok'];
            $harga = $_POST['harga'];
            
            $uploadDir = 'public/img/';
            $gambarName = uniqid() . '_' . $gambar['name'];
            $gambarPath = $uploadDir . $gambarName;
            move_uploaded_file($gambar['tmp_name'], $gambarPath);

            $sql = "INSERT INTO tb_produks
            SET produk_nama=:produk_nama, produk_gambar=:produk_gambar, produk_deskripsi=:produk_deskripsi, produk_stok=:produk_stok, produk_harga=:produk_harga";
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(":produk_nama", $nama);
            $stmt->bindParam(":produk_gambar", $gambarName);
            $stmt->bindParam(":produk_deskripsi", $deskripsi);
            $stmt->bindParam(":produk_stok", $stok);
            $stmt->bindParam(":produk_harga", $harga);

            $stmt->execute();
      }

      public function edit($id)
      {
            $query = "SELECT * FROM tb_produks WHERE produk_id=:produk_id";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(":produk_id", $id);
            $stmt->execute();

            return $this->select($stmt);
      }

      public function update()
      {
            $nama = $_POST['nama'];            
            $gambarLama = $_POST['namaGambar'];
            $gambar = $_FILES['gambar'];
            $deskripsi = $_POST['deskripsi'];
            $stok = $_POST['stok'];
            $harga = $_POST['harga'];
            $id = $_POST['id'];
            
            if ($gambar['size'] > 0) {
                  $uploadDir = 'public/img/';
                  $gambarName = uniqid() . '_' . $gambar['name'];
                  $gambarPath = $uploadDir . $gambarName;
                  unlink($uploadDir . $gambarLama);
                  move_uploaded_file($gambar['tmp_name'], $gambarPath);            
            }

            if ($gambar['size'] > 0) {
                  $sql = "UPDATE tb_produks
                        SET produk_nama=:produk_nama, produk_gambar=:produk_gambar, produk_deskripsi=:produk_deskripsi, produk_stok=:produk_stok, produk_harga=:produk_harga
                        WHERE produk_id=:produk_id";
            } else {
                  $sql = "UPDATE tb_produks
                        SET produk_nama=:produk_nama, produk_deskripsi=:produk_deskripsi, produk_stok=:produk_stok, produk_harga=:produk_harga
                        WHERE produk_id=:produk_id";
            }

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(":produk_nama", $nama);
            if ($gambar['size'] > 0) {
                  $stmt->bindParam(":produk_gambar", $gambarName);
            }
            $stmt->bindParam(":produk_deskripsi", $deskripsi);
            $stmt->bindParam(":produk_stok", $stok);
            $stmt->bindParam(":produk_harga", $harga);
            $stmt->bindParam(":produk_id", $id);

            $stmt->execute();
      }

      public function delete($id)
      {
            $sqlSelect = "SELECT produk_gambar FROM tb_produks WHERE produk_id=:produk_id";
            $stmtSelect = $this->db->prepare($sqlSelect);
            $stmtSelect->bindParam(":produk_id", $id);
            $stmtSelect->execute();
            $result = $stmtSelect->fetch(PDO::FETCH_ASSOC);

            $gambarPath = 'public/img/' . $result['produk_gambar'];
            unlink($gambarPath);

            $sqlDelete = "DELETE FROM tb_produks WHERE produk_id=:produk_id";
            $stmtDelete = $this->db->prepare($sqlDelete);
            $stmtDelete->bindParam(":produk_id", $id);
            $stmtDelete->execute();
      }

}