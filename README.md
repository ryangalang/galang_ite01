<?php

namespace App\Jobs;

use App\Mail\SendAppointmentEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendAppointmentEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $student;
    protected $schedule_date;

    /**
     * Create a new job instance.
     */
    public function __construct($student, $schedule_date)  // fixed parameter name here
    {
        $this->student = $student;
        $this->schedule_date = $schedule_date;  // assign correctly
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->student->email)->send(new SendAppointmentEmail($this->student, $this->schedule_date));
    }
}
