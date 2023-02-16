<?php

use App\Repository\UserRepository;
use App\Service\UserService;
use DI\Container;
use Doctrine\DBAL\DriverManager;
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

        $driverManager = DriverManager::getConnection($settings['doctrine']['connection'], $config);

        return new EntityManager($driverManager, $config);
    });

    $container->set(UserRepository::class, new UserRepository($container->get(EntityManager::class)));
    $container->set(UserService::class, new UserService($container->get(UserRepository::class)));

    $container->set(App::class, function (Container $c): App {
        $app = AppFactory::createFromContainer($c);

        $app->addBodyParsingMiddleware();
        $app->addRoutingMiddleware();

        $api = require __DIR__.'/../routes/api.php';
        $api($app);

        $errorMiddleware = $app->addErrorMiddleware(true, false, false);
        $errorHandler = $errorMiddleware->getDefaultErrorHandler();
        $errorHandler->forceContentType('application/json');

        return $app;
    });
};
