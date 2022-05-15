


<table class="table">
    <tbody>
    <tr>
        <th>Название</th>
        <th>Двигатель</th>
        <th>КПП</th>
        <th>Привод</th>
        <th>Опции</th>
        <th class="edit"></th>
        <th class="edit"></th>
    </tr>
    <tr>
        <?php
        global $db;

        $cnfs = getСnf();

        foreach ($cnfs as $row):?>


        <?php
        $id = $row['id'];
        $engine = getEngineById($row["engine_id"]);
        $gear = getGearById($row["gearbox_id"]);
        $drive = getDriveById($row["drive_id"]);
        $count = getOptionsCount($id);
        ?>


        <td><?php echo $row['name']?></td>
        <td><?php echo $engine?></td>
        <td><?php echo $gear?></td>
        <td><?php echo $drive?></td>
        <td><?php echo $count?> (шт.)</td>
        <td class="edit">
            <a class="edit__link" href="vendor/configuration/popup.php?id=<?=$id;?>"><img src="images/edit.svg" alt=""></a>
        </td>
        <td class="edit">
            <a class="edit__link" href="vendor/configuration/delete.php?id=<?=$id;?>"><img src="images/delete.svg" alt=""></a>
        </td>

    </tr>
    <?php endforeach; ?>
    </tbody>
</table>



