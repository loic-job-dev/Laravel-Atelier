@extends("/components/layout")
@section("content")

@auth('customer')
    <h2>Merci {{ auth('customer')->user()->first_name }}, votre commande est passée !</h2>
    

@endauth

@endsection