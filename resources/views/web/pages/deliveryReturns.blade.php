@extends('web.layouts.default')
@section('title', 'deliveryReturns')
@section('content')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delivery & Returns</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/assets/web/css/style.css') }}">
    <style>
        

        h2,
        h3 {
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 15px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- <div class="row">
            <div class="col">
                <h2 class="text-center mt-5 mb-5">Delivery & Returns</h2>
            </div>
        </div> -->
        <div class="row">
            <div class="col">
                <h3>My Weight Loss Centre Delivery, Returns & Refunds Policy</h3>
                <p>Free UK & RoI Next Day Temperature Controlled Delivery On All Orders.</p>
                <p>Temperature Controlled packaging used for all fridge stored medicines i.e. My Weighloss Centre weekly injection for weight loss. Shipped and delivered within 24/48 hours of Specialist approval.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>European Delivery & Worldwide Delivery</h3>
                <p>Unfortunately, we cannot ship medical products outside the UK due to legal restrictions and good practice. This restriction applies across the site currently as we take advice from our regulators regarding the license in the destination country.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>How can I track my order?</h3>
                <p>You can check the status of your order by logging in to your account, which you’ll set up before you make your purchase. Once logged in to your account, you can click ‘View my Orders’ where you can track your order.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Returns and refunds</h3>
                <p>At My Weight Loss Centre, we prioritise customer satisfaction and aim to provide the highest quality products and services. We would like to clarify that, under normal circumstances, returns are generally not accepted unless there has been a dispensing error or if the pen is found to be faulty upon receipt.</p>
                <p>We do not accept returns on items that are not faulty or if the customer has simply changed their mind. In such instances, we kindly inform the customer that we are unable to process the return.</p>
                <p>Instead, we will promptly return the item back to the customer. We strive to maintain a fair and consistent approach in all our customer interactions. If you have any further questions or require additional assistance, please feel free to contact us.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Returns for other reasons</h3>
                <p>Other than for reasons of damaged or faulty goods or a decline by our specialists, refunds on medicines are not permitted as medicines have been dispensed for your use only.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Cancelling your order</h3>
                <p>Orders can be cancelled in your ‘My Account’ area up until the point at which our specialists issue the prescription. Go to your ‘My Account’ area, click on the order and then click cancel. Please note: specialists sometimes issue prescriptions within minutes or hours of an order being placed. If a specialist has already approved your prescription, please contact My Weight Loss Centre administration via the messaging system in your ‘My Account’ area, or by using the Contact Us page (please include your name or the order ID number to help us to identify the order you wish to cancel).</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Orders declined by Specialist</h3>
                <p>If our specialists decline requests, notification emails are sent, and your payment will be refunded. Refunds take up to 5 days to show in bank accounts. Debits and refunds show as  Online-Pharmacy4u on your bank statement. An explanation will be posted to your ‘My Account’ area where messages can be exchanged with our specialist team. It is unusual for specialists to decline prescriptions once orders have been made unless you would be more suited to seeing a healthcare professional face to face. Consultations are structured to provide all the necessary information to allow prescriptions to be issued.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Returns</h3>
                <p>Unfortunately we cannot accept medicines back from customers, unless they have been provided in error. If you have side-effects with your medicine and do not wish to use them any further please dispose of them at your local Pharmacy and report your side-effects to the MHRA using the below link: <a href="https://yellowcard.mhra.gov.uk/">https://yellowcard.mhra.gov.uk/</a></p>
            </div>
        </div>
        <p>Damaged or faulty goods</p>
        <p>If you receive any damaged or faulty goods, please inform My Weight Loss Centre administration by using the <em>Contact Us</em> page.</p>
        <p>Please include the nature of the fault, order number, and your postage costs.</p>
        <p>In the case of injectable medications (e.g. Saxenda), we will need to forward you to their manufacturer, Novo Nordisk, so they can resolve the issue directly.</p>
        <p>If our customer services team have asked you to return the goods in question to us, please ensure returned items are packaged safely to avoid further damage and include all the original packaging.</p>
        <p>We recommend returned items are sent registered post.</p>
        <p>Our liability exemption concerning the delivery of your prescribed medication.</p>
        <p>Please take a moment to read the following points carefully, as they outline the reasons why we cannot be held responsible for any issues that may arise during the delivery process:</p>
        <ul>
            <li>Prescribed Medication: As a prescribed medication, the delivery and handling of your order are subject to strict regulations and guidelines. We comply with all necessary protocols to ensure the safe delivery of your medication.</li>
            <li>Incorrect Information Provided on Consultation: It is the customer’s responsibility to provide accurate and up-to-date information during the consultation process. Any incorrect or incomplete details may lead to delivery delays or misplacements.</li>
            <li>Incorrect Address: We rely on the address information provided by the customer. If the address provided is incorrect or incomplete, we cannot be held liable for any delivery issues that may result.</li>
            <li>Missed Delivery: While we strive to deliver your medication within the designated timeframe, certain factors like unexpected circumstances or unforeseen events may cause a missed delivery.</li>
            <li>Failure to Collect from Postal Office: If a delivery attempt is unsuccessful and the package is held at the postal office for collection, it is the customer’s responsibility to retrieve the package within the stipulated timeframe.</li>
            <li>Customers Must Be Home for Delivery: Depending on the shipping option chosen, customers may be required to be present at the provided address during the delivery attempt.</li>
            <li>Royal Mail Safeplace or Neighbor Delivery: Royal Mail may, at their discretion, leave the package in a safe place or deliver it to a neighbor if the recipient is not available at the delivery address.</li>
            <li>Safeplace Security and Royal Mail’s Discretion: The safety and suitability of a safe place for package delivery are determined solely by Royal Mail, and we cannot be held liable for any issues arising from this practice.</li>
            <li>Royal Mail Investigation: In the rare event of any issues with the delivery of your prescribed medication, we are committed to resolving the matter promptly. If you encounter any problems with the delivery or suspect a delivery issue, you must notify us within 10 days from the date of the dispatch email. We will initiate a Royal Mail investigation on your behalf to track the package and determine the cause of the delay or any potential issues. It is crucial to adhere to this 10-day window, as Royal Mail’s investigation process is time-sensitive, and they require prompt notification to conduct a thorough examination.</li>
        </ul>
        <p>In the event that the prescribed medication pen is not refrigerated within 48 hours of delivery, please be informed that the medication must be used within 28 days from the time it was dispatched. After this period, the medication’s potency and safety cannot be guaranteed, and using the pen beyond this timeframe may pose health risks.</p>
        <p>Please return to the dispensing pharmacy, at the following address:</p>
        <h2>UK Deliveries</h2>
        <p>Online Pharmacy 4U (MWC)<br>
            Unit 2, Mansfield Station Gateway<br>
            Signal Way, off Debale Lane<br>
            Nottingham<br>
            NG19 9QH
        </p>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

</html>

@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce