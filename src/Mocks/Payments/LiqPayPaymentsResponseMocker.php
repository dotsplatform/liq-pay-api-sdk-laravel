<?php
/**
 * Description of PaymentsResponseMocker.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\Mocks\Payments;

use Dots\LiqPay\App\Client\Requests\Payments\CancelPaymentRequest;
use Dots\LiqPay\App\Client\Requests\Payments\CompletePaymentRequest;
use Dots\LiqPay\App\Client\Requests\Payments\CreatePaymentRequest;
use Dots\LiqPay\App\Client\Requests\Payments\PaymentStatusRequest;
use Dots\LiqPay\App\Client\Resources\Payments\LiqPayPayment;
use Dots\LiqPay\App\Client\Responses\Payments\CancelPaymentResponseDTO;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

class LiqPayPaymentsResponseMocker
{
    public static function mockSuccessCreatePayment(array $data = []): array
    {
        $dto = PaymentsResponseDemoDataGenerator::generateSuccessCreatePayment($data);
        $headers = [
            'Location' => $dto->getUrl(),
        ];
        MockClient::global([
            CreatePaymentRequest::class => MockResponse::make([], 200, $headers),
        ]);

        return $data;
    }

    public static function mockFailCreatePayment(array $data = []): array
    {
        $data = PaymentsResponseDemoDataGenerator::generateErrorResponsePayment($data);
        MockClient::global([
            CreatePaymentRequest::class => MockResponse::make($data),
        ]);

        return $data;
    }

    public static function mockSuccessPaymentStatus(array $data = []): LiqPayPayment
    {
        $dto = PaymentsResponseDemoDataGenerator::generateSuccessPaymentStatus($data);
        MockClient::global([
            PaymentStatusRequest::class => MockResponse::make($dto->toArray()),
        ]);

        return $dto;
    }

    public static function mockFailPaymentStatus(array $data = []): array
    {
        $data = PaymentsResponseDemoDataGenerator::generateErrorResponsePayment($data);
        MockClient::global([
            PaymentStatusRequest::class => MockResponse::make($data),
        ]);

        return $data;
    }

    public static function mockSuccessCompletePayment(array $dto = []): LiqPayPayment
    {
        $dto = PaymentsResponseDemoDataGenerator::generateSuccessCompletePayment($dto);
        MockClient::global([
            CompletePaymentRequest::class => MockResponse::make($dto->toArray()),
        ]);

        return $dto;
    }

    public static function mockFailCompletePayment(array $data = []): array
    {
        $data = PaymentsResponseDemoDataGenerator::generateErrorResponsePayment($data);
        MockClient::global([
            CompletePaymentRequest::class => MockResponse::make($data),
        ]);

        return $data;
    }

    public static function mockSuccessCancelPayment(array $data = []): CancelPaymentResponseDTO
    {
        $dto = PaymentsResponseDemoDataGenerator::generateSuccessCancelPayment($data);
        MockClient::global([
            CancelPaymentRequest::class => MockResponse::make($dto->toArray()),
        ]);

        return $dto;
    }

    public static function mockFailCancelPayment(array $data = []): array
    {
        $data = PaymentsResponseDemoDataGenerator::generateErrorResponsePayment($data);
        MockClient::global([
            CancelPaymentRequest::class => MockResponse::make($data),
        ]);

        return $data;
    }
}
