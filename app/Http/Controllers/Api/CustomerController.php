<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sortBy = $request->input('sortBy','id');
        $sortDesc = $request->input('sortDesc','id');
        $search = $request->input('search');
        $per_page = $request->input('per_page',50);

        $customers = Customer::select('customers.*');

        if($search){
            $customers->where(function($query) use ($search) {
                $query->where('firstname','like',"%$search%");
                $query->where('lastname','like',"%$search%");
                $query->orWhere('email','like',"%$search%");
                $query->orWhere('phone','like',"%$search%");
            });
        }

        $customers->orderBy($sortBy, $sortDesc);

        return $customers->paginate($per_page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => [Rule::unique('customers')],
        ]);

        if (!$validator->fails()) {

            $customer = new Customer;
            $customer->firstname = $request->input('firstname');
            $customer->lastname = $request->input('lastname');
            $customer->email = $request->input('email');
            $customer->phone = $request->input('phone');
            $customer->save();

            $return['title'] = 'เพิ่มข้อมูล';
            $return['content'] = 'สำเร็จ';
            $return['status'] = 1;

        } else {

             $failedRules = $validator->failed();
             $return['title'] = 'เพิ่มข้อมูล';
             $return['content'] = '';
             $return['status'] = 0;

             if (isset($failedRules['email']['Unique'])) {
                $return['content'] .= 'มีอีเมล์ '.$request->input('email').' อยู่ในระบบแล้ว';
            }

        }
        return $return;
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
        return Customer::find($id);
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
        $validator = Validator::make($request->all(), [
            'email' => [Rule::unique('customers')->ignore($id)],
        ]);

        if (!$validator->fails()) {

            $customer = Customer::find($id);
            $customer->firstname = $request->input('firstname');
            $customer->lastname = $request->input('lastname');
            $customer->email = $request->input('email');
            $customer->phone = $request->input('phone');
            $customer->save();

            $return['title'] = 'แก้ไขข้อมูล';
            $return['content'] = 'สำเร็จ';
            $return['status'] = 1;

        } else {

             $failedRules = $validator->failed();
             $return['title'] = 'แก้ไขข้อมูล';
             $return['content'] = '';
             $return['status'] = 0;

             if (isset($failedRules['email']['Unique'])) {
                $return['content'] .= 'มีอีเมล์ '.$request->input('email').' อยู่ในระบบแล้ว';
            }

        }
        return $return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        $return['title'] = 'ลบข้อมูล';
        $return['content'] = 'สำเร็จ';
        $return['status'] = 1;

        return $return;
    }
}
