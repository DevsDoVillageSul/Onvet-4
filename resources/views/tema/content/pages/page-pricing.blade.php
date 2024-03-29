
@extends('tema/layouts/contentLayoutMaster')

@section('title', 'Pricing')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/base/pages/page-pricing.css')}}">
@endsection

@section('content')
<section id="pricing-plan">
  <!-- title text and switch button -->
  <div class="text-center">
    <h1 class="mt-5">Pricing Plans</h1>
    <p class="mb-2 pb-75">
      All plans include 40+ advanced tools and features to boost your product. Choose the best plan to fit your needs.
    </p>
    <div class="d-flex align-items-center justify-content-center mb-5 pb-50">
      <h6 class="mr-1 mb-0">Monthly</h6>
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="priceSwitch" />
        <label class="custom-control-label" for="priceSwitch"></label>
      </div>
      <h6 class="ml-50 mb-0">Annually</h6>
    </div>
  </div>
  <!--/ title text and switch button -->

  <!-- pricing plan cards -->
  <div class="row pricing-card">
    <div class="col-12 col-sm-offset-2 col-sm-10 col-md-12 col-lg-offset-2 col-lg-10 mx-auto">
      <div class="row">
        <!-- basic plan -->
        <div class="col-12 col-md-4">
          <div class="card basic-pricing text-center">
            <div class="card-body">
              <img src="{{asset('images/illustration/Pot1.svg')}}" class="mb-2 mt-5" alt="svg img" />
              <h3>Basic</h3>
              <p class="card-text">A simple start for everyone</p>
              <div class="annual-plan">
                <div class="plan-price mt-2">
                  <sup class="font-medium-1 font-weight-bold text-primary">$</sup>
                  <span class="pricing-basic-value font-weight-bolder text-primary">0</span>
                  <sub class="pricing-duration text-body font-medium-1 font-weight-bold">/month</sub>
                </div>
                <small class="annual-pricing d-none text-muted"></small>
              </div>
              <ul class="list-group list-group-circle text-left">
                <li class="list-group-item">100 responses a month</li>
                <li class="list-group-item">Unlimited forms and surveys</li>
                <li class="list-group-item">Unlimited fields</li>
                <li class="list-group-item">Basic form creation tools</li>
                <li class="list-group-item">Up to 2 subdomains</li>
              </ul>
              <button class="btn btn-block btn-outline-success mt-2">Your current plan</button>
            </div>
          </div>
        </div>
        <!--/ basic plan -->

        <!-- standard plan -->
        <div class="col-12 col-md-4">
          <div class="card standard-pricing popular text-center">
            <div class="card-body">
              <div class="pricing-badge text-right">
                <div class="badge badge-pill badge-light-primary">Popular</div>
              </div>
              <img src="{{asset('images/illustration/Pot2.svg')}}" class="mb-1" alt="svg img" />
              <h3>Standard</h3>
              <p class="card-text">For small to medium businesses</p>
              <div class="annual-plan">
                <div class="plan-price mt-2">
                  <sup class="font-medium-1 font-weight-bold text-primary">$</sup>
                  <span class="pricing-standard-value font-weight-bolder text-primary">49</span>
                  <sub class="pricing-duration text-body font-medium-1 font-weight-bold">/month</sub>
                </div>
                <small class="annual-pricing d-none text-muted"></small>
              </div>
              <ul class="list-group list-group-circle text-left">
                <li class="list-group-item">Unlimited responses</li>
                <li class="list-group-item">Unlimited forms and surveys</li>
                <li class="list-group-item">Instagram profile page</li>
                <li class="list-group-item">Google Docs integration</li>
                <li class="list-group-item">Custom “Thank you” page</li>
              </ul>
              <button class="btn btn-block btn-primary mt-2">Upgrade</button>
            </div>
          </div>
        </div>
        <!--/ standard plan -->

        <!-- enterprise plan -->
        <div class="col-12 col-md-4">
          <div class="card enterprise-pricing text-center">
            <div class="card-body">
              <img src="{{asset('images/illustration/Pot3.svg')}}" class="mb-2" alt="svg img" />
              <h3>Enterprise</h3>
              <p class="card-text">Solution for big organizations</p>
              <div class="annual-plan">
                <div class="plan-price mt-2">
                  <sup class="font-medium-1 font-weight-bold text-primary">$</sup>
                  <span class="pricing-enterprise-value font-weight-bolder text-primary">99</span>
                  <sub class="pricing-duration text-body font-medium-1 font-weight-bold">/month</sub>
                </div>
                <small class="annual-pricing d-none text-muted"></small>
              </div>
              <ul class="list-group list-group-circle text-left">
                <li class="list-group-item">PayPal payments</li>
                <li class="list-group-item">Logic Jumps</li>
                <li class="list-group-item">File upload with 5GB storage</li>
                <li class="list-group-item">Custom domain support</li>
                <li class="list-group-item">Stripe integration</li>
              </ul>
              <button class="btn btn-block btn-outline-primary mt-2">Upgrade</button>
            </div>
          </div>
        </div>
        <!--/ enterprise plan -->
      </div>
    </div>
  </div>
  <!--/ pricing plan cards -->

  <!-- pricing free trial -->
  <div class="pricing-free-trial">
    <div class="row">
      <div class="col-12 col-lg-10 col-lg-offset-3 mx-auto">
        <div class="pricing-trial-content d-flex justify-content-between">
          <div class="text-center text-md-left mt-3">
            <h3 class="text-primary">Still not convinced? Start with a 14-day FREE trial!</h3>
            <h5>You will get full access to with all the features for 14 days.</h5>
            <button class="btn btn-primary mt-2 mt-lg-3">Start 14-day FREE trial</button>
          </div>

          <!-- image -->
          <img
            src="{{asset('images/illustration/pricing-Illustration.svg')}}"
            class="pricing-trial-img img-fluid"
            alt="svg img"
          />
        </div>
      </div>
    </div>
  </div>
  <!--/ pricing free trial -->

  <!-- pricing faq -->
  <div class="pricing-faq">
    <h3 class="text-center">FAQ's</h3>
    <p class="text-center">Let us help answer the most common questions.</p>
    <div class="row my-2">
      <div class="col-12 col-lg-10 col-lg-offset-2 mx-auto">
        <!-- faq collapse -->
        <div class="collapse-margin collapse-icon" id="accordionExample">
          <div class="card">
            <div
              class="card-header"
              id="headingOne"
              data-toggle="collapse"
              role="button"
              data-target="#collapseOne"
              aria-expanded="false"
              aria-controls="collapseOne"
            >
              <span class="lead collapse-title">Does my subscription automatically renew?</span>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans gummi bears sweet roll
                bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie muffin cupcake candy
                caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit marzipan. Jujubes donut
                marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing cheesecake.
              </div>
            </div>
          </div>
          <div class="card">
            <div
              class="card-header"
              id="headingTwo"
              data-toggle="collapse"
              role="button"
              data-target="#collapseTwo"
              aria-expanded="false"
              aria-controls="collapseTwo"
            >
              <span class="lead collapse-title">Can I store the item on an intranet so everyone has access?</span>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                Tiramisu marshmallow dessert halvah bonbon cake gingerbread. Jelly beans chocolate pie powder. Dessert
                pudding chocolate cake bonbon bear claw cotton candy cheesecake. Biscuit fruitcake macaroon carrot cake.
                Chocolate cake bear claw muffin chupa chups pudding.
              </div>
            </div>
          </div>
          <div class="card">
            <div
              class="card-header"
              id="headingThree"
              data-toggle="collapse"
              role="button"
              data-target="#collapseThree"
              aria-expanded="false"
              aria-controls="collapseThree"
            >
              <span class="lead collapse-title">Am I allowed to modify the item that I purchased?</span>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                Tart gummies dragée lollipop fruitcake pastry oat cake. Cookie jelly jelly macaroon icing jelly beans
                soufflé cake sweet. Macaroon sesame snaps cheesecake tart cake sugar plum. Dessert jelly-o sweet muffin
                chocolate candy pie tootsie roll marzipan. Carrot cake marshmallow pastry. Bonbon biscuit pastry topping
                toffee dessert gummies. Topping apple pie pie croissant cotton candy dessert tiramisu.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ pricing faq -->
</section>
@endsection

@section('page-script')
{{-- Page js files --}}
<script src="{{asset('js/scripts/pages/page-pricing.js')}}"></script>
@endsection
