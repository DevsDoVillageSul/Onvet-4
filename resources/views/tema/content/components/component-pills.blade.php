@extends('tema/layouts/contentLayoutMaster')

@section('title', 'Pills')

@section('content')
<!-- Basic and Outline Pills start -->
<section id="basic-and-outline-pills">
  <div class="row match-height">
    <!-- Basic pills starts -->
    <div class="col-xl-6 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic</h4>
        </div>
        <div class="card-body">
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="pill" href="#home" aria-expanded="true">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="pill" href="#profile" aria-expanded="false">Profile</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                href="javascript:void(0);"
                role="button"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Dropdown
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" id="dropdown1-tab" href="#dropdown1" data-toggle="pill" aria-expanded="true"
                  >@fat</a
                >
                <a class="dropdown-item" id="dropdown2-tab" href="#dropdown2" data-toggle="pill" aria-expanded="true"
                  >@mdo</a
                >
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="about-tab" data-toggle="pill" href="#about" aria-expanded="false">About</a>
            </li>
          </ul>
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home" aria-labelledby="home-tab" aria-expanded="true">
              <p>
                Pastry gummi bears sweet roll candy canes topping ice cream. Candy canes fruitcake cookie carrot cake
                pastry. Lollipop caramels sesame snaps pie tootsie roll macaroon dessert. Muffin jujubes brownie dragée
                ice cream cheesecake icing. Danish brownie pastry cotton candy donut. Cheesecake donut candy canes.
                Jelly beans croissant bonbon cookie toffee. Soufflé croissant lemon drops tootsie roll toffee tiramisu.
              </p>
            </div>
            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">
              <p>
                Pudding candy canes sugar plum cookie chocolate cake powder croissant. Carrot cake tiramisu danish candy
                cake muffin croissant tart dessert. Tiramisu caramels candy canes chocolate cake sweet roll liquorice
                icing cupcake.Bear claw chocolate chocolate cake jelly-o pudding lemon drops sweet roll sweet candy.
                Chocolate sweet chocolate bar candy chocolate bar chupa chups gummi bears lemon drops.
              </p>
            </div>
            <div class="tab-pane" id="dropdown1" role="tabpanel" aria-labelledby="dropdown1-tab" aria-expanded="false">
              <p>
                Cake croissant lemon drops gummi bears carrot cake biscuit cupcake croissant. Macaroon lemon drops
                muffin jelly sugar plum chocolate cupcake danish icing. Soufflé tootsie roll lemon drops sweet roll cake
                icing cookie halvah cupcake.Chupa chups pie jelly pie tootsie roll dragée cookie caramels sugar plum.
                Jelly oat cake wafer pie cupcake chupa chups jelly-o gingerbread.
              </p>
            </div>
            <div class="tab-pane" id="dropdown2" role="tabpanel" aria-labelledby="dropdown2-tab" aria-expanded="false">
              <p>
                Chocolate croissant cupcake croissant jelly donut. Cheesecake toffee apple pie chocolate bar biscuit
                tart croissant. Lemon drops danish cookie. Oat cake macaroon icing tart lollipop cookie sweet bear claw.
                Toffee jelly-o pastry cake dessert chocolate bar jelly beans fruitcake. Dragée sweet fruitcake dragée
                biscuit halvah wafer gingerbread dessert. Gummies fruitcake brownie gummies tart pudding.
              </p>
            </div>
            <div class="tab-pane" id="about" role="tabpanel" aria-labelledby="about-tab" aria-expanded="false">
              <p>
                Carrot cake dragée chocolate. Lemon drops ice cream wafer gummies dragée. Chocolate bar liquorice
                cheesecake cookie chupa chups marshmallow oat cake biscuit. Dessert toffee fruitcake ice cream powder
                tootsie roll cake.Chocolate bonbon chocolate chocolate cake halvah tootsie roll marshmallow. Brownie
                chocolate toffee toffee jelly beans bonbon sesame snaps sugar plum candy canes.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Basic pills ends -->

    <!-- Vertical Pills Start -->
    <div class="col-xl-6 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Vertically Stacked Pills</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-3 col-sm-12">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    id="stacked-pill-1"
                    data-toggle="pill"
                    href="#vertical-pill-1"
                    aria-expanded="true"
                  >
                    Pill 1
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="stacked-pill-2"
                    data-toggle="pill"
                    href="#vertical-pill-2"
                    aria-expanded="false"
                  >
                    Pill 2
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="stacked-pill-3"
                    data-toggle="pill"
                    href="#vertical-pill-3"
                    aria-expanded="false"
                  >
                    Pill 3
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled">Disabled</a>
                </li>
              </ul>
            </div>
            <div class="col-md-9 col-sm-12">
              <div class="tab-content">
                <div
                  role="tabpanel"
                  class="tab-pane active"
                  id="vertical-pill-1"
                  aria-labelledby="stacked-pill-1"
                  aria-expanded="true"
                >
                  <p>
                    Candy canes donut chupa chups candy canes lemon drops oat cake wafer. Cotton candy candy canes
                    marzipan carrot cake. Sesame snaps lemon drops candy marzipan donut brownie tootsie roll. Icing
                    croissant bonbon biscuit gummi bears. Bear claw donut sesame snaps bear claw liquorice jelly-o bear
                    claw carrot cake. Icing croissant bonbon biscuit gummi bears.
                  </p>
                </div>
                <div
                  class="tab-pane"
                  id="vertical-pill-2"
                  role="tabpanel"
                  aria-labelledby="stacked-pill-2"
                  aria-expanded="false"
                >
                  <p>
                    Pudding candy canes sugar plum cookie chocolate cake powder croissant. Carrot cake tiramisu danish
                    candy cake muffin croissant tart dessert. Tiramisu caramels candy canes chocolate cake sweet roll
                    liquorice icing cupcake. Sesame snaps wafer marshmallow danish dragée candy muffin jelly beans
                    tootsie roll. Jelly beans oat cake chocolate cake tiramisu sweet.
                  </p>
                </div>
                <div
                  class="tab-pane"
                  id="vertical-pill-3"
                  role="tabpanel"
                  aria-labelledby="stacked-pill-3"
                  aria-expanded="false"
                >
                  <p>
                    Carrot cake dragée chocolate. Lemon drops ice cream wafer gummies dragée. Chocolate bar liquorice
                    cheesecake cookie chupa chups marshmallow oat cake biscuit. Dessert toffee fruitcake ice cream
                    powder tootsie roll cake. Macaroon brownie lemon drops croissant marzipan sweet roll macaroon
                    lollipop. Danish fruitcake bonbon bear claw gummi bears apple pie.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Vertical Pills end -->
  </div>
