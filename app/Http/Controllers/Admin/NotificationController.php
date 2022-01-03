<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Client;
use App\Models\Governorate;
use App\Models\Notification;
use App\MyHelper\Helper;
use App\MyHelper\Sms;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    protected $model;
    protected $viewsDomain = 'admin/notifications.';
    protected $url = 'admin/notifications';

    public function __construct()
    {
        $this->model = new Notification();
    }

    /**
     * @param $view
     * @param array $params
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function view($view, $params = [])
    {
        return view($this->viewsDomain . $view, $params);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return $this->view('form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $record = $this->model;
        return $this->view('create', compact('record'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'body' => 'required',
        ];

        $this->validate($request, $rules);

        $clients = Client::get();

        foreach ($clients as $client)
        {
            Helper::sendNotification($client, [$client->id], '', $request->title, $request->body);
        }
//        $this->sendNotifyAndSms($request, $clients);


        session()->flash('success', 'تم الاضافة بنجاح');
        return redirect($this->url);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param $notifyRelation
     * @param $records
     * @return mixed
     */
    public function sendNotifyAndSms(Request $request, $records)
    {



        Helper::sendNotification(Client::get(),$records->pluck('id')->toArray(),'morphNotifications',$request->title,$request->body);

//                Helper::sendNotification(auth()->user(), $records->pluck('id')->toArray() , $request->title, $request->body, 'admin', []);

        }









}
