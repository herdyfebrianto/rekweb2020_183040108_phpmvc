<?php

class About extends Controllers {

    public function index($nama = 'Herdy Imam Febrianto', $nrp = '183040108', $matkul = 'Rekayasa WEB') {
        //echo "Hallo, Nama saya $nama NRP $nrp <br>Sedang Belajar Rekayasa WEB" ;
      
         $data['nama'] = $nama;
         $data['nrp'] = $nrp;
         $data['matkul'] = $matkul;
         $data['judul'] = 'About Me';
         
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page(){

        $data['judul'] = 'Pages';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}

?>
