@extends('layouts.app')

@section('mainpart')
    <div class="card my-4 px-0 container">

        <div class="card-header">
            <h3>Edit Employees</h3>
        </div>

        <div class="card-body">

            <form action={{ route('employee.update', $employee->id) }} method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input class="form-control" type="text" name="name" value={{ $employee->name }}>
                </div>
                <div class="mb-3">
                    <label class="form-label">Photo</label>
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="mb-3">
                    <label class="form-label">Designation</label>
                    <input class="form-control" type="text" name="designation" value={{ $employee->designation }}>
                </div>
                <div class="mb-3">
                    <label class="form-label">Salary</label>
                    <input class="form-control" type="number" name="salary" value={{ $employee->salary }}>
                </div>
                <div class="form-check  mb-3">
                    <input class="form-check-input" type="checkbox" value=1 name="status"
                        @if ($employee->status == 1) checked @endif>

                    <label class="form-check-label" for=""> Default checkbox </label>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Add Employee</button>
            </form>

        </div>
    </div>
@endsection
