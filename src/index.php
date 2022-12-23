<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Outgoing Funds</h1>
    <h2>Current Receipts</h2>
    <table border="1">
        <caption>
                Display of all current receipts:
        </caption>
        <thead>
            <tr>
                <th colspan="1">Edit:</th>
                <th colspan="1">id:</th>
                <th colspan="1">name:</th>
                <th colspan="1">vendor:</th>
                <th colspan="1">category:</th>
                <th colspan="1">price:</th>
                <th colspan="1">gst:</th>
                <th colspan="1">pst:</th>
                <th colspan="1">total:</th>
                <th colspan="1">delete:</th>

            </tr>
        </thead>

        <tbody>
        <?php include '../controllers/retrieve.php';?>

        <!-- This is what I want to represent in the row cells   -->
            <tr>
                <td><button>+</button></td>
                <td>id #</td>
                <td>name of product or service</td>
                <td>vendor name</td>
                <td>category of product or service</td>
                <td>price in dollars $</td>
                <td>gst in dollars $</td>
                <td>pst in dollars $</td>
                <td>total of receipt in $:</td>
                <td><button><a href="delete.php?id=id%20#">Delete</a></button></td>
            </tr>
        <!--example row-->
            <tr>
                <td><button>+</button></td>
                <td>12345</td>
                <td>Widget</td>
                <td>Widget IncCo</td>
                <td>Office Supply</td>
                <td>$45.00</td>
                <td>$2.25</td>
                <td>$3.15</td>
                <td>$50.40</td>
                <td><button><a href="delete.php?id=12345">Delete</a></button></td>
            </tr>
        <?php foreach ( $items as $item ) :?>
            <tr>
                <td><button>+</button></td>
                <td> <?=$item['id']?> </td>
                <td> <?=$item['item']?> </td>
                <td> <?=$item['vendor']?> </td>
                <td> <?=$item['category']?> </td>
            <!--                 -->
                <td> <?= $item['price']/100?> </td>
                <td> <?=$item['gst']?> </td>
                <td> <?=$item['pst']?> </td>
                <td> <?= $item['price'] + $item['gst'] + $item['pst'] ?> </td>
                <td><button type="submit"><a href="delete.php?id=<?=$item['id']?>">Delete</a></button></td>
            </tr>
        <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6"></td>
                <td>Total:</td>
                <td>$50.40</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
