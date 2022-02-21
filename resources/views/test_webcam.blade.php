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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    setInterval(function() {
        $("#button_click").click();
    }, 10000);
</script>
<!-- Webcam.min.js -->
<script type="text/javascript" src="/assets/js/webcamjs/webcam.min.js"></script>

<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 100,
        height: 70,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach('#my_camera');

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            // display results in page
            document.getElementById('results').innerHTML =
                '<img src="' + data_uri + '"/>';
        });
    }
</script>
