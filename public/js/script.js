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
                        </div>
                    </div>
                </div>`;
};

// Infinite scroll
window.addEventListener("scroll", () => {
    if (
        window.scrollY + window.innerHeight >=
        document.documentElement.scrollHeight
    ) {
        currentPage++;
        getAllFeeds();
    }
});

// Refresh data
const refresh = (e) => {
    e.preventDefault();
    feeds.innerHTML = "";
    getAllFeeds();
};

// Back To Top

//Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

// Button type active
// Get the container element
var btnContainer = document.getElementById("btn-group-highlight");

// Get all buttons with class="btn" inside the container
var btns = btnContainer.getElementsByClassName("btn-nav");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function () {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}

document.addEventListener("DOMContentLoaded", () => {
    getAllFeeds();
});
