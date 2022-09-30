<?php
include('../Crud.php');
$crud = new Crud;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Hiburan</title>
    <style>
        .loader {
            width: 100px;
            position: absolute;
            top: 110px;
            left: 320px;
            z-index: -1;
            display: none;
        }
    </style>
</head>
<body>

<?php
     if(isset($_GET['id']))
     {
        $id = $_GET['id'];

        $update = $crud->read_data('hiburan', 'judul', $id);
        foreach ($update as $upd) {
            $judul = $upd['judul'];
            $slug = $upd['slug'];
            $category = $upd['category'];
            $deskripsi = $upd['deskripsi'];
            $gambar = $upd['gambar'];
            $readonly = 'readonly';
            $action = 'update';
        }
     }
     else
     {
        $judul = '';
        $slug = '';
        $category = '';
        $deskripsi = '';
        $gambar = '';
        $readonly = '';
        $action = 'simpan';
     }
?>

<h1>Tambah Hiburan</h1>
    <form action="simpan_data.hiburan.php" method="post">
    <table>
        <tr>
            <td>judul</td>
            <td> : </td>
            <td> <input type="number" name="judul" value="<?php echo $readonly; ?>"></td>
        </tr>
        <tr>
            <td>slug</td>
            <td> : </td>
            <td> <input type="text" name="slug"  value="<?php echo $slug; ?>"></td>
        </tr>
        <tr>
            <td>Category</td>
            <td> : </td>
            <td> <input type="text" name="category"  value="<?php echo $category; ?>"></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td> : </td>
            <td> <input type="text" name="deskripsi"  value="<?php echo $deskripsi; ?>"></td>
        </tr>
        <tr>
            <td>Gambar</td>
            <td> : </td>
            <td> <input type="file" name="gambar"  value="<?php echo $gambar; ?>"></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>
                <input type="submit" name="simpan" value="Simpan">
                <input type="reset" value="Reset">
                <input type="hidden" name="action" value=" <?php echo $action; ?> ">
            </td>
        </tr>
    </table>
    </form>
    <div id="container">
    <table border="1" cellspacing="0" cellpadding="8">
        <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Slug</th>
            <th>Category</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>aksi</th>
        </tr>
        <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Search..." autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari!</button>

        <img src="img/loader.gif" class="loader">

    </form>

    <form action="" method="get">
        <ul>
            <li>
              <label for="category">Category : </label>
              <input type="text" name="category" id="category">
            </li>
        <li>
            <button type="submit" name="filtercategory">Filter!</button>
        </li>
    </ul>
</form>

        <?php
        
        $hiburan = $crud->read_data('hiburan',null,null);
        $no = 1;

        foreach( $hiburan as $hbr) {
         ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $hbr['judul']; ?></td>
            <td><?php echo $hbr['slug']; ?></td>
            <td><?php echo $hbr['category']; ?></td>
            <td><?php echo $hbr['deskripsi']; ?></td>
            <td><img src="img/<?= $row["gambar"];?>" width="50"></td>
            <td>
                <a href="data_hiburan.php?id=<?php echo $hbr['judul']; ?>">Edit</a>
                    |
                <a href="delete.php?id=<?php echo $hbr['judul']; ?>">Hapus</a>
            </td>    
        </tr>
        <?php } ?>
        
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $('#judul').keyup(function(){
            var str = $(this).val();
            var trims = $.trim(str)
            var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
                       $("#slug").val(slug.toLowerCase()+"")
        })
    </script>
</body>
</html>