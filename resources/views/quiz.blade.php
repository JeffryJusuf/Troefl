@extends('layouts.main')

@section('container')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-7 col-md-8 mx-auto">
            <h1 class="mt-0 mb-5">Disclaimer</h1>
            <p class="lead py-5 border-top border-bottom border-dark-subtle">
                This quiz is purely for learning/training purpose and does not represent an official TOEFL test. We do not guarantee you will get a good result on the actual TOEFL test if you get a perfect score on our quiz.
            </p>
            @auth
                <p class="mt-5">
                    <a href="/quiz" class="btn btn-lg btn-dark mx-1">
                        <small class="fs-6">
                            I understand
                        </small>
                    </a>
                </p>
            @else
                <p class="lead py-3">
                    You need to be <a href="/login" class="text-decoration-none">signed in</a> to use this feature.
                </p>
            @endauth
        </div>
    </div>
</section>
@endsection