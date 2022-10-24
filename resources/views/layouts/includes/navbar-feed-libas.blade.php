<section>
    <style>
        .navbar>.container-fluid {
            display: flex;
            flex-wrap: nowrap;
            align-items: center;
            justify-content: space-between;
        }

        .global-navbar {
        /* background-color: #33333366; */
        background: #1b1b1b;
        }

        .btn-group-nav {
            display: flex;
            justify-content: center;
            height: 13rem;
            overflow-y: hidden;
            scroll-behavior: smooth;
        }

        .btn-group {
            gap: 8px;
            display: flex;
            overflow-x: auto;
            padding: 0 12px;
            margin-top: 1rem;
            padding-bottom: 2rem;
        }
        .btn-nav {
            border-radius: 10px;
            background-color: #333333;
            color: white;
            border: none;
            padding: 0.5rem 0.8rem;
        }
        .btn-nav:hover {
            background-color: #fedf2c;
        }
        .active {
            background-color: #fedf2c;
        }
        .btn-outline-success {
            color: #fedf2c;
            border: 1px solid #fedf2c;
        }
        .btn-outline-success:hover {
            background-color: #fedf2c;
        }
        .btn-outline-success:active {
            background-color: #fedf2c !important    ;
        }

        .img span {
            margin-left: 1rem;
            line-height: 20px;
            font-weight: 600;
        }
        .img-responsive {
            max-width: 5rem;
            height: auto;

        }


        @media only screen and (max-width: 600px) {
            .img span {
                display: none;
            }
            .nav-up{
                padding: 0 1rem;
            }
            .topics {
                padding: 0 10%;
            }
        }

        @media only screen and (min-width: 768px) {
            .nav-up{
                padding: 0 2rem ;
            }
        }

        @media only screen and (min-width: 992px) {
            .nav-up{
                padding: 0 4rem ;
            }
        }
        </style>
    <div class="global-navbar">
        <nav class="navbar btn-group-nav" >
            <div class="container-fluid nav-up">
                <div class="img d-flex align-items-center me-3">
                    <img src="{{ asset('assets/images/logo.png') }}" class="img-responsive" alt="" >
                    <div class="d-flex flex-column">
                        <span class="navbar-brand text-white">Polrestabes</span>
                        <span class="navbar-brand text-white">Semarang</span>
                    </div>
                </div>
              <form class="d-flex" role="search">
                <input id="search" class="form-control me-2" placeholder="Search" aria-label="Search">
                <button onclick="searchFeed(event)" type="submit" class="btn btn-outline-success">Search</button>
                <button onclick="refresh(event)" type="button" class="btn btn-outline-success ms-3"><i class="fa-solid fa-arrows-rotate"></i></button>

              </form>
            </div>
            <div class="btn-group" id="btn-group-highlight">
                <button onclick="getType('')"  class="btn-nav active"  >
                    ALL
                </button>
                <button onclick="getType('DPO')" class="btn-nav"  >
                    DPO
                </button>
                <button  onclick="getType('PPA')" class="btn-nav">
                    PPA
                </button>
                <button onclick="getType('BANKOM')" class="btn-nav">
                    BANKOM
                </button>
                <button onclick="getType('ORMAS')" class="btn-nav">
                    ORMAS
                </button>
                <button onclick="getType('3 PILAR')" class="btn-nav">
                    3 PILAR
                </button>
                <button onclick="getType('PEMILU')" class="btn-nav">
                    PEMILU
                </button>
                <button onclick="getType('POLSUS')" class="btn-nav">
                    POLSUS
                </button>
                <button onclick="getType('OJOL')" class="btn-nav">
                    OJOL
                </button>
                <button onclick="getType('ZEBRA TRAINING CENTER')" class="btn-nav">
                    ZEBRA TRAINING CENTER
                </button>
            </div>
        </nav>
    </div>
</section>
@section('js')
 <script src="{{ asset('js/script.js')}}"></script>
@endsection


