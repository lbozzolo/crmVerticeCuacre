<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Reply;
use App\MessageSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageSettingsController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = __('app.menu.messageSettings');
        $this->pageIcon = 'ti-settings';
        $this->middleware(function ($request, $next) {
            if(!in_array('messages',$this->user->modules)){
                abort(403);
            }
            return $next($request);
        });
    }

    public function index(){
        $this->messageSettings = MessageSetting::first();
        return view('admin.message-settings.index', $this->data);
    }

    public function update(Request $request, $id){
        $setting = MessageSetting::where('company_id', company()->id)->first();
        if($request->allow_client_admin){
            $setting->allow_client_admin = 'yes';
        }
        else{
            $setting->allow_client_admin = 'no';
        }
        if($request->allow_client_employee){
            $setting->allow_client_employee = 'yes';
        }
        else{
            $setting->allow_client_employee = 'no';
        }
        $setting->save();

        return Reply::success(__('messages.settingsUpdated'));
    }
}
