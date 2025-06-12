@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card Box -->
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h5 class="mb-0">Add Contact</h5>
                </div>

                <div class="card-body">
                    <form id="contactForm">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Contact Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter contact name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Contact Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter contact email" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Contact No.</label>
                            <input type="number" name="contact_no" id="contact_no" class="form-control" placeholder="Enter Contact number" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success px-4">Save Contact</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Heading Below Card -->
            <div class="mt-4">
                <h4 class="fw-bold">Contact List</h4>
                <!-- Table or List will go here -->
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-sm btn-warning editContact" data-id="">Edit</button>
                                    <button class="btn btn-sm btn-danger deleteContact" data-id="">Delete</button>
                                </td>
                            </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

