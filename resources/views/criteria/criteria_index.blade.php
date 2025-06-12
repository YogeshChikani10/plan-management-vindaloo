@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Card Box -->
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h5 class="mb-0" id="title-tag">Add Eligibility Criteria</h5>
                </div>

                <div class="card-body">
                    <form id="criteriaForm">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required>
                                <input type="hidden" name="id" id="criteria_id" class="form-control" >
                            </div>

                            <div class="col-6">
                                <label for="last_login_days_ago" class="form-label">Last Login Days Ago</label>
                                <input type="number" name="last_login_days_ago" id="last_login_days_ago" class="form-control" placeholder="Enter Last Login Days Ago" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="age_less_than" class="form-label">Age Less Than</label>
                                <input type="number" name="age_less_than" id="age_less_than" class="form-control" placeholder="Enter plan Age Less Than" required>
                            </div>
                            <div class="col-6">
                                <label for="age_greater_than" class="form-label">Age Greater Than</label>
                                <input type="number" name="age_greater_than" id="age_greater_than" class="form-control" placeholder="Enter Age Greater Than" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                        
                            <div class="col-6">
                                <label for="income_less_than" class="form-label">Income Less Than</label>
                                <input type="number" name="income_less_than" id="income_less_than" class="form-control" placeholder="Enter Income Less Than (in year)" required>
                            </div>
    
                            <div class="col-6">
                                <label for="income_greater_than" class="form-label">Income Greater Than</label>
                                <input type="number" name="income_greater_than" id="income_greater_than" class="form-control" placeholder="Enter Income greater Than (in year)" required>
                            </div>
                        </div>
                        

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success px-4" id="btn-tag">Save Criteria</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Heading Below Card -->
            <div class="mt-4">
                <h4 class="fw-bold">Criteria List</h4>
                <!-- Table or List will go here -->
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age Greater Than</th>
                            <th>Age Less Than</th>
                            <th>Income Greater Than</th>
                            <th>Income Less Than</th>
                            <th>Last Login Days Ago</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($criteria as $val)
                            <tr>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->age_greater_than }}</td>
                                <td>{{ $val->age_less_than }}</td>
                                <td>{{ $val->income_greater_than }}</td>
                                <td>{{ $val->income_less_than }}</td>
                                <td>{{ $val->last_login_days_ago }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning editCriteria" data-id="{{$val->id}}">Edit</button>
                                    <button class="btn btn-sm btn-danger deleteCriteria" data-id="{{$val->id}}">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"><center>No Data Available!</center></td>
                            </tr>
                        @endforelse 
                    </tbody>
                </table>
                {{$criteria->links()}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/criteria.js') }}" ></script>
@endsection

