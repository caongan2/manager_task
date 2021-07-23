<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Repositories\CustomerModel;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Session;

class CustomerController extends Controller
{
    protected $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {

        $customers = Customer::paginate(9);
        return view('backend.customer.list',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Customer $customer)
    {
        $customer->contactLastName = $request->input('last');
        $customer->contactFirstName = $request->input('first');
        $customer->phone = $request->input('phone');
        $customer->city = $request->input('city');
        $customer->save();
        toastr()->success('Create success', 'Create');
        return redirect()->route('customers.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = DB::table('customers')->where('customerNumber', $id)->get()->first();
        return view('backend.customer.update', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'contactLastName' => $request->input('last'),
            'contactFirstName' => $request->input('first'),
            'phone' => $request->input('phone'),
            'city' => $request->input('city')
        ];
        DB::table('customers')->where('customerNumber', $id)->update($data);
        return redirect()->route('customers.list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::table('customers')->where('customerNumber', $id)->delete();
            toastr()->success('delete success', 'Delete');
            return  redirect()->route('customers.list');
        } catch (\PDOException $exception) {
            dd('Ràng buộc khoá ngoại');
        }
    }

    public function showProfile($id)
    {
        $customer = DB::table('customers')->where('customerNumber', $id)->get()->first();
        return view('backend.customer.profile',compact('customer'));
    }

    public function search(Request $request)
    {
        $text = $request->input('name');
        $customers = Customer::where('contactLastName', 'LIKE', '%'. $text . '%' )->get();
        if (!empty($request->input('name'))){
            toastr()->success('n kết quả', 'Success');
        } else {
            toastr()->error('Empty', 'Error');
        }
        return view('backend.customer.search', compact('customers'));
    }
}
