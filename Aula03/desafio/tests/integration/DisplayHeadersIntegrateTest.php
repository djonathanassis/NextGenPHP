<?php

namespace Tests\Integration;

use DateTimeImmutable;
use Headers\DisplayHeaders;
use Headers\Response\Cookie;
use Headers\Response\Expires;
use PHPUnit\Framework\TestCase;

class DisplayHeadersIntegrateTest extends TestCase
{
    /**
     * @throws \Exception
     */
    final public function testDisplayHeadersShouldIntegrateWithCookieClass(): void
    {
        $expires = new Expires();
        $cookie1 = new Cookie(
            cookieName: 'name1',
            cookieValue: 'value123456'
        );

        $cookie2 = new Cookie(
            cookieName: 'name2',
            cookieValue: 'value678912332',
            startDate: new DateTimeImmutable('2023-02-06 13:00:00')
        );
        $cookie2->setExpires(
            expiresComponent: $expires
                ->hours(2)
                ->minutes(20)
                ->seconds(38)
        );

        $displayHeaders = new DisplayHeaders();
        $displayHeaders->add($cookie1);
        $displayHeaders->add($cookie2);

        $result = $displayHeaders->getHeaderString();

        $this->assertEquals(<<<HEADERS
        Set-Cookie: name1=value123456
        Set-Cookie: name2=value678912332; Expires=Mon, 06 Feb 2023 15:20:38 GMT
        HEADERS, $result);
    }

    /**
     * @throws \Exception
     */
    final public function testDisplayHeadersShouldIntegrateWithCookieClassWithExpires(): void
    {
        $expires1 = new Expires();
        $cookie1 = new Cookie(
            cookieName: 'name1',
            cookieValue: 'value123456',
            startDate: new  DateTimeImmutable('2023-02-06 13:00:00')
        );

        $cookie1->setExpires(
            expiresComponent: $expires1
                ->days(1)
                ->hours(2)
                ->minutes(42)
                ->seconds(29)
        );

        $expires2 = new Expires();
        $cookie2 = new Cookie(
            cookieName: 'name2',
            cookieValue: 'value678912332',
            startDate: new DateTimeImmutable('2023-02-06 13:00:00')
        );

        $cookie2->setExpires(
            expiresComponent: $expires2
                ->hours(2)
                ->minutes(20)
                ->seconds(38)
        );

        $displayHeaders = new DisplayHeaders();
        $displayHeaders->add($cookie1);
        $displayHeaders->add($cookie2);

        $result = $displayHeaders->getHeaderString();

        $this->assertEquals(<<<HEADERS
        Set-Cookie: name1=value123456; Expires=Tue, 07 Feb 2023 15:42:29 GMT
        Set-Cookie: name2=value678912332; Expires=Mon, 06 Feb 2023 15:20:38 GMT
        HEADERS, $result);
    }

    /**
     * @throws \Exception
     */
    final public function testDisplayHeadersShouldIntegrateWith3CookieClassWithExpires(): void
    {
        $expires1 = new Expires();
        $cookie1 = new Cookie(
            cookieName: 'name1',
            cookieValue: 'value123456',
            startDate: new DateTimeImmutable('2023-02-06 13:00:00')
        );

        $cookie1->setExpires(
            expiresComponent: $expires1
                ->days(1)
                ->hours(2)
                ->minutes(42)
                ->seconds(29)
        );

        $expires2 = new Expires();
        $cookie2 = new Cookie(
            cookieName: 'name2',
            cookieValue: 'value678912332',
            startDate: new DateTimeImmutable('2023-02-06 13:00:00')
        );

        $cookie2->setExpires(
            expiresComponent: $expires2
                ->hours(2)
                ->minutes(20)
                ->seconds(38)
        );

        $expires3 = new Expires();
        $cookie3 = new Cookie(
            cookieName: 'name3',
            cookieValue: 'valueqwee12334',
            startDate: new DateTimeImmutable('2023-02-06 13:00:00')
        );

        $cookie3->setExpires(
            expiresComponent: $expires3
                ->hours(1)
                ->minutes(30)
                ->seconds(22)
        );

        $displayHeaders = new DisplayHeaders();
        $displayHeaders->add($cookie1);
        $displayHeaders->add($cookie2);
        $displayHeaders->add($cookie3);

        $result = $displayHeaders->getHeaderString();

        $this->assertEquals(<<<HEADERS
        Set-Cookie: name1=value123456; Expires=Tue, 07 Feb 2023 15:42:29 GMT
        Set-Cookie: name2=value678912332; Expires=Mon, 06 Feb 2023 15:20:38 GMT
        Set-Cookie: name3=valueqwee12334; Expires=Mon, 06 Feb 2023 14:30:22 GMT
        HEADERS, $result);
    }

    final public function testDisplayHeadersWithoutHeadersShouldThrowAnException(): void
    {
        $this->expectException(\Exception::class);
        $this->getExpectedExceptionMessage('There is no headers to display');
        
        $displayHeaders = new DisplayHeaders();
        $displayHeaders->getHeaderString();
    }
}
