@foreach($transactions as $transaction)
    <tr>
        <td>{{ $transaction->id }}</td>
        <td>{{ $transaction->total_amount }}</td>
        <td>
            @if($transaction->status)
                پرداخت شده
            @else
                <form action="http://ppg.icsdev.ir/" method="post">
                    @csrf
                    <input hidden name="ver_code" class="payment_ver_code"
                           value="{{ unserialize(session()->get('authByOpenID'))["ver_code"] }}">
                    <input hidden name="serial" class="payment_serial"  id="serial-input" value="{{ $transaction->serial }}">
                    <input hidden name="order_id" id="order-id-input" class="payment_order_id"
                           value="{{ $transaction->id }}">
                    <input hidden name="postback_url" id="postback-url-input"
                           value="https://mrudhamedancoms.icsdev.ir/payment/verify/[amount]/[order_id]">
                    <button type="submit" class="btn btn-primary">پرداخت</button>
                </form>
            @endif
        </td>
        <td>{{ $transaction->customer_name }}</td>
        <td>{{ $transaction->customer_national_code }}</td>
        <td>{{ $transaction->customer_mobile_number }}</td>
        <td></td>
    </tr>
@endforeach
