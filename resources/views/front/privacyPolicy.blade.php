<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lux Cozi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
</head>

<body>
    <header>
        <div class="container">
            <div class="header_sec">
                <a href="#" class="logo_img">
                    <img src="{{asset('frontend/images/logo1.png')}}" alt="logo">
                </a>

                <form action="" class="search_from">
                    <input type="search" class="search_input" placeholder="Search for products">
                    <button type="submit" class="search_btn">GO</button>
                </form>
                <div class="wishlist">
                    <div class="search_for_mob">
                        <a href="#url" class="search_for_mob_a" data-bs-toggle="modal"
                            data-bs-target="#examplesearchModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="#655D5D" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                            <!--search Modal -->
                            <div class="modal fade" id="examplesearchModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header search_m_h">
                                            <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="">
                                                <input type="search" class="mobile_search"
                                                    placeholder="Search for products">
                                                <input type="submit" class="mobile_search_btn" value="Search">
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    <div class="header_heart header_user_menu">
                        <a href="#"><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M26.0501 5.76258C25.4117 5.12384 24.6537 4.61714 23.8193 4.27144C22.985 3.92574 22.0908 3.7478 21.1876 3.7478C20.2845 3.7478 19.3903 3.92574 18.556 4.27144C17.7216 4.61714 16.9636 5.12384 16.3251 5.76258L15.0001 7.08758L13.6751 5.76258C12.3855 4.47297 10.6364 3.74847 8.81265 3.74847C6.98886 3.74847 5.23976 4.47297 3.95015 5.76258C2.66053 7.0522 1.93604 8.80129 1.93604 10.6251C1.93604 12.4489 2.66053 14.198 3.95015 15.4876L5.27515 16.8126L15.0001 26.5376L24.7251 16.8126L26.0501 15.4876C26.6889 14.8491 27.1956 14.0911 27.5413 13.2568C27.887 12.4225 28.0649 11.5282 28.0649 10.6251C28.0649 9.72198 27.887 8.82771 27.5413 7.99339C27.1956 7.15907 26.6889 6.40103 26.0501 5.76258Z"
                                    stroke="#655D5D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <span class="wish_list_count">5</span>
                    </div>
                    <div class="header_user header_user_menu">
                        <a href="#"><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M25 26.25V23.75C25 22.4239 24.4732 21.1521 23.5355 20.2145C22.5979 19.2768 21.3261 18.75 20 18.75H10C8.67392 18.75 7.40215 19.2768 6.46447 20.2145C5.52678 21.1521 5 22.4239 5 23.75V26.25"
                                    stroke="#655D5D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M15 13.75C17.7614 13.75 20 11.5114 20 8.75C20 5.98858 17.7614 3.75 15 3.75C12.2386 3.75 10 5.98858 10 8.75C10 11.5114 12.2386 13.75 15 13.75Z"
                                    stroke="#655D5D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                    </div>
                    <div class="header_bag header_user_menu">
                        <a href="#"><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.5 2.5L3.75 7.5V25C3.75 25.663 4.01339 26.2989 4.48223 26.7678C4.95107 27.2366 5.58696 27.5 6.25 27.5H23.75C24.413 27.5 25.0489 27.2366 25.5178 26.7678C25.9866 26.2989 26.25 25.663 26.25 25V7.5L22.5 2.5H7.5Z"
                                    stroke="#655D5D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3.75 7.5H26.25" stroke="#655D5D" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M20 12.5C20 13.8261 19.4732 15.0979 18.5355 16.0355C17.5979 16.9732 16.3261 17.5 15 17.5C13.6739 17.5 12.4021 16.9732 11.4645 16.0355C10.5268 15.0979 10 13.8261 10 12.5"
                                    stroke="#655D5D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <span class="wish_list_count">10</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="privacy_policy">
        <div class="container">
            <div class="privacy_policy_content">
                <div class="privacy_policy_text">
                    <h4>
                        Privacy Policy:
                    </h4>
                    <p class="privacy_policy_text_p">This Privacy Policy describes how [Your Company Name] ("we", "us", or "our") collects,
                        uses, and shares information when you use our website [YourWebsite.com] and any related services
                        (collectively, the "Services"). By accessing or using our Services, you agree to the terms of
                        this Privacy Policy.</p>
                </div>
                <div class="privacy_policy_menu">
                    <ol class="privacy_policy_ol">
                        <li class="privacy_policy_ol_li">
                            <h5>Information We Collect</h5>
                            <ol class="privacy_policy_ol_sub">
                                <li>
                                    <h6>Information You Provide</h6>
                                    <ul class="privacy_policy_ul_sub">
                                        <li><span>Account Information:</span> When you register for an account, we
                                            collect information such as your name, email address, and password.</li>
                                        <li><span>Payment Information:</span>If you make a purchase, we collect payment
                                            information such as your credit card number, billing address, and other
                                            payment details.</li>
                                        <li><span>Communication:</span>When you contact us or communicate with us
                                            through our Services, we collect any information you provide, such as your
                                            name, email address, and message content.</li>
                                    </ul>
                                </li>
                                <li>
                                    <h6>Information We Collect Automatically</h6>
                                    <ul class="privacy_policy_ul_sub">
                                        <li><span>Usage Information:</span> We collect information about your use of the Services, including your IP address, browser type, device type, pages visited, and actions taken.</li>
                                        <li><span>Cookies:</span>We use cookies and similar tracking technologies to collect information about your browsing behavior and preferences.</li>
                                    </ul>
                                </li>
                            </ol>
                        </li>
                        <li class="privacy_policy_ol_li">
                            <h5>How We Use Your Information</h5>
                            <p>We may use the information we collect for the following purposes:</p>
                            <ul class="privacy_policy_ol_li_sub">
                                <li>To provide and improve our Services.</li>
                                <li>To process transactions and fulfill orders.</li>
                                <li>To communicate with you, including responding to your inquiries and providing
                                    customer support.</li>
                                <li>To personalize your experience and tailor content and advertisements to your
                                    interests.</li>
                                <li>To detect, prevent, and address technical issues and security vulnerabilities.</li>
                                <li>To comply with legal obligations and enforce our policies.</li>
                            </ul>
                        </li>
                        <li class="privacy_policy_ol_li">
                            <h5>How We Share Your Information</h5>
                            <p>We may share your information with third parties for the following purposes:</p>
                            <ul class="privacy_policy_ol_li_sub">
                                <li>With service providers who assist us in operating our business and providing our Services.</li>
                                <li>With third-party payment processors to process transactions.</li>
                                <li>With third-party analytics providers to analyze usage patterns and trends.</li>
                                <li>With law enforcement or regulatory authorities if required by law or to protect our rights or the rights of others.</li>
                            </ul>
                        </li>
                        <li class="privacy_policy_ol_li">
                            <h5>Your Choices</h5>
                            <ul class="privacy_policy_ul_sub">
                                <li><span>Account Information:</span>You may update or delete your account information by logging into your account settings or contacting us directly.</li>
                                <li><span>Cookies:</span>Most web browsers allow you to control cookies through their settings preferences. However, disabling cookies may limit your ability to use certain features of the Services.</li>
                            </ul>
                        </li>
                        <li class="privacy_policy_ol_li">
                            <h5>Data Security</h5>
                           <p>We implement reasonable security measures to protect your information from unauthorized access, alteration, disclosure, or destruction.</p>
                        </li>
                        <li class="privacy_policy_ol_li">
                            <h5>Children's Privacy</h5>
                           <p>Our Services are not directed to children under the age of 13, and we do not knowingly collect personal information from children under the age of 13. If you are a parent or guardian and believe that your child has provided us with personal information, please contact us.</p>
                        </li>
                        <li class="privacy_policy_ol_li">
                            <h5>Changes to This Privacy Policy</h5>
                           <p>We may update this Privacy Policy from time to time by posting the revised version on our website. Your continued use of the Services after any changes constitutes your acceptance of the updated Privacy Policy.</p>
                        </li>
                        <li class="privacy_policy_ol_li">
                            <h5>Contact Us</h5>
                           <p>If you have any questions or concerns about this Privacy Policy, please contact us at [Your Contact Information].</p>
                        </li>
                    </ol>
                </div>

            </div>
    </section>
    <footer class="top_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="footer_text">
                        <h4>About LUX Industries</h4>
                        <p>
                            Founded in 1957 by Mr. Giridhari Lal Todi as Biswanath Hosiery Mills, Lux Industries Ltd.
                            came into being in 1995 and a new era began when Mr Girdharilal Todi ji's sons took over the
                            rein of the company. Lux eventually became the most preferred innerwear brand in the country
                            for everyone.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer_text">
                        <h4>Useful Links</h4>
                        <ul class="footer_text_menu">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Term & Conditions</a></li>
                            <li><a href="#">Customer Care</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <footer class="footer_bottom">
        <div class="container">
            <p>&copy;2024Lux Industries Ltd. All Rights Reserved.</p>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/js/custom.js')}}"></script>
</body>

</html>