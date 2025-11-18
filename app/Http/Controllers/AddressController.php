<?php
// app/Http/Controllers/AddressController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Show address management page
     */
    public function index()
    {
        $user = Auth::user();
        $billingAddress = $user->billingAddress;
        $shippingAddress = $user->shippingAddress;
        
        return view('pages.frontend.edit-address', compact('billingAddress', 'shippingAddress'));
    }

    /**
     * Show billing address form
     */
    public function editBilling()
    {
        $address = Auth::user()->billingAddress ?? new Address();
        
        return view('pages.frontend.billing-address', compact('address'));
    }

    /**
     * Show shipping address form
     */
    public function editShipping()
    {
        $address = Auth::user()->shippingAddress ?? new Address();
        
        return view('pages.frontend.shipping-address', compact('address'));
    }

    /**
     * Save billing address
     */
    public function updateBilling(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'street_address' => 'required|string|max:500',
            'apartment' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $user = Auth::user();

        // Remove existing default billing address
        Address::where('user_id', $user->id)
               ->where('type', 'billing')
               ->where('is_default', true)
               ->update(['is_default' => false]);

        // Create or update billing address
        Address::updateOrCreate(
            [
                'user_id' => $user->id,
                'type' => 'billing',
                'is_default' => true
            ],
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'company_name' => $request->company_name,
                'country' => $request->country,
                'street_address' => $request->street_address,
                'apartment' => $request->apartment,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'phone' => $request->phone,
                'email' => $request->email,
            ]
        );

        return redirect()->route('address.index')->with('success', 'Billing address updated successfully!');
    }

    /**
     * Save shipping address
     */
    public function updateShipping(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'street_address' => 'required|string|max:500',
            'apartment' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $user = Auth::user();

        // Remove existing default shipping address
        Address::where('user_id', $user->id)
               ->where('type', 'shipping')
               ->where('is_default', true)
               ->update(['is_default' => false]);

        // Create or update shipping address
        Address::updateOrCreate(
            [
                'user_id' => $user->id,
                'type' => 'shipping',
                'is_default' => true
            ],
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'company_name' => $request->company_name,
                'country' => $request->country,
                'street_address' => $request->street_address,
                'apartment' => $request->apartment,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'phone' => $request->phone,
                'email' => $request->email,
            ]
        );

        return redirect()->route('address.index')->with('success', 'Shipping address updated successfully!');
    }
}