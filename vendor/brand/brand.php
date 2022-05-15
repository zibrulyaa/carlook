<table class="table">
    <tbody>
    <tr>
        <th>Название</th>
        <th class="edit"></th>
        <th class="edit"></th>
    </tr>
    <?php
    $brands = getBrand();
    foreach ($brands as $brand):
        $id = $brand['id'];?>
        <tr>
            <td><?php  echo $brand['name']?></td>
            <td class="edit">
                <a class="edit__link" href="vendor/brand/popup.php?id=<?=$id;?>"><img src="images/edit.svg" alt=""></a>
            </td>
            <td class="edit">
                <a class="edit__link" href="vendor/brand/delete.php?id=<?=$id;?>"><img src="images/delete.svg" alt=""></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>