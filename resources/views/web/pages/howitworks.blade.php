@extends('web.layouts.default')
@section('title', 'deliveryReturns')
@section('content')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>how it work</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/assets/web/css/style.css') }}">
    <style>
       
        .container {
            margin-top: 50px;
        }

    </style>
</head>

<body>
    <div class="container col-12 justify-content-center">
        
        <h5>How It Works</h5>
        <p>You no longer have to wait for GP appointments. Our services are fast, simple, and easy to use. Receive genuine medication delivered conveniently and discreetly packaged to your door. Here at My Weight Loss Centre.</p>
        <!-- <img src="{{ asset('/assets/web/images/tsp/recent-articles/1.png') }}" alt="post image" loading="lazy"> -->
        <h5>1. Start a FREE* 60 Seconds online consultation</h5>
        <p>Our streamlined process focuses on the most crucial aspects of your weight management journey, ensuring a rapid yet comprehensive overview of your situation. By asking targeted questions about your current health, lifestyle, and weight loss aspirations, we swiftly assess key factors to kickstart your journey towards a healthier you.</p>
        <h5>Fast and Simple.</h5>
        <p>Our online FREE* consultation only takes a few quick seconds, fast, simple & easy to complete. Our short few questions are similar to those that would be asked at your GP or Weight Loss specialist appointment.</p>

        <h5>Select Your Treatment</h5>
        <p>All of our experienced UK Independent prescribers are registered with the General Pharmaceuticals Council (GPhC). They will review your consultation immediately. Once approved, Weight Loss Centre medical team will then recommend a treatment and issue a FREE* prescription.</p>

        <h5>Genuine Treatments</h5>
        <p>We only stock 100% regulated and approved medications.</p>

        <h5>Top Leading Brands</h5>
        <p>We have a huge selection of top well-known brands.</p>

        <h5>FREE* Prescription</h5>
        <p>All our services from consultation to prescription are FREE* (please read our terms and conditions).</p>

        <h5>Receive Your Delivery</h5>
        <p>All orders before 3pm are dispatched the very same day in discreet packaging, keeping you notified every step of the way until your order is received.</p>

        <h5>Flexible Express Delivery</h5>
        <p>We have multiple delivery options which you can choose from on checkout, from FREE delivery* to express next day delivery*.</p>

        <h5>Discreet Packaging</h5>
        <p>Each and every order we dispatch is packaged discreetly for your peace of mind and is delivered to your chosen destination.</p>

        <h5>REVIEWS.io Approved (Top Rated)</h5>
        <p>Once you have received your medications and are happy with it, we would love to hear from you. Every review is seen by our Weight Loss Centre team and the World Wide Web. We can't wait to hear from you!</p>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce