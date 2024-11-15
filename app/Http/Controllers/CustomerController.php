<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class CustomerController extends Controller
{
    public function index()
    {

        $customers = User::all();
        return view('customers.index', compact('customers'));
    }

    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('customers.index')->with('success', 'client DELETED successfully');
    }

    public function edit($id)
    {

        $customer = User::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        //simple validation/update form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $customer = User::findOrFail($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->save();



        return redirect()->route('customers.index')->with('success', 'client UPDATED successfully');
    }
}
