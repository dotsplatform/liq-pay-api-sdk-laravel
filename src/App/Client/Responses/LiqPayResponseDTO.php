<?php
/**
 * Description of PlateByMonoResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Responses;

use Dots\Data\DTO;
use Saloon\Http\Response;

abstract class LiqPayResponseDTO extends DTO
{
    public static function fromResponse(Response $response): static
    {
        return static::fromArray($response->json());
    }
}
