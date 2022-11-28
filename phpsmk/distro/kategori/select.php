<?php
    $jumlahdata = $db->rowCOUNT("SELECT idkategori FROM tblkkategori");
    $banyak = 4;
    $halaman = ceil($jumlahdata/$banyak);

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai = ($p * $banyak) - $banyak;
    }else {
        $mulai=0;
    }
    
    $sql = "SELECT * FROM tblkkategori ORDER BY kategori ASC LIMIT $mulai,$banyak";
    $row = $db->getALL($sql);
    
    $no=1 + $mulai;
?>
<div class="float-start me-5">
    <a class="btn btn-primary" href="?f=kategori&m=insert" role="button">tambah data</a>
</div>

<h3>kategori</h3>

<table class="table table-bordered w-50">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    </thead>

    <tbody>
        <?php if(!empty($row)) { ?>
        <?php foreach($row as $r):?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $r['kategori']?></td>
            <td><a class="btn btn-info" href="?f=kategori&m=Delete&id=<?php echo $r['idkategori']?>">Delete</a></td>
            <td><a class="btn btn-dark" href="?f=kategori&m=Update&id=<?php echo $r['idkategori']?>">Update</a></td>
        </tr>
        <?php endforeach ?>
        <?php } ?>
    </tbody>
</table>

<?php
    for ($i=1; $i <= $halaman ; $i++) { 
        echo '<a href="?f=kategori&m=select&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
    }
?>