<?php
require 'inc/data/products.php'; 

session_start();


if ($_SERVER["REQUEST_METHOD"] === 'GET') {
    $order = array_map('trim', $_GET);
    $order = array_map('htmlentities', $order);

    if(!isset($order['add_to_cart']) 
            || $order['add_to_cart'] === '' 
            || !filter_var($order['add_to_cart'], FILTER_VALIDATE_INT)
            || !array_key_exists(46, $catalog)
    ) {
        $errors['order'] = "There is a problem with your order";
    } else {
        array_key_exists('order', $_SESSION) ?: $_SESSION['order']=[];
        array_key_exists($order['add_to_cart'], $_SESSION['order']) ? $_SESSION['order'][$order['add_to_cart']]++  :   $_SESSION['order'][$order['add_to_cart']]=1;
        
    } 
    
}


?>
<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
