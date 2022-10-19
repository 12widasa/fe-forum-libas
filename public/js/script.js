let currentPage = 1;
let type = "";
let keyword = "";
const search = document.querySelector("#search");
const feeds = document.querySelector("#feeds");
const feedEmpty = document.querySelector("#feed-empty");

// Search feed
const searchFeed = (e) => {
    e.preventDefault();
    feeds.innerHTML = "";
    keyword = search.value;
    getAllFeeds();
};

// Filter by type
const getType = (value) => {
    feeds.innerHTML = "";
    type = value;
    getAllFeeds();
};

const getAllFeeds = () => {
    feedEmpty.innerHTML = "";
    const linkAllFeeds = `https://api-feed.pcctabessmg.xyz/api/fd/get_cari_feed_web.php?page=${currentPage}&keyword=${keyword}&type=${type}`;

    fetch(linkAllFeeds)
        .then((response) => {
            return response.json();
        })
        .then((responseJson) => {
            const data = responseJson.feed;
            if (data.length === 0) {
                feedEmpty.innerHTML +=
                    "<p class='text-white'>Tidak ada feed</p>";
            }
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
    const urlContent = "https://api-feed.pcctabessmg.xyz/files/";
    let avatar = feed.user_detail.avatar ?
        `https://api.pcctabessmg.xyz/${feed.user_detail.avatar}` :
        "/assets/images/img_profil_default.png";
    let content = feed.file ?
        `<img src="${urlContent}${feed.file}" class="img-content">` :
        "";
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
                        </div>
                    </div>
                </div>`;
};

window.addEventListener("scroll", () => {
    if (
        window.scrollY + window.innerHeight >=
        document.documentElement.scrollHeight
    ) {
        currentPage++;
        getAllFeeds();
    }
});

document.addEventListener("DOMContentLoaded", () => {
    getAllFeeds();
});