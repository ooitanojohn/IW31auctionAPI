<?php

namespace Classes\api;

use PDO;
use PDOException;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Config\Conf;
use Classes\entities\User;
use Classes\Daos\UserDAO;

/**
 * ログイン・ログアウトに関するコントローラクラス。
 */
class UserApi extends UserDAO
{
  public function __construct()
  {
    $hash = new Hash();
  }
  /** */
  public function stringHash($request, $response, array $args)
  {

    $response = $hash->Md5($request);
    echo json_encode($response);
  }

  /**
   * ログイン画面表示処理。
   */
  public function goLogin(ServerRequestInterface $request, ResponseInterface
  $response, array $args): ResponseInterface
  {
    return json_encode($returnResponse);
  }

  /**
   * ログイン処理。
   */
  public function login(
    ServerRequestInterface $request,
    ResponseInterface $response,
    array $args
  ): ResponseInterface {
    $isRedirect = false;
    $templatePath = "login.html";
    $assign = [];

    $postParams = $request->getParsedBody();
    $loginId = $postParams["loginId"];
    $loginPw = $postParams["loginPw"];

    $loginId = trim($loginId);
    $loginPw = trim($loginPw);

    $validationMsgs = [];
    if (empty($validationMsgs)) {
      try {
        $db = new PDO(Conf::DB_DNS, Conf::DB_USERNAME, Conf::DB_PASSWORD);
        $userDAO = new UserDAO($db);
        $user = $userDAO->findByUsMail($loginId);

        if ($user == null) {
          $validationMsgs[] = "存在しないIDです。正しいIDを入力してください。";
        } else {
          $userPw = $user->getUsPassword();
          if (password_verify($loginPw, $userPw)) {
            $id = $user->getId();
            $name = $user->getUsName();
            $mail = $user->getUsMail();
            $auth = $user->getUsAuth();

            $_SESSION["loginFlg"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["name"] = $name;
            $_SESSION["mail"] = $mail;
            $_SESSION["auth"] = $auth; // 権限
            $isRedirect = true;
          } else {
            $validationMsgs[] =
              "パスワードが違います。正しいパスワードを入力してください。";
          }
        }
      } catch (PDOException $ex) {
        $exCode = $ex->getCode();
        throw new DataAccessException("DB接続に失敗しました。", $exCode, $ex);
      } finally {
        $db = null;
      }
    }

    if ($isRedirect) {
      $returnResponse = $response->withStatus(302)->withHeader(
        "Location",
        "/reports/showList"
      );
    } else {
      if (!empty($validationMsgs)) {
        $assign["validationMsgs"] = $validationMsgs;
        $assign["loginId"] = $loginId;
      }
      $returnResponse = $this->view->render($response, $templatePath, $assign);
    }
    return $returnResponse;
  }

  /**
   * ログアウト処理。
   */
  public function logout(
    ServerRequestInterface $request,
    ResponseInterface $response,
    array $args
  ): ResponseInterface {
    session_destroy();
    $returnResponse = $response->withStatus(302)->withHeader(
      "Location",
      "/"
    );
    return $returnResponse;
  }
}
