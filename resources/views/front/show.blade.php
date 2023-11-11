@extends('layouts.layout')

@section('content')
    <style>
        .mcq-options .radio-text {
            font-size: 1rem;
            display: block;
        }

        .mcq-radio {
            display: none;
            /* Hide the default radio buttons */
        }


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

        .ribbon-name {
            background-color: rgb(var(--bs-primary-rgb));
            padding: 10px 0;
            padding-top: 23px;
            padding-bottom: 10px;
        }

        .arrow-right {
            border-top: 25px solid transparent;
            border-bottom: 25px solid transparent;
            border-left: 25px solid rgb(var(--bs-primary-rgb));
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

        @media only screen and (max-width: 600px) {
            .arrow {
                width: 50% !important;
            }
        }
        h2, p{
            text-align: left;
        }
    </style>
    <div class="set-shadow-card p-4 ">

        @if ($poll->image_url)
            <div class="share-image">
                <img class="w-100" style="max-height:200px;object-fit:contain"
                    src="{{ asset('storage/' . $poll->image_url) }}" alt="">
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        {!! $ShowPageAds1 !!}
        <div class=" h3 text-left d-flex ">         
            <span class="head-share text-left">{{ $poll->question }}</span>
        </div>

        <div id="msg" data-vote-per-browser="true" class="text-center"></div>


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

                <div class="vote-button py-2">
                    <button id="vote" href="" class="btn btn-success btn-lg" type="submit">वोट करे</button>
                    <button type="button" class="btn btn-danger btn-lg" id="result">रिजल्ट देंखे</button>
                </div>           
            </form>
           
        </div>

        <div class="box-result" id="result-box" style="display: none;">
            <div class="options px-4">
                <div id="result-container" class="append"></div>
                <div class="vote-button py-2">
                    <button id="back" type="submit" class="btn btn-primary">Go Back</button>
                </div>
            </div>
        </div>

        <x-share-buttons :poll="$poll" />
        {!! $ShowPageAds2 !!}
    </div>

<div class="mt-5">
        <!-- Dynamic Top Polls -->
<div id="topPolls mt-5">
    {!! $ShowPageAds3 !!}
    <div class="rel d-flex">
        
        <button class="rounded-0 border-0 btn btn-primary arrow text-white w-25 px-2 h4 my-2">
            Top Polls
        </button>
        <div class="arrow-right my-2"></div>
    </div>

    <table class="table text-left">
        <thead>
            <tr>
                <th>Title</th>
                <th>Views</th>
            </tr>
        </thead>
        <tbody>
            @forelse($topPolls as $poll)
                <tr>
                    <td>
                        <a href="{{ $poll->url }}">
                            {{ $poll->question }}
                        </a>
                    </td>
                    <td>
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        {{ $poll->views }} Views
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No top polls available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Dynamic Recent Polls -->
<div id="recentPolls">
    <div class="rel d-flex">
        <button class="rounded-0 border-0 btn btn-primary arrow text-white w-25 px-2 h4 my-2">
            Recent Polls
        </button>
        <div class="arrow-right my-2"></div>
    </div>

    <table class="table text-left">
        <thead>
            <tr>
                <th>Title</th>
                <th>Views</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentPolls as $poll)
                <tr>
                    <td>
                        <a href="{{ $poll->url }}">
                            {{ $poll->question }}
                        </a>
                    </td>
                    <td>
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        {{ $poll->views }} Views
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No recent polls available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="container page-content mt-5">
    <h1 class="mb-4">Exploring the Share Page on {{ parse_url(url('/'), PHP_URL_HOST) }}</h1>

    <!-- Section 1: Accessing the Share Page -->
    <h2>1. Accessing the Share Page</h2>
    <p>After successfully creating your poll on {{ parse_url(url('/'), PHP_URL_HOST) }}, you'll be directed to the Share Page. It's a user-friendly and intuitive platform that streamlines the management of your poll.</p>

    <!-- Section 2: Voting on Your Poll -->
    <h2>2. Voting on Your Poll</h2>
    <p>The Share Page allows you, as the poll creator, to cast your own vote on your poll. This can be particularly helpful when you want to share your opinion or simply see how the voting process works.</p>

    <!-- Section 3: Real-Time Results -->
    <h2>3. Real-Time Results</h2>
    <p>One of the most exciting aspects of the Share Page is the ability to view real-time results. As the poll owner, you can monitor how the votes are stacking up and see the preferences of your audience as they vote.</p>

    <!-- Section 4: Deleting Your Poll -->
    <h2>4. Deleting Your Poll</h2>
    <p>There are instances when you may wish to delete a poll for various reasons. It could be because you've already gathered the necessary information or you simply want to make updates or refinements to your poll.</p>

    <!-- Section 5: Sharing Your Poll -->
    <h2>5. Sharing Your Poll</h2>
    <p>Sharing is caring, and the Share Page makes it effortless to spread the word about your poll. By simply copying the URL provided on the Share Page, you can share your poll with friends, colleagues, or your online community.</p>

    <!-- Where can you share your poll? -->
    <h2>Where can you share your poll?</h2>
    <p>You have the option to share your poll on various platforms, including WhatsApp and different social media websites and applications. When sharing your poll, the text should include the poll's title and a link that allows users to easily access and vote on it.</p>
    <p>We recommend that you share your poll within relevant categories to ensure targeted engagement.</p>

    <!-- Conclusion -->
    <p class="mt-4">The Share Page on {{ parse_url(url('/'), PHP_URL_HOST) }} is a valuable tool that empowers users to manage their polls with ease. Its user-friendly design ensures accessibility to all, promoting engagement and control over your content. By following best practices and using the Share Page to its full potential, you can make the most of your poll creation and interaction experience on {{ parse_url(url('/'), PHP_URL_HOST) }}.</p>
    <p class="mb-5">So, create your poll, explore the Share Page, and start engaging with your audience today!</p>
  </div>


</div>

    @endsection
