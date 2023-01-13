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
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
<!--        <tr>-->
<!--            <td>1234</td>-->
<!--            <td>T-Shirt</td>-->
<!--            <td>TeePublic</td>-->
<!--            <td>Clothing</td>-->
<!--            <td>$100.00</td>-->
<!--            <td>$0.05</td>-->
<!--            <td>$0.07</td>-->
<!--            <td>$100.12</td>-->
<!--        </tr>-->

        <?php include 'update_read.php'; ?>
        <tr>
            <td> <?=$item['id']?>              </td>
            <td> <?=$item['item']?>            </td>
            <td> <?=$item['vendor']?>          </td>
            <td> <?=$item['category']?>        </td>
            <td> $<?=(int)$item['price']/100?> </td>
            <td> $<?=(int)$item['pst']/100?>   </td>
            <td> $<?=(int)$item['gst']/100?>   </td>
            <td> $<?=$total?>                  </td>
        </tr>

        </tbody>
        <form action="update_read.php" method="post">
        <tfoot>
            <tr>
                <td>
                    <div>
                         <div class="mb-3">
                             <label for="id" class="form-label">Id:</label>
                             <input type="text" class="form-control field" id="id" aria-describedby="id" name="id" readonly value="<?=$item['id']?>">

                         </div>
                    </div>
                </td>

                <td>
                    <div>

                        <div class="mb-3">
                            <label for="item" class="form-label">Name:</label>
                            <input type="text" class="form-control field" id="item" aria-describedby="item" name="item" value="<?=$item['item']??'unknown'?>">
                        </div>

                    </div>
                </td>

                <td>
                    <div>

                            <div class="mb-3">
                                <label for="vendor" class="form-label">Vendor:</label>
                                <input type="text" class="form-control field" id="vendor" aria-describedby="vendor" name="vendor" value="<?=$item['vendor']??'unknown'?>">
                            </div>

                    </div>
                </td>

                <td>
                    <div>
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
                    <div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price:</label>
                                <input type="text" class="form-control field" id="price" aria-describedby="price" name="price" value="$<?=(int)$item['price']/100?>">
                            </div>

                    </div>
                </td>

                <td>
                    <div>
                            <div class="mb-3">
                                <label for="pst" class="form-label">PST:</label>
                                <input type="text" class="form-control field" id="pst" aria-describedby="pst" name="pst" value="$<?=(int)$item['pst']/100?>">
                            </div>

                    </div>
                </td>
                <td>
                    <div>
                            <div class="mb-3">
                                <label for="gst" class="form-label">GST:</label>
                                <input type="text" class="form-control field" id="gst" aria-describedby="gst" name="gst" value="$<?=(int)$item['gst']/100?>">
                            </div>

                    </div>
                </td>

                <td>
                    <div>
                            <div class="mb-3">
                                <label for="pst" class="form-label">PST:</label>
                                <input type="text" class="form-control field" id="pst" aria-describedby="gst" name="pst" value="$<?=(int)$item['pst']/100?>">
                            </div>

                    </div>
                </td>

                <td>
                    <div>
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

<!--<fieldset>-->
<!--    <div>-->
<!--        <form action="update_row.php" method="post">-->
<!---->
<!--            <div class="mb-3">-->
<!--                <div id="vendor" class="form-text">Name of vendor.</div>-->
<!--                <label for="vendor" class="form-label">Vendor </label>-->
<!--                <input type="text" class="form-control field" id="vendor" aria-describedby="vendor" name="vendor">-->
<!--            </div>-->
<!--            <br>-->
<!--            <div class="mb-3">-->
<!--                <label for="item" class="form-label">Item name</label>-->
<!--                <div id="item" class="form-text">Enter the name of the item from your receipt.</div>-->
<!--                <input type="text" class="form-control field" id="item" aria-describedby="item" name="item">-->
<!--            </div>-->
<!--            <br>-->
<!--            --><?php //include 'create_entry.php'; ?>
<!--            <div class="mb-3">-->
<!--                <div id="category" class="form-text">Receipt Category</div>-->
<!--                <label for="category" class="form-label">Category:</label>-->
<!--                <select class="form-select field" aria-label="category" name="category">-->
<!--                        --><?php //foreach ($categories as $cat) : ?>
<!--                        <option value="--><?php //echo $cat ?><!--"> --><?php //echo $cat ?><!-- </option>-->
<!--                    --><?php //endforeach; ?>
<!--                </select>-->
<!--            </div>-->
<!--            <br>-->
<!--            <div class="mb-3">-->
<!--                <div id="price" class="form-text">Item price.</div>-->
<!--                <label for="price" class="form-label">Price</label>-->
<!--                <input type="number" step="0.01" min="0.00" class="form-control field" id="price" aria-describedby="price" name="price">-->
<!--            </div>-->
<!--            <br>-->
<!--            <div class="mb-3">-->
<!--                <div id="gst" class="form-text">GST on Item.</div>-->
<!--                <label for="gst" class="form-label">GST</label>-->
<!--                <input type="number" step="0.01" min="0.00" class="form-control field" id="gst" aria-describedby="gst" name="gst">-->
<!--            </div>-->
<!--            <br>-->
<!--            <div class="mb-3">-->
<!--                <label for="gst" class="form-label">PST</label>-->
<!--                <input type="number" step="0.01" min="0.00" class="form-control field" id="price" aria-describedby="price" name="pst">-->
<!--                <div id="gst" class="form-text">PST on Item</div>-->
<!--            </div>-->
<!--            <br>-->
<!--            <div class="mb-3">-->
<!--                <div id="date" class="form-date">Date of Purchase</div>-->
<!--                <label for="date" class="form-label">Date</label>-->
<!--                <input type="date"  class="form-control field" id="date" aria-describedby="date" name="date">-->
<!--            </div>-->
<!--            <br>-->
<!--                    <button type="submit" class="btn">Add +</button>-->
<!--        </form>-->
<!--    </div>-->
<!--</fieldset>-->
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