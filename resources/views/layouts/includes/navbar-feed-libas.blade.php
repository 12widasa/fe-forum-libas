<section>
    <div class="global-navbar">
        <nav class="navbar py-3 btn-group-nav" >
            <div class="container-fluid nav-up">
                <div class="img d-flex align-items-center me-3">
                    <img src="{{ asset('assets/images/logo.png') }}" class="img-responsive" alt="" >
                    <div class="d-flex flex-column">
                        <span class="navbar-brand text-white">Polrestabes</span>
                        <span class="navbar-brand text-white">Semarang</span>
                    </div>
                </div>
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
            <div class="btn-group  ">
                
                <button class="btn-nav"  >
                    ALL
                </button>
                <button class="btn-nav"  >
                    DPO
                </button>
                <button class="btn-nav"  >
                    PPA
                </button>
                <button class="btn-nav"  >
                    BANKOM
                </button>
                <button class="btn-nav"  >
                    ORMAS
                </button>
                <button class="btn-nav">
                    3 PILAR
                </button>
                <button class="btn-nav"  >
                    PEMILU
                </button>
                <button class="btn-nav"  >
                    POLSUS
                </button>

            </div>
        </nav>
    </div>
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
    }

    .btn-group {
        gap: 8px;
        display: flex;
        overflow-x: auto;
        padding: 0 12px;
        margin-top: 1rem;
    }
    .btn-nav {
        border-radius: 10px;
        min-width: 5.2rem;
        background-color: #333333;
        color: white;
        border: none;
        padding: 0.5rem 0;
    }
    .btn-nav:hover {
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
</section>