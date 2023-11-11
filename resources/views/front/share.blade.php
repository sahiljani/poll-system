@extends('layouts.layout')
@section('content')
    <style>
        .shadow-card {
            box-shadow: none;

        }

        .set-shadow-card {
            box-shadow: 0 0 10px 1px rgb(0 0 0 / 14%), 0 1px 14px 2px rgb(0 0 0 / 12%), 0 0 5px -3px rgb(0 0 0 / 30%);
        }

        @media (max-width: 767px) {
            .container {
                max-width: 100%;
                width: 100%;
                margin: auto;
            }
        }
    </style>
    {!! $SharePageAds1 !!}

    <div class="set-shadow-card p-4 ">
        <h5 class="card-title heading-share">Your Poll is Ready</h5>
        <p class="card-text">Share this link with your friends</p>
        <div class="copy-section">
            <input disabled class="form-control py-2 px-2" id="copyInput"
                value="{{ url('poll', ['unique_identifier' => $poll->unique_identifier]) }}" type="text">
            <button id="copyButton" onclick="copyToClipboard()" class="copyToClipboardbtn btn btn-primary custom my-3">Copy
                URL</button>

            <a id="btn" href="{{ route('delete-poll', ['unique_identifier' => $poll->unique_identifier]) }}"
                class="btn btn-danger custom my-3">Delete</a>
        </div>
        <x-share-buttons :poll="$poll" />
        {!! $SharePageAds2 !!}
    </div>

    

    <div class="set-shadow-card p-4 mt-5">
        @if ($poll->image_url)
        <div class="share-image">
            <img class="w-100" style="max-height:200px;object-fit:contain"  src="{{ asset('storage/'.$poll->image_url) }}" alt="">
        </div>
        @endif



        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class=" h3 text-left d-flex ">
            <span class="head-share text-left">{{ $poll->question }}</span>
        </div>

        <div id="vote-box" class="opt">

            <form action="{{ route('vote', $poll->unique_identifier) }}" method="POST">
                @csrf
                <div style="display: flex; flex-direction: column; text-align: left;" class="mt-5 options text-left">
                    @foreach ($pollOptions as $option)
                        <label class="h5">
                            <input class="form-check-input" type="radio" name="option" id="{{ $option->id }}"
                                value="{{ $option->id }}" requiredshadow-card w-50 my-4>
                            <span>{{ $option->option_text }}</span>
                        </label>
                    @endforeach
                </div>

                <div class="vote-button py-2 mt-3">
                    <button id="vote" href="" class="btn btn-success btn-lg" type="submit">Vote</button>
                    <button type="button" class="btn btn-danger btn-lg" id="result">View
                        Results</button>
                </div>
            </form>
        </div>

    </div>


    

    <div class="container page-content mt-5">

        {!! $SharePageAds3 !!}

        <h1 class="text-center mb-4">Maximize Your Poll-Creating Experience on {{ parse_url(url('/'), PHP_URL_HOST) }}</h1>
    
        <!-- Section 1: Getting Started with {{ parse_url(url('/'), PHP_URL_HOST) }} -->
        <h2>1. Getting Started with {{ parse_url(url('/'), PHP_URL_HOST) }}</h2>
        <p>For those new to {{ parse_url(url('/'), PHP_URL_HOST) }}, start by creating a poll. Give it a title, like "How to Secure a Student Loan for MBA in the USA," and add options such as "Bank Loans" and "Private Loans from Business Owners."</p>
    
        <!-- Section 2: Who can create a poll? -->
        <h2>2. Who can create a poll?</h2>
        <p>Creating a poll on {{ parse_url(url('/'), PHP_URL_HOST) }} is accessible to anyone with an internet connection. Our platform is versatile, allowing you to tailor polls to your specific needs and interests. Whether you belong to the banking sector, a college, or are looking to start a new career in the USA, create polls that suit your objectives. {{ parse_url(url('/'), PHP_URL_HOST) }} welcomes everyone to create and share polls for an inclusive experience.</p>
    
        <!-- Section 3: Most common polls among users -->
        <h2>Which polls are most common among our users?</h2>
        <ul>
            <li>A. "Who are the top lawyers in my country?"</li>
            <li>B. "What is the best college to study MBA in Canada?"</li>
            <li>C. "Which bank offers the best low-interest loans?"</li>
            <li>D. "Which credit card companies provide the best credit limits?"</li>
            <li>E. "Are backlinks beneficial for business SEO? Yes or no?"</li>
            <li>F. "What is the best cloud service for hosting websites online?"</li>
            <li>G. "Choose the best CRM software from the options below."</li>
            <li>H. "Who will win the next football match?"</li>
            <li>I. "Select the best car loan agency in New Delhi."</li>
            <li>J. "Where is the best destination to travel during winter?"</li>
        </ul>
    
        <!-- Conclusion -->
        <h2>Conclusion</h2>
        <p>Creating engaging polls on {{ parse_url(url('/'), PHP_URL_HOST) }} is a fun and interactive way to gather opinions, make decisions, or engage with your audience. Whether conducting a simple yes/no poll or a more complex ranked choice poll, our platform offers tools to create and share polls effortlessly.</p>
        <p>Follow the guide steps, utilize various poll types, promote polls on social media, encourage comments, and analyze results to make the most of your poll-creating experience.</p>
        <p class="mb-5">So, start crafting your polls on {{ parse_url(url('/'), PHP_URL_HOST) }} today. Your audience is waiting to share their opinions and insights with you!</p>
    </div>
    

    <script>
        document.getElementById("copyButton").addEventListener("click", function() {
            const inputField = document.getElementById("copyInput");

            // Use navigator.clipboard.writeText to copy the value to the clipboard
            navigator.clipboard.writeText(inputField.value)
                .then(() => {

                })
                .catch((err) => {
                    console.error("Unable to copy to clipboard:", err);

                });
        });
    </script>
@endsection
