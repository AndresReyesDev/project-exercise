<?php

namespace App\Jobs;

use App\Borrower;
use App\Mail\BorrowerCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $borrower;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Borrower $borrower)
    {
        $this->borrower = $borrower;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->borrower->email)
            ->send(new BorrowerCreated($this->borrower));
    }
}
