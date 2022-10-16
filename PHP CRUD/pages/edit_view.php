<?php

require 'controllers/EmployeeController.php';

$obj = new EmployeeController;

if (isset($_GET['status'])) {
    if ($_GET['status'] == "edit") {
        $id = $_GET['id'];

        $employee = $obj->edit($id);
    }
}

if (isset($_POST['updateEmp'])) {
    $obj->update($_POST);
}

?>



<div class="card my-4 px-0 container">

    <div class="card-header">
        <h3>Edit: <?php echo $employee['name'] ?></h3>
    </div>

    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $employee['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input class="form-control" type="text" name="name" value="<?php echo $employee['name'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Photo</label>
                <input class="form-control" type="file" name="image">
            </div>
            <div class="mb-3">
                <label class="form-label">Designation</label>
                <input class="form-control" type="text" name="designation" value="<?php echo $employee['designation'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Salary</label>
                <input class="form-control" type="number" name="salary" value="<?php echo $employee['salary'] ?>">
            </div>
            <div class="form-check  mb-3">
                <input class="form-check-input" type="checkbox" value=1 name="status" <?php if ($employee['status'] == 1) echo 'checked' ?>>
                <label class="form-check-label" for=""> Default checkbox </label>
            </div>

            <button type="submit" class="btn btn-primary btn-block" name="updateEmp">Update Employee</button>
        </form>

    </div>
</div>