<?php 

class Buku{

	public $judul;
	private $harga;
    public $jenis;
    protected $diskon="0";

	public function __construct( $judul="judul", $harga= 0, $jenis="jenis"){
		$this->judul = $judul;
		$this->harga = $harga;
        $this->jenis = $jenis; 
    }	
    
   
    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
    }
	public function say(){
		return "$this->harga | $this->jenis";
    }

    public function infolengkap(){
         // Fiksi :  Edensor | 10.000 | Novel - 200 Halaman.
         $hai = "{$this->judul} | Rp. {$this->say()}";
         return $hai;
    }
    
}
    class Fiksi extends Buku{
        public $halaman;

        public function __construct( $judul="judul", $harga=0, $jenis="jenis", $halaman=0){
            parent::__construct($judul, $harga, $jenis);
            $this->halaman = $halaman;
        }
        public function infolengkap(){
            $hai = "Fiksi : ". parent::infolengkap() ."- {$this ->halaman} Halaman.";  
            return $hai;
        }
    }
    class Sekolah extends Buku {
        public $bab;

        public function __construct($judul="judul", $harga=0, $jenis="jenis",$bab=0){
            parent::__construct($judul, $harga, $jenis);
            $this->bab = $bab;
        }
        public function setDiskon($diskon){
            $this->diskon = $diskon;
            
        }
        public function infolengkap(){
            $hai = "Sekolah : ". parent::infolengkap(). "- {$this ->bab} Bab.";
            return $hai;
        }
    }

	class cetakInfoBuku{
		public function cetak($Buku){
			$hai = "{$Buku->judul} | {$Buku->say()} ";
            return $hai;
        }
        
	}

	 $buku1 = new Fiksi("Edensor", 10000, "Novel", 200);
	 $buku2 = new Sekolah("Sains", 30000, "Pelajaran",15);

    // Fiksi :  Edensor | 10.000 | Novel - 200 Halaman.
    // Sekolah :  Sains | 30.000 Pelajaran  - 15 Bab. 
    echo $buku1 -> infolengkap();
    echo "<br>";
    echo $buku2 -> infolengkap();
    echo "<hr>";
    
    
    $buku2->setDiskon(50);
    echo $buku2->getHarga();


 ?>