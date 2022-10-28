@include('layouts.includes.navbar-feed-libas') 
@extends('layouts.app')


@section('content')

<section class=" topics pt-4">
    <style>

        /* navbar */

        .navbar>.container-fluid {
            display: flex;
            flex-wrap: nowrap;
            align-items: center;
            justify-content: space-between;
        }

        .global-navbar {
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


        /* content-index */
        
        a {
            text-decoration: none;
        }
        
        .cards {
            padding: 1.5rem;
            margin-bottom: 1.5rem;
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
            padding-bottom: 2rem;

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

        #feed-empty {
            text-align: center;
            margin: 10rem 0;
            font-size: 20px;
        }

        #btn-back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            height: 50px;
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
