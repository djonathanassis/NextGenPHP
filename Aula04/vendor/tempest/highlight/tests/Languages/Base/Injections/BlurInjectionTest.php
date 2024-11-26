<?php

declare(strict_types=1);

namespace Tempest\Highlight\Tests\Languages\Base\Injections;

use PHPUnit\Framework\TestCase;
use Tempest\Highlight\Highlighter;
use Tempest\Highlight\Languages\Base\Injections\BlurInjection;
use Tempest\Highlight\Tokens\TokenTypeEnum;

final class BlurInjectionTest extends TestCase
{
    public function test_blur_injection()
    {
        $content = <<<TXT
{~class Foo~}
TXT;

        $expected = <<<TXT
{~class Foo~}
TXT;

        $parsed = (new BlurInjection())->parse($content, new Highlighter());

        $this->assertSame($expected, $parsed->content);

        $this->assertCount(3, $parsed->tokens);

        $this->assertSame(0, $parsed->tokens[0]->start);
        $this->assertSame(2, $parsed->tokens[0]->end);
        $this->assertSame(TokenTypeEnum::HIDDEN, $parsed->tokens[0]->type);

        $this->assertSame(2, $parsed->tokens[1]->start);
        $this->assertSame(11, $parsed->tokens[1]->end);
        $this->assertSame('hl-blur', $parsed->tokens[1]->type->getValue());

        $this->assertSame(11, $parsed->tokens[2]->start);
        $this->assertSame(13, $parsed->tokens[2]->end);
        $this->assertSame(TokenTypeEnum::HIDDEN, $parsed->tokens[2]->type);
    }
}
