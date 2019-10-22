<?php

namespace App\Frontend;

use OpenFram\Application;
use OpenFram\RedirectException;
use function GuzzleHttp\Psr7\stream_for;
use function Http\Response\send;

class FrontendApplication extends Application
{

    public function __construct($request)
    {
        parent::__construct($request);
        $this->name = 'Frontend';
    }

    /**
     * @return void
     */
    public function run(): void
    {
        try {
            $controller = $this->getController($this->request->getUri()->getPath());
            $controller->execute();
            $page = $controller->getPage()->getGeneratedPage();
            send($this->response->withBody(stream_for($page)));

        }catch(RedirectException $e){
        $e->run();
    }

    }
}
