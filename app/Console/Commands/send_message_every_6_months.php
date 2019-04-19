<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use App\CheckIn;
use App\UserTreatments;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Aloha\Twilio\Support\Laravel\Facade as Twilio;


class send_message_every_6_months extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send_message_every_6_months';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $checkins = CheckIn::all();
        foreach ($checkins as $checkin){
            if($checkin->whereBetween('created_at', array(Carbon::now()->subMonth(6)->toDateTimeString(), Carbon::now()->toDateTimeString()))){
                $user = User::find($checkin->user_id);
                Twilio::message('+976'.$user->phone_number,'MonFamily шүдний эмнэлгийн систем. Та эмчилгээнд ороогүй 6 сар болсон байна.');
            }
        }

}
}
