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

    //-------------------------------------------AKHIR DARI CRUD KRITERIA---------------------------------------------//
    public function tampilDataKriteria()
    {

        $query = $this->ambilData("SELECT * FROM tbl_kriteria");
        return $query;
    }
    public function editKriteria($data)
    {
        global $koneksi;
        $id         = $data['kriteria_id'];
        $nama       = $data['kriteria_nama'];
        $nilai      = $data['nilai_bobot'];

        $query = "UPDATE tbl_kriteria SET 
            kriteria_nama     = '$nama',
            kriteria_bobot = '$nilai'
            WHERE kriteria_id = '$id'";
        return $koneksi->query($query);
    }
    //-------------------------------------------AKHIR DARI CRUD KRITERIA---------------------------------------------//
    //-------------------------------------------AKHIR DARI CRUD SISWA---------------------------------------------//
    public function tampilDataSiswa()
    {
        $query = $this->ambilData("SELECT * FROM tbl_siswa");
        return $query;
    }
    public function HapusSiswa($id)
    {
        global $koneksi;
        $query =  "DELETE FROM tbl_siswa WHERE siswa_id = '$id'";

        return $koneksi->query($query);
    }

    public function editDatasiswa($data)
    {

        global $koneksi;
        $id = $data['id'];
        $a = $data['nis'];
        $b   = $data['nama'];
        $c   = $data['jk'];
        $d   = $data['alamat'];
        $e   = $data['nohp'];
        $f   = $data['kelas'];
        $g   = $data['jurusan'];

        return $koneksi->query("UPDATE tbl_siswa SET siswa_nis = '$a', siswa_nama = '$b', siswa_jk = '$c', siswa_alamat = '$d', siswa_nohp = '$e', siswa_kelas = '$f', siswa_jurusan = '$g' WHERE siswa_id = '$id' ");
    }

    public function tambahDataSiswa($data)
    {
        global $koneksi;
        $a = $data['nis'];
        $b   = $data['nama'];
        $c   = $data['jk'];
        $d   = $data['alamat'];
        $e   = $data['nohp'];
        $f   = $data['kelas'];
        $g   = $data['jurusan'];
        $query = "INSERT INTO `tbl_siswa`(`siswa_nis`, `siswa_nama`, `siswa_jk`, `siswa_alamat`, `siswa_nohp`, `siswa_kelas`, `siswa_jurusan`) VALUES
                                                                                ('$a',
                                                                                '$b',
                                                                                '$c',
                                                                                '$d',
                                                                                '$e',
                                                                                '$f',
                                                                                '$g')";

        return $koneksi->query($query);
    }
    //-------------------------------------------AKHIR DARI CRUD SISWA---------------------------------------------//
    //-------------------------------------------AKHIR DARI CRUD penilaian---------------------------------------------//
    public function tampilDataPenilaian()
    {
        $query = $this->ambilData("SELECT * FROM tbl_penilaian a JOIN tbl_siswa b ON a.siswa_id=b.siswa_id");
        return $query;
    }
    public function tambahDataPenilaian($data)
    {
        global $koneksi;
        $a = $data['siswa'];
        $b   = $data['ratarata'];
        $c   = $data['kehadiran'];
        $d   = $data['penghasilan'];
        $e   = $data['tanggungan'];

        if ($b >= 81) {
            $rata = 4;
        } elseif ($b > 71 && $b <= 80) {
            $rata = 3;
        } elseif ($b > 50 && $b <= 70) {
            $rata = 2;
        } else {
            $rata = 1;
        }
        $query = "INSERT INTO `tbl_penilaian`(`siswa_id`, `nilai_rata`, `nilai_rata_asli`, `nilai_kehadiran`, `nilai_penghasilan_ortu`, `nilai_tanggungan`) VALUES
                                                                                ('$a',
                                                                                '$rata','$b',
                                                                                '$c',
                                                                                '$d',
                                                                                '$e'
                                                                                )";

        return $koneksi->query($query);
    }
    public function HapusPenilaian($id)
    {
        global $koneksi;
        $query =  "DELETE FROM tbl_penilaian WHERE nilai_id = '$id'";

        return $koneksi->query($query);
    }
    //-------------------------------------------AKHIR DARI CRUD penilaian---------------------------------------------//
    //-------------------------------------------AKHIR DARI CRUD RANKING---------------------------------------------//
    public function tampilDataRank()
    {
        $query = $this->ambilData("SELECT * FROM tbl_rank a JOIN tbl_siswa b ON a.siswa_id=b.siswa_id ORDER BY nilai_ev DESC ");
        return $query;
    }


    //-------------------------------------------AKHIR DARI CRUD RANKING---------------------------------------------//


    //------------------crud berita----------------------------------------------//
    public function tampilBerita()
    {
        return $this->ambilData("SELECT * FROM tbl_berita");
    }

    public function saveBerita($data)
    {
        global $koneksi;
        $judul = $data['judul'];
        $isi = $data['isi'];
        $tgl  = $data['tgl'];
        $gambar = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "images/berita/" . $gambar);

        return $koneksi->query("INSERT INTO tbl_berita (berita_judul,berita_isi,berita_tgl,berita_gambar) VALUES ('$judul','$isi','$tgl','$gambar')");
    }

    public function editBerita($data)
    {
        global $koneksi;
        $id = $data['id'];
        $judul = $data['judul'];
        $isi = $data['isi'];
        $tgl  = $data['tgl'];

        $gambar = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];

        if (!empty($lokasi)) {
            move_uploaded_file($lokasi, "images/berita/" . $gambar);
            return $koneksi->query("UPDATE tbl_berita SET berita_judul = '$judul',
                                                                berita_isi = '$isi',
                                                                berita_tgl = '$tgl',
                                                                berita_gambar = '$gambar' WHERE 
                                                                berita_id = '$id'");
        } else {
            return $koneksi->query("UPDATE tbl_berita SET 
            berita_judul = '$judul',
            berita_isi = '$isi',
            berita_tgl = '$tgl'
           WHERE 
            berita_id = '$id'");
        }
    }

    public function hapusBerita($id)
    {
        global $koneksi;
        return $koneksi->query("DELETE FROM tbl_berita WHERE berita_id = '$id'");
    }

    //-------------------------------------akhir crud berita------------------//
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
