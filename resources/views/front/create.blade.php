@extends('layouts.layout')
<title>Create a Poll - Free Poll Maker</title>
<style>
    div.upload {}

    div.upload p {
        font-size: 1.1rem;
        font-weight: 600;
    }

    div.upload label {
        cursor: pointer;
    }

    div.upload label input {
        display: none;
    }

    div.upload label span {
        position: relative;
        width: 30px;
        height: 30px;
        border: 1px dashed;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.4s;
    }

    div.upload label span i {
        position: absolute;
        font-size: 25px;
    }

    div.upload label span:hover {
        transform: scale(0.8);
    }

    .tdiv {
        display: flex;
        gap: 10px;
        justify-content: center;
        align-items: center;
    }

    .shadow-card {
        text-align: left !important;
    }
</style>
@section('content')

    {!! $CreatePageAds1 !!}

    <h1>Create a Poll</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        
    <form id="pollForm" action="{{ route('create-poll-submit') }}" method="post" enctype="multipart/form-data"
        class="form px-4 py-4">
        @csrf
        <div id="msg" class="text-center"></div>

        <label class="title my-1">Question</label>
        <div class="tdiv my-1">
            <input type="text" name="title" placeholder="Type your question here..."
                class="form-control shadow-none my-1">

            <div class="upload">
                <label class="upload-area">
                    <input id="head_img_input" class="d-none" type="file" name="head_img">
                    <span class="upload-button">
                        <i class="fas fa-arrow-up"></i>
                    </span>
                </label>
            </div>
        </div>

        <div class="preview text-center py-2" style="display: none;">
            <img id="preview_image" width="40%">
        </div>

        <label class="title my-1">Answer Options</label>
        <div class="options-container my-1">
            <div class="tdiv">
                <input type="text" name="options[]" placeholder="Option 1" class="form-control shadow-none ape my-1">
            </div>
            <div class="tdiv">
                <input type="text" name="options[]" placeholder="Option 2" class="form-control shadow-none ape my-1">

            </div>
        </div>

        <div class="phtdiv mb-3 ">
            <a id="addFieldBtn" class="btn btn-secondary btn-sm addphto">
                <i class="fa fa-plus"></i> Add Option
            </a>
        </div>
        <a class="mt-3 pt-3 text-dark font-weight-bold" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> <i class="fa fa-angle-down"></i> Show Advance Options </a>
        <div class="px-4 collapse " id="collapseExample">
            <div class="custom-control custom-switch">
                <input type="checkbox" name="oneVotePerIp" class="custom-control-input" id="log15" checked>
                <label class="custom-control-label" for="log15">One vote per IP address</label>
            </div>
            <div class="custom-control custom-switch">
                <input type="checkbox" name="votePerBrowser" class="custom-control-input" id="log12" checked>
                <label class="custom-control-label" for="log12">One vote per browser session</label>
            </div>
            <div class="custom-control custom-switch">
                <input name="customShare" type="checkbox" class="custom-control-input" id="customSwitches0">
                <label class="custom-control-label" for="customSwitches0">Custom Share Message</label>
            </div>
            <div class="custom-share px-3 d-none" id="customs_share">
                <div class="form-group">
                    <label class="text-danger" for="">Note: Use {title} for Title in sharing and {link}
                        for link</label>
                    <textarea class="form-control" name="customShareField" rows="2" placeholder="ex: { title }  {link }">{title}  {link}</textarea>
                </div>
            </div>
        </div>


        <div class="crtol text-left py-3">
            <button id="submitFormButton" class="btn btn-primary px-5 py-2" type="submit">
                Create Poll
            </button>
        </div>

        {!! $CreatePageAds2 !!}

    </form>

    <div class="container page-content mt-5">

        {!! $CreatePageAds3 !!}

        <h1 class="text-center mb-4">Maximize Your Poll-Creating Experience on {{ parse_url(url('/'), PHP_URL_HOST) }}</h1>

        <!-- Section 1: Getting Started with {{ parse_url(url('/'), PHP_URL_HOST) }} -->
        <h2>1. Getting Started with {{ parse_url(url('/'), PHP_URL_HOST) }}</h2>
        <p>For those new to {{ parse_url(url('/'), PHP_URL_HOST) }}, start by creating a poll. Give it a title, like "How to
            Secure a Student Loan for MBA in the USA," and add options such as "Bank Loans" and "Private Loans from Business
            Owners."</p>

        <!-- Section 2: Who can create a poll? -->
        <h2>2. Who can create a poll?</h2>
        <p>Creating a poll on {{ parse_url(url('/'), PHP_URL_HOST) }} is accessible to anyone with an internet connection.
            Our platform is versatile, allowing you to tailor polls to your specific needs and interests. Whether you belong
            to the banking sector, a college, or are looking to start a new career in the USA, create polls that suit your
            objectives. {{ parse_url(url('/'), PHP_URL_HOST) }} welcomes everyone to create and share polls for an inclusive
            experience.</p>

        <!-- Section 3: Most common polls among users -->
        <h2>Which polls are most common among our users?</h2>
        <ul>
            <!-- List items remain the same -->
        </ul>

        <!-- Conclusion -->
        <h2>Conclusion</h2>
        <p>Creating engaging polls on {{ parse_url(url('/'), PHP_URL_HOST) }} is a fun and interactive way to gather
            opinions, make decisions, or engage with your audience. Whether conducting a simple yes/no poll or a more
            complex ranked choice poll, our platform offers tools to create and share polls effortlessly.</p>
        <p>Follow the guide steps, utilize various poll types, promote polls on social media, encourage comments, and
            analyze results to make the most of your poll-creating experience.</p>
        <p class="mb-5">So, start crafting your polls on {{ parse_url(url('/'), PHP_URL_HOST) }} today. Your audience is
            waiting to share their opinions and insights with you!</p>
    </div>


    <script>
        document.getElementById("addFieldBtn").addEventListener("click", function() {
            const optionsContainer = document.querySelector(".options-container");
            const optionFields = optionsContainer.querySelectorAll(".tdiv");
            const newOptionField = document.createElement("div");
            newOptionField.classList.add("tdiv");
            const newOptionNumber = optionFields.length + 1;
            newOptionField.innerHTML = `
        <input type="text" name="options[]" placeholder="Option ${newOptionNumber}" class="form-control shadow-none ape my-1">
        <button class="btn btn-danger btn-sm remove-option" onclick="removeOption(this)">
            <i class="fa fa-times"></i>
        </button>
    `;
            optionsContainer.appendChild(newOptionField);
        });

        function removeOption(button) {
            const optionField = button.parentElement;
            const optionsContainer = document.querySelector(".options-container");
            optionsContainer.removeChild(optionField);
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Toggle Custom Share Message based on checkbox state
            var customShareCheckbox = document.getElementById("customSwitches0");
            var customShareSection = document.getElementById("customs_share");

            customShareCheckbox.addEventListener("change", function() {
                if (this.checked) {
                    customShareSection.classList.remove("d-none");
                } else {
                    customShareSection.classList.add("d-none");
                }
            });
        });
    </script>


@endsection
