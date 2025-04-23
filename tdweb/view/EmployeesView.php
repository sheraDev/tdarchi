<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJdY5G+TwxzHPlI4vYdPTIjjNMEHZr9u69jSqtjXyNOrrD3mF2ZMQq85E5/5" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Employees List</h1>

        <!-- Tableau des employés -->
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Contact</th>
                    <th>Details</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                    <tr class="<?php echo $employee->CurrentFlag == 0 ? 'table-danger' : ''; ?>">
                        <td><?php echo htmlspecialchars($employee->EmployeeID); ?></td>
                        <td><?php echo htmlspecialchars($employee->Title); ?></td>
                        <td><?php echo htmlspecialchars($employee->Gender); ?></td>
                        <td><?php echo htmlspecialchars($employee->NationalIDNumber); ?></td>
                        <td>
                            <a href="index.php?controller=EmployeeController&method=listOne&id=<?php echo $employee->EmployeeID; ?>" class="btn btn-info btn-sm">Display</a>
                        </td>
                        <td>
                            <?php if ($employee->CurrentFlag == 1): ?>
                                <a href="index.php?controller=EmployeeController&method=delete&id=<?php echo $employee->EmployeeID; ?>" class="btn btn-danger btn-sm">Deactivate</a>
                            <?php else: ?>
                                <span class="text-muted">Deleted</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0aPnnT1+F0vwrG6rWxXW9jolJ9jyXTlyOeJHf3ls9rx61IuZz" crossorigin="anonymous"></script>
</body>
</html>
