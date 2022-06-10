<?php 
    $menu   = 'beranda';
    include 'header.php';
  
?>
<!-- Product Catagories Area Start -->
<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">
        <?php 
            foreach (getdata('&label=wadec')->data as $item) {
                ?>
                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="shop.html">
                        <img src="<?=linkgambar($item->gambar)?>" alt="<?=linkgambar($item->gambar)?>">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>Mulai dari Rp. 20.000</p>
                            <h4><?=ucwords($item->nama_kategori) ?></h4>
                        </div>
                    </a>
                </div>
                <?php
            }
        ?>
    </div>
</div>
<!-- Product Catagories Area End -->

<?php 
    include 'footer.php';
?>

