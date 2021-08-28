<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CaseReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $data = $this->data;

        
        $address = config('mail.from.address');
        $app_name = config('mail.from.name');
        $subject = 'Case Completion Report';
        // dd($data, $data->citizen->name, $address, $app_name);
        
        return $this->view('mails.case_report', compact(['data']))
            ->subject($subject)
            ->replyTo($address, $app_name)
            ->to($data->citizen->email, $app_name);
    }
}
