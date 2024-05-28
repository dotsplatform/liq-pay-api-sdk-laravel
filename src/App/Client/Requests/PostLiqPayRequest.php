<?php
/**
 * Description of BaseGlovoRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasFormBody;

abstract class PostLiqPayRequest extends BaseLiqPayRequest implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;
}
