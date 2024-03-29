<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detect AdBlock using JavaScript | CodingNepal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div id="detect"></div>
    <div class="wrapper">
        <div class="content">
            <div class="warn-icon">
                <span class="icon"><i class="fas fa-exclamation"></i></span>
            </div>
            <h2>AdBlock Detected!</h2>
            <p>Our website is made possible by displaying ads to our visitors. Please supporting us by whitelisting our website.</p>
            <div class="btn">
                <div class="bg-layer"></div>
                <button>Okay, I'll Whitelist</button>
            </div>
        </div>
    </div>

    <script>
        const detect = document.querySelector("#detect");
        const wrapper = document.querySelector(".wrapper");
        const button = wrapper.querySelector("button");

        let adClasses = ["ad", "ads", "adsbox", "doubleclick", "ad-placement", "ad-placeholder", "adbadge", "BannerAd"];
        for (let item of adClasses) {
            detect.classList.add(item);
        }
        let getProperty = window.getComputedStyle(detect).getPropertyValue("display");
        if (!wrapper.classList.contains("show")) {
            getProperty == "none" ? wrapper.classList.add("show") : wrapper.classList.remove("show");
        }
        button.addEventListener("click", () => {
            wrapper.classList.remove("show");
        });
    </script>

</body>

</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        width: 100%;
        height: 100vh;
        background: linear-gradient(135deg, #9b27ca 0%, #9927cf 0%, #d33639 100%, #f92121 100%);
    }

    ::selection {
        color: #fff;
        background: #9b27ca;
    }

    .wrapper {
        position: absolute;
        max-width: 480px;
        top: 50%;
        left: 50%;
        width: 100%;
        padding: 40px 30px;
        background: #fff;
        border-radius: 15px;
        opacity: 0;
        pointer-events: none;
        transform: translate(-50%, -50%) scale(1.2);
        box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.06);
        transition: opacity 0.2s 0s ease-in-out,
            transform 0.2s 0s ease-in-out;
    }

    .wrapper.show {
        opacity: 1;
        pointer-events: auto;
        transform: translate(-50%, -50%) scale(1);
    }

    .wrapper .content,
    .content .warn-icon,
    .warn-icon .icon {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .wrapper .content {
        flex-direction: column;
    }

    .content .warn-icon {
        height: 115px;
        width: 115px;
        border-radius: 50%;
        background: linear-gradient(#9b27ca 0%, #9927cf 0%, #d33639 100%, #f92121 100%);
    }

    .warn-icon .icon {
        height: 100px;
        width: 100px;
        background: #fff;
        border-radius: inherit;
    }

    .warn-icon .icon i {
        background: linear-gradient(#9b27ca 0%, #9927cf 0%, #d33639 100%, #f92121 100%);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 50px;
    }

    .content h2 {
        margin-top: 35px;
        font-size: 32px;
    }

    .content p {
        font-size: 19px;
        text-align: center;
        margin-top: 20px;
    }

    .btn {
        height: 57px;
        width: 223px;
        margin-top: 30px;
        border-radius: 50px;
        position: relative;
        overflow: hidden;
    }

    .btn .bg-layer {
        height: 100%;
        width: 300%;
        position: absolute;
        left: -100%;
        background: -webkit-linear-gradient(135deg, #9b27ca, #d33639, #9b27ca, #d33639);
        transition: all 0.4s ease;
    }

    .btn:hover .bg-layer {
        left: 0;
    }

    .content button {
        position: relative;
        z-index: 1;
        height: 100%;
        width: 100%;
        background: none;
        font-size: 18px;
        border: none;
        outline: none;
        color: #fff;
        cursor: pointer;
    }
</style>