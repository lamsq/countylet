<?php
//Initialize variables
$type = $description = $mon_rent = $eircode = $address = '';
?>





<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Add Property</title>

  </head>
  <body>
    <header>


    <div class="container">
     <h2 class="mt-5 text-center">Add Property</h2>


      <div class="row">

        <div class="col-md-6 offset-md-3">
          <!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" novalidate class="mt-3"> -->

            <!-- <form action="action_page.php" method="POST" enctype="multipart/form-data" novalidate class="mt-3"> -->
            <form action="new_property.php" method="POST" enctype="multipart/form-data" novalidate class="mt-3">

            <div class="form_group">
                <label for="type">Type:</label>
                <input type="text" id="type" name="type" value="<?php echo $type; ?>" class="form-control" required>
            </div>

            <label for="bedrooms">Bedrooms:</label>
               <select id="bedrooms" name="bedrooms">
                   <option value="1">1 Bed</option>
                   <option value="2">2 Bed</option>
                   <option value="3">3 Bed</option>
                   <option value="4">4 Bed</option>
               </select>

               <br>

          <label for="tenancy">Tenancy:</label>
              <select id="tenancy" name="tenancy">
                  <option value="3">3 month</option>
                  <option value="6">6 month</option>
                  <option value="12">1 year</option>
              </select>

          <div class="form_group">
              <label for="mon_rent">Month Rent:</label>
              <input type="number" id="mon_rent" name="mon_rent" value="<?php echo $mon_rent; ?>" class="form-control" required>
          </div>

          <div class="form_group">
              <label for="description">Description</label>
              <input type="text" id="description" name="description" value="<?php echo $description; ?>" class="form-control" required>
          </div>

          <div class="form_group">
              <label for="eircode">Eircode</label>
              <input type="text" id="eircode" name="eircode" value="<?php echo $eircode; ?>" class="form-control" required>
          </div>

          <div class="form_group">
              <label for="address">Address</label>
              <input type="text" id="address" name="address" value="<?php echo $address; ?>" class="form-control" required>
          </div>


    <!-- <form action="" method="POST" enctype="multipart/form-data">
        <label for="photo">Select photo:</label>
        <input type="file" name="photo" id="photo" accept="image/*" required>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> -->

    <!-- <form action="action_page.php" method="POST" enctype="multipart/form-data">
  <input type="file" id="file" name="filename">
  <button type="submit" name="submit">Submit</button>
</form> -->

<!-- <form action="action_page.php" method="POST" enctype="multipart/form-data"> -->
    <input type="file" name="file" required><br>
    <button type="submit" name="submit">Submit</button>
    <!-- <input type="file" name="file[]" multiple required><br>
    <button type="submit" name="submit">Submit</button> -->

<!-- </form> -->


            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
          </form>
        </div>
        <!-- End of column -->
      </div>
      <!-- End of row -->

    </div>

</body>
</html>
