
<?php require "./html_stubs/header.php"; ?>

<div>
    <h3>These Items are populated from the Database</h3>
    <p>ipsum Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    Beatae commodi dicta dolore est laborum, omnis quod repellat repellendus sequi totam?
   </p>
</div>
        <?php include 'read.php'; ?>
<?php require './html_stubs/table.php'; ?>
<h2>These are the Current Items</h2>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Vendor</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>GST</th>
            <th>PST</th>
            <th>Total</th>
            <th>Date</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($values as $item) :?>
        <tr>
            <td>    <?= $item['id']?>               </td>
            <td>    <?= $item['vendor']?>           </td>
            <td>    <?= $item['item']?>             </td>
            <td>    <?= $item['category']?>         </td>
            <td>    $<?= number_format($item['price'],'2','.')?>           </td>
            <td>    $<?= number_format($item['pst'],'2','.')?>             </td>
            <td>    $<?= number_format($item['gst'],'2','.')?>             </td>
            <td>    $<?= number_format($item['total'],'2','.')?>           </td>
            <td>    <?=  $item['date']?>            </td>

            <td><button class="edit"><a href="update.php?id=<?=$item['id']?>">Edit</a></button></td>
            <td><button class="del"><a href="delete_row.php?id=<?=$item['id']?>">Delete</a></button></td>
            <?php endforeach;?>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="6"></td>
            <td>Total:</td>
            <td>$<?=number_format($item_totals,'2','.')?> </td>
            <td colspan="1"></td>
            <td colspan="2"><button class="add"><a href="create.php"> Add+ </a></button></td>
        </tr>
        </tfoot>
    </table>

<?php require './html_stubs/footer.php'?>
