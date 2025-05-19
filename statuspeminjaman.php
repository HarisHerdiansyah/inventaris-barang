<?php include "layout/top.php"?>
<?php include "layout/navbar.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Peminjaman</title>
    <style>
        .judul{
            padding-top: 10px;
            padding-left: 15px;
        }
        .content{
            border: 2px solid red;
            padding-left: 5px;
            height: 800px;
        }
        .table{
            border: 0px solid black;
            margin-left: -10px;
            margin-top: 50px;
            box-shadow: 2px;
            margin-right: 0px;
        }
        .kat1{
            border: 2px solid black;
            width: 50%;
            float: left;
            text-align: center;
            font-size: 25px;
            height: 40px;
            font-weight: bold;
            padding-top: 8px;
        }
        .kat2{
            float: left;
            margin-left: 0px;
            border: 2px solid black;
            width: 49.57%;
            text-align: center;
            font-size: 25px;
            height: 40px;
            font-weight: bold;
            padding-top: 8px;
        }
        .list{
            margin-top: 43px;
            border: 0px solid black;    
            height: 80px;
            font-size: 20px;
        }
        .items{
            border: 2px solid black;
            width: 50%;
            float: left;
            text-align: center;
            margin-top: 0px;
            height: 30px;
            padding-top: 8px;
        }
        .approval{
            border: 2px solid black;
            width: 49.57%;
            float: left;
            text-align: center;
            margin-top: 0px;
            height: 30px;
            padding-top: 8px;

        }
    </style>

</head>
<body>
    <div class="content">
        <h1 class="judul">Status Peminjaman</h1>
        <div class="table">
            <div class="kat1">Barang yang dipinjam</div> 
            <div class="kat2">Status Peminjaman</div>
            <div class="list">
                <div class="items">Walkie Talkie</div>
                <div class="approval">Approve</div>
                <div class="items">Pistol</div>
                <div class="approval">Tidak Approve</div>
            </div>
        </div>

    </div>
</body> 
</html>

<?php include "layout/bottom.php"?>