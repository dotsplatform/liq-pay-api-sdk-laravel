<?php
/**
 * Description of LiqPayAuthenticatorTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Auth;

use Dots\LiqPay\App\Client\Auth\DTO\LiqPayAuthDTO;
use Dots\LiqPay\App\Client\Auth\LiqPayAuthenticator;
use Tests\TestCase;

class PlataByMonoAuthenticatorTest extends TestCase
{
    public function testExpectsFromAuthDTO(): void
    {
        $authDTO = LiqPayAuthDTO::fromArray([
            'accessToken' => 'test_token',
        ]);

        $authenticator = LiqPayAuthenticator::fromAuthDTO($authDTO);
        $this->assertEquals($authDTO->getAccessToken(), $authenticator->accessToken);
        $this->assertEquals(LiqPayAuthenticator::AUTH_HEADER_NAME, $authenticator->headerName);
    }
}
