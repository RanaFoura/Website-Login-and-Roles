@extends('include.header')


@section('content')
    <br /><br />

    <div class="container">
        <div class="row">
            <div class="row justify-content-center text-centert">
                <div class="col-12">
                    <a href="{{ route('siteinfo.edit', $siteinfo) }}" class="btn btn-primary"><em class="fa fa-pencil"></em>
                        Edit</a>
                </div>
                <br /><br /><br /><br />
                <div class="container-fluid p-0">
                    <!-- About-->
                    <div class="container px-4 row gx-5 col">

                        <div class="p-3 border bg-light">
                            <div class="row justify-content-center text-centert">
                                <div class="col-12">
                                    <h1 class="mb-0">
                                        <span class="text-primary"> {{ $siteinfo->site_name }}</span>
                                    </h1>
                                    <div class="subheading mb-5">
                                        {{ $siteinfo->address }} · (+987) {{ $siteinfo->phone_number }} ·
                                        <a class="text-primary" href="#">{{ $siteinfo->email }}</a>
                                    </div>
                                    <div class="p-1">
                                    <p class="lead mb-5">{{ $siteinfo->desc }}
                                    </p>
                                    </div>
                                    {{ $siteinfo->created_at }}
                                    <br /> <br />

                                    <h4 class="mb-0 text-dark"> Donate to: 
                                        <div class="badge text-bg-primary ">
                                             {{ $siteinfo->paypal }}
                                        </div>
                                    </h4>
                                    <br /> <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    {{-- <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row justify-content-center text-center">
                <div class="col-12">
                <a href="{{ route('siteinfo.edit', $siteinfo) }}" class="btn btn-primary"><em class="fa fa-pencil"></em> Edit</a>
                </div>
            </div>
            <br/><br/>
            <div class="row justify-content-center text-center">
                <h2 class="fw-bold "></h2>
                <p class="fw-bolder"></p>
                <p class="fw-normal"></p>
                <p class="fw-light"></p>
                <p class="fw-lighter"></p>
                <p class="fst-italic"></p>
                <p class="fst-normal"></p>
            </div>
        </div>
    </div>
</div>    --}}








    {{-- <div class="container px-4">
    <div class="row gx-5">
      <div class="col">
<div class="container"><br/><br/>
    <div class="row justify-content-center text-center">
        <div class="p-3 border bg-light"><br/>
        <h2 class="fw-bold ">{{$siteinfo->site_name}}</h2>
        <p class="fw-bolder">{{$siteinfo->desc}}</p>
        <p class="fw-normal">{{$siteinfo->phone_number}}</p>
        <p class="fw-light">{{$siteinfo->email}}</p>
        <p class="fw-lighter">{{$siteinfo->address}}</p>
        <p class="fst-italic">{{$siteinfo->paypal}}</p>
        <p class="fst-normal">{{$siteinfo->created_at}}</p>
        </div>
        <div class="row justify-content-center text-centert"><br/>
            <a class="btn" href="#"> Edddit </a>
        </div>
    </div>

</div>
</div>
</div>
</div> --}}
@endsection
