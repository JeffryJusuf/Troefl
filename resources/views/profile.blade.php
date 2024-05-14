@extends('layouts.main')

@section('container')
    <div class="d-flex">
        <img src="https://github.com/mdo.png" alt="" width="200" height="200" class="rounded-circle me-5">
        <dl class="row">
            <h1 class="my-3"><strong>mdo</strong></h1>
            <button class="btn btn-dark btn-sm h-25 my-3 rounded w-auto" type="submit">Edit Profile</button>
        </dl>
    </div>
    <div class="py-5">
        <hr class="hr" />
    </div>
    <div class="container">
        <div class="row gx-5">
            <div class="col-4">
                <div class="shadow text-center rounded">
                    <div class="p-5">
                        <h2 class="fw-bold mb-0">Avg. Score</h2>
                        <h1 class="display-1 my-5">N/A</h1>
                        <button type="button" class="btn btn-lg btn-dark rounded mt-5 w-auto" disabled>View Score
                            History</button>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="shadow rounded text-center">
                    <div class="p-5">
                        <h2 class="fw-bold">Discussion Created</h2>
                        <div class="list-group list-group-flush text-start py-3">
                            <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3"
                                aria-current="true">
                                <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                        <h6 class="mb-0">List group item heading</h6>
                                    </div>
                                    <small class="opacity-50 text-nowrap">now</small>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3"
                                aria-current="true">
                                <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                        <h6 class="mb-0">Another title here</h6>
                                    </div>
                                    <small class="opacity-50 text-nowrap">3d</small>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3"
                                aria-current="true">
                                <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                        <h6 class="mb-0">Third heading</h6>
                                    </div>
                                    <small class="opacity-50 text-nowrap">1w</small>
                                </div>
                            </a>
                        </div>
                        <button type="button" class="btn btn-lg btn-dark rounded w-auto" data-bs-dismiss="modal">View All
                            Discussions</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
