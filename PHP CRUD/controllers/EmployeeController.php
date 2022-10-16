<?php

require 'ConnectionController.php';

class EmployeeController extends ConnectionController
{

    public function index()
    {
        $query = "SELECT * FROM employees";

        if (mysqli_query($this->conn, $query)) {
            $data = mysqli_query($this->conn, $query);

            return $data;
        }
    }


    public function create($data)
    {
        $name = $data['name'];
        $designation = $data['designation'];
        $salary = $data['salary'];

        if (isset($data['status'])) {
            $status = $data['status'];
        } else {
            $status = 0;
        }

        $image = $_FILES['image']['name'];
        $imgTmpName = $_FILES['image']['tmp_name'];

        $query = "INSERT INTO employees(name, image, designation, salary, status) VALUE('$name', '$image', '$designation', '$salary', '$status')";

        if (mysqli_query($this->conn, $query)) {
            move_uploaded_file($imgTmpName, 'uploads/' . $image);

            return "Information added successfully!";
        }
    }


    public function edit($id)
    {
        $query = "SELECT * FROM employees WHERE id='$id'";

        if (mysqli_query($this->conn, $query)) {
            $data_obj = mysqli_query($this->conn, $query);
            $data = mysqli_fetch_assoc($data_obj);

            return $data;
        }
    }


    public function update($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $designation = $data['designation'];
        $salary = $data['salary'];

        if (isset($data['status'])) {
            $status = $data['status'];
        } else {
            $status = 0;
        }

        if ($_FILES['image'] != null) {
            $image = $_FILES['image']['name'];
            $imgTmpName = $_FILES['image']['tmp_name'];

            $query = "UPDATE employees SET name='$name', image='$image', designation='$designation', salary='$salary', status='$status' WHERE id='$id'";


            if (mysqli_query($this->conn, $query)) {
                move_uploaded_file($imgTmpName, 'uploads/' . $image);

                header('location: index.php');
            }
        } else {
            $query = "UPDATE employees SET name='$name', designation='$designation', salary='$salary', status='$status' WHERE id='$id'";


            if (mysqli_query($this->conn, $query)) {

                header('location: index.php');
            }
        }
    }



    public function destroy($id)
    {
        $query = "DELETE FROM employees WHERE id='$id'";

        if (mysqli_query($this->conn, $query)) {
            header('location: index.php');
        }
    }
}
