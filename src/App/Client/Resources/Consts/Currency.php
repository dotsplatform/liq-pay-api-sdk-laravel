<?php
/**
 * Description of CurrencyCode.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Resources\Consts;

enum Currency: string
{
    case USD = 'USD';
    case EUR = 'EUR';
    case UAH = 'UAH';
}
