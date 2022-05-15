<table class="table">
    <tbody>
    <tr>
        <th>Название</th>
        <th>Мощность</th>
        <th>Тип</th>
        <th class="edit"></th>
        <th class="edit"></th>
    </tr>
    <tr>
        <?php
        $engines = getEngine();
        foreach ($engines as $engine):
        $id = $engine['id'];?>
        <td><?php  echo $engine['name']?></td>
        <td><?php  echo $engine['power']?></td>
        <td><?php  echo $engine['type']?></td>
        <td class="edit"><a class="edit__link edit_engines" href="vendor/engine/popup.php?id=<?=$id;?>"><img src="images/edit.svg" alt=""></a></td>
        <td class="edit" ><a class="edit__link edit_drive" href="vendor/engine/delete.php?id=<?=$id;?>"><img src="images/delete.svg" alt=""></a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>