</section>
<!-- Basic and Outline Pills end -->

<section id="filled-pills">
  <div class="row match-height">
    <!-- Filled Pills Start -->
    <div class="col-xl-6 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Filled</h4>
        </div>
        <div class="card-body">
          <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab-fill" data-toggle="pill" href="#home-fill" aria-expanded="true"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab-fill" data-toggle="pill" href="#profile-fill" aria-expanded="false"
                >Profile</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="javascript:void(0);"> Disabled </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="about-tab-fill" data-toggle="pill" href="#about-fill" aria-expanded="false"
                >About</a
              >
            </li>
          </ul>
          <div class="tab-content">
            <div
              role="tabpanel"
              class="tab-pane active"
              id="home-fill"
              aria-labelledby="home-tab-fill"
              aria-expanded="true"
            >
              <p>
                Pastry gummi bears sweet roll candy canes topping ice cream. Candy canes fruitcake cookie carrot cake
                pastry. Lollipop caramels sesame snaps pie tootsie roll macaroon dessert. Muffin jujubes brownie dragée
                ice cream cheesecake icing. Danish brownie pastry cotton candy donut. Cheesecake donut candy canes.
                Jelly beans croissant bonbon cookie toffee. Soufflé croissant lemon drops tootsie roll toffee tiramisu.
              </p>
            </div>
            <div
              class="tab-pane"
              id="profile-fill"
              role="tabpanel"
              aria-labelledby="profile-tab-fill"
              aria-expanded="false"
            >
              <p>
                Pudding candy canes sugar plum cookie chocolate cake powder croissant. Carrot cake tiramisu danish candy
                cake muffin croissant tart dessert. Tiramisu caramels candy canes chocolate cake sweet roll liquorice
                icing cupcake.Bear claw chocolate chocolate cake jelly-o pudding lemon drops sweet roll sweet candy.
                Chocolate sweet chocolate bar candy chocolate bar chupa chups gummi bears lemon drops.
              </p>
            </div>
            <div
              class="tab-pane"
              id="about-fill"
              role="tabpanel"
              aria-labelledby="about-tab-fill"
              aria-expanded="false"
            >
              <p>
                Carrot cake dragée chocolate. Lemon drops ice cream wafer gummies dragée. Chocolate bar liquorice
                cheesecake cookie chupa chups marshmallow oat cake biscuit. Dessert toffee fruitcake ice cream powder
                tootsie roll cake.Chocolate bonbon chocolate chocolate cake halvah tootsie roll marshmallow. Brownie
                chocolate toffee toffee jelly beans bonbon sesame snaps sugar plum candy canes.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Filled Pills End -->

    <!-- Justified Pills Start -->
    <div class="col-xl-6 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Justified</h4>
        </div>
        <div class="card-body">
          <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
              <a
                class="nav-link active"
                id="home-tab-justified"
                data-toggle="pill"
                href="#home-justified"
                aria-expanded="true"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                id="profile-tab-justified"
                data-toggle="pill"
                href="#profile-justified"
                aria-expanded="false"
                >Profile</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="javascript:void(0);"> Disabled </a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                id="about-tab-justified"
                data-toggle="pill"
                href="#about-justified"
                aria-expanded="false"
                >About</a
              >
            </li>
          </ul>
          <div class="tab-content">
            <div
              role="tabpanel"
              class="tab-pane active"
              id="home-justified"
              aria-labelledby="home-tab-justified"
              aria-expanded="true"
            >
              <p>
                Pastry gummi bears sweet roll candy canes topping ice cream. Candy canes fruitcake cookie carrot cake
                pastry. Lollipop caramels sesame snaps pie tootsie roll macaroon dessert. Muffin jujubes brownie dragée
                ice cream cheesecake icing. Danish brownie pastry cotton candy donut. Cheesecake donut candy canes.
                Jelly beans croissant bonbon cookie toffee. Soufflé croissant lemon drops tootsie roll toffee tiramisu.
              </p>
            </div>
            <div
              class="tab-pane"
              id="profile-justified"
              role="tabpanel"
              aria-labelledby="profile-tab-justified"
              aria-expanded="false"
            >
              <p>
                Pudding candy canes sugar plum cookie chocolate cake powder croissant. Carrot cake tiramisu danish candy
                cake muffin croissant tart dessert. Tiramisu caramels candy canes chocolate cake sweet roll liquorice
                icing cupcake.Bear claw chocolate chocolate cake jelly-o pudding lemon drops sweet roll sweet candy.
                Chocolate sweet chocolate bar candy chocolate bar chupa chups gummi bears lemon drops.
              </p>
            </div>
            <div
              class="tab-pane"
              id="about-justified"
              role="tabpanel"
              aria-labelledby="about-tab-justified"
              aria-expanded="false"
            >
              <p>
                Carrot cake dragée chocolate. Lemon drops ice cream wafer gummies dragée. Chocolate bar liquorice
                cheesecake cookie chupa chups marshmallow oat cake biscuit. Dessert toffee fruitcake ice cream powder
                tootsie roll cake.Chocolate bonbon chocolate chocolate cake halvah tootsie roll marshmallow. Brownie
                chocolate toffee toffee jelly beans bonbon sesame snaps sugar plum candy canes.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Justified Pills End -->
  </div>
