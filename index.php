<?php require 'header.php'; ?>


<h1>Информационная система размещения частных объявлений</h1>
<div class="row row-cols-1 row-cols-md-3 g-4 py-5">
    <?php


    $pdo = pdo();

    $result = $pdo->query("SELECT * FROM ads");

    while ($row = $result->fetch()) {
        $imgSrc = !empty($row['image_path']) ? $row['image_path'] : 'img/nullImage.png';
    ?>
        <div class="col-md-4 col-sm-6">
            <div class="card h-100">
                <div class="card-img-top-wrapper" style="height:200px; overflow:hidden;">
                    <img src="<?= ($imgSrc) ?>" class="card-img-top" alt="..." style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?= $row['adTitle'] ?></h5>
                    <p class="card-text"><?= $row['adDa'] ?></p>
                    <a href="ad.php?id=<?= $row['adId'] ?>" class="btn btn-primary mt-auto">Подробнее</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php require 'footer.php'; ?>