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
    <div id="feeds">

    </div>
        <script>
            const feeds = document.querySelector('#feeds')
            const getAllFeeds = () => {
                const linkAllFeeds = `http://api-feed.pcctabessmg.xyz/api/fd/get_all_feed_web.php?page=1&type=BANKOM`

                fetch(linkAllFeeds)
                .then((response) =>  {
                    return response.json();
                }).then((responseJson) => {
                    const data = responseJson.feed;
                    showFeed(data)
                }).catch((err) => {
                    console.log(error)
                })
            }

            const showFeed = Feed => {
                    Feed.forEach(item => {
                        var html = createFeed(item)
                        feeds.innerHTML += html;
                    });
            }

            const createFeed = feed => {
                const urlContent = 'http://api-feed.pcctabessmg.xyz/files/'
                let avatar = feed.user_detail.avatar ? `https://api.pcctabessmg.xyz/${feed.user_detail.avatar}` : '/assets/images/img_profil_default.png'
                let content = feed.file ? `<img src="${urlContent}${feed.file}" class="img-content">` : ''
                if(feed.jenis === 'FEED_VIDEO') {
                    content = `<video width="400" controls>
                                    <source src="${urlContent}${feed.file}" type="video/mp4">
                                    Your browser does not support HTML video.
                                </video>`
                }

                return `<div class="cards bg-dark-gray text-white">
                                <div class="d-flex align-items-center ">
                                    <img src="${avatar}" class="logo-avatar">
                                    <div class="d-flex flex-column ms-3">
                                        <span>${feed.user_detail.name}</span>
                                        <span>24 jam yang lalu</span>
                                    </div>
                                </div>
                                <div>
                                    <p class="mt-1">${feed.caption}</p>
                                    ${content}
                                    <div class="btn-group-topics">
                                        <button class="btn-topics"><i class="fa-solid fa-heart me-2"></i>Menyukai</button>
                                        <button class="btn-topics"><i class="fa-solid fa-comment me-2"></i>Komentar</button>
                                        <button class="btn-topics"><i class="fa-solid fa-share me-2"></i>Bagikan</button>
                                    </div>
                                </div>
                            </div>`
            }

            document.addEventListener("DOMContentLoaded", getAllFeeds);
        </script>

</section>

@endsection
