<?php require "./html_stubs/header.php"; ?>

<main>
<div>
    <h3>These Items are populated from the Database</h3>
    <p>ipsum Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Beatae commodi dicta dolore est laborum, omnis quod repellat repellendus sequi totam?
   </p>
</div>
<section>
<fieldset>
    <div>
        <form action="create_entry.php" method="post">

            <div class="mb-3">

                <div id="vendor" class="form-text">
                    <label for="vendor" class="form-label">Vendor:</label>
                </div>

                  <input type="text" class="form-control field" id="vendor" aria-describedby="vendor" name="vendor">
            </div>
            <br>
            <div class="mb-3">

                <div id="item">
                <label for="item" class="form-label">Name:</label>
                </div>

                <input type="text" class="form-control field" id="item" aria-describedby="item" name="item">
            </div>
            <br>
            <?php include 'categories.php'; ?>
            <div class="mb-3">

                <div id="category" class="form-text">
                    <label for="item" class="form-label">Category:</label>
                </div>

                <select class="form-select field" aria-label="category" name="category">
                        <?php foreach ($categories as $cat) : ?>
                        <option value="<?php echo $cat ?>"> <?php echo $cat ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>
            <div class="mb-3">
                <div id="price" class="form-text">Price:</div>
                <input type="number" step="0.01" min="0.00" class="form-control field" id="price" aria-describedby="price" name="price">
            </div>
            <br>
            <div class="mb-3">
                <div id="gst" class="form-text">GST Amount:</div>

                <input type="number" step="0.01" min="0.00" class="form-control field" id="gst" aria-describedby="gst" name="gst">
            </div>
            <br>
            <div class="mb-3">
                <div id="price" class="form-text">PST Amount:</div>

                <input type="number" step="0.01" min="0.00" class="form-control field" id="price" aria-describedby="price" name="pst">

            </div>
            <br>
            <div class="mb-3">
                <div id="date" class="form-date">Date of Purchase:</div>

                <input type="date"  class="form-control field" id="date" aria-describedby="date" name="date">
            </div>
            <br>
                    <button type="submit" class="btn">Add +</button>
        </form>
    </div>
</fieldset>
</section>
</main>

<?php require './html_stubs/footer.php'?>