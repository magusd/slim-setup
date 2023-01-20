<?php

use DI\Container;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMSetup;
use Slim\App;
use Slim\Factory\AppFactory;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

return function (Container $container) {
    $container->set('settings', require __DIR__.'/settings.php');

    $container->set(EntityManager::class, function (Container $c): EntityManagerInterface {
        /** @var array $settings */
        $settings = $c->get('settings');

        $cache = $settings['doctrine']['dev_mode'] ?
            new ArrayAdapter() :
            new FilesystemAdapter(directory: $settings['doctrine']['cache_dir']);

        $config = ORMSetup::createAttributeMetadataConfiguration(
            $settings['doctrine']['metadata_dirs'],
            $settings['doctrine']['dev_mode'],
            null,
            $cache
        );

        return EntityManager::create($settings['doctrine']['connection'], $config);
    });

    $container->set(App::class, function (Container $c): App {
        $app = AppFactory::createFromContainer($c);

        $app->addBodyParsingMiddleware();
        $app->addRoutingMiddleware();
        $app->addErrorMiddleware(true, false, false);

        $routes = require __DIR__.'/../routes/web.php';
        $routes($app);

        $api = require __DIR__.'/../routes/api.php';
        $api($app);

        return $app;
    });
};
