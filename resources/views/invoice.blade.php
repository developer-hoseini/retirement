@extends('main')

@section('content')

    <div class="container">

        <div class="card box_shadow_gray">
            <div class="card-body">

                <div class="panel-heading" style="text-align: center">
                    <h3 class="panel-title" style="margin: auto">پیش نمایش فاکتور خرید</h3>
                </div>

                <div class="panel-body row">

                    <div class="col-md-6 m-3">
                        شماره سفارش :
                        <span>
                            {{ConvertNumber::ToFarsi($payment->serial)}}
                        </span>
                    </div>


                    <div class="col-md-12">
                        <table class="table table-striped table-bordered">
                            <thead>

                            </thead>
                            <tbody>

                            <tr class="bg-success">
                                <td>تعداد محصولات خریداری شده</td>

                                <td>
                                    {{ConvertNumber::ToFarsi(count($carts))}} محصول
                                </td>
                            </tr>

                            <tr class="bg-success">
                                <td>قیمت محصولات خریداری شده</td>

                                <td>

                                    <?php
                                    $total = 0;
                                    foreach ($carts as $cart) {
                                        $total += $cart->price;
                                    }
                                    echo ConvertNumber::ToFarsi($total);
                                    ?> ريال
                                </td>

                            </tr>

                            <tr class="bg-success">
                                <td>مبلغ قابل پرداخت</td>

                                <td>
                                    {{ConvertNumber::ToFarsi($payment->total_amount)}} ریال
                                </td>

                            </tr>

                            </tbody>
                        </table>
                    </div>


                        <div class="text-center">
                            <div class="payment_form m-auto"
                                 style="{{isset($payment->serial) ? "" : "display: none" }}">
                                <form action="http://ppg.icsdev.ir/" method="post">

                                    @csrf
                                    <input hidden name="ver_code" class="payment_ver_code"
                                           value="{{unserialize(session()->get('authByOpenID'))["ver_code"]}}">
                                    <input hidden name="serial" class="payment_serial" value="{{$payment->serial}}">
                                    <input hidden name="order_id" class="payment_order_id"
                                           value="{{$payment->id}}">
                                    <input hidden name="postback_url" id="payment_postback_url"
                                           value="https://ariajam.icsdev.ir/payment/verify/[amount]/[order_id]">

                                    <hr>
                                    <button class="btn btn-success text-center m-auto" type="submit">
                                        پرداخت
                                    </button>
                                </form>
                            </div>
                        </div>

                    {{--@endif--}}

                </div>

            </div>
        </div>

    </div>



@endsection
