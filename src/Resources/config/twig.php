<?php declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Danilovl\ApplyFilterTwigExtensionBundle\Twig\ApplyFilterExtension;

return static function (ContainerConfigurator $container): void {
    $container->services()
        ->set('danilovl_apply_filter_twig_extension', ApplyFilterExtension::class)
        ->autowire()
        ->private()
        ->tag('twig.extension')
        ->alias(ApplyFilterExtension::class, 'danilovl_apply_filter_twig_extension');
};