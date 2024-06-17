<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Bills;

class AdminController extends Controller
{
    public function tenants()
    {
        $tenants = Tenant::get();
        return view('admin.tenants', compact('tenants'));
    }
    public function Addtenant()
    {
        return view('admin.addtenants');
    }
    public function EditTenant($id)
    {
        $tenant = Tenant::where('user_id', $id)->get();
        foreach ($tenant as $item) {
            $item->formatted_since = Carbon::parse($item->since)->format('F j, Y');
        }
        return view('admin.edittenant', compact('tenant'));
    }
    public function SubmitEditTenant(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'since' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $tenant = Tenant::where('user_id', $request->user_id)->first();
        Storage::disk('public')->delete($tenant->image);

        $imagePath = $request->file('image')->store('images', 'public');
        Tenant::where('user_id', $request->user_id)->update([
            'name' => $request->name,
            'age' => $request->age,
            'unit' => $request->unit,
            'since' => $request->since,
            'image' => $imagePath,
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.tenants')->with('success', __('validation.addTenanTsucess'));
    }
    public function deleteTenant(Request $request)
    {

        $tenant = Tenant::where('user_id', $request->user_id)->first();
        Storage::disk('public')->delete($tenant->image);

        Tenant::where('user_id', $request->user_id)->delete();
        User::where('id', $request->user_id)->delete();
        Bills::where('user_id', $request->user_id)->delete();

        return redirect()->route('admin.tenants')->with('success', __('validation.addTenanTsucess'));
    }
    public function SubmitTenant(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|min:8',
            'age' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'since' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $existingUser = User::where('email', $request->email)->first();


        $imagePath = $request->file('image')->store('images', 'public');
        if ($existingUser) {
            return redirect()->back()->with('error',  __('validation.addTenanTerror'));
        } else {
            $newuser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => now(),
            ]);

            Tenant::create([
                'user_id' => $newuser->id,
                'name' => $request->name,
                'email' => $request->email,
                'age' => $request->age,
                'unit' => $request->unit,
                'since' => $request->since,
                'image' => $imagePath,
                'created_at' => now(),
            ]);
            return redirect()->route('admin.home')->with('success', __('validation.addTenanTsucess'));
        }
    }
    public function bills()
    {
        $tenants = Tenant::get();
        return view('admin.bills', compact('tenants'));
    }

    public function AddBills($id)
    {
        $tenant = Tenant::where('user_id', $id)->get();
        foreach ($tenant as $item) {
            $item->formatted_since = Carbon::parse($item->since)->format('F j, Y');
        }
        return view('admin.addbills', compact('tenant'));
    }

    public function SubmitBills(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'month' => 'required',
            'rent' => 'required|numeric',
            'water' => 'required|numeric',
            'internet' => 'required|numeric',
            'electricity' => 'required|numeric',
            'due' => 'required|string',
        ]);
        $receiptNumber = Bills::generateReceiptNumber();

        $existingbill = Bills::where('month', $request->month)->where('user_id', $request->user_id)->latest('id')->first();
        if ($existingbill) {
            // Bills::where('month', $request->month)->where('user_id', $request->user_id)->update([
            //     'rent' => $request->rent,
            //     'water' => $request->water,
            //     'internet' => $request->internet,
            //     'electricity' => $request->electricity,
            //     'total' => $request->rent + $request->water + $request->internet + $request->electricity,
            //     'due' => $request->due,
            //     'updated_at' => now(),
            // ]);
            return redirect()->back()->with('error',  __('validation.addTenanTerror'));
        } else {
            Bills::create([
                'user_id' =>  $request->user_id,
                'receipt' => $receiptNumber,
                'month' =>  $request->month,
                'rent' => $request->rent,
                'water' => $request->water,
                'internet' => $request->internet,
                'electricity' => $request->electricity,
                'total' => $request->rent + $request->water + $request->internet + $request->electricity,
                'due' => $request->due,
                'created_at' => now(),
            ]);
        }
        return redirect()->route('admin.home')->with('success', __('validation.addTenanTsucess'));
    }
    public function transactions()
    {
        $bills = Bills::orderBy('status', 'asc')->get();
        $billsWithCustomers = [];

        foreach ($bills as $item) {
            $customer = Tenant::where('user_id', $item->user_id)->first(); // Use first() to retrieve a single customer

            $item->due = Carbon::parse($item->due)->format('F j, Y');
            $item->receiptdate = Carbon::parse($item->created_at)->format('F j, Y');
            $item->month = Carbon::createFromFormat('m', $item->month)->format('F');

            // Attach customer to the bill item
            $item->customer = $customer;
            $billsWithCustomers[] = $item;
        }

        if (!empty($billsWithCustomers)) {
            return view('admin.transaction', ['bills' => $billsWithCustomers]);
        } else {
            return view('admin.transaction', ['bills' => $bills]);
        }
    }

    public function Editbills($id)
    {

        $Bills = Bills::where('id', $id)->get();
        foreach ($Bills as $item) {
            $customer = Tenant::where('user_id', $item->user_id)->first();
            $customer->formatted_since = Carbon::parse($customer->since)->format('F j, Y');

            $Bills->id = 'ID' . $item->receipt;
        }


        return view('admin.payments', compact('Bills', 'customer'));
    }
    public function UpdateBills(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'month' => 'required',
            'rent' => 'required|numeric',
            'water' => 'required|numeric',
            'internet' => 'required|numeric',
            'electricity' => 'required|numeric',
            'due' => 'required|string',
        ]);
        Bills::where('month', $request->month)->where('user_id', $request->user_id)->update([
            'rent' => $request->rent,
            'water' => $request->water,
            'internet' => $request->internet,
            'electricity' => $request->electricity,
            'total' => $request->rent + $request->water + $request->internet + $request->electricity,
            'due' => $request->due,
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.transactions')->with('success', __('validation.addTenanTsucess'));
    }
    public function pending(Request $request)
    {
        Bills::where('id', $request->id)->update([
            'status' => 'pending',
        ]);
        return redirect()->route('admin.transactions')->with('success', __('validation.addTenanTsucess'));
    }
    public function paid(Request $request)
    {
        Bills::where('id', $request->id)->update([
            'status' => 'paid',
        ]);
        return redirect()->route('admin.transactions')->with('success', __('validation.addTenanTsucess'));
    }


    public function deleteBills(Request $request)
    {
        Bills::where('user_id', $request->user_id)->delete();
        return redirect()->route('admin.transactions')->with('success', __('validation.addTenanTsucess'));
    }
}
