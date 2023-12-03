<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function manage_admin(){
        return view('admin.pages.blogAdmin.manage-blogAdmin',[
            'heads'=>User::find(1)->first(),
        ]);
    }

    public function edit_admin($id){
        return view ('admin.pages.blogAdmin.edit-blogAdmin',[
            'heads'=>User::find($id)
        ]);
    }

    public function updateAdmin(Request $request)
    {
        // Validate the form data

        $validatedData = $request->validate([
            'id' => 'required',
            'name' => 'required|string',
            'email' => 'required|email',
            'old_pass' => 'required',
            'new_pass' => 'required',
            'conform_pass' => 'required|same:new_pass',
        ]);

        $admin = User::find($request->id); // Replace "User" with your model name

        if (!$admin) {
            // Handle the case where the administrator is not found
            return redirect()->back()->with('error', 'Administrator not found');
        }

        if (Hash::check($request->old_pass, $admin->password)) {
            // Old password matches the hashed password in the database
            // Update the administrator's information and password
            User::updateAdmin($request,$admin);

            return redirect()->back()->with('message', 'Administrator updated successfully');

        } else {
            // Old password doesn't match
            return redirect()->back()->with('error', 'Old password is incorrect');
        }
    }



}
