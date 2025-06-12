@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card Box -->
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h5 class="mb-0" id="title-tag">Add Plan</h5>
                </div>

                <div class="card-body">
                    <form id="planForm">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Plan Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter plan name" required>
                            <input type="hidden" name="id" id="plan_id" class="form-control" >
                        </div>
                        
                        <div class="mb-3">
                            <label for="price" class="form-label">Plan Price</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="Enter plan price" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success px-4" id="btn-tag">Save Plan</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Heading Below Card -->
            <div class="mt-4">
                <h4 class="fw-bold">Plan List</h4>
                <!-- Table or List will go here -->
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($plan as $val)
                            <tr>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->price }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning editPlan" data-id="{{$val->id}}">Edit</button>
                                    <button class="btn btn-sm btn-danger deletePlan" data-id="{{$val->id}}">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3"><center>No Data Available!</center></td>
                            </tr>
                        @endforelse 
                    </tbody>
                </table>
                {{$plan->links()}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/plan.js') }}" ></script>
@endsection

