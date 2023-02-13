@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(()=>show=false, 3000)" x-show="show" 
        class="fixed-top left-1/2 transform -translate-x-1/2 text-center text-white bg-primary col-md-6 mx-auto pt-3">
        <p>{{session('message')}}</p>
    </div>
@endif