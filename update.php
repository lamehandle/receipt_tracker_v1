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
    <div id="nav-bk">
        <ul>
            <li><a href="index.php">Display</a></li>
            <li><a href="create.php">Create</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
    </div>
</nav>
<main>
<div>
    <h3>These Items are populated from the Database</h3>
    <p>ipsum Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Beatae commodi dicta dolore est laborum, omnis quod repellat repellendus sequi totam?
   </p>
</div>
<section>

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
            <th>Date</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        <?php include 'update_read.php'; ?>
        <tr>
            <td> <?=$item['id']?>              </td>
            <td> <?=$item['item']?>            </td>
            <td> <?=$item['vendor']?>          </td>
            <td> <?=$item['category']?>        </td>
            <td> $<?= number_format((int)$item['price']/100,'2','.')?> </td>
            <td> $<?=number_format((int)$item['pst']/100,'2','.')?>   </td>
            <td> $<?=number_format((int)$item['gst']/100,'2','.')?>   </td>
            <td> $<?=$total?>                 </td>
            <td> <?=$item['date']?> </td>
        </tr>

        </tbody>
        <form action="update_read.php" method="post">
        <tfoot>
            <tr>
                <td>
                    <div class="cell">
                         <div class="mb-3">
                             <label for="id" class="form-label">Id:</label>
                             <input type="text" class="form-control field" id="id" aria-describedby="id" name="id" readonly value="<?=$item['id']?>">
                         </div>
                    </div>
                </td>

                <td>
                    <div class="cell">
                        <div class="mb-3">
                            <label for="vendor" class="form-label">Vendor:</label>
                            <input type="text" class="form-control field" id="vendor" aria-describedby="vendor" name="vendor" value="<?=$item['vendor']??'unknown'?>">
                        </div>
                    </div>
                </td>

                <td>
                    <div class="cell">
                        <div class="mb-3">
                            <label for="item" class="form-label">Name:</label>
                            <input type="text" class="form-control field" id="item" aria-describedby="item" name="item" value="<?=$item['item']??'unknown'?>">
                        </div>
                    </div>
                </td>

                <td>
                    <div class="cell">
                         <div class="mb-3">
                             <?php include 'categories.php'; ?>
                             <label for="category" class="form-label">Category:</label>
                             <select class="form-select field" aria-label="category" name="category" id="category">
                                 <option value="<?=$item['category']?>"> <?=$item['category']?> </option>
                                    <?php foreach ($categories as $cat) : ?>
                                 <option value="<?=$cat?>"> <?=$cat?> </option>
                                <?php endforeach; ?>
                             </select>
                         </div>
                    </div>
                </td>

                <td>
                    <div class="cell">
                            <div class="mb-3">
                                <label for="price" class="form-label">Price:</label>
                                <input type="text" class="form-control field" id="price" aria-describedby="price" name="price" value="$<?=(int)$item['price']/100?>">
                            </div>

                    </div>
                </td>

                <td>
                    <div class="cell">
                            <div class="mb-3">
                                <label for="pst" class="form-label">PST:</label>
                                <input type="text" class="form-control field" id="pst" aria-describedby="pst" name="pst" value="$<?=(int)$item['pst']/100?>">
                            </div>

                    </div>
                </td>
                <td>
                    <div class="cell">
                            <div class="mb-3">
                                <label for="gst" class="form-label">GST:</label>
                                <input type="text" class="form-control field" id="gst" aria-describedby="gst" name="gst" value="$<?=(int)$item['gst']/100?>">
                            </div>

                    </div>
                </td>

                <td>
                    <div class="cell">
                            <div class="mb-3">
                                <label for="pst" class="form-label">PST:</label>
                                <input type="text" class="form-control field" id="pst" aria-describedby="gst" name="pst" value="$<?=(int)$item['pst']/100?>">
                            </div>

                    </div>
                </td>

                <td>
                    <div class="cell">
                            <div class="mb-3">
                                <label for="total" class="form-label">Total:</label>
                                <input type="text" class="form-control field" id="total" aria-describedby="total" name="total" value="$<?=$total?>">
                            </div>
                    </div>
                </td>
            </tr>

            <td><button type="submit">Submit Change</button></td>

        </tfoot>
        </form>
    </table>


</section>
</main>
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