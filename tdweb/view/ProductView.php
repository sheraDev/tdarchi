<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJdY5G+TwxzHPlI4vYdPTIjjNMEHZr9u69jSqtjXyNOrrD3mF2ZMQq85E5/5" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Product Details</h1>
        
        <?php if ($product): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card <?php echo $product->FinishedGoodsFlag == 1 ? 'border-danger' : ''; ?>">
                        <div class="card-header <?php echo $product->FinishedGoodsFlag == 1 ? 'bg-danger text-white' : 'bg-primary text-white'; ?>">
                            <h5 class="card-title"><?php echo htmlspecialchars($product->Name); ?></h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Product ID:</strong> <?php echo htmlspecialchars($product->ProductID); ?></p>
                            <p><strong>Product Number:</strong> <?php echo htmlspecialchars($product->ProductNumber); ?></p>
                            <p><strong>Color:</strong> <?php echo htmlspecialchars($product->Color); ?></p>
                            <p><strong>Price:</strong> $<?php echo number_format($product->ListPrice, 2); ?></p>
                            <p><strong>Size:</strong> <?php echo htmlspecialchars($product->Size); ?></p>
                            <p><strong>Weight:</strong> <?php echo htmlspecialchars($product->Weight); ?> lbs</p>
                            <p><strong>Reorder Point:</strong> <?php echo htmlspecialchars($product->ReorderPoint); ?></p>
                            <p><strong>Safety Stock Level:</strong> <?php echo htmlspecialchars($product->SafetyStockLevel); ?></p>
                            <p><strong>Days to Manufacture:</strong> <?php echo htmlspecialchars($product->DaysToManufacture); ?> days</p>
                            <p><strong>Product Line:</strong> <?php echo htmlspecialchars($product->ProductLine); ?></p>
                            <p><strong>Class:</strong> <?php echo htmlspecialchars($product->Class); ?></p>
                            <p><strong>Style:</strong> <?php echo htmlspecialchars($product->Style); ?></p>
                            <p><strong>MakeFlag:</strong> <?php echo htmlspecialchars($product->MakeFlag); ?></p>
                            <p><strong>FinishedGoodsFlag:</strong> <?php echo htmlspecialchars($product->FinishedGoodsFlag); ?></p>

                           



                            <p><strong>Sell Start Date:</strong> <?php echo date('Y-m-d H:i:s', strtotime($product->SellStartDate)); ?></p>
                            <?php if ($product->SellEndDate): ?>
                                <p><strong>Sell End Date:</strong> <?php echo date('Y-m-d H:i:s', strtotime($product->SellEndDate)); ?></p>
                            <?php endif; ?>
                            <?php if ($product->DiscontinuedDate): ?>
                                <p><strong>Discontinued Date:</strong> <?php echo date('Y-m-d H:i:s', strtotime($product->DiscontinuedDate)); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer">
                            <a href="index.php?controller=ProductController&method=listAll" class="btn btn-secondary btn-sm">Back to Product List</a>

                            <?php if ($product->FinishedGoodsFlag == 0): ?>
                                <a href="index.php?controller=ProductController&method=delete&id=<?php echo $product->ProductID; ?>" class="btn btn-danger btn-sm">Deactivate</a>
                            <?php else: ?>
                                <span class="text-muted">Deactivated</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">
                Product not found.
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0aPnnT1+F0vwrG6rWxXW9jolJ9jyXTlyOeJHf3ls9rx61IuZz" crossorigin="anonymous"></script>
</body>
</html>
