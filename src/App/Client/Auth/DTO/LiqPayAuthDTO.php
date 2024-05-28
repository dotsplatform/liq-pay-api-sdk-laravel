<?php
/**
 * Description of PlateByModeAuthDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Auth\DTO;

use Dots\Data\DTO;

class LiqPayAuthDTO extends DTO
{
    protected string $publicKey;
    protected string $privateKey;

    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    public function getPrivateKey(): string
    {
        return $this->privateKey;
    }
}
