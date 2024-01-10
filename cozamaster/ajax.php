<?php 

include("php/query.php");
$query=$pdo->query("select * from products");
$row=$query->fetchAll(PDO::FETCH_ASSOC);
foreach($row as $proan){
    ?><!-- Block2 -->
    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ">
    <div class="block2">
        <div class="block2-pic hov-img0">
            <img src="../dashmin-1.0.0/dashmin-1.0.0/productimg/<?php echo $proan['product_image']?>" alt="IMG-PRODUCT">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                Quick View
            </a>
        </div>

        <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
                <a href="product-detail.php?detid=<?php echo $proan['productid'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    <?php echo $proan['product_name'] ?>
                </a>

                <span class="stext-105 cl3">
                <?php echo $proan['product_price'] ?>
                    
                </span>
            </div>

            
        </div>
    </div>
</div>
<?php 
}?>