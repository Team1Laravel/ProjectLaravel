<?php

namespace App\Jobs;

use App\Http\Controllers\MovieManagementController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $movie;

    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send([], [], function ($message) {
            $UsersSubcribe = DB::table('users')->where('isSubcribe', '=', 1)->get();
            $movie = $this->movie;
            foreach ($UsersSubcribe as $user) {
                $message->to($user->email)
                    ->subject('FLEXGO')
                    ->setBody('<h1>Thanks for your subcribe!</h1><a href=' . $movie->video_link . '> <img src="'
                        . $message->embed(public_path() . '/img/catalogs/' . $movie->image) . '"></a> ', 'text/html');
            }
        });
    }
}
