<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\Client as ResourceClient;
use App\Mail\ActiveAccount;
use App\Mail\ResetPassword;
use App\Models\Client;
use App\MyHelper\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends ParentApi
{

    public function __construct()
    {

        $this->helper = new Helper();
        $this->guard = 'api';
        $this->model = new Client();
        $this->table = 'clients';
        $this->uniqueRow = 'phone';
        $this->sendPinCodeErrorMessage = 'رقم الهاتف غير صحيح';
    }

    //
    public function  register(Request $request){

        $rules =
            [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|unique:clients,phone',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required|confirmed',
            'bio' => 'required'
            'nationalty' => 'required'
            'gender' => 'required'
            'avatar' => 'required'
            ];

        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {

            return $this->helper->responseJson(0, $data->errors()->first());
        }
        $request->merge(['password'=>bcrypt($request->password)]);
        $record = $this->model->create($request->all());

        $token = $record->createToken('android')->accessToken;

    

        return $this->helper->responseJson(1, 'تم الاضافه بنجاح',['token' => $token, 'user' =>  $record]);
    }

    public function login(Request $request)
    {
        $rules =
            [
                'phone' => 'required',
                'password' => 'required',
            ];


        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {

            return $this->helper->responseJson(0, $data->errors()->first());
        }

        $user = $this->model->where(['phone' => $request->phone])->first();

        //check if user exists
        if ($user) {

//            if ($user->is_active == 0)
//            {
//                return $this->helper->responseJson(0, 'يجب تاكيد الحساب عن طريق الايميل ');
//
//            }
            if (Hash::check($request->password , $user->password))
            {
                $token = $user->createToken('android')->accessToken;
           

                return $this->helper->responseJson(1, 'تم تسجيل الدخول بنجاح', ['token' => $token, 'user' =>$user]);

            } else {

                return $this->helper->responseJson(0, 'كلمة المرور غير صحيحة');
            }


        }
        else
        {
            return $this->helper->responseJson(0, 'رقم الهاتف الذي أدخلته غير صحيح');

        }

        // send pin code to confirm phone
    }


    public function updateProfile(Request $request)
    {

        $client = $request->user('api');

        $rules =
            [
                'first_name' => 'nullable',
                'last_name' => 'nullable',
                'phone' => 'nullable',
                'email' => 'nullable',

            ];

        $validator = validator()->make($request->all(), $rules);


        if ($validator->fails()) {

            return $this->helper->responseJson(0, $validator->errors()->first());
        }
            $client->update($request->all());
        return $this->helper->responseJson(1, 'تم التحديث بنجاح', ['token' => $request->bearerToken(), 'user' => $client]);
    }

    public function clientSendPinCode(Request $request)
    {
        $rules = ['email' => 'required'];

        $sms =
            [
                'email.required' => 'البريد الالكتروني مطلوب',
            ];

        $data = validator()->make($request->all(), $rules, $sms);

        if ($data->fails()) {

            return $this->helper->responseJson(0, $data->errors()->first(), $data->errors());
        }

        $record = Client::where(['email' => $request->email])->first();
//            dd($record);
        if ($record)
        {
                $code = $this->getPinCode();
                $record->pin_code = $code ;
                $record->pin_code_date_expired = $this->getPinCodeExpiredDate();
                $record->save();
            Mail::to($record->email)

                ->bcc("testpincode75@gmail.com")
                ->send(new ActiveAccount($code,$record));
            return $this->helper->responseJson(1,'برجاء فحص البريد الالكتروني',
                [
                    'pin_code'=>$code,
//                  'mail_fails' => Mail::failures(),
                ]

            );

//                        return $this->helper->responseJson(1,'برجاء فحص البريد الالكتروني',['pin_code'=>$code]);

        }else {

            return $this->helper->responseJson(0, 'البريد الالكتروني غير صحيح');
        }
    }


    public function checkCode(Request $request)
    {
        $rules =
            [
                'email' => 'required|exists:clients,email',
                'pin_code' => 'required|numeric',
            ];

        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {

            return $this->helper->responseJson(0, $data->errors()->first(), $data->errors());
        }


        $client = $this->model->where('email', $request->email)->first();

        if ($client) {
            if ($client->pin_code == $request->pin_code)
            {
                if ($client->pin_code_date_expired < Carbon::now())
                {
                    return $this->helper->responseJson(0, 'كود التاكيد غير صالح');

                }
                $client->is_active = 1 ;
                $client->save();
                return $this->helper->responseJson(1, 'كود التاكيد صالح');

            }

            return $this->helper->responseJson(0, 'كود التاكيد خطأ');
        }

        return $this->helper->responseJson(0, 'البريد الالكتروني غير صحيح');
    }



    public  function  newPassword(Request $request){
        $validator = validator()->make($request->all(),[
           'pin_code' => 'required' ,
           'email' => 'required' ,
           'password' => 'required|confirmed'
        ]);

        if ($validator->fails()){
            return $this->helper->responseJson(0,$validator->errors()->first());
        }
        $user = Client::where('pin_code',$request->pin_code)->where('email',$request->email)->first();

            if ($user)
            {
                $user->password = bcrypt($request->password);
                $user->pin_code = null ;
                if ($user->save()){
                    return $this->helper->responseJson(1,'تم تغير كلمه المرور بنجاح');
                }else{
                    return $this->helper->responseJson(0,'حدث خطأ ما يرجي المحاوله مره اخري');
                }
            }else{
                return $this->helper->responseJson(0,'تم استخدام الرمز من قبل يرجي المحاوله مره اخري');

            }
    }




    public function changePassword(Request $request)
    {

        $client = $request->user('api');

        $rules =
            [

                'oldpassword' => 'sometimes',
                'newpassword' => 'sometimes|confirmed',

            ];

        $validator = validator()->make($request->all(), $rules);


        if ($validator->fails()) {

            return $this->helper->responseJson(0, $validator->errors()->first());
        }

        $hashedPassword = $client->password;

        if ($request->oldpassword && $request->newpassword) {


            if (Hash::check($request->oldpassword, $hashedPassword))
            {

                if (!Hash::check($request->newpassword, $hashedPassword)) {


                    $client->password = bcrypt($request->newpassword);
                    $client->update(array(
                        'password' => $client->password,

                    ));

                    return $this->helper->responseJson(0, 'تم تحديث البيانات بنجاح', $client);

                }
                else {
                    return $this->helper->responseJson(0, 'new password can not be the old password!');
                }

            }
            else {

                return $this->helper->responseJson(0, 'old password doesnt matched ');
            }
        }
    }





    public function resetpassword(Request $request){

        $user = Client::where('email',$request->email)->first();

        if ($user) {
            $code = $this->getPinCode();

            $user->pin_code = $code ;
            $user->pin_code_date_expired = $this->getPinCodeExpiredDate();
            $user->save();


//            if ($user->pin_code_date_expired > Carbon::now())
//            {
//                return $this->helper->responseJson(0, 'عفوا حدث خطأ يرجي الانتظار دقيقه من فضلك ');
//
//            }
            if ($user)
            {
                # send sms

                Mail::to($user->email)

                    ->bcc("support@teamat.online")
                    ->send(new ResetPassword($code));
                         return $this->helper->responseJson(1,'برجاء فحص البريد الالكترونى ',
                    [
                        'pin_code_for_test'=>$code,
                        // 'mail_fails' => Mail::failures(),
                    ]
                );

            }
            else
            {
                return $this->helper->responseJson(0,'حدث خطآ ما يرجي المحاوله لاحقا');
            }
        }else
        {
            return $this->helper->responseJson(0,'عفوا البريد الالكتروني غير مسجل لنا');

        }

    }


    }
