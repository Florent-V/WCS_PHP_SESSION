<?php 
require 'inc/data/products.php'; 

session_start();

?>
<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
        
        <?php if(!empty($_SESSION['loginname'])): ?>
            <div class="alert alert-primary" role="alert">Bonjour <?= $_SESSION['loginname'] ?> </div>          
        <?php endif; ?>
        <?php if(empty($_SESSION['loginname'])): ?>
            <div class="alert alert-primary" role="alert"> Attention vous n'êtes pas enregistré ! </div>          
        <?php endif; ?>

        <?php if(!empty($_SESSION['order'])): ?>
            <div class="alert alert-primary" role="alert"> Voici votre panier ! </div>  
            <ul>
                <?php foreach($_SESSION['order'] as $choice => $quantity): ?>
                    <li><?= $catalog[$choice]['name'] ?>. Quantité : <?= $quantity ?></li>
                <?php endforeach; ?>
            </ul>
                    
        <?php endif; ?>
        <?php if(empty($_SESSION['order'])): ?>
            <div class="alert alert-primary" role="alert">Votre panier est vide</div>                    
        <?php endif; ?>
    </div>


</section>
<?php require 'inc/foot.php'; ?>



