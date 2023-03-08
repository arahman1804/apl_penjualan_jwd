<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Aplikasi penjualan Project JWD 2023</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="assets/js/jquery.js"></script>
</head>
<body>
<?php   
    require_once('./vendor/autoload.php');
    $factory = new RandomLib\Factory;
    $generator = $factory->getGenerator(new SecurityLib\Strength(SecurityLib\Strength::MEDIUM)); 
    //get id from URL
    $index = $_GET['index'];
 
    //get json data
    $data = file_get_contents('produk.json');
    $data_array = json_decode($data);

    $datapenjualan = file_get_contents('penjualan.json');
    $data_arraypenjualan = json_decode($datapenjualan, true);

    $data_members = file_get_contents('members.json');
    $data_array_members = json_decode($data_members);
 
    //assign the data to selected index
    $row = $data_array[$index];
    
 
    if(isset($_POST['save']))
    {
        
        $jumlah = $_POST['harga']*$_POST['qty'];

        $input = array(
            'id_barang' => $_POST['id_barang'],
            'id_penjualan' => $_POST['id_penjualan'],
            'namacustomer' => $_POST['namacustomer'],
            'namabarang' => $_POST['namabarang'],
            'harga' => $_POST['harga'],
            'qty' => $_POST['qty'],
            'jumlah' => $jumlah,
        );
 
        //append the selected index
        $data_arraypenjualan[] = $input;
        //print_r($data_arraypenjualan);
 
        //encode back to json
        $datapenjualan = json_encode($data_arraypenjualan, JSON_PRETTY_PRINT);
        file_put_contents('penjualan.json', $datapenjualan);
 
        //header('location: index.php');
    }
    
?>
<div class="container">
    <h1 class="page-header text-center">APLIKASI PENJUALAN</h1>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-8">
        <form method="POST">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">ID Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_barang" name="id_barang" Readonly value="<?php echo $row->id_barang; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">ID Penjualan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_penjualan" name="id_penjualan" Readonly value="P<?php 
                    echo $generator->generateString(5, 'abcdefg12345');?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nama Customer</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="namacustomer" name="namacustomer">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="namabarang" name="namabarang" Readonly value="<?php echo $row->namabarang; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="harga" name="harga" Readonly value="<?php echo $row->harga; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="qty" name="qty" value="<?php echo $row->qty; ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="jumlah" name="jumlah" Readonly value="0">
                </div>
            </div>
            <a href="index.php" class="btn btn-primary">Back</a>
            <input type="submit" name="save" value="Save" class="btn btn-primary">
        </form>
        </div>
        
        <div class="col-5"></div>
    </div>
</div>

</body>
</html>

<script type="text/javascript">
 $("#harga").keyup(function(){   
   var a = parseFloat($("#harga").val());
   var b = parseFloat($("#qty").val());
   var c = a*b;
   $("#jumlah").val(c);
 });
 
 $("#qty").keyup(function(){
   var a = parseFloat($("#harga").val());
   var b = parseFloat($("#qty").val());
   var c = a*b;
   $("#jumlah").val(c);
 });
</script>