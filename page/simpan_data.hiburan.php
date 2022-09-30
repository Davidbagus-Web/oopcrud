<?php  

include('../Crud.php');

$crud = new Crud();
if($_POST['action'] == 'simpan') {
    $arrData = array('judul'=>$_POST['judul'],     
    'slug'=>$_POST['slug'],
    'category'=>$_POST['category'],
    'deskripsi'=>$_POST['deskripsi'],
    'gambar'=>$_POST['gambar']);
$hasil = $crud->simpan('hiburan', $arrData);
}
else
{
    $arrData = array("judul='" .$_POST['judul']. "'",
                     "category='" .$_POST['category']. "'",
                     "deskripsi='" .$_POST['deskripsi']. "'",
                     "gambar='" .$_POST['gambar']. "'",);
    $idvalue = $_POST['judul'];
$hasil = $crud->update('hiburan', $arrData, 'judul', $idvalue);
}

if($hasil)
{
	header('Location : data_hiburan.php');
}
else
{
	echo "Gagal Simpan!";
}

?>