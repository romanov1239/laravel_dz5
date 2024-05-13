<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('get-employee-data');

    }
    public function editTemplate($id)
    {
        $employee = session('employee', []);

        if ($employee && $employee['id'] == $id) {
            return view('get-employee-data', ['employee' => (object)$employee]);
        } else {
            return 'Работник не найден';
        }
    }
    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $surname = $request->input('surname');
        $position = $request->input('position');
        $address = $request->input('address');
        $jsonData = $request->input('json_data');
        $data = json_decode($jsonData, true);
        $hobby = $data['hobby'] ?? null;
        $department = $data['department'] ?? null;
        $path = $request->path();
        $url = $request->url();

        $id = $request->session()->get('employee_id', 0) + 1;
        $request->session()->put('employee_id', $id);

        $request->session()->put('employee', [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'surname' => $surname,
            'position' => $position,
            'address' => $address,
            'hobby' => $hobby,
            'department' => $department,
            'path' => $path,
            'url' => $url
        ]);

        return view('get-employee-data', $request->session()->get('employee'));
    }


    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $surname = $request->input('surname');
        $position = $request->input('position');
        $address = $request->input('address');
        $jsonData = $request->input('json_data');
        $data = json_decode($jsonData, true);
        $hobby = $data['hobby'] ?? null;
        $department = $data['department'] ?? null;
        $path = $request->path();
        $url = $request->url();

        $employeeData = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'surname' => $surname,
            'position' => $position,
            'address' => $address,
            'hobby' => $hobby,
            'department' => $department,
            'path' => $path,
            'url' => $url
        ];

        $request->session()->put('employee', $employeeData);

        return view('get-employee-data', ['employee' => (object)$employeeData]);
    }


    public function getPath(Request $request)
    {
        $path = $request->path();

    }
    public function getUrl(Request $request)
    {
        $url = $request->url();

    }

}
