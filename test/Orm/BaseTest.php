<?php

namespace ZFTest\OAuth2\Doctrine\Orm;

use Doctrine\ORM\Tools\SchemaTool;

abstract class BaseTest extends \Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase
{
    protected function setUp()
    {
        $this->setApplicationConfig(
            include __DIR__ . '/../asset/orm.config.php'
        );

        parent::setUp();

        $serviceManager = $this->getApplication()->getServiceManager();
        $serviceManager->setAllowOverride(true);

        copy(
            __DIR__ . '/../asset/data/doctrine-original.db',
            __DIR__ . '/../asset/data/doctrine.db'
        );
    }

    public function provideStorage()
    {
        $this->setUp();

        $serviceManager = $this->getApplication()->getServiceManager();
        $doctrine = $serviceManager->get('ZF\OAuth2\Adapter\DoctrineAdapter');

        return array(array($doctrine));
    }
}
