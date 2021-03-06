<?php
    require_once('DataKonversiBarang.php');
?>
<!-- File HTML -->
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
    <div class="board-store">
        <h1>Table Data Barang Toko Joyable 🌿</h1>
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
                    foreach($semuaBarang as $dataRow){
                        // Extract total bahan as data(array) each row
                        echo "<tr>";
                        foreach($dataRow->getDataCell() as $dataCell){
                            // Extract data row (array) to data each cell
                            // jika data barang kosong
                            if ($dataCell == $dataRow->getDataCell()[6] && $dataCell == 0 ){
                                echo "<td class=\"isUnavailable\">";
                                echo "KOSONG";
                            }else{
                                echo "<td>";
                                echo "{$dataCell}";
                            }
                            echo "</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>