<?php
/**
 * This file is part of the BEAR.Package package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\Package\Module\Cache;

use Ray\Di\AbstractModule;

class CacheModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $cacheLoader = $this->requestInjection(__NAMESPACE__ . '\Interceptor\CacheLoader');
        // bind @Cache annotated method in any class
        $this->bindInterceptor(
            $this->matcher->any(),
            $this->matcher->annotatedWith('BEAR\Sunday\Annotation\Cache'),
            [$cacheLoader]
        );
        $cacheUpdater = $this->requestInjection(__NAMESPACE__ . '\Interceptor\CacheUpdater');
        $this->bindInterceptor(
            $this->matcher->any(),
            $this->matcher->annotatedWith('BEAR\Sunday\Annotation\CacheUpdate'),
            [$cacheUpdater]
        );
    }
}
