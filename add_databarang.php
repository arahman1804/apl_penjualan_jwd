<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Aplikasi penjualan Project JWD 2023</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">Aplikasi penjualan</h1>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-8"><a href="index.php" class="btn btn-primary">Back</a>
        <form method="POST">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">ID BARANG</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_barang" name="id_barang" Readonly value="B<?php echo(rand(1111,9999))?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">NAMA BARANG</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="namabarang" name="namabarang">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">HARGA</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="harga" name="harga">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">IMAGE</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </div>
                
 
            <input type="submit" name="save" value="Save" class="btn btn-primary">
        </form>
        </div>
        <div class="col-5"></div>
    </div>
</div>    
<?php
    if(isset($_POST['save'])){
        //open the json file
        $data = file_get_contents('produk.json');
        $data = json_decode($data);
 
        //data in out POST
        $input = array(
            'id_barang' => $_POST['id_barang'],
            'namabarang' => $_POST['namabarang'],
            'harga' => $_POST['harga'],
            'image' => $_POST['image']
        );
 
        //append the input to our array
        $data[] = $input;
        //encode back to json
        $data = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents('produk.json', $data);
 
        header('location: index.php');
    }
?>
</body>
</html>