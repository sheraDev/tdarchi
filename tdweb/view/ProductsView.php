<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJdY5G+TwxzHPlI4vYdPTIjjNMEHZr9u69jSqtjXyNOrrD3mF2ZMQq85E5/5" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5">
        <h1>Product List</h1>
        
        <?php if (!empty($products)): ?>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr class="<?php echo $product->FinishedGoodsFlag == 1 ? 'table-danger' : ''; ?>">
                            <td><?php echo htmlspecialchars($product->ProductID); ?></td>
                            <td><?php echo htmlspecialchars($product->Name); ?></td>
                            <td>$<?php echo number_format($product->ListPrice, 2); ?></td>
                            <td>
                                <a href="index.php?controller=ProductController&method=listOne&id=<?php echo $product->ProductID; ?>" class="btn btn-primary btn-sm">View Details</a>
                                
                                <?php if ($product->FinishedGoodsFlag == 0): ?>
                                    <a href="index.php?controller=ProductController&method=delete&id=<?php echo $product->ProductID; ?>" class="btn btn-danger btn-sm">Deactivate</a>
                                <?php else: ?>
                                    <span class="text-muted">Deactivated</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No products available.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0aPnnT1+F0vwrG6rWxXW9jolJ9jyXTlyOeJHf3ls9rx61IuZz" crossorigin="anonymous"></script>
</body>
</html>
