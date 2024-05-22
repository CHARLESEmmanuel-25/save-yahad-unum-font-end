<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class ApiOhmeService
{
    private $client;
    private $params;

    public function __construct(HttpClientInterface $client, ContainerBagInterface $params)
    {
        $this->client = $client;
        $this->params = $params;
    }

    public function HelloWorldApi() : string {
        return "Hello World Api !";
    }

    public function getOhmeContacts() : array {
        $response = $this->client->request(
            'GET',
            'https://api-ohme.oneheart.fr/api/v1/contacts',
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'client-name'=> $this->params->get('app.ohme_api_user'),
                    'client-secret' => $this->params->get('app.ohme_api_key')
                ]
            ]
        );

        return $response->toArray();
    }

    public function createOhmeContact($firstname, $lastname, $email) : Response {

        try {
            $requestApi = $this->client->request(
                'POST',
                'https://api-ohme.oneheart.fr/api/v1/contacts',
                [
                    'headers' => [
                        'Accept' => 'application/json',
                        'client-name'=> $this->params->get('app.ohme_api_user'),
                        'client-secret' => $this->params->get('app.ohme_api_key')
                    ],
                    'body' => [
                        "firstname" => $firstname,
                        "lastname" => $lastname,
                        "email" => $email,
                        "tags" => array($this->params->get('app.ohme_tags'))
                    ]
                ]
            );

            $status = 200;
            $message = "Success ! The contact has been created!";
        }

        catch (\Exception $exception) {
            $status = 400;
            $message = "Bad request ! Problem encountered when creating the contact on OHME...";
        }

        $response = array("status" => $status, "message" => $message);
        return new Response(json_encode($response), $status, array("Content-Type" => "application/json"));
    }

}