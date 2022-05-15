<table class="table">
    <tbody>
    <tr>
        <th>Название</th>
        <th class="edit"></th>
        <th class="edit"></th>
    </tr>
    <?php
    $colors = getColor();
    foreach ($colors as $color):
        $id = $color['id'];?>
        <tr>
            <td><?php  echo $color['name']?></td>
            <td class="edit">
                <a class="edit__link" href="vendor/color/popup.php?id=<?=$id;?>"><img src="images/edit.svg" alt=""></a>
            </td>
            <td class="edit">
                <a class="edit__link" href="vendor/color/delete.php?id=<?=$id;?>"><img src="images/delete.svg" alt=""></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

