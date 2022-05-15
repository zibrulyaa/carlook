<table class="table">
    <tbody>
    <tr>
        <th>Название</th>
        <th class="edit"></th>
        <th class="edit"></th>
    </tr>
    <?php
    $gears = getGear();
    foreach ($gears as $gear):
        $id = $gear['id'];?>
        <tr>
            <td><?php  echo $gear['name']?></td>
            <td class="edit">
                <a class="edit__link" href="vendor/gear/popup.php?id=<?=$id;?>"><img src="images/edit.svg" alt=""></a>
            </td>
            <td class="edit">
                <a class="edit__link" href="vendor/gear/delete.php?id=<?=$id;?>"><img src="images/delete.svg" alt=""></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

