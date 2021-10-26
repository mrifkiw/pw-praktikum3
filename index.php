<?php
// Warning!! This is only can be used for php@8.0.12
class DataKonversiBarang {
    public string $no;
    public string $nama_barang;
    public int $kg;
    public int $gram;
    public int $mg;
    private array $data_row;

    public function __construct(
        string $no,
        string $namaBarang,
        int $berat_kg
    )
    {
        $this->no = $no;
        $this->nama_barang = $namaBarang;
        $this->kg = $berat_kg;
        $this->gram = $this->kg * 10;
        $this->mg = $this->gram * 10;
        $this->data_row = array(
            $this->no,
            $this->nama_barang,
            "{$this->kg} Kg",
            "{$this->gram} gram",
            "{$this->mg} mg",
        );
    }

    public function getDataRow()
    {
        return $this->data_row;
    }
}

// SetUp Object Barang
$Semen = new DataKonversiBarang(
    no:1,
    namaBarang: "Semen",
    berat_kg:100,
);
$CatTembok = new DataKonversiBarang(
    no:2,
    namaBarang: "Cat Tembok",
    berat_kg:25,
);
$Asbes = new DataKonversiBarang(
    no:3,
    namaBarang: "Cat Tembok",
    berat_kg:8.3,
);

//convert data Objek barang to array
$dataSemen = $Semen->getDataRow();
$dataCat = $CatTembok->getDataRow();
$dataAsbes = $Asbes->getDataRow();

//getAll object and convert to array
$total_bahan = array(
    $dataSemen,
    $dataCat,
    $dataAsbes
);
// Array for naming table hader
$table_header = ["No", "Nama Barang", "Berat (Kg)", "Berat (gram)", "Berat (mg)"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Table Konversi</title>
</head>
<body>
    <table class="styled-table">
        <thead>
            <tr>
                <!-- Extract table header name -->
                <?php
                    foreach ($table_header as $header){
                        echo "<th>{$header}</th>";
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($total_bahan as $dataRow){
                    // Extract total bahan as data each row
                    echo "<tr>";
                    foreach($dataRow as $dataCell){
                        // Extract data row (array) to data each cell
                        echo "<td>{$dataCell}</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>