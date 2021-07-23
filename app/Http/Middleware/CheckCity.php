<?php

namespace App\Http\Middleware;

use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Closure;
use Illuminate\Http\Request;

class CheckCity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //Code logic middleware ở đây
        $customer = Customer::where('customerNumber',$request->id)->get()->first();
        if($customer->city == 'Nantes'){
            return $next($request);
        }else{
            toastr()->error('Chỉ được xem thông tin người ở Nantes', 'Error!!!');
            return redirect()->route('customers.list');
//            dd(123);
        }
    }
}
