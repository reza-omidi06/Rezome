<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;


class AdminPanelController extends Controller
{
    /**
     * Display the login view.
     *
     **/
    public function create(): View
    {
        return view('auth.login');
    }
    public function PanelController(Request $request)
    {
        $user = $request->user();
        if ($user && $user->is_admin) {
            $success = array(
                'message'=>'Welcome to the admin panel',
                'alert-type'=>'success'
            );
            return view('admin.dashboard') ->with($success)
                ->with('alert-type', 'success');
        } else {
            $faill = array(
                'message'=>'You do not have access to the panel',
                'alert-type'=>'error'
            );
            return redirect()->route('home')->with($faill);
        }

   }

   public function Showform(){
       return view('auth.licence');
   }
//    public function UpdateLicence(Request $request)
//    {
//        // Validate the input fields
//        $request->validate([
//            'licence_code' => 'required',
//            'name' => 'required|string|max:255',
//            'lastname' => 'required|string|max:255',
//            'field_of_activity' => 'required|string|max:255',
//            'company_name' => 'nullable|string|max:255',
//        ]);
//
//        $validLicenceCode = '1234'; // Define your valid license code
//
//        // Check if the provided license code is valid
//        if ($request->licence_code === $validLicenceCode) {
//            // Create or update the license record
//            $license = License::updateOrCreate(
//                ['licence_code' => $request->licence_code], // Find the existing record or create a new one
//                [
//                    'name' => $request->name,
//                    'lastname' => $request->lastname,
//                    'field_of_activity' => $request->field_of_activity,
//                    'company_name' => $request->company_name,
//                ]
//            );
//
//            // Redirect to the register page (or any other protected page)
//            return redirect()->route('register');
//        } else {
//            // Return an error message and stay on the license entry page
//            return redirect()->route('licence')->withErrors(['licence_code' => 'Invalid license code.']);
//        }
//    }

//    public function UpdateLicence(Request $request)
//    {
//        // For debugging purposes
//        \Log::info('UpdateLicence request:', $request->all());
//        return response()->json(['status' => 'Request received']);
//    }
//    public function UpdateLicence(Request $request)
//    {
//        // Validate the input fields
//        $request->validate([
//            'licence_code' => 'required',
//            'name' => 'required|string|max:255',
//            'lastname' => 'required|string|max:255',
//            'field_of_activity' => 'required|string|max:255',
//            'company_name' => 'nullable|string|max:255',
//        ]);
//
//        $validLicenceCode = '1234'; // Define your valid license code
//
//        // Check if the provided license code is valid
//        if ($request->licence_code === $validLicenceCode) {
//            // Check if a record with the same licence_code already exists
//            $license = License::where('licence_code', $request->licence_code)->first();
//
//            if ($license) {
//                // If a record exists, return an error message
//                return redirect()->route('licence')->withErrors(['licence_code' => 'کد لایسنس قبلا استفاده شده است.']);
//            } else {
//                // Create a new license record
//                License::create([
//                    'name' => $request->name,
//                    'lastname' => $request->lastname,
//                    'field_of_activity' => $request->field_of_activity,
//                    'company_name' => $request->company_name,
//                    'licence_code' => $request->licence_code,
//                ]);
//
//                // Redirect to the register page (or any other protected page)
//                return redirect()->route('login');
//            }
//        } else {
//            // Return an error message and stay on the license entry page
//            return redirect()->route('licence')->withErrors(['licence_code' => 'کد لایسنس نامعتبر است.']);
//        }
//    }
//    public function UpdateLicence(Request $request)
//    {
//        // Validate the input fields
//        $request->validate([
//            'licence_code' => 'required',
//            'name' => 'required|string|max:255',
//            'lastname' => 'required|string|max:255',
//            'field_of_activity' => 'required|string|max:255',
//            'company_name' => 'nullable|string|max:255',
//        ]);
//
//        $validLicenceCode = '1234'; // Define your valid license code
//
//        // Check if the provided license code is valid
//        if ($request->licence_code === $validLicenceCode) {
//            // Check if a record with the same licence_code already exists
//            $license = License::where('licence_code', $request->licence_code)->first();
//
//            if ($license) {
//                // If a record exists, return an error message
//                return redirect()->route('licence')->withErrors(['licence_code' => 'کد لایسنس قبلا استفاده شده است.']);
//            } else {
//                // Create a new license record
//                License::create([
//                    'name' => $request->name,
//                    'lastname' => $request->lastname,
//                    'field_of_activity' => $request->field_of_activity,
//                    'company_name' => $request->company_name,
//                    'licence_code' => $request->licence_code,
//                ]);
//
//                // Redirect to the register page (or any other protected page)
//                return redirect()->route('register');
//            }
//        } else {
//            // Return an error message and stay on the license entry page
//            return redirect()->route('licence')->withErrors(['licence_code' => 'کد لایسنس نامعتبر است.']);
//        }
//    }

    public function UpdateLicence(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'licence_code' => 'required',
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'field_of_activity' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
        ]);

        $validLicenceCode = '0xqgzc60Q5CprU57qa*Zc#j/[y'; // Define your valid license code

        // Check if the provided license code is valid
        if ($request->licence_code === $validLicenceCode) {
            // Check if a record with the same licence_code already exists
            $license = License::where('licence_code', $request->licence_code)->first();

            if ($license) {
                // If a record exists, return an error message
                return redirect()->route('licence')->withErrors(['licence_code' => 'کد لایسنس قبلا استفاده شده است.']);
            } else {
                // Create a new license record
                License::create([
                    'name' => $request->name,
                    'lastname' => $request->lastname,
                    'field_of_activity' => $request->field_of_activity,
                    'company_name' => $request->company_name,
                    'licence_code' => $request->licence_code,
                ]);

                // Redirect to the register page (or any other protected page)
                return redirect()->route('login');
            }
        } else {
            // Return an error message and stay on the license entry page
            return redirect()->route('licence')->withErrors(['licence_code' => 'کد لایسنس نامعتبر است.']);
        }
    }


}
