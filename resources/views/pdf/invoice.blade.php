<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $order->order_number }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        }
        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
        }
        .company-info {
            flex: 1;
        }
        .invoice-info {
            flex: 1;
            text-align: right;
        }
        .company-info h1 {
            margin: 0;
            color: #333;
            font-size: 24px;
        }
        .invoice-info h2 {
            margin: 0;
            color: #333;
            font-size: 20px;
        }
        .addresses {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .billing-address, .shipping-address {
            flex: 1;
        }
        .shipping-address {
            margin-left: 50px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        table th {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }
        table td {
            border: 1px solid #dee2e6;
            padding: 10px;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .totals {
            width: 300px;
            margin-left: auto;
        }
        .totals table {
            margin-bottom: 0;
        }
        .status-badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-processing { background-color: #6c757d; color: white; }
        .status-completed { background-color: #198754; color: white; }
        .status-cancelled { background-color: #dc3545; color: white; }
        .status-pending { background-color: #ffc107; color: black; }
        .footer {
            margin-top: 50px;
            text-align: center;
            color: #666;
            font-size: 10px;
        }
        h3 {
            margin: 0 0 10px 0;
            font-size: 14px;
            color: #333;
        }
        p {
            margin: 0 0 5px 0;
        }
        strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <!-- Header -->
        <div class="header">
            <div class="company-info">
                <h1>Pro Printer Shop</h1>
                <p>Email: info@proprintershop.us</p>
            </div>
            <div class="invoice-info">
                <h2>INVOICE</h2>
                <p><strong>Invoice #:</strong> {{ $order->order_number }}</p>
                <p><strong>Date:</strong> {{ $order->created_at->format('F d, Y') }}</p>
                <p><strong>Status:</strong> 
                    <span class="status-badge status-{{ $order->status }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </p>
            </div>
        </div>

        <!-- Addresses -->
        <div class="addresses">
            <div class="billing-address">
                <h3>Bill To:</h3>
                <p>
                    <strong>{{ $order->billing_first_name }} {{ $order->billing_last_name }}</strong><br>
                    @if($order->billing_company_name)
                        {{ $order->billing_company_name }}<br>
                    @endif
                    {{ $order->billing_street_address }}<br>
                    @if($order->billing_apartment)
                        {{ $order->billing_apartment }}<br>
                    @endif
                    {{ $order->billing_city }}, {{ $order->billing_state }} {{ $order->billing_zip_code }}<br>
                    {{ $order->billing_country }}<br>
                    <strong>Phone:</strong> {{ $order->billing_phone }}<br>
                    <strong>Email:</strong> {{ $order->billing_email }}
                </p>
            </div>

            @if($order->shipping_first_name !== $order->billing_first_name || $order->shipping_street_address !== $order->billing_street_address)
            <div class="shipping-address">
                <h3>Ship To:</h3>
                <p>
                    <strong>{{ $order->shipping_first_name }} {{ $order->shipping_last_name }}</strong><br>
                    @if($order->shipping_company_name)
                        {{ $order->shipping_company_name }}<br>
                    @endif
                    {{ $order->shipping_street_address }}<br>
                    @if($order->shipping_apartment)
                        {{ $order->shipping_apartment }}<br>
                    @endif
                    {{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_zip_code }}<br>
                    {{ $order->shipping_country }}<br>
                    <strong>Phone:</strong> {{ $order->shipping_phone }}<br>
                    <strong>Email:</strong> {{ $order->shipping_email }}
                </p>
            </div>
            @endif
        </div>

        <!-- Order Items -->
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                <tr>
                    <td>
                        <strong>
                            @if($item->product)
                                {{ $item->product->title }}
                            @else
                                {{ $item->product_name }}
                            @endif
                        </strong>
                    </td>
                    <td>${{ number_format($item->product_price, 2) }}</td>
                    <td class="text-center">{{ $item->quantity }}</td>
                    <td class="text-right">${{ number_format($item->total_price, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Totals -->
        <div class="totals">
            <table>
                <tr>
                    <td><strong>Subtotal:</strong></td>
                    <td class="text-right">${{ number_format($order->subtotal, 2) }}</td>
                </tr>
                
                @if($order->discount_amount > 0)
                <tr>
                    <td><strong>Discount:</strong></td>
                    <td class="text-right">-${{ number_format($order->discount_amount, 2) }}</td>
                </tr>
                @endif
                
                <tr>
                    <td><strong>Shipping:</strong></td>
                    <td class="text-right">
                        @if($order->total_amount - $order->subtotal + $order->discount_amount > 0)
                            ${{ number_format($order->total_amount - $order->subtotal + $order->discount_amount, 2) }}
                        @else
                            Free
                        @endif
                    </td>
                </tr>
                
                <tr>
                    <td><strong>Total:</strong></td>
                    <td class="text-right"><strong>${{ number_format($order->total_amount, 2) }}</strong></td>
                </tr>
                
                <tr>
                    <td><strong>Payment Method:</strong></td>
                    <td class="text-right">{{ ucfirst($order->payment_method) }}</td>
                </tr>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Thank you for your business!</p>
            <p>If you have any questions about this invoice, please contact us.</p>
            <p>Invoice generated on: {{ now()->format('F d, Y \a\t h:i A') }}</p>
        </div>
    </div>
</body>
</html>