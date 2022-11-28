<h3>Delete Kategori</h3>

<?php
        if (isset($_GET['id'])) {
        
            $id = $_GET['id'];
            $sql = "DELETE FROM tblkkategori WHERE idkategori=$id";

            $db->runSQL($sql);
            header("location:?f=kategori&m=select");
        }
?>