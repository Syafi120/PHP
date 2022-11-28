<?php
    $jumlahdata = $db->rowCOUNT("SELECT iduser FROM tbluser");
    $banyak = 4;
    $halaman = ceil($jumlahdata/$banyak);

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai = ($p * $banyak) - $banyak;
    }else {
        $mulai=0;
    }
    
    $sql = "SELECT * FROM tbluser ORDER BY user ASC LIMIT $mulai,$banyak";
    $row = $db->getALL($sql);
    
    $no=1 + $mulai;
?>
<div class="float-start me-5">
    <a class="btn btn-primary" href="?f=user&m=insert" role="button">tambah data</a>
</div>

<h3>User</h3>

<table class="table table-bordered w-70 mt-4">
    <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Email</th>
            <th>Level</th>
            <th>Delete</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($row as $r):?>
        <?php
            if ($r['aktif']==1) {
                $status = 'Aktif';
            }else {
                $status = 'Banned';
            }
        ?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $r['user']?></td>
            <td><?php echo $r['email']?></td>
            <td><?php echo $r['level']?></td>
            <td><a class="btn btn-info" href="?f=user&m=Delete&id=<?php echo $r['iduser']?>">Delete</a></td>
            <td><a class="btn btn-dark" href="?f=user&m=Update&id=<?php echo $r['iduser']?>"><?php echo $status;?></a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php
    for ($i=1; $i <= $halaman ; $i++) { 
        echo '<a href="?f=user&m=select&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
    }
?>