@extends('layouts.layout')

@section('content')



        {!! $showVotePageAds1 !!}
    
        <div class="text-center px-2 py-3  h3">
            <span class="head-share">{{ $poll->question }}</span>
        </div>
        <div id="msg" data-vote-per-browser="true" class="text-center"></div>
        
        <div class="box-result" id="result-box" style="">
            <div class="options px-4">
                <div id="result-container" class="append">
                   @php
                    //  get all $option->votes find $totalVotesstore in same variable
                    $totalVotes = 0;

                    foreach ($pollOptions as $option) {
                        $totalVotes = $totalVotes + $option->votes;
                    }


                @endphp
                
                    @foreach ($pollOptions as $option)
                    <div class="child-sub pb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="h6 flex-grow text-lg sm:text-base custom-input-text">
                                <span>{{ $option->option_text }}</span>
                            </div>
                            <div class="h6 whitespace-nowrap text-gray-500 custom-text">
                                <span>({{ $option->votes }} votes)</span>
                            </div>
                        </div>
                        <div class="progress">
                            @php
                                $percentage = $totalVotes > 0 ? ($option->votes / $totalVotes) * 100 : 0;
                            @endphp
                            <div class="progress-bar bg-info" role="progressbar" style="width: {{ $percentage }}%;" aria-valuenow="{{ $option->votes }}" aria-valuemin="0" aria-valuemax="100">{{ number_format($percentage, 2) }}%</div>
                        </div>
                    </div>
                    
                        
                    @endforeach
                    <p class="">Total: <span>{{ $totalVotes }}</span></p>
                 
                </div>
                {{-- <div class="vote-button py-2">
                    <button id="back" type="submit" class="btn btn-primary">पीछे जायें</button>
                </div> --}}
            </div>
        </div>
        <x-share-buttons :poll="$poll" />
        {!! $showVotePageAds2 !!}
      

        <div class="container page-content mt-5">
            {!! $showVotePageAds3 !!}
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

        
@endsection
