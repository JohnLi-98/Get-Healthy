<?php
ini_set("session.save_path", "/home/vol10_2/epizy.com/epiz_26587846/htdocs/sessionData");
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Stylesheets files (Latest compiled and minified Bootstrap 4 CSS, Google Fonts CSS, Index CSS) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/main.css">

    <title>Terms and Privacy Policy | Get Healthy</title>
</head>

<body>
    <?php
    // If else statement to select the correct navbar depending on whether a session variable exists for 'logged-in'
    if (isset($_SESSION['logged-in']) == true) {
        include "common/nav-auth.php";
    } else {
        include "common/nav-unauth.html";
    }
    ?>

    <!-- Jumbotron that fills the height of the screen -->
    <div class="jumbotron jumbotron-fluid p-0" id="legal-jumbotron">
        <div class="row align-items-center h-100 mx-5">
            <div class="col">
                <span><a href="index.php">Home</a>
                    <span class="px-2">
                        &#8594;
                    </span>
                    Legal
                </span>
                <h1 class="pt-3"><strong>Legal Information</strong></h1>
                <p class="text-left">View the site's terms and conditions, privacy policy and cookies.</p>
            </div>
        </div>
    </div>

    <div class="container-fluid page-content">
        <div class="row py-lg-4">
            <div class="col-12 text-left">
                <h2 class="font-weight-bold">Terms and Conditions</h2>

                <p>
                    Please read through our terms and conditions carefully before using the Get Healthy website at
                    www.gethealthy.infinityfreeapp.com. By accessing our website, you are agreeing to the terms set
                    out below.
                </p>

                <h5 class="pt-2"><u>Disclaimer</u></h5>

                <p>
                    <b>
                        FIRST AND FOREMOST, THIS WEBSITE IS IN NO WAY A REPRESENTATION OF A BUSINESS OR ENTERPRISE. IT IS,
                        INSTEAD, AN INDIVIDUAL PROJECT CREATED BY AN ASPIRING DEVELOPER FOR CREATIVITY PURPOSES AND WILL
                        BE ADDED TO A PORTFOLIO, TO SHOW THEIR DEVELOPMENT SKILLS. TO REITERATE, THIS IS A MOCKUP OF THE
                        AUTHOR'S IDEA OF A FITNESS WEBSITE AND SHOULD NOT BE TAKEN SERIOUSLY.
                    </b>
                </p>

                <h5 class="pt-2"><u>Terms of Use</u></h5>

                <p>
                    Please note that by continuing to browse and use this website, you are agreeing to comply with
                    and uphold the following terms and conditions of use. These terms, alongside our privacy policy
                    help to maintain and protect our relationship with the user. Please discontinue use of this website,
                    if you do not agree with any part of these terms and conditions.
                </p>

                <p>
                    The information found on this website is provided for general information purposes only and should
                    not be taken as advice. While we endevour to provide up to date and correct information, we can
                    not guarantee the completeness, accuracy, reliability or suitability of it. Therefore, Get Healthy
                    will not be liable for any action taken in reliance to the information posted on this website and
                    should be taken strictly at your own risk.
                </p>

                <p>
                    Links to other websites do not signify or imply any endorsements, but is provided for the user's
                    convenience and further reading, if they wish. We have no responsibility or liability for the
                    content, advertised material or inaccuracy of these linked websites.
                </p>

                <h5 class="pt-2"><u>Copyright</u></h5>

                <p>
                    The author of this website has, to the best of their ability, used content that is copyright-free
                    to avoid any violations of copyright, trademark and other laws. However, it would be in the user's
                    best interest to assume that all content is copyrighted and that they should not reproduce, modify,
                    store or archive any content for public or commercial purposes without permission from the rightful
                    owner.
                </p>

                <h2 class="font-weight-bold pt-4">Privacy Policy</h2>

                <p class="pt-2">
                    <b>
                        PLEASE NOTE: THIS WEBSITE IS NOT FOR COMMERCIAL USE AND SECURITY OF INFORMATION CAN NOT BE
                        GUARANTEED. ALTHOUGH PASSWORDS ARE ENCRYPTED ON THE DATABASE AND NOT DISPLAYABLE TO THE AUTHOR
                        OR ANYONE THAT ACCESSES THE DATABASE, PASSWORDS CREATED ON THIS WEBSITE SHOULD NOT BE THE SAME
                        AS ONE'S THAT ARE USED FOR OTHER WEBSITES, FOR THE USER'S SAFETY.
                    </b>
                </p>

                <p>
                    The following section details our policies regarding the collection, use and disclosure of personal
                    information when using our website. Under no circumstance will we ever use, sell or disseminate
                    any gathered information with any other entity. Your personal information is used to provide and
                    improve its user experience.
                </p>

                <h5 class="pt-2"><u>Data Protection</u></h5>

                <p>
                    When processing personal data, Get Healthy complies with data protection principles, where we make
                    sure to process data fairly, lawfully and clearly to those concerned. Data is collected for explicit
                    and legitimate purposes, for which only relevant and necessary is processed and stored. We make sure
                    data is accurate, and where necessary, kept updated and any inaccurate data is erased or rectified.
                    Finally, it is of utmost importance to keep personal data secure and protected from unauthorised or
                    unlawful processing, destruction or damage.
                </p>

                <h5 class="pt-2"><u>Information Collection</u></h5>

                <p>
                    While using our website, Get Healthy may ask you to provide us with personal information such as
                    an email address for communication and identification. While registering an account with us, you
                    will need to create a username and password that will be stored in our database. It will be your
                    responsibility to remember these, as we will never disclose this information (although you can
                    request a new password - via email).
                </p>

                <p>
                    We will not keep personal data any longer than necessary and is always kept secure as possible
                    from unauthorised use. We never share your data with any third parties and data can be deleted
                    from our systems, upon request and authentication.
                </p>

                <h2 class="font-weight-bold pt-4">Cookie Policy</h2>

                <p>
                    This website uses cookies and by using our website, you agree and consent to our use of cookies
                    in accordance with the terms of the policy set out below.
                </p>

                <h5 class="pt-2"><u>About Cookies</u></h5>

                <p>
                    Cookies are small text files that are stored on a user's computer, which are designed to hold a
                    small amount of data specific to a particular user and website. Cookies are sent from a website
                    and stored on your computer's hard drive. They allow a server to deliver a page tailored to a
                    particular user's needs, likes and dislikes by collecting and remembering information about their
                    preferences.
                </p>

                <p>
                    There are two main kinds of cookies that are used for websites: session and persistant cookies.
                    Session cookies only last for the time which users are using the website and are deleted from your
                    computer, once the browser is closed. On the other hand, persistent cookies remain on your computer,
                    even when the website is not in use or the browser is closed. These types of cookies can be deleted
                    from your computer or will do automatically, if the cookie reaches it's expiry date.
                </p>

                <h5 class="pt-2"><u>Get Healthy Cookies</u></h5>

                <p>
                    We use cookies on this website to help identify which pages are being used and to improve the
                    usability of the website. This helps us analyse data on how people are using our website and which
                    pages are useful and which aren't. We never use cookies for any marketing purposes. Cookies don't
                    contain any information that would personally identify you. They also do not or would ever gain
                    access to your computer or any information about you.
                </p>
            </div>
        </div>
    </div>

    <?php
    include "common/footer.html";
    ?>

    <!-- Script files(jQuery library, Popper JS, Latest Compiled Bootstrap JS, FontAwesome JS)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/6cc49d804e.js" crossorigin="anonymous"></script>
    <script type="module" src="scripts/main.js"></script>
</body>

</html>