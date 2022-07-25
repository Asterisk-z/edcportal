<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FacultyManagement extends Controller
{
    public function index() {


        return Inertia::render('Admin/Faculty', [
            'faculties' => Faculty::orderBy('created_at', 'DESC')->paginate(10)->withQueryString()->through(fn ($faculty) => [
                'id' => $faculty->id,
                'name' =>  $faculty->name
            ]),
        ]);
    }

    public function add(Request $request) {

        $data = $request->validate([
            'name' => 'required|string|unique:faculties'
        ]);

        $save = Faculty::create($data);

        return redirect()->route('admin.faculty');
    }
}
