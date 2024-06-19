@extends('layouts.main')

@section('mainContent')
    <div class="d-flex justify-content-center">
        <div class="d-flex flex-column-reverse bd-highlight">
            <div class="p-2 bd-highlight">
                <p>
                    <a href="{{ route('post.post') }}" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                        Post
                    </a>
                </p>
            </div>

        </div>
    </div>
@endsection

