<?php

    session_start();
    include 'config.php';
    error_reporting(0);

?>

<?php 
    if(isset($email)){
    require_once("topnavigationbar.html");
    }else{
        require_once('notloggedinnav.html');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms & Condition - Electron</title>

    <style>
    * {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
    }

    .tandc {
        margin-left: 100px;
        margin-right: 100px;
        font-size: larger;
    }

    </style>
</head>
<body> 
    <br><br><br>
    <div class="tandc">
        <center><h1><b>TERMS AND CONDITIONS</b></h1></center>
        <br><br>
        <p>1. <b>Introduction</b></p><br>
        <p>Welcome to <b>Electron</b> ("Company", "we", "our", "us")!</p><br>
        <p>These Terms of Service ("Terms", "Terms of Service") govern your use of our website located at <b>www.electron.com</b> (together or individually "Service") operated by <b>Electron</b>.</p><br>
        <p>Our Privacy Policy also governs your use of our Service and explains how we collect, safeguard and disclose information that results from your use of our web pages.</p><br>
        <p>Your agreement with us includes these Terms and our Privacy Policy ("Agreements"). You acknowledge that you have read and understood Agreements, and agree to be bound of them.</p><br>
        <p>If you do not agree with (or cannot comply with) Agreements, then you may not use the Service, but please let us know by emailing at <b>electron@gmail.com</b> so we can try to find a solution. These Terms apply to all visitors, users and others who wish to access or use Service.</p><br>
        <br><p>2. <b>Communications</b></p><br>
        <p>By using our Service, you agree to subscribe to newsletters, marketing or promotional materials and other information we may send. However, you may opt out of receiving any, or all, of these communications from us by following the unsubscribe link or by emailing at stayfresh@gmail.com.</p><br>
        <br><p>3. <b>Purchases</b></p><br>
        <p>If you wish to purchase any product or service made available through Service ("Purchase"), you may be asked to supply certain information relevant to your Purchase including but not limited to, your credit or debit card number, the expiration date of your card, your billing address, and your shipping information.</p><br>
        <p>You represent and warrant that: (i) you have the legal right to use any card(s) or other payment method(s) in connection with any Purchase; and that (ii) the information you supply to us is true, correct and complete.</p><br>
        <p>We may employ the use of third party services for the purpose of facilitating payment and the completion of Purchases. By submitting your information, you grant us the right to provide the information to these third parties subject to our Privacy Policy.</p><br>
        <p>We reserve the right to refuse or cancel your order at any time for reasons including but not limited to: product or service availability, errors in the description or price of the product or service, error in your order or other reasons.</p><br>
        <p>We reserve the right to refuse or cancel your order if fraud or an unauthorized or illegal transaction is suspected.</p><br>
        <br><p>4. <b>Contests, Sweepstakes and Promotions</b></p><br>
        <p>Any contests, sweepstakes or other promotions (collectively, "Promotions") made available through Service may be governed by rules that are separate from these Terms of Service. If you participate in any Promotions, please review the applicable rules as well as our Privacy Policy. If the rules for a Promotion conflict with these Terms of Service, Promotion rules will apply.</p><br>
        <br><p>5. <b>Refunds</b></p><br>
        <p>We issue refunds for Contracts within <b>14 days</b> of the original purchase of the Contract.</p><br>
        <br><p>6. <b>Content</b></p><br>
        <p>Content found on or through this Service are the property of StayFresh or used with permission. You may not distribute, modify, transmit, reuse, download, repost, copy, or use said Content, whether in whole or in part, for commercial purposes or for personal gain, without express advance written permission from us.</p><br>
        <br><p>7. <b>Prohibited Uses</b></p><br>
        <p>You may use Service only for lawful purposes and in accordance with Terms. You agree not to use Service:</p><br>
        <p>0.1. In any way that violates any applicable national or international law or regulation.</p><br>
        <p>0.2. For the purpose of exploiting, harming, or attempting to exploit or harm minors in any way by exposing them to inappropriate content or otherwise.</p><br>
        <p>0.3. To transmit, or procure the sending of, any advertising or promotional material, including any “junk mail”, “chain letter,” “spam,” or any other similar solicitation.</p><br>
        <p>0.4. To impersonate or attempt to impersonate Company, a Company employee, another user, or any other person or entity.</p><br>
        <p>0.5. In any way that infringes upon the rights of others, or in any way is illegal, threatening, fraudulent, or harmful, or in connection with any unlawful, illegal, fraudulent, or harmful purpose or activity.</p><br>
        <p>0.6. To engage in any other conduct that restricts or inhibits anyone’s use or enjoyment of Service, or which, as determined by us, may harm or offend Company or users of Service or expose them to liability.</p><br>
        <p>Additionally, you agree not to:</p><br>
        <p>0.1. Use Service in any manner that could disable, overburden, damage, or impair Service or interfere with any other party's use of Service, including their ability to engage in real time activities through Service.</p><br>
        <p>0.2. Use any robot, spider, or other automatic device, process, or means to access Service for any purpose, including monitoring or copying any of the material on Service.</p><br>
        <p>0.3. Use any manual process to monitor or copy any of the material on Service or for any other unauthorized purpose without our prior written consent.</p><br>
        <p>0.4. Use any device, software, or routine that interferes with the proper working of Service.</p><br>
        <p>0.5. Introduce any viruses, trojan horses, worms, logic bombs, or other material which is malicious or technologically harmful.</p><br>
        <p>0.6. Attempt to gain unauthorized access to, interfere with, damage, or disrupt any parts of Service, the server on which Service is stored, or any server, computer, or database connected to Service.</p><br>
        <p>0.7. Attack Service via a denial-of-service attack or a distributed denial-of-service attack.</p><br>
        <p>0.8. Take any action that may damage or falsify Company rating.</p><br>
        <p>0.9. Otherwise attempt to interfere with the proper working of Service.</p><br>
        <br><p>8. <b>Analytics</b></p><br>
        <p>We may use third-party Service Providers to monitor and analyze the use of our Service.</p><br>
        <br><p>9. <b>No Use By Minors</b></p><br>
        <p>Service is intended only for access and use by individuals at least eighteen (18) years old. By accessing or using Service, you warrant and represent that you are at least eighteen (18) years of age and with the full authority, right, and capacity to enter into this agreement and abide by all of the terms and conditions of Terms. If you are not at least eighteen (18) years old, you are prohibited from both the access and usage of Service.</p><br>
        <br><p>10. <b>Accounts</b></p><br>
        <p>When you create an account with us, you guarantee that you are above the age of 18, and that the information you provide us is accurate, complete, and current at all times. Inaccurate, incomplete, or obsolete information may result in the immediate termination of your account on Service.</p><br>
        <p>You are responsible for maintaining the confidentiality of your account and password, including but not limited to the restriction of access to your computer and/or account. You agree to accept responsibility for any and all activities or actions that occur under your account and/or password, whether your password is with our Service or a third-party service. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.</p><br>
        <p>You may not use as a username the name of another person or entity or that is not lawfully available for use, a name or trademark that is subject to any rights of another person or entity other than you, without appropriate authorization. You may not use as a username any name that is offensive, vulgar or obscene.</p><p>We reserve the right to refuse service, terminate accounts, remove or edit content, or cancel orders in our sole discretion.</p><br>
        <br><p>11. <b>Intellectual Property</b></p><br>
        <p>Service and its original content (excluding Content provided by users), features and functionality are and will remain the exclusive property of StayFresh and its licensors. Service is protected by copyright, trademark, and other laws of  and foreign countries. Our trademarks may not be used in connection with any product or service without the prior written consent of StayFresh.</p><br>
        <br><p>12. <b>Copyright Policy</b></p><br>
        <p>We respect the intellectual property rights of others. It is our policy to respond to any claim that Content posted on Service infringes on the copyright or other intellectual property rights (“Infringement”) of any person or entity.</p><br>
        <p>If you are a copyright owner, or authorized on behalf of one, and you believe that the copyrighted work has been copied in a way that constitutes copyright infringement, please submit your claim via email to stayfresh@gmail.com, with the subject line: “Copyright Infringement” and include in your claim a detailed description of the alleged Infringement as detailed below, under “DMCA Notice and Procedure for Copyright Infringement Claims”</p><br>
        <p>You may be held accountable for damages (including costs and attorneys’ fees) for misrepresentation or bad-faith claims on the infringement of any Content found on and/or through Service on your copyright.</p><br>
        <br><p>13. <b>DMCA Notice and Procedure for Copyright Infringement Claims</b></p><br>
        <p>You may submit a notification pursuant to the Digital Millennium Copyright Act (DMCA) by providing our Copyright Agent with the following information in writing (see 17 U.S.C 512(c)(3) for further detail):</p><br>
        <p>0.1. an electronic or physical signature of the person authorized to act on behalf of the owner of the copyright’s interest;</p><br>
        <p>0.2. a description of the copyrighted work that you claim has been infringed, including the URL (i.e., web page address) of the location where the copyrighted work exists or a copy of the copyrighted work;</p><br>
        <p>0.3. identification of the URL or other specific location on Service where the material that you claim is infringing is located;</p><br>
        <p>0.4. your address, telephone number, and email address;</p><br>
        <p>0.5. a statement by you that you have a good faith belief that the disputed use is not authorized by the copyright owner, its agent, or the law;</p><br>
        <p>0.6. a statement by you, made under penalty of perjury, that the above information in your notice is accurate and that you are the copyright owner or authorized to act on the copyright owner’s behalf.</p><br>
        <p>You can contact our Copyright Agent via email at stayfresh@gmail.com.</p><br>
        <br><p>14. <b>Error Reporting and Feedback</b></p><br>
        <p>You may provide us either directly at stayfresh@gmail.com or via third party sites and tools with information and feedback concerning errors, suggestions for improvements, ideas, problems, complaints, and other matters related to our Service ("Feedback"). You acknowledge and agree that: (i) you shall not retain, acquire or assert any intellectual property right or other right, title or interest in or to the Feedback; (ii) Company may have development ideas similar to the Feedback; (iii) Feedback does not contain confidential information or proprietary information from you or any third party; and (iv) Company is not under any obligation of confidentiality with respect to the Feedback. In the event the transfer of the ownership to the Feedback is not possible due to applicable mandatory laws, you grant Company and its affiliates an exclusive, transferable, irrevocable, free-of-charge, sub-licensable, unlimited and perpetual right to use (including copy, modify, create derivative works, publish, distribute and commercialize) Feedback in any manner and for any purpose.</p><br>
        <br><p>15. <b>Disclaimer Of Warranty</b></p><br>
        <p>These services are provided by company on an "as is" and "as available" basis. company makes no representations or warranties of any kind, express or implied, as to the operation of their services, or the information, content or materials included therein. you expressly agree that your use of these services, their content, and any services or items obtained from us is at your sole risk.</p><br>
        <p>Neither company nor any person associated with company makes any warranty or representation with respect to the completeness, security, reliability, quality, accuracy, or availability of the services. without limiting the foregoing, neither company nor anyone associated with company represents or warrants that the services, their content, or any services or items obtained through the services will be accurate, reliable, error-free, or uninterrupted, that defects will be corrected, that the services or the server that makes it available are free of viruses or other harmful components or that the services or any services or items obtained through the services will otherwise meet your needs or expectations.</p><br>
        <p>Company hereby disclaims all warranties of any kind, whether express or implied, statutory, or otherwise, including but not limited to any warranties of merchantability, non-infringement, and fitness for particular purpose.</p><br>
        <p>The foregoing does not affect any warranties which cannot be excluded or limited under applicable law.</p><br>
        <br><p>16. <b>Limitation Of Liability</b></p><br>
        <p>Except as prohibited by law, you will hold us and our officers, directors, employees, and agents harmless for any indirect, punitive, special, incidental, or consequential damage, however it arises (including attorneys fees and all related costs and expenses of litigation and arbitration, or at trial or on appeal, if any, whether or not litigation or arbitration is instituted), whether in an action of contract, negligence, or other tortious action, or arising out of or in connection with this agreement, including without limitation any claim for personal injury or property damage, arising from this agreement and any violation by you of any federal, state, or local laws, statutes, rules, or regulations, even if company has been previously advised of the possibility of such damage. except as prohibited by law, if there is liability found on the part of company, it will be limited to the amount paid for the products and/or services, and under no circumstances will there be consequential or punitive damages. some states do not allow the exclusion or limitation of punitive, incidental or consequential damages, so the prior limitation or exclusion may not apply to you.</p><br>
        <br><p>17. <b>Termination</b></p><br>
        <p>We may terminate or suspend your account and bar access to Service immediately, without prior notice or liability, under our sole discretion, for any reason whatsoever and without limitation, including but not limited to a breach of Terms.</p><br>
        <p>If you wish to terminate your account, you may simply discontinue using Service.</p><br>
        <p>All provisions of Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p><br>
        <br><p>18. <b>Governing Law</b></p><br>
        <p>These Terms shall be governed and construed in accordance with the laws of Malaysia, which governing law applies to agreement without regard to its conflict of law provisions.</p><br>
        <p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service and supersede and replace any prior agreements we might have had between us regarding Service.</p><br>
        <br><p>19. <b>Changes To Service</b></p><br>
        <p>We reserve the right to withdraw or amend our Service, and any service or material we provide via Service, in our sole discretion without notice. We will not be liable if for any reason all or any part of Service is unavailable at any time or for any period. From time to time, we may restrict access to some parts of Service, or the entire Service, to users, including registered users.</p><br>
        <br><p>20. <b>Amendments To Terms</b></p><br>
        <p>We may amend Terms at any time by posting the amended terms on this site. It is your responsibility to review these Terms periodically.</p><br>
        <p>Your continued use of the Platform following the posting of revised Terms means that you accept and agree to the changes. You are expected to check this page frequently so you are aware of any changes, as they are binding on you.</p><br>
        <p>By continuing to access or use our Service after any revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, you are no longer authorized to use Service.</p><br>
        <br><p>21. <b>Waiver And Severability</b></p><br>
        <p>No waiver by Company of any term or condition set forth in Terms shall be deemed a further or continuing waiver of such term or condition or a waiver of any other term or condition, and any failure of Company to assert a right or provision under Terms shall not constitute a waiver of such right or provision.</p><br>
        <p>If any provision of Terms is held by a court or other tribunal of competent jurisdiction to be invalid, illegal or unenforceable for any reason, such provision shall be eliminated or limited to the minimum extent such that the remaining provisions of Terms will continue in full force and effect.</p><br>
        <br><p>22. <b>Acknowledgement</b></p><br>
        <p>By using service or other services provided by us, you acknowledge that you have read these terms of service and agree to be bound by them.</p><br>
        <br><p>23. <b>Contact Us</b></p><br>
        <p>Please send your feedback, comments, requests for technical support by email: <b>electron@gmail.com</b>.</p><br>
    </div>
    <br><br><br>
    
    <?php 
        require_once('loggedinfooter.html');
    ?>
</body>
</html>