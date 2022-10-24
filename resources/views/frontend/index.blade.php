@extends('layouts.app')

@section('content')

<section class=" topics">
    <style>
        .cards {
            padding: 1.5rem;
            margin: 1.5rem 0;
        }
        .bg-dark-gray {
            background: #333333;
        }

        .logo-avatar {
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }
        .img-content {
            width: 100%;
        }
        .topics {
            min-height: 100vh;
        }
        .btn-group-topics {

        }
        .btn-topics {
            border: none;
            border-radius: 2rem;
            margin: 1rem 4px;
            padding: 0.3rem 1rem;
            font-size: 14px;
            color: #c0c0c0;
            background-color: #e7e7e7;
            gap: 1rem;
        }

        .topics {
            margin: 2rem 0 2rem 0;
            padding-bottom: 2rem;
        }

        #feed-empty {
            text-align: center;
            margin: 10rem 0;
            font-size: 20px;
        }

        #btn-back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            border: 1px solid #ffcb22;
            background-color: #FFCC22;
            border-radius: 50%;
        }

        #btn-back-to-top:hover {
            background: #FFC400;
        }
        @media only screen and (max-width: 600px) {
            .topics {
                padding: 0 7%;
            }
            .btn-topics {
                padding: 0.2rem 0.6rem;
                margin: 1rem 2px;
            }
        }
        @media only screen and (min-width: 600px) {
            .topics {
                padding: 0 10%;
            }
        }
        @media only screen and (min-width: 768px) {
            .topics {
                padding: 0 15%;
            }
        }
        @media only screen and (min-width: 992px) {
            .topics {
                padding: 0 20%;
            }
            .cards {
            padding: 2rem;
            }
        }

    </style>
    <div id="feeds">
    </div>
    <div id="feed-empty"></div>
    <button
            type="button"
            class="btn btn-danger btn-floating btn-lg"
            id="btn-back-to-top"
            >
        <i class="fas fa-arrow-up"></i>
    </button>

</section>

@endsection
@section('js')
 <script src="{{ asset('js/script.js')}}"></script>
@endsection
