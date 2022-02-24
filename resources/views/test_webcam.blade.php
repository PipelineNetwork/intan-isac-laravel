<!-- CSS -->
<style>
    #my_camera {
        width: 100px;
        height: 70px;
        border: 1px solid black;
    }

</style>

<div id="my_camera"></div>
{{-- <input type=button value="Take Snapshot" onClick="take_snapshot()"> --}}
<input class="btn btn-success" id="button_click" type="hidden" value="Snapshot" onclick="take_snapshot()">
<div id="results"></div>
<div id="name"></div>
{{-- <p>{{ $user }}</p> --}}
@php
use Illuminate\Support\Facades\Auth;

$user = Auth::user()->name;
$ic = Auth::user()->nric;
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    setInterval(function() {
        $("#button_click").click();
    }, 5000);
</script>
<!-- Webcam.min.js -->
<script type="text/javascript" src="/assets/js/webcamjs/webcam.min.js"></script>

{{-- <input type="text" name="try" value="dah jumpa"> --}}

<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 300,
        height: 180,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach('#my_camera');

    function take_snapshot() {
        var user = <?php echo json_encode($user); ?>;
        var ic = <?php echo $ic; ?>;
            var image2 = "";
        Webcam.snap(function(data_uri) {
            // display results in page
            document.getElementById('results').innerHTML =
                '<img src="' + data_uri + '"/>';

            document.getElementById('name').innerHTML = '<p>' + user + '</p>';
            image2 = data_uri;
        });
        console.log('var image: ' + image2);
        $.ajax({
            type: "POST",
            url: "/api/test_post",
            data: {
                _token: "{{ csrf_token() }}",
                name: user,
                image: image2,
                nric: ic,
                _method: "POST"
            },
            // data: name,
            dataType: "json",
            success: function(response) {
                console.log(response);
            }
        });
    }
</script>
