<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use DataTables;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer');
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
        $result = Customer::find($id);
        $result->str_created_at = $result->created_at->format('d/m/Y');
        $result->str_updated_at = $result->updated_at->format('d/m/Y');
        return $result;
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

    public function list()
    {
        $result = Customer::select('customers.*');

        return Datatables::of($result)

        ->addColumn('fullname' , function($rec){
            return $rec->firstname.' '.$rec->lastname;
        })

        ->addColumn('action' , function($rec){
            $btnShow = '<button class="btn btn-sm btn-info btn-show" style="color:#fff;" data-id="'.$rec->id.'" data-toggle="tooltip" data-placement="top"  title="ดูข้อมูล" >
                            <i class="fas fa-search"></i>
                        </button> ';
            $btnEdit = '<button class="btn btn-sm btn-warning btn-edit" style="color:#fff;" data-id="'.$rec->id.'" data-toggle="tooltip" data-placement="top"  title="แก้ไข" >
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button> ';
            $btnDelete = '<button class="btn btn-sm btn-danger btn-delete" data-id="'.$rec->id.'" data-toggle="tooltip" data-placement="top"  title="ลบ" >
                            <i class="fa-solid fa-trash-can"></i>
                        </button> ';
            $str = $btnShow.' '.$btnEdit.' '.$btnDelete;
            return $str;
        })

        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }
}
