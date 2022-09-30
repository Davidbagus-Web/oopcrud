<?php

include('../Crud.php');

$crud = new Crud();

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $hasil = $crud->delete('hiburan', 'judul', $id);
    if($hasil)
    {
        header('Location : simpan_data.hiburan.php');
    }
    else
    {
        echo "Gagal hapus!";
    }
}
?>