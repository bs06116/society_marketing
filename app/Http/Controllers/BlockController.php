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
        $query = Block::query();
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
            $d->category = $d->plot_catergory;
            $d->action = '<a href="'.route('blocks.edit',$d->id).'"><button class="theme-btn table-btn '.$classEdit.'">Edit</button></a>';
        }
        return [
            "draw" => request('draw'),
            "recordsTotal" => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            "data" => $data,
        ];
    }
        return view('blocks.index');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blocks.create-block');
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
        $block_category = $request->block_category;
        $data = array('name'=>$name,'plot_catergory'=>$plot_catergory,'total_street'=>$total_street);
        $lastId = Block::insertGetId($data);
        if($lastId){
            foreach($plot_size as $index=>$ps){
                $dataPlot[] = array('plot_size' =>$plot_size[$index],'total_plot'=>$total_plot[$index],
                'block_category'=>$block_category[$index],'block_id'=>$lastId);
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
        $block = Block::find($id);
        $blockPlot = BlockPlot::where('block_id',$id)->get();
        return view('blocks.edit-block',compact('block','blockPlot'));
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
            'plot_catergory' => 'required',
            'total_street' => 'required',
        ]);
        $dataPlot = [];
        $name = $request->name;
        $plot_catergory = $request->plot_catergory;
        $total_street = $request->total_street;
        $plot_size = $request->plot_size;
        $total_plot = $request->total_plot;
        $block_category = $request->block_category;
        $data = array('name'=>$name,'plot_catergory'=>$plot_catergory,'total_street'=>$total_street);
        $block = Block::find($id);
        $block->update($data);
        if($id){
            BlockPlot::where('block_id',$id)->delete();
            foreach($plot_size as $index=>$ps){
                $dataPlot[] = array('plot_size' =>$plot_size[$index],'total_plot'=>$total_plot[$index],
                'block_category'=>$block_category[$index],'block_id'=>$id);
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

    public function get_plot_size($block_id)
    {
        $plot_size = BlockPlot::where(['block_id'=> $block_id])->get();
        return $plot_size;
    }

    public function get_blocks($category)
    {
        return Block::where(['plot_catergory'=> $category])->get();
    }



}