<?php

class Mahasiswa extends Controllers {
    public function index() {

        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
  
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');

    }

    public function detail($id) {

        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaId($id);
  
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');

    }

    public function tambah() {
        // var_dump($_POST);
        if ( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Ditambahkan', 'Success');
            // header('Location: ' . BASEURL . '/mahasiswa'); pakai ini error header may not content more than a single header
            header('Location: <?= BASEURL; ?>/mahasiswa');
            exit;
      
        } else {
            Flasher::setFlash('Gagal', 'Ditambahkan', 'Danger');
            // header('Location: ' . BASEURL . '/mahasiswa'); 
            // error header may not content more than a single header
            header('Location: <?= BASEURL; ?>/mahasiswa ' );
            exit;
        }
    }

    public function hapus($id) {
        // var_dump($_POST);
        if ( $this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('Berhasil', 'Dihapus', 'Success');
            
            // header('Location: ' . BASEURL . '/mahasiswa');
            
            header("Location: <?= BASEURL; ?>/mahasiswa"); //hanya pakai ini, error header may not content more than a single header
            header("Location: ../views/mahasiswa/index.php"); //jadi pakai ini
            exit;
      
        } else {
             Flasher::setFlash('Gagal', 'Dihapus', 'Danger');
            
             header("Location: <?= BASEURL; ?>/mahasiswa");
             header("Location: ../views/mahasiswa/index.php");
             exit;
        }
    }

    public function getubah() {

        echo json_encode( $this->model('Mahasiswa_model')->getMahasiswaId($_POST['id']));
    }

    public function ubah() {
        
         if ( $this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Diubah', 'Success');
            // header('Location: ' . BASEURL . '/mahasiswa'); pakai ini error header may not content more than a single header
            header('Location: <?= BASEURL; ?>/mahasiswa');
            exit;
      
        } else {
            Flasher::setFlash('Gagal', 'Diubah', 'Danger');
            // header('Location: ' . BASEURL . '/mahasiswa'); 
            // error header may not content more than a single header
            header('Location: <?= BASEURL; ?>/mahasiswa ' );
            exit;
        }
    }

    public function cari() {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
  
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}

