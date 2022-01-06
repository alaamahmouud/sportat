<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MyHelper\Helper;
use Helper\Attachment;
use App\Models\Contact;

class ContactController extends Controller
{
        protected $model ;
        protected $viewsDomain = 'admin/contacts.';
        protected $url = 'admin/contacts';
        public function __construct()
           {
              $this->model = new Contact();
           }
    
            public function view($view, $params = [])
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
                //
                $records = $this->model->where(function ($q) use ($request)
                {
                    if ($request->name) {
                        
        
                        $q->where('name', 'LIKE', '%' . $request->name . '%');
                    
                }
        
                })->latest()->paginate(6);
                return $this->view('index',compact('records'));
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
               //
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
                //
            }
        
            /**
             * Remove the specified resource from storage.
             *
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */

            public function destroy($id)
            {
              //
            }
            public function toggleBoolean($id, $action)
            {
                $record = $this->model->findOrFail($id);
                Helper::toggleBoolean($record);
        
                return Helper::responseJson(1, 'تمت العملية بنجاح');
            }
        
}
        
    
            
        
    
    
