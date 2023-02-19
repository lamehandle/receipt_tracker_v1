<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Financial Tracking</title>
</head>
<body>
    <h1>Current Receipts</h1>
<nav class="nav">
    <div class="nav-bk">
        <ul>
            <li><a href="index.php">Display</a></li>
            <li><a href="create.php">Create</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
    </div>
</nav>
<div>
    <h3>These Items are populated from the Database</h3>
    <p>ipsum Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    Beatae commodi dicta dolore est laborum, omnis quod repellat repellendus sequi totam?
   </p>
</div>
<h2>These are the Current Items</h2>
        <?php include 'read.php'; ?>
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
            <td><button class="add"><a href="create.php"> Add+ </a></button></td>
        </tr>
        </tfoot>
    </table>
<footer>
    <nav class="foot">
        <div id="nav">
            <ul>
                <li><a href="index.php">Display</a></li>
                <li><a href="create.php">Create</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </div>
    </nav>
</footer>
</body>
</html>