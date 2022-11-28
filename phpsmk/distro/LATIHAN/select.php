<div style="margin:auto; width: 900px;">
    <h1><a href="http://localhost/phpsmk/distro/kategori/insert.php">tambah data</a></h1>
    <?php
    require_once "../function.php";

    if (isset($_GET['Update'])) {
        $id = $_GET['Update'];
        require_once "update.php";
    }
    echo '<br>';

    if (isset($_GET['Delete'])) {
        $id = $_GET['Delete'];
        require_once "delete.php";
    }
    echo '<br>';

    $sql = "SELECT idkategori FROM tblkkategori";
    $result = mysqli_query($koneksi, $sql);

    $jumlahdata = mysqli_num_rows($result);

    
    $banyak = 3;

    $halaman = ceil($jumlahdata / $banyak);

    for ($i=1; $i <= $halaman; $i++) { 
        echo '<a href="?p='.$i.'">'.$i.'</a>';
        echo '&nbsp';
    }

    echo '<br> <br>';

    if (isset($_GET['p'])) {
        $p = $_GET['p'];
        $mulai = ($p * $banyak) - $banyak;
    }else {
        $mulai = 0;
    }

    $sql = "SELECT * FROM tblkkategori LIMIT $mulai,$banyak";
    $result = mysqli_query($koneksi, $sql);

    //var_dump($result);

    $jumlah = mysqli_num_rows($result);
    // echo '<br>';
    // echo $jumlah;

    echo '
    <table border="1px">
    <tr>
        <th>no</th>
        <th>kategori</th>
        <th>Delete</th>
        <th>Update</th>
    </tr>
    ';

    $no = $mulai+1;
    if ($jumlah > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>'.$no++.'</td>';
            echo '<td>'.$row ['kategori'].'</td>';
            echo '<td><a href="?Delete='.$row['idkategori'].'">'.'Delete'.'</a></td>';
            echo '<td><a href="?Update='.$row['idkategori'].'">'.'Update'.'</a></td>';
            echo '</tr>';
        }
    }
    echo '</table>';
?>
</div>