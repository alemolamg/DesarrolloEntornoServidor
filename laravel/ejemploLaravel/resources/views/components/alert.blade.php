<div class="alert alert-{{$tipo}}" role="alert">
    <h4 class="alert-heading text-{{$color}} ">Well done!</h4>
    @if(isset($titulo))
        <h5>{{$titulo}}</h5>
    @endif
    <p {{$attributes}}>Aww yeah, you successfully read this important alert message.
        {{$slot}}
    </p>
    <hr>
    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
</div>
