@extends('layouts.main')

@section('container')
    <div class="py-3" id="tenses">
        <small>
            <a href="/" class="text-decoration-none text-secondary">Home</a>
            /
            <a href="/learning-material" class="text-decoration-none text-secondary">Learning Material</a>
            /
            <a href="/learning-material/tenses" class="text-decoration-none text-secondary">Tenses</a>
        </small>
    </div>
    <div class="d-flex flex-column">
        <h1 class="pb-3">Tenses</h1>
        <article>
            Tenses terbagi menjadi 3, yaitu: present, past, future. Present Tense digunakan untuk menunjukkan sesuatu yang terjadi pada saat ini atau bisa juga sebuah pernyataan umum. Past Tense untuk masa lampau. Future Tense untuk kejadian yang akan terjadi di masa mendatang.
            <ul>
                <li>
                    Present Tenses
                    <ul>
                        <li>
                            <a href="#present-simple" class="text-decoration-none">Present Simple Tense</a>
                        </li>
                        <li>
                            <a href="#present-continuous" class="text-decoration-none">Present Continuous Tense</a>
                        </li>
                        <li>
                            <a href="#present-perfect" class="text-decoration-none">Present Perfect Tense</a>
                        </li>
                        <li>
                            <a href="#present-perfect-continuous" class="text-decoration-none">Present Perfect Continuous Tense</a>
                        </li>
                    </ul>
                </li>
                <br>
                <li>
                    Past Tenses
                    <ul>
                        <li>
                            <a href="#past-simple" class="text-decoration-none">Past Simple Tense</a>
                        </li>
                        <li>
                            <a href="#past-continuous" class="text-decoration-none">Past Continuous Tense</a>
                        </li>
                        <li>
                            <a href="#past-perfect" class="text-decoration-none">Past Perfect Tense</a>
                        </li>
                        <li>
                            <a href="#past-perfect-continuous" class="text-decoration-none">Past Perfect Continuous Tense</a>
                        </li>
                        <li>
                            <a href="#past-future" class="text-decoration-none">Past Future Tense</a>
                        </li>
                        <li>
                            <a href="#past-future-continuous" class="text-decoration-none">Past Future Continuous Tense</a>
                        </li>
                        <li>
                            <a href="#past-future-perfect" class="text-decoration-none">Past Future Perfect Tense</a>
                        </li>
                        <li>
                            <a href="#past-future-perfect-continuous" class="text-decoration-none">Past Future Perfect Continuous Tense</a>
                        </li>
                    </ul>
                </li>
                <br>
                <li>
                    Future Tenses
                    <ul>
                        <li>
                            <a href="#future-simple" class="text-decoration-none">Future Simple Tense</a>
                        </li>
                        <li>
                            <a href="#future-continuous" class="text-decoration-none">Future Continuous Tense</a>
                        </li>
                        <li>
                            <a href="#future-perfect" class="text-decoration-none">Future Perfect Tense</a>
                        </li>
                        <li>
                            <a href="#future-perfect-continuous" class="text-decoration-none">Future Perfect Continuous Tense</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </article>
        @include('learning-material.present.present-simple')
        @include('learning-material.present.present-continuous')
        @include('learning-material.present.present-perfect')
        @include('learning-material.present.present-perfect-continuous')
        @include('learning-material.past.past-simple')
        @include('learning-material.past.past-continuous')
        @include('learning-material.past.past-perfect')
        @include('learning-material.past.past-perfect-continuous')
        @include('learning-material.past.past-future')
        @include('learning-material.past.past-future-continuous')
        @include('learning-material.past.past-future-perfect')
        @include('learning-material.past.past-future-perfect-continuous')
        @include('learning-material.future.future-simple')
        @include('learning-material.future.future-continuous')
        @include('learning-material.future.future-perfect')
        @include('learning-material.future.future-perfect-continuous')
    </div>
    <div class="position-relative">
        <div class="position-fixed bottom-0 end-0 pe-5 m-5">
            <a href="#tenses" class="btn btn-dark rounded-circle shadow-lg p-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5"/>
                </svg>
            </a>
        </div>
    </div>
@endsection