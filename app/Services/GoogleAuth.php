<?php

namespace App\Services;

use Google\Client;

class GoogleAuth {
    private Client $client;
    
    public function __construct(array $config) {
        $this->client = new Client();
        $this->client->setClientId($config['client_id']);
        $this->client->setClientSecret($config['client_secret']);
        $this->client->setRedirectUri($config['redirect_url']);
        $this->client->addScope('email');
        $this->client->addScope('profile');
    }

    public function getAuthUrl() : string {
        return $this->client->createAuthUrl();
    }

    public function authenticate(string $code) : array {
        $token = $this->client->fetchAccessTokenWithAuthCode($code);

        if(isset($token['error'])){
            throw new \Exception('Failed to get access token: ' . $token['error_description']);
        }

        $this->client->setAccessToken($token);

        $oauth2 = new \Google\Service\Oauth2($this->client);
        $userInfo = $oauth2->userinfo->get();

        return [
            'id' => $userInfo->getId(),
            'email' => $userInfo->getEmail(),
            'first_name' => $userInfo->getGivenName(),
            'last_name' => $userInfo->getFamilyName(),
            'picture' => $userInfo->getPicture(),
            'locale' => $userInfo->getLocale(),
        ];
    }
}