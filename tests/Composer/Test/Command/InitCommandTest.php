<?php

/*
 * This file is part of Composer.
 *
 * (c) Nils Adermann <naderman@naderman.de>
 *     Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Composer\Test\Command;

use Composer\Command\InitCommand;
use Composer\Test\TestCase;

class InitCommandTest extends TestCase
{
    function testParseValidAuthorString()
    {
        $command = new InitCommand;
        $author = $command->parseAuthorString('John Smith <john@example.com>');
        $this->assertEquals('John Smith', $author['name']);
        $this->assertEquals('john@example.com', $author['email']);
    }

    function testParseEmptyAuthorString()
    {
        $command = new InitCommand;
        $this->setExpectedException('InvalidArgumentException');
        $command->parseAuthorString('');
    }

    function testParseAuthorStringWithInvalidEmail()
    {
        $command = new InitCommand;
        $this->setExpectedException('InvalidArgumentException');
        $command->parseAuthorString('John Smith <john>');
    }
}
