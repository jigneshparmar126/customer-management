<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class PushNotificationChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */

    public function send($notifiable, Notification $notification)
    {      
        $message = $notification->toMessage($notifiable);
        
        $number = $notifiable->phone_number;
        
        $pdf = $message['pdf'];
        
        $pdfname = $message['type'].now()->format('d-m-Y').'.pdf';

        $pdfFilePath = \Storage::url($pdf);
                
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('WHATSAPP_API'),
            'Content-Type' => 'application/json',
        ])
        ->post('https://graph.facebook.com/v17.0/225208170666826/messages', [
            'messaging_product' => 'whatsapp',
            'recipient_type'    => 'individual',
            'to'                => '91'.$number,
            'type'              => 'document',
            'document'          =>[
               'link'       => $pdfFilePath,
               'filename'   => $pdfname,
            ],
        ]);

        if ($response->successful()) {
            // Successful response
            $data = $response->json();
        } else {
            // Handle the error
            $errorMessage = $response->json('error.message');
        }
    }

}