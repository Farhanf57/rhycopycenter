<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class Customer extends Model
{

public function show()
{
            $query = "SELECT * FROM tb_customers";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $this->selects($stmt);
}

public function save()
{
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $gambar = $_FILES['gambar'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];

        $uploadDir = 'public/img/';
        $gambarName = uniqid() . '_' . $gambar['name'];
        $gambarPath = $uploadDir . $gambarName;
        move_uploaded_file($gambar['tmp_name'], $gambarPath);

        $sql = "INSERT INTO tb_customers
        SET customer_username=:customer_username, 
        customer_nama=:customer_nama, 
        customer_gambar=:customer_gambar,  
        customer_email=:customer_email, 
        customer_password=:customer_password,  
        customer_phone=:customer_phone" ;
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":customer_username", $username);
        $stmt->bindParam(":customer_nama", $nama);
        $stmt->bindParam(":customer_gambar", $gambarName);
        $stmt->bindParam(":customer_email", $email);
        $stmt->bindParam(":customer_password", $password);
        $stmt->bindParam(":customer_phone", $phone);

        $stmt->execute();
}

public function edit($id)
{
            $query = "SELECT * FROM tb_customers WHERE customer_id=:customer_id";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":customer_id", $id);
        $stmt->execute();

        return $this->select($stmt);
}

public function update()
{
        $username = $_POST['username'];            
        $nama = $_POST['nama'];
        $gambarLama = $_POST['namaGambar'];
        $gambar = $_FILES['gambar'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $id = $_POST['id'];
        
        if ($gambar['size'] > 0) {
                $uploadDir = 'public/img/';
                $gambarName = uniqid() . '_' . $gambar['name'];
                $gambarPath = $uploadDir . $gambarName;
                 // Periksa apakah file lama ada sebelum dihapus
        if (file_exists($uploadDir . $gambarLama)) {
        unlink($uploadDir . $gambarLama);
        }
                unlink($uploadDir . $gambarLama);
                move_uploaded_file($gambar['tmp_name'], $gambarPath);            
        }

        if ($gambar['size'] > 0) {
                $sql = "UPDATE tb_customers
                SET customer_username=:customer_username,
                customer_nama=:customer_nama, 
                customer_gambar=:customer_gambar,  
                customer_email=:customer_email, 
                customer_password=:customer_password, 
                customer_phone=:customer_phone,
                updated_at = CURRENT_TIMESTAMP
                WHERE customer_id=:customer_id";
        } else {
                $sql = "UPDATE tb_customers
                SET customer_username=:customer_username, 
                customer_nama=:customer_nama, 
                customer_email=:customer_email, 
                customer_password=:customer_password, 
                customer_phone=:customer_phone,
                updated_at = CURRENT_TIMESTAMP
                WHERE customer_id=:customer_id";
        }

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":customer_username", $username);
        $stmt->bindParam(":customer_nama", $nama);

        if ($gambar['size'] > 0) {
                $stmt->bindParam(":customer_gambar", $gambarName);
        }
        
        $stmt->bindParam(":customer_email", $email);
        $stmt->bindParam(":customer_password", $password);
        $stmt->bindParam(":customer_phone", $phone);
        $stmt->bindParam(":customer_id", $id);
        
        $stmt->execute();
}

public function delete($id)
{
        $sqlSelect = "SELECT customer_gambar FROM tb_customers WHERE customer_id=:customer_id";
        $stmtSelect = $this->db->prepare($sqlSelect);
        $stmtSelect->bindParam(":customer_id", $id);
        $stmtSelect->execute();
        $result = $stmtSelect->fetch(PDO::FETCH_ASSOC);

        $gambarPath = 'public/img/' . $result['customer_gambar'];
        unlink($gambarPath);

        $sqlDelete = "DELETE FROM tb_customers WHERE customer_id=:customer_id";
        $stmtDelete = $this->db->prepare($sqlDelete);
        $stmtDelete->bindParam(":customer_id", $id);
        $stmtDelete->execute();
}
}
