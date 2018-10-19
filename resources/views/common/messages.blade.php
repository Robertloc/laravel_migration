@if(Session::has('success_message'))
<!-- if there is anything with the name sucess message, we are echoing that message -->
    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>
@endif
 
@if (count($errors) > 0)
<!-- asking if there are any errors, looping through them with foreach and printing them out with bootstrap classes  -->
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div> 
        @endforeach
    </div>
@endif

<!--anywhere we include this method, we can put a success/error message -->


