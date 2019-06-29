<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Company;
use App\GlobalSetting;
use App\LanguageSetting;
use App\Traits\FileSystemSettingTrait;
use App\Http\Controllers\Controller;

class SuperAdminBaseController extends Controller
{
    use FileSystemSettingTrait;

    /**
     * @var array
     */
    public $data = [];

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[ $name ]);
    }

    /**
     * UserBaseController constructor.
     */
    public function __construct()
    {
        // Inject currently logged in user object into every view of user dashboard
        $this->global = GlobalSetting::with('currency')->first();

        $this->languageSettings = LanguageSetting::where('status', 'enabled')->get();

        $this->middleware(function ($request, $next) {
            $this->user = $request->user();
            return $next($request);
        });
    }
}
