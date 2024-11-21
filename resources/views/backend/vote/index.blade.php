@extends('component.adminHome')

@section('title')
    Vote
@endsection

@section('act_vote')
    active
@endsection

@section('contenu')
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class=" mb-4">
                    <div class=" pb-0">

                        <div class="row ">
                            <div class="col-6">
                            </div>
                            <div class="col-6 text-end" id="send_pull">
                                <a class="btn bg-gradient-danger mb-0" id="send_pull_btn">
                                    Cloturer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 card-body p-3">

            <div class="row">
                @foreach ($data[0] as $item)
                <div class="col-xl-6  mb-xl-0 mb-2 cursor-pointer" style="margin-top: 10px">
                    <div class="card" id="idee_projet" value="2">
                        <div class="card-body">
                            <div class="row">
                                <div class="">
                                    <div class="numbers">
                                        <h5 class="font-weight-bolder mb-0 projet_titre">{{$item->description}}</h5>
                                        <span class="me-2 text-xs font-weight-bold">{{round($item->vote/$data[1], 2) * 100}}%</span>
    
                                        <div class="row d-flex align-items-center justify-content-center">
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-info" role="progressbar"
                                                        aria-valuenow="{{round($item->vote/$data[1], 2) * 100}}" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: {{round($item->vote/$data[1], 2) * 100}}%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            

        </div>

    </div>
@endsection


@section('script_contenu')
@endsection
