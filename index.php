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
    <ul>
        <li><a href="index.php">Display</a></li>
        <li><a href="create.php">Create</a></li>
        <li><a href="about.php">About</a></li>
    </ul>
</nav>
<div>
    <h3>These Items are populated from the Database</h3>
    <p>ipsum Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    Beatae commodi dicta dolore est laborum, omnis quod repellat repellendus sequi totam?
   </p>
</div>
<h2>These are the Current Items</h2>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Vendor</th>
            <th>Category</th>
            <th>Price</th>
            <th>GST</th>
            <th>PST</th>
            <th>Total</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <tr>
               <td>1234</td>
                <td>T-Shirt</td>
                <td>TeePublic</td>
                <td>Clothing</td>
                <td>$100.00</td>
                <td>$0.05</td>
                <td>$0.07</td>
                <td>$100.12</td>
                <td><button><a href=""></a>Edit</button></td>
                <td><button><a href=""></a>Delete</button></td>
            </tr>

        <?php include'populate_rows.php'; ?>
        <?php foreach ($items as $item) :?>
            <tr>
                <td>    <?=$item['id']?>              </td>
                <td>    <?=$item['item']?>            </td>
                <td>    <?=$item['vendor']?>          </td>
                <td>    <?=$item['category']?>        </td>
                <td>    $<?=(int)$item['price']/100?> </td>
                <td>    $<?=(int)$item['pst']/100?>   </td>
                <td>    $<?=(int)$item['gst']/100?>   </td>
                <td>    $<?=((int)$item['price'] + (int)$item['pst'] + (int)$item['gst'])/100?></td>
                <td><button class="edit"><a href="">Edit</a></button></td>
                <td><button class="del"><a href="delete_row.php?id=<?=$item['id']?>">Delete</a></button></td>
            <?php endforeach;?>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="6"></td>
            <td >Total:</td>
            <td>$<?=$total?> </td>
        </tr>
        </tfoot>
    </table>
</body>
</html>