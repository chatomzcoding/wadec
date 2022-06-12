<?php 

$id = (isset($_GET['id'])) ? $_GET['id'] : 5 ;


// aktif menu berdasarkan menu
function cekmenu($menu,$sesi)
{
    $result = NULL;
    if ($menu == $sesi) {
        $result = 'active';
    }
    return $result;
}

// API
function cServer()
{
    $link = 'http://sistem.zelnara.com/api/';
    // $link = 'http://localhost/chatomz/company/api/';
    return $link;    
}
function aktif($id,$id2)
{
    if ($id == $id2) {
        return "text-primary";    
    }
}


function getdata($link=NULL)
{
    $curl = curl_init();
    $server     = cServer();
    curl_setopt_array($curl, array(
    CURLOPT_URL => $server.'kategori?token=$2y$10$TPl2v.H1BlYpim.WIgxpa.KHjlXdhVWREbsP1NWs21k46Jn9JEskW'.$link,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);

}
function getsub($id)
{
    $curl = curl_init();
    $server     = cServer();
    curl_setopt_array($curl, array(
    CURLOPT_URL => $server.'kategori/'.$id.'?token=$2y$10$TPl2v.H1BlYpim.WIgxpa.KHjlXdhVWREbsP1NWs21k46Jn9JEskW',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);

}

function linkgambar($gambar)
{
    $link = "https://sistem.zelnara.com/public/img/kategori/".$gambar;
    return $link;
}

function linkgambarsub($gambar)
{
    $link = "https://sistem.zelnara.com/public/img/kategori/sub/".$gambar;
    return $link;
}


$datapokok = getsub(101);
$getproduk = getsub($id);

$logo = $datapokok->data[0]->gambar_sub;
$favicon = $datapokok->data[1]->gambar_sub;
$logoreverse = $datapokok->data[2]->gambar_sub;

$produk = $getproduk->data;
rsort($produk);
