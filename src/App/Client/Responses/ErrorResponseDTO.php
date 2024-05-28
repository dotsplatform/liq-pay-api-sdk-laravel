<?php
/**
 * Description of ErrorResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Responses;

class ErrorResponseDTO extends LiqPayResponseDTO
{
    protected ?string $code;

    protected ?string $err_code;

    protected ?string $err_description;

    protected ?string $key;

    protected ?string $result;

    protected ?string $status;

    public function isError(): bool
    {
        return $this->getStatus() && $this->getErrCode();
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function getErrCode(): ?string
    {
        return $this->err_code;
    }

    public function getErrDescription(): ?string
    {
        return $this->err_description;
    }

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }
}
