<!-- resources/views/emails/order-confirmation.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Order Confirmation</title>
</head>

<body>
    <h2>Order Confirmation</h2>
    <p>Dear {{ $order->user->name }},</p>

    <p>Your order has been confirmed. Here are the order details:</p>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->product->price }}</td>
            </tr>
        </tbody>
    </table>

    <p>Total Amount: ${{ $order->quantity * $order->product->price }}</p>

    <p>Thank you for your order. If you have any questions, please feel free to contact us.</p>

    <p>Best regards,</p>
    <p>Your Health Product Order Team</p>
</body>

</html>
