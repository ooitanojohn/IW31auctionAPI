<?php

namespace Classes\Api;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class TempApi
{
  public function helloWorld(Request $request, Response $response, array $args): Response
  {
    $response->getBody()->write('Hello World');
    return $response;
  }
}
