<?php
/**
 * Description of InvoicesResponseMocker.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\Mocks\Invoices;

use Dots\LiqPay\App\Client\Requests\Payments\CancelPaymentRequest;
use Dots\LiqPay\App\Client\Requests\Payments\CompletePaymentRequest;
use Dots\LiqPay\App\Client\Requests\Payments\CreatePaymentRequest;
use Dots\LiqPay\App\Client\Requests\Payments\PaymentStatusRequest;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

class InvoicesResponseMocker
{
    public static function mockAllSuccess(): void
    {
        self::mockSuccessCreateInvoice();
        self::mockSuccessInvoiceStatus();
        self::mockSuccessFinalizeInvoice();
        self::mockSuccessCancelInvoice();
    }

    public static function mockAllFail(): void
    {
        self::mockFailCreateInvoice();
        self::mockFailInvoiceStatus();
        self::mockFailFinalizeInvoice();
        self::mockFailCancelInvoice();
    }

    public static function mockSuccessCreateInvoice(array $data = []): array
    {
        $data = InvoicesResponseDemoDataGenerator::generateSuccessCreateInvoice($data);
        MockClient::global([
            CreatePaymentRequest::class => MockResponse::make($data),
        ]);

        return $data;
    }

    public static function mockFailCreateInvoice(array $data = []): array
    {
        $data = InvoicesResponseDemoDataGenerator::generateFailCreateInvoice($data);
        MockClient::global([
            CreatePaymentRequest::class => MockResponse::make($data, 400),
        ]);

        return $data;
    }

    public static function mockSuccessInvoiceStatus(array $data = []): array
    {
        $data = InvoicesResponseDemoDataGenerator::generateSuccessInvoiceStatus($data);
        MockClient::global([
            PaymentStatusRequest::class => MockResponse::make($data),
        ]);

        return $data;
    }

    public static function mockFailInvoiceStatus(array $data = []): array
    {
        $data = InvoicesResponseDemoDataGenerator::generateFailInvoiceStatus($data);
        MockClient::global([
            PaymentStatusRequest::class => MockResponse::make($data, 400),
        ]);

        return $data;
    }

    public static function mockSuccessFinalizeInvoice(array $data = []): array
    {
        $data = InvoicesResponseDemoDataGenerator::generateSuccessFinalizeInvoice($data);
        MockClient::global([
            CompletePaymentRequest::class => MockResponse::make($data),
        ]);

        return $data;
    }

    public static function mockFailFinalizeInvoice(array $data = []): array
    {
        $data = InvoicesResponseDemoDataGenerator::generateFailFinalizeInvoice($data);
        MockClient::global([
            CompletePaymentRequest::class => MockResponse::make($data, 400),
        ]);

        return $data;
    }

    public static function mockSuccessCancelInvoice(array $data = []): array
    {
        $data = InvoicesResponseDemoDataGenerator::generateSuccessCancelInvoice($data);
        MockClient::global([
            CancelPaymentRequest::class => MockResponse::make($data),
        ]);

        return $data;
    }

    public static function mockFailCancelInvoice(array $data = []): array
    {
        $data = InvoicesResponseDemoDataGenerator::generateFailCancelInvoice($data);
        MockClient::global([
            CancelPaymentRequest::class => MockResponse::make($data, 400),
        ]);

        return $data;
    }
}
