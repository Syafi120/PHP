<nav>
    <ul>
        <li>
            <a href="?menu=beranda">beranda</a>
        </li>
        <li>
            <a href="?menu=tentang">tentang</a>
        </li>
        <li>
            <a href="?menu=sejarah">sejarah</a>
        </li>
    </ul>
</nav>
<?php
    if (isset($_GET['menu'])) {
        $menu = $_GET['menu'];

        require_once $menu.'.php';
    }
?>