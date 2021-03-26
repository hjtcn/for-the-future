<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mockery\Exception;

class DemoQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $msg = '';

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($msg)
    {
        $this->msg = $msg;
        logger('初始化逻辑' . $this->msg['name']);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        logger('队列消费时业务逻辑' . $this->msg['name']);
    }

    /**
     * @param Exception $exception
     */
    public function failed(Exception $exception)
    {
        logger('失败时逻辑处理');
    }
}
