<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
{
    $query = Employee::with('company');

    if ($request->search) {
        $query->where(function($q) use ($request) {
            $q->where('first_name', 'like', '%'.$request->search.'%')
              ->orWhere('last_name', 'like', '%'.$request->search.'%')
              ->orWhere('email', 'like', '%'.$request->search.'%');
        });
    }

    if ($request->company_id) {
        $query->where('company_id', $request->company_id);
    }

    $employees = $query->latest()->paginate(10);
    $companies = Company::all();

    return view('employees.index', compact('employees', 'companies'));
}

    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->validated());
        return redirect()->route('employees.index')
                         ->with('success', 'Employee created successfully!');
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect()->route('employees.index')
                         ->with('success', 'Employee updated successfully!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete(); // Soft delete
        return redirect()->route('employees.index')
                         ->with('success', 'Employee soft-deleted successfully!');
    }
    public function trashed()
{
    $employees = Employee::onlyTrashed()->with('company')->paginate(10);
    return view('employees.trashed', compact('employees'));
}

public function restore($id)
{
    $employee = Employee::onlyTrashed()->findOrFail($id);
    $employee->restore();
    return redirect()->route('employees.index')->with('success', 'Employee restored!');
}
    
}