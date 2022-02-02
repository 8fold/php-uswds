<?php

declare(strict_types=1);

namespace Eightfold\Uswds\Tests;

use PHPUnit\Framework\TestCase;

use Eightfold\Uswds\Button;

class ButtonTest extends TestCase
{
    /**
     * @test
     */
    public function default_button(): void
    {
        $expected = '<button class="usa-button">Button</button>';

        $result = (string) Button::create('Button');

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function button_can_have_properties(): void
    {
        $expected = '<button id="something" class="usa-button" disabled>Button</button>';

        $result = (string) Button::create('Button')
            ->props('id something', 'disabled disabled');

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function secondary_button(): void
    {
        $expected = '<button class="usa-button usa-button--secondary">Button</button>';

        $result = (string) Button::create('Button')->secondary();

        $this->assertEquals($expected, $result);
    }
}
