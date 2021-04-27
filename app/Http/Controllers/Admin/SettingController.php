<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $settings = [];
        
        $dbsettings = Setting::get();

        foreach ($dbsettings as $dbsetting) {
            $settings[$dbsetting['name']] = $dbsetting['content'];
        }

        $data = ['settings' => $settings];
        return view('admin.settings.index', $data);
    }
}
