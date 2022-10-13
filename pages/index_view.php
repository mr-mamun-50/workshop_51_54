<?php

require 'controllers/EmployeeController.php';

$obj = new EmployeeController;

$employees = $obj->index();

if (isset($_GET['status'])) {
    if ($_GET['status'] == "delete") {
        $id = $_GET['id'];

        $obj->destroy($id);
    }
}

?>


<div class="card my-4 px-0 container">

    <div class="card-header">
        <h3>All Employees</h3>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Salary</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php while ($employee = mysqli_fetch_assoc($employees)) { ?>

                    <tr>
                        <td><?php echo $employee['id'] ?></td>
                        <td>
                            <img src="uploads/<?php echo $employee['image'] ?>" alt="" style="width:100px">
                        </td>
                        <td><?php echo $employee['name'] ?></td>
                        <td><?php echo $employee['designation'] ?></td>
                        <td><?php echo $employee['salary'] ?></td>
                        <td>
                            <?php if ($employee['status'] == 1) { ?>
                                <span class="badge bg-success">active</span>
                            <?php } else { ?>
                                <span class="badge bg-warning">inactive</span>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="./edit.php?status=edit&&id=<?php echo $employee['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="?status=delete&&id=<?php echo $employee['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>
</div>