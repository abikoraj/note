<?php

use App\Models\Setting;
use Illuminate\Support\Facades\DB;

function abcd()
{
    return "j";
}

function getSetting($key)
{
    $data = DB::table('settings')->where('key', $key)->select('key', 'value')->first();
    return $data == null ? null : json_decode($data->value);
}

function setSetting($key, $value)
{
    $setting = Setting::where('key', $key)->first();
    if ($setting == NULL) {
        $setting = new Setting();
        $setting->key = $key;
    }
    $setting->value = json_encode($value);
    $setting->save();
}

function updateVersion()
{
    $v = getSetting('ver');
    if ($v == null) {
        setSetting('ver', 1);
    } else {
        setSetting('ver', $v + 1);
    }
}

function saveData()
{
    $a = [
        'univ' => DB::table('universities')->select('name', 'id')->get(),
        'faculty' => DB::table('faculties')->select('name', 'id', 'university_id')->get(),
        'prog' => DB::table('programs')->select('name', 'id', 'faculty_id')->get(),
        'sub' => DB::table('subjects')->select('name', 'id', 'program_id', 'code')->get()
    ];
    file_put_contents(public_path('data.json'), json_encode($a));
    updateVersion();
}
