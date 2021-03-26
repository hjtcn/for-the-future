<?php

namespace App\Http\Controllers;

use App\Jobs\DemoQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DemoController extends Controller
{
    public function demo(Request $request)
    {

        $file = $request->file('file', '');
        $name = $request->input('name', '');
        Log::info('request success');
        if ($file) {

            file_put_contents(storage_path('logs/test.html'));
        }

        return $name;

		Log::info('aliyun_callback ==> ' . json_encode($request->all()));
		return json_encode(array('status' => '200'));
		dd('aliyun_callback success');
        $queues = [
            ['name' => 'ben', 'email' => 'ben@ha.com'],
            ['name' => 'bird', 'email' => 'bird@ha.com'],
            ['name' => 'black', 'email' => 'black@ha.com']
        ];

        foreach ($queues as $queue) {
            $this->dispatch((new DemoQueue($queue))->onQueue('demo'));
        }

        return $queues;
    }

	public function buildProgram(Request $request)
	{
		$language = $request->input('programLang');
		if (!$language) {
			return false;
		}

	}

	public function buildWeb(Request $request)
    {
        return view('demon.program');
    }
}
