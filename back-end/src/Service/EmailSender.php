<?php

namespace App\Service;

use Mailjet\Client;
use App\Entity\User;
use Mailjet\Resources;
use App\Entity\EmailModel;

class EmailSender{
    public function sendEmailByMailJet(User $user,EmailModel $email){
        $mj = new Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'),true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
            [
                'From' => [
                'Email' => "contact@browsmanel.fr",
                'Name' => "Brows With Manel "
                ],
                'To' => [
                [
                    'Email' => $user->getEmail(),
                    'Name' => $user->getLastname()
                ]
                ],
                'TemplateID' => 5087099,
                'TemplateLanguage' => true,
                'Subject' => $email->getSubject(),
                'Variables' => [
                    'title' => $email->getTitle(),
                    'content'=>$email ->getContent()
                ]
            ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success() && dd($response->getData());
    }
}