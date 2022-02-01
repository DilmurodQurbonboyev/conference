<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error</title>
</head>

<body>
<div class="container">
    <div>
        <span class="left">404</span>
    </div>
    <div class="pulse"></div>
    <div>
        <i class="fas fa-exclamation-triangle"></i>
    </div>
    <div>
        <span class="right">Are you lost?</span>
    </div>
</div>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=IBM+Plex+Serif');
    @import url('https://use.fontawesome.com/releases/v5.0.8/css/all.css');

    html {
        box-sizing: border-box;
    }

    html,
    body {
        height: 100%;
    }

    body {
        margin: 0;
        background: #efefef;
        font-family: IBM Plex serif;
        font-size: 20px;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
        margin: 0;
        height: 100%;
        flex-direction: column;
    }

    @keyframes slideInFromLeft {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(0);
        }
    }

    @keyframes slideInFromRight {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(0);
        }
    }

    .left {
        color: #007bff;
        animation: 1.2s ease-out 0s 1 slideInFromLeft;
    }

    .right {
        animation: 1.2s ease-out 0s 1 slideInFromRight;
        color: #007bff;
    }

    i.fas {
        color: #007bff;
        font-size: 36px;
    }

    @media (min-width: 768px) {
        .left {
            font-size: 200px;
            display: block;
            margin-bottom: -30px;
        }
    }

    @media (max-width: 767px) {
        .left {
            font-size: 36px;
        }
    }

</style>
</body>

</html>
