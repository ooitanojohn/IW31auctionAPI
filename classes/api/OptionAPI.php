<?php

namespace Classes\Api;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Classes\Common\Hash; // 関数呼び出し例
use PDO;
use PDOException;
use Config\MySQLConf; // DBの設定
use Classes\Daos\OptionDAO; // optionDao

class CarApi
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
    $hash = new Hash();
    /** SQL */
    try {
      $db = new PDO(MySQLConf::DB_DNS, MySQLConf::DB_USERNAME, MySQLConf::DB_PASSWORD); // DB接続
      $OptionDAO = new OptionDAO($db);
      $user = $OptionDAO->findAll();
      /** $userにSQLがはいった状態 */
    } catch (PDOException $ex) {
      $exCode = $ex->getCode();
      // throw new DataAccessException("DB接続に失敗しました。", $exCode, $ex);
    } finally {
      $db = null;
    }
    /** 処理 */
    /** 配列並び替え */
    var_dump($user);
    $param = "kkkkkkk";
    /** データをjson化して返す */
    $data = "get: " . $hash->md5($param);
    $payload = json_encode($data);
    $response->getBody()->write($payload);
    return $response
    ->withHeader('Content-Type', 'application/json');
  }
  /**
   * post取得
   *
   * @param Request $request
   * @param Response $response
   * @param array $args
   * @return Response
   */
  public function post(Request $request, $response, array $args)
  {
    // Get all POST parameters
    $params = (array)$request->getParsedBody();
    // var_dump($params);
    // Get a single POST parameter
    $foo = $params['foo'] ?? null;
    $bar = $params['bar'] ?? null;

    // var_dump($bar);
    $data = [
      "httpMethod" => "post",
      // "id" => $foo,
      "name" => $bar
    ];
    $data = array('name' => 'Bob', 'age' => 40);
    $payload = json_encode($data);
    $response->getBody()->write($payload);
    return $response
      ->withHeader('Content-Type', 'application/json');
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
