<?php declare(strict_types=1);

namespace Danilovl\ApplyFilterTwigExtensionBundle\Twig;

use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ApplyFilterExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('apply_filter', [$this, 'applyFilter'], ['needs_environment' => true, 'is_safe' => ['html']]),
        ];
    }

    public function applyFilter(
        Environment $env,
        string $name,
        mixed $value,
        mixed $parameters = null,
        bool $skipChangeParameters = false
    ): string {
        $context = ['value' => $value];

        $template = sprintf('{{ value | %s }}', $name);
        if ($parameters !== null) {
            $contextArguments = null;

            if (is_array($parameters) && !$skipChangeParameters) {
                $index = 0;
                foreach ($parameters as $parameter) {
                    $context['context_' . $index] = $parameter;

                    if ($contextArguments === null) {
                        $contextArguments = 'context_' . $index;
                    } else {
                        $contextArguments .= ', context_' . $index;
                    }

                    $index++;
                }
            } else {
                $contextArguments = 'context';
                $context['context'] = $parameters;
            }

            $template = sprintf('{{ value | %s(%s) }}', $name, $contextArguments);
        }

        return $env->createTemplate($template)->render($context);
    }
}
