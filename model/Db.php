<?php
session_start();
include 'conn.php';

class Db extends conn
{
    //-------------------------------------------------CRUD ADMIN----------------------------------------------------//

    public function tampilDataAdmin()
    {

        $query = $this->ambilData("SELECT * FROM tbl_admin");
        return $query;
    }

    public function ambilSatuId($id)
    {
        $query = $this->ambilData("SELECT * FROM tbl_admin WHERE admin_id = '$id'");
        return $query;
    }

    public function tambahData($data)
    {
        global $koneksi;
        $nama_admin = $data['nama'];
        $username   = $data['username'];
        $password   =  md5($data['pass']);
        $foto       = $_FILES['foto']['name'];
        $lokasi     = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "images/admin/" . $foto);


        $query = "INSERT INTO tbl_admin (admin_nama,admin_username,admin_password,admin_foto)
                                                                                VALUES 
                                                                                ('$nama_admin',
                                                                                '$username',
                                                                                '$password',
                                                                                '$foto')";

        return $koneksi->query($query);
    }

    public function HapusData($id)
    {
        global $koneksi;
        $query =  "DELETE FROM tbl_admin WHERE admin_id = '$id'";

        return $koneksi->query($query);
    }

    public function editdata($data)
    {
        global $koneksi;
        $id         = $data['admin_id'];
        $nama_admin = $data['admin_nama'];
        $username   = $data['admin_username'];
        $password   = $data['admin_password'];

        $foto       = $_FILES['foto']['name'];
        $lokasi     = $_FILES['foto']['tmp_name'];


        if (!empty($lokasi)) {
            move_uploaded_file($lokasi, "images/admin/" . $foto);
            $query = "UPDATE tbl_admin SET 
            admin_nama     = '$nama_admin',
            admin_username = '$username',
            admin_password = '$password',
            admin_foto     = '$foto'
            WHERE admin_id = '$id'";

            return $koneksi->query($query);
        } else {
            $query = "UPDATE tbl_admin SET 
            admin_nama     = '$nama_admin',
            admin_username = '$username',
            admin_password = '$password'
            WHERE admin_id = '$id'";

            return $koneksi->query($query);
        }
    }
    //-------------------------------------------AKHIR DARI CRUD ADMIN---------------------------------------------//

    public function login($data)
    {
        global $koneksi;
        $user = $data['username'];
        $pass  =  md5($data['password']);

        $query = "SELECT * FROM tbl_admin WHERE admin_username = '$user' AND admin_password = '$pass'";

        $ambil = $koneksi->query($query);
        $validasi = $ambil->num_rows;

        if ($validasi >= 1) {
            session_start();

            $_SESSION['admin'] = $ambil->fetch_assoc();

            echo "
            <script>
            alert('Selamat Anda Berhasil Login');
            window.location='home.html';
            </script>";
        } else {
            echo " <script>
            alert('Login Gagal Silahkan Coba Lagi ');
            window.location='login.php';
            </script>";
        }
    }
}
