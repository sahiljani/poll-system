@extends('layouts.layout')
<meta name="csrf-token" content="{{ csrf_token() }}">

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
        label{
            display: inline-block;
            padding: 5px 10px;
            cursor: pointer;
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

    <div class="buttons my-5">
        <a href="{{ route('create-poll') }}" class="btn btn-primary py-3 px-5">यहाँ से अपना पोल बनाए</a>
        
        <button type="button" class="btn btn-danger py-3 px-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
        </button>
    </div>
    <!-- Button trigger modal -->
    
  
  <!-- Modal -->
  <form id="pollForm" action="{{ route('logvote', $poll->unique_identifier) }}" method="POST">
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      
        <div id="report_body" class="modal-body text-left">
            <div class="reporthdng d-flex"><input type="radio" value="Sexual content" id="report_1" name="report"><label for="report_1"> Sexual content </label></div>
            <div class="reporthdng d-flex"><input type="radio" value="Violent or repulsive content" id="report_2" name="report"><label for="report_2"> Violent or repulsive content </label></div>
            <div class="reporthdng d-flex"><input type="radio" value="Hateful or abusive content" id="report_3" name="report"><label for="report_3"> Hateful or abusive content </label></div>
            <div class="reporthdng d-flex"><input type="radio" value="Harassment or bullying" id="report_4" name="report"><label for="report_4"> Harassment or bullying </label></div>
            <div class="reporthdng d-flex"><input type="radio" value="Harmful or dangerous acts" id="report_5" name="report"><label for="report_5"> Harmful or dangerous acts </label></div>
            <div class="reporthdng d-flex"><input type="radio" value="Misinformation" id="report_6" name="report"><label for="report_6"> Misinformation </label></div>
            <div class="reporthdng d-flex"><input type="radio" value="Child abuse" id="report_7" name="report"><label for="report_7"> Child abuse </label></div>
            <div class="reporthdng d-flex"><input type="radio" value="Promotes terrorism" id="report_8" name="report"><label for="report_8"> Promotes terrorism </label></div>
            <div class="reporthdng d-flex"><input type="radio" value="Spam or misleading" id="report_9" name="report"><label for="report_9"> Spam or misleading </label></div>
            <div class="reporthdng d-flex"><input type="radio" value="Infringes my rights" id="report_10" name="report"><label for="report_10"> Infringes my rights </label></div>
            <div class="reporthdng d-flex"><input type="radio" value="Captions issue" id="report_11" name="report"><label for="report_11"> Captions issue </label></div>
            <div class="reporthdng d-flex"><input type="radio" value="None of these are my issue" id="report_12" name="report"><label for="report_12"> None of these are my issue </label></div>

        </div>
    </form>

        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit"  class="btn btn-danger">Submit Report</button>
        </div>
      </div>
    </div>
  </div>
</form>
    
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
<script>
     document.getElementById('pollForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Get the selected option
        var selectedOption = document.querySelector('input[name="report"]:checked');

        if (!selectedOption) {
            alert('Please select an option');
            return;
        }

        var selectedOptionId = selectedOption.value;

        // Make an AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open('POST', this.action, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    console.log(response.message); // Log the response from the server
                    modalInstance.hide()

                    // Add any additional handling you need
                } else {
                    console.error('Error:', xhr.status, xhr.statusText);
                    // Handle the error
                }
            }
        };

        // Prepare data for the POST request
        var formData = new FormData(this);
        formData.append('_token', csrfToken); // Include CSRF token

        formData.append('option', selectedOptionId);

        // Send the request
        xhr.send(new URLSearchParams(formData));
    });

    var modalInstance = null;
var modelElem = document.querySelector('#exampleModal');
modelElem.addEventListener('shown.bs.modal', function (){
  modalInstance = bootstrap.Modal.getInstance(modelElem);
});
</script>
    @endsection
