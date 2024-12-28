<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer with Map</title>
    <!-- Internal CSS -->
    <style>
        .content {
            flex: 1;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer {
            background-color: #ffffffef;
            color: #000000;
            padding: 40px 0 0;
            font-family: Arial, sans-serif;
        }

        .footer-border {
            border-top: 1px solid #c5c5c5;
            margin-bottom: 40px;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer-left {
            flex: 1;
            max-width: 30%;
            margin-right: 20px;
        }

        .footer-left h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .footer-left p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .footer-middle {
            display: flex;
            flex: 2;
            justify-content: space-around;
        }

        .footer-section h4 {
            font-size: 16px;
            margin-bottom: 10px;
            color: #000000;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 8px;
        }

        .footer-section ul li a {
            text-decoration: none;
            color: #000000;
            font-size: 14px;
        }

        .footer-right {
            flex: 1;
            max-width: 30%;
        }

        .footer-contact p {
            margin: 8px 0;
            font-size: 14px;
            color: #000000;
        }

        .social-media a {
            margin-right: 10px;
            font-size: 20px;
            color: #000000;
            text-decoration: none;
        }

        .social-media a:hover {
            color: #777777;
        }

        .footer-bottom {
            text-align: center;
            padding: 20px 0;
            width: 100%;
        }

        .footer-bottom p {
            margin: 0;
            font-size: 14px;
            color: #000000;
        }

        .footer-map {
            margin-top: 20px;
        }

        .map-container {
            height: 200px;
            max-width: 800px;
            margin: 20px auto 0;
            border: 1px solid #c5c5c5;
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        iframe {
            border: 0;
            width: 100%;
            height: 100%;
        }
        </style>
</head>
<body>

    <div class="content">
        <!-- Your main content goes here -->
    </div>

    <footer class="footer">
        <div class="container-fluid">
            <div class="footer-border"></div>
            <div class="footer-container">
                <div class="footer-left">
                    <h2>Influenca</h2>
                    <p>Influence Marketing Agency</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus.</p>
                    <p><i class="fa fa-map-marker"></i> London Eye, London UK</p>
                </div>

                <div class="footer-middle">
                    <div class="footer-section">
                        <h4>Navigation</h4>
                        <ul>
                            <li><a href="/index">Home</a></li>
                            <li><a href="{{ route('sepatu.kategori', ['kategori' => 'pria']) }}">Men</a></li>
                            <li><a href="{{ route('sepatu.kategori', ['kategori' => 'wanita']) }}">Women</a></li>
                            <li><a href="/aboutus">About us</a></li>
                        </ul>
                    </div>

                    <div class="footer-section">
                        <h4>Quick Link</h4>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Booking</a></li>
                            <li><a href="#">Pages</a></li>
                        </ul>
                    </div>
                </div>

                <div class="footer-right">
                    <div class="footer-section">
                        <h4>Services</h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">404</a></li>
                        </ul>
                    </div>

                    <div class="footer-contact">
                        <p><i class="fa fa-phone"></i> (+62) 822 8514 1312</p>
                        <p><i class="fa fa-envelope"></i> mail@exmaple.id</p>
                        <div class="social-media">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-map">
                <h4 class="text-center">Find Us on Map</h4>
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.5316317111755!2d101.444212!3d1.661813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMcKwMzknNDIuNSJOIDEwMcKwMjYnMzkuMiJF!5e0!3m2!1sen!2sid!4v1702734698204!5m2!1sen!2sid"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>


            <div class="footer-bottom">
                <p>&copy; 2024 Influenca Template - All Rights Reserved</p>
            </div>
        </div>
    </footer>

</body>
</html>
