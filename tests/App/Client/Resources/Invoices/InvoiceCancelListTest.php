<?php
/**
 * Description of InvoiceCancelListTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Resources\Invoices;

use Dots\LiqPay\App\Client\Resources\Payments\InvoiceCancelList;
use Tests\TestCase;

class InvoiceCancelListTest extends TestCase
{
    public function testFromArray(): void
    {
        $data = [
            [
                'status' => 'failure',
                'amount' => 1000,
                'ccy' => 980,
                'createdDate' => '2024-04-18T14:36:53+00:00',
                'modifiedDate' => '2024-04-18T14:38:10+00:00',
                'approvalCode' => 'approvalCode',
                'rrn' => 'rrn',
                'extRef' => 'extRef',
            ],
            [
                'status' => 'success',
                'amount' => 90000,
                'ccy' => 980,
                'createdDate' => '2024-03-18T14:37:53+00:00',
                'modifiedDate' => '2024-03-18T14:37:10+00:00',
                'approvalCode' => 'approvalCode2',
                'rrn' => 'rrn2',
                'extRef' => 'extRef2',
            ],
        ];

        $list = InvoiceCancelList::fromArray($data);

        $this->assertEquals($data, $list->toArray());
    }
}
