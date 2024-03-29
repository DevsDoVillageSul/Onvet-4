@extends('tema/layouts/contentLayoutMaster')

@section('title', 'Category')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-knowledge-base.css')) }}">
@endsection

@section('content')
<!-- Knowledge base Jumbotron -->
<section id="kb-category-search">
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

<!-- Knowledge base category Content  -->
<section id="knowledge-base-category">
  <div class="row kb-search-content-info match-height">
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <!-- account setting card -->
      <div class="card">
        <div class="card-body">
          <!-- account setting header -->
          <h6 class="kb-title">
            <i data-feather="settings" class="font-medium-4 mr-50 text-primary"></i>
            <span>Account Settings (5)</span>
          </h6>

          <div class="list-group list-group-circle mt-2">
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">How Secure Is My Password?</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Can I Change My Username?</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Where Can I Upload My Avatar?</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">How Do I Change My Timezone?</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">How Do I Change My Password?</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <!-- api card -->
      <div class="card">
        <div class="card-body">
          <!-- api header -->
          <h6 class="kb-title">
            <i data-feather="link" class="font-medium-4 text-success mr-50"></i>
            <span>API Questions (5)</span>
          </h6>
          <div class="list-group list-group-circle mt-2">
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">What Technologies Are Used?</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">What Are The API Limits?</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Why Was My Application Rejected?</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Where can I find the documentation?</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">How Do I Get An API Key?</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <!-- billing card -->
      <div class="card">
        <div class="card-body">
          <!-- billing header -->
          <h6 class="kb-title">
            <i data-feather="file-text" class="font-medium-4 text-danger mr-50"></i>
            <span>Billing (5)</span>
          </h6>

          <div class="list-group list-group-circle mt-2">
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Can I Contact A Salés Rep?</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Do I Need To Pay VAT?</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Can I Get A Refund?</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Difference Annual & Monthly Billing</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">What Happens If The Price Increases?</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <!-- copyright and legal -->
      <div class="card">
        <div class="card-body">
          <!-- copyright and legal header -->
          <h6 class="kb-title">
            <i data-feather="lock" class="font-medium-4 text-warning mr-50"></i>
            <span>Copyright & Legal (5)</span>
          </h6>

          <div class="list-group list-group-circle mt-2">
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">How Do I Contact Legal?</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Where Are Your Offices Located?</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Who Owns The Copyright On Text?</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Our Content Policy</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">How Do I File A DMCA?</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <!-- mobile apps -->
      <div class="card">
        <div class="card-body">
          <!-- mobile apps header -->
          <h6 class="kb-title">
            <i data-feather="smartphone" class="font-medium-4 mr-50 text-info"></i>
            <span>Mobile Apps (5)</span>
          </h6>

          <div class="list-group list-group-circle mt-2">
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">How Do I Download The Android App?</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">How To Download Our iPad App</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Where Can I Upload My Avatar?</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Can I Use My Android Phone?</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Is There An iOS App?</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <!-- knowhow card -->
      <div class="card">
        <div class="card-body">
          <!-- knowhow card header -->
          <h6 class="kb-title">
            <i data-feather="help-circle" class="font-medium-4 mr-50"></i>
            <span>Using KnowHow (4)</span>
          </h6>
          <div class="list-group list-group-circle mt-2">
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Customization</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Upgrading</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Customizing Your Theme</a>
            <a href="{{asset('page/knowledge-base/category/question')}}" class="list-group-item text-body">Upgrading Your Theme</a>
          </div>
        </div>
      </div>
    </div>
    <!-- no result -->
    <div class="col-12 text-center no-result no-items">
      <h4 class="mt-4">Search result not found!!</h4>
    </div>
  </div>
</section>
<!--/ Knowledge base category Content -->
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/page-knowledge-base.js')) }}"></script>
@endsection
