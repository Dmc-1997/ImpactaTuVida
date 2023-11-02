<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

use App\Mail\EmailTeamInvitation;

class EmailInvitationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $current_team_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $current_team_id)
    {
        $this->user = $user;
        $this->current_team_id = $current_team_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        //Mail::to($this->user->email)->send(new EmailTeamInvitation($this->user, $this->current_team_id));
    }
}
