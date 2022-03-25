<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Str;
use File;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index' , compact('customers'));
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
        if($request->profile_picture){
            $photo = $request->profile_picture;
            $str = Str::random(8);
            $getExt = $photo->getClientOriginalExtension();
            $namafile = $str.'.'.$getExt;
            $photo->move('avatar_customer', $namafile);
        

        $post  =  Customer::create(array_merge( $request->all(), ['profile_picture'=> $namafile]));
        }
        return response()->json($post);
                    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       
        $id = $request->id;
        $where = array('id' => $id);
        $customer  = Customer::find($id);
        
        return view('customer.show', compact('customer'));
        // return response()->json($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $where = array('id' => $id);
        $post  = Customer::where($where)->first();
     
        return response()->json($post);
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
        $update = Customer::find($id);

        //kondisi kalau ada update foto
        if($request->hasFile('profile_picture1')){
            $path = 'avatar_customer/'.$update->profile_picture;
            if(File::exists($path)){
                File::delete($path);
            }

            $photo = $request->profile_picture1;
            $str = Str::random(8);
            $getExt = $photo->getClientOriginalExtension();
            $namafile = $str.'.'.$getExt;
            $photo->move('avatar_customer', $namafile);
        } else {
            $namafile = $update->profile_picture;
        }


        $post   =   Customer::updateorCreate(
            ['id' => $id],
            [
                'nama' => $request->nama1,
                'email' => $request->email1,
                'alamat' => $request->alamat1,
                'profile_picture' => $namafile,
            ]
        );

        return response()->json($post);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $id = $request->id;
        $destroy = Customer::find($id);

        if(!$destroy){
            return redirect()->back()->with('error', 'Data Not Found!.');
        }

        if($destroy->profile_picture){
            $path = 'avatar_customer/'.$destroy->profile_picture;
            if(File::exists($path)){
                File::delete($path);
                
            }
        }
        $post = Customer::where('id',$id)->delete();
        
        
        if($destroy){
            // dd($destroy);
            return redirect()->route('indexDataCustomer')->with('success', 'Data Deleted Successfully!');
            // return response()->json($destroy);
        } else {
            return redirect()->back()->with('error', 'Delete Data Error');
        }

    }
}
