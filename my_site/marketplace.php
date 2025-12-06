<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Cameron Fougere">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>marketplace</title>
  <link rel="stylesheet" href="my_style.css">
  <script src="1-marketplace.js"></script>
</head>
<body>

<?php include 'nav.php'; ?>


  
   <script>
        // Test code here
        let myCart = new Cart();
        myCart.showTotalAmount();

        let pants = new ItemGroup("Pants", 10.05, 15);
        myCart.addItemGroup(pants);
        myCart.showTotalAmount();

        let coat = new ItemGroup("Coat", 99.99, 1);
        myCart.addItemGroup(coat);
        myCart.showTotalAmount();
    </script>
	


  
  <?php include 'footer.php'; ?>
  
  </body>
  