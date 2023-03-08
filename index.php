<!DOCTYPE html>
<?php
require_once('functions.php');
session_start();
$return = false;

if(isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = md5($_POST['password']);
    $return = login($user, $pass);
}

if(isset($_POST['logout'])) {
    session_destroy();
    header("Refresh:0");
}
if(!($_SESSION['user'])){
    echo "<script>alert('Silakan login dulu!');window.location='login.php';</script>";
}

?>
<html>
<head>
    <meta charset="utf-8">
    <title>Aplikasi penjualan Project JWD 2023</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="page-header text-center"><?php echo $_SESSION['user'] ?> APLIKASI PENJUALAN</h1>
    <br>
    <div class="row">
        <div class="col-12">
            
        <!-- Ini bagian gambar 
        <div class="container">
            <div class="row">
                <div class="col order-last">
                    <img src="img/laptopasus.jpg" class="img-thumbnail">
                </div>

                <div class="col">
                    <img src="img/laptopmsi.jpg" class="img-thumbnail">
                </div>

                <div class="col order-first">
                    <img src="img/laptoptosiba.jpg" class="img-thumbnail">
                </div>

            </div>
        </div>
        -->
    
        
            
            <form action="login.php" method="post" style="padding-left:1200px; margin-top:-30px">
            <input type="submit" name="logout" value="Logout" class="btn btn-danger"/>
            </form>
            <table class="table table-bordered table-striped" style="margin-top:20px;">
            <br><br>
                <thead>
                    <h1>Data Barang</h1>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Foto Produk</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                        //fetch data from json
                        $data = file_get_contents('produk.json');
                        //decode into php array
                        $data = json_decode($data);
 
                        $index = 0;
                        foreach($data as $row){
                            echo "
                                <tr>
                                    
                                    <td>".$row->namabarang."</td>
                                    <td> Rp. ".$row->harga."</td>
                                    <td><img src=".$row->image."></td>
                                    <td>
                                        
                                        <a href='edit_datapenjualan.php?index=".$index."' class='btn btn-success btn-sm'>Buy</a>
                                        
                                    </td>
                                </tr>
                            ";
 
                            $index++;
                        }
                    ?>
                </tbody>
            </table>
    
        </div>

    </div>
</div>
</body>
</html>