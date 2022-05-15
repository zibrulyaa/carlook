<table class="table">
    <tbody>
    <tr>
        <th>марка</th>
        <th>модель</th>
        <th>кузов</th>
        <th>цвет</th>
        <th>комплектация</th>
        <th>VIN</th>
        <th>наличие</th>
        <th>год выпуска</th>
        <th>стоимость</th>
        <th class="edit"></th>
        <th class="edit"></th>
    </tr>
    <?php
    global $db;
    $vars = getCar();

    foreach ($vars as $var):?>
    <tr>
        <?php
        $id = $var['id'];
        $brand = getBrandById($var["brand_id"]);
        $model = getModelById($var["model_id"]);
        $body = getBodyById($var["body_id"]);
        $color = getColorById($var["color_id"]);
        $cnf = getCnfById($var["cnf_id"]);
        $stock = getStockById($var["stock_id"]);
        ?>

        <td><?= $brand?></td>
        <td><?= $model?></td>
        <td><?= $body?></td>
        <td><?= $color?></td>
        <td><?= $cnf?></td>
        <td><?= $var['vin']?></td>
        <td><?= $stock?></td>
        <td><?= $var['date']?></td>
        <td><?= $var['price']?> ₽</td>
        <td class="edit"><a class="edit__link" href="vendor/car/popup.php?id=<?=$id;?>"><img src="images/edit.svg" alt=""></a></td>
        <td class="edit"><a class="edit__link" href="vendor/car/delete.php?id=<?=$id;?>"><img src="images/delete.svg" alt=""></a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
