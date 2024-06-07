<!DOCTYPE html>
<html>
<head>
    <title>Payment Successful</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="modal fade" id="paymentSuccessModal" tabindex="-1" aria-labelledby="paymentSuccessModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentSuccessModalLabel">Payment Successful</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Thank you for your payment. The fee for {{ $fee->student->name }} has been updated.</p>
                        <p>Payment Status: {{ $fee->status}}</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{route('payment-details', $fee->student_id)}}" class="btn btn-primary">Close</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Automatically show the modal on page load
        var myModal = new bootstrap.Modal(document.getElementById('paymentSuccessModal'));
        myModal.show();
    </script>
</body>
</html>