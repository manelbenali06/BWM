<?php

namespace App\Service;

use Stripe\StripeClient;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PaymentService
{
    private StripeClient $stripe;
    private UrlGeneratorInterface $urlGenerator;
    private string $publicKey;

    public function __construct(string $secret, string $publicKey, UrlGeneratorInterface $urlGenerator)
    {
        $this->stripe = new StripeClient($secret);
        $this->urlGenerator = $urlGenerator;
        $this->publicKey = $publicKey;
    }

    public function getPublicKey(): string {
        return $this->publicKey;
    }

    public function create(float $amount): string
    {
        $successUrl = $this->urlGenerator->generate('app_payment_success', [
            'sessionId' => 'sessionId'
        ], UrlGeneratorInterface::ABSOLUTE_URL);
        $successUrl = str_replace('sessionId', '{CHECKOUT_SESSION_ID}', $successUrl);
        $cancelUrl = $this->urlGenerator->generate('app_payment_cancel', [
            'sessionId' => 'sessionId'
        ], UrlGeneratorInterface::ABSOLUTE_URL);
        $cancelUrl = str_replace('sessionId', '{CHECKOUT_SESSION_ID}', $cancelUrl);
        $session = $this->stripe->checkout->sessions->create([
            'success_url' => $successUrl,
            'cancel_url' => $cancelUrl,
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => [
                [
                    'amount' => $amount * 100,
                    'quantity' => 1,
                    'currency' => 'eur',
                    'name' => 'Total du panier'
                ]
            ]
        ]);
        return $session->id;
    }

}