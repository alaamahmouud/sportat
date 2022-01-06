<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vedio;
use App\MyHelper\Helper;
use Response;


class VedioController extends Controller
{
    protected $model;
    protected $helper;
    protected $viewsDomain = 'admin/vedios.';

    public function __construct()
    {
        $this->model = new Vedio();
        $this->helper = new Helper();
    }

    private function view($view, $params = [])
    {
        return view($this->viewsDomain . $view, $params);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $records = $this->model->where(function ($q) use ($request)
        {
            if ($request->id)
            {
                $q->where('id',$request->id);
            }


        })->latest()->paginate(20);



        return $this->view('index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
        $model = $this->model ;
        $edit = false ;
        return  $this->view('create',compact('model','edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)

    {


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
        //
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


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $record = $this->model->findOrFail($id);

            if ($record->products()->count())
            {
                return response()->json([
                    'status'  => 0,
                    'message' => __('لا يمكن الحذف يوجد منتجات مرتبطه')
                ]);

            }
        $record->delete();

        $data = [
            'status' => 1,
            'message' => 'تم الحذف بنجاح',
            'id' => $id
        ];
        return Response::json($data, 200);
    }

}