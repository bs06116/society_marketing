<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\BlockPlot;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Response;

class BlockController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-view');
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);

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
            $d->action = '<a href="'.route('users.edit',$d->id).'"><button class="theme-btn table-btn '.$classEdit.'">Edit</button></a>';
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
        return view('pages.create-block');
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
            'plot_catergory' => 'required',
            'total_street' => 'required',
        ]);
        $dataPlot = [];
        $name = $request->name;
        $plot_catergory = $request->plot_catergory;
        $total_street = $request->total_street;
        $plot_size = $request->plot_size;
        $total_plot = $request->total_plot;
        $data = array('name'=>$name,'plot_catergory'=>$plot_catergory,'total_street'=>$total_street);
        $lastId = Block::insertGetId($data);
        if($lastId){
            foreach($plot_size as $index=>$ps){
                $dataPlot[] = array('plot_size' =>$plot_size[$index],'total_plot'=>$total_plot[$index],'block_id'=>$lastId);
            }
            BlockPlot::insert($dataPlot);
        }
        return Response::json([
            'success' => true,
            'status'=> 400,
            'msg'=> "Block has been save successfully",
        ]);

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
}