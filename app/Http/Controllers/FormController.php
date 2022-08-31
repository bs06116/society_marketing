<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Installment;
use App\Models\Commission;
use App\Models\BookDealerPlot;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Response;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function __construct()
    {

        // $this->middleware('permission:user-view');
        // $this->middleware('permission:user-edit', ['only' => ['edit','update']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
        if(!auth()->user()->can("user-delete")){
            $classDelete = 'd-none';
        }else{
            $classDelete = '';
        }
        if(!auth()->user()->can("user-edit")){
            $classEdit = 'd-none';
        }else{
            $classEdit = '';
        }
        $_order = request('order');
        $_columns = request('columns');
        $order_by = $_columns[$_order[0]['column']]['name'];
        $order_dir = $_order[0]['dir'];
        $search = request('search');
        $skip = request('start');
        $take = request('length');
        $search = request('search');
        $query = User::query()->whereHas(
            'roles', function($q){
                $q->where('name', 'Admin');
                $q->orWhere('name', 'Cashier');
            }
        );
        $query->orderBy('id', 'DESC')->get();
        $recordsTotal = $query->count();
        if (isset($search['value'])) {
            $query->where(function ($q) use ($search) {
                $q->whereRaw("name LIKE '%" . $search['value'] . "%' ");
            });
        }
        $recordsFiltered = $query->count();
        $data = $query->orderBy($order_by, $order_dir)->skip($skip)->take($take)->get();
        foreach ($data as $d) {
            $d->role = $d->roles->pluck('name')->implode(', ');
            $d->action = '<a href="'.route('users.edit',$d->id).'"><button class="btn-none '.$classEdit.'"><img src="'.asset("assets/images/svg/edit.svg").'" alt="" width="15"></button></a>';
        }
        return [
            "draw" => request('draw'),
            "recordsTotal" => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            "data" => $data,
        ];
    }
        return view('users.index');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('permission:create-form');
        return view('pages.create-file');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'phone_number' => 'required',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::where('id','!=','3')->pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->first();
        return view('users.edit',compact('user','roles','userRole'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'sometimes',
            'phone_number' => 'required',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
    public function save_form(Request $request)
    {
        $this->validate($request, [
            'app_no' => 'required|unique:forms,app_no',
            'reg_no' => 'required|unique:forms,reg_no',
            'form_no' => 'required|unique:forms,form_no',
            'type' => 'required',
            'block' => 'required',
            'plot_size' => 'required',
            'plot_no' => 'required|unique:forms,plot_no',
            'street_no' => 'required',
            'location_type' => 'required',
            'preference_of_plot' => 'required',
            'payment' => 'required',
            'extra_land' => 'required',
            'extra_land_cost' => 'required',
            'booking_date' => 'required',
            'total_price' => 'required',
            'name_of_applicant' => 'required',
            'applicant_type' => 'required',
            'cnic_no' => 'required',
            'passport_no' => 'required',
            'mailing_address' => 'required',
            'permanent_address' => 'required',
            'phone_no' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'nominee_name' => 'required',
            'nominee_type' => 'required',
            'nominee_cnic' => 'required',
            'nominee_passport' => 'required',
        ]);

        $form = [
            'app_no'=>$request->app_no,
            'reg_no'=>$request->reg_no,
            'form_no'=>$request->form_no,
            'plot_type'=>$request->type,
            'block_no'=>$request->block,
            'plot_size'=>$request->plot_size,
            'plot_no'=>$request->plot_no,
            'street_no'=>$request->street_no,
            'location'=>$request->location_type,
            'payment_type'=>$request->payment,
            'extra_lan'=>$request->extra_land,
            'extra_land_cost'=>$request->extra_land_cost,
            'booking_data'=>$request->booking_date,
            'total_price'=>$request->total_price,
            'applicant_name'=>$request->name_of_applicant,
            'aplicant_type'=>$request->applicant_type,
            'cnic'=>$request->cnic_no,
            'passport_no'=>$request->passport_no,
            'mail_address'=>$request->mailing_address,
            'permanent_address'=>$request->permanent_address,
            'phone_no'=>$request->phone_no,
            'mobile_no'=>$request->mobile_no,
            'email'=>$request->email,
            'nominee_applicant_name'=>$request->nominee_name,
            'nominee_applicant_type'=>$request->nominee_type,
            'nominee_applicant_cnic'=>$request->nominee_cnic,
            'nominee_applicant_passport'=>$request->nominee_passport,
            'preference_of_plot'=>$request->preference_of_plot,
        ];
        Form::Create($form);
        return redirect('dashboard')->with(['success_msg'=> 'Form submitted successfully']);
    }

    public function addFinancial(Request $request)
    {
        $this->validate($request, [
            'total_price' => 'required',
            'down_payment' => 'required',
        ]);
        $dataInstallment = [];
        $id = $request->id;
        $name = $request->name;
        $amount = $request->amount;
        $installment_date = $request->installment_date;
        $total_price = $request->total_price;
        $down_payment = $request->down_payment;
        $form = Form::find($id);
        if($form){
            // Installment::where('forms_id',$id)->delete();
            foreach($amount as $index=>$a){
                if(!empty($amount[$index])){
                    $dataInstallment[] = array('name' =>$name[$index],'amount'=>$amount[$index],
                    'installment_date'=>$installment_date[$index],'forms_id'=>$id);
                }
            }
            Form::where('id',$id)->update(array('total_price'=>$total_price,'down_payment'=>$down_payment));
            if(count($dataInstallment)>0){
                Installment::insert($dataInstallment);
            }
        }
        return Response::json([
            'success' => true,
            'status'=> 400,
            'msg'=> "Finical has been save successfully",
        ]);
    }
    public function addCommission(Request $request)
    {
        $this->validate($request, [
            'total_commission' => 'required',
        ]);
        $total_commission = $request->total_commission;
        $data = array('total_commission' =>$total_commission,'created_at'=>Carbon::now());
        Commission::insert($data);
        return redirect('commission-calculation')->with(['success_msg'=> 'Commission updated successfully']);

    }
    public function getApplciaton(Request $request){
        $block_id = $request->block_id;
        $plot_num = $request->plot_num;
        $result = Form::where('block_no',$block_id)->where('plot_no',$plot_num)->first();
        if($result){
            $html = \View::make('pages.__financial_view_popup',compact('result'));
            return Response::json([
                'success' => true,
                'data'=> "$html" ,
                'msg'=> "Record found",
            ]);
        }else{
            return Response::json([
                'success' => false,
                'data'=> '',
                'msg'=> "Record not found",
            ]);
        }
    }
    public function viewFinancial($id = null){
        $installemnts = Installment::where('forms_id',$id)->get();
        $form = Form::where('id',$id)->first();
        return view('pages.financial-view',compact('id','installemnts','form'));
    }
    public function dealerDashbaord(){
        return view('pages.dashboard-dealer');

    }
    public function checkApplication(Request $request){
        $plot_number = $request->plot_number;
        $check_book_plot = $request->check_book_plot;
        $block_id = $request->block_id;
        $result = Form::where('plot_no',$plot_number)->first();
        $checkBookPlot = BookDealerPlot::where('plot_number',$plot_number)->first();
        if($result || $checkBookPlot){
            return Response::json([
                'success' => true,
                'data' => false,
                'msg'=> "This plot has already been sold",
            ]);
        }
        $checkBookPlot = BookDealerPlot::where('plot_number',$plot_number)->first();
        if($check_book_plot == 'true' && (!$checkBookPlot || $result) ){
            $data = array('block_number'=>$block_id,'plot_number'=>$plot_number,'user_id'=>Auth::id(),'created_at'=>Carbon::now());
            BookDealerPlot::insert($data);
            return Response::json([
                'success' => true,
                'data' => 2,
                'msg'=> "Plot has book this dealer",
            ]);
        }
             return Response::json([
                'success' => false,
                'data' => true,
                'msg'=> "This Plot is Available",
            ]);
        // if($checkBookPlot){
        //     return Response::json([
        //         'success' => true,
        //         'data' => false,
        //         'msg'=> "This plot has already been sold",
        //     ]);
        // }else{
        //     return Response::json([
        //         'success' => false,
        //         'data' => true,
        //         'msg'=> "This Plot is Available",
        //     ]);
        // }
    }

}