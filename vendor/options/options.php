<table class="table">
    <tbody>
    <tr>
        <th>Название</th>
        <th class="edit"></th>
        <th class="edit"></th>
    </tr>
    <?php
    $options = getOptions();
    foreach ($options as $option):
        $id = $option['id'];?>
        <tr>
            <td><?php  echo $option['name']?></td>
            <td class="edit">
                <a class="edit__link" href="vendor/options/popup.php?id=<?=$id;?>"><img src="images/edit.svg" alt=""></a>
            </td>
            <td class="edit">
                <a class="edit__link" href="vendor/options/delete.php?id=<?=$id;?>"><img src="images/delete.svg" alt=""></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

