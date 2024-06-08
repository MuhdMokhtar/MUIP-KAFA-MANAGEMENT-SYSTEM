<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <title>Document</title>
</head>
<body>
    <div class="payment-details">
        <h3>Payment Details</h3>
    
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Fee ID:</label>
                    <input type="text" class="form-control" value="{{ $fee->id }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Student Name:</label>
                    <input type="text" class="form-control" value="{{ $fee->student->name }}" readonly>
                </div>
            </div>
    
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Tuition Fee:</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control" value="{{ number_format($fee->tuition_fee, 2) }}" readonly>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Activity Fee:</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control" value="{{ number_format($fee->activity_fee, 2) }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Total Paid:</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control" value="{{ number_format($fee->tuition_fee + $fee->activity_fee, 2) }}" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Payment Date:</label>
                    <input type="text" class="form-control" value="{{ $fee->payment_date }}" readonly>
                </div>
            </div>
        </div>
    
        <div class="mb-3">
            <label class="form-label">Payment Method:</label>
            <input type="text" class="form-control" value="{{ $fee->payment_method }}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Transaction ID:</label>
            <input type="text" class="form-control" value="{{ $fee->transaction_id }}" readonly>
        </div>
    </div>
    
</body>
</html>


