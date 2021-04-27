<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Setting;
use Symfony\Component\VarDumper\Caster\RedisCaster;

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

    public function save(Request $request)
    {
        $data = $request->only(['title', 'subtitle', 'email', 'bgcolor', 'textcolor']);
        $validator = $this->validator($data);

        if ($validator->fails()) {
            return redirect()->route('settings')->withErrors($validator);
        }

        // return redirect()->route('settings');
    }

    private function validator($data)
    {
        return Validator::make($data,[
            'title' => ['string', 'max:100'],
            'subtitle' => ['string', 'max:100'],
            'email' => ['string', 'email'],
            'bgcolor' => ['string', 'regex:/#[A-Z0-9]{6}/i'],
            'textcolor' => ['string', 'regex:/#[A-Z0-9]{6}/i'],
        ]);
    }
}
