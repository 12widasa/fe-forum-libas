@extends('layouts.app')

@section('content')

<section>
<style>
        html {
            height: 100%;
        }
        body {
            min-height: 100%;
        }
        a {
            text-decoration: none;
        }
        #app {
            height: 100%;
        }
        .back-all-feeds {
            color: white;
            font-size: 20px;
        }
        .cards {
            padding: 1.5rem;
        }
        .bg-dark-gray {
            background: #333333;
        }

        .bg-darkness {
            background-color: #1b1b1bf7;
        }

        .bg-rad {
            border-radius: 1rem;
        }

        .logo-avatar {
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }
        .img-content {
            width: 100%;
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
            /* padding: 2rem; */
            color: #B59D1F;
        }

        .bg p {
            font-size: 16px;
        }

        .comment-dots {
            font-size: 1.8rem;
        }
        .comment {
            font-size: 13rem;
        }

        .card-coments {
            background: #444444;
            border-radius: 3rem 3rem 0 0;
            padding: 2rem;
        }
        .all-comments {
            color: white;
        }
        .all-comments span {
            color: #818181;
            font-size: 12px
        }
        .all-comments p {
            font-weight: 400;
            font-size: 14px !important;
            margin-top: 5px;
            margin-bottom: 0;
        }
        .all-comments .nama {
            font-size: 13px;
        }

        /* creating css loader */

        #loading {
            width: 2rem;
            height: 2rem;
            border: 5px solid #b2b2b2c1;
            border-top: 6px solid #fedf2c;
            border-radius: 100%;
            margin: auto;
            display: none;
            animation: spin 1s infinite linear;
        }

        #comments, #content {
            display: none;
        }

        #loading.display {
            margin-top: 10rem;
        }

        #loading.display, #content.display, #comments.display {
            display: block;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
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
                height: 100%;
            }
            .cards {
            padding: 2rem;
            }
        }
    </style>

<nav class="d-flex bg-darkness">
    <a href="{{ url('/') }}">
        <div class="back-all-feeds d-flex align-items-center p-3">
            <i class="fa-solid fa-chevron-left me-3"></i>
            <span>Detail Feeds</span>
        </div>
    </a>
</nav>
    <div class="topics pt-4">
        <div id="loading"></div>
        <div id="content">
            <div class="bg rounded-5">
                <div id="detail-feeds">
                </div>
             <div class="card-coments" id="comments">
                 <div class="d-flex justify-content-between align-items-start">
                     <p>Semua Komentar</p><i class="fa-solid fa-comment-dots comment-dots"></i>
                 </div>
             </div>
            </div>
        </div>
    </div>

</section>

@endsection

@section('js')
<script type="text/javascript">

    const Detailfeeds = document.querySelector("#detail-feeds");
    const Comments = document.querySelector("#comments");
    const loader = document.querySelector("#loading");
    const content = document.querySelector("#content");
    const comments = document.querySelector("#comments");

    // showing loading
    function displayLoading() {
        loader.classList.add("display");
    }

    // hiding loading
    function hideLoading() {
        loader.classList.remove("display");
        comments.classList.add("display");
        content.classList.add("display");
    }

    const id = {!! json_encode($feedId) !!}

    const getDetailfeeds = () => {
        const linkDetailFeeds = `http://api-feed.pcctabessmg.xyz/api/fd/get_feed_by_id_web.php?id=${id}`;

        displayLoading();
        fetch(linkDetailFeeds)
            .then((response) => {
                return response.json();
            })
            .then((responseJson) => {
                hideLoading();
                const data = responseJson.feed[0]
                var html = showDetailfeeds(data);
                Detailfeeds.innerHTML += html;
            })
            .catch((err) => {
                console.log(error);
            });
    };

    const getComments = () => {
        const linkComment = `http://api-feed.pcctabessmg.xyz/api/comments/get_comments_web.php?idpost=${id}`;
        displayLoading();

        fetch(linkComment)
            .then((response) => {
                return response.json();
            })
            .then((responseJson) => {
                hideLoading();

                const data = responseJson.list?.[0]
                var html = responseJson.list.length > 0 ?
                showComments(data) : Comentsnone();
                Comments.innerHTML += html;
            })
            .catch((err) => {
                console.log(error);
            });
    };

    const Comentsnone = () => {
    return `<div class="text-center comment">
            <i class="fa-solid fa-comments"></i>
            <p>Belum Ada Komentar</p>
            </div>`
    }

    const showComments = (list) => {
        console.log(list);

    const urlContent = "https://api-feed.pcctabessmg.xyz/files/";
    let avatar = list.user_detail.avatar ?
        `https://api.pcctabessmg.xyz/${list.user_detail.avatar}` :
        "/assets/images/img_profil_default.png";
    let content = list.file ?
        `<img src="${urlContent}${list.file}" class="img-content">` :
        "";
    let date = moment(list.created_at).locale("id").fromNow();

    return `<div class="d-flex align-items-start all-comments">
                    <img src="${avatar}" class="logo-avatar me-2">
                    <div>
                        <span class="text-white nama">${list.user_detail.name}</span>
                        <p>${list.komentar}</p>
                        <span>${date}</span>
                    </div>
                </div>`


    };

    const showDetailfeeds = (feed) => {
                console.log(feed)

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

    return `<div class="text-white rounded-5 ">
                <div class="cards">
                    <div class="d-flex align-items-center ">
                        <img src="${avatar}" class="logo-avatar">
                        <div class="d-flex flex-column ms-3">
                            <span>${feed.user_detail.name}</span>
                            <span>${date}</span>
                        </div>
                    </div>
                    <div>
                        <p>${feed.caption}</p>
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
    getComments()

</script>

@endsection

