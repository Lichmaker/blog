<?php
namespace App\Http\Controllers\Api;

use Symfony\Component\HttpFoundation\Response as HttpResponse;

class HooksController extends ApiController
{
    public function github()
    {
        $pullRequestInformation = \Request::json('pull_request');
        if (empty($pullRequestInformation)) {
            return $this->response->setStatusCode(HttpResponse::HTTP_NO_CONTENT)->json('not found pull request information');
        }

        if (
            $pullRequestInformation['state'] != 'closed'
            || $pullRequestInformation['merged'] != true
        ) {
            return $this->response->setStatusCode(HttpResponse::HTTP_NO_CONTENT)->json("it is not a merge action");
        }

        if (empty(env('CURRENT_BRANCH'))) {
            return $this->response->setStatusCode(HttpResponse::HTTP_NO_CONTENT)->json("need to set a current branch.");
        }

        if (
            $pullRequestInformation['base']['ref'] != env('CURRENT_BRANCH')
        ) {
            return $this->response->setStatusCode(HttpResponse::HTTP_NO_CONTENT)->json("current branch is incorrect");
        }

        shell_exec('cd '.base_path());
        $result = shell_exec('git pull');

        return $this->response->setStatusCode(HttpResponse::HTTP_OK)->json($result);
    }
}
