<?php
// Warning!! This is only can be used for php@8.0.12
class DataKonversiBarang {
    //just ignore this error 1 line below ⬇️, bcs its just work 🤷🏻
    private string $no;
    private string $nama_barang;
    private int $kg = 0;
    private int $gram = 0;
    private int $mg = 0;
    private int $liter = 0;
    private bool $isLiter;
    private array $data_row;

    public function __construct(
        string $no,
        string $namaBarang,
        int $berat,
        bool $isLiter
    )
    {
        $this->no = $no;
        $this->nama_barang = $namaBarang;
        $this->isLiter = $isLiter;
        if ($this->isLiter){
            //1 liter = 1,328 Kg
            $this->liter = $berat;
            $this->kg = $this->liter * 1.328;
        }else {
            $this->kg = $berat;
            $this->liter = $this->kg / 1.328;
            $this->data_row = array(
                $this->no,
                $this->nama_barang,
            );
        }
        $this->gram = $this->kg * 10;
        $this->mg = $this->gram * 10;
        $this->data_row = array(
            $this->no,
            $this->nama_barang,
            "{$this->kg} Kg",
            "{$this->gram} gram",
            "{$this->mg} mg",
            "{$this->liter} liter"
        );
        
        
    }

    public function getDataRow()
    {
        return $this->data_row;
    }
}

// SetUp Object Barang
$Beras = new DataKonversiBarang(
    no:1,
    namaBarang: "Beras",
    berat:130.5,
    isLiter: false
);
$IkanTongkol = new DataKonversiBarang(
    no:2,
    namaBarang: "Ikan Tongkol",
    berat:18.45,
    isLiter: false
);
$Kubis = new DataKonversiBarang(
    no:3,
    namaBarang: "Kubis",
    berat:8.35,
    isLiter: false
);
$Minyak = new DataKonversiBarang(
    no:4,
    namaBarang: "Minyak Goreng",
    berat:218.35,
    isLiter: true
);

//convert data Objek barang to array
$dataBeras = $Beras->getDataRow();
$dataIkan = $IkanTongkol->getDataRow();
$dataSayur = $Kubis->getDataRow();
$dataMinyak = $Minyak->getDataRow();

//getAll object and convert to array
$total_bahan = array(
    $dataBeras,
    $dataIkan,
    $dataSayur,
    $dataMinyak
);
// Array for naming table hader
$table_header = ["No", "Nama Barang", "Berat (Kg)", "Berat (gram)", "Berat (mg)", "Berat (Liter)"];
?>
