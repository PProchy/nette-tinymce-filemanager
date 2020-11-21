<?php

declare(strict_types=1);

namespace App\Router;

use Nette;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
        $router->add(self::createAdminRouter());
        $router->add(self::createFrontRouter());
		return $router;
	}

    public static function createFrontRouter(): RouteList
    {
        $router = new RouteList('Front');

        $router->addRoute('<presenter>/<action>[/<id>]', 'Homepage:default');

        return $router;
    }

    public static function createAdminRouter(): RouteList
    {
        $router = new RouteList('Admin');

        $router->addRoute('admin/<presenter>/<action>[/<id>]', 'Homepage:default');

        return $router;
    }
}
