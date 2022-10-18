// navbar
let answers = [];
let currentPage = 1;
let data = JSON.parse(localStorage.getItem("data"));
let filterType = [
    "ALL",
    "PEMILU",
    "ORMAS",
    "DPO",
    "3 PILAR",
    "LTC",
    "UMUM",
    "PPA",
    "POLSUS",
    "BANKOM",
    "OJOL",
    "ZEBRA TRAINING CENTER",
];

const getNavFeeds = () => {
    fetch(
        `http://api-feed.pcctabessmg.xyz/api/fd/get_cari_feed_web.php?page=1&keyword=Semarang&type=${filterType}`
        // `http://api-feed.pcctabessmg.xyz/api/fd/get_cari_feed_web.php?page=1&keyword=Semarang&type=BANKOM`
    )
        .then((response) => {
            return response.json();
        })
        .then((responseJson) => {
            console.log(responseJson.feed);
            const Navdata = responseJson.feed;
            // showListExam(data);
        })
        .catch((err) => {
            console.error(err);
        });
};

const getAnswer = (value) => {
    getNavFeeds();
};

// index

const feeds = document.querySelector("#feeds");
const getAllFeeds = () => {
    const linkAllFeeds = `http://api-feed.pcctabessmg.xyz/api/fd/get_all_feed_web.php?page=1&type=BANKOM`;

    fetch(linkAllFeeds)
        .then((response) => {
            return response.json();
        })
        .then((responseJson) => {
            const data = responseJson.feed;
            showFeed(data);
        })
        .catch((err) => {
            console.log(error);
        });
};

const showFeed = (Feed) => {
    Feed.forEach((item) => {
        var html = createFeed(item);
        feeds.innerHTML += html;
    });
};

const createFeed = (feed) => {
    const urlContent = "http://api-feed.pcctabessmg.xyz/files/";
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

    return `<div class="cards bg-dark-gray text-white">
                    <div class="d-flex align-items-center ">
                        <img src="${avatar}" class="logo-avatar">
                        <div class="d-flex flex-column ms-3">
                            <span>${feed.user_detail.name}</span>
                            <span>${date}</span>
                        </div>
                    </div>
                    <div>
                        <p class="mt-1">${feed.caption}</p>
                        ${content}
                        <div class="btn-group-topics">
                            <button class="btn-topics"><i class="fa-solid fa-heart me-2"></i>${feed.like}</button>
                            <button class="btn-topics"><i class="fa-solid fa-comment me-2"></i>${feed.comment_count}</button>
                            <button class="btn-topics"><i class="fa-solid fa-share me-2"></i>Bagikan</button>
                        </div>
                    </div>
                </div>`;
};

document.addEventListener("DOMContentLoaded", () => {
    getAllFeeds();
    getNavFeeds();
});
