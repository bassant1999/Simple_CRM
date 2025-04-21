<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CustomerAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $employees = User::where('type', 'employee')->get();

        return view('customer.dashboard', compact('employees'));
    }

    // public function create()
    // {
    //     return view('customer.create');
    // }

    public function store(Request $request)
    {

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'type'     => 'customer',
        ]);

        return redirect()->back()->with('success', 'Customer created successfully.');
    }

    public function assignToEmployee(Request $request)
    {
        // Validate the request
         $request->validate([
            'customer_id' => 'required|exists:users,id',
            'employee_id' => 'required|exists:users,id',
        ]);

        // Find the customer and employee
        $customer = User::findOrFail($request->customer_id);
        $employee = User::findOrFail($request->employee_id);

        // Assign customer to employee
        $employee->customers()->attach($customer);

        return redirect()->back()->with('success', 'Customer assigned to employee successfully.');
    }

    public function addAction(Request $request) 
    {
    //    // Validate the incoming request data
    //     $validated = $request->validate([
    //         'customer_id' => ['required', 'exists:users,id'], 
    //         'type' => ['required'],
    //         'result' => ['required', 'string'],
    //     ]);

    //     // Find the customer and employee
    //     $customer = User::findOrFail($request->customer_id);
    
        // Add Action
        $customerAction = new CustomerAction();
        $customerAction->customer_id = $request->customer_id;
        $customerAction->employee_id = Auth::id();
        $customerAction->type = $request->type;
        $customerAction->result = $request->result;
        $customerAction->save();
    
        return redirect()->back()->with('success', 'Action added successfully.');
    }
}
