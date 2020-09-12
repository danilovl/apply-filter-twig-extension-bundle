<?php declare(strict_types=1);

namespace Danilovl\ApplyFilterTwigExtensionBundle\Tests;

use Generator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Twig\Environment;

class ApplyExtensionTest extends KernelTestCase
{
    private Environment $twig;

    public function setUp(): void
    {
        parent::setUp();

        $this->twig = self::bootKernel()->getContainer()->get('twig');
    }

    /**
     * @dataProvider filtersProvider
     */
    public function testFilters(
        string $template,
        string $result,
        array $templateParameter = []
    ): void {
        $output = $this->twig->createTemplate($template)->render($templateParameter);

        $this->assertEquals($output, $result);
    }

    public function filtersProvider(): Generator
    {
        yield ["{{ apply_filter('title', 'my first car') }}", 'My First Car'];
        yield ["{{ apply_filter('abs', number) }}", '5', ['number' => -5]];
        yield ["{{ apply_filter('capitalize', 'my first car') }}", 'My first car'];
        yield ["{{ apply_filter('date','01-01-2020') }}", 'January 1, 2020 00:00'];
        yield ["{{ apply_filter('first','1234') }}", '1'];
        yield ["{{ apply_filter('format', 'I like %s and %s.', ['foo', 'bar']) }}", 'I like foo and bar.'];
        yield ["{{ apply_filter('join', join) }}", '123', ['join' => [1, 2, 3]]];
        yield ["{{ apply_filter('join', join, '|') }}", '1|2|3', ['join' => [1, 2, 3]]];
        yield ["{{ apply_filter('join', join, [',', ' and ']) }}", '1,2 and 3', ['join' => [1, 2, 3]]];
        yield ["{{ apply_filter('length ', length) }}", '3', ['length' => [1, 2, 3]]];
        yield ["{{ apply_filter('lower ', 'WELCOME') }}", 'welcome'];
        yield ["{{ apply_filter('replace ', 'I like this and --that--.', {'this': 'foo', '--that--': 'bar'}, true) }}", 'I like foo and bar.'];
        yield ["{{ apply_filter('reverse ', '1234' ) }}", '4321'];
        yield ["{{ apply_filter('round ', 42.55 ) }}", '43'];
        yield ["{{ apply_filter('round ', 42.55, [1, 'floor']) }}", '42.5'];
        yield ["{{ apply_filter('slice ', '12345', [1, 2]) }}", '23'];
        yield ["{{ apply_filter('trim', '   I like Twig.') }}", 'I like Twig.'];
        yield ["{{ apply_filter('trim', '   I like Twig.', '.') }}", '   I like Twig'];
        yield ["{{ apply_filter('trim', '  I like Twig.  ', [' ', 'right']) }}", '  I like Twig.'];
    }
}
