<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-custom" >
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>


<style>
    .bg-custom{
        background-color:#ff4e00;
background-image: linear-gradient(315deg, #ff4e00 0%, #ec9f05 74%);

    }
</style>