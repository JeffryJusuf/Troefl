@extends('layouts.main')

@section('container')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            @auth
                <div class="col-lg-7 col-md-8 mx-auto">
                    <h1 class="mt-3 mb-5">Welcome to <img src="/img/troefl-text.png" alt="" width="170"> , {{ auth()->user()->username }}</h1>
                    <p class="lead py-5 border-top border-bottom">
                        Test & Improve your English Skill by Trying our Online English Test with TOEFL Standard.
                    </p>
                    <p class="mt-5">
                        <a href="/learning-material" class="btn btn-lg btn-secondary">
                            <small class="fs-6">
                                Learn the Basics
                            </small>
                        </a>
                        <a href="/quiz" class="btn btn-lg btn-secondary mx-1">
                            <small class="fs-6">
                                Test Your English Skill
                            </small>
                        </a>
                        <a href="/discussions" class="btn btn-lg btn-secondary">
                            <small class="fs-6">
                                Visit the Discussion Forum
                            </small>
                        </a>
                    </p>
                </div>
            @else
                <div class="col-lg-7 col-md-8 mx-auto">
                    <h1 class="mt-0 mb-5">Welcome to <img src="/img/troefl-text.png" alt="" width="170"></h1>
                    <p class="lead pt-5 border-top">
                        Test & Improve your English Skill by Trying our Online English Test with TOEFL Standard.
                    </p>
                    <p class="lead py-3">
                        Looks like you aren't signed in yet. <a href="/login" class="text-decoration-none">Sign in now.</a>
                    </p>
                    <p class="lead pb-5 border-bottom">
                        Don't have an account? <a href="/register" class="text-decoration-none">Register now.</a>
                    </p>
                    <p class="mt-5">
                        <a href="/material" class="btn btn-lg btn-secondary">
                            <small class="fs-6">
                                Learn the Basics
                            </small>
                        </a>
                        <a href="/discussions" class="btn btn-lg btn-secondary">
                            <small class="fs-6">
                                Visit the Discussion Forum
                            </small>
                        </a>
                    </p>
                </div>
            @endauth
        </div>
    </section>
@endsection