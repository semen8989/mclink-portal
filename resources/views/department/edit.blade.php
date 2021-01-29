@extends('layout.master')

@section('content')
<div class="card-header">Add New Department</div>
<form method="POST" action="{{ route('department.update',$department->id) }}" novalidate>
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="department_name">Department Name</label>
                    <input class="form-control @error('department_name') is-invalid @enderror" name="department_name" 
                        value="{{ old('department_name',$department->department_name) }}" type="text" placeholder="Enter Department Name">
                    @error('department_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select class="form-control @error('company_id') is-invalid @enderror" name="company_id" data-placeholder="Company">
                            <option value="" disabled selected>Select Company</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ old('company_id',$department->id) == $company->id ? 'selected' : '' }}>
                                {{ $company->company_name }}
                            </option>        
                        @endforeach 
                    </select>
                    @error('company_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="user_id">Department Head</label>
                    <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" data-placeholder="Department Head">
                            <option value="" disabled selected>Select Department Head</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('employee_id',$department->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>        
                        @endforeach 
                    </select>
                    @error('employee_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
</form>
@endsection