</section>

<!-- Aligned Pills Start -->
<section id="aligned-pills">
  <div class="row match-height">
    <!-- Center Pills Start -->
    <div class="col-xl-6 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Center Alignment</h4>
        </div>
        <div class="card-body">
          <ul class="nav nav-pills justify-content-center">
            <li class="nav-item">
              <a class="nav-link" id="home-tab-center" data-toggle="pill" href="#home-center" aria-expanded="true"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link active"
                id="profile-tab-center"
                data-toggle="pill"
                href="#profile-center"
                aria-expanded="false"
                >Profile</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="javascript:void(0);"> Disabled </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="about-tab-center" data-toggle="pill" href="#about-center" aria-expanded="false"
                >About</a
              >
            </li>
          </ul>
          <div class="tab-content">
            <div
              role="tabpanel"
              class="tab-pane"
              id="home-center"
              aria-labelledby="home-tab-center"
              aria-expanded="true"
            >
              <p>
                Pastry gummi bears sweet roll candy canes topping ice cream. Candy canes fruitcake cookie carrot cake
                pastry. Lollipop caramels sesame snaps pie tootsie roll macaroon dessert. Muffin jujubes brownie dragée
                ice cream cheesecake icing. Danish brownie pastry cotton candy donut. Cheesecake donut candy canes.
                Jelly beans croissant bonbon cookie toffee. Soufflé croissant lemon drops tootsie roll toffee tiramisu.
              </p>
            </div>
            <div
              class="tab-pane active"
              id="profile-center"
              role="tabpanel"
              aria-labelledby="profile-tab-center"
              aria-expanded="false"
            >
              <p>
                Pudding candy canes sugar plum cookie chocolate cake powder croissant. Carrot cake tiramisu danish candy
                cake muffin croissant tart dessert. Tiramisu caramels candy canes chocolate cake sweet roll liquorice
                icing cupcake.Bear claw chocolate chocolate cake jelly-o pudding lemon drops sweet roll sweet candy.
                Chocolate sweet chocolate bar candy chocolate bar chupa chups gummi bears lemon drops.
              </p>
            </div>
            <div
              class="tab-pane"
              id="about-center"
              role="tabpanel"
              aria-labelledby="about-tab-center"
              aria-expanded="false"
            >
              <p>
                Carrot cake dragée chocolate. Lemon drops ice cream wafer gummies dragée. Chocolate bar liquorice
                cheesecake cookie chupa chups marshmallow oat cake biscuit. Dessert toffee fruitcake ice cream powder
                tootsie roll cake.Chocolate bonbon chocolate chocolate cake halvah tootsie roll marshmallow. Brownie
                chocolate toffee toffee jelly beans bonbon sesame snaps sugar plum candy canes.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Centered Pills End -->

    <!-- Right Aligned Pills Start -->
    <div class="col-xl-6 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Right Alignment</h4>
        </div>
        <div class="card-body">
          <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
              <a class="nav-link" id="home-tab-end" data-toggle="pill" href="#home-end" aria-expanded="true">Home</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link active"
                id="profile-tab-end"
                data-toggle="pill"
                href="#profile-end"
                aria-expanded="false"
                >Profile</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="javascript:void(0);"> Disabled </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="about-tab-end" data-toggle="pill" href="#about-end" aria-expanded="false"
                >About</a
              >
            </li>
          </ul>
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane" id="home-end" aria-labelledby="home-tab-end" aria-expanded="true">
              <p>
                Pastry gummi bears sweet roll candy canes topping ice cream. Candy canes fruitcake cookie carrot cake
                pastry. Lollipop caramels sesame snaps pie tootsie roll macaroon dessert. Muffin jujubes brownie dragée
                ice cream cheesecake icing. Danish brownie pastry cotton candy donut. Cheesecake donut candy canes.
                Jelly beans croissant bonbon cookie toffee. Soufflé croissant lemon drops tootsie roll toffee tiramisu.
              </p>
            </div>
            <div
              class="tab-pane active"
              id="profile-end"
              role="tabpanel"
              aria-labelledby="profile-tab-end"
              aria-expanded="false"
            >
              <p>
                Pudding candy canes sugar plum cookie chocolate cake powder croissant. Carrot cake tiramisu danish candy
                cake muffin croissant tart dessert. Tiramisu caramels candy canes chocolate cake sweet roll liquorice
                icing cupcake.Bear claw chocolate chocolate cake jelly-o pudding lemon drops sweet roll sweet candy.
                Chocolate sweet chocolate bar candy chocolate bar chupa chups gummi bears lemon drops.
              </p>
            </div>
            <div class="tab-pane" id="about-end" role="tabpanel" aria-labelledby="about-tab-end" aria-expanded="false">
              <p>
                Carrot cake dragée chocolate. Lemon drops ice cream wafer gummies dragée. Chocolate bar liquorice
                cheesecake cookie chupa chups marshmallow oat cake biscuit. Dessert toffee fruitcake ice cream powder
                tootsie roll cake.Chocolate bonbon chocolate chocolate cake halvah tootsie roll marshmallow. Brownie
                chocolate toffee toffee jelly beans bonbon sesame snaps sugar plum candy canes.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Right Aligned Pills End -->
  </div>
