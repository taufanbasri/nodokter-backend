<!-- resources/views/emails/order-cancellation.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Order Cancellation</title>
</head>

<body>
    <h2>Order Cancellation</h2>
    <p>Dear {{ $order->user->name }},</p>

    <p>We regret to inform you that your order has been cancelled.</p>

    <p>Order Details:</p>
    <ul>
        <li>Order ID: {{ $order->id }}</li>
        <li>Product: {{ $order->product->name }}</li>
        <li>Quantity: {{ $order->quantity }}</li>
        <li>Total Amount: ${{ $order->quantity * $order->product->price }}</li>
    </ul>

    <p>If you have any questions or concerns, please feel free to contact us.</p>

    <p>Best regards,</p>
    <p>Your Health Product Order Team</p>
</body>

</html>
