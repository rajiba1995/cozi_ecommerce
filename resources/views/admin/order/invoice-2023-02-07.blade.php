@extends('admin.layouts.app')

@section('page', 'Order invoice')

@section('content')
    <style>
        .border td {
            border: 1px solid #ddd;
        }

        table,
        table p {
            font-size: 12px;
        }

        table h3 {
            font-size: 16px;
        }
    </style>
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <a href="javascript: void(0)" type="button" class="btn btn-primary btn-sm" onclick="printInvoice()">Print</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="printDiv">
                            <table border="1" class="table-bordered" style="width: 100%; border-collapse: collapse;"
                                cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <table border="1" style="width: 100%; border-collapse: collapse;"
                                            class="table-bordered" cellpadding="10" cellspacing="0">
                                            <tr>
                                                <td style="width: 35%;" rowspan="2">
                                                    <p style="margin: 0">Sender</p>
                                                    <p style="margin: 0;"><strong>{{ $settings[18]->content }}</strong><br />{!! $settings[5]->content !!}</p>
                                                    <p style="margin: 0;">Ph No: <strong>{{ $settings[6]->content }}</strong></p>
                                                    <p style="margin: 0;">GSTIN: <strong>{{ $settings[19]->content }}</strong></p>
                                                </td>
                                                <td style="width: 35%;">
                                                    <p style="margin: 0;">Invoice ID:<br /><strong>{{ $data->order_no }}</strong></p>
                                                </td>
                                                <td style="width: 30%;">
                                                    <p style="margin: 0;">Invoice Date:<br /><strong>{{date('j-M-Y', strtotime($data->created_at))}}</strong>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <p style="margin: 0;">Order No: <strong>{{ $data->order_no }}</strong></p>
                                                    <p style="margin: 0;">Order Date: {{date('j-M-Y', strtotime($data->created_at))}}</p>
                                                </td>
                                                <td>
                                                    <p style="margin: 0;">Portal: <strong>{{ $settings[18]->content }}</strong></p>
                                                    <p style="margin: 0;">Payment Mode</p>
                                                    <p style="margin: 0;"><strong>
                                                        @php
                                                            if ($data->payment_method == "cash_on_delivery") {
                                                                echo 'Cash on Delivery';
                                                            } else {
                                                                echo 'Online Payment';
                                                            }
                                                        @endphp
                                                    </strong></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p style="margin: 0;">Bill To: <br />
                                                        <strong>{{$data->fname.' '.$data->lname}}</strong>
                                                        <br />{{$data->billing_address}}, {{$data->billing_landmark ? $data->billing_landmark.', ' : ''}} {{$data->billing_pin.', '.$data->billing_city.', '.$data->billing_state.', '.$data->billing_country}}</p>
                                                    <p style="margin: 0;">T : {{$data->mobile}}</p>
                                                </td>
                                                <td>
                                                    <p style="margin: 0;">Ship To: <br />
                                                        <strong>{{$data->fname.' '.$data->lname}}</strong>
                                                        <br />{{$data->shipping_address ?? $data->billing_address}},

                                                        {{$data->shipping_landmark ? $data->shipping_landmark.',' : ($data->billing_landmark ? $data->billing_landmark.', ' : '')}}

                                                        {{$data->shipping_pin ? $data->shipping_pin.',' : ($data->billing_pin ? $data->billing_pin.', ' : '')}}

                                                        {{$data->shipping_city ? $data->shipping_city.',' : ($data->billing_city ? $data->billing_city.', ' : '')}}

                                                        {{$data->shipping_state ? $data->shipping_state.',' : ($data->billing_state ? $data->billing_state.', ' : '')}}

                                                        {{$data->shipping_country ? $data->shipping_country : ($data->billing_country ? $data->billing_country : '')}}

                                                        {{-- {{$data->shipping_pin ?? $data->billing_pin.', '.$data->shipping_city ?? $data->billing_city.', '.$data->shipping_state ?? $data->billing_state.', '.$data->shipping_country ?? $data->billing_country}} --}}
                                                    </p>
                                                    <p style="margin: 0;">T : {{$data->mobile}}</p>
                                                </td>
                                                <td>
                                                    {{-- <p style="margin: 0;">Dispatch Through<br /><strong>EK</strong><br />AWB
                                                        No<br /> MYNP0032032743</p> --}}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border="1" style="width: 100%; border-collapse: collapse;"
                                            class="table-bordered" cellpadding="10" cellspacing="0">
                                            <tr>
                                                <th align="center">Sl No.</th>
                                                <th align="center">Descriptions of Goods</th>
                                                <th align="center">Part No</th>
                                                <th align="center">Qty</th>
                                                <th align="center">MRP</th>
                                                <th align="center">Rate</th>
                                                <th align="center">Taxable Value<br />(INR)</th>
                                                {{-- <th align="center">{{ GSTHeading($data->billing_state) }} (INR)</th> --}}
                                                <th align="center">CGST (INR)</th>
                                                <th align="center">SGST (INR)</th>
                                                <th align="center">IGST (INR)</th>
                                                <th align="center">Amount (INR)</th>
                                            </tr>
                                            @foreach($data->orderProducts as $productKey => $productVal)
                                            
                                            @php
                                                $rate = 0;
                                                $tax = 0;
                                                $gst = 0;
                                                $amount = 0;

                                                $amount = $productVal->offer_price * 1;

                                                if($amount <= 1000){
                                                    $gst = 5;
                                                }else{
                                                    $gst = 12;
                                                }

                                                $amountShow = sprintf("%.2f", ($productVal->offer_price * $productVal->qty));

                                                // $gstShow = sprintf("%.3f", $gst);
                                                $gstShow = GSTCalculation($data->billing_state, $gst);
                                                $taxInTotalAmount = sprintf("%.2f", ($gst / (100 + $gst)) * $amount);
                                                $withoutTaxAmount = $amount - $taxInTotalAmount;

                                                $variation_id = $productVal->product_variation_id;
                                                $skuCode = \DB::table('product_color_sizes')->select('code')->where('id', $variation_id)->first();
                                            @endphp

                                            <tr>
                                                <td align="center">1</td>
                                                <td><strong>{{ $productVal->product_name }}</strong></td>
                                                <td>{{$skuCode ? $skuCode->code : ''}}</td>
                                                <td align="center">{{ $productVal->qty }}</td>
                                                <td align="right">{{ sprintf('%.2f', $productVal->offer_price) }}</td>
                                                <td align="right">{{ $withoutTaxAmount }}</td>
                                                <td align="right">{{ $withoutTaxAmount * $productVal->qty }}</td>
                                                <td align="right">{!! cgstCalc($data->billing_state, $taxInTotalAmount, $gst) !!}</td>
                                                <td align="right">{!! sgstCalc($data->billing_state, $taxInTotalAmount, $gst) !!}</td>
                                                <td align="right">{!! igstCalc($data->billing_state, $taxInTotalAmount, $gst) !!}</td>
                                                {{-- <td align="right">{{ $taxInTotalAmount }}<br />({{ $gstShow }})</td> --}}
                                                <td align="right">{{ $amountShow }}</td>
                                            </tr>
                                            @endforeach

                                            <tr style="border-width: 0;">
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 1px;">Amount</td>
                                                <td style="border-width: 1px;" align="right">{{sprintf("%.2f", $data->amount)}}</td>
                                            </tr>
                                            <tr style="border-width: 0;">
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 1px;">Discount</td>
                                                <td style="border-width: 1px;" align="right">
                                                    @php
                                                        $discountAmount = 0;
                                                    @endphp

                                                    @if ($data->coupon_code_id != 0)
                                                        @if ($data->coupon_code_discount_type == 'Percentage')
                                                            -{{ sprintf('%.2f', ceil(($data->amount * $data->discount_amount) / 100)) }}

                                                            @php
                                                                $discountAmount = ceil(($data->amount * $data->discount_amount) / 100);
                                                            @endphp
                                                        @else
                                                            -{{ sprintf('%.2f', $data->discount_amount) }}

                                                            @php
                                                                $discountAmount = $data->discount_amount;
                                                            @endphp
                                                        @endif

                                                        {{-- {!! $data->coupon_code_discount_type == 'Percentage' ? '- '.sprintf("%.2f",($data->amount - $data->final_amount)) : '- '.sprintf("%.2f", $data->discount_amount) !!} --}}
                                                    @else
                                                        {{sprintf("%.2f", $data->discount_amount)}}
                                                    @endif
                                                </td>
                                            </tr>
                                            @if ($data->coupon_code_id != 0)
                                            <tr style="border-width: 0;">
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 1px;">Subtotal</td>
                                                <td style="border-width: 1px;" align="right">
                                                    {{ sprintf('%.2f', ($data->amount - $discountAmount)) }}
                                                </td>
                                            </tr>
                                            @endif
                                            <tr style="border-width: 0;">
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 1px;">Shipping Charges</td>
                                                <td style="border-width: 1px;" align="right">
                                                    {{ ($data->shipping_charges > 0) ? '+' : '' }}{{sprintf("%.2f", $data->shipping_charges)}}
                                                </td>
                                                {{-- <td style="border-width: 1px;" align="right">{{sprintf("%.2f", $data->shipping_charges)}}</td> --}}
                                            </tr>
                                            <tr style="border-width: 0;">
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 0;"></td>
                                                <td style="border-width: 1px;">Final Amount</td>
                                                <td style="border-width: 1px;" align="right">{{sprintf("%.2f", $data->final_amount)}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border="0" style="width: 100%; border-collapse: collapse;"
                                            class="" cellpadding="10" cellspacing="0">
                                            <tr>
                                                <td valign="top">
                                                    <p style="margin: 0;">Amount Chargeable (in words)<br /><strong>INR {{ amountInWords($data->final_amount) }} Only Tax is payable on reverse charge basis: No</strong></p>
                                                </td>
                                                <td align="right" valign="top">
                                                    <h4 style="margin: 0; font-size: 14px;">E. & O.E</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 50%;">
                                                    <p style="margin: 0;"><u>Declaration</u></p>
                                                    <p style="margin: 0;">1. All claims, if any, for shortages or damages
                                                        must be reported to customer service on the day of delivery through
                                                        the contact us page on the web store 2. All Disputes are subject to
                                                        West Bengal (19) jurisdiction only.</p>
                                                </td>
                                                <td align="center"
                                                    style="width: 50%; border-top: 1px solid #000; border-left: 1px solid #000;">
                                                    <h3>ONN International</h3>
                                                    <h3>Authorised Signatory</h3>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border="0" style="width: 100%; border-collapse: collapse;"
                                            class="" cellpadding="10" cellspacing="0">
                                            <tr>
                                                <td style="width: 49%;">
                                                    <p style="margin: 0;"><strong>Bill By</strong>
                                                </td>
                                                <td style="width: 2%;" align="center">:</td>
                                                <td style="width: 49%;"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('js/printThis.js') }}"></script>

    <script>
        function printInvoice() {
            $('.printDiv').printThis({
                pageTitle: "{{$data->order_no}}"
            });
        }
    </script>
@endsection
