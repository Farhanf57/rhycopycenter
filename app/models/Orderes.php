<?php

namespace App\Models;

use App\Core\Model;

class Orderes extends Model
{

        public function show()
        { 
                $query = "SELECT * FROM tb_order";
                $stmt = $this->db->prepare($query);
                $stmt->execute();

                return $this->selects($stmt);
        }

        public function save()
        {
                $nama_penerima = $_POST['nama_penerima'];
                $alamat_penerima = $_POST['alamat_penerima'];
                $jumlah_barang = $_POST['jumlah_barang'];
                $jenis_pengiriman= $_POST['jenis_pengiriman'];
                $total_harga = $_POST['total_harga'];

                $sql = "INSERT INTO tb_order
                SET nama_penerima=:nama_penerima, alamat_penerima=:alamat_penerima, jumlah_barang=:jumlah_barang, jenis_pengiriman=:jenis_pengiriman, total_harga=:total_harga";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":nama_penerima", $nama_penerima);
                $stmt->bindParam(":alamat_penerima", $alamat_penerima);
                $stmt->bindParam(":jumlah_barang", $jumlah_barang);
                $stmt->bindParam(":jenis_pengiriman", $jenis_pengiriman);
                $stmt->bindParam(":total_harga", $total_harga);

                $stmt->execute();
        }

        public function edit($id)
        {
                $query = "SELECT * FROM tb_order WHERE id_order=:id_order";
                $stmt = $this->db->prepare($query);

                $stmt->bindParam(":id_order", $id);
                $stmt->execute();

                return $this->select($stmt);
        }

        public function update()
        {
                $id_order = $_POST['id_order'];
                $nama_penerima = $_POST['nama_penerima'];
                $alamat_penerima = $_POST['alamat_penerima'];
                $jumlah_barang = $_POST['jumlah_barang'];
                $jenis_pengiriman = $_POST['jenis_pengiriman'];
                $total_harga = $_POST['total_harga'];
                

                $sql = "UPDATE tb_order
                SET nama_penerima=:nama_penerima, alamat_penerima=:alamat_penerima, jumlah_barang=:jumlah_barang, jenis_pengiriman=:jenis_pengiriman, total_harga=:total_harga
                WHERE id_order=:id_order";

                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":id_order", $id_order);
                $stmt->bindParam(":nama_penerima", $nama_penerima);
                $stmt->bindParam(":alamat_penerima", $alamat_penerima);
                $stmt->bindParam(":jumlah_barang", $jumlah_barang);
                $stmt->bindParam(":jenis_pengiriman", $jenis_pengiriman);
                $stmt->bindParam(":total_harga", $total_harga);

                $stmt->execute();
        }

        public function delete($id)
        {
                $sql = "DELETE FROM tb_order WHERE id_order=:id_order";
                $stmt = $this->db->prepare($sql);

                $stmt->bindParam(":id_order", $id);
                $stmt->execute();
        }
        }
