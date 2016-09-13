<?php include("includes/header.php"); ?>

<div class="patners">
    <div class="container inner-container">
        <h1>Our Valuable Service Provider Who Support Us To Achieve Your Satisfaction</h1>
        <div class="clients-main row">
            <?php
            foreach ($service_providers as $providers)
                {
                ?>
                <div class="col-sm-4 clients">
                    <div class="client-inner">

                        <div class="client-img"><a href="provider-detail.php?id=<?php echo $providers['id']; ?>" ><img src="<?php echo $providers['full_path']; ?>" alt="" title=""></a></div>
                        <div class="client-text">

                            <h2><a href="provider-detail.php?id=<?php echo $providers['id']; ?>"><?php echo $providers['provider_name']; ?></a></h2>
                        </div>
                    </div>
                </div>
            <?php } ?>


        </div>
    </div></div>
<?php include("includes/footer.php"); ?>