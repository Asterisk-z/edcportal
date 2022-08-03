<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Inertia\Inertia;

class DepartmentManagement extends Controller
{
    public function index() {

        return Inertia::render('Admin/Departments', [
            'faculties' => Department::orderBy('name', 'asc')->paginate(10)->withQueryString()->through(fn ($department) => [
                'id' => $department->id,
                'name' =>  $department->name
            ]),
        ]);

    }
    public function listByFaculty() {
        return Department::where('faculty_id', request('faculty_id'))->orderBy('name', 'asc')->get();
    }
}
