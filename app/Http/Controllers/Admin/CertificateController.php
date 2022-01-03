<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{


    public function index()
    {
        $record = Certificate::first();
        return view('admin.certificates.index',compact('record'));
    }


    public function update($id,Request $request)
    {
        $model =  Certificate::findOrFail($id);
        return view('admin.certificates.edit',compact('model'));

    }

    public function edit($id,Request $request)
    {

        $rules =
            [
                'content' => 'required',
            ];

        $error_sms =
            [
                'content.required' => 'الرجاء ادخال المحتوي ',
            ];

        $data = validator()->make($request->all(), $rules, $error_sms);

        if ($data->fails()) {
            return back()->withInput()->withErrors($data->errors());
        }

        $record = Certificate::findOrFail($id);
        $record->update($request->all());
        session()->flash('success', 'تمت تحديث بنجاح');
        return redirect('admin/certificates');
    }
    //
}
