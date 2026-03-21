<?php require 'header.php'; ?>

<?php
require_once 'boot.php';
flash(); // вывод flash-сообщений
?>

    <h1>Добавить объявление</h1>

    <form method="post" action="do_postAd.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="adTitle" class="col-sm-2 col-form-label">Название</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="adTitle" name="adTitle" required>
            </div>
        </div>
        
        <div class="mb-3">
            <label for="adText1" class="form-label">Текст объявления</label>
            <textarea class="form-control" id="adText1" name="adText" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="wayToCommunicate" class="form-label">Способ связи</label>
            <textarea class="form-control" id="wayToCommunicate" name="wayToCommunicate" rows="3" required placeholder="Например номер телефона"></textarea>
        </div>

        <div class="mb-3">
            <input type="file" id="image_path" name="image_path">
        </div>

        <div class="mb-3">
            <label for="adAdress" class="form-label">Адрес</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="adAdress" name="adAdress" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Добавить</button>
        <a class="btn btn-outline-primary" href="index.php">Назад</a>
    </form>


<?php require 'footer.php'; ?>