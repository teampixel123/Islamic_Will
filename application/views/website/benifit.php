<?php include('head.php') ?>
<body>
  <?php
    $is_login = $this->session->userdata('user_is_login');
    if($is_login){
      include('login_header.php');
    }
    else{
      include('header.php');
    }
   ?>
    <?php //include('header.php') ?>
    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Benefits</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="icon_house_alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Benefits </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->


    <!-- <div class="container">
        <div class="border-top mt-3"></div>
    </div> -->
    <!-- Akame About Area Start -->
    <section class="akame--about--area" id="important">
        <div class="container">
            <div class="row margin_1">
                <!-- Section Heading -->
                <div class="col-12 col-lg-6 about--us--content1 no-bottom-padding">
                  <div class="about--us--content mb-80">
                    <h3 class="m-center"> Importance Islamic Wills </h3>
                      <p class="indent"> The object of Wills according to the tradition of the Prophet is to provide for the maintenance of
                        members of family and other relatives where they cannot be properly provided for by the law of inheritance. At the same time the
                        prophet has declared that the power should not be exercised to the injury of the lawful heirs.
                      </p>

                      <p class="indent"> A bequest in favour of an heir would be an injury to the other heirs as it would reduce their shares and would consequently induce
                         a breach of the ties of kindred. Thus the policy of the Muslim law is to permit a man to give away the whole of his property by
                         gift inter vivos, but to prevent him, except for one third of his estate, from interfering by Will with the course of the
                         devolution of property according to the laws of inheritance.
                      </p>

                      <p class="indent">  A Will offers to the testator the means of correcting to a certain extent the law of succession, and enabling some of those
                        relatives who are excluded from inheritance to obtain a share in his property, and recognizing the services rendered to him by
                        a stranger.
                      </p>
                      <p>The importance of the Islamic wills (wasiyya) is clear from the following two hadith:-
                      </p>
                      <p>“A man may do good deeds for seventy years but if he acts unjustly when he leaves his last testament, the wickedness of his deed will
                        be sealed upon him, and he will enter the Fire. If, (on the other hand),
                      </p>



                  </div>
                </div>

                <div class="col-12 col-lg-6 about--us--content1 no-top-padding">
                    <div class="about--us--content mb-80">
                      <br><br>

                      <p class="indent">a man acts wickedly for seventy years but is just in his last
                      will and testament, the goodness of his deed will be sealed upon him, and he will enter the Garden." (Ahmad and Ibn Majah)</p>

                      <p class="indent">The will gives the testator an opportunity to help someone (e.g. a relative need such as an orphaned grandchild or a Christian widow)
                         who is not entitled to inherit from him. The will can be used to clarify the nature of joint accounts, those living in commensality,
                          appointment of guardian for one’s children and so on. In countries where the intestate succession law is different from Islamic law
                           it becomes absolutely necessary to write a will.</p>


                        <div class="border-top mt-3"></div>
                        <br>
                      <h3 class="padding-t-20">A will is important as:-</h3>
                      <p>•	It can help the testator to ensure that his/her property is distributed among family members as per his/her wish.</p>
                      <p>•	It can assist in avoiding conflict/ turmoil for the persons after his/her demise.</p>
                      <p class="padding-b-20">• Usually includes clear instructions by the Al-Musi (testator) to execute after his death.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akame About Area End -->
    <div class="container">
        <div class="border-top mt-3"></div>
    </div>
    <!-- Akame About Area Start -->
    <section class="akame--about--area" id="benefit">
        <div class="container">
            <div class="row margin_1">
                <!-- Section Heading -->
                <div class="col-12 col-lg-6 about--us--content1 no-bottom-padding">
                  <div class="about--us--content mb-80">
                    <h3 class=" m-center"> Benefits Of Using </h3>
                      <p>•	Our Website Leads To a More Balanced and Optimistic Outlook On Using Online Websites.
                      </p>

                      <p>•	Our websites is trust worthy and experienced service provider.
                      </p>

                      <p>•	Your inheritance is a gift to your beneficiaries and it is important that such a gift is given without stress,
                        worry or hassles for recipients. So, we provide assists and guide to complete your Wasiyat (wasiyya).
                      </p>

                      <p>•	Efficient and professional support.
                      </p>
                      <p>•	We assure our users availability of Quality product to our users.
                      </p>
                      <p>•	Independent professional advices available
                      </p>
                      <p>•	Trusted advice and assistants provided.
                      </p>
                      <p>•	To create a Wasiyat (wasiyya) with us is made simple, easy, hassles free, which is ultimately saving precious time and money.
                      </p>
                  </div>
                </div>

                <div class="col-12 col-lg-6 about--us--content1 no-top-padding">
                    <div class="about--us--content mb-80">
                      <br><br>

                      <p>•	We are available to meet the needs of Users to proceeds added convenience, giving them access to product and information whenever they need.
                      </p>
                      <p>•	You don’t even need to call, E-Mail or meet us, you just have to fill up your details, transfer the very affordable amount and get your prepared Wasiyat instantly.
                      </p>
                      <p>•	Cost efficient documentation, user friendly instructions and checklist to avoid confusion.
                      </p>

                      <p>•	Avoid dispute between Faraid heirs who should be appointed as administrator as testator can appoint his chosen Muslim male executor.
                      </p>

                      <p class="padding-b-20" >•	Probate has lesser formalities, thus avoiding possible erosion of the value of the estate.
                      </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akame About Area End -->
    <div class="container">
        <div class="border-top mt-3"></div>
    </div>




    <?php include('footer.php') ?>

</body>

</html>
