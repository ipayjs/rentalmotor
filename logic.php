<?php

class rental {
    protected $pajak,
                    $diskon;


    private $nmax,
                $ZX25,
                $H2,
                $SUPRA;

    public $waktu,
              $member,
               $jenisMotor; 


              function __construct() {
                $this->pajak = 10000;
                $this->diskon = 0.05;
                $this->member = ['ipay' , 'daffa'];
               }

    public function setHarga($tipe1, $tipe2, $tipe3, $tipe4) {
        $this->nmax = $tipe1;
        $this->ZX25 = $tipe2;
        $this->H2 = $tipe3;
        $this->SUPRA = $tipe4;
    }           

    public function getHarga() {
        $data['nmax'] = $this->nmax;
        $data['ZX25'] = $this->ZX25;
        $data['H2'] = $this->H2;
        $data['SUPRA'] = $this-> SUPRA;
        return $data;
    }

    public function isMember($nama){
        return in_array($nama, $this->member);
    }

} 

class nyewa extends rental {
    public function hargaBeli(){
        $nama = $_POST['nama'];
        if($_POST['nama'] == $this->isMember($nama ) ){
            $dataHarga = $this->getHarga();
            $hargaMotor = $this->waktu * $dataHarga[$this->jenisMotor];
            $hargaPajakDiskon =  $this->diskon * $hargaMotor;
            $hargaBayar = $hargaMotor - $hargaPajakDiskon + $this->pajak;
            return $hargaBayar;
        } else {
            $dataHarga = $this->getHarga();
            $hargaMotor = $this->waktu * $dataHarga[$this->jenisMotor];
            $hargaPajakDiskon =  $this->pajak;
            $hargaBayar = $hargaMotor + $hargaPajakDiskon;
            return $hargaBayar;
        }
    }

    public function cetakPembelian() {
        $nama = $_POST['nama'];
        if($_POST['nama'] == $this-> isMember($nama)){
            echo "<Center>";
            echo"------------------------------------------------" . "<br>";
            echo $nama . " Berstatus sebagai member mendapat diskon sebesar 5%" . "<br>" ;
            echo "jenis motor yang dirental adalah " . $this->jenisMotor . " selama " . $this->waktu ." hari"."<br>";
           if($_POST['jenis'] == "nmax"){
            echo "harga perhari : 70 ribu <br> " ;
           } 
            elseif($_POST['jenis'] == "ZX25"){
            echo "harga perhari : 150 ribu <br>";
           }
           elseif($_POST['jenis'] == "H2"){
            echo "harga perhari : 500 ribu <br>";
           }
           elseif($_POST['jenis'] == "SUPRA") {
            echo "harga perhari : 70 ribu <br>";
           }
           else {
            echo "null";
           }
           echo "<br>";
           
            echo "Besar yang harus dibayar : Rp" . number_format($this->hargaBeli(), 0,null,".") . "<br>" ;
            echo"------------------------------------------------" . "<br>";
            echo "</center>";
        } else {
            echo "<Center>";
            echo"------------------------------------------------" . "<br>";
            echo $nama . " Berstatus bukan sebagai member " . "<br>" ;
            echo "jenis motor yang dirental adalah " . $this->jenisMotor . " selama " . $this->waktu ." hari"."<br>";
            if($_POST['jenis'] == "nmax"){
                echo "harga perhari : 70 ribu  <br>" ;
               }  elseif($_POST['jenis'] == "ZX25"){
                echo "harga perhari : 150 ribu <br>";
               }elseif($_POST['jenis'] == "H2"){
                echo "harga perhari : 500 ribu <br>";
               }elseif($_POST['jenis'] == "SUPRA") {
                echo "harga perhari : 70 ribu <br>";
               }else {
                echo "null";
               }
               echo "<br>";
            echo "Besar yang harus dibayar : Rp" . number_format($this->hargaBeli(), 0, '. ',".") . "<br>" ;
            echo"------------------------------------------------" . "<br>";
            echo "</center>";
        }
        
    }
}

?>