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
            width: 35px
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
        <div class="cards bg-dark-gray text-white">
            <div class="d-flex align-items-center ">
                <img src="{{ asset('assets/images/avatar.png') }}" class="logo-avatar">
                <div class="d-flex flex-column ms-3">
                    <span>Muhammad rafli hamdani</span>
                    <span>24 jam yang lalu</span>
                </div>
            </div>
            <div>
                <p class="mt-1">Bagi bagi kaos, baru buka distro soalnya </p>
                <img src="{{ asset('assets/images/content.jpg') }}" class="img-content">
                <div class="btn-group-topics">
                    <button class="btn-topics"><i class="fa-solid fa-heart me-2"></i>Menyukai</button>
                    <button class="btn-topics"><i class="fa-solid fa-comment me-2"></i>Komentar</button>
                    <button class="btn-topics"><i class="fa-solid fa-share me-2"></i>Bagikan</button>
                </div>
            </div>
        </div>
        <script>
            const getAllFeeds = () => {
                const linkAllFeeds = `http://api-feed.pcctabessmg.xyz/api/fd/get_all_feed_web.php?page=1&type=BANKOM`
                fetch(linkAllFeeds,
                {
                    method:'GET'
                })
                .then((response) =>  {
                    return response.json();
                }).then((responseJson) => {
                    console.log(responseJson);
                    // setAllFeed(responseJson)
                }).catch((err) => {
                    console.log(error)
                })
            }

            document.addEventListener("DOMContentLoaded", getAllFeeds);
        </script>

</section>
    
@endsection