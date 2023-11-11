<!-- resources/views/components/share-buttons.blade.php -->
@php
$whatsappText = $poll->share_message !== null ? str_replace(
    ['{title}', '{link}', '<br />'],
    [
        $poll->question,
        route('show-poll', ['unique_identifier' => $poll->unique_identifier]),
        '%0a'
    ],
    $poll->share_message
) : route('show-poll', ['unique_identifier' => $poll->unique_identifier]);
@endphp

<a href="whatsapp://send?text={{ ($whatsappText) }}"
   action="share/whatsapp/share"
   target="_blank"
   class="btn w-100 wts btn-primary custom my-2"
   style="background-color: #04ae42 !important; border: #04ae42 !important;">
 
        <i class="fa fa-whatsapp text-white" aria-hidden="true"></i> 👉🏻सबको आगे भेजे 👈🏻 <i class="fa fa-whatsapp text-white" aria-hidden="true"></i>
    </a>
    <a id="share_custom" class="btn w-100 insta btn-danger my-2">
        <i class="fa fa-share text-white" aria-hidden="true"></i> इस लिंक को सबको आगे भेजे
    </a>


<script>
    document.getElementById('share_custom').addEventListener('click', function() {
        var pollTitle = @json($poll->question);
        var pollLink = @json(route('show-poll', ['unique_identifier' => $poll->unique_identifier]));
        var shareMessage = @json($poll->share_message);

        var shareText = '';

        if (shareMessage !== null) {
            shareText = shareMessage.replace('{title}', pollTitle).replace('{link}', pollLink).replace(/<br \/>/g, '\n');
        } else {
            shareText = pollLink;
        }


        if (navigator.share) {
            navigator.share({
                title: pollTitle,
                text: shareText,
            })
                .then(function() {
                    console.log('Successful share');
                })
                .catch(function(error) {
                    console.log('Error sharing', error);
                });
        } else {
            console.log('Share not supported on this browser, do it the old way.');
        }
    });
</script>