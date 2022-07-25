<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function listByFaculty() {
        return Department::where('faculty_id', request('faculty_id'))->orderBy('name', 'asc')->get();
    }
}
