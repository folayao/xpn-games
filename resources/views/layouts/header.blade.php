<!doctype html>

<link href="{{ asset(mix('css/principalPage.css')) }}" rel="stylesheet">
<link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>

@section('header')
    <section>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href=""class="navbar-brand"><img src={{ asset('logo.png') }} alt="" width="75" height= "75"></a>
    
            <button class="navbar-toggler" type="button" data-toggle="collapse"  data-target="#navbar" aria-controls ="navbar" aria-expanded="false" aria-label="Navigation Menu">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Games</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">User</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">WishList</a>
                    </li>
                </ul>
            </div>
    
        </nav>
    </section>
@endsection

