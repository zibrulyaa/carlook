<table class="table">
    <tbody>
    <tr>
        <th>Дата заявки</th>
        <th>Менеджер</th>
        <th>Клиент</th>
        <th>Автомобиль</th>
        <th>Статус</th>
        <th class="edit"></th>
        <th class="edit"></th>
    </tr>
    <?php
    global $db;
    $vars = getRequest();

    foreach ($vars as $var):?>
    <tr>
        <?
        $id = $var['id'];
        $manager = getManagerById($var["manager_id"]);
        $client = getClientById($var["client_id"]);
        $car = getCarById($var["car_id"]);
        $status = getStatusById($var["status_id"]);
        ?>

        <td><?= $var['date']?></td>
        <td><?= $manager?></td>
        <td><?= $client?></td>
        <td><?= $car?></td>
        <td><?= $status?></td>
        <td class="edit"><a class="edit__link" href="vendor/request/popup.php?id=<?=$id;?>"><img src="images/edit.svg" alt=""></a></td>
        <td class="edit"><a class="edit__link" href="vendor/request/delete.php?id=<?=$id;?>"><img src="images/delete.svg" alt=""></a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>