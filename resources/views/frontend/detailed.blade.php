@extends('layouts.app')

@section('content')

<section class=" topics">
    <style>
        .cards {
            padding: 1.5rem;
            margin-top: 1.5rem;
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
            /* gap: 1rem; */
        }

        .bg {
            background-color: #54535354;
            border-radius: 4rem 4rem 0 0;
            padding: 2rem;
            color: #B59D1F;
        }

        .bg p {
            font-size: 20px;
            font-weight: bold;
        }

        .comment-dots {
            font-size: 1.8rem;
        }
        .comment {
            font-size: 13rem;
        }
        @media only screen and (max-width: 600px) {
            .topics {
                padding: 0 7%;
            }
            .btn-topics {
                padding: 0.2rem 0.6rem;
                margin: 1rem 2px;
            }
            .comment {
                font-size: 10rem;
            }
            .bg p {
            font-size: 16px;
            }
            .comment-dots {
            font-size: 1.4rem;
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
        <div id="detail-feeds">
            <div class="bg">
                <div class="d-flex justify-content-between align-items-start">
                    <p>Semua Komentar</p><i class="fa-solid fa-comment-dots comment-dots"></i>
                </div>
                <div class="text-center comment">
                    <i class="fa-solid fa-comments"></i>
                    <p>Belum Ada Komentar</p>
                </div>
            </div>
        </div>

</section>

@endsection

@section('js')
<script type="text/javascript">

    const Detailfeeds = document.querySelector("#detail-feeds");
    const getDetailfeeds = () => {
        const linkDetailFeeds = `http://api-feed.pcctabessmg.xyz/api/fd/get_feed_by_id_web.php?id=2522`;

        fetch(linkDetailFeeds)
            .then((response) => {
                return response.json();
            })
            .then((responseJson) => {
                const data = responseJson.feed;
                console.log(data)
            })
            .catch((err) => {
                console.log(error);
            });
    };

    const showDetailfeeds = (Detailfeeds) => {
    const urlContent = "https://api-feed.pcctabessmg.xyz/files/";
    let avatar = feed.user_detail.avatar
        ? `https://api.pcctabessmg.xyz/${feed.user_detail.avatar}`
        : "/assets/images/img_profil_default.png";
    let content = feed.file
        ? `<img src="${urlContent}${feed.file}" class="img-content">`
        : "";
    let date = moment(feed.created_at).locale("id").fromNow();

    if (feed.jenis === "FEED_VIDEO") {
        content = `<video class="img-content" controls>
                        <source src="${urlContent}${feed.file}" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>`;
    }

    return `<div class=" bg-dark-gray text-white">
                <div class="cards">
                    <div class="d-flex align-items-center ">
                        <img src="${avatar}" class="logo-avatar">
                        <div class="d-flex flex-column ms-3">
                            <span>${feed.user_detail.name}</span>
                            <span>${date}</span>
                        </div>
                    </div>
                    <div>
                        <p class="mt-1">${feed.caption}</p>
                        <img src="{{ asset('assets/images/content.jpg') }}" class="img-content"/>
                        ${content}
                        <div class="btn-group-topics">
                            <button class="btn-topics"><i class="fa-solid fa-heart me-2"></i>${feed.like}</button>
                            <button class="btn-topics"><i class="fa-solid fa-comment me-2"></i>${feed.comment_count}</button>
                        </div>
                    </div>
                </div>
            </div>`;
    };

    getDetailfeeds()

</script>

@endsection

