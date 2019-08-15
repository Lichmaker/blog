<?php
namespace App\Http\Controllers\Api;

use Symfony\Component\HttpFoundation\Response as HttpResponse;

class HooksController extends ApiController
{
    public function github()
    {
        $pullRequestInformation = \Request::json('pull_request');
        if (empty($pullRequestInformation)) {
            return $this->response->setStatusCode(HttpResponse::HTTP_OK)->json('not found pull request information');
        }

        // 只处理合并的 webhook , 其他开始/关闭都不进行操作
        if (
            $pullRequestInformation['state'] != 'closed'
            || $pullRequestInformation['merged'] != true
        ) {
            return $this->response->setStatusCode(HttpResponse::HTTP_OK)->json("it is not a merge action");
        }

        // 为适应多环境，可以自行设置限制分支
        if (empty(env('CURRENT_BRANCH'))) {
            return $this->response->setStatusCode(HttpResponse::HTTP_OK)->json("need to set a current branch.");
        }

        // 如果 pull request 不是更新本分支，则忽略
        if (
            $pullRequestInformation['base']['ref'] != env('CURRENT_BRANCH')
        ) {
            return $this->response->setStatusCode(HttpResponse::HTTP_OK)->json("current branch is incorrect");
        }

        // 执行 git pull ， 并进行记录
        $result = shell_exec('cd '.base_path().' && sudo git pull 2>&1');
        \Log::info(__METHOD__." : $result");

        // 还可根据 $pullRequestInformation 中返回的更新文件array， 执行例如 composer install/migrate 等操作

        // 最后返回 http 200 给 github 即可
        return $this->response->setStatusCode(HttpResponse::HTTP_OK)->json($result);
    }
}