</section>
<!-- Aligned Pills End -->

<!-- Nav Pills Themes Starts -->
<section id="nav-pill-themes">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Pill Themes</h4>
        </div>
        <div class="card-body">
          <p class="card-text">
            Use class <code>.nav-pill-{color-name}</code> with <code>.nav-pills</code> class to apply color according to
            your choice.
          </p>
          <h6>Success</h6>
          <ul class="nav nav-pills nav-pill-success my-2">
            <li class="nav-item">
              <a class="nav-link active" href="javascript:void(0);" data-toggle="pill" aria-expanded="false">Active</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:void(0);" data-toggle="pill" aria-expanded="false">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:void(0);" data-toggle="pill" aria-expanded="false">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="javascript:void(0);" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <h6>Danger</h6>
          <ul class="nav nav-pills nav-pill-danger my-2">
            <li class="nav-item">
              <a class="nav-link active" href="javascript:void(0);" data-toggle="pill" aria-expanded="false">Active</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:void(0);" data-toggle="pill" aria-expanded="false">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:void(0);" data-toggle="pill" aria-expanded="false">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="javascript:void(0);" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <h6>Warning</h6>
          <ul class="nav nav-pills nav-pill-warning my-2">
            <li class="nav-item">
              <a class="nav-link active" href="javascript:void(0);" data-toggle="pill" aria-expanded="false">Active</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:void(0);" data-toggle="pill" aria-expanded="false">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:void(0);" data-toggle="pill" aria-expanded="false">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="javascript:void(0);" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <h6>Info</h6>
          <ul class="nav nav-pills nav-pill-info my-2">
            <li class="nav-item">
              <a class="nav-link active" href="javascript:void(0);" data-toggle="pill" aria-expanded="false">Active</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:void(0);" data-toggle="pill" aria-expanded="false">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:void(0);" data-toggle="pill" aria-expanded="false">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="javascript:void(0);" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Nav Pills Themes Ends -->
@endsection
