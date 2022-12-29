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
<div>
<fieldset>
    <div>
        <form action="create_entry.php" method="post">

            <div class="mb-3">
                <label for="vendor" class="form-label">Vendor </label>
                <input type="text" class="form-control field" id="vendor" aria-describedby="vendor" name="vendor">
                <div id="vendor" class="form-text">Name of vendor.</div>
            </div>

            <div class="mb-3">
                <label for="item" class="form-label">Item name</label>
                <input type="text" class="form-control field" id="item" aria-describedby="item" name="item">
                <div id="item" class="form-text">Enter the name of the item from your receipt.</div>
            </div>

            <?php include 'create_entry.php'; ?>
            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <select class="form-select field" aria-label="category" name="category">
                    <?php foreach ($categories as $cat) : ?>
                        <option value="<?php echo $cat ?>"> <?php echo $cat ?> </option>
                    <?php endforeach; ?>
                </select>
                <div id="category" class="form-text">Receipt Category</div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" min="0.00" class="form-control field" id="price" aria-describedby="price" name="price">
                <div id="price" class="form-text">line item price.</div>
            </div>


            <div class="mb-3">
                <label for="gst" class="form-label">GST</label>
                <input type="number" step="0.01" min="0.00" class="form-control field" id="gst" aria-describedby="gst" name="gst">
                <div id="gst" class="form-text">line item gst.</div>
            </div>
            <div class="mb-3">
                <label for="gst" class="form-label">PST</label>
                <input type="number" step="0.01" min="0.00" class="form-control field" id="price" aria-describedby="price" name="pst">
                <div id="gst" class="form-text">line item gst.</div>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date"  class="form-control field" id="date" aria-describedby="date" name="date">
                <div id="date" class="form-date">line item Date.</div>
            </div>

                    <button type="submit" class="btn btn-success">Add Line Item</button>
        </form>
    </div>
</fieldset>
</div>

</body>
</html>