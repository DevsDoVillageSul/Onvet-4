@extends('tema/layouts/contentLayoutMaster')

@section('title', 'Knowledge Base')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-knowledge-base.css')) }}">
@endsection

@section('content')
<!-- Knowledge base Jumbotron -->
<section id="knowledge-base-search">
  <div class="row">
    <div class="col-12">
      <div
        class="card knowledge-base-bg text-center"
        style="background-image: url('{{asset('images/banner/banner.png')}}')"
      >
        <div class="card-body">
          <h2 class="text-primary">Dedicated Source Used on Website</h2>
          <p class="card-text mb-2">
            <span>Popular searches: </span><span class="font-weight-bolder">Sales automation, Email marketing</span>
          </p>
          <form class="kb-search-input">
            <div class="input-group input-group-merge">
              <div class="input-group-prepend">
                <span class="input-group-text"><i data-feather="search"></i></span>
              </div>
              <input type="text" class="form-control" id="searchbar" placeholder="Ask a question..." />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Knowledge base Jumbotron -->

<!-- Knowledge base -->
<section id="knowledge-base-content">
  <div class="row kb-search-content-info match-height">
    <!-- sales card -->
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{asset('page/knowledge-base/category')}}">
          <img
            src="{{asset('images/illustration/sales.svg')}}"
            class="card-img-top"
            alt="knowledge-base-image"
          />

          <div class="card-body text-center">
            <h4>Sales Automation</h4>
            <p class="text-body mt-1 mb-0">
              There is perhaps no better demonstration of the folly of image of our tiny world.
            </p>
          </div>
        </a>
      </div>
    </div>

    <!-- marketing -->
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{asset('page/knowledge-base/category')}}">
          <img
            src="{{asset('images/illustration/marketing.svg')}}"
            class="card-img-top"
            alt="knowledge-base-image"
          />
          <div class="card-body text-center">
            <h4>Marketing Automation</h4>
            <p class="text-body mt-1 mb-0">
              Look again at that dot. That’s here. That’s home. That’s us. On it everyone you love.
            </p>
          </div>
        </a>
      </div>
    </div>

    <!-- api -->
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{asset('page/knowledge-base/category')}}">
          <img src="{{asset('images/illustration/api.svg')}}" class="card-img-top" alt="knowledge-base-image" />
          <div class="card-body text-center">
            <h4>API Questions</h4>
            <p class="text-body mt-1 mb-0">every hero and coward, every creator and destroyer of civilization.</p>
          </div>
        </a>
      </div>
    </div>

    <!-- personalization -->
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{asset('page/knowledge-base/category')}}">
          <img
            src="{{asset('images/illustration/personalization.svg')}}"
            class="card-img-top"
            alt="knowledge-base-image"
          />
          <div class="card-body text-center">
            <h4>Personalization</h4>
            <p class="text-body mt-1 mb-0">It has been said that astronomy is a humbling and character experience.</p>
          </div>
        </a>
      </div>
    </div>

    <!-- email -->
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{asset('page/knowledge-base/category')}}">
          <img
            src="{{asset('images/illustration/email.svg')}}"
            class="card-img-top"
            alt="knowledge-base-image"
          />
          <div class="card-body text-center">
            <h4>Email Marketing</h4>
            <p class="text-body mt-1 mb-0">There is perhaps no better demonstration of the folly of human conceits.</p>
          </div>
        </a>
      </div>
    </div>

    <!-- demand -->
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{asset('page/knowledge-base/category')}}">
          <img
            src="{{asset('images/illustration/demand.svg')}}"
            class="card-img-top"
            alt="knowledge-base-image"
          />
          <div class="card-body text-center">
            <h4>Demand Generation</h4>
            <p class="text-body mt-1 mb-0">Competent means we will never take anything for granted.</p>
          </div>
        </a>
      </div>
    </div>

    <!-- no result -->
    <div class="col-12 text-center no-result no-items">
      <h4 class="mt-4">Search result not found!!</h4>
    </div>
  </div>
</section>
<!-- Knowledge base ends -->
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/page-knowledge-base.js')) }}"></script>
@endsection
