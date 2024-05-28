<?php
/**
 * Description of PaymentStatus.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Resources\Consts;

enum PaymentStatus: string
{
    case ERROR = 'error';
    case FAILURE = 'failure';
    case SUCCESS = 'success';
    case REVERSED = 'reversed';
}
