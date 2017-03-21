@extends('layout.master')

@section('title')
    Trending quotes
@endsection

@section('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
@if(Session::has('success'))
    <section class="info-box success">
        {{Session::get('success')}}
    </section>
@endif

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <ul>
            <li>{{$error}}</li>
        </ul>

    @endforeach

@endif

    <section class="quotes">
        <h1>Latest Quotes</h1>
        @for($i=0; $i < count($quotes); $i++)

        <article class="quote">

            <div class="delete">
                <a href="#">x</a>
            </div>
                {{$quotes[$i]->quote}}
                <div class="info">
                    Create By <a href="#">{{$quotes[$i]->author->name}}</a> on {{$quotes[$i]->created_at}}
                </div>

        </article>
        @endfor
        <div class="pagination">
            Pagination
        </div>

    </section>
    <section class="edit-quote">
        <h1>Add a Quote</h1>
        <form method="post" action="{{route('create')}}">
            <div class="input-group">
                <label for="author">Your Name</label>
                <input type="text" name="author" id="author" placeholder="Your Name" />
            </div>

            <div class="input-group">
                <label for="quote">Your Quote</label>
                <textarea name="quote" id="quote" rows="5" placeholder="Your Quote"></textarea>
            </div>

            <button type="submit" class="btn">Submit Quote</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </section>

@endsection