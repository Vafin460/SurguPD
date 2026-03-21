<?php require 'header.php';

$pdo = pdo();
$adId = intval($_GET['id']);
$result = $pdo->query("SELECT * FROM ads WHERE adID = '$adId'");

while ($row = $result->fetch()) {
    $imgSrc = !empty($row['image_path']) ? $row['image_path'] : 'img/nullImage.png';

?>
    <h1><?= $row['adTitle'] ?></h1>


    <div class="card w-75">
        <img src="<?= ($imgSrc) ?>" class="card-img-top" alt="...">

        <div class="card-body">
            <p class="card-text"><?= $row['adText'] ?></p>
        </div>

        <div class="card-body">
            Способ связи.
            <p class="card-text"><?= $row['wayToCommunicate'] ?></p>
        </div>

        <div class="card-body">
            Адрес.
            <p class="card-text"><?= $row['adAdress'] ?></p>
            <p class="card-text"><small class="text-muted"> <?= date('d.m.Y', strtotime($row['adDate'])) ?></small></p>
        </div>

    </div>
    <?php if (!empty($_SESSION['user_id']) && $_SESSION['user_id'] === $row['adUserId']): ?>
        <form class="py-5" method="post" action="deleteAd.php">
            <input type="hidden" name="adId" value="<?= (int)$row['adId'] ?>">
            <button class="btn btn-danger" onclick="return confirm('Удалить?');">Удалить</button>
        </form>
    <?php endif; ?>
<?php


}
?>
</div>
<?php require 'footer.php'; ?>