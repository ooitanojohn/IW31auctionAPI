<?php

namespace Classes\Api;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Classes\Common\Hash;

class TempApi
{
  /**
   * get取得
   *
   * @param Request $request
   * @param Response $response
   * @param array $args
   * @return Response
   */
  public function get(Request $request, Response $response, array $args): Response
  {
    // urlParam
    $param = $_GET["param"] ?? null;
    // md5でhash化
    $hashParam = Hash::crypto($param);
    $response->getBody()->write("get" . $param);
    return $response;
  }
  /**
   * post取得
   *
   * @param Request $request
   * @param Response $response
   * @param array $args
   * @return Response
   */
  public function post(Request $request, Response $response, array $args): Response
  {
    // Get all POST parameters
    $params = (array)$request->getParsedBody();
    var_dump($params);
    // Get a single POST parameter
    $foo = $params['foo'] ?? null;
    var_dump($foo);
    $response->getBody()->write("post");
    return $response;
  }
  /**
   * urlでの切り分け
   *
   * @param Request $request
   * @param Response $response
   * @param array $args
   * @return Response
   */
  public function url(Request $request, Response $response, array $args): Response
  {
    $page = $args['page'] ?? null;
    $response->getBody()->write("url" . $page);
    return $response;
  }

  /**
   * request情報
   *
   * @param Request $request
   * @param Response $response
   * @param array $args
   * @return Response
   */
  public function requestInfo(Request $request, Response $response, array $args): Response
  {
    $html = "";
    $method = $request->getMethod(); // method取得
    $html .= "req.method" . $method . "<br>";
    $uri = $request->getUri(); // URL取得
    $html .= "req.uri" . $uri . "<br>";
    $headers = $request->getHeaders(); // header情報取得
    foreach ($headers as $name => $values) {
      $html .= $name . ": " . implode(", ", $values) . "<br>";
    }
    $cookieString = $request->getHeaderLine('Cookie'); //cookie情報取得
    $cookieArray = explode(";", $cookieString);
    if (gettype($cookieArray) === "string") {
      $html .= "req.cookie" . $cookieString . "<br>";
    } else {
      foreach ($cookieArray as $name => $values) {
        $html .= $name . ": " . $values . "<br>";
      }
    }
    $files = $request->getUploadedFiles(); // file情報取得
    var_dump($files);
    // $html .= "req.files" . $files . "<br>";

    // ブラウザからのリクエスト検知
    if ($request->getHeaderLine('X-Requested-With') === 'XMLHttpRequest') {
      // Do something ブラウザからの
      $params = $request->getServerParams();
      $authorization = $params['HTTP_AUTHORIZATION'] ?? null;
      if ($authorization === "string") // headerで認証機能つける場合
        $html .= "req.auth" . $authorization . "<br>";
    }
    $response->getBody()->write($html);
    return $response;
  }
}
