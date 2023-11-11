@extends('layouts.layout')


@section('content')
    <style>
        main.mt-5 {
            margin-top: 0 !important;
        }

        main.mb-5 {

            margin-bottom: 0 !important;
        }

        /* Unset all styles for the container class */
        #main-container {
            max-width: none !important;
            margin-right: 0 !important;
            margin-left: 0 !important;
            padding-right: 0 !important;
            padding-left: 0 !important;
        }

        /* Unset all styles for the w-50 class (width 50%) */
        #main-container.w-50 {
            width: auto !important;
        }
        .threecolsection{
            background-color: #1f5ab226;
        }
        .innerbox{
            background-color: white;
            /* border-radius: 10px; */
            padding: 20px;
            height: 260px;
            margin-top: 10px;
        }
        /* Unset all styles for the py-4 class (padding-top and padding-bottom) */
        #main-container.py-4 {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }
    </style>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-5 my-3 d-flex flex-column justify-content-center">
                <h1 class="pollhdng text-center text-md-start fw-bold my-2">Create Polls on RisingPoll like never before</h1>
                <p class="pollpara fs-5 text-center text-md-start my-2">
                    Now get everyone’s opinion faster than ever by creating a poll only on RisingPoll.
                </p>
                <div class="row my-4 text-center text-md-start">
                    <div class="col-md-6 my-2">
                        <a href="{{ route('create-poll') }}" class="btn btn-lg btn-dark">
                            Create Poll
                        </a>
                    </div>
                    <div class="col-md-6 my-2">
                        <button type="button" class="btn btn-lg border-1 border-black">
                            Learn how
                        </button>
                    </div>
                </div>
            </div>


            <div class="col-md-7">
                <img src="{{ asset('storage/static/hero.png') }}" class="img-fluid rounded w-75" alt="hero  Image">
            </div>
        </div>
    </div>


    <div class="py-5 threecolsection">
        {!! $HomePageAds1 !!}
        <h1 class="text-center">What you can do with RisingPoll?</h1>
        <div class="container">
            <div class="row my-5">

                <div class="col-md-4">
                    <div class="innerbox">
                        <div class="text-center">
                            <img src="{{ asset('storage/static/facebook_polls.svg') }}" class="img-fluid" alt="">
                        </div>
                        
                        <h2 class="text-center mt-2">Create Poll</h2>
                        <p>Want to know which soccer player is the best or who should be the team leader? Create polls and get
                            everyone's opinion in no time.
                        </p>
                    </div>
                </div>



                <div class="col-md-4 ">
                    <div class="innerbox">
                        <div class="text-center">
                            <img src="{{ asset('storage/static/political_polls.svg') }}" class="img-fluid" alt="">
                        </div>
                        
                        <h2 class="text-center mt-2">Graphical Result</h2>
                        <p>
                            Not everyone likes numbers, and we knew that, so we made a bar graph of your result for better
                            understanding.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="innerbox">
                        <div class="text-center ">
                            <img src="{{ asset('storage/static/customer_review_survey.svg') }}" class="img-fluid" alt="">
                        </div>
                        <h2 class="text-center mt-2">Answer Anonymously</h2>
                        <p>
                            Many great opinions were never given for lack of courage. With us, people can give honest opinions
                            anonymously.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        .ribbon-name {
            background-color: rgb(var(--bs-primary-rgb));
            padding: 10px 0;
            padding-top: 23px;
            padding-bottom: 10px;
        }

        .arrow-right {
            border-top: 39px solid transparent;
            border-bottom: 39px solid transparent;
            border-left: 40px solid rgb(var(--bs-primary-rgb));
            opacity: 0.9;
        }

        .arrow-flip {
            transform: scaleX(-1);
            width: 0;
            height: 0;
            border-top: 39px solid transparent;
            border-bottom: 39px solid transparent;
            border-left: 45px solid var(--bs-primary);
            margin-left: 42%;
            opacity: 0.9;
        }

        .ribbon-right {
            background-color: var(--bs-primary);
            padding: 10px 0;
            padding-top: 23px;
            padding-bottom: 10px;
        }

        .accordion-collapse {
            background: #1f5ab226;
            line-height: 30px;
            color: #222;
        }

        .formdiv {
            background-color: #1f5ab226;
            padding: 35px;
            text-align: center;
            width: 80%;
            margin: auto;
        }

        @media only screen and (max-width: 600px) {
            .formdiv {
                background-color: #1f5ab226;
                padding: 35px;
                text-align: center;
                width: 100%!important;
                margin: auto;
            }
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.75rem 0.75rem;
            margin: 10px;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        textarea.form-control {
            height: auto;
        }
    </style>


    <div class="container">


        <div class="row pt-5">
            <h1 class="text-center">How to create a Poll on RisingPoll?</h1>
            <p class="text-center">Simplicity is the key feature of RisingPoll, but we also offer advanced features for
                users so they can customized polls for different purposes.</p>
            <div class="col-md-6">
                <div class="rel d-flex">
                    <div class="ribbon-name text-white w-50 px-2 h4 my-5">
                        <p class="arrowhdng">Create Poll</p>
                    </div>
                    <div class="arrow-right my-5"></div>
                </div>
                <p>
                    You can easily create your own poll on RisingPoll without any registration. But if you want to change
                    them in the future, we recommend registering with us.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img class="w-75" src="{{ asset('storage/static/welcome.svg') }}">
            </div>
        </div>

        <div class="text-center">
            {{-- <img class="w-25" src="/images/image_3.svg"> --}}
        </div>

        <div class="row">
            <div class="col-md-6 text-center d-none d-md-block">
                <img class="w-75" src="{{ asset('storage/static/welcome2.png') }}">
            </div>
            <div class="col-md-6">
                <div class="d-flex my-5">
                    <div class="arrow-flip my-5"></div>
                    <div class="ribbon-right text-white px-2 w-50 h4 my-5">
                        <p>See Results</p>
                    </div>
                </div>
                <p>
                    After you've created your poll on RisingPoll and shared it with everyone, you'll need to wait for
                    everyone to respond. If you are a registered user, you can view the result of your created polls at any
                    time, and otherwise, you can view it only on the device from which it was created.
                </p>
            </div>
            <div class="col-md-6 text-center">
                {{-- <img class="w-75" src="/images/Group_2.svg"> --}}
            </div>
        </div>
    </div>

    <div class="faqs">
        <div id="main">
            <!-- Header Section -->
            <div class="innercont">
                <div class="quediv">
                    <div class="container pt-5">
                        <!-- FAQ Section -->
                        <h1 class="quehdng">Have questions?</h1>
                        <p class="quepara">Let's do our best to answer your frequently asked questions</p>
                        <div class="accordion pb-5" id="accordionExample">

                            <div class="accordion-item my-4">
                                <h2 class="accordion-header " id="headingOne">
                                    <button class="accordion-button bg-primary text-white" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        Do I need to be a registered user to create a poll on RisingPoll?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        No, you can also create polls on RisingPoll without registering,
                                        but you will only be able to view your results on
                                        the device you created the poll from, nor will you
                                        be able to edit or delete that poll. But if you are
                                        a registered user, you will get all these facilities.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item my-4">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed bg-primary text-white" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        Is creating polls on rising poll free of cost?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Yes, creating polls on RisingPoll is free of cost. We provide our users with all the
                                        services on our platform for free. We are financed exclusively by advertising.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item my-4">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed bg-primary text-white" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false"
                                        aria-controls="collapsefour">
                                        What is RisingPoll?
                                    </button>
                                </h2>
                                <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        RisingPoll is an online platform/website that allows users to create polls and share
                                        them on multiple social media platforms to know public opinion. You can use it to
                                        play fun quizzes with friends or do some surveys in the office.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item my-4">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed bg-primary text-white" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Can I delete/edit a Poll on Rising Poll?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Yes, As Long as you are a registered user on RisingPoll you can delete/edit any poll
                                        created by you. If you have created the poll anonymously, you can send us the URL
                                        and screenshot of the poll through our contact us page. Our team will have proper
                                        validation and get the poll deleted post verification. It may take up to 7 days in
                                        the whole procedure.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item my-4">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed bg-primary text-white" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false"
                                        aria-controls="collapsefive">
                                        Are the results of Polls created on Rising Poll reliable?
                                    </button>
                                </h2>
                                <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Reliability of polls created on rising poll depends on the parameters chosen at the
                                        time of it's creation. The creator of the poll can choose proper parameters to stop
                                        duplicate voting.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

    <div class="contactus_section container pb-5 px-4">
        <div class="innercontainer">
            <div class="row">

                <div class="col-md-5">
                    <h1 class="contacthdng">Let's Connect <br>with RisingPoll</h1>
                    <p class="contactpara fs-5">
                        Discuss your query with RisingPoll, It will help us to build a strong platform.
                    </p>
                </div>

                <div class="col-md-7">
                    <form id="contact_form" method="post" action="" class="formdiv">
                        <label class="formhdng fs-4">Enter your details to contact</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name"
                                placeholder="Enter your Full Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email"
                                placeholder="Enter your email address">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Enter Subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="3" placeholder="Write your message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary submitbtn">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
