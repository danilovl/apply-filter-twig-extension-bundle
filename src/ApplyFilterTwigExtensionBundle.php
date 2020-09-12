<?php declare(strict_types=1);

namespace Danilovl\ApplyFilterTwigExtensionBundle;

use Danilovl\ApplyFilterTwigExtensionBundle\DependencyInjection\ApplyFilterExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplyFilterTwigExtensionBundle extends Bundle
{
    public function getContainerExtension(): ApplyFilterExtension
    {
        return new ApplyFilterExtension;
    }
}
