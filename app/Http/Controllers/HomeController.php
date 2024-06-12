<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tenant;
use App\Models\Bills;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->user_type === 'admin') {
            return redirect()->route('admin.home');
        }
        return view('user.home');
    }

    public function adminHome()
    {

        return view('admin.home');
    }

    public function profile()
    {
        $id = Auth::id();
        $profile = Tenant::where('user_id', $id)->get();

        foreach ($profile as $item) {
            $item->formatted_since = Carbon::parse($item->since)->format('F j, Y');
        }
        return view('user.profile', compact('profile'));
    }



    public function transaction()
    {   
        $id = Auth::id();
        $bill = Bills::where('user_id', $id)->where('status', 'paid')->orderBy('month', 'desc')->get();

        foreach ($bill as $item) {
            $item->due = Carbon::parse($item->due)->format('F j, Y');
            $item->paid = Carbon::parse($item->updated_at)->format('F j, Y');
            $item->bmonth = Carbon::createFromFormat('m', $item->month)->format('F');
        }

        return view('user.transaction', compact('bill'));
    }
    public function bill()
    {
        $id = Auth::id();
        $month = date('m') ;
        $bill = Bills::where('user_id', $id)->where('month', $month)->where('status', 'pending')->get();
        $customer = Tenant::where('user_id', $id )->first();
        foreach ($bill as $item) {
            $item->due = Carbon::parse($item->due)->format('F j, Y');
            $item->receiptdate = Carbon::parse($item->created_at)->format('F j, Y');
            $item->month = Carbon::createFromFormat('m', $item->month)->format('F');
        }
        return view('user.bills', compact('bill','customer'));
    }
    public function history($id)
    {    
        $uid = Auth::id();
        $customer = Tenant::where('user_id', $uid )->first();
        $bill = Bills::where('id', $id)->where('status', 'paid')->get();
        foreach ($bill as $item) {
            $item->due = Carbon::parse($item->due)->format('F j, Y');
            $item->receiptdate = Carbon::parse($item->created_at)->format('F j, Y');
            $item->month = Carbon::createFromFormat('m', $item->month)->format('F');
        }                          
        return view('user.history',compact('bill','customer'));
    }

    public function generatePDF(Request $request)
    {
        $selectedData  = Bills::where('id', $request->id)->first();
        if (empty($selectedData)) {
            return view('error.404');
        }

        $selectedData->receiptdate = Carbon::parse($selectedData->created_at)->format('m-j-Y');
        $selectedData->due = Carbon::parse($selectedData->due)->format('m-j-Y');
        $tenant = Tenant::where('user_id', $selectedData->user_id)->first();
        $imagePath = public_path('images/your_image.jpg');


        $pdf = PDF::loadView('layouts.pdf',  ['data' => $selectedData],  ['tenant' => $tenant]);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('print.pdf');
    }
}
