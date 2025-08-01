@extends("/components/layout")
@section("content")

@auth('user')
    <h2>Merci {{ auth('user')->user()->first_name }}, votre commande est passée !</h2>
    

@endauth

@endsection