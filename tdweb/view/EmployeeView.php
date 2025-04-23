<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Employee Details</h1>

        <?php if ($employee): ?>
            <div class="card <?php echo ($employee->CurrentFlag == 0) ? 'border-danger' : ''; ?>">
                <div class="card-header <?php echo ($employee->CurrentFlag == 0) ? 'bg-danger text-white' : 'bg-primary text-white'; ?>">
                    <h5 class="card-title">
                        <?php echo htmlspecialchars($employee->Title); ?>
                    </h5>
                </div>
                <div class="card-body">
                    <p><strong>Employee ID:</strong> <?php echo htmlspecialchars($employee->EmployeeID); ?></p>
                    <p><strong>National ID Number:</strong> <?php echo htmlspecialchars($employee->NationalIDNumber); ?></p>
                    <p><strong>Login ID:</strong> <?php echo htmlspecialchars($employee->LoginID); ?></p>
                    <p><strong>Birth Date:</strong> <?php echo date('Y-m-d', strtotime($employee->BirthDate)); ?></p>
                    <p><strong>Gender:</strong> <?php echo htmlspecialchars($employee->Gender); ?></p>
                    <p><strong>Hire Date:</strong> <?php echo date('Y-m-d', strtotime($employee->HireDate)); ?></p>
                    <p><strong>Marital Status:</strong> <?php echo htmlspecialchars($employee->MaritalStatus); ?></p>
                    <p><strong>Vacation Hours:</strong> <?php echo htmlspecialchars($employee->VacationHours); ?> hours</p>
                    <p><strong>Sick Leave Hours:</strong> <?php echo htmlspecialchars($employee->SickLeaveHours); ?> hours</p>
                    <p><strong>Employee Status:</strong> 
                        <span class="badge <?php echo ($employee->CurrentFlag == 0) ? 'bg-danger' : 'bg-success'; ?>">
                            <?php echo ($employee->CurrentFlag == 0) ? 'Inactive' : 'Active'; ?>
                        </span>
                    </p>
                </div>
                
                <div class="card-footer">
                    <a href="index.php?controller=EmployeeController&method=listAll" class="btn btn-secondary btn-sm">Back to Employees List</a>

                    <?php if ($employee->CurrentFlag == 1): ?>
                        <a href="index.php?controller=EmployeeController&method=delete&id=<?php echo $employee->EmployeeID; ?>" 
                           class="btn btn-warning btn-sm">
                            Delete
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">
                Employee not found.
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
