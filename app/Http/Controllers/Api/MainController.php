<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Vedio;
use App\Models\Comment;
use App\Models\Client;
use App\MyHelper\Helper;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;

class MainController extends ParentApi
{

    public function __construct()
    {
        $this->helper = new Helper();

    }

    public function index(Request $request)
    {
        if($request->has('category_id')) {
            $vedios = Vedio::where('category_id', $request->category_id)->with('attachmentRelation')->get() ;
        }else {
            $vedios =Vedio::with('attachmentRelation')->get() ;
        }

        return $this->helper->responseJson(1,'done',
        [
            'vedios' => $vedios 
        ]);

    }

    //create new comment

    public function comments(Request $request)
         {
            $rules =
                 [
                  'content' => 'required',
                //   'client_id' => 'required',
                  'vedio_id' => 'required',
                 ];
    
            $data = validator()->make($request->all(), $rules);
    
             if ($data->fails()) {
    
                 return $this->helper->responseJson(0, $data->errors()->first());
            }
    
            $record = Comment::create([
                'content' => $request->content,
                'vedio_id' => $request->vedio_id,
                'client_id' => auth()->id()
            ]);

            return $this->helper->responseJson(1,'done');   
        }

       //to git all comments on vedio..

        public function getcomments(Request $request)
        {
            $comments = Comment::where('vedio_id', $request->vedio_id)->get();
         
            // return $this->helper->responseJson(1,'done', OrderResource::collection($orders));
            return $this->helper->responseJson(1,'done', $comments);
        }

        //profile

        public function getclientdata(Request $request)
        {
            $clients = Client::where('client_id', $request->client_id)->get();
            $vedios = Vedio::where('client_id', $request->client_id)->get();

            // return $this->helper->responseJson(1,'done', OrderResource::collection($orders));
            return $this->helper->responseJson(1,'done',  [
                'clients' => $clients
                'vedios' => $vedios
            ]);
    
        }

        //edit profile

        public function profileedit($id, ProfileRequest $request){
            $users = Client::find($id);
            $users->name = $request->firstName;
            $users->thumbnail = $request->avatar->store('avatars','public'); // how is this working ?
            $users->save();
          
            $data[] = [
              'id'=>$users->client_id,
              'name'=>$users->name,
              'avatar'=>Storage::url($users->thumbnail),
              'bio'=>$users->bio
            ];

            // return response()->json($data);
            return $this->helper->responseJson(1,'done', $data);
          
          }

         //to upload new vedio..


         public function addvedio(Request $request)
           {
             $rules =
                 [ 
                   'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
                   'category_id' => 'required',
                   'des' =>'required'
                 ];

            $data = validator()->make($request->all(), $rules);

            if ($data->fails()) {    

            return $this->helper->responseJson(0, $data->errors()->first());                        
             }  
      
            if ($files = $request->file('file')) {
                 
                //store file into document folder
                $file = $request->file->store('public/documents');
     
                //store your file into database
                $document = new Document();
                $document->title = $file;
                $document->client_id =auth()->id();
                $document->save();

                $vedio = Vedio::create([
                    'client_id' => auth()->user()->id ,
                    'file' => $file ,
                    'des' => $request['des'],
                    'category_id' => $request['category_id']
                ]);

                return $this->helper->responseJson(1,'done',
                ['vedio' => $vedio ]);
      
                }
            }

            public function search(Request $request) {

                $data = $request->get('data');
        
                $search = Vedio::where('name', 'like', "%{$data}%")->get();
        
                return Response::json([
                    'data' => $search
                ]);     
            }
        }



}
