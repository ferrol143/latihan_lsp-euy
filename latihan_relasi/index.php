<?php   
    require 'functions.php';

    $barang = read("SELECT id_produk, nama_barang FROM tbl_produk");    




?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      <div class="container">
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method = "get">
       
        <div class="row mt-5">
            <div class="col-lg-3">
                <p>Pilih barang </p>
            </div>

            <div class="col-lg">
                <select class="form-select" name = "id" aria-label="Default select example">
                    <option selected value = null> Pilih barang mu </option>
                    <?php foreach($barang as $b) :?>
                        <option value = "<?= $b['id_produk']?>"> <?= $b['id_produk']?> - <?= $b['nama_barang']?></option>
                     <?php endforeach ?> 
                </select>
            
            </div>

            <div class="col-lg">
                 <button type = "submit" class  = "btn btn-primary"> Pilih </button>
            </div>
            
        </div>
        
     
     <?php if(isset($_GET['id'])) : ?>
     <?php
         $id = $_GET['id'] ;
         $d_barang = read("SELECT * FROM tbl_produk WHERE id_produk = $id");
     ?>
      <div class="row">
        <h1 class = "mt-5"> Detail Data Barang </h1>
          <div class="col-lg">
              <table class = "table">
                  <tr>
                    <th>ID</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                  </tr>
                  <?php foreach($d_barang as $db ) : ?>
                    <tr>
                        <td>
                            <input type = "number" name = "nama_barang" value = "<?= $db['id_produk']  ?>">
                        </td>

                        <td>
                            <input type = "text" name = "nama_barang" value = "<?= $db['nama_barang']  ?>">
                        </td>

                        <td>
                            <input type = "number" name = "harga" value = "<?= $db['harga' ]  ?>">
                        </td>
                        
                        <td>
                          <input type = "number" name = "stok" value = "<?= $db['stok']  ?>">
                        </td>

                        <td>
                          <input type = "number" name = "jumlah" value = "">
                        </td>

                        <td>
                          <?php 
                            $harga = $db['harga'];
                            $jumlah =  $_GET['jumlah'];
                            $total =  $harga * $jumlah;
                          ?>
                         <input type = "type" name = "total" value = "<?= $total ?>">
                        
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <button type = "submit" name = "hitung" class = "btn btn-primary"> hitung </button>
                        </td>
                    </tr>
                    <?php endforeach ?>
              </table>
          </div>
      </div>
    <?php endif ?>

    </form>
      </div>














    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>