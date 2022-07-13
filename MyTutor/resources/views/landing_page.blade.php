<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MyTutor</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <!-- Styles -->
        <style>
            
            *,
            *:before,
            *:after {
            box-sizing: border-box;
            }

            html {
            scroll-behavior: smooth;
            --lightGrey: #fcfcfc;
            --pink: #b52b65;
            --darkPurple: #4f3961;
            --darkGrey: #585858;
            --darkerGrey: #6d6d6d;
            --yellow: #ffe75e;
            --white: #fff;
            --familyRoboto: "Roboto", sans-serif;
            --familyRobotoSlab: "Roboto Slab", sans-serif;
            --bold: bold;
            }

            @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }
            }

            body {
            margin: 0;
            background-color: var(--lightGrey);
            font-family: var(--familyRoboto);
            line-height: 1.6;
            padding-top: 80px;
            }

            ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
            }

            a {
            text-decoration: none;
            outline-color: var(--yellow);
            }

            /* Header */
            .header {
            padding: 1rem;
            background-color: var(--lightGrey);
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 10;
            }

            .nav-toggle {
            display: block;
            width: 24px;
            height: 24px;
            cursor: pointer;
            position: relative;
            border: none;
            background-color: transparent;
            }

            .hamburger {
            top: 10px;
            left: 0;
            display: block;
            }

            .hamburger,
            .hamburger::before,
            .hamburger::after {
            content: "";
            position: absolute;
            width: 24px;
            height: 2px;
            border-radius: 3px;
            background-color: var(--darkPurple);
            }

            .hamburger::before {
            top: -10px;
            left: 0;
            }

            .hamburger::after {
            left: 0;
            bottom: -12px;
            }

            [aria-expanded="true"] .hamburger,
            [aria-expanded="true"] .hamburger::before,
            [aria-expanded="true"] .hamburger::after {
            transition: all 0.3s ease-in-out;
            }

            [aria-expanded="true"] .hamburger::before {
            opacity: 0;
            transform: rotate(0deg) scale(0.2);
            }

            [aria-expanded="false"] .hamburger::before {
            opacity: 1;
            transform: rotate(0deg) scale(1);
            }

            [aria-expanded="true"] .hamburger {
            transform: rotate(-45deg);
            }

            [aria-expanded="true"] .hamburger::after {
            transform: rotate(90deg) translateX(-12px);
            }

            [aria-expanded="false"] .hamburger,
            [aria-expanded="false"] .hamburger::before,
            [aria-expanded="false"] .hamburger::after {
            transition: all 0.3s ease-in-out;
            }

            .nav {
            position: absolute;
            opacity: 0;
            visibility: hidden;
            top: -80px;
            left: -1rem;
            width: 50vw;
            height: 420px;
            transition: all 0.3s ease-in-out;
            transition-property: opacity, visibility, transform, background-color,
                box-shadow;
            background-color: #f4eeff;
            transform: translateX(-200%);
            }

            .logo {
            z-index: 2;
            }

            .nav-list {
            margin-top: 150px;
            }

            .nav.is-open {
            width: 70vw;
            height: 420px;
            top: -80px;
            margin-left: 0;
            opacity: 1;
            visibility: visible;
            transform: translateX(0);
            background-color: #f4eeff;
            box-shadow: 0 6px 20px rgba(96, 109, 175, 0.2);
            }

            .nav.is-open .nav-link {
            margin-top: 1rem;
            margin-left: 1rem;
            font-size: 1.1rem;
            }

            .nav-link {
            display: inline-block;
            padding: 0.5rem 1.2rem;
            margin-top: 1rem;
            color: var(--darkGrey);
            font-size: 1.1rem;
            }

            .nav-link-cta,
            .nav-link:hover {
            color: var(--pink);
            }

            @media (min-width: 46em) {
            .nav-toggle {
                display: none;
                pointer-events: none;
            }

            .nav-list {
                margin-top: 0;
                display: flex;
            }

            .nav {
                width: auto;
                height: auto;
                position: static;
                transform: translateX(0);
                opacity: 1;
                visibility: visible;
                background-color: initial;
            }
            }

            /* Intro */
            .intro {
            margin-top: 2rem;
            padding: 0 1em;
            }

            .intro__title {
            margin: 0;
            font-family: var(--familyRobotoSlab);
            font-size: 2.4rem;
            font-weight: normal;
            line-height: 1.3;
            color: var(--darkPurple);
            }

            .intro__subtitle {
            margin: 1.2rem 0;
            font-size: 0.9rem;
            color: var(--darkGrey);
            }

            .button {
            display: inline-block;
            padding: 0.7em 1.2em;
            font-size: 1rem;
            background-color: var(--pink);
            color: var(--white);
            border-radius: 3px;
            }

            .button:hover {
            background-color: #a5285c;
            }

            .intro__illustration {
            max-width: 100%;
            margin: 2rem 0;
            }

            @media (min-width: 32em) {
            .intro {
                margin: 2rem auto 0;
                display: grid;
                grid-template-columns: 1fr 1.2fr;
                grid-gap: 20px;
                grid-template-areas:
                ". img"
                "title img"
                "subtitle img"
                "button img"
                ". img";
            }

            .intro__title {
                grid-area: title;
                margin: 0;
            }

            .intro__subtitle {
                grid-area: subtitle;
                margin: 0;
            }

            .intro .button {
                grid-area: button;
                justify-self: start;
                align-self: start;
            }

            .intro__illustration {
                grid-area: img;
                align-self: center;
            }
            }

            @media (min-width: 60em) {
            .intro {
                width: 80%;
            }

            .intro__title {
                font-size: 4rem;
                margin: 0;
            }

            .intro__subtitle {
                font-size: 1.2rem;
            }

            .button {
                font-size: 1.1rem;
            }
            }

            /* Features */
            .features {
            padding: 0 1em;
            margin-top: 2.5rem;
            text-align: center;
            }

            .features__list li {
            padding: 1rem;
            }

            .features p {
            font-size: 0.9rem;
            }

            @media (min-width: 32em) {
            .features__list {
                display: flex;
                justify-content: space-around;
            }

            .features__list li {
                flex-basis: 350px;
            }
            }

            .features__list svg {
            display: block;
            margin: auto;
            max-width: 100%;
            margin-bottom: 1.5rem;
            }

            @media (min-width: 60em) {
            .features {
                width: 80%;
                margin-left: auto;
                margin-right: auto;
            }

            .features p {
                font-size: 1.1rem;
            }
            }

            .section__title {
            color: var(--darkPurple);
            font-weight: var(--bold);
            font-size: 1.85rem;
            line-height: 1.1;
            }

            @media (min-width: 60em) {
            .section__title {
                font-size: 2.25rem;
            }
            }

            /* Grow */
            .grow {
            padding: 0 1em;
            position: relative;
            margin-top: 2.5rem;
            }

            .grow svg {
            width: 100%;
            }

            .grow p {
            font-size: 0.9rem;
            }

            .blob {
            position: absolute;
            left: 0;
            top: 0;
            z-index: -1;
            }

            @media (min-width: 32em) {
            .grow {
                margin-top: 5rem;
                display: grid;
                grid-template-columns: minmax(200px, 550px) 40%;
                grid-template-areas:
                ". img"
                "title img"
                "p img"
                ". img";
            }

            .grow__title {
                grid-area: title;
            }

            .grow p {
                grid-area: p;
                margin: 0;
            }

            .grow > svg:first-of-type {
                grid-area: img;
            }

            .blob {
                top: -50px;
            }
            }

            @media (min-width: 60em) {
            .grow {
                width: 80%;
                margin-left: auto;
                margin-right: auto;
            }

            .grow p {
                font-size: 1.1rem;
            }
            }

            /* Feedback */
            .get-feedback {
            padding: 0 1em;
            }
            .get-feedback p {
            font-size: 0.9rem;
            }

            .get-feedback svg {
            width: 100%;
            }

            @media (min-width: 32em) {
            .get-feedback {
                display: grid;
                grid-gap: 24px;
                grid-template-columns: 50% minmax(200px, 550px);
                grid-template-areas:
                "img ."
                "img title"
                "img p"
                "img .";
            }

            .get-feedback__title {
                grid-area: title;
                margin-bottom: 0;
            }

            .get-feedback svg {
                grid-area: img;
            }

            .get-feedback p {
                grid-area: p;
                margin: 0;
            }
            }

            @media (min-width: 60em) {
            .get-feedback {
                width: 80%;
                margin-left: auto;
                margin-right: auto;
            }

            .get-feedback p {
                font-size: 1.1rem;
            }
            }

            /* Learning */
            .learning {
            padding: 0 1em;
            }

            .learning p {
            font-size: 0.9rem;
            }

            .learning svg {
            width: 100%;
            }

            @media (min-width: 32em) {
            .learning {
                display: grid;
                grid-template-columns: minmax(200px, 450px) 50%;
                grid-template-areas:
                ". img"
                "title img"
                "p img"
                ". img";
            }

            .learning__title {
                grid-area: title;
            }

            .learning p {
                grid-area: p;
                margin: 0;
            }

            .learning svg {
                grid-area: img;
            }
            }

            @media (min-width: 60em) {
            .learning {
                width: 80%;
                margin-left: auto;
                margin-right: auto;
            }

            .learning p {
                font-size: 1.1rem;
            }
            }

            /* get-started */
            .get-started li {
            width: 250px;
            height: 250px;
            padding: 2rem;
            margin: 1.5rem auto;
            background-image: url(https://res.cloudinary.com/alexandracaulea/image/upload/v1583497341/circle-shape_fbgxd9.svg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            }

            .get-started strong {
            font-size: 2.2rem;
            }

            .get-started p {
            margin: 0;
            margin-top: 5px;
            font-size: 0.9rem;
            }

            @media (min-width: 45em) {
            .get-started {
                margin-top: 100px;
            }
            .get-started ul {
                display: flex;
                justify-content: space-around;
            }

            .get-started li {
                width: 320px;
                height: 320px;
                background-size: initial;
            }
            }

            @media (min-width: 60em) {
            .get-started {
                width: 80%;
                margin-left: auto;
                margin-right: auto;
            }

            .get-started p {
                font-size: 1.1rem;
            }
            }

            /* Start learning */
            .start-learning {
            position: relative;
            margin-top: 5rem;
            margin-bottom: 5rem;
            text-align: center;
            }

            .start-learning .button {
            margin: 2rem 0;
            }

            .video-learning {
            width: 80vw;
            margin: 0 auto;
            max-width: 800px;
            position: relative;
            background-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-size: 0;
            border-radius: 3px;
            }

            .video-learning:fullscreen {
            max-width: none;
            width: 100%;
            }

            .video-learning:-webkit-full-screen {
            max-width: none;
            width: 100%;
            }

            .video {
            width: 100%;
            object-fit: cover;
            cursor: pointer;
            }

            .video-button {
            max-width: 50px;
            padding: 0.5rem;
            background: none;
            border: 0;
            line-height: 1;
            color: var(--white);
            text-align: center;
            cursor: pointer;
            }

            .video-button:hover {
            background-color: var(--pink);
            }

            .video-slider {
            width: 10px;
            height: 30px;
            }

            .video-controls {
            display: flex;
            flex-wrap: wrap;
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.3);
            }

            .video-learning .progress {
            height: 10px;
            }

            .video-controls > * {
            flex: 1;
            }

            .progress {
            display: flex;
            flex-basis: 100%;
            height: 5px;
            background-color: rgba(0, 0, 0, 0.5);
            cursor: ew-resize;
            }

            .progress-fill {
            width: 0%;
            background-color: var(--pink);
            flex: 0;
            flex-basis: 0%;
            }

            .blob-learning {
            width: 100%;
            position: absolute;
            top: 0px;
            left: 0;
            z-index: -1;
            height: 500px;
            }

            @media (min-width: 32em) {
            .blob-learning {
                top: -100px;
                height: 800px;
            }
            }

            /* Footer */
            .footer {
            padding: 1em;
            margin: 2rem auto 0;
            background-color: #f8f8f8;
            }

            .footer-nav {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(50px, 100px));
            }

            .footer-title {
            text-transform: uppercase;
            font-size: 0.8rem;
            color: var(--darkerGrey);
            letter-spacing: 1px;
            }

            .footer-link {
            font-size: 0.85rem;
            font-weight: var(--bold);
            color: inherit;
            }

            .footer-link:hover {
            text-decoration: underline;
            }

            .footer-newsletter {
            margin: 2rem auto;
            text-align: center;
            }

            .footer-newsletter p {
            font-size: 0.95rem;
            line-height: 1.5;
            color: var(--darkGrey);
            }

            .footer-email {
            display: block;
            width: 100%;
            padding: 0.35rem 1rem;
            font-family: inherit;
            font-size: 1rem;
            line-height: 1.6;
            box-shadow: none;
            color: var(--darkGrey);
            background-color: var(--white);
            border: 2px solid rgba(79, 57, 97, 0.141);
            border-radius: 3px;
            outline-color: var(--yellow);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            }

            .form-error-message {
            display: block;
            text-align: left;
            color: #cc3648;
            visibility: hidden;
            }

            .form-error .footer-email {
            border-color: #cc3648;
            }

            .form-error .form-error-message {
            visibility: visible;
            }

            .button-email {
            margin-top: 1rem;
            border: none;
            width: 100%;
            cursor: pointer;
            box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.3),
                0 2px 4px 0 rgba(14, 30, 37, 0.12);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            }

            .footer-social {
            display: flex;
            justify-content: center;
            align-items: center;
            }

            .footer-social a {
            display: inline-block;
            padding: 0.5rem;
            }

            .footer-social svg {
            vertical-align: middle;
            }

            .copyright {
            flex-basis: 100%;
            text-align: center;
            color: var(--darkerGrey);
            }

            .dotted-link {
            color: #a94e76;
            border-bottom: 1px dashed #a94e76;
            }

            @media (min-width: 32em) {
            .footer-newsletter {
                text-align: left;
            }

            .footer-form {
                display: flex;
                position: relative;
            }

            .footer-email {
                width: auto;
            }

            .button-email {
                width: auto;
                margin: 0 0 0 1rem;
            }

            .form-error-message {
                position: absolute;
                top: 44px;
            }

            .footer-social {
                margin-top: 2rem;
            }
            }
            @media (min-width: 45em) {
            .footer {
                padding: 2em 1em;
            }

            .footer-container {
                display: grid;
                grid-gap: 20px;
                grid-template-areas: "nav newsletter" "social-links social-links" "copyright copyright";
            }

            .footer-nav {
                grid-area: nav;
                grid-template-columns: repeat(3, 1fr);
                grid-gap: 10px;
            }

            .footer-title {
                margin-top: 0;
            }

            .footer-newsletter {
                margin: 0;
                grid-area: newsletter;
            }

            .footer-social {
                grid-area: social-links;
            }

            .copyright {
                grid-area: copyright;
                margin: 0;
            }
            }

            @media (min-width: 60em) {
            .footer-container {
                max-width: 80%;
                margin: auto;
            }
            }

            .arrow-1,
            .arrow-2 {
            margin-top: 20px;
            height: 90px;
            background-image: url(https://res.cloudinary.com/alexandracaulea/image/upload/v1583497341/line-1_dt5tua.svg);
            background-repeat: no-repeat;
            background-position: center;
            }

            .arrow-2 {
            margin-top: -20px;
            }

            @media (min-width: 32em) {
            .arrow-1,
            .arrow-2 {
                height: 184px;
                background-repeat: no-repeat;
                background-position: center;
            }

            .arrow-1 {
                margin-top: 70px;
                background-image: url(https://res.cloudinary.com/alexandracaulea/image/upload/v1583497341/arrow-1-sm_kkfsxp.svg);
            }

            .arrow-2 {
                background-image: url(https://res.cloudinary.com/alexandracaulea/image/upload/v1583497341/arrow-2-sm_xtrpm5.svg);
            }
            }

            @media (min-width: 60em) {
            .arrow-1,
            .arrow-2 {
                height: 283px;
            }

            .arrow-1 {
                margin-top: 110px;
                background-image: url(https://res.cloudinary.com/alexandracaulea/image/upload/v1583497341/arrow-1-lg_jhrqpv.svg);
            }

            .arrow-2 {
                background-image: url(https://res.cloudinary.com/alexandracaulea/image/upload/v1583497341/arrow-2-lg_cjykcq.svg);
            }
            }

            .visuallyhidden {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            white-space: nowrap;
            width: 1px;
            }
            
        </style>

        <script>
            const navBar = document.querySelector(".nav");
            const navButton = document.querySelector(".nav-toggle");
            const counterElements = document.querySelectorAll(".get-started .counter");
            const footerForm = document.querySelector(".footer-form");
            const emailForm = footerForm.querySelector(".footer-email");
            const videoContainer = document.querySelector(".video-learning");
            const video = videoContainer.querySelector(".video");
            const progress = videoContainer.querySelector(".progress");
            const progressBar = videoContainer.querySelector(".progress-fill");
            const togglePlayButton = videoContainer.querySelector(".toggle");
            const skipButtons = videoContainer.querySelectorAll("[data-skip]");
            let mousedown = false;

            // Hamburger Navigation
            function toggleNavigation() {
            if (navBar.classList.contains("is-open")) {
                this.setAttribute("aria-expanded", false);
                navBar.classList.remove("is-open");
            } else {
                navBar.classList.add("is-open");
                this.setAttribute("aria-expanded", true);
            }
            }

            // Newsletter form submit
            function createAlert(elem, msg) {
            if (footerForm.querySelector("span.form-error-message")) return;
            const alertElement = document.createElement(elem);
            alertElement.setAttribute("role", "alert");
            alertElement.classList.add("form-error-message");
            alertElement.textContent = msg;
            emailForm.insertAdjacentElement("afterend", alertElement);
            }

            function handleFormSubmit(e) {
            const pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (!pattern.test(emailForm.value.trim())) {
                e.preventDefault();
                footerForm.classList.add("form-error");
                createAlert("span", "Email is not valid");
            }
            }

            // Video player
            function togglePlay() {
            if (video.paused) {
                video.play();
            } else {
                video.pause();
            }
            }

            function changeButton() {
            togglePlayButton.textContent = this.paused ? "►" : "❚❚";
            }

            function skipSeconds() {
            video.currentTime += +this.dataset.skip;
            }

            function handleProgressBar() {
            const percent = (video.currentTime / video.duration) * 100;
            progressBar.style.flexBasis = `${percent}%`;
            }

            function handleProgressBarProgress(e) {
            const progressTime = (e.offsetX / progress.offsetWidth) * video.duration;
            video.currentTime = progressTime;
            }

            // Counters
            function counter(target, start, stop) {
            target.innerText = 0.1;
            const counterInterval = setInterval(() => {
                start += 0.1;
                const valueConverted = (Math.round(start * 100) / 100).toFixed(1);
                target.innerText = valueConverted;
                if (valueConverted == stop) {
                clearInterval(counterInterval);
                }
            }, 30);
            }

            function obCallBack(entries) {
            entries.forEach((entry) => {
                const { target } = entry;
                const stopValue = target.innerText;
                const startValue = 0;
                if (!entry.isIntersecting) return;
                counter(target, startValue, stopValue);
                counterObserver.unobserve(target);
            });
            }

            const counterObserver = new IntersectionObserver(obCallBack, { threshold: 1 });
            counterElements.forEach((counterElem) => counterObserver.observe(counterElem));

            // Event Listeners
            navButton.addEventListener("click", toggleNavigation);
            footerForm.addEventListener("submit", handleFormSubmit);
            video.addEventListener("click", togglePlay);
            video.addEventListener("play", changeButton);
            video.addEventListener("pause", changeButton);
            video.addEventListener("timeupdate", handleProgressBar);
            togglePlayButton.addEventListener("click", togglePlay);
            progress.addEventListener("click", handleProgressBarProgress);
            progress.addEventListener(
            "mousemove",
            (e) => mousedown && handleProgressBarProgress(e)
            );
            progress.addEventListener("mousedown", () => (mousedown = true));
            progress.addEventListener("mouseup", () => (mousedown = false));
            skipButtons.forEach((button) => button.addEventListener("click", skipSeconds));


            Resources
        </script>

        </head>
        
        <body>
        @if (session('save'))
        <script>
            alert("Registeration Was Success");
        </script>
        @endif
        @if (session('error'))
        <script>
            alert("Registeration Was Failed");
        </script>
        @endif
        <header id="header" class="header">
            <img src="{{ URL::to('/assets/images/logo.jpg') }}" class="logo" alt="logo" id="header-img" />
            <nav id="nav-bar" class="nav">
                <ul class="nav-list">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('login_page') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('register_page') }}">Register</a>
                </li>
                </ul>
            </nav>
            </header>
            <main>
            <section class="intro">
                <h1 class="intro__title">
                MyTutor
                </h1>
                <p class="intro__subtitle">
                Visiting places in the world, getting a new job, or just looking for a way to practice your practice your programming skills - this is
                the perfect place for you.
                </p>
                <a href="{{ url('register_page') }}" class="button">Get Started</a>
                <img class="intro__illustration" src="https://res.cloudinary.com/alexandracaulea/image/upload/v1583497233/intro-illustration_qneuer.svg" alt="" />
            </section>
            <section id="features" class="features">
                <h2 class="visuallyhidden">Features</h2>
                <ul class="features__list">
                <li>
                    <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <use xlink:href="#headphones-icon"></use>
                    </svg>
                    <p><strong>Engaging audio content</strong> on a wide range on topics.</p>
                </li>
                <li>
                    <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <use xlink:href="#video-icon"></use>
                    </svg>
                    <p><strong>400+ video lessons</strong> from professional tutors.</p>
                </li>
                <li>
                    <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <use xlink:href="#email-icon"></use>
                    </svg>
                    <p><strong>Weekly tips and advice</strong> to help you improve your programming skills.</p>
                </li>
                </ul>
            </section>
            <section id="how-it-works" class="grow">
                <h2 class="section__title grow__title">Grow Together</h2>
                <p>
                Start a meaningful conversation in our community platform, ask questions when you’re stuck and get help from a
                real person. Get answers fast, no matter your question.
                </p>
                <svg width="174" height="341" viewBox="0 0 174 341" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <use xlink:href="#grow-illustration"></use>
                </svg>
                <svg width="898" height="500" viewBox="0 0 898 500" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="blob">
                <use xlink:href="#grow-blob"></use>
                </svg>
            </section>
            <div class="arrow-1"></div>
            <section class="get-feedback">
                <h2 class="section__title get-feedback__title">
                Get quality feedback
                </h2>
                <p>
                We are here for you. Participate in the weekly live events, get the tools and resources you need, and find
                friendships with people that have the same goal as you.
                </p>
                <svg width="519" height="366" viewBox="0 0 519 366" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <use xlink:href="#feedback"></use>
                </svg>
            </section>
            <div class="arrow-2"></div>
            <section class="learning">
                <h2 class="section__title learning__title">
                Start learning immediately
                </h2>
                <p>
                It takes no time to start learning with us, This means, once you sign up for an account, you can start
                learning immediately and get access to our community.
                </p>
                <svg width="598" height="323" viewBox="0 0 598 323" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <use xlink:href="#learning"></use>
                </svg>
            </section>
            <div id="get-started" class="get-started">
                <ul>
                <li>
                    <svg width="80" height="56" viewBox="0 0 80 56" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <use xlink:href="#user"></use>
                    </svg>
                    <p><strong class="counter community-members">1.2</strong><strong>K+</strong></p>
                    <p>Community Members</p>
                </li>
                <li>
                    <svg width="56" height="65" viewBox="0 0 56 65" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <use xlink:href="#article"></use>
                    </svg>
                    <p><strong class="counter number-of-pages">1.9</strong><strong>K+</strong></p>
                    <p>Pages with content for you to learn</p>
                </li>
                </ul>
            </div>
            <section class="start-learning">
                <h2 class="section__title">
                Ready To Sharpen Your Programming Skills?
                </h2>
                <a href="#" class="button">Get Started</a>
            </section>
            </main>
            <footer class="footer">
            <div class="footer-container">
                <nav class="footer-nav">
                <div>
                    <h3 class="footer-title">Resources</h3>
                    <ul>
                    <li><a class="footer-link" href="#">Blog</a></li>

                    <li><a class="footer-link" href="#">Community</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer-title">Company</h3>
                    <ul>
                    <li><a class="footer-link" href="#">About</a></li>
                    <li><a class="footer-link" href="#">Our Mission</a></li>
                    <li><a class="footer-link" href="#">Our Team</a></li>
                    <li><a class="footer-link" href="#">Careers</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer-title">Contact Us</h3>
                    <ul>
                    <li><a class="footer-link" href="#">Sales</a></li>
                    <li><a class="footer-link" href="#">Support</a></li>
                    </ul>
                </div>
                </nav>
                <div class="footer-newsletter" id="subscribe">
                <a href="#"><img src="{{ URL::to('/assets/images/logo.jpg') }}" width="169" height="33" viewBox="0 0 169 33" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Learn Programming">
                    <img xlink:href="#footer__logo"></use>
                    </svg></a>
                <p>
                    Stay up to date with all MyTutor news by subscribing to our newsletter.
                </p>
                <form action="https://www.freecodecamp.com/email-submit" method="GET" id="form" class="footer-form">
                    <label for="email" class="visuallyhidden">Email address</label>
                    <input type="email" name="email" class="footer-email" placeholder="Email Address" id="email" spellcheck="false" aria-required="true" aria-invalid="false" />
                    <input type="submit" id="submit" class="button button-email" value="Subscribe" />
                </form>
                </div>
                <ul class="footer-social">
                <li>
                    <a href="mailto:alexandra.caulea@gmail.com?Subject=Hi%20Alexandra" rel="noopener noreferrer"><svg width="23" height="18" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <use xlink:href="#contact-email-icon"></use>
                    </svg><span class="visuallyhidden">email</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/alexandra__caulea/" target="_blank" rel="noopener noreferrer">
                    <svg width="20" height="20" viewBox="0 0 20 20" aria-hidden="true" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.538 4.66203C16.538 5.32484 16.0006 5.86203 15.338 5.86203C14.6753 5.86203 14.138 5.32484 14.138 4.66203C14.138 3.99922 14.6753 3.46203 15.338 3.46203C16.0008 3.46203 16.538 3.99922 16.538 4.66203ZM10 13.3333C8.15906 13.3333 6.66672 11.8409 6.66672 10C6.66672 8.15906 8.15906 6.66672 10 6.66672C11.8409 6.66672 13.3333 8.15906 13.3333 10C13.3333 11.8409 11.8409 13.3333 10 13.3333ZM10 4.86484C7.16391 4.86484 4.86484 7.16391 4.86484 10C4.86484 12.8361 7.16391 15.1352 10 15.1352C12.8361 15.1352 15.1352 12.8361 15.1352 10C15.1352 7.16391 12.8361 4.86484 10 4.86484ZM10 1.80187C12.6702 1.80187 12.9864 1.81203 14.0408 1.86016C15.0158 1.90469 15.5453 2.0675 15.8977 2.20453C16.3644 2.38594 16.6975 2.60266 17.0475 2.95266C17.3975 3.3025 17.6142 3.63563 17.7956 4.1025C17.9325 4.45484 18.0955 4.98437 18.14 5.95937C18.1881 7.01391 18.1983 7.33016 18.1983 10.0003C18.1983 12.6705 18.1881 12.9867 18.14 14.0411C18.0955 15.0161 17.9327 15.5456 17.7956 15.898C17.6142 16.3647 17.3975 16.6978 17.0475 17.0478C16.6977 17.3978 16.3645 17.6145 15.8977 17.7959C15.5453 17.9328 15.0158 18.0958 14.0408 18.1403C12.9864 18.1884 12.6702 18.1986 10 18.1986C7.32969 18.1986 7.01344 18.1884 5.95906 18.1403C4.98406 18.0958 4.45453 17.933 4.10219 17.7959C3.63547 17.6145 3.30234 17.3978 2.95234 17.0478C2.6025 16.698 2.38563 16.3648 2.20422 15.898C2.06734 15.5456 1.90437 15.0161 1.85984 14.0411C1.81172 12.9866 1.80156 12.6703 1.80156 10.0003C1.80156 7.33016 1.81172 7.01391 1.85984 5.95937C1.90437 4.98437 2.06719 4.45484 2.20422 4.1025C2.38563 3.63578 2.60234 3.30266 2.95234 2.95266C3.30219 2.60266 3.63531 2.38594 4.10219 2.20453C4.45453 2.06766 4.98406 1.90469 5.95906 1.86016C7.01359 1.81203 7.32984 1.80187 10 1.80187ZM10 0C7.28422 0 6.94359 0.0115625 5.87703 0.0601562C4.81266 0.10875 4.08562 0.277812 3.44969 0.525C2.79203 0.780469 2.23437 1.1225 1.67844 1.67844C1.1225 2.23437 0.780469 2.79203 0.525 3.44969C0.277812 4.08578 0.10875 4.81266 0.0601562 5.87703C0.0115625 6.94359 0 7.28422 0 10C0 12.7158 0.0115625 13.0564 0.0601562 14.123C0.10875 15.1873 0.277812 15.9142 0.525 16.5503C0.780469 17.208 1.1225 17.7656 1.67844 18.3216C2.23437 18.8775 2.79203 19.2194 3.44969 19.475C4.08578 19.7222 4.81266 19.8912 5.87703 19.9398C6.94359 19.9884 7.28422 20 10 20C12.7158 20 13.0564 19.9884 14.123 19.9398C15.1873 19.8912 15.9142 19.7222 16.5503 19.475C17.208 19.2194 17.7656 18.8775 18.3216 18.3216C18.8775 17.7656 19.2194 17.208 19.475 16.5503C19.7222 15.9142 19.8912 15.1873 19.9398 14.123C19.9884 13.0564 20 12.7158 20 10C20 7.28422 19.9884 6.94359 19.9398 5.87703C19.8912 4.81266 19.7222 4.08578 19.475 3.44969C19.2194 2.79203 18.8775 2.23437 18.3216 1.67844C17.7656 1.1225 17.208 0.780625 16.5503 0.525C15.9142 0.277812 15.1873 0.10875 14.123 0.0601562C13.0564 0.0115625 12.7158 0 10 0Z" fill="url(#paint0_radial)" />
                        <defs>
                        <radialGradient id="paint0_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(2.98611 20.0694) scale(25.555)">
                            <stop offset="0" stop-color="#FFB140" />
                            <stop offset="0.2559" stop-color="#FF5445" />
                            <stop offset="0.599" stop-color="#FC2B82" />
                            <stop offset="1" stop-color="#8E40B7" />
                        </radialGradient>
                        </defs>
                    </svg>
                    <span class="visuallyhidden">Instagram</span>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/alexandracaulea" target="_blank" rel="noopener noreferrer"><svg width="20" height="16" viewBox="0 0 20 16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                        <use xlink:href="#twitter-icon"></use>
                    </svg>
                    <span class="visuallyhidden">Twitter</span></a>
                </li>
                </ul>

            </div>
            </footer>
            <svg aria-hidden="true" focusable="false" style="display: none;">
            <symbol id="headphones-icon" viewBox="0 0 116 116">
                <path d="M54 115c29.271 0 53-23.505 53-52.5S83.271 10 54 10 1 33.505 1 62.5 24.729 115 54 115z" fill="#F2F2F2" />
                <path d="M58 116c-.612 0-1.23-.01-1.837-.029l.014-.44c.871.027 1.76.034 2.636.022l.006.441c-.273.004-.546.006-.819.006zm3.472-.102l-.026-.441a57.812 57.812 0 002.627-.214l.046.438c-.877.092-1.767.165-2.647.217zm-7.96-.069a58.196 58.196 0 01-2.642-.263l.053-.438c.867.107 1.75.194 2.623.261l-.034.44zm13.24-.485l-.066-.436c.867-.131 1.74-.284 2.596-.454l.086.432a56.77 56.77 0 01-2.615.458zm-18.51-.161a59.032 59.032 0 01-2.607-.504l.093-.431a56.73 56.73 0 002.588.5l-.074.435zm23.718-.874l-.106-.428c.851-.211 1.707-.443 2.543-.691l.126.423c-.843.25-1.706.484-2.563.696zm-28.906-.253a57.235 57.235 0 01-2.55-.742l.133-.42c.833.263 1.684.511 2.53.736l-.114.426zm33.996-1.257l-.144-.417a57.617 57.617 0 002.468-.922l.164.409c-.819.328-1.655.641-2.488.93zm-39.066-.346a56.2 56.2 0 01-2.476-.976l.171-.406a57.9 57.9 0 002.457.968l-.152.414zm43.99-1.625l-.182-.401c.793-.36 1.59-.745 2.37-1.143l.2.393c-.785.401-1.588.788-2.387 1.151zm-48.894-.439a59.598 59.598 0 01-2.374-1.199l.208-.389c.774.413 1.566.813 2.356 1.19l-.19.398zm53.614-1.973l-.219-.383c.76-.434 1.52-.89 2.256-1.356l.236.373c-.742.469-1.507.929-2.273 1.366zm-58.304-.533a57.96 57.96 0 01-2.253-1.411l.243-.369c.732.483 1.485.954 2.236 1.401l-.226.379zm62.786-2.302l-.253-.362c.716-.5 1.43-1.024 2.124-1.557l.269.35a58.214 58.214 0 01-2.14 1.569zm-67.224-.621a57.961 57.961 0 01-2.114-1.611l.275-.344a58.378 58.378 0 002.098 1.598l-.26.357zm71.43-2.613l-.284-.337a58.545 58.545 0 001.975-1.744l.3.323a57.973 57.973 0 01-1.99 1.758zm-75.582-.702a58.933 58.933 0 01-1.957-1.795l.305-.319a58.212 58.212 0 001.943 1.782l-.29.332zm79.48-2.903l-.314-.31a58.693 58.693 0 001.809-1.917l.328.295a59.303 59.303 0 01-1.823 1.932zm-83.31-.774c-.61-.64-1.21-1.301-1.787-1.965l.334-.29c.572.66 1.168 1.316 1.772 1.95l-.32.305zm86.865-3.171l-.34-.28a58.938 58.938 0 001.627-2.075l.353.264a58.33 58.33 0 01-1.64 2.09zm-90.345-.838a58.08 58.08 0 01-1.6-2.118l.359-.257a58.04 58.04 0 001.586 2.102l-.345.273zm93.527-3.417l-.365-.248a57.38 57.38 0 001.432-2.216l.376.231a58.1 58.1 0 01-1.443 2.233zm-96.626-.889c-.48-.737-.951-1.495-1.398-2.254l.38-.224c.443.753.91 1.506 1.387 2.237l-.37.241zm99.408-3.641l-.386-.213c.424-.767.835-1.553 1.223-2.34l.396.196a57.545 57.545 0 01-1.233 2.357zm-102.1-.927a58.053 58.053 0 01-1.185-2.371l.399-.188c.372.79.768 1.58 1.176 2.352l-.39.207zm104.456-3.841l-.404-.177a57.8 57.8 0 001.003-2.443l.412.158a58.596 58.596 0 01-1.011 2.462zM4.439 80.292a57.874 57.874 0 01-.963-2.468l.415-.15c.298.82.62 1.643.955 2.448l-.407.17zm108.623-4.017l-.419-.139c.276-.83.535-1.677.772-2.52l.425.12c-.239.849-.501 1.703-.778 2.539zM2.627 75.308a57.93 57.93 0 01-.733-2.552l.426-.112c.223.847.467 1.699.728 2.533l-.421.131zM114.5 71.163l-.43-.1c.197-.85.378-1.718.537-2.58l.433.08a56.648 56.648 0 01-.54 2.6zm-113.22-.99a58.018 58.018 0 01-.495-2.61l.435-.072c.143.864.308 1.734.491 2.59l-.431.091zm114.181-4.231l-.437-.06c.118-.864.218-1.745.297-2.618l.44.04a58.96 58.96 0 01-.3 2.638zM.411 64.935a58.662 58.662 0 01-.255-2.643l.44-.033c.064.875.15 1.757.252 2.624l-.438.052zm115.529-4.28l-.44-.02c.039-.874.059-1.76.059-2.635H116c0 .88-.02 1.774-.06 2.654zM.023 59.638a59.528 59.528 0 01-.014-2.655l.44.007a58.207 58.207 0 00.015 2.636l-.441.012zm115.533-2.254a59.395 59.395 0 00-.087-2.635l.44-.024c.049.88.079 1.773.088 2.654l-.441.005zM.554 54.358l-.44-.027c.055-.882.131-1.772.226-2.646l.438.048a58.23 58.23 0 00-.224 2.625zm114.709-2.235c-.088-.87-.198-1.749-.326-2.615l.436-.064c.129.872.24 1.759.329 2.635l-.439.044zM1.122 49.12l-.436-.067c.135-.873.292-1.752.467-2.615l.432.088a57.517 57.517 0 00-.463 2.594zm113.37-2.209a58.142 58.142 0 00-.564-2.574l.428-.104c.208.854.399 1.727.569 2.594l-.433.084zM2.167 43.956l-.428-.107c.214-.855.451-1.716.705-2.56l.422.126a57.56 57.56 0 00-.7 2.54zm111.078-2.164a56.235 56.235 0 00-.799-2.511l.417-.144c.287.833.558 1.684.806 2.53l-.424.125zm-109.56-2.89l-.416-.146c.293-.833.61-1.671.94-2.49l.41.166a57.242 57.242 0 00-.934 2.47zm107.848-2.093a58.113 58.113 0 00-1.025-2.422l.403-.18c.36.8.707 1.621 1.032 2.44l-.41.162zM5.664 34.007l-.4-.184a58.01 58.01 0 011.165-2.39l.392.201c-.402.779-.79 1.577-1.157 2.373zm103.71-1.992a58.155 58.155 0 00-1.243-2.32l.384-.216a59.04 59.04 0 011.252 2.336l-.393.2zM8.085 29.318l-.382-.22a58.29 58.29 0 011.38-2.273l.37.237a57.735 57.735 0 00-1.368 2.256zm98.698-1.883a57.411 57.411 0 00-1.451-2.196l.362-.252c.501.722.993 1.466 1.462 2.214l-.373.235zm-95.859-2.563l-.36-.254c.508-.721 1.04-1.44 1.58-2.136l.349.27a58.06 58.06 0 00-1.569 2.12zm92.858-1.762a58.165 58.165 0 00-1.645-2.057l.338-.284a58.972 58.972 0 011.658 2.073l-.351.268zm-89.626-2.404l-.336-.286c.57-.67 1.165-1.337 1.768-1.983l.322.301a58.522 58.522 0 00-1.754 1.968zm86.243-1.634a57.893 57.893 0 00-1.826-1.9l.31-.312c.625.62 1.244 1.264 1.841 1.914l-.325.298zm-82.648-2.22l-.308-.314a58.36 58.36 0 011.94-1.813l.294.329c-.652.581-1.3 1.187-1.925 1.799zm78.91-1.494c-.648-.59-1.319-1.17-1.992-1.727l.282-.34c.677.561 1.353 1.146 2.007 1.74l-.296.327zm-74.98-2.014l-.279-.342a58.672 58.672 0 012.096-1.629l.263.355a58.224 58.224 0 00-2.08 1.616zm70.92-1.347a58.448 58.448 0 00-2.143-1.538l.249-.364a58.521 58.521 0 012.158 1.55l-.265.352zm-66.69-1.789l-.246-.365c.73-.492 1.482-.973 2.234-1.43l.23.376c-.747.455-1.493.932-2.218 1.42zM88.247 9.02a57.794 57.794 0 00-2.275-1.337l.214-.386c.77.43 1.542.883 2.293 1.347l-.232.376zm-57.84-1.546l-.211-.387a58.279 58.279 0 012.354-1.22l.193.397c-.783.383-1.569.79-2.336 1.21zm53.23-1.022a57.677 57.677 0 00-2.39-1.123l.18-.403c.806.356 1.616.737 2.407 1.13l-.197.396zm-48.505-1.29l-.176-.404c.807-.35 1.633-.685 2.454-.997l.157.412a57.38 57.38 0 00-2.435.99zm43.676-.845a57.383 57.383 0 00-2.484-.898l.14-.418c.839.281 1.68.586 2.504.905l-.16.411zM40.051 3.295l-.137-.42a57.699 57.699 0 012.542-.768l.118.425c-.842.233-1.69.49-2.523.763zm33.756-.656c-.841-.24-1.7-.463-2.55-.664l.1-.43c.859.203 1.723.428 2.57.67l-.12.424zm-28.678-.753l-.099-.43c.86-.197 1.735-.376 2.602-.532l.078.434c-.86.155-1.729.333-2.581.528zm23.55-.456a57.53 57.53 0 00-2.6-.427l.06-.436c.874.122 1.755.267 2.621.43l-.081.433zM50.314.95l-.059-.437a58.223 58.223 0 012.64-.291l.038.44c-.872.075-1.753.172-2.62.288zM63.46.697A58.036 58.036 0 0060.833.51l.021-.441a58.62 58.62 0 012.648.189l-.041.439zM55.563.492l-.019-.44C56.354.016 57.181 0 58 0h.2l-.002.441H58c-.813 0-1.633.017-2.437.05z" fill="#3F3D56" />
                <path d="M80.047 63.675h3.017a6.409 6.409 0 016.409 6.41v.7a6.41 6.41 0 01-6.41 6.409h-3.016V63.675z" fill="#5F6CAF" />
                <path d="M79.303 61.443h2.728a2.728 2.728 0 012.729 2.728v12.527a2.728 2.728 0 01-2.729 2.728h-2.728V61.443zM35.426 77.194h-3.017A6.409 6.409 0 0126 70.784v-.7a6.409 6.409 0 016.41-6.409h3.016v13.519z" fill="#5F6CAF" />
                <path d="M36.17 79.426H33.44a2.729 2.729 0 01-2.728-2.728V64.17a2.729 2.729 0 012.728-2.728h2.729v17.983z" fill="#5F6CAF" />
                <path d="M83.272 64.616h-2C81.272 50.491 70.806 39 57.942 39 45.077 39 34.61 50.491 34.61 64.616h-2C32.61 49.39 43.974 37 57.94 37c13.968 0 25.331 12.389 25.331 27.616z" fill="#5F6CAF" />
            </symbol>
            <symbol id="video-icon" viewBox="0 0 116 116">
                <path d="M54 115c29.271 0 53-23.505 53-52.5S83.271 10 54 10 1 33.505 1 62.5 24.729 115 54 115z" fill="#F2F2F2" />
                <path d="M58 116c-.612 0-1.23-.01-1.837-.029l.014-.44c.871.027 1.76.034 2.636.022l.006.441c-.273.004-.546.006-.819.006zm3.472-.102l-.026-.441a57.812 57.812 0 002.627-.214l.046.438c-.877.092-1.767.165-2.647.217zm-7.96-.069a58.196 58.196 0 01-2.642-.263l.053-.438c.867.107 1.75.194 2.623.261l-.034.44zm13.24-.485l-.066-.436c.867-.131 1.74-.284 2.596-.454l.086.432a56.77 56.77 0 01-2.615.458zm-18.51-.161a59.032 59.032 0 01-2.607-.504l.093-.431a56.73 56.73 0 002.588.5l-.074.435zm23.718-.874l-.106-.428c.851-.211 1.707-.443 2.543-.691l.126.423c-.843.25-1.706.484-2.563.696zm-28.906-.253a57.235 57.235 0 01-2.55-.742l.133-.42c.833.263 1.684.511 2.53.736l-.114.426zm33.996-1.257l-.144-.417a57.617 57.617 0 002.468-.922l.164.409c-.819.328-1.655.641-2.488.93zm-39.066-.346a56.2 56.2 0 01-2.476-.976l.171-.406a57.9 57.9 0 002.457.968l-.152.414zm43.99-1.625l-.182-.401c.793-.36 1.59-.745 2.37-1.143l.2.393c-.785.401-1.588.788-2.387 1.151zm-48.894-.439a59.598 59.598 0 01-2.374-1.199l.208-.389c.774.413 1.566.813 2.356 1.19l-.19.398zm53.614-1.973l-.219-.383c.76-.434 1.52-.89 2.256-1.356l.236.373c-.742.469-1.507.929-2.273 1.366zm-58.304-.533a57.96 57.96 0 01-2.253-1.411l.243-.369c.732.483 1.485.954 2.236 1.401l-.226.379zm62.786-2.302l-.253-.362c.716-.5 1.43-1.024 2.124-1.557l.269.35a58.214 58.214 0 01-2.14 1.569zm-67.224-.621a57.961 57.961 0 01-2.114-1.611l.275-.344a58.378 58.378 0 002.098 1.598l-.26.357zm71.43-2.613l-.284-.337a58.545 58.545 0 001.975-1.744l.3.323a57.973 57.973 0 01-1.99 1.758zm-75.582-.702a58.933 58.933 0 01-1.957-1.795l.305-.319a58.212 58.212 0 001.943 1.782l-.29.332zm79.48-2.903l-.314-.31a58.693 58.693 0 001.809-1.917l.328.295a59.303 59.303 0 01-1.823 1.932zm-83.31-.774c-.61-.64-1.21-1.301-1.787-1.965l.334-.29c.572.66 1.168 1.316 1.772 1.95l-.32.305zm86.865-3.171l-.34-.28a58.938 58.938 0 001.627-2.075l.353.264a58.33 58.33 0 01-1.64 2.09zm-90.345-.838a58.08 58.08 0 01-1.6-2.118l.359-.257a58.04 58.04 0 001.586 2.102l-.345.273zm93.527-3.417l-.365-.248a57.38 57.38 0 001.432-2.216l.376.231a58.1 58.1 0 01-1.443 2.233zm-96.626-.889c-.48-.737-.951-1.495-1.398-2.254l.38-.224c.443.753.91 1.506 1.387 2.237l-.37.241zm99.408-3.641l-.386-.213c.424-.767.835-1.553 1.223-2.34l.396.196a57.545 57.545 0 01-1.233 2.357zm-102.1-.927a58.053 58.053 0 01-1.185-2.371l.399-.188c.372.79.768 1.58 1.176 2.352l-.39.207zm104.456-3.841l-.404-.177a57.8 57.8 0 001.003-2.443l.412.158a58.596 58.596 0 01-1.011 2.462zM4.439 80.292a57.874 57.874 0 01-.963-2.468l.415-.15c.298.82.62 1.643.955 2.448l-.407.17zm108.623-4.017l-.419-.139c.276-.83.535-1.677.772-2.52l.425.12c-.239.849-.501 1.703-.778 2.539zM2.627 75.308a57.93 57.93 0 01-.733-2.552l.426-.112c.223.847.467 1.699.728 2.533l-.421.131zM114.5 71.163l-.43-.1c.197-.85.378-1.718.537-2.58l.433.08a56.648 56.648 0 01-.54 2.6zm-113.22-.99a58.018 58.018 0 01-.495-2.61l.435-.072c.143.864.308 1.734.491 2.59l-.431.091zm114.181-4.231l-.437-.06c.118-.864.218-1.745.297-2.618l.44.04a58.96 58.96 0 01-.3 2.638zM.411 64.935a58.662 58.662 0 01-.255-2.643l.44-.033c.064.875.15 1.757.252 2.624l-.438.052zm115.529-4.28l-.44-.02c.039-.874.059-1.76.059-2.635H116c0 .88-.02 1.774-.06 2.654zM.023 59.638a59.528 59.528 0 01-.014-2.655l.44.007a58.207 58.207 0 00.015 2.636l-.441.012zm115.533-2.254a59.395 59.395 0 00-.087-2.635l.44-.024c.049.88.079 1.773.088 2.654l-.441.005zM.554 54.358l-.44-.027c.055-.882.131-1.772.226-2.646l.438.048a58.23 58.23 0 00-.224 2.625zm114.709-2.235c-.088-.87-.198-1.749-.326-2.615l.436-.064c.129.872.24 1.759.329 2.635l-.439.044zM1.122 49.12l-.436-.067c.135-.873.292-1.752.467-2.615l.432.088a57.517 57.517 0 00-.463 2.594zm113.37-2.209a58.142 58.142 0 00-.564-2.574l.428-.104c.208.854.399 1.727.569 2.594l-.433.084zM2.167 43.956l-.428-.107c.214-.855.451-1.716.705-2.56l.422.126a57.56 57.56 0 00-.7 2.54zm111.078-2.164a56.235 56.235 0 00-.799-2.511l.417-.144c.287.833.558 1.684.806 2.53l-.424.125zm-109.56-2.89l-.416-.146c.293-.833.61-1.671.94-2.49l.41.166a57.242 57.242 0 00-.934 2.47zm107.848-2.093a58.113 58.113 0 00-1.025-2.422l.403-.18c.36.8.707 1.621 1.032 2.44l-.41.162zM5.664 34.007l-.4-.184a58.01 58.01 0 011.165-2.39l.392.201c-.402.779-.79 1.577-1.157 2.373zm103.71-1.992a58.155 58.155 0 00-1.243-2.32l.384-.216a59.04 59.04 0 011.252 2.336l-.393.2zM8.085 29.318l-.382-.22a58.29 58.29 0 011.38-2.273l.37.237a57.735 57.735 0 00-1.368 2.256zm98.698-1.883a57.411 57.411 0 00-1.451-2.196l.362-.252c.501.722.993 1.466 1.462 2.214l-.373.235zm-95.859-2.563l-.36-.254c.508-.721 1.04-1.44 1.58-2.136l.349.27a58.06 58.06 0 00-1.569 2.12zm92.858-1.762a58.165 58.165 0 00-1.645-2.057l.338-.284a58.972 58.972 0 011.658 2.073l-.351.268zm-89.626-2.404l-.336-.286c.57-.67 1.165-1.337 1.768-1.983l.322.301a58.522 58.522 0 00-1.754 1.968zm86.243-1.634a57.893 57.893 0 00-1.826-1.9l.31-.312c.625.62 1.244 1.264 1.841 1.914l-.325.298zm-82.648-2.22l-.308-.314a58.36 58.36 0 011.94-1.813l.294.329c-.652.581-1.3 1.187-1.925 1.799zm78.91-1.494c-.648-.59-1.319-1.17-1.992-1.727l.282-.34c.677.561 1.353 1.146 2.007 1.74l-.296.327zm-74.98-2.014l-.279-.342a58.672 58.672 0 012.096-1.629l.263.355a58.224 58.224 0 00-2.08 1.616zm70.92-1.347a58.448 58.448 0 00-2.143-1.538l.249-.364a58.521 58.521 0 012.158 1.55l-.265.352zm-66.69-1.789l-.246-.365c.73-.492 1.482-.973 2.234-1.43l.23.376c-.747.455-1.493.932-2.218 1.42zM88.247 9.02a57.794 57.794 0 00-2.275-1.337l.214-.386c.77.43 1.542.883 2.293 1.347l-.232.376zm-57.84-1.546l-.211-.387a58.279 58.279 0 012.354-1.22l.193.397c-.783.383-1.569.79-2.336 1.21zm53.23-1.022a57.677 57.677 0 00-2.39-1.123l.18-.403c.806.356 1.616.737 2.407 1.13l-.197.396zm-48.505-1.29l-.176-.404c.807-.35 1.633-.685 2.454-.997l.157.412a57.38 57.38 0 00-2.435.99zm43.676-.845a57.383 57.383 0 00-2.484-.898l.14-.418c.839.281 1.68.586 2.504.905l-.16.411zM40.051 3.295l-.137-.42a57.699 57.699 0 012.542-.768l.118.425c-.842.233-1.69.49-2.523.763zm33.756-.656c-.841-.24-1.7-.463-2.55-.664l.1-.43c.859.203 1.723.428 2.57.67l-.12.424zm-28.678-.753l-.099-.43c.86-.197 1.735-.376 2.602-.532l.078.434c-.86.155-1.729.333-2.581.528zm23.55-.456a57.53 57.53 0 00-2.6-.427l.06-.436c.874.122 1.755.267 2.621.43l-.081.433zM50.314.95l-.059-.437a58.223 58.223 0 012.64-.291l.038.44c-.872.075-1.753.172-2.62.288zM63.46.697A58.036 58.036 0 0060.833.51l.021-.441a58.62 58.62 0 012.648.189l-.041.439zM55.563.492l-.019-.44C56.354.016 57.181 0 58 0h.2l-.002.441H58c-.813 0-1.633.017-2.437.05z" fill="#3F3D56" />
                <path d="M86 46.536H30.42v39.565H86V46.536z" fill="#E6E6E6" />
                <path d="M26.113 82.333h-.403V42.768h54.638v.41H26.113v39.155z" fill="#5F6CAF" />
                <path d="M21.403 77.623H21V39h54.638v.4H21.403v38.223z" fill="#5F6CAF" />
                <path d="M58.21 78.565c6.503 0 11.776-5.272 11.776-11.775 0-6.504-5.273-11.776-11.776-11.776S46.435 60.286 46.435 66.79c0 6.503 5.272 11.775 11.775 11.775z" fill="#fff" />
                <path d="M54.913 60.667v12.246l9.42-6.207-9.42-6.04z" fill="#5F6CAF" />
            </symbol>
            <symbol id="email-icon" viewBox="0 0 116 116">
                <path d="M54 115c29.271 0 53-23.505 53-52.5S83.271 10 54 10 1 33.505 1 62.5 24.729 115 54 115z" fill="#F2F2F2" />
                <path d="M58 116c-.612 0-1.23-.01-1.837-.029l.014-.44c.871.027 1.76.034 2.636.022l.006.441c-.273.004-.546.006-.819.006zm3.472-.102l-.026-.441a57.812 57.812 0 002.627-.214l.046.438c-.877.092-1.767.165-2.647.217zm-7.96-.069a58.196 58.196 0 01-2.642-.263l.053-.438c.867.107 1.75.194 2.623.261l-.034.44zm13.24-.485l-.066-.436c.867-.131 1.74-.284 2.596-.454l.086.432a56.77 56.77 0 01-2.615.458zm-18.51-.161a59.032 59.032 0 01-2.607-.504l.093-.431a56.73 56.73 0 002.588.5l-.074.435zm23.718-.874l-.106-.428c.851-.211 1.707-.443 2.543-.691l.126.423c-.843.25-1.706.484-2.563.696zm-28.906-.253a57.235 57.235 0 01-2.55-.742l.133-.42c.833.263 1.684.511 2.53.736l-.114.426zm33.996-1.257l-.144-.417a57.617 57.617 0 002.468-.922l.164.409c-.819.328-1.655.641-2.488.93zm-39.066-.346a56.2 56.2 0 01-2.476-.976l.171-.406a57.9 57.9 0 002.457.968l-.152.414zm43.99-1.625l-.182-.401c.793-.36 1.59-.745 2.37-1.143l.2.393c-.785.401-1.588.788-2.387 1.151zm-48.894-.439a59.598 59.598 0 01-2.374-1.199l.208-.389c.774.413 1.566.813 2.356 1.19l-.19.398zm53.614-1.973l-.219-.383c.76-.434 1.52-.89 2.256-1.356l.236.373c-.742.469-1.507.929-2.273 1.366zm-58.304-.533a57.96 57.96 0 01-2.253-1.411l.243-.369c.732.483 1.485.954 2.236 1.401l-.226.379zm62.786-2.302l-.253-.362c.716-.5 1.43-1.024 2.124-1.557l.269.35a58.214 58.214 0 01-2.14 1.569zm-67.224-.621a57.961 57.961 0 01-2.114-1.611l.275-.344a58.378 58.378 0 002.098 1.598l-.26.357zm71.43-2.613l-.284-.337a58.545 58.545 0 001.975-1.744l.3.323a57.973 57.973 0 01-1.99 1.758zm-75.582-.702a58.933 58.933 0 01-1.957-1.795l.305-.319a58.212 58.212 0 001.943 1.782l-.29.332zm79.48-2.903l-.314-.31a58.693 58.693 0 001.809-1.917l.328.295a59.303 59.303 0 01-1.823 1.932zm-83.31-.774c-.61-.64-1.21-1.301-1.787-1.965l.334-.29c.572.66 1.168 1.316 1.772 1.95l-.32.305zm86.865-3.171l-.34-.28a58.938 58.938 0 001.627-2.075l.353.264a58.33 58.33 0 01-1.64 2.09zm-90.345-.838a58.08 58.08 0 01-1.6-2.118l.359-.257a58.04 58.04 0 001.586 2.102l-.345.273zm93.527-3.417l-.365-.248a57.38 57.38 0 001.432-2.216l.376.231a58.1 58.1 0 01-1.443 2.233zm-96.626-.889c-.48-.737-.951-1.495-1.398-2.254l.38-.224c.443.753.91 1.506 1.387 2.237l-.37.241zm99.408-3.641l-.386-.213c.424-.767.835-1.553 1.223-2.34l.396.196a57.545 57.545 0 01-1.233 2.357zm-102.1-.927a58.053 58.053 0 01-1.185-2.371l.399-.188c.372.79.768 1.58 1.176 2.352l-.39.207zm104.456-3.841l-.404-.177a57.8 57.8 0 001.003-2.443l.412.158a58.596 58.596 0 01-1.011 2.462zM4.439 80.292a57.874 57.874 0 01-.963-2.468l.415-.15c.298.82.62 1.643.955 2.448l-.407.17zm108.623-4.017l-.419-.139c.276-.83.535-1.677.772-2.52l.425.12c-.239.849-.501 1.703-.778 2.539zM2.627 75.308a57.93 57.93 0 01-.733-2.552l.426-.112c.223.847.467 1.699.728 2.533l-.421.131zM114.5 71.163l-.43-.1c.197-.85.378-1.718.537-2.58l.433.08a56.648 56.648 0 01-.54 2.6zm-113.22-.99a58.018 58.018 0 01-.495-2.61l.435-.072c.143.864.308 1.734.491 2.59l-.431.091zm114.181-4.231l-.437-.06c.118-.864.218-1.745.297-2.618l.44.04a58.96 58.96 0 01-.3 2.638zM.411 64.935a58.662 58.662 0 01-.255-2.643l.44-.033c.064.875.15 1.757.252 2.624l-.438.052zm115.529-4.28l-.44-.02c.039-.874.059-1.76.059-2.635H116c0 .88-.02 1.774-.06 2.654zM.023 59.638a59.528 59.528 0 01-.014-2.655l.44.007a58.207 58.207 0 00.015 2.636l-.441.012zm115.533-2.254a59.395 59.395 0 00-.087-2.635l.44-.024c.049.88.079 1.773.088 2.654l-.441.005zM.554 54.358l-.44-.027c.055-.882.131-1.772.226-2.646l.438.048a58.23 58.23 0 00-.224 2.625zm114.709-2.235c-.088-.87-.198-1.749-.326-2.615l.436-.064c.129.872.24 1.759.329 2.635l-.439.044zM1.122 49.12l-.436-.067c.135-.873.292-1.752.467-2.615l.432.088a57.517 57.517 0 00-.463 2.594zm113.37-2.209a58.142 58.142 0 00-.564-2.574l.428-.104c.208.854.399 1.727.569 2.594l-.433.084zM2.167 43.956l-.428-.107c.214-.855.451-1.716.705-2.56l.422.126a57.56 57.56 0 00-.7 2.54zm111.078-2.164a56.235 56.235 0 00-.799-2.511l.417-.144c.287.833.558 1.684.806 2.53l-.424.125zm-109.56-2.89l-.416-.146c.293-.833.61-1.671.94-2.49l.41.166a57.242 57.242 0 00-.934 2.47zm107.848-2.093a58.113 58.113 0 00-1.025-2.422l.403-.18c.36.8.707 1.621 1.032 2.44l-.41.162zM5.664 34.007l-.4-.184a58.01 58.01 0 011.165-2.39l.392.201c-.402.779-.79 1.577-1.157 2.373zm103.71-1.992a58.155 58.155 0 00-1.243-2.32l.384-.216a59.04 59.04 0 011.252 2.336l-.393.2zM8.085 29.318l-.382-.22a58.29 58.29 0 011.38-2.273l.37.237a57.735 57.735 0 00-1.368 2.256zm98.698-1.883a57.411 57.411 0 00-1.451-2.196l.362-.252c.501.722.993 1.466 1.462 2.214l-.373.235zm-95.859-2.563l-.36-.254c.508-.721 1.04-1.44 1.58-2.136l.349.27a58.06 58.06 0 00-1.569 2.12zm92.858-1.762a58.165 58.165 0 00-1.645-2.057l.338-.284a58.972 58.972 0 011.658 2.073l-.351.268zm-89.626-2.404l-.336-.286c.57-.67 1.165-1.337 1.768-1.983l.322.301a58.522 58.522 0 00-1.754 1.968zm86.243-1.634a57.893 57.893 0 00-1.826-1.9l.31-.312c.625.62 1.244 1.264 1.841 1.914l-.325.298zm-82.648-2.22l-.308-.314a58.36 58.36 0 011.94-1.813l.294.329c-.652.581-1.3 1.187-1.925 1.799zm78.91-1.494c-.648-.59-1.319-1.17-1.992-1.727l.282-.34c.677.561 1.353 1.146 2.007 1.74l-.296.327zm-74.98-2.014l-.279-.342a58.672 58.672 0 012.096-1.629l.263.355a58.224 58.224 0 00-2.08 1.616zm70.92-1.347a58.448 58.448 0 00-2.143-1.538l.249-.364a58.521 58.521 0 012.158 1.55l-.265.352zm-66.69-1.789l-.246-.365c.73-.492 1.482-.973 2.234-1.43l.23.376c-.747.455-1.493.932-2.218 1.42zM88.247 9.02a57.794 57.794 0 00-2.275-1.337l.214-.386c.77.43 1.542.883 2.293 1.347l-.232.376zm-57.84-1.546l-.211-.387a58.279 58.279 0 012.354-1.22l.193.397c-.783.383-1.569.79-2.336 1.21zm53.23-1.022a57.677 57.677 0 00-2.39-1.123l.18-.403c.806.356 1.616.737 2.407 1.13l-.197.396zm-48.505-1.29l-.176-.404c.807-.35 1.633-.685 2.454-.997l.157.412a57.38 57.38 0 00-2.435.99zm43.676-.845a57.383 57.383 0 00-2.484-.898l.14-.418c.839.281 1.68.586 2.504.905l-.16.411zM40.051 3.295l-.137-.42a57.699 57.699 0 012.542-.768l.118.425c-.842.233-1.69.49-2.523.763zm33.756-.656c-.841-.24-1.7-.463-2.55-.664l.1-.43c.859.203 1.723.428 2.57.67l-.12.424zm-28.678-.753l-.099-.43c.86-.197 1.735-.376 2.602-.532l.078.434c-.86.155-1.729.333-2.581.528zm23.55-.456a57.53 57.53 0 00-2.6-.427l.06-.436c.874.122 1.755.267 2.621.43l-.081.433zM50.314.95l-.059-.437a58.223 58.223 0 012.64-.291l.038.44c-.872.075-1.753.172-2.62.288zM63.46.697A58.036 58.036 0 0060.833.51l.021-.441a58.62 58.62 0 012.648.189l-.041.439zM55.563.492l-.019-.44C56.354.016 57.181 0 58 0h.2l-.002.441H58c-.813 0-1.633.017-2.437.05zM74.044 86H33.067a5.132 5.132 0 01-3.583-1.447A4.881 4.881 0 0128 81.058V62.747c0-.266.055-.53.163-.773a1.96 1.96 0 01.463-.648L50.34 41.25A4.737 4.737 0 0153.556 40c1.196 0 2.347.447 3.215 1.25l20.703 19.141c.517.479.929 1.055 1.21 1.693a5.01 5.01 0 01.427 2.021v16.953c0 1.31-.534 2.568-1.484 3.495A5.132 5.132 0 0174.044 86z" fill="#3F3D56" />
                <path opacity=".1" d="M28 63h50.26v16.094a6.857 6.857 0 01-2.053 4.883A7.059 7.059 0 0171.252 86H35.007c-.92 0-1.831-.179-2.681-.526a7.014 7.014 0 01-2.274-1.497 6.9 6.9 0 01-1.519-2.24A6.82 6.82 0 0128 79.094V63z" fill="#000" />
                <path d="M69.524 46.815H37.587c-1.531 0-2.772 1.27-2.772 2.835v32.663c0 1.566 1.24 2.835 2.772 2.835h31.937c1.531 0 2.772-1.27 2.772-2.835V49.65c0-1.566-1.24-2.835-2.772-2.835z" fill="#5F6CAF" />
                <path opacity=".1" d="M72.296 63.852v21.296H34.815V63.852l18.74 9.365 18.741-9.365z" fill="#000" />
                <path d="M53.556 73.786l-24.15-11.541a.99.99 0 00-1.284.403.96.96 0 00-.122.469v19.858a2.996 2.996 0 00.896 2.139A3.062 3.062 0 0031.06 86h44.993c.811 0 1.59-.319 2.163-.886a3.008 3.008 0 00.896-2.14V63.458a1.172 1.172 0 00-.56-1.001 1.205 1.205 0 00-1.156-.063l-23.84 11.393z" fill="#3F3D56" />
                <path d="M48.444 50.222H37.37v1.704h11.074v-1.704zM68.037 58.74H37.37v.853h30.667v-.852zM68.037 61.296H37.37v.852h30.667v-.852z" fill="#F2F2F2" />
                <path d="M36.093 51.926a4.685 4.685 0 100-9.37 4.685 4.685 0 000 9.37z" fill="#fff" />
                <path d="M36.519 42.556a5.111 5.111 0 105.11 5.11 5.126 5.126 0 00-5.11-5.11zm-1.05 7.836l-2.62-2.62.736-.734 1.887 1.887 3.983-3.983.735.734-4.72 4.716z" fill="#7FCD91" />
            </symbol>
            <symbol id="grow-illustration" viewBox="0 0 174 341" aria-hidden="true">
                <path d="M83.596 8.873C37.427 8.873 0 33.723 0 64.378c0 13.688 7.466 26.216 19.836 35.893v40.285l26.5-26.482a118.96 118.96 0 0037.26 5.809c46.168 0 83.595-24.85 83.595-55.505S129.764 8.873 83.596 8.873z" fill="#F2F2F2" />
                <path d="M89.504 1C43.336 1 5.91 25.85 5.91 56.505c0 13.688 7.466 26.216 19.836 35.893v40.285l26.5-26.482a118.96 118.96 0 0037.26 5.809c46.168 0 83.595-24.85 83.595-55.505S135.673 1 89.504 1z" stroke="#3F3D56" stroke-miterlimit="10" />
                <path d="M53.182 144.622s-1.682-22.63-.89-26.769c.791-4.139 1.535-15.921-2.818-12.048-4.353 3.873-2.806 12.66-2.806 12.66s-4.131 23.917-.31 27.162c3.82 3.245 6.824-1.005 6.824-1.005z" fill="#A0616A" />
                <path d="M56.317 167.002S43.36 155.454 44.06 145.655c0 0 7.704-5.949 9.455-2.799 1.751 3.149 14.478 15.436 12.317 19.616-2.161 4.18-9.515 4.53-9.515 4.53z" fill="#F1C6DE" />
                <path d="M102.19 146.355s7.704-21.347 8.055-25.547c.35-4.199 2.801-15.747 5.953-10.848 3.151 4.899-.701 12.948-.701 12.948s-2.451 24.147-7.003 26.247c-4.553 2.099-6.304-2.8-6.304-2.8zM81.18 253.44h20.66l1.051 10.499-4.903 1.05s-11.556-3.5-18.209-2.45c-6.653 1.05 1.4-9.099 1.4-9.099z" fill="#A0616A" />
                <path d="M94.837 252.041s9.805-6.649 11.556-1.05c1.751 5.599 8.054 25.896 5.953 27.996-2.101 2.1-4.553-1.75-4.553-1.75s-4.202-8.748-7.353-9.098c-3.152-.35-4.903-3.15-4.903-3.15s9.105-6.999-.7-12.948z" fill="#2F2E41" />
                <path d="M75.927 306.283s3.852 15.748 3.151 18.198c-.7 2.45 11.206 1.05 11.206 1.05l.7-4.55s-7.003-11.198-7.003-16.097c0-4.9-8.054 1.399-8.054 1.399z" fill="#A0616A" />
                <path d="M90.284 317.832s9.455 6.999 4.553 10.498c-4.903 3.5-23.112 12.599-23.112 12.599s-6.654 1.049-1.751-4.9c4.902-5.949 6.303-6.999 6.653-10.148a15.366 15.366 0 012.16-5.909s4.844 9.758 11.497-2.14zM61.57 233.843s-3.852 36.395 2.1 47.944c5.954 11.548 12.957 27.296 12.607 27.996-.35.7 10.155-1.05 10.155-4.2 0-3.149-11.556-34.645-11.556-34.645s4.903-40.944 8.755-43.744c3.852-2.8-22.062 6.649-22.062 6.649z" fill="#2F2E41" />
                <path opacity=".1" d="M61.57 233.843s-3.852 36.395 2.1 47.944c5.954 11.548 12.957 27.296 12.607 27.996-.35.7 10.155-1.05 10.155-4.2 0-3.149-11.556-34.645-11.556-34.645s4.903-40.944 8.755-43.744c3.852-2.8-22.062 6.649-22.062 6.649z" fill="#000" />
                <path d="M69.484 131.132c-2.503.453-4.983 1.827-6.227 4.174-1.162 2.19-1.236 5.116-3.083 6.688-1.103.939-2.6 1.156-3.831 1.893a5.894 5.894 0 00-2.714 5.252c.098 1.931 1.117 3.73 1.096 5.663-.028 2.514-1.768 4.589-3.404 6.408l5.426 1.006c.82.219 1.68.242 2.51.067.937-.277 1.698-1.048 2.645-1.283 1.358-.338 2.702.488 3.914 1.221 3.45 2.085 7.15 3.659 10.835 5.226 1.085.461 2.314.923 3.384.425.864-.401 1.401-1.34 2.214-1.848 1.456-.91 3.284-.225 4.92.224a16.275 16.275 0 0011.109-.945c-.75-.875-1.732-1.487-2.54-2.301-.807-.815-1.46-1.968-1.247-3.128.218-1.183 1.236-1.972 1.93-2.927a6.87 6.87 0 001.046-5.215 9.515 9.515 0 00-2.498-4.725 24.814 24.814 0 01-2.043-2.153c-1.276-1.722-1.592-4.003-2-6.15-.409-2.147-1.054-4.433-2.71-5.74-2.641-2.083-6.929-1.373-10.015-1.58-2.943-.197-5.78-.252-8.717-.252zM52.115 208.997l6.653 16.447s-30.466 33.246-13.307 37.795c17.16 4.55 23.112-3.499 33.968 2.8 0 0 5.252-8.049 4.552-12.948 0 0-15.058-2.8-23.112-2.45 0 0 21.712-18.898 23.813-19.597 2.1-.7 9.104-11.899-1.751-20.998-10.856-9.098-8.055-13.998-8.055-13.998l-22.761 12.949z" fill="#2F2E41" />
                <path d="M67.873 151.954s1.05 10.849-3.502 12.249c-4.553 1.399 17.859 1.049 17.859 1.049s-5.253-3.149-2.802-9.798c2.452-6.649-11.555-3.5-11.555-3.5z" fill="#A0616A" />
                <path opacity=".1" d="M67.873 151.954s1.05 10.849-3.502 12.249c-4.553 1.399 17.859 1.049 17.859 1.049s-5.253-3.149-2.802-9.798c2.452-6.649-11.555-3.5-11.555-3.5z" fill="#000" />
                <path d="M91.685 170.852s-2.101-10.849-6.303-10.149c-4.203.7-12.607 1.4-13.657 2.1-1.05.7-6.654 2.134-6.654 2.134s2.101-2.484 0-2.834c-2.1-.35-8.754 1.4-9.455 2.8-.7 1.399-3.502 4.199-3.502 9.098 0 4.9-2.1 13.299-1.4 16.798.7 3.5-.35 11.548-2.451 16.098-2.102 4.549-.35 9.099 3.151 4.549 3.502-4.549 1.751 0 4.553.35 2.8.35 15.407-12.598 18.91-9.449 3.501 3.15 7.003 5.25 7.703 3.5.7-1.75-2.801-4.899-2.801-6.299 0-1.4-5.603 4.549.35-7.699 5.953-12.248.35-15.748 11.556-20.997z" fill="#F1C6DE" />
                <path d="M88.883 170.152l2.802.7s10.155-7.349 12.957-12.599c2.801-5.249 4.902-9.448 4.902-9.448s-4.552-5.599-7.354-3.5c-2.801 2.1-15.407 16.448-15.407 16.448l2.1 8.399z" fill="#F1C6DE" />
                <path d="M75.927 159.303c5.995 0 10.855-4.857 10.855-10.848 0-5.992-4.86-10.849-10.855-10.849-5.996 0-10.856 4.857-10.856 10.849 0 5.991 4.86 10.848 10.856 10.848z" fill="#A0616A" />
                <path d="M66.323 145.312a9.538 9.538 0 016.63-2.179c4.162.256 7.825 3.219 11.993 3.312a4.291 4.291 0 01.359-2.655c.323-.662.833-1.304.764-2.037a2.487 2.487 0 00-.899-1.472c-2.41-2.283-5.74-3.459-9.057-3.604-2.224-.097-6.469-.045-8.193 1.638-1.476 1.44-1.305 5.131-1.597 6.997z" fill="#2F2E41" />
                <path d="M89.504 89.586c12.57 0 22.759-10.183 22.759-22.744 0-12.562-10.189-22.745-22.759-22.745S66.745 54.28 66.745 66.842c0 12.56 10.19 22.744 22.76 22.744z" fill="#ECCE6D" />
                <path d="M83.943 61.128c1.206 0 2.183-1.279 2.183-2.856 0-1.578-.977-2.857-2.183-2.857s-2.183 1.28-2.183 2.857c0 1.578.977 2.856 2.183 2.856zM95.221 61.128c1.206 0 2.183-1.279 2.183-2.856 0-1.578-.977-2.857-2.183-2.857-1.205 0-2.183 1.28-2.183 2.857 0 1.578.978 2.856 2.183 2.856z" fill="#444053" />
                <path d="M103.147 67.257c0 4.102-6.855 11.01-13.773 11.01-6.917 0-13.512-7.064-13.512-11.166s6.452-.35 13.37-.35c6.917 0 13.915-3.596 13.915.506z" fill="#3F3D56" />
                <path d="M78.041 67.958s12.435 2.766 22.881.078c0 0 1.278 0 .405 1.477-.228.383-.56.694-.958.895-2.013 1.029-9.467 4.067-21.385.192a2.343 2.343 0 01-1.547-1.584c-.14-.507-.08-.988.604-1.058z" fill="#F6F8FB" />
            </symbol>
            <symbol id="grow-blob" viewBox="0 0 898 500">
                <path opacity=".1" d="M521.365 82.432c-57.524-1.67-112.319-17.128-164.633-34.047-52.315-16.92-104.148-35.645-160.299-44.61-36.118-5.763-77.413-6.581-106.516 9.543-27.995 15.507-37.049 42.29-41.913 67.131-3.66 18.693-5.81 38.374 4.214 55.871 6.967 12.151 19.327 22.361 27.875 33.999 29.753 40.5 8.724 90.431-23.517 129.968-15.121 18.548-32.658 36.246-44.328 55.99-11.67 19.745-17.056 42.387-6.855 62.508 10.121 19.961 34.232 34.954 60.357 45.501 53.053 21.422 115.577 27.554 176.576 31.021 134.912 7.697 270.555 4.358 405.901 1.027 50.075-1.228 100.327-2.48 149.632-8.925 27.353-3.58 55.597-9.262 75.446-22.979 25.218-17.417 31.463-46.897 14.567-68.736-28.332-36.624-106.684-45.749-126.492-85.022-10.9-21.63.297-45.749 16.14-65.814 33.983-43.037 90.953-80.8 93.955-130.024 2.063-33.79-25.323-67.63-67.669-83.617-44.385-16.759-105.945-14.648-138.684 13.09-33.71 28.606-92.96 39.594-143.757 38.125z" fill="#6C63FF" />
            </symbol>
            <symbol id="feedback" viewBox="0 0 519 366">
                <path opacity="0.1" d="M291.671 85.396C259.489 84.2809 228.836 73.8845 199.568 62.5196C170.301 51.1548 141.304 38.5592 109.895 32.5346C89.6904 28.6605 66.5847 28.1229 50.3072 38.9457C34.6383 49.3687 29.5782 67.3801 26.8594 84.0632C24.8113 96.6276 23.6074 109.832 29.2139 121.61C33.11 129.771 40.0271 136.636 44.8117 144.455C61.4491 171.672 49.6985 205.229 31.6529 231.798C23.212 244.264 13.3806 256.154 6.85453 269.424C0.328414 282.695 -2.69252 297.894 3.01616 311.427C8.68042 324.845 22.168 334.921 36.7796 342.008C66.4603 356.403 101.437 360.526 135.542 362.858C211.043 368.003 286.944 365.782 362.641 363.56C390.656 362.729 418.79 361.89 446.352 357.558C461.652 355.154 477.45 351.338 488.556 342.119C502.661 330.416 506.158 310.601 496.704 295.913C480.853 271.304 437.018 265.19 425.939 238.778C419.839 224.24 426.103 208.046 434.966 194.562C453.98 165.634 485.851 140.261 487.53 107.197C488.685 84.4897 473.363 61.7466 449.675 51.0037C424.841 39.741 390.411 41.1583 372.09 59.8006C353.236 78.9983 320.086 86.3823 291.671 85.396Z" fill="#6C63FF" />
                <path d="M114 343C113.378 343 112.749 342.99 112.132 342.971L112.146 342.523C113.032 342.55 113.936 342.558 114.827 342.546L114.833 342.994C114.556 342.998 114.278 343 114 343ZM117.532 342.896L117.506 342.448C118.393 342.396 119.292 342.322 120.178 342.229L120.224 342.676C119.332 342.769 118.427 342.843 117.532 342.896H117.532ZM109.435 342.826C108.54 342.757 107.635 342.668 106.747 342.559L106.801 342.113C107.683 342.221 108.581 342.311 109.469 342.379L109.435 342.826ZM122.903 342.333L122.836 341.889C123.718 341.755 124.607 341.6 125.477 341.427L125.564 341.867C124.687 342.041 123.792 342.198 122.904 342.333H122.903ZM104.074 342.169C103.19 342.019 102.297 341.847 101.422 341.656L101.517 341.218C102.386 341.407 103.271 341.578 104.149 341.726L104.074 342.169ZM128.201 341.28L128.093 340.844C128.959 340.63 129.829 340.394 130.68 340.141L130.808 340.572C129.95 340.826 129.073 341.064 128.201 341.28ZM98.7959 341.023C97.9286 340.792 97.0559 340.538 96.202 340.268L96.3372 339.84C97.1847 340.108 98.0507 340.36 98.9111 340.589L98.7959 341.023ZM133.379 339.744L133.232 339.32C134.072 339.028 134.916 338.712 135.743 338.381L135.909 338.798C135.077 339.131 134.225 339.449 133.379 339.744H133.379ZM93.639 339.392C92.7968 339.083 91.9493 338.749 91.1203 338.399L91.2944 337.986C92.1171 338.332 92.958 338.664 93.7939 338.971L93.639 339.392ZM138.388 337.739L138.202 337.331C139.009 336.964 139.82 336.573 140.612 336.168L140.816 336.568C140.018 336.976 139.201 337.37 138.388 337.739H138.388ZM88.6507 337.292C87.8411 336.906 87.0285 336.496 86.2356 336.072L86.447 335.676C87.234 336.097 88.0403 336.504 88.8437 336.887L88.6507 337.292ZM143.188 335.285L142.966 334.896C143.74 334.454 144.512 333.99 145.261 333.517L145.501 333.896C144.746 334.373 143.968 334.841 143.188 335.285ZM83.8798 334.743C83.1097 334.285 82.3386 333.802 81.5879 333.307L81.8348 332.933C82.5797 333.423 83.3449 333.903 84.1092 334.357L83.8798 334.743ZM147.748 332.401L147.491 332.033C148.219 331.525 148.946 330.992 149.651 330.45L149.925 330.805C149.214 331.351 148.482 331.888 147.748 332.401ZM79.3647 331.769C78.6406 331.243 77.9172 330.692 77.2145 330.131L77.4945 329.781C78.1918 330.337 78.9097 330.884 79.6283 331.406L79.3647 331.769ZM152.027 329.112L151.738 328.769C152.417 328.196 153.093 327.599 153.747 326.994L154.051 327.324C153.392 327.933 152.712 328.535 152.027 329.112ZM75.1416 328.397C74.4672 327.807 73.7971 327.192 73.1502 326.571L73.4608 326.247C74.1029 326.864 74.7678 327.474 75.4371 328.06L75.1416 328.397ZM155.992 325.445L155.673 325.13C156.298 324.495 156.918 323.839 157.512 323.179L157.846 323.479C157.246 324.144 156.623 324.806 155.992 325.445ZM71.2444 324.657C70.6257 324.006 70.0145 323.334 69.4281 322.658L69.767 322.364C70.349 323.035 70.9554 323.702 71.5695 324.348L71.2444 324.657ZM159.608 321.431L159.262 321.146C159.827 320.458 160.384 319.748 160.917 319.035L161.276 319.304C160.739 320.022 160.178 320.738 159.608 321.431ZM67.7049 320.579C67.1492 319.877 66.6021 319.152 66.0786 318.425L66.4427 318.163C66.9622 318.884 67.5052 319.604 68.0568 320.301L67.7049 320.579ZM162.845 317.103L162.474 316.851C162.974 316.114 163.464 315.356 163.93 314.597L164.313 314.832C163.843 315.596 163.349 316.36 162.845 317.103ZM64.5527 316.199C64.0639 315.449 63.5854 314.678 63.1305 313.906L63.5169 313.678C63.9684 314.444 64.4433 315.21 64.9284 315.953L64.5527 316.199ZM165.675 312.495L165.283 312.278C165.713 311.499 166.132 310.698 166.527 309.899L166.929 310.098C166.531 310.903 166.109 311.709 165.675 312.495ZM61.8148 311.552C61.3964 310.761 60.9907 309.949 60.6089 309.14L61.0146 308.948C61.3935 309.752 61.7961 310.557 62.2114 311.342L61.8148 311.552ZM168.071 307.645L167.66 307.464C168.018 306.648 168.361 305.812 168.681 304.979L169.1 305.14C168.778 305.979 168.431 306.822 168.071 307.645ZM59.5152 306.676C59.1712 305.851 58.8418 305.006 58.5362 304.166L58.9579 304.013C59.2611 304.847 59.588 305.685 59.9292 306.504L59.5152 306.676ZM170.011 302.59L169.585 302.449C169.865 301.605 170.13 300.743 170.371 299.886L170.803 300.007C170.56 300.871 170.293 301.74 170.011 302.59V302.59ZM57.672 301.607C57.405 300.752 57.1542 299.878 56.9264 299.01L57.3604 298.896C57.5864 299.758 57.8354 300.625 58.1003 301.473L57.672 301.607ZM171.474 297.39L171.037 297.289C171.238 296.424 171.421 295.541 171.583 294.664L172.024 294.745C171.861 295.629 171.676 296.519 171.474 297.39V297.39ZM56.3016 296.382C56.1146 295.506 55.9452 294.613 55.7984 293.728L56.241 293.655C56.3868 294.533 56.5548 295.419 56.7405 296.288L56.3016 296.382ZM172.451 292.079L172.007 292.018C172.127 291.139 172.229 290.243 172.31 289.354L172.757 289.395C172.676 290.29 172.573 291.193 172.451 292.079V292.079ZM55.4174 291.054C55.3116 290.166 55.2248 289.262 55.1592 288.366L55.6067 288.333C55.6717 289.222 55.758 290.12 55.8631 291.001L55.4174 291.054ZM172.939 286.7L172.491 286.68C172.531 285.791 172.551 284.889 172.551 284H173C173 284.896 172.98 285.805 172.939 286.7V286.7ZM55.0232 285.668C55.0079 285.118 55.0001 284.556 55 284C55 283.655 55.003 283.31 55.0089 282.966L55.4575 282.974C55.4516 283.315 55.4487 283.657 55.4487 284C55.4488 284.552 55.4566 285.109 55.4717 285.656L55.0232 285.668ZM172.548 283.374C172.539 282.485 172.509 281.583 172.46 280.694L172.908 280.669C172.957 281.565 172.987 282.473 172.997 283.369L172.548 283.374ZM55.564 280.296L55.1162 280.267C55.1722 279.371 55.2495 278.466 55.3458 277.576L55.7919 277.625C55.6962 278.507 55.6197 279.406 55.564 280.296ZM172.25 278.022C172.16 277.137 172.049 276.242 171.919 275.362L172.362 275.296C172.493 276.184 172.606 277.085 172.696 277.977L172.25 278.022ZM56.1412 274.967L55.6978 274.898C55.8352 274.011 55.9949 273.116 56.1725 272.239L56.6122 272.328C56.436 273.198 56.2775 274.086 56.1412 274.967ZM171.466 272.72C171.295 271.845 171.102 270.964 170.892 270.102L171.328 269.996C171.539 270.864 171.734 271.752 171.906 272.634L171.466 272.72ZM57.2039 269.714L56.7687 269.605C56.9866 268.736 57.2279 267.859 57.486 267L57.9156 267.129C57.6596 267.982 57.4201 268.851 57.2039 269.714ZM170.198 267.512C169.948 266.658 169.674 265.799 169.385 264.958L169.809 264.812C170.101 265.659 170.376 266.525 170.629 267.386L170.198 267.512ZM58.7484 264.573L58.3251 264.425C58.6233 263.576 58.9452 262.724 59.282 261.892L59.698 262.06C59.3638 262.886 59.0443 263.732 58.7484 264.573H58.7484ZM168.455 262.443C168.128 261.618 167.778 260.789 167.414 259.98L167.823 259.796C168.19 260.611 168.543 261.446 168.873 262.278L168.455 262.443ZM60.7622 259.594L60.3545 259.406C60.7292 258.59 61.128 257.772 61.5399 256.974L61.9386 257.18C61.5298 257.972 61.134 258.784 60.7622 259.594ZM166.26 257.567C165.858 256.775 165.433 255.981 164.995 255.208L165.386 254.987C165.827 255.766 166.255 256.566 166.66 257.364L166.26 257.567ZM63.2247 254.823L62.8358 254.599C63.2834 253.822 63.7554 253.044 64.2388 252.287L64.6169 252.529C64.1373 253.28 63.6688 254.052 63.2247 254.823ZM163.624 252.909C163.15 252.154 162.653 251.402 162.148 250.674L162.517 250.418C163.026 251.152 163.526 251.909 164.004 252.67L163.624 252.909ZM66.1126 250.301L65.7458 250.042C66.2631 249.309 66.8039 248.578 67.3535 247.869L67.708 248.144C67.1626 248.847 66.6257 249.573 66.1126 250.301ZM160.572 248.508C160.031 247.8 159.468 247.096 158.898 246.416L159.242 246.127C159.816 246.813 160.384 247.522 160.928 248.236L160.572 248.508ZM69.3998 246.063L69.0583 245.772C69.6387 245.09 70.2437 244.412 70.8563 243.755L71.1843 244.061C70.5764 244.713 69.976 245.386 69.3998 246.063ZM157.13 244.401C156.528 243.745 155.902 243.095 155.272 242.469L155.589 242.15C156.224 242.781 156.853 243.437 157.461 244.097L157.13 244.401ZM73.0575 242.143L72.7438 241.823C73.3854 241.195 74.0493 240.574 74.7169 239.978L75.0157 240.313C74.3531 240.905 73.6943 241.52 73.0575 242.143ZM153.328 240.622C152.668 240.023 151.986 239.433 151.302 238.866L151.588 238.521C152.277 239.091 152.964 239.686 153.63 240.29L153.328 240.622ZM77.0548 238.574L76.7715 238.226C77.4654 237.661 78.1826 237.104 78.9031 236.569L79.1704 236.93C78.4552 237.46 77.7435 238.013 77.0548 238.574ZM149.197 237.204C148.484 236.667 147.751 236.141 147.017 235.639L147.271 235.269C148.01 235.774 148.748 236.305 149.467 236.845L149.197 237.204ZM81.358 235.384L81.1076 235.012C81.8503 234.513 82.6148 234.023 83.3802 233.558L83.6133 233.941C82.8539 234.403 82.0951 234.889 81.358 235.384ZM144.768 234.175C144.01 233.706 143.231 233.248 142.454 232.815L142.672 232.423C143.456 232.86 144.24 233.321 145.004 233.793L144.768 234.175ZM85.9317 232.602L85.7163 232.209C86.502 231.779 87.3077 231.362 88.1108 230.969L88.308 231.372C87.511 231.762 86.7115 232.176 85.9317 232.602L85.9317 232.602ZM140.079 231.563C139.281 231.165 138.463 230.781 137.649 230.421L137.83 230.01C138.651 230.373 139.475 230.761 140.28 231.161L140.079 231.563ZM90.7373 230.252L90.559 229.84C91.3801 229.484 92.2201 229.143 93.0554 228.826L93.2147 229.245C92.3857 229.56 91.5522 229.899 90.7373 230.252ZM135.167 229.392C134.336 229.069 133.486 228.762 132.64 228.478L132.783 228.053C133.635 228.339 134.492 228.649 135.329 228.973L135.167 229.392ZM95.7419 228.351L95.6022 227.925C96.4548 227.646 97.3248 227.382 98.1877 227.143L98.3076 227.575C97.4513 227.813 96.588 228.074 95.7419 228.351ZM130.079 227.684C129.224 227.44 128.351 227.213 127.485 227.009L127.588 226.573C128.461 226.778 129.34 227.007 130.202 227.253L130.079 227.684ZM100.907 226.918L100.807 226.481C101.681 226.281 102.571 226.099 103.453 225.94L103.533 226.381C102.658 226.539 101.774 226.72 100.907 226.918ZM124.863 226.454C123.989 226.29 123.099 226.145 122.218 226.021L122.28 225.576C123.168 225.701 124.065 225.848 124.946 226.013L124.863 226.454ZM106.181 225.966L106.122 225.522C107.01 225.403 107.913 225.303 108.806 225.226L108.845 225.672C107.959 225.75 107.063 225.849 106.181 225.966ZM119.555 225.709C118.671 225.626 117.772 225.561 116.881 225.518L116.903 225.07C117.8 225.114 118.707 225.178 119.597 225.262L119.555 225.709ZM111.521 225.5L111.502 225.052C112.326 225.018 113.167 225 114 225L114.203 225L114.202 225.449L114 225.449C113.173 225.449 112.339 225.466 111.521 225.5Z" fill="#3F3D56" />
                <path d="M451 225C450.378 225 449.749 224.99 449.132 224.971L449.146 224.523C450.032 224.55 450.936 224.558 451.827 224.546L451.833 224.994C451.556 224.998 451.278 225 451 225ZM454.532 224.896L454.506 224.448C455.393 224.396 456.292 224.322 457.178 224.229L457.224 224.676C456.332 224.769 455.427 224.843 454.532 224.896H454.532ZM446.435 224.826C445.54 224.757 444.635 224.668 443.747 224.559L443.801 224.113C444.683 224.221 445.581 224.311 446.469 224.379L446.435 224.826ZM459.903 224.333L459.836 223.889C460.718 223.755 461.607 223.6 462.477 223.427L462.564 223.867C461.687 224.041 460.792 224.198 459.904 224.333H459.903ZM441.074 224.169C440.19 224.019 439.297 223.847 438.422 223.656L438.517 223.218C439.386 223.407 440.271 223.578 441.149 223.726L441.074 224.169ZM465.201 223.28L465.093 222.844C465.959 222.63 466.829 222.394 467.68 222.141L467.808 222.572C466.95 222.826 466.073 223.064 465.201 223.28ZM435.796 223.023C434.929 222.792 434.056 222.538 433.202 222.268L433.337 221.84C434.185 222.108 435.051 222.36 435.911 222.589L435.796 223.023ZM470.379 221.744L470.232 221.32C471.072 221.028 471.916 220.712 472.743 220.381L472.909 220.798C472.077 221.131 471.225 221.449 470.379 221.744H470.379ZM430.639 221.392C429.797 221.083 428.949 220.749 428.12 220.399L428.294 219.986C429.117 220.332 429.958 220.664 430.794 220.971L430.639 221.392ZM475.388 219.739L475.202 219.331C476.009 218.964 476.82 218.573 477.612 218.168L477.816 218.568C477.018 218.976 476.201 219.37 475.388 219.739H475.388ZM425.651 219.292C424.841 218.906 424.028 218.496 423.236 218.072L423.447 217.676C424.234 218.097 425.04 218.504 425.844 218.887L425.651 219.292ZM480.188 217.285L479.966 216.896C480.74 216.454 481.512 215.99 482.261 215.517L482.501 215.896C481.746 216.373 480.968 216.841 480.188 217.285ZM420.88 216.743C420.11 216.285 419.339 215.802 418.588 215.307L418.835 214.933C419.58 215.423 420.345 215.903 421.109 216.357L420.88 216.743ZM484.748 214.401L484.491 214.033C485.219 213.525 485.946 212.992 486.651 212.45L486.925 212.805C486.214 213.351 485.482 213.888 484.748 214.401ZM416.365 213.769C415.641 213.243 414.917 212.692 414.214 212.131L414.494 211.781C415.192 212.337 415.91 212.884 416.628 213.406L416.365 213.769ZM489.027 211.112L488.738 210.769C489.417 210.196 490.093 209.599 490.747 208.994L491.051 209.324C490.392 209.933 489.712 210.535 489.027 211.112ZM412.142 210.397C411.467 209.807 410.797 209.192 410.15 208.571L410.461 208.247C411.103 208.864 411.768 209.474 412.437 210.06L412.142 210.397ZM492.992 207.445L492.673 207.13C493.298 206.495 493.918 205.839 494.512 205.179L494.846 205.479C494.246 206.144 493.623 206.806 492.992 207.445ZM408.244 206.657C407.626 206.006 407.015 205.334 406.428 204.658L406.767 204.364C407.349 205.035 407.955 205.702 408.57 206.348L408.244 206.657ZM496.608 203.431L496.262 203.146C496.827 202.458 497.384 201.748 497.917 201.035L498.276 201.304C497.739 202.022 497.178 202.738 496.608 203.431ZM404.705 202.579C404.149 201.877 403.602 201.152 403.079 200.425L403.443 200.163C403.962 200.884 404.505 201.604 405.057 202.301L404.705 202.579ZM499.845 199.103L499.474 198.851C499.974 198.114 500.464 197.356 500.93 196.597L501.313 196.832C500.843 197.596 500.349 198.36 499.845 199.103ZM401.553 198.199C401.064 197.449 400.585 196.678 400.13 195.906L400.517 195.678C400.968 196.444 401.443 197.21 401.928 197.953L401.553 198.199ZM502.675 194.495L502.283 194.278C502.713 193.499 503.132 192.698 503.527 191.899L503.929 192.098C503.531 192.903 503.109 193.709 502.675 194.495ZM398.815 193.552C398.396 192.761 397.991 191.949 397.609 191.14L398.015 190.948C398.394 191.752 398.796 192.557 399.211 193.342L398.815 193.552ZM505.071 189.645L504.66 189.464C505.018 188.648 505.361 187.812 505.681 186.979L506.1 187.14C505.778 187.979 505.431 188.822 505.071 189.645ZM396.515 188.676C396.171 187.851 395.842 187.006 395.536 186.166L395.958 186.013C396.261 186.847 396.588 187.685 396.929 188.504L396.515 188.676ZM507.011 184.59L506.585 184.449C506.865 183.605 507.13 182.743 507.371 181.886L507.803 182.007C507.56 182.871 507.293 183.74 507.011 184.59V184.59ZM394.672 183.607C394.405 182.752 394.154 181.878 393.926 181.01L394.36 180.896C394.586 181.758 394.835 182.625 395.1 183.473L394.672 183.607ZM508.474 179.39L508.037 179.289C508.238 178.424 508.421 177.541 508.583 176.664L509.024 176.745C508.861 177.629 508.676 178.519 508.474 179.39V179.39ZM393.302 178.382C393.115 177.506 392.945 176.613 392.798 175.728L393.241 175.655C393.387 176.533 393.555 177.419 393.74 178.288L393.302 178.382ZM509.451 174.079L509.007 174.018C509.127 173.139 509.229 172.243 509.31 171.354L509.757 171.395C509.676 172.29 509.573 173.193 509.451 174.079V174.079ZM392.417 173.054C392.312 172.166 392.225 171.262 392.159 170.366L392.607 170.333C392.672 171.222 392.758 172.12 392.863 173.001L392.417 173.054ZM509.939 168.7L509.491 168.68C509.531 167.791 509.551 166.889 509.551 166H510C510 166.896 509.98 167.805 509.939 168.7V168.7ZM392.023 167.668C392.008 167.118 392 166.556 392 166C392 165.655 392.003 165.31 392.009 164.966L392.458 164.974C392.452 165.315 392.449 165.657 392.449 166C392.449 166.552 392.457 167.109 392.472 167.656L392.023 167.668ZM509.548 165.374C509.539 164.485 509.509 163.583 509.46 162.694L509.908 162.669C509.957 163.565 509.987 164.473 509.997 165.369L509.548 165.374ZM392.564 162.296L392.116 162.267C392.172 161.371 392.25 160.466 392.346 159.576L392.792 159.625C392.696 160.507 392.62 161.406 392.564 162.296ZM509.25 160.022C509.16 159.137 509.049 158.242 508.919 157.362L509.362 157.296C509.493 158.184 509.606 159.085 509.696 159.977L509.25 160.022ZM393.141 156.967L392.698 156.898C392.835 156.011 392.995 155.116 393.172 154.239L393.612 154.328C393.436 155.198 393.278 156.086 393.141 156.967ZM508.466 154.72C508.295 153.845 508.102 152.964 507.892 152.102L508.328 151.996C508.539 152.864 508.734 153.752 508.906 154.634L508.466 154.72ZM394.204 151.714L393.769 151.605C393.987 150.736 394.228 149.859 394.486 149L394.916 149.129C394.66 149.982 394.42 150.851 394.204 151.714ZM507.198 149.512C506.948 148.658 506.674 147.799 506.385 146.958L506.809 146.812C507.101 147.659 507.376 148.525 507.629 149.386L507.198 149.512ZM395.748 146.573L395.325 146.425C395.623 145.576 395.945 144.724 396.282 143.892L396.698 144.06C396.364 144.886 396.044 145.732 395.748 146.573H395.748ZM505.455 144.443C505.128 143.618 504.778 142.789 504.414 141.98L504.823 141.796C505.19 142.611 505.543 143.446 505.873 144.278L505.455 144.443ZM397.762 141.594L397.354 141.406C397.729 140.59 398.128 139.772 398.54 138.974L398.939 139.18C398.53 139.972 398.134 140.784 397.762 141.594ZM503.26 139.567C502.858 138.775 502.433 137.981 501.995 137.208L502.386 136.987C502.827 137.766 503.255 138.566 503.66 139.364L503.26 139.567ZM400.225 136.823L399.836 136.599C400.283 135.822 400.755 135.044 401.239 134.287L401.617 134.529C401.137 135.28 400.669 136.052 400.225 136.823ZM500.624 134.909C500.15 134.154 499.653 133.402 499.148 132.674L499.517 132.418C500.026 133.152 500.526 133.909 501.004 134.67L500.624 134.909ZM403.113 132.301L402.746 132.042C403.263 131.309 403.804 130.578 404.354 129.869L404.708 130.144C404.163 130.847 403.626 131.573 403.113 132.301ZM497.572 130.508C497.031 129.8 496.468 129.096 495.898 128.416L496.242 128.127C496.816 128.813 497.384 129.522 497.928 130.236L497.572 130.508ZM406.4 128.063L406.058 127.772C406.639 127.09 407.244 126.412 407.856 125.755L408.184 126.061C407.576 126.713 406.976 127.386 406.4 128.063ZM494.13 126.401C493.528 125.745 492.902 125.095 492.272 124.469L492.589 124.15C493.224 124.781 493.853 125.437 494.461 126.097L494.13 126.401ZM410.058 124.143L409.744 123.823C410.385 123.195 411.049 122.574 411.717 121.978L412.016 122.313C411.353 122.905 410.694 123.52 410.058 124.143ZM490.328 122.622C489.668 122.023 488.986 121.433 488.302 120.866L488.588 120.521C489.277 121.091 489.964 121.686 490.63 122.29L490.328 122.622ZM414.055 120.574L413.772 120.226C414.465 119.661 415.183 119.104 415.903 118.569L416.17 118.93C415.455 119.46 414.743 120.013 414.055 120.574ZM486.197 119.204C485.484 118.667 484.751 118.141 484.017 117.639L484.271 117.269C485.01 117.774 485.748 118.305 486.467 118.845L486.197 119.204ZM418.358 117.384L418.108 117.012C418.85 116.513 419.615 116.023 420.38 115.558L420.613 115.941C419.854 116.403 419.095 116.889 418.358 117.384ZM481.768 116.175C481.01 115.706 480.231 115.248 479.454 114.815L479.672 114.423C480.456 114.86 481.24 115.321 482.004 115.793L481.768 116.175ZM422.932 114.602L422.716 114.209C423.502 113.779 424.308 113.362 425.111 112.969L425.308 113.372C424.511 113.762 423.711 114.176 422.932 114.602L422.932 114.602ZM477.079 113.563C476.281 113.165 475.463 112.781 474.649 112.421L474.83 112.01C475.651 112.373 476.475 112.761 477.28 113.161L477.079 113.563ZM427.737 112.252L427.559 111.84C428.38 111.484 429.22 111.143 430.055 110.826L430.215 111.245C429.386 111.56 428.552 111.899 427.737 112.252ZM472.167 111.392C471.336 111.069 470.486 110.762 469.64 110.478L469.783 110.053C470.635 110.339 471.492 110.649 472.329 110.973L472.167 111.392ZM432.742 110.351L432.602 109.925C433.455 109.646 434.325 109.382 435.188 109.143L435.308 109.575C434.451 109.813 433.588 110.074 432.742 110.351ZM467.079 109.684C466.224 109.44 465.351 109.213 464.485 109.009L464.588 108.573C465.461 108.778 466.34 109.007 467.202 109.253L467.079 109.684ZM437.907 108.918L437.807 108.481C438.681 108.281 439.571 108.099 440.453 107.94L440.533 108.381C439.658 108.539 438.774 108.72 437.907 108.918ZM461.863 108.454C460.989 108.29 460.099 108.145 459.218 108.021L459.28 107.576C460.168 107.701 461.065 107.848 461.946 108.013L461.863 108.454ZM443.181 107.966L443.122 107.522C444.01 107.403 444.913 107.303 445.806 107.226L445.845 107.672C444.959 107.75 444.063 107.849 443.181 107.966ZM456.555 107.709C455.671 107.626 454.772 107.561 453.881 107.518L453.903 107.07C454.8 107.114 455.707 107.178 456.597 107.262L456.555 107.709ZM448.521 107.5L448.502 107.052C449.326 107.018 450.167 107 451 107L451.203 107L451.202 107.449L451 107.449C450.173 107.449 449.339 107.466 448.521 107.5Z" fill="#3F3D56" />
                <path d="M234.608 71.6961C234.606 81.7985 231.864 91.7117 226.673 100.382C221.482 109.053 214.037 116.157 205.128 120.939C204.46 121.301 203.781 121.648 203.092 121.979C195.447 125.678 187.059 127.593 178.564 127.577C170.069 127.562 161.688 125.618 154.056 121.891C152.741 121.249 151.456 120.556 150.202 119.811C148.928 119.066 147.69 118.264 146.488 117.415C138.585 111.865 132.255 104.365 128.115 95.646C123.974 86.9269 122.165 77.2855 122.862 67.6605C123.56 58.0356 126.74 48.7549 132.094 40.7221C137.448 32.6892 144.793 26.1779 153.414 21.822C156.819 20.0931 160.396 18.7231 164.085 17.7343C165.712 17.2945 167.366 16.9289 169.048 16.6374C172.223 16.0874 175.44 15.8122 178.662 15.8147C179.325 15.8147 179.983 15.8251 180.641 15.8561C181.123 15.8665 181.605 15.8872 182.086 15.9182C187.123 16.2189 192.095 17.2024 196.865 18.8416C197.275 18.9813 197.684 19.1262 198.088 19.2763C199.497 19.7937 200.875 20.3697 202.222 21.0044C211.897 25.4899 220.087 32.6452 225.825 41.6268C231.564 50.6083 234.611 61.0415 234.608 71.6961Z" fill="#5F6CAF" />
                <path d="M200.499 14.5523C195.409 2.55633 182.452 0.290777 182.452 0.290777C182.452 0.290777 169.976 -3.03359 159.558 12.7985C149.847 27.5554 137.324 41.3813 153.205 47.2715L157.4 38.4711L157.904 48.5989C160.213 49.0793 162.547 49.4331 164.895 49.6587C182.511 51.4462 199.117 54.4184 199.424 48.0595C199.833 39.6062 205.396 26.0948 200.499 14.5523Z" fill="#2F2E41" />
                <path d="M155.258 112.319L154.844 115.641L154.056 121.891C152.741 121.249 151.456 120.556 150.202 119.811C148.928 119.066 147.69 118.264 146.488 117.415L146.612 114.192L146.752 110.616L152.502 111.77L155.258 112.319Z" fill="#FFB8B8" />
                <path d="M213.136 115.713C210.621 117.68 207.942 119.429 205.128 120.939L202.413 111.548L202.056 110.311L201.165 107.222L202.123 107.072L211.935 105.525L212.251 108.19L213.136 115.713Z" fill="#FFB8B8" />
                <path d="M182.461 39.2884C190.912 39.2884 197.763 32.4451 197.763 24.0035C197.763 15.5618 190.912 8.71851 182.461 8.71851C174.009 8.71851 167.158 15.5618 167.158 24.0035C167.158 32.4451 174.009 39.2884 182.461 39.2884Z" fill="#FFB8B8" />
                <path d="M171.976 29.9475C171.976 29.9475 173.109 49.1952 169.708 50.3275C166.308 51.4597 187.278 50.3275 187.278 50.3275C187.278 50.3275 184.444 38.4392 187.278 35.0425C190.112 31.6458 171.976 29.9475 171.976 29.9475Z" fill="#FFB8B8" />
                <path d="M187.562 47.2139C187.562 47.2139 172.826 46.0817 169.992 47.2139C167.158 48.3461 159.223 54.0072 159.223 54.0072L163.191 89.6721L195.496 96.4654L200.597 89.106L205.698 78.3499L203.431 64.7633L202.864 56.8378L187.562 47.2139Z" fill="#D0CDE1" />
                <path d="M156.39 56.2717C156.39 56.2717 149.022 57.9701 148.455 63.6312C147.888 69.2923 147.888 83.445 148.455 85.7094C149.022 87.9739 148.455 89.1061 147.888 89.6722C147.321 90.2383 146.188 89.1061 147.321 90.8044C148.455 92.5028 148.455 92.5028 147.888 94.2011C147.321 95.8994 145.621 93.635 146.755 96.4655C147.888 99.2961 148.455 99.8622 147.888 100.428C147.321 100.994 145.621 114.015 145.621 114.015L155.256 115.713L164.891 82.3128L156.39 56.2717Z" fill="#D0CDE1" />
                <path d="M200.597 56.2717C201.674 56.3317 202.714 56.6783 203.611 57.2756C204.508 57.8729 205.229 58.6991 205.698 59.6684C207.398 63.065 211.933 85.1433 211.366 86.8417C210.799 88.54 209.665 86.2755 210.799 89.6722C211.932 93.0689 210.799 92.5027 211.366 94.7672C211.933 97.0316 209.099 94.7672 211.366 97.0316C213.633 99.2961 214.766 99.8622 213.633 100.994C212.499 102.127 210.799 99.8622 212.499 102.127C214.2 104.391 214.2 107.788 214.2 107.788L200.597 110.618L196.63 78.9161L200.597 56.2717Z" fill="#D0CDE1" />
                <path d="M202.413 111.548L203.092 121.979C195.446 125.678 187.059 127.593 178.564 127.578C170.069 127.562 161.688 125.618 154.056 121.891C152.74 121.25 151.456 120.556 150.202 119.811C150.637 118.212 151.078 116.619 151.528 115.056C151.849 113.944 152.174 112.848 152.502 111.77C155.046 103.456 157.786 96.3824 160.355 93.6349C160.355 93.6349 160.355 87.4103 161.49 86.8411C162.035 86.4143 162.451 85.8447 162.692 85.1957C163.114 84.261 163.47 83.298 163.759 82.3137L161.883 77.957L153.492 58.4399C153.253 57.8817 153.236 57.2534 153.445 56.6833C153.654 56.1131 154.072 55.644 154.616 55.3716L157.397 53.9798C157.679 53.84 157.986 53.7573 158.3 53.7363C158.614 53.7153 158.929 53.7565 159.227 53.8574C159.525 53.9584 159.8 54.1172 160.036 54.3246C160.272 54.5321 160.465 54.7842 160.604 55.0664L173.394 81.1805L187.562 90.2406L197.497 85.827L197.761 85.708C197.761 85.708 205.133 74.3868 202.864 68.7263C201.895 66.3099 200.828 63.0812 199.911 60.1681C199.378 58.4503 198.901 56.8411 198.528 55.5786C198.469 55.3781 198.474 55.1643 198.541 54.9664C198.608 54.7684 198.734 54.5959 198.903 54.4722C199.071 54.3484 199.274 54.2795 199.483 54.2747C199.692 54.2699 199.898 54.3295 200.072 54.4454L202.004 55.7338C202.442 56.0273 202.788 56.4379 203.004 56.9187C203.093 57.1066 203.159 57.3047 203.201 57.5086L207.397 77.7863L201.729 89.6714V100.993L202.123 107.072L202.33 110.254L202.413 111.548Z" fill="#2F2E41" />
                <path d="M197.621 10.1941L184.636 3.40039L166.704 6.17945L162.994 22.5465L172.229 22.1921L174.81 16.1786V22.0927L179.071 21.9292L181.544 12.3559L183.09 22.5465L198.24 22.2381L197.621 10.1941Z" fill="#2F2E41" />
                <path d="M166.875 26.9754C167.814 26.9754 168.575 25.6448 168.575 24.0033C168.575 22.3619 167.814 21.0312 166.875 21.0312C165.936 21.0312 165.174 22.3619 165.174 24.0033C165.174 25.6448 165.936 26.9754 166.875 26.9754Z" fill="#FFB8B8" />
                <path d="M506 164C506 188.653 489.928 209.518 467.779 216.5C464.509 217.537 461.152 218.253 457.752 218.638C455.676 218.88 453.589 219.001 451.5 219C450.723 219 449.951 218.985 449.184 218.944H449.174C441.382 218.63 433.742 216.61 426.758 213.016C421.852 210.491 417.34 207.216 413.375 203.299C408.21 198.247 404.094 192.156 401.278 185.399C398.463 178.641 397.007 171.36 397 164C397 140.691 411.367 120.769 431.653 112.763C434.08 111.802 436.571 111.022 439.106 110.431C448.448 108.244 458.174 108.568 467.36 111.373C468.057 111.577 468.748 111.806 469.429 112.05C469.435 112.05 469.44 112.056 469.445 112.056C471.084 112.626 472.694 113.283 474.269 114.021C474.809 114.266 475.349 114.525 475.879 114.801C476.938 115.33 477.978 115.899 478.997 116.507C479.391 116.736 479.779 116.97 480.163 117.214C486.423 121.118 491.856 126.294 496.134 132.431C500.026 138.011 502.852 144.309 504.461 150.988C505.487 155.244 506.004 159.614 506 164Z" fill="#5F6CAF" />
                <path d="M510.325 74.5855L518.111 72.2238L518.783 65.5528C518.783 65.5528 499.846 58.5936 493.792 70.9031C491.654 75.2494 488.96 77.8596 486.369 79.4179C484.58 80.4513 482.585 81.0767 480.526 81.2492C478.467 81.4217 476.395 81.1371 474.459 80.4158C461.335 75.7527 458.244 89.0133 458.244 89.0133C458.244 89.0133 459.379 90.901 467.469 91.3651C471.495 91.5961 474.789 94.5436 477.083 97.4467C481.995 103.663 492.084 101.866 494.561 94.4053C494.601 94.2851 494.64 94.1633 494.679 94.04C498.549 81.7065 516.168 91.5263 516.168 91.5263L517.292 80.3553L510.325 74.5855Z" fill="#2F2E41" />
                <path d="M457.275 104.775C462.541 104.775 466.811 100.622 466.811 95.4982C466.811 90.3745 462.541 86.2209 457.275 86.2209C452.008 86.2209 447.739 90.3745 447.739 95.4982C447.739 100.622 452.008 104.775 457.275 104.775Z" fill="#2F2E41" />
                <path d="M452.507 144.977C466.551 144.977 477.936 133.9 477.936 120.237C477.936 106.574 466.551 95.498 452.507 95.498C438.462 95.498 427.077 106.574 427.077 120.237C427.077 133.9 438.462 144.977 452.507 144.977Z" fill="#2F2E41" />
                <path d="M451.712 146.265C461.367 146.265 469.195 138.65 469.195 129.257C469.195 119.864 461.367 112.249 451.712 112.249C442.057 112.249 434.229 119.864 434.229 129.257C434.229 138.65 442.057 146.265 451.712 146.265Z" fill="#A0616A" />
                <path d="M444.825 142.142L448.003 158.635L463.897 156.573C463.897 156.573 461.248 143.688 462.837 140.081L444.825 142.142Z" fill="#A0616A" />
                <path d="M476.082 106.064C476.082 106.064 463.367 96.7866 458.069 100.394C452.771 104.002 472.373 115.857 474.492 114.826C476.611 113.795 476.082 106.064 476.082 106.064Z" fill="#A0616A" />
                <path d="M488.267 176.156C488.268 176.242 488.265 176.327 488.256 176.412V176.418C487.93 183.785 473.99 206.332 465.949 217.163C462.536 218.207 459.033 218.927 455.485 219.315C453.318 219.558 451.14 219.679 448.96 219.678C448.149 219.678 447.343 219.663 446.543 219.622H446.532C439.128 217.296 430.334 214.243 423.919 211.835C420.897 210.692 418.4 209.698 416.831 208.991C416.247 208.752 415.53 207.843 415 207.5C412.351 205.435 418.337 204.503 420.986 203.991C423.635 203.474 419.928 197.807 419.928 197.807C410.391 188.012 422.045 179.768 422.045 179.768C422.045 179.768 426.811 169.973 426.811 167.396C426.823 167.204 426.895 167.022 427.016 166.873C429.012 164.127 444.826 159.152 444.826 159.152V150.904L446.464 150.637L462.578 148.025L463.895 147.809L466.544 151.934L478.203 153.481C478.203 153.481 488.267 166.883 488.267 176.156Z" fill="#F1C6DE" />
                <path d="M438 176.151C438 176.151 430.96 194.656 424.53 209.652C424.307 210.176 424.084 210.694 423.866 211.208C423.601 211.812 424.126 211.411 423.866 212C418.704 209.504 413.172 207.266 409 203.395C411.888 194.49 416.47 180.339 418.238 174.635C420.187 168.348 424.695 167.195 426.988 167.029C427.453 166.987 427.921 166.991 428.385 167.039L438 176.151Z" fill="#F1C6DE" />
                <path d="M476.611 155.027L478.201 153.481C478.201 153.481 498.332 132.349 497.803 127.195C497.803 127.195 487.207 114.31 473.963 117.918C473.963 117.918 468.135 104.002 477.141 104.518C486.147 105.033 519.523 102.971 518.994 117.918C518.464 132.865 486.677 178.736 486.677 178.736L476.611 155.027Z" fill="#F1C6DE" />
                <path d="M469.114 121.424C470.943 115.717 464.991 108.712 455.819 105.779C446.647 102.847 437.729 105.096 435.899 110.804C434.07 116.512 440.022 123.516 449.194 126.449C458.366 129.382 467.284 127.132 469.114 121.424Z" fill="#2F2E41" />
                <path d="M59 281.769C58.999 284.641 59.2172 287.509 59.6527 290.348C61.7464 303.76 68.6504 315.954 79.0784 324.658C79.3633 324.896 79.6534 325.134 79.9487 325.367C80.5599 325.858 81.1815 326.336 81.8135 326.8C82.7252 327.473 83.6577 328.116 84.6108 328.73C92.104 333.552 100.641 336.519 109.512 337.385C118.384 338.251 127.334 336.99 135.62 333.707C136.014 333.552 136.407 333.392 136.796 333.226C137.418 332.962 138.029 332.688 138.64 332.398C140.189 331.679 141.7 330.888 143.173 330.023C144.691 329.139 146.158 328.187 147.576 327.167C148.223 326.702 148.85 326.231 149.477 325.739L149.487 325.734C157.776 319.232 164.063 310.53 167.628 300.624V300.618C171.89 288.701 171.98 275.692 167.886 263.716C163.791 251.74 155.753 241.504 145.084 234.678C144.592 234.368 144.095 234.058 143.592 233.768C143.074 233.447 142.546 233.147 142.012 232.857C134.832 228.877 126.856 226.539 118.66 226.012C117.432 225.929 116.194 225.887 114.946 225.887C114.884 225.887 114.822 225.887 114.759 225.893C113.081 225.893 111.423 225.97 109.786 226.125C95.9012 227.41 82.9966 233.827 73.6019 244.12C64.2072 254.414 58.9997 267.84 59 281.769Z" fill="#5F6CAF" />
                <path d="M172.607 300.959C172.607 300.959 188.947 284.094 193.304 294.431C197.661 304.767 176.965 310.208 176.965 310.208L172.607 300.959Z" fill="#FFB8B8" />
                <path d="M127.958 249.93C136.602 249.93 143.61 242.931 143.61 234.296C143.61 225.662 136.602 218.663 127.958 218.663C119.314 218.663 112.306 225.662 112.306 234.296C112.306 242.931 119.314 249.93 127.958 249.93Z" fill="#FFB8B8" />
                <path d="M117.597 239.484L106.16 251.453L102.892 269.95L131.758 274.846L129.58 257.981C129.58 257.981 130.124 249.821 132.303 248.189C134.482 246.557 117.597 239.484 117.597 239.484Z" fill="#FFB8B8" />
                <path d="M83.8286 326.531C84.7835 326.224 85.7535 325.967 86.7347 325.76C89.2041 325.224 91.7157 324.903 94.2408 324.803C100.217 324.488 106.178 325.641 111.605 328.161C119.541 331.964 128.958 332.999 135.434 333.195C135.905 333.211 136.361 333.221 136.796 333.226C137.418 332.962 138.029 332.688 138.64 332.398C140.189 331.679 141.7 330.888 143.173 330.023L143.152 328.109L142.81 290.234V290.229L142.65 272.124L132.305 260.156L129.647 257.165L128.383 258.299L120.867 265.056L109.911 254.92L106.16 251.453L88.1696 311.945L85.8489 319.747L84.4813 324.342L84.2689 325.046V325.051L83.8286 326.531Z" fill="#575A89" />
                <path d="M125.628 273.806C125.654 276.523 125.882 279.235 126.311 281.919C128.176 293.814 129.777 313.59 133.74 327.871C134.258 329.754 134.822 331.534 135.434 333.195L135.62 333.708C136.014 333.552 136.407 333.392 136.796 333.226C137.418 332.963 138.029 332.688 138.64 332.398C140.189 331.679 141.7 330.888 143.173 330.024C144.691 329.139 146.158 328.187 147.576 327.167L147.41 326.515V326.51L144.83 316.193C144.83 316.193 146.488 307.557 147.814 297.897V297.892C149.337 286.834 150.425 274.447 148.099 272.124L129.849 255.448L129.844 255.453C129.276 256.357 128.787 257.31 128.383 258.299C127.14 261.243 125.565 266.438 125.628 273.806Z" fill="#D0CDE1" />
                <path d="M68.8477 313.435C71.7312 317.623 75.1732 321.399 79.0785 324.658C79.3634 324.896 79.6535 325.134 79.9488 325.367C80.56 325.858 81.1817 326.336 81.8136 326.8C82.7254 327.473 83.6578 328.116 84.611 328.73C85.3155 327.752 86.0251 326.758 86.7348 325.76C87.1544 325.175 87.574 324.585 87.9936 323.99C88.6567 323.049 89.3198 322.102 89.9724 321.15C90.0553 321.036 90.133 320.922 90.2107 320.808C91.0396 319.613 91.858 318.412 92.6558 317.217C98.5405 308.437 103.42 300.008 103.98 294.973C104.653 288.945 106.015 279.621 107.399 270.717C108.29 264.932 109.191 259.323 109.911 254.92C110.781 249.57 111.382 245.989 111.382 245.989C111.382 245.989 82.8393 243.138 78.8402 245.937H78.835C78.7203 246.003 78.6207 246.093 78.5431 246.2C78.4654 246.307 78.4113 246.429 78.3844 246.558C77.9492 249.59 80.2803 277.769 81.2438 289.152V289.157C81.4925 292.076 81.6531 293.887 81.6531 293.887C81.6531 293.887 80.0213 296.065 77.6281 299.558C75.1882 303.123 71.9506 308.054 68.8477 313.435Z" fill="#D0CDE1" />
                <path d="M146.464 287.359L149.187 308.576L173.152 298.239L180.777 314.016L141.562 328.704C141.562 328.704 134.482 291.167 146.464 287.359Z" fill="#D0CDE1" />
                <path d="M143.596 237.157C143.596 237.157 145.723 234.863 145.507 231.991C145.366 230.357 145.47 228.712 145.818 227.109C145.818 227.109 145.152 222.408 144.169 219.684C143.186 216.959 144.015 216.011 139.79 214.523C135.564 213.036 138.254 207.656 125.797 211.944C125.323 212.422 124.718 212.749 124.059 212.884C123.399 213.018 122.714 212.955 122.09 212.701C119.791 211.86 118.405 215.016 118.405 215.016C118.405 215.016 116.97 213.841 116.165 215.063C115.36 216.285 111.467 213.499 110.039 222.391C108.612 231.283 113.513 239.212 113.513 239.212C113.513 239.212 114.2 224.983 122.291 224.725C130.381 224.467 139.53 221.406 140.665 227.398C141.258 230.754 142.241 234.03 143.596 237.157Z" fill="#2F2E41" />
                <path d="M193.431 255.144C193.694 254.913 200.055 249.412 214.912 244.082C228.542 239.192 252.223 233.557 287.635 234.486C354.718 236.245 398.619 199.868 399.054 199.5L400.172 200.406C400.061 200.499 388.887 209.844 369.498 218.825C343.789 230.716 315.31 236.625 287.4 235.859C220.431 234.102 194.826 255.808 194.575 256.027L193.431 255.144Z" fill="#3F3D56" />
                <path d="M235.332 117.236C235.619 117.232 242.507 117.183 254.327 121.963C265.171 126.348 282.388 135.829 302.822 156.096C341.534 194.491 388.17 195.186 388.636 195.188L388.783 196.399C388.665 196.398 376.746 196.277 360.171 191.357C338.203 184.823 317.991 172.856 301.904 156.86C263.258 118.531 235.781 118.443 235.508 118.446L235.332 117.236Z" fill="#3F3D56" />
                <path d="M196.304 142.978C196.293 143.111 195.98 146.3 193.192 151.536C190.635 156.34 185.409 163.844 175.035 172.311C155.384 188.352 152.79 209.896 152.766 210.112L152.199 210.121C152.205 210.066 152.842 204.557 155.926 197.128C160.02 187.282 166.542 178.513 174.727 171.849C194.345 155.836 195.724 143.127 195.736 143.001L196.304 142.978Z" fill="#3F3D56" />
                <path d="M179 135C178.378 135 177.749 134.99 177.132 134.971L177.146 134.523C178.032 134.55 178.936 134.558 179.827 134.546L179.833 134.994C179.556 134.998 179.278 135 179 135ZM182.532 134.896L182.506 134.448C183.393 134.396 184.292 134.322 185.178 134.229L185.224 134.676C184.332 134.769 183.427 134.843 182.532 134.896H182.532ZM174.435 134.826C173.54 134.757 172.635 134.668 171.747 134.559L171.801 134.113C172.683 134.221 173.581 134.311 174.469 134.379L174.435 134.826ZM187.903 134.333L187.836 133.889C188.718 133.755 189.607 133.6 190.477 133.427L190.564 133.867C189.687 134.041 188.792 134.198 187.904 134.333H187.903ZM169.074 134.169C168.19 134.019 167.297 133.847 166.422 133.656L166.517 133.218C167.386 133.407 168.271 133.578 169.149 133.726L169.074 134.169ZM193.201 133.28L193.093 132.844C193.959 132.63 194.829 132.394 195.68 132.141L195.808 132.572C194.95 132.826 194.073 133.064 193.201 133.28ZM163.796 133.023C162.929 132.792 162.056 132.538 161.202 132.268L161.337 131.84C162.185 132.108 163.051 132.36 163.911 132.589L163.796 133.023ZM198.379 131.744L198.232 131.32C199.072 131.028 199.916 130.712 200.743 130.381L200.909 130.798C200.077 131.131 199.225 131.449 198.379 131.744H198.379ZM158.639 131.392C157.797 131.083 156.949 130.749 156.12 130.399L156.294 129.986C157.117 130.332 157.958 130.664 158.794 130.971L158.639 131.392ZM203.388 129.739L203.202 129.331C204.009 128.964 204.82 128.573 205.612 128.168L205.816 128.568C205.018 128.976 204.201 129.37 203.388 129.739H203.388ZM153.651 129.292C152.841 128.906 152.028 128.496 151.236 128.072L151.447 127.676C152.234 128.097 153.04 128.504 153.844 128.887L153.651 129.292ZM208.188 127.285L207.966 126.896C208.74 126.454 209.512 125.99 210.261 125.517L210.501 125.896C209.746 126.373 208.968 126.841 208.188 127.285ZM148.88 126.743C148.11 126.285 147.339 125.802 146.588 125.307L146.835 124.933C147.58 125.423 148.345 125.903 149.109 126.357L148.88 126.743ZM212.748 124.401L212.491 124.033C213.219 123.525 213.946 122.992 214.651 122.45L214.925 122.805C214.214 123.351 213.482 123.888 212.748 124.401ZM144.365 123.769C143.641 123.243 142.917 122.692 142.214 122.131L142.494 121.781C143.192 122.337 143.91 122.884 144.628 123.406L144.365 123.769ZM217.027 121.112L216.738 120.769C217.417 120.196 218.093 119.599 218.747 118.994L219.051 119.324C218.392 119.933 217.712 120.535 217.027 121.112ZM140.142 120.397C139.467 119.807 138.797 119.192 138.15 118.571L138.461 118.247C139.103 118.864 139.768 119.474 140.437 120.06L140.142 120.397ZM220.992 117.445L220.673 117.13C221.298 116.495 221.918 115.839 222.512 115.179L222.846 115.479C222.246 116.144 221.623 116.806 220.992 117.445ZM136.244 116.657C135.626 116.006 135.015 115.334 134.428 114.658L134.767 114.364C135.349 115.035 135.955 115.702 136.57 116.348L136.244 116.657ZM224.608 113.431L224.262 113.146C224.827 112.458 225.384 111.748 225.917 111.035L226.276 111.304C225.739 112.022 225.178 112.738 224.608 113.431ZM132.705 112.579C132.149 111.877 131.602 111.152 131.079 110.425L131.443 110.163C131.962 110.884 132.505 111.604 133.057 112.301L132.705 112.579ZM227.845 109.103L227.474 108.851C227.974 108.114 228.464 107.356 228.93 106.597L229.313 106.832C228.843 107.596 228.349 108.36 227.845 109.103ZM129.553 108.199C129.064 107.449 128.585 106.678 128.13 105.906L128.517 105.678C128.968 106.444 129.443 107.21 129.928 107.953L129.553 108.199ZM230.675 104.495L230.283 104.278C230.713 103.499 231.132 102.698 231.527 101.899L231.929 102.098C231.531 102.903 231.109 103.709 230.675 104.495ZM126.815 103.552C126.396 102.761 125.991 101.949 125.609 101.14L126.015 100.948C126.394 101.752 126.796 102.557 127.211 103.342L126.815 103.552ZM233.071 99.6445L232.66 99.4644C233.018 98.6479 233.361 97.8117 233.681 96.9792L234.1 97.14C233.778 97.9791 233.431 98.8217 233.071 99.6445ZM124.515 98.6764C124.171 97.8509 123.842 97.0064 123.536 96.166L123.958 96.0126C124.261 96.8467 124.588 97.6846 124.929 98.5038L124.515 98.6764ZM235.011 94.59L234.585 94.4489C234.865 93.6052 235.13 92.7429 235.371 91.8857L235.803 92.007C235.56 92.8709 235.293 93.74 235.011 94.59V94.59ZM122.672 93.6068C122.405 92.7517 122.154 91.8782 121.926 91.0102L122.36 90.8963C122.586 91.7577 122.835 92.6246 123.1 93.4731L122.672 93.6068ZM236.474 89.3904L236.037 89.2887C236.238 88.424 236.421 87.5409 236.583 86.6644L237.024 86.7455C236.861 87.629 236.676 88.5187 236.474 89.3904V89.3904ZM121.302 88.3822C121.115 87.5059 120.945 86.6132 120.798 85.7283L121.241 85.6547C121.387 86.533 121.555 87.4189 121.74 88.2884L121.302 88.3822ZM237.451 84.0787L237.007 84.0178C237.127 83.139 237.229 82.243 237.31 81.3544L237.757 81.3948C237.676 82.2903 237.573 83.1932 237.451 84.0787V84.0787ZM120.417 83.0543C120.312 82.1661 120.225 81.2616 120.159 80.3657L120.607 80.3329C120.672 81.2221 120.758 82.1197 120.863 83.0012L120.417 83.0543ZM237.939 78.7001L237.491 78.68C237.531 77.7909 237.551 76.8892 237.551 76H238C238 76.896 237.98 77.8045 237.939 78.7001V78.7001ZM120.023 77.6678C120.008 77.1177 120 76.5564 120 76C120 75.6547 120.003 75.3101 120.009 74.9662L120.458 74.974C120.452 75.3154 120.449 75.6574 120.449 76C120.449 76.5523 120.457 77.1094 120.472 77.6556L120.023 77.6678ZM237.548 75.3741C237.539 74.4845 237.509 73.5829 237.46 72.6941L237.908 72.6691C237.957 73.5647 237.987 74.4731 237.997 75.3693L237.548 75.3741ZM120.564 72.2955L120.116 72.2675C120.172 71.371 120.25 70.4656 120.346 69.5762L120.792 69.6245C120.696 70.5072 120.62 71.4057 120.564 72.2955ZM237.25 70.0219C237.16 69.1374 237.049 68.2425 236.919 67.3618L237.362 67.2963C237.493 68.1837 237.606 69.0854 237.696 69.9766L237.25 70.0219ZM121.141 66.9669L120.698 66.8983C120.835 66.0108 120.995 65.1162 121.172 64.2391L121.612 64.328C121.436 65.1984 121.278 66.0862 121.141 66.9669ZM236.466 64.7201C236.295 63.8449 236.102 62.9638 235.892 62.1016L236.328 61.9955C236.539 62.8644 236.734 63.7522 236.906 64.634L236.466 64.7201ZM122.204 61.7137L121.769 61.6046C121.987 60.7356 122.228 59.8594 122.486 59.0002L122.916 59.1292C122.66 59.9819 122.42 60.8514 122.204 61.7137ZM235.198 59.5122C234.948 58.6579 234.674 57.7986 234.385 56.9577L234.809 56.8118C235.101 57.6591 235.376 58.5252 235.629 59.386L235.198 59.5122ZM123.748 56.5734L123.325 56.4246C123.623 55.5765 123.945 54.7242 124.282 53.8916L124.698 54.0599C124.364 54.886 124.044 55.7318 123.748 56.5734H123.748ZM233.455 54.4434C233.128 53.6177 232.778 52.789 232.414 51.9803L232.823 51.7961C233.19 52.611 233.543 53.446 233.873 54.278L233.455 54.4434ZM125.762 51.5938L125.354 51.4064C125.729 50.5904 126.128 49.772 126.54 48.9741L126.939 49.1798C126.53 49.9717 126.134 50.7838 125.762 51.5938ZM231.26 49.5667C230.858 48.7747 230.433 47.981 229.995 47.2079L230.386 46.9869C230.827 47.7659 231.255 48.5657 231.66 49.3639L231.26 49.5667ZM128.225 46.8232L127.836 46.5993C128.283 45.8222 128.755 45.0442 129.239 44.2873L129.617 44.5287C129.137 45.28 128.669 46.052 128.225 46.8232ZM228.624 44.9085C228.15 44.1538 227.653 43.4019 227.148 42.6737L227.517 42.418C228.026 43.1518 228.526 43.9094 229.004 44.6699L228.624 44.9085ZM131.113 42.301L130.746 42.0424C131.263 41.3089 131.804 40.5777 132.354 39.8692L132.708 40.1441C132.163 40.8474 131.626 41.573 131.113 42.301ZM225.572 40.508C225.031 39.7999 224.468 39.0959 223.898 38.4156L224.242 38.1274C224.816 38.8129 225.384 39.5222 225.928 40.2357L225.572 40.508ZM134.4 38.063L134.058 37.7721C134.639 37.0903 135.244 36.4117 135.856 35.7552L136.184 36.0612C135.576 36.7129 134.976 37.3864 134.4 38.063ZM222.13 36.4011C221.528 35.7451 220.902 35.0949 220.272 34.4687L220.589 34.1504C221.224 34.7815 221.853 35.4365 222.461 36.0975L222.13 36.4011ZM138.058 34.1434L137.744 33.8227C138.385 33.195 139.049 32.5745 139.717 31.9784L140.016 32.3131C139.353 32.9046 138.694 33.5205 138.058 34.1434ZM218.328 32.6225C217.668 32.0234 216.986 31.4326 216.302 30.8664L216.588 30.5207C217.277 31.0911 217.964 31.6865 218.63 32.2901L218.328 32.6225ZM142.055 30.5739L141.772 30.226C142.465 29.6609 143.183 29.1035 143.903 28.5694L144.17 28.9298C143.455 29.46 142.743 30.013 142.055 30.5739ZM214.197 29.2039C213.484 28.6673 212.751 28.1407 212.017 27.6389L212.271 27.2687C213.01 27.7742 213.748 28.3047 214.467 28.8455L214.197 29.2039ZM146.358 27.3845L146.108 27.0122C146.85 26.5125 147.615 26.0232 148.38 25.5576L148.613 25.941C147.854 26.403 147.095 26.8887 146.358 27.3845ZM209.768 26.175C209.01 25.7058 208.231 25.2484 207.454 24.8152L207.672 24.4233C208.456 24.8597 209.24 25.3208 210.004 25.7934L209.768 26.175ZM150.932 24.6024L150.716 24.2087C151.502 23.7788 152.308 23.3617 153.111 22.9687L153.308 23.3718C152.511 23.7617 151.711 24.1756 150.932 24.6024L150.932 24.6024ZM205.079 23.5629C204.281 23.1651 203.463 22.7809 202.649 22.4208L202.83 22.0105C203.651 22.3733 204.475 22.7605 205.28 23.1613L205.079 23.5629ZM155.737 22.2518L155.559 21.8402C156.38 21.4843 157.22 21.143 158.055 20.8256L158.215 21.2452C157.386 21.56 156.552 21.8987 155.737 22.2518ZM200.167 21.3916C199.336 21.0695 198.486 20.7621 197.64 20.4782L197.783 20.0527C198.635 20.3389 199.492 20.6486 200.329 20.9734L200.167 21.3916ZM160.742 20.3514L160.602 19.9251C161.455 19.6456 162.325 19.3823 163.188 19.143L163.308 19.5752C162.451 19.8128 161.588 20.074 160.742 20.3514ZM195.079 19.6843C194.224 19.4404 193.351 19.2132 192.485 19.0091L192.588 18.5725C193.461 18.7781 194.34 19.0071 195.202 19.2528L195.079 19.6843ZM165.907 18.9181L165.807 18.4807C166.681 18.281 167.571 18.0991 168.453 17.9401L168.533 18.3815C167.658 18.5394 166.774 18.72 165.907 18.9181ZM189.863 18.4544C188.989 18.2905 188.099 18.1446 187.218 18.0208L187.28 17.5765C188.168 17.7013 189.065 17.8483 189.946 18.0134L189.863 18.4544ZM171.181 17.9662L171.122 17.5215C172.01 17.403 172.913 17.3033 173.806 17.2255L173.845 17.6725C172.959 17.7498 172.063 17.8486 171.181 17.9662ZM184.555 17.7088C183.671 17.6256 182.772 17.5614 181.881 17.5183L181.903 17.0701C182.8 17.1136 183.707 17.1782 184.597 17.2621L184.555 17.7088ZM176.521 17.5004L176.502 17.0521C177.326 17.0177 178.167 17.0002 179 17L179.203 17.0003L179.202 17.449L179 17.4487C178.173 17.4489 177.339 17.4663 176.521 17.5004Z" fill="#3F3D56" />
            </symbol>
            <symbol id="learning" viewBox="0 0 598 323">
                <path d="M336.347 276C433.91 276 513 270.68 513 264.118c0-6.562-79.09-11.881-176.653-11.881-97.563 0-176.653 5.319-176.653 11.881S238.784 276 336.347 276z" fill="#3F3D56" />
                <path d="M310.116 190.791a38.419 38.419 0 01-5.862 20.408 38.31 38.31 0 01-15.796 14.158c-.004 0-.004 0-.007.003a37.245 37.245 0 01-3.571 1.504c-.193.075-.389.143-.589.207-.407.146-.82.279-1.237.404-.857.265-1.727.499-2.608.703h-.004l-.024.007-.054.01a32.702 32.702 0 01-2.344.455 37.93 37.93 0 01-6.186.502 37.991 37.991 0 01-3.479-.159 38.355 38.355 0 01-8.761-1.844 38.3 38.3 0 01-17.851-12.631 38.433 38.433 0 01-4.848-39.415 38.347 38.347 0 0113.148-15.855 38.22 38.22 0 0139.557-2.435 38.317 38.317 0 0114.987 14.122 38.43 38.43 0 015.529 19.856z" fill="#5F6CAF" />
                <path d="M267.285 191.221s8.979-3.92 13.197.221c4.217 4.142-11.292 2.778-13.197-.221z" fill="#3F3D56" />
                <path d="M282.79 172.628c-3.018-5.109-8.988-5.347-8.988-5.347s-5.817-.746-9.548 7.035c-3.479 7.253-8.279 14.256-.773 15.954l1.356-4.229.839 4.543a29.17 29.17 0 003.212.055c8.038-.26 15.693.076 15.446-2.814-.327-3.842 1.359-10.281-1.544-15.197zM284.291 227.071c.199-.064.396-.132.589-.207l-.044-.061-.545-.031-3.531-.19h-.003l-.593-.03-2.808-.153-6.115-.333-3.276-.176-.166-.011h-.041l-2.307-.125-.752-.041-.715 2.628a37.05 37.05 0 004.37.651 37.582 37.582 0 003.48.16 37.93 37.93 0 006.186-.502 32.702 32.702 0 002.344-.455l.054-.01.024-.007h.003a37.52 37.52 0 002.609-.703l1.237-.404z" fill="#2F2E41" />
                <path d="M268.782 183.724s1.36 8.997-1.361 10.088c-2.721 1.09 5.442 5.725 5.442 5.725h4.626l2.993-6.271s-2.721-4.907-1.089-9.542c1.633-4.635-10.611 0-10.611 0z" fill="#A0616A" />
                <path d="M284.291 227.071v-31.897s-.346-3.276-3.087-2.424c-.28.09-.552.203-.813.339a9.434 9.434 0 00-1.294.846 11.68 11.68 0 00-.481.387c-.014.01-.027.023-.041.034-5.169 4.362-7.615 1.364-8.161.818-.2-.197-.721-.757-1.307-1.389v-.003a55.478 55.478 0 01-.769-.835c-.776-.839-1.461-1.589-1.461-1.589l-2.72 2.179.664 16.526.156 3.897v.004l.051 1.212v.006l.423 10.572.064 1.595a28.592 28.592 0 003.676.91c2.358.428 5.326.649 7.209-.367.381-.204.78-.371 1.193-.499a8.282 8.282 0 012.527-.349c.183.003.363.01.542.02h.004c.807.057 1.607.195 2.388.411l1.237-.404z" fill="#3F3D56" />
                <path d="M271.241 226.066a16.558 16.558 0 01-2.05 2.193c-.23.211-.461.414-.694.615l-.143.118a38.345 38.345 0 01-8.76-1.843c-.42-.142-.841-.292-1.254-.451.262-.664.467-1.349.613-2.047 1.874-8.8-3.574-22.155-4.048-24.297-.173-.771.464-1.84 1.484-2.977 2.226-2.475 6.274-5.272 7.768-6.019a5.598 5.598 0 013.608-.333h.003c.379.078.749.189 1.108.333v.003c.003.051.041.438.105 1.1.034.363.075.805.125 1.321v.003c.092.964.207 2.166.343 3.538v.003c.816 8.45 2.293 23.156 2.869 25.658.214.926-.261 1.999-1.077 3.082zM284.291 227.071c.199-.064.396-.132.589-.207a37.353 37.353 0 003.571-1.504c-1.742-5.099 3.404-21.309 4.878-26.326v-.007c.173-.588.295-1.022.349-1.263.545-2.455-7.755-4.77-8.026-5.316-.21-.415-3.58-.832-5.169-1.005-.492-.055-.813-.085-.813-.085-.421.326-.742 1.263-.993 2.624a4.895 4.895 0 00-.061.34c-.18 1.052-.318 2.325-.43 3.754-.617 7.795-.407 20.111-.969 25.183a10.342 10.342 0 00.139 3.14c.062.335.141.667.237.995.118.426.261.845.427 1.256a32.702 32.702 0 002.344-.455l.054-.011.024-.006h.003a37.52 37.52 0 002.609-.703l1.237-.404z" fill="#D0CDE1" />
                <path d="M282.25 181.133c.301 0 .544-.488.544-1.09 0-.603-.243-1.091-.544-1.091-.3 0-.544.488-.544 1.091 0 .602.244 1.09.544 1.09zM266.197 181.133c.301 0 .544-.488.544-1.09 0-.603-.243-1.091-.544-1.091-.301 0-.544.488-.544 1.091 0 .602.243 1.09.544 1.09z" fill="#A0616A" />
                <path d="M284.291 227.071c.2-.064.396-.132.589-.207a37.245 37.245 0 003.571-1.504v.006a.014.014 0 00.003.004c0-.004.001-.009.004-.013 2.032-10.755 4.187-22.26 4.871-26.323v-.007c.119-.706.193-1.185.214-1.399.271-2.726-6.532-2.726-6.532-2.726l-1.084 5.49-1.636 8.293-.563 2.848-2.971 15.049-.095.482-.22 1.114h.004c.88-.204 1.75-.438 2.608-.703l1.237-.404zM268.354 228.992a38.345 38.345 0 01-8.76-1.843c-.214-.825-.427-1.66-.641-2.498-2.646-10.405-5.136-21.415-5.136-23.479 0-1.707 1.189-2.94 2.572-3.795a14.589 14.589 0 014.231-1.657s.867 3.616 2.114 8.83c.667 2.784 1.44 6.022 2.243 9.41v.004a5560.267 5560.267 0 013.255 13.762v.014a.033.033 0 01.004.013l.081.336c.061.265.122.527.18.785.013.044.023.088.034.135a1.514 1.514 0 01-.177-.017z" fill="#D0CDE1" />
                <path opacity=".2" d="M262.115 203.763l6.123 23.991s-2.857-20.991-6.123-23.991zM278.02 228.65l1.992-.387v.01c-.657.146-1.321.271-1.992.377zM285.927 200.392l-1.636 8.293-.563 2.848-2.967 15.049h-.004l-.091.482h-.004l-.216 1.114h-.004l-.024.007-.054.01-.352.068c.03-.381.068-.788.108-1.219.014-.16.027-.323.044-.492.637-6.936 1.996-18.916 4.127-23.933.501-1.182 1.047-1.976 1.636-2.227z" fill="#000" />
                <path d="M274.224 188.086c4.357 0 7.89-3.54 7.89-7.907s-3.533-7.907-7.89-7.907c-4.358 0-7.891 3.54-7.891 7.907s3.533 7.907 7.891 7.907z" fill="#A0616A" />
                <path d="M281.455 172.135l-5.897-3.095-8.145 1.266-1.685 7.458 4.195-.162 1.172-2.739v2.694l1.935-.074 1.123-4.363.703 4.644 6.88-.141-.281-5.488z" fill="#2F2E41" />
                <path d="M213.564 142.246c0 6.09-1.447 12.093-4.222 17.512a38.331 38.331 0 01-11.735 13.648 37.6 37.6 0 01-4.224 2.648 38.31 38.31 0 01-26.211 3.687 37.268 37.268 0 01-5.563-1.657 38.287 38.287 0 01-16.522-12.244 38.43 38.43 0 01-4.695-39.392 38.35 38.35 0 0113.178-15.8 38.218 38.218 0 0139.521-2.358 38.314 38.314 0 0114.956 14.12 38.424 38.424 0 015.517 19.836z" fill="#5F6CAF" />
                <path d="M172.868 139.744c4.862 0 8.804-3.95 8.804-8.822 0-4.873-3.942-8.823-8.804-8.823-4.863 0-8.805 3.95-8.805 8.823 0 4.872 3.942 8.822 8.805 8.822z" fill="#FFB8B8" />
                <path d="M169.428 137.676s1.101 5.239 1.101 5.79c0 .552 5.227 3.033 5.227 3.033l4.678-.827 1.651-4.963s-2.752-4.135-2.752-5.79l-9.905 2.757z" fill="#FFB8B8" />
                <path d="M175.282 180.607a38.254 38.254 0 01-8.11-.866 336.804 336.804 0 01-.221-5.673l-2.683-7.801-5.569-16.183 11.467-8.772s2.839 4.634 6.966 3.256a5.7 5.7 0 004.038-5.33l13.571 4.78-2.344 19.062-.132 1.066 1.118 11.908a38.031 38.031 0 01-18.101 4.553z" fill="#D0CDE1" />
                <path d="M165.232 123.813s2.796-6.069 8.153-4.668c5.358 1.4 8.387 3.501 8.619 5.602.233 2.101-.116 5.252-.116 5.252s-.582-4.318-4.31-3.384c-3.727.933-9.55.233-9.55.233l-.932 8.403s-1.048-1.517-2.213-.583c-1.165.934-3.378-8.987.349-10.855z" fill="#2F2E41" />
                <path d="M153.624 173.878l1.772-14.971c-.275-5.791 3.303-8.823 3.303-8.823h4.126l3.025 10.202-1.582 5.981-1.992 7.526-.552.829s.552.825.274 1.103c-.274.275-.548 1.378-.548 1.378s.057.394.159.981a37.837 37.837 0 01-7.985-4.206zM204.373 167.18a38.203 38.203 0 01-6.766 6.226 12.73 12.73 0 01-.941-2.094l-4.269-8.233-2.883-5.553.549-14.337 4.678.829s2.751 2.756 3.852 6.066l2.202 9.923 3.574 7.17.004.003z" fill="#D0CDE1" />
                <path d="M400.569 120.18a38.388 38.388 0 01-4.906 18.802 38.3 38.3 0 01-15.552 15.152 36.114 36.114 0 01-3.236 1.518v.003c-.352.146-.704.285-1.06.418-.166.064-.336.129-.505.19a38.324 38.324 0 01-13.023 2.278 38.327 38.327 0 01-8.662-.985 37.67 37.67 0 01-4.353-1.29h-.004a38.134 38.134 0 01-6.552-3.113 38.341 38.341 0 01-14.234-14.961 38.436 38.436 0 011.136-38.014 38.317 38.317 0 0114.19-13.595 38.22 38.22 0 0137.948.568 38.324 38.324 0 0113.778 14.014 38.412 38.412 0 015.035 19.015z" fill="#5F6CAF" />
                <path d="M357.875 114.58s.226 5.904-1.133 7.266c-1.36 1.363 6.798 6.131 6.798 6.131l4.759-7.493s-1.813-3.179-1.36-5.904h-9.064z" fill="#A0616A" />
                <path d="M361.84 117.872c4.506 0 8.158-3.66 8.158-8.174 0-4.515-3.652-8.175-8.158-8.175-4.505 0-8.158 3.66-8.158 8.175 0 4.514 3.653 8.174 8.158 8.174z" fill="#A0616A" />
                <path d="M375.666 154.179c.051.631.1 1.262.149 1.894-.166.064-.335.129-.505.19a38.318 38.318 0 01-13.022 2.278 38.329 38.329 0 01-8.663-.985 37.67 37.67 0 01-4.353-1.29l-.004.031a9.269 9.269 0 01.387-2.071v-.003c.189-.7.447-1.508.741-2.4.319-.954.339-3.039.272-4.998-.007-.149-.011-.302-.017-.448a96.393 96.393 0 00-.095-1.782c-.078-1.219-.16-2.084-.16-2.084l-4.986-13.399 12.043-8.813c.712 2.312 2.236 2.23 2.236 2.23 6.464.445 7.653-4.03 7.69-4.176v-.003l11.57 7.584-4.757 11.58s.193 1.962.468 4.956c.04.441.081.906.129 1.392.264 2.94.586 6.603.877 10.317z" fill="#D0CDE1" />
                <path d="M350.962 144.666l-.237 1.725-.058.434-1.006 7.367-.007.031v.003l-.382 2.04-.004.031a.055.055 0 010-.031 38.134 38.134 0 01-6.552-3.113c.282-.879.614-1.74.996-2.58l.691-5.391.214-1.65 5.939 1.063.406.071z" fill="#A0616A" />
                <path d="M348.697 128.772l-3.286.341s-2.153 16.009-1.473 16.009c.68 0 8.385 1.817 8.611 1.362.227-.454-3.852-17.712-3.852-17.712z" fill="#D0CDE1" />
                <path d="M355.546 101.318l-1.471-.536s3.075-3.082 7.353-2.814l-1.203-1.205s2.941-1.072 5.615 1.741c1.406 1.48 3.032 3.218 4.046 5.176h1.575l-.658 1.317 2.301 1.318-2.361-.237a6.67 6.67 0 01-.224 3.412l-.534 1.473s-2.139-4.287-2.139-4.823v1.34s-1.471-1.206-1.471-2.009l-.802.937-.401-1.473-4.947 1.473.802-1.205-3.075.402 1.204-1.474s-3.476 1.742-3.61 3.215c-.134 1.474-1.872 3.349-1.872 3.349l-.802-1.339s-1.203-6.029 2.674-8.038z" fill="#2F2E41" />
                <path d="M382.184 152.956a38.4 38.4 0 01-5.309 2.696v.003c-.352.146-.704.285-1.06.418-.166.064-.335.129-.505.19l.356-2.084-1.613-10.27-.203-1.286.81-.153 7.575-1.436v9.312s.02 1.008-.051 2.61z" fill="#A0616A" />
                <path d="M374.531 125.366l4.419.568s5.325 16.236 3.965 16.917c-1.359.681-10.197 1.136-10.197 1.136l1.813-18.621z" fill="#D0CDE1" />
                <path d="M180.92 265L147 214s51.369 18.153 45.539 51H180.92z" fill="#3F3D56" />
                <path d="M182.343 265L217 214s-52.485 18.153-46.529 51h11.872z" fill="#5F6CAF" />
                <path d="M178 183c-.433 0-.869-.007-1.298-.02l.009-.312c.616.019 1.245.025 1.863.016l.005.312c-.193.003-.386.004-.579.004zm2.455-.072l-.019-.311a42.748 42.748 0 001.857-.152l.032.31a41.81 41.81 0 01-1.87.153zm-5.628-.049a41.72 41.72 0 01-1.868-.186l.039-.309c.612.075 1.236.137 1.853.184l-.024.311zm9.36-.343l-.047-.308a41.102 41.102 0 001.835-.321l.061.306c-.609.121-1.231.23-1.849.323zm-13.085-.114a41.301 41.301 0 01-1.843-.356l.066-.304c.604.131 1.22.25 1.829.353l-.052.307zm16.766-.617l-.075-.303a39.995 39.995 0 001.798-.489l.089.299c-.596.177-1.206.343-1.812.493zm-20.434-.179a41.284 41.284 0 01-1.802-.524l.094-.298c.589.187 1.191.362 1.788.52l-.08.302zm24.033-.889l-.103-.294a40.195 40.195 0 001.745-.653l.116.29c-.578.232-1.17.453-1.758.657zm-27.616-.244a40.195 40.195 0 01-1.75-.69l.121-.287c.571.24 1.156.471 1.736.684l-.107.293zm31.097-1.149l-.129-.284c.56-.254 1.124-.526 1.674-.808l.142.278c-.555.284-1.123.558-1.687.814zm-34.564-.311a41.816 41.816 0 01-1.678-.847l.147-.275c.547.292 1.107.575 1.666.841l-.135.281zm37.9-1.394l-.155-.271a40.537 40.537 0 001.595-.958l.166.263c-.524.332-1.065.657-1.606.966zm-41.215-.377a40.713 40.713 0 01-1.593-.998l.172-.26c.518.341 1.049.674 1.58.99l-.159.268zm44.383-1.627l-.179-.256a39.318 39.318 0 001.502-1.101l.19.248c-.494.379-1.003.752-1.513 1.109zm-47.521-.439a41.753 41.753 0 01-1.494-1.139l.195-.243c.484.387.983.767 1.483 1.129l-.184.253zm50.495-1.847l-.201-.239a40.59 40.59 0 001.396-1.233l.211.229a41.21 41.21 0 01-1.406 1.243zm-53.429-.497c-.469-.41-.935-.837-1.384-1.269l.216-.225c.446.429.908.852 1.373 1.26l-.205.234zm56.184-2.051l-.222-.219a40.82 40.82 0 001.278-1.356l.232.209c-.416.462-.85.921-1.288 1.366zm-58.892-.548c-.43-.452-.855-.919-1.263-1.389l.236-.204c.404.466.826.929 1.252 1.378l-.225.215zm61.405-2.242l-.241-.198c.393-.478.78-.971 1.15-1.466l.25.186c-.373.499-.763.997-1.159 1.478zm-63.865-.592a39.35 39.35 0 01-1.13-1.497l.253-.182c.361.502.738 1.002 1.121 1.486l-.244.193zm66.114-2.415l-.258-.175c.348-.512.689-1.039 1.012-1.567l.266.163a39.69 39.69 0 01-1.02 1.579zm-68.305-.629a41.094 41.094 0 01-.988-1.593l.269-.158c.313.532.643 1.064.98 1.581l-.261.17zm70.272-2.573l-.273-.151c.299-.542.59-1.098.865-1.654l.279.139c-.276.559-.57 1.12-.871 1.666zm-72.174-.656a40.898 40.898 0 01-.838-1.676l.282-.133c.263.558.543 1.118.831 1.663l-.275.146zm73.839-2.715l-.286-.125c.249-.568.487-1.149.709-1.727l.292.112a41.791 41.791 0 01-.715 1.74zm-75.437-.673a41.41 41.41 0 01-.681-1.744l.293-.107c.211.58.438 1.162.675 1.731l-.287.12zm76.785-2.84l-.296-.098c.195-.586.378-1.185.546-1.781l.3.085c-.169.6-.354 1.204-.55 1.794zm-78.066-.683a39.95 39.95 0 01-.518-1.804l.301-.079c.157.598.33 1.201.514 1.79l-.297.093zm79.082-2.93l-.303-.07a41.23 41.23 0 00.379-1.824l.307.056a40.462 40.462 0 01-.383 1.838zm-80.034-.7c-.13-.609-.248-1.23-.35-1.845l.307-.051c.102.611.218 1.226.347 1.83l-.304.066zm80.714-2.991l-.309-.042c.084-.611.154-1.234.21-1.851l.311.028c-.056.622-.128 1.25-.212 1.865zm-81.329-.712a41.411 41.411 0 01-.179-1.868l.311-.023c.045.618.105 1.242.178 1.854l-.31.037zm81.668-3.026l-.312-.014c.028-.617.042-1.244.042-1.862H219a41.9 41.9 0 01-.042 1.876zm-81.942-.717a40.465 40.465 0 01-.01-1.877l.312.005a42.28 42.28 0 00.01 1.863l-.312.009zm81.67-1.594a41.298 41.298 0 00-.061-1.862l.311-.018c.034.623.055 1.254.062 1.877l-.312.003zm-81.294-2.139l-.311-.02c.039-.623.092-1.252.159-1.87l.31.034a42.198 42.198 0 00-.158 1.856zm81.087-1.58a42.607 42.607 0 00-.23-1.849l.308-.045c.091.616.169 1.243.232 1.862l-.31.032zm-80.686-2.123l-.308-.048c.095-.617.206-1.238.33-1.848l.305.062a41.603 41.603 0 00-.327 1.834zm80.141-1.562a40.851 40.851 0 00-.399-1.819l.303-.074c.147.604.282 1.221.402 1.834l-.306.059zm-79.402-2.089l-.303-.076c.152-.603.319-1.212.499-1.809l.298.089a40.46 40.46 0 00-.494 1.796zm78.521-1.53a41.086 41.086 0 00-.565-1.775l.295-.101c.202.589.394 1.191.569 1.789l-.299.087zm-77.448-2.042l-.294-.103c.207-.59.431-1.182.665-1.76l.289.116a39.112 39.112 0 00-.66 1.747zm76.237-1.48a41.584 41.584 0 00-.724-1.712l.284-.128c.255.567.501 1.147.73 1.725l-.29.115zm-74.838-1.98l-.283-.13c.26-.568.537-1.136.824-1.691l.277.143a41.894 41.894 0 00-.818 1.678zm73.312-1.409a40.927 40.927 0 00-.879-1.639l.272-.154c.306.542.604 1.097.885 1.652l-.278.141zm-71.601-1.906l-.27-.156c.311-.54.639-1.081.975-1.607l.263.168a41.773 41.773 0 00-.968 1.595zm69.769-1.331a40.822 40.822 0 00-1.025-1.553l.256-.178c.354.51.701 1.037 1.033 1.565l-.264.166zm-67.762-1.812l-.255-.18c.36-.509.736-1.018 1.118-1.51l.246.191a41.7 41.7 0 00-1.109 1.499zm65.641-1.246a40.885 40.885 0 00-1.163-1.454l.239-.2c.399.476.794.969 1.172 1.465l-.248.189zm-63.356-1.699l-.238-.202c.404-.474.824-.945 1.25-1.402l.228.213c-.423.453-.84.921-1.24 1.391zm60.965-1.155a40.952 40.952 0 00-1.291-1.343l.22-.221c.441.439.878.894 1.3 1.353l-.229.211zm-58.424-1.569l-.218-.223a41.41 41.41 0 011.372-1.281l.207.232c-.46.411-.918.839-1.361 1.272zm55.782-1.057a40.61 40.61 0 00-1.409-1.22l.199-.24c.479.396.957.81 1.419 1.229l-.209.231zm-53.004-1.423l-.197-.242c.483-.393.981-.78 1.482-1.151l.185.25a41.84 41.84 0 00-1.47 1.143zm50.133-.952a41.93 41.93 0 00-1.515-1.088l.176-.257c.514.351 1.027.72 1.526 1.096l-.187.249zm-47.142-1.265l-.174-.258a39.484 39.484 0 011.579-1.011l.162.266c-.528.321-1.055.659-1.567 1.003zm44.064-.84a41.212 41.212 0 00-1.608-.945l.152-.272c.544.303 1.089.623 1.62.952l-.164.265zm-40.886-1.093l-.15-.274a42.218 42.218 0 011.664-.861l.137.28c-.554.271-1.109.558-1.651.855zm37.628-.722a39.884 39.884 0 00-1.689-.794l.126-.285c.57.252 1.143.521 1.702.8l-.139.279zm-34.289-.911l-.124-.286a41.185 41.185 0 011.735-.706l.111.292c-.576.219-1.155.454-1.722.7zm30.875-.598a39.902 39.902 0 00-1.756-.635l.099-.296a40.54 40.54 0 011.77.64l-.113.291zm-27.397-.723l-.097-.296a40.767 40.767 0 011.797-.544l.083.301c-.595.165-1.195.346-1.783.539zm23.862-.464a41.483 41.483 0 00-1.803-.469l.072-.303c.606.143 1.217.302 1.816.472l-.085.3zm-20.273-.532l-.069-.304a41.02 41.02 0 011.839-.376l.055.307c-.608.11-1.222.235-1.825.373zm16.648-.322a40.669 40.669 0 00-1.838-.302l.043-.308c.617.086 1.24.188 1.852.303l-.057.307zm-12.982-.34l-.042-.309a41.558 41.558 0 011.866-.205l.027.31c-.616.054-1.239.123-1.851.204zm9.293-.178a40.896 40.896 0 00-1.858-.133l.015-.311c.624.03 1.254.075 1.873.133l-.03.311zm-5.583-.145l-.013-.312A41.672 41.672 0 01178 101h.141l-.001.312H178c-.575 0-1.154.012-1.723.036zM275 232c-.433 0-.869-.007-1.298-.02l.009-.312c.616.019 1.245.025 1.863.016l.005.312c-.193.003-.386.004-.579.004zm2.455-.072l-.019-.311a42.748 42.748 0 001.857-.152l.032.31a41.81 41.81 0 01-1.87.153zm-5.628-.049a41.72 41.72 0 01-1.868-.186l.039-.309c.612.075 1.236.137 1.853.184l-.024.311zm9.36-.343l-.047-.308a41.102 41.102 0 001.835-.321l.061.306c-.609.121-1.231.23-1.849.323zm-13.085-.114a41.301 41.301 0 01-1.843-.356l.066-.304c.604.131 1.22.25 1.829.353l-.052.307zm16.766-.617l-.075-.303a39.995 39.995 0 001.798-.489l.089.299c-.596.177-1.206.343-1.812.493zm-20.434-.179a41.284 41.284 0 01-1.802-.524l.094-.298c.589.187 1.191.362 1.788.52l-.08.302zm24.033-.889l-.103-.294a40.195 40.195 0 001.745-.653l.116.29c-.578.232-1.17.453-1.758.657zm-27.616-.244a40.195 40.195 0 01-1.75-.69l.121-.287c.571.24 1.156.471 1.736.684l-.107.293zm31.097-1.149l-.129-.284c.56-.254 1.124-.526 1.674-.808l.142.278c-.555.284-1.123.558-1.687.814zm-34.564-.311a41.816 41.816 0 01-1.678-.847l.147-.275c.547.292 1.107.575 1.666.841l-.135.281zm37.9-1.394l-.155-.271a40.537 40.537 0 001.595-.958l.166.263c-.524.332-1.065.657-1.606.966zm-41.215-.377a40.713 40.713 0 01-1.593-.998l.172-.26c.518.341 1.049.674 1.58.99l-.159.268zm44.383-1.627l-.179-.256a39.318 39.318 0 001.502-1.101l.19.248c-.494.379-1.003.752-1.513 1.109zm-47.521-.439a41.753 41.753 0 01-1.494-1.139l.195-.243c.484.387.983.767 1.483 1.129l-.184.253zm50.495-1.847l-.201-.239a40.59 40.59 0 001.396-1.233l.211.229a41.21 41.21 0 01-1.406 1.243zm-53.429-.497c-.469-.41-.935-.837-1.384-1.269l.216-.225c.446.429.908.852 1.373 1.26l-.205.234zm56.184-2.051l-.222-.219a40.82 40.82 0 001.278-1.356l.232.209c-.416.462-.85.921-1.288 1.366zm-58.892-.548c-.43-.452-.855-.919-1.263-1.389l.236-.204c.404.466.826.929 1.252 1.378l-.225.215zm61.405-2.242l-.241-.198c.393-.478.78-.971 1.15-1.466l.25.186c-.373.499-.763.997-1.159 1.478zm-63.865-.592a39.35 39.35 0 01-1.13-1.497l.253-.182c.361.502.738 1.002 1.121 1.486l-.244.193zm66.114-2.415l-.258-.175c.348-.512.689-1.039 1.012-1.567l.266.163a39.69 39.69 0 01-1.02 1.579zm-68.305-.629a41.094 41.094 0 01-.988-1.593l.269-.158c.313.532.643 1.064.98 1.581l-.261.17zm70.272-2.573l-.273-.151c.299-.542.59-1.098.865-1.654l.279.139c-.276.559-.57 1.12-.871 1.666zm-72.174-.656a40.898 40.898 0 01-.838-1.676l.282-.133c.263.558.543 1.118.831 1.663l-.275.146zm73.839-2.715l-.286-.125c.249-.568.487-1.149.709-1.727l.292.112a41.791 41.791 0 01-.715 1.74zm-75.437-.673a41.41 41.41 0 01-.681-1.744l.293-.107c.211.58.438 1.162.675 1.731l-.287.12zm76.785-2.84l-.296-.098c.195-.586.378-1.185.546-1.781l.3.085c-.169.6-.354 1.204-.55 1.794zm-78.066-.683a39.95 39.95 0 01-.518-1.804l.301-.079c.157.598.33 1.201.514 1.79l-.297.093zm79.082-2.93l-.303-.07a41.23 41.23 0 00.379-1.824l.307.056a40.462 40.462 0 01-.383 1.838zm-80.034-.7c-.13-.609-.248-1.23-.35-1.845l.307-.051c.102.611.218 1.226.347 1.83l-.304.066zm80.714-2.991l-.309-.042c.084-.611.154-1.234.21-1.851l.311.028c-.056.622-.128 1.25-.212 1.865zm-81.329-.712a41.411 41.411 0 01-.179-1.868l.311-.023c.045.618.105 1.242.178 1.854l-.31.037zm81.668-3.026l-.312-.014c.028-.617.042-1.244.042-1.862H316a41.9 41.9 0 01-.042 1.876zm-81.942-.717a40.465 40.465 0 01-.01-1.877l.312.005a42.28 42.28 0 00.01 1.863l-.312.009zm81.67-1.594a41.298 41.298 0 00-.061-1.862l.311-.018c.034.623.055 1.254.062 1.877l-.312.003zm-81.294-2.139l-.311-.02c.039-.623.092-1.252.159-1.87l.31.034a42.198 42.198 0 00-.158 1.856zm81.087-1.58a42.607 42.607 0 00-.23-1.849l.308-.045c.091.616.169 1.243.232 1.862l-.31.032zm-80.686-2.123l-.308-.048c.095-.617.206-1.238.33-1.848l.305.062a41.603 41.603 0 00-.327 1.834zm80.141-1.562a40.851 40.851 0 00-.399-1.819l.303-.074c.147.604.282 1.221.402 1.834l-.306.059zm-79.402-2.089l-.303-.076c.152-.603.319-1.212.499-1.809l.298.089a40.46 40.46 0 00-.494 1.796zm78.521-1.53a41.086 41.086 0 00-.565-1.775l.295-.101c.202.589.394 1.191.569 1.789l-.299.087zm-77.448-2.042l-.294-.103c.207-.59.431-1.182.665-1.76l.289.116a39.112 39.112 0 00-.66 1.747zm76.237-1.48a41.584 41.584 0 00-.724-1.712l.284-.128c.255.567.501 1.147.73 1.725l-.29.115zm-74.838-1.98l-.283-.13c.26-.568.537-1.136.824-1.691l.277.143a41.894 41.894 0 00-.818 1.678zm73.312-1.409a40.927 40.927 0 00-.879-1.639l.272-.154c.306.542.604 1.097.885 1.652l-.278.141zm-71.601-1.906l-.27-.156c.311-.54.639-1.081.975-1.607l.263.168a41.773 41.773 0 00-.968 1.595zm69.769-1.331a40.822 40.822 0 00-1.025-1.553l.256-.178c.354.51.701 1.037 1.033 1.565l-.264.166zm-67.762-1.812l-.255-.18c.36-.509.736-1.018 1.118-1.51l.246.191a41.7 41.7 0 00-1.109 1.499zm65.641-1.246a40.885 40.885 0 00-1.163-1.454l.239-.2c.399.476.794.969 1.172 1.465l-.248.189zm-63.356-1.699l-.238-.202c.404-.474.824-.945 1.25-1.402l.228.213c-.423.453-.84.921-1.24 1.391zm60.965-1.155a40.952 40.952 0 00-1.291-1.343l.22-.221c.441.439.878.894 1.3 1.353l-.229.211zm-58.424-1.569l-.218-.223a41.41 41.41 0 011.372-1.281l.207.232c-.46.411-.918.839-1.361 1.272zm55.782-1.057a40.61 40.61 0 00-1.409-1.22l.199-.24c.479.396.957.81 1.419 1.229l-.209.231zm-53.004-1.423l-.197-.242c.483-.393.981-.78 1.482-1.151l.185.25a41.84 41.84 0 00-1.47 1.143zm50.133-.952a41.93 41.93 0 00-1.515-1.088l.176-.257c.514.351 1.027.72 1.526 1.096l-.187.249zm-47.142-1.265l-.174-.258a39.484 39.484 0 011.579-1.011l.162.266c-.528.321-1.055.659-1.567 1.003zm44.064-.84a41.212 41.212 0 00-1.608-.945l.152-.272c.544.303 1.089.623 1.62.952l-.164.265zm-40.886-1.093l-.15-.274a42.218 42.218 0 011.664-.861l.137.28c-.554.271-1.109.558-1.651.855zm37.628-.722a39.884 39.884 0 00-1.689-.794l.126-.285c.57.252 1.143.521 1.702.8l-.139.279zm-34.289-.911l-.124-.286a41.185 41.185 0 011.735-.706l.111.292c-.576.219-1.155.454-1.722.7zm30.875-.598a39.902 39.902 0 00-1.756-.635l.099-.296a40.54 40.54 0 011.77.64l-.113.291zm-27.397-.723l-.097-.296a40.767 40.767 0 011.797-.544l.083.301c-.595.165-1.195.346-1.783.539zm23.862-.464a41.483 41.483 0 00-1.803-.469l.072-.303c.606.143 1.217.302 1.816.472l-.085.3zm-20.273-.532l-.069-.304a41.02 41.02 0 011.839-.376l.055.307c-.608.11-1.222.235-1.825.373zm16.648-.322a40.669 40.669 0 00-1.838-.302l.043-.308c.617.086 1.24.188 1.852.303l-.057.307zm-12.982-.34l-.042-.309a41.558 41.558 0 011.866-.205l.027.31c-.616.054-1.239.123-1.851.204zm9.293-.178a40.896 40.896 0 00-1.858-.133l.015-.311c.624.03 1.254.075 1.873.133l-.03.311zm-5.583-.145l-.013-.312A41.672 41.672 0 01275 150h.141l-.001.312H275c-.575 0-1.154.012-1.723.036zM365 162c-.433 0-.869-.007-1.298-.02l.009-.312c.616.019 1.245.025 1.863.016l.005.312c-.193.003-.386.004-.579.004zm2.455-.072l-.019-.311a42.748 42.748 0 001.857-.152l.032.31a41.81 41.81 0 01-1.87.153zm-5.628-.049a41.72 41.72 0 01-1.868-.186l.039-.309c.612.075 1.236.137 1.853.184l-.024.311zm9.36-.343l-.047-.308a41.102 41.102 0 001.835-.321l.061.306c-.609.121-1.231.23-1.849.323zm-13.085-.114a41.301 41.301 0 01-1.843-.356l.066-.304c.604.131 1.22.25 1.829.353l-.052.307zm16.766-.617l-.075-.303a39.995 39.995 0 001.798-.489l.089.299c-.596.177-1.206.343-1.812.493zm-20.434-.179a41.284 41.284 0 01-1.802-.524l.094-.298c.589.187 1.191.362 1.788.52l-.08.302zm24.033-.889l-.103-.294a40.195 40.195 0 001.745-.653l.116.29c-.578.232-1.17.453-1.758.657zm-27.616-.244a40.195 40.195 0 01-1.75-.69l.121-.287c.571.24 1.156.471 1.736.684l-.107.293zm31.097-1.149l-.129-.284c.56-.254 1.124-.526 1.674-.808l.142.278c-.555.284-1.123.558-1.687.814zm-34.564-.311a41.816 41.816 0 01-1.678-.847l.147-.275c.547.292 1.107.575 1.666.841l-.135.281zm37.9-1.394l-.155-.271a40.537 40.537 0 001.595-.958l.166.263c-.524.332-1.065.657-1.606.966zm-41.215-.377a40.713 40.713 0 01-1.593-.998l.172-.26c.518.341 1.049.674 1.58.99l-.159.268zm44.383-1.627l-.179-.256a39.318 39.318 0 001.502-1.101l.19.248c-.494.379-1.003.752-1.513 1.109zm-47.521-.439a41.753 41.753 0 01-1.494-1.139l.195-.243c.484.387.983.767 1.483 1.129l-.184.253zm50.495-1.847l-.201-.239a40.59 40.59 0 001.396-1.233l.211.229a41.21 41.21 0 01-1.406 1.243zm-53.429-.497c-.469-.41-.935-.837-1.384-1.269l.216-.225c.446.429.908.852 1.373 1.26l-.205.234zm56.184-2.051l-.222-.219a40.82 40.82 0 001.278-1.356l.232.209c-.416.462-.85.921-1.288 1.366zm-58.892-.548c-.43-.452-.855-.919-1.263-1.389l.236-.204c.404.466.826.929 1.252 1.378l-.225.215zm61.405-2.242l-.241-.198c.393-.478.78-.971 1.15-1.466l.25.186c-.373.499-.763.997-1.159 1.478zm-63.865-.592a39.35 39.35 0 01-1.13-1.497l.253-.182c.361.502.738 1.002 1.121 1.486l-.244.193zm66.114-2.415l-.258-.175c.348-.512.689-1.039 1.012-1.567l.266.163a39.69 39.69 0 01-1.02 1.579zm-68.305-.629a41.094 41.094 0 01-.988-1.593l.269-.158c.313.532.643 1.064.98 1.581l-.261.17zm70.272-2.573l-.273-.151c.299-.542.59-1.098.865-1.654l.279.139c-.276.559-.57 1.12-.871 1.666zm-72.174-.656a40.898 40.898 0 01-.838-1.676l.282-.133c.263.558.543 1.118.831 1.663l-.275.146zm73.839-2.715l-.286-.125c.249-.568.487-1.149.709-1.727l.292.112a41.791 41.791 0 01-.715 1.74zm-75.437-.673a41.41 41.41 0 01-.681-1.744l.293-.107c.211.58.438 1.162.675 1.731l-.287.12zm76.785-2.84l-.296-.098c.195-.586.378-1.185.546-1.781l.3.085c-.169.6-.354 1.204-.55 1.794zm-78.066-.683a39.95 39.95 0 01-.518-1.804l.301-.079c.157.598.33 1.201.514 1.79l-.297.093zm79.082-2.93l-.303-.07a41.23 41.23 0 00.379-1.824l.307.056a40.462 40.462 0 01-.383 1.838zm-80.034-.7c-.13-.609-.248-1.23-.35-1.845l.307-.051c.102.611.218 1.226.347 1.83l-.304.066zm80.714-2.991l-.309-.042c.084-.611.154-1.234.21-1.851l.311.028c-.056.622-.128 1.25-.212 1.865zm-81.329-.712a41.411 41.411 0 01-.179-1.868l.311-.023c.045.618.105 1.242.178 1.854l-.31.037zm81.668-3.026l-.312-.014c.028-.617.042-1.244.042-1.862H406a41.9 41.9 0 01-.042 1.876zm-81.942-.717a40.465 40.465 0 01-.01-1.877l.312.005a42.28 42.28 0 00.01 1.863l-.312.009zm81.67-1.594a41.298 41.298 0 00-.061-1.862l.311-.018c.034.623.055 1.254.062 1.877l-.312.003zm-81.294-2.139l-.311-.02c.039-.623.092-1.252.159-1.87l.31.034a42.198 42.198 0 00-.158 1.856zm81.087-1.58a42.607 42.607 0 00-.23-1.849l.308-.045c.091.616.169 1.243.232 1.862l-.31.032zm-80.686-2.123l-.308-.048c.095-.617.206-1.238.33-1.848l.305.062a41.603 41.603 0 00-.327 1.834zm80.141-1.562a40.851 40.851 0 00-.399-1.819l.303-.074c.147.604.282 1.221.402 1.834l-.306.059zm-79.402-2.089l-.303-.076c.152-.603.319-1.212.499-1.809l.298.089a40.46 40.46 0 00-.494 1.796zm78.521-1.53a41.086 41.086 0 00-.565-1.775l.295-.101c.202.589.394 1.191.569 1.789l-.299.087zm-77.448-2.042l-.294-.103c.207-.59.431-1.182.665-1.76l.289.116a39.112 39.112 0 00-.66 1.747zm76.237-1.48a41.584 41.584 0 00-.724-1.712l.284-.128c.255.567.501 1.147.73 1.725l-.29.115zm-74.838-1.98l-.283-.13c.26-.568.537-1.136.824-1.691l.277.143a41.894 41.894 0 00-.818 1.678zm73.312-1.409a40.927 40.927 0 00-.879-1.639l.272-.154c.306.542.604 1.097.885 1.652l-.278.141zm-71.601-1.906l-.27-.156c.311-.54.639-1.08.975-1.607l.263.168a41.848 41.848 0 00-.968 1.595zm69.769-1.33a40.428 40.428 0 00-1.025-1.554l.256-.178c.354.51.701 1.037 1.033 1.565l-.264.166zm-67.762-1.813l-.255-.18c.36-.51.736-1.017 1.118-1.51l.246.191c-.379.489-.752.993-1.109 1.499zm65.641-1.246a40.53 40.53 0 00-1.163-1.454l.239-.2c.399.476.794.969 1.172 1.465l-.248.19zm-63.356-1.699l-.238-.202c.404-.474.824-.945 1.25-1.402l.228.213c-.423.453-.84.92-1.24 1.391zm60.965-1.155a41.147 41.147 0 00-1.291-1.343l.22-.22c.441.438.878.893 1.3 1.352l-.229.211zm-58.424-1.569l-.218-.223c.446-.436.908-.867 1.372-1.281l.207.232c-.46.411-.918.84-1.361 1.272zm55.782-1.057a40.84 40.84 0 00-1.409-1.22l.199-.24c.479.396.957.81 1.419 1.23l-.209.23zm-53.004-1.423l-.197-.242c.483-.393.981-.78 1.482-1.151l.185.25c-.497.369-.991.753-1.47 1.143zm50.133-.952a41.674 41.674 0 00-1.515-1.088l.176-.257c.514.351 1.027.72 1.526 1.096l-.187.249zm-47.142-1.265l-.174-.258a40.994 40.994 0 011.579-1.011l.162.266a40.73 40.73 0 00-1.567 1.003zm44.064-.84a41.086 41.086 0 00-1.608-.945l.152-.272a41.45 41.45 0 011.62.952l-.164.265zm-40.886-1.093l-.15-.274a41.305 41.305 0 011.664-.861l.137.28c-.554.27-1.109.559-1.651.855zm37.628-.722a41.024 41.024 0 00-1.689-.794l.126-.285c.57.252 1.143.521 1.702.8l-.139.279zm-34.289-.911l-.124-.287a41.438 41.438 0 011.735-.704l.111.291c-.576.219-1.155.454-1.722.7zm30.875-.598a40.421 40.421 0 00-1.756-.635l.099-.296a40.8 40.8 0 011.77.64l-.113.29zm-27.397-.723l-.097-.296a40.76 40.76 0 011.797-.544l.083.3c-.595.166-1.195.347-1.783.54zm23.862-.464a40.502 40.502 0 00-1.803-.469l.072-.303c.606.143 1.217.302 1.816.472l-.085.3zm-20.273-.532l-.069-.304a40.6 40.6 0 011.839-.376l.055.307c-.608.11-1.222.235-1.825.373zm16.648-.322a40.806 40.806 0 00-1.838-.302l.043-.308c.617.086 1.24.189 1.852.303l-.057.307zm-12.982-.34l-.042-.309a41.127 41.127 0 011.866-.205l.027.31c-.616.054-1.239.123-1.851.204zm9.293-.178a40.896 40.896 0 00-1.858-.133l.015-.311c.624.03 1.254.075 1.873.133l-.03.31zm-5.583-.145l-.013-.312A42.196 42.196 0 01365 80h.141l-.001.312H365c-.575 0-1.154.012-1.723.036z" fill="#3F3D56" />
                <path d="M440.856 262.344c1.022-.378 2.115-.316 3.182-.435a9.8 9.8 0 005.853-2.875 10.872 10.872 0 002.339-3.62c-.337.124-.674.254-1.021.393 1.021-2.415-.051-5.124-.991-7.565a328.164 328.164 0 01-4.52-12.478c-3.575-10.596-6.639-21.615-6.573-32.889 0-4.074.741-7.927.884-11.997.107-3.02-.353-6.034-.332-9.059 0-.424 0-.843.03-1.267a8.044 8.044 0 01-2.098-2.957 8.103 8.103 0 01-.593-3.59 16.05 16.05 0 01.27-1.903 31.35 31.35 0 01.715-3.237c.337-1.122.797-2.198 1.19-3.294.761-2.125 1.277-4.339 1.926-6.5a2.185 2.185 0 00-.695.191c.164-.194.276-.427.327-.677.381-1.376.587-2.796.613-4.225l-.434-.197a11.117 11.117 0 01.209-4.183c-.245-2.219-.628-4.452-.863-6.661-.087-.827-.051-1.866.7-2.068.153-1.184.214-2.384.276-3.578.214-4.168.427-8.335.638-12.499.214-4.183.429-8.362.511-12.55.056-2.658.087-5.409.71-7.954a9.726 9.726 0 01.362-3.619c.95-3.046 3.902-5.461 6.895-5.29a13.803 13.803 0 013.264-3.341 58.571 58.571 0 00-1.9-3.847c-4.791-1.578-8.295-6.36-8.295-12.05a13.289 13.289 0 011.405-5.992 6.546 6.546 0 01-.225-.699 5.808 5.808 0 01.23-3.356c.144-.41.314-.811.511-1.2.133-.258.276-.516.424-.765l.26-.398a7.54 7.54 0 01.511-.703c.363-.493.751-.966 1.164-1.417a11.577 11.577 0 011.676-1.51 7.341 7.341 0 012.757-1.288 8.311 8.311 0 011.752-.16c.353 0 .71 0 1.063.031.715.041 1.424.093 2.134.088.235 0 .475 0 .71-.036 1.25-.169 2.486-.43 3.698-.781l.613-.13a11.536 11.536 0 012.313-.207h.567c.567.029 1.131.087 1.691.177l.562.088c1.418.225 2.801.64 4.111 1.236.169.077.342.165.511.258l.102.057c.138.072.276.15.408.233l.077.046.434.28.036.025c4.055 2.762 6.45 7.995 7.058 13.187.679 5.828-.511 11.702-1.701 17.437l-1.072 5.17c-.046.234-.097.461-.143.694a11.379 11.379 0 013.366 4.726c1.021 2.586 1.047 5.383.965 8.186 0 .569-.031 1.138-.087 1.707.128 1.075.24 2.156.312 3.242.321 5.016-.281 10.058-.123 15.084.123 3.873.7 7.757.419 11.604-.245 3.413-1.149 6.723-2.043 10.017l-1.287 4.695a1.252 1.252 0 01-.322.646.957.957 0 01-.72.15 44.44 44.44 0 012.094 5.937 18.57 18.57 0 01.756 3.816c.168 2.369-.373 4.721-.914 7.023-.818 3.447-1.631 6.908-2.442 10.383-.572 2.431-1.142 4.859-1.711 7.286-1.123 4.789-2.252 9.608-2.461 14.536a31.947 31.947 0 00.51 7.39 65.18 65.18 0 01.634 22.148 109.802 109.802 0 01-4.132 18.311 19.412 19.412 0 00-1.262-.621l.179.337a41.786 41.786 0 011.635 3.18c.337.706.629 1.433.873 2.177.654 2.068.756 4.271.848 6.448.047.419.01.843-.108 1.247-.28.78-1.087 1.179-1.838 1.396-2.206.636-4.5.408-6.793.108a.766.766 0 01-.046.15c-.281.781-1.083 1.179-1.838 1.396-3.157.911-6.487.052-9.74-.258s-6.45-.083-9.581-.843a4.512 4.512 0 01-1.328-.517 4.401 4.401 0 01-1.675-2.353 3.054 3.054 0 01-.194-.77c-.128-1.133.827-2.131 1.838-2.508zm10.802-47.89c.176 1.211.52 2.391 1.022 3.506a67.557 67.557 0 015.24 16.635 78.046 78.046 0 011.159 11.506c.051 2.844-.056 5.823 1.113 8.377l-.423-.067c.132.248.26.517.383.714l.061.113a11.305 11.305 0 001.394-3.961c0-.046.23-.082.582-.103a108.307 108.307 0 001.492-24.765 11.617 11.617 0 00-.409-2.973c-.26-.833-.7-1.593-1.021-2.399a17.77 17.77 0 01-1.022-4.21 60.481 60.481 0 01-.643-11.128c.122-3.511-.68-7.002-1.364-10.497-.327-1.66-.628-3.326-.792-4.991l-.03-.336a50.481 50.481 0 00-6.272 16.486 23.865 23.865 0 00-.47 8.093zm21.859-74.734l-.163.145c-.494.44-.948.923-1.359 1.443-.204.227-.351.5-.429.796-.153.755.465 1.396.971 1.95.219.24.426.492.618.755.109-1.696.224-3.392.347-5.089h.015z" fill="url(#paint0_linear)" />
                <path d="M480.399 108l.626 4.329c.211 1.469.421 2.932.535 4.406.381 4.905-.324 9.831-.142 14.747.148 3.783.819 7.562.495 11.34-.291 3.335-1.349 6.578-2.407 9.791l-1.502 4.589c-.051.24-.182.46-.375.632-.29.154-.633.203-.962.138l-6.667-.541c.427-1.754.899-3.569 1.138-5.369.182-1.407.29-2.825.404-4.243.352-4.415.756-8.831 1.137-13.257l.712-7.751c.301-3.366.614-6.746 1.558-10.015.948-3.301 2.824-6.33 5.45-8.796z" fill="#F1C6DE" />
                <path opacity=".1" d="M480.399 108l.626 4.329c.211 1.469.421 2.932.535 4.406.381 4.905-.324 9.831-.142 14.747.148 3.783.819 7.562.495 11.34-.291 3.335-1.349 6.578-2.407 9.791l-1.502 4.589c-.051.24-.182.46-.375.632-.29.154-.633.203-.962.138l-6.667-.541c.427-1.754.899-3.569 1.138-5.369.182-1.407.29-2.825.404-4.243.352-4.415.756-8.831 1.137-13.257l.712-7.751c.301-3.366.614-6.746 1.558-10.015.948-3.301 2.824-6.33 5.45-8.796z" fill="#F1C6DE" />
                <path d="M469.153 257.119c.355.658.666 1.336.93 2.032.692 1.92.795 3.981.898 6.008.046.391.007.786-.113 1.162-.3.729-1.157 1.098-1.958 1.298-3.353.85-6.886.053-10.331-.238-3.446-.292-6.85-.078-10.177-.783a5.41 5.41 0 01-1.41-.462 4.176 4.176 0 01-1.782-2.187 2.721 2.721 0 01-.202-.72c-.108-1.069.878-1.993 1.953-2.343 1.074-.35 2.247-.296 3.378-.403 2.33-.225 4.516-1.166 6.22-2.679 1.704-1.512 2.829-3.511 3.202-5.687.042-.234 5.6-.093 6.199.209.682.355 1.095 1.234 1.483 1.832.609.963 1.179 1.95 1.71 2.961z" fill="#A26565" />
                <path opacity=".1" d="M469.153 257.119c.355.658.666 1.336.93 2.032.692 1.92.795 3.981.898 6.008.046.391.007.786-.113 1.162-.3.729-1.157 1.098-1.958 1.298-3.353.85-6.886.053-10.331-.238-3.446-.292-6.85-.078-10.177-.783a5.41 5.41 0 01-1.41-.462 4.176 4.176 0 01-1.782-2.187 2.721 2.721 0 01-.202-.72c-.108-1.069.878-1.993 1.953-2.343 1.074-.35 2.247-.296 3.378-.403 2.33-.225 4.516-1.166 6.22-2.679 1.704-1.512 2.829-3.511 3.202-5.687.042-.234 5.6-.093 6.199.209.682.355 1.095 1.234 1.483 1.832.609.963 1.179 1.95 1.71 2.961z" fill="#000" />
                <path d="M460.222 259.137c.344.655.643 1.331.894 2.025.671 1.941.77 3.975.865 6 .046.389.009.785-.11 1.16-.283.728-1.107 1.097-1.877 1.301-3.224.844-6.627.048-9.936-.243-3.308-.291-6.592-.078-9.786-.782a4.836 4.836 0 01-1.357-.485 4.122 4.122 0 01-1.713-2.185 2.757 2.757 0 01-.194-.718c-.104-1.063.844-1.99 1.878-2.34 1.033-.349 2.161-.291 3.249-.403a10.346 10.346 0 005.979-2.673 9.942 9.942 0 003.082-5.676c.039-.233 5.385-.097 5.961.204.661.354 1.058 1.233 1.431 1.83a65.556 65.556 0 011.634 2.985z" fill="#A26565" />
                <path d="M437.001 204.068c-.069 11.066 3.036 21.882 6.681 32.262a301.42 301.42 0 004.593 12.244c.96 2.397 2.043 5.06 1.014 7.426 2.967-1.168 5.983-1.854 9.103-1.316-1.186-2.509-1.073-5.428-1.127-8.194a74.373 74.373 0 00-1.167-11.292 64.564 64.564 0 00-5.335-16.331 12.748 12.748 0 01-1.034-3.441c-.405-2.632-.089-5.336.44-7.943a48.312 48.312 0 016.379-16.182l.03.328c.184 1.646.452 3.282.801 4.9.697 3.426 1.513 6.857 1.389 10.304-.129 3.654.09 7.313.653 10.923a17.087 17.087 0 001.063 4.128c.341.793.786 1.536 1.053 2.36.268.949.407 1.931.416 2.919.395 8.332 0 16.792-1.642 24.96 2.754-.225 5.508.6 7.971 1.88a104.756 104.756 0 004.203-17.975 61.804 61.804 0 00-.643-21.744 29.89 29.89 0 01-.519-7.246c.213-4.84 1.36-9.572 2.502-14.273l1.741-7.169c.824-3.414 1.648-6.813 2.472-10.196.549-2.258 1.103-4.568.93-6.893a17.649 17.649 0 00-.772-3.749 42.464 42.464 0 00-5.474-11.594c-9.528.553-19.171-.368-28.679-1.126a1.862 1.862 0 00-1.345.235 2 2 0 00-.544 1.27l-3.575 20.997a54.56 54.56 0 00-1.014 8.859c0 2.97.445 5.93.336 8.895-.148 3.995-.88 7.774-.9 11.774z" fill="#454B69" />
                <path opacity=".1" d="M456 190.944c.193 1.699.472 3.387.836 5.056 2.161-3.83 4.493-7.565 6.485-11.491.516-1.009 1.001-2.034 1.491-3.058l1.47-3.065c.273-.575.547-1.151.795-1.738.403-.842.712-1.728.923-2.641-.722-.138-2.507 1.859-3.044 2.382a42.288 42.288 0 00-3.095 3.508 38.43 38.43 0 00-3.23 4.332 21.375 21.375 0 00-2.631 6.715z" fill="#000" />
                <path d="M449 88.904s5.045 9.52 4.111 11.514c-.933 1.993 15.889-1.77 15.889-1.77s-9.161-9.521-8.223-13.508c.939-3.987-11.777 3.764-11.777 3.764z" fill="#EFB7B9" />
                <path d="M453 91c-7.18 0-13-5.596-13-12.5S445.82 66 453 66s13 5.596 13 12.5S460.18 91 453 91z" fill="#EFB7B9" />
                <path d="M448.161 97.296a12.681 12.681 0 015.241-4.255 18.605 18.605 0 013.726-.926l4.973-.884c1.216-.218 2.519-.421 3.653.084a6 6 0 011.546 1.149c1.726 1.617 3.401 3.39 5.571 4.327.592.255 1.211.442 1.803.697 2.428 1.04 4.242 3.256 5.267 5.721 1.082 2.569 1.113 5.362 1.031 8.155a14.49 14.49 0 01-.284 2.871c-.248.9-.563 1.779-.943 2.631a48.492 48.492 0 00-1.721 5.581 178.542 178.542 0 00-3.216 15.082 5.69 5.69 0 01-.623 2.081 7.47 7.47 0 01-1.721 1.669c-.523.434-1.005.916-1.438 1.441a1.88 1.88 0 00-.469.769c-.16.749.515 1.394 1.031 1.94a9.418 9.418 0 012.329 4.093c.258.317.391.719.371 1.129a2.005 2.005 0 00-.119.895c.102.276.262.526.469.733a2.784 2.784 0 01.516 2.226 34.714 34.714 0 01-12.203 2.881c-1.031.052-2.061.052-3.092.177-.732.094-1.453.244-2.185.333a23.5 23.5 0 01-3.195.083c-5.55-.114-11.26-.255-16.356-2.476-.48-2.636.556-5.325 1.205-7.926 1.031-4.16 1.289-8.42 2.062-12.617.515-2.866 1.288-5.69 1.726-8.576.438-2.887.515-5.877-.247-8.686-.696-2.486-.907-5.024-1.629-7.504-.721-2.481-1.226-5.17-.412-7.625 1.031-3.037 4.159-5.445 7.333-5.273z" fill="#F1C6DE" />
                <path d="M443.155 70.689c-.579-2.214.559-4.52 1.913-6.32 1.472-1.935 3.346-3.68 5.647-4.164 1.87-.398 3.808.082 5.711-.078 1.683-.139 3.302-.779 4.975-1.032a14.999 14.999 0 014.553.181 16.64 16.64 0 014.146 1.218c5.054 2.358 8.012 8.167 8.699 13.93.687 5.763-.515 11.572-1.712 17.243l-1.084 5.128c-1.129 5.34-2.257 10.701-2.556 16.159-.3 5.459.26 11.062 2.394 16.046-6.902-3.899-12.25-10.266-15.077-17.95-.766-2.11-1.335-4.302-2.189-6.377-.731-1.785-1.668-3.477-2.316-5.298a18.018 18.018 0 01-1.035-6.434c.039-1.651.299-3.292.255-4.943-.044-1.65-.446-3.369-1.53-4.566-.982-1.057-2.331-1.547-3.572-2.234a15.078 15.078 0 01-5-4.385c-.78-1.073-.824-1.548-1.02-2.766-.197-1.217-.898-2.187-1.202-3.358z" fill="#A26565" />
                <path d="M442.302 165.914c-.116 1.293.094 2.596-.158 3.879-.191.956-.635 1.818-.896 2.752a14.516 14.516 0 00-.396 3.308c-.038.935.028 2.077.774 2.513.327.192.718.192 1.059.359.34.166.63.618.434.971s-.532.296-.84.363c-.308.068-.639.421-.466.706a.52.52 0 00.27.192c.312.107.607.265.877.468a.996.996 0 01.299.419 1.1 1.1 0 01.06.531.606.606 0 01-.105.234.53.53 0 01-.187.16.478.478 0 01-.459-.01c.137.326.212.68.22 1.039-1.195.571-2.533-.177-3.653-.898a13.794 13.794 0 01-1.399-.997 7.704 7.704 0 01-2.102-2.939 8.554 8.554 0 01-.622-3.693c.053-.637.142-1.27.266-1.895a31.37 31.37 0 01.685-3.225c.322-1.116.761-2.181 1.139-3.276.802-2.332 1.32-4.772 2.047-7.135.049-.245.173-.463.35-.618a.899.899 0 01.518-.109 7.647 7.647 0 012.43.249c.467.156 1.264.52 1.483 1.039.22.519-.13.955-.34 1.386a12.529 12.529 0 00-1.288 4.227z" fill="#EFB7B9" />
                <path opacity=".1" d="M442.974 103a3.753 3.753 0 00-.68.912c-1.827 3.201-1.848 7.027-1.933 10.679-.096 4.098-.329 8.195-.563 12.318l-.696 12.293c-.069 1.173-.132 2.346-.308 3.509-.818.199-.849 1.224-.759 2.048.589 5.01 2.05 10.168.531 14.987a1.485 1.485 0 01-.356.666 4.296 4.296 0 012.374-.031c.759.154 1.492.426 2.257.595.967.21 2.061.302 2.719 1.024a49.226 49.226 0 001.779-6.618c.362-2.048.462-4.159 1.323-6.054.345-.763.812-1.47 1.237-2.202 2.225-3.831 3.319-8.16 4.387-12.431a17.52 17.52 0 00.34-6.177 20.544 20.544 0 01-.266-2.843 21.25 21.25 0 01.409-2.991 19.38 19.38 0 00-.621-8.662c-.797-2.607-1.498-5.352-3.187-7.544-1.688-2.192-5.167-3.442-7.987-3.478z" fill="#000" />
                <path d="M441.683 103c-.257.271-.473.58-.641.917-1.72 3.198-1.74 7.031-1.82 10.684-.091 4.1-.311 8.199-.531 12.298l-.655 12.298c-.065 1.174-.125 2.347-.29 3.51-.77.2-.801 1.225-.71 2.05.55 5.012 1.925 10.167.5 14.994a1.53 1.53 0 01-.335.666 3.812 3.812 0 012.236-.031c.715.154 1.405.425 2.126.589.91.215 1.94.302 2.561 1.025a51.436 51.436 0 001.66-6.651c.341-2.05.436-4.156 1.246-6.052.352-.754.741-1.489 1.166-2.203 2.1-3.833 3.126-8.168 4.131-12.442.452-2.026.56-4.116.321-6.18a13.629 13.629 0 01.135-5.836 20.5 20.5 0 00-.586-8.66c-.75-2.608-1.41-5.355-3.001-7.548-1.591-2.193-4.857-3.387-7.513-3.428z" fill="#F1C6DE" />
                <g opacity=".1" fill="#000">
                <path opacity=".1" d="M443.864 65.502c1.549-1.936 3.522-3.682 5.943-4.167 1.968-.398 4.007.082 6.011-.078 1.771-.139 3.475-.78 5.236-1.032a16.579 16.579 0 014.791.18c1.5.223 2.966.633 4.364 1.219.755.338 1.476.748 2.153 1.224a18.374 18.374 0 00-3.857-1.033 16.53 16.53 0 00-4.787-.18c-1.766.227-3.465.862-5.241 1.001-1.998.16-4.038-.315-6.01.078-2.422.485-4.405 2.235-5.939 4.172-1.43 1.797-2.623 4.105-2.019 6.325.321 1.167 1.064 2.19 1.266 3.393.201 1.203.253 1.693 1.079 2.767a15.68 15.68 0 003.79 3.527c-.398-.186-.806-.372-1.193-.573a15.645 15.645 0 01-5.262-4.39c-.821-1.073-.867-1.548-1.074-2.767-.206-1.219-.945-2.22-1.265-3.392-.609-2.164.589-4.472 2.014-6.274zM453.21 84.612a5.158 5.158 0 00-.697-.604c1.193.578 2.447 1.084 3.361 2.066 1.141 1.192 1.549 2.917 1.611 4.57.062 1.652-.232 3.294-.268 4.94a17.255 17.255 0 001.089 6.445c.682 1.823 1.668 3.511 2.438 5.303.893 2.065 1.492 4.265 2.297 6.377a34.6 34.6 0 0013.121 16.327c.031.067.057.14.088.207a34.539 34.539 0 01-15.868-17.964c-.805-2.112-1.404-4.307-2.303-6.383-.769-1.786-1.756-3.48-2.437-5.302a17.233 17.233 0 01-1.09-6.44c.042-1.652.315-3.294.269-4.946-.047-1.653-.47-3.398-1.611-4.596z" />
                </g>
                <path opacity=".1" d="M598 207.449a95.406 95.406 0 01-3.581 25.971 94.356 94.356 0 01-10.073 23.186c0 26.233-17.679 48.905-43.339 59.691A87.326 87.326 0 01507.171 323h-393.65c-21.04 0-40.538-5.687-56.528-15.374a97.04 97.04 0 01-12.98-9.367c-17.772-15.3-28.791-36.443-28.791-59.796A94.63 94.63 0 010 186.772c0-38.412 22.681-71.442 55.174-86.024a91.112 91.112 0 0113.335-4.776A87.69 87.69 0 0173.4 94.79a91.541 91.541 0 0113.335-1.832c1.62-.102 3.25-.16 4.888-.173h.899c1.809 0 3.602.063 5.384.167l.585-.994a138.6 138.6 0 012.206-3.566 134.76 134.76 0 014.276-6.336 145.846 145.846 0 014.888-6.482l.434-.524a139.91 139.91 0 012.948-3.56 174.611 174.611 0 019.932-10.656C160.869 23.824 219.922 0 286.308 0c51.656 0 98.874 14.425 135.041 38.26a90.932 90.932 0 0144.923-11.828c51.092 0 92.523 42.082 92.523 93.993a97 97 0 01-.523 9.834 94.191 94.191 0 0129.268 33.738A94.377 94.377 0 01598 207.449z" fill="#6C63FF" />
                <defs>
                <linearGradient id="paint0_linear" x1="459.482" y1="269.981" x2="459.482" y2="58.016" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="gray" stop-opacity=".25" />
                    <stop offset=".54" stop-color="gray" stop-opacity=".12" />
                    <stop offset="1" stop-color="gray" stop-opacity=".1" />
                </linearGradient>
                </defs>
            </symbol>
            <symbol id="user" viewBox="0 0 80 56">
                <path d="M79.911 0H0v55.503h79.911V0z" fill="#606BB7" />
                <path d="M39.956 10.83a16.937 16.937 0 00-15.642 10.446 16.914 16.914 0 003.67 18.44 16.932 16.932 0 0018.45 3.67A16.929 16.929 0 0056.887 27.75a16.967 16.967 0 00-4.973-11.95 16.985 16.985 0 00-11.957-4.971zm0 5.076a5.081 5.081 0 014.692 3.134 5.074 5.074 0 01-3.701 6.922 5.082 5.082 0 01-6.07-4.98 5.092 5.092 0 015.079-5.076zm0 24.44a12.338 12.338 0 01-10.159-5.419c.082-3.384 6.773-5.247 10.159-5.247 3.386 0 10.076 1.863 10.158 5.247a12.352 12.352 0 01-10.158 5.418z" fill="#fff" />
            </symbol>
            <symbol id="article" viewBox="0 0 56 65">
                <path d="M53.957 0H2.043A2.053 2.053 0 000 2.063v60.874C0 64.077.915 65 2.043 65h51.914A2.053 2.053 0 0056 62.937V2.063C56 .923 55.085 0 53.957 0z" fill="#fff" />
                <path opacity=".1" d="M53.957 0H2.043A2.053 2.053 0 000 2.063v60.874C0 64.077.915 65 2.043 65h51.914A2.053 2.053 0 0056 62.937V2.063C56 .923 55.085 0 53.957 0z" fill="#5A5773" />
                <path d="M51.969 4H6.03A2.023 2.023 0 004 6.015v52.97C4 60.098 4.91 61 6.031 61H51.97A2.023 2.023 0 0054 58.985V6.015C54 4.902 53.09 4 51.969 4z" fill="#fff" />
                <path d="M43.163 15H12.837C11.822 15 11 15.841 11 16.878v8.244c0 1.037.822 1.878 1.837 1.878h30.326C44.178 27 45 26.159 45 25.122v-8.244C45 15.841 44.178 15 43.163 15zM44 32H12v2h32v-2zM50 37H6v2h44v-2zM50 42H6v2h44v-2zM50 48H6v2h44v-2z" fill="#606BB7" />
            </symbol>
            <symbol id="blob-learning" viewBox="0 0 1440 892" style="overflow: visible;">
                <path opacity="0.1" d="M867.338 147.063C770.536 144.103 678.33 116.503 590.295 86.3319C502.259 56.1608 415.038 22.7226 320.561 6.72889C259.786 -3.55616 190.285 -4.98333 141.322 23.7488C94.1908 51.4193 78.9703 99.2354 70.7921 143.525C64.6317 176.88 61.0103 211.935 77.8745 243.203C89.5939 264.87 110.4 283.092 124.792 303.851C174.837 376.106 139.492 465.192 85.2108 535.725C59.821 568.821 30.2485 600.384 10.6182 635.615C-9.01214 670.846 -18.099 711.196 -0.927485 747.123C16.1104 782.743 56.6807 809.494 100.632 828.306C189.91 866.521 295.118 877.467 397.706 883.659C624.811 897.318 853.119 891.42 1080.81 885.523C1165.08 883.317 1249.71 881.088 1332.61 869.588C1378.64 863.207 1426.15 853.075 1459.56 828.601C1501.99 797.534 1512.51 744.929 1484.07 705.935C1436.39 640.604 1304.54 624.375 1271.21 554.255C1252.86 515.662 1271.7 472.67 1298.36 436.873C1355.56 360.077 1451.42 292.717 1456.48 204.94C1459.95 144.657 1413.86 84.2796 1342.61 55.7598C1267.91 25.86 1164.35 29.6226 1109.24 79.1135C1052.52 130.079 952.808 149.682 867.338 147.063Z" fill="#6C63FF" />
            </symbol>
            <symbol id="footer__logo">
                <path d="M12.555 28.11c6.934 0 12.555-5.62 12.555-12.555C25.11 8.621 19.49 3 12.555 3 5.621 3 0 8.621 0 15.555 0 22.49 5.621 28.11 12.555 28.11z" fill="#4F3961" />
                <path d="M47.866 28.11c6.934 0 12.556-5.62 12.556-12.555C60.422 8.621 54.8 3 47.866 3c-6.934 0-12.555 5.621-12.555 12.555 0 6.934 5.621 12.555 12.555 12.555z" fill="#EA728C" />
                <path d="M83.178 28.11c6.934 0 12.555-5.62 12.555-12.555C95.733 8.621 90.112 3 83.178 3c-6.934 0-12.555 5.621-12.555 12.555 0 6.934 5.62 12.555 12.555 12.555z" fill="#F3D4D4" />
                <path d="M103.492 14v-1.538l1.362-.264V3.014l-1.362-.264V1.203H108.792V2.75l-1.371.264v9.017h3.612l.123-1.608h1.96V14h-9.624zm15.161.185c-1.371 0-2.466-.44-3.287-1.319-.82-.879-1.23-1.995-1.23-3.348v-.352c0-1.412.386-2.575 1.16-3.49.779-.913 1.822-1.367 3.129-1.362 1.283 0 2.279.387 2.988 1.16.709.774 1.064 1.82 1.064 3.138v1.398h-5.678l-.018.053c.047.627.255 1.142.624 1.546.375.405.882.607 1.521.607.568 0 1.04-.056 1.415-.167a6.73 6.73 0 001.23-.545l.695 1.582c-.393.31-.903.571-1.53.782-.621.211-1.315.317-2.083.317zm-.228-7.893c-.475 0-.85.182-1.125.545-.276.363-.446.84-.51 1.433l.026.043h3.147v-.228c0-.545-.129-.979-.387-1.3-.252-.329-.636-.493-1.151-.493zM129.754 14a4.968 4.968 0 01-.185-.483 4.286 4.286 0 01-.123-.51 3.501 3.501 0 01-1.116.852c-.434.217-.932.326-1.494.326-.932 0-1.673-.252-2.224-.756-.545-.51-.817-1.202-.817-2.075 0-.89.357-1.579 1.072-2.065.715-.486 1.764-.73 3.147-.73h1.309v-.931c0-.457-.132-.812-.395-1.064-.264-.252-.654-.377-1.169-.377-.293 0-.554.035-.782.105a1.95 1.95 0 00-.554.237l-.167 1.02h-1.934l.009-2.11a7.243 7.243 0 011.608-.8 5.892 5.892 0 011.987-.325c1.178 0 2.133.29 2.865.87.738.575 1.107 1.395 1.107 2.462v4.341c.006.13.018.252.036.37l.782.105V14h-2.962zm-2.224-1.714c.387 0 .739-.082 1.055-.246.316-.17.562-.38.738-.633v-1.45h-1.309c-.545 0-.958.129-1.24.387a1.183 1.183 0 00-.421.914c0 .322.102.574.307.756.211.181.501.272.87.272zm6.258.176l1.231-.264V6.301l-1.363-.264V4.49h3.753l.114 1.389c.223-.492.51-.876.862-1.151a1.924 1.924 0 011.221-.414c.135 0 .276.012.422.036.153.017.279.04.378.07l-.272 2.338-1.055-.027c-.375 0-.685.074-.932.22a1.42 1.42 0 00-.562.624v4.623l1.23.264V14h-5.027v-1.538zm7.242 0l1.231-.264V6.301l-1.363-.264V4.49h3.753l.115 1.363a3.474 3.474 0 011.169-1.134 3.03 3.03 0 011.555-.405c.961 0 1.711.302 2.25.906.539.603.809 1.55.809 2.839v4.14l1.23.263V14h-4.904v-1.538l1.099-.264v-4.13c0-.64-.129-1.09-.387-1.354-.258-.27-.648-.404-1.169-.404-.34 0-.645.07-.914.21-.27.135-.495.329-.677.58v5.098l1.037.264V14h-4.834v-1.538zm-29.276 10.913h-4.333v3.656h4.131l.114-1.529h1.951V29h-10.125v-1.538l1.362-.264v-9.184l-1.362-.264v-1.547H113.6v3.507h-1.969l-.114-1.53h-4.096v3.218h4.333v1.977zm3.155 4.087l1.231-.264v-5.897l-1.363-.264V19.49h3.753l.115 1.363a3.48 3.48 0 011.168-1.134c.463-.27.982-.405 1.556-.405.961 0 1.711.302 2.25.906.539.603.809 1.55.809 2.839v4.14l1.23.263V29h-4.904v-1.538l1.099-.264v-4.13c0-.64-.129-1.09-.387-1.354-.258-.27-.648-.404-1.169-.404-.34 0-.645.07-.914.21-.27.135-.495.329-.677.58v5.098l1.037.264V29h-4.834v-1.538zm11.637-3.138c0-1.5.325-2.71.975-3.63.657-.92 1.574-1.38 2.751-1.38.534 0 1.002.12 1.407.36a3.1 3.1 0 011.037 1.012l.184-1.196h2.233v9.229c0 1.254-.396 2.253-1.187 2.997-.785.75-1.866 1.125-3.243 1.125-.48 0-.99-.068-1.529-.202a6.93 6.93 0 01-1.494-.537l.474-1.801c.41.176.821.313 1.231.413.41.105.844.158 1.301.158.626 0 1.095-.19 1.406-.571.31-.381.466-.911.466-1.591v-.624c-.282.357-.613.63-.994.817-.38.188-.817.282-1.309.282-1.166 0-2.077-.428-2.734-1.284-.65-.861-.975-1.992-.975-3.392v-.185zm2.566.185c0 .832.141 1.488.422 1.968.281.475.738.712 1.371.712.393 0 .724-.07.993-.21.276-.147.496-.358.66-.633v-4.131a1.758 1.758 0 00-.66-.668c-.269-.158-.594-.237-.975-.237-.627 0-1.087.278-1.38.835-.287.556-.431 1.283-.431 2.18v.184zm7.286-7.673v-1.547h3.938V27.2l1.239.263V29h-5.045v-1.538l1.24-.264V17.1l-1.372-.264zm5.942 10.626l1.239-.264v-5.897l-1.371-.264V19.49h3.938v7.708l1.23.264V29h-5.036v-1.538zm3.806-10.248h-2.567v-1.925h2.567v1.925zm9.834 5.546h-1.722l-.273-1.187a2.223 2.223 0 00-.668-.351 2.603 2.603 0 00-.879-.14c-.451 0-.808.102-1.072.307-.263.199-.395.45-.395.756 0 .287.126.527.378.72.252.188.755.355 1.511.501 1.178.235 2.051.58 2.619 1.037.569.452.853 1.076.853 1.872 0 .856-.369 1.556-1.107 2.101-.733.539-1.7.809-2.901.809a6.196 6.196 0 01-2.021-.317 5.217 5.217 0 01-1.626-.923l-.027-2.135h1.793l.352 1.239c.152.129.36.225.624.29a3.8 3.8 0 00.826.088c.522 0 .917-.094 1.187-.282a.88.88 0 00.413-.764c0-.281-.138-.525-.413-.73-.276-.205-.783-.386-1.521-.545-1.119-.228-1.966-.565-2.54-1.01-.568-.451-.852-1.064-.852-1.837 0-.797.328-1.483.984-2.057.656-.58 1.591-.87 2.804-.87.738 0 1.435.1 2.091.299.663.2 1.181.454 1.556.764l.026 2.365zm1.363 4.702l1.239-.264V17.1l-1.371-.264v-1.547h3.929v5.414a3.19 3.19 0 011.098-1.02 2.87 2.87 0 011.442-.369c.996 0 1.775.331 2.338.994.568.656.852 1.672.852 3.05v3.84l1.231.264V29h-4.905v-1.538l1.108-.264V23.34c0-.738-.132-1.26-.396-1.565-.258-.31-.644-.465-1.16-.465-.357 0-.671.064-.94.193-.264.129-.487.31-.668.545v5.15l1.107.264V29h-4.904v-1.538z" fill="#000" />
            </symbol>
            <symbol id="contact-email-icon" viewBox="0 0 27 20">
                <path d="M0 2.499v15.002A2.5 2.5 0 002.495 20h21.648a2.503 2.503 0 002.499-2.499V2.499A2.503 2.503 0 0024.142 0H2.496A2.499 2.499 0 000 2.499zm24.15 0v2.116c-1.17.95-3.03 2.43-7.004 5.541-.879.691-2.617 2.343-3.823 2.343-1.207 0-2.944-1.636-3.819-2.343-3.979-3.124-5.857-4.592-7.028-5.54V2.49L24.15 2.5zM2.496 17.501V7.829a732.25 732.25 0 005.467 4.295c1.171.922 3.143 2.87 5.365 2.858 2.222-.011 4.229-1.952 5.365-2.858 2.577-2.019 4.268-3.354 5.466-4.295v9.672H2.495z" fill="#b52b65" />
            </symbol>
            <symbol id="twitter-icon" viewBox="0 0 20 16">
                <path d="M6.29 16c7.547 0 11.675-6.156 11.675-11.495 0-.175 0-.349-.012-.522A8.265 8.265 0 0020 1.89a8.273 8.273 0 01-2.356.637A4.07 4.07 0 0019.448.293a8.303 8.303 0 01-2.606.98 4.153 4.153 0 00-5.806-.175 4.006 4.006 0 00-1.187 3.86A11.717 11.717 0 011.392.738 4.005 4.005 0 002.663 6.13 4.122 4.122 0 01.8 5.625v.051C.801 7.6 2.178 9.255 4.092 9.636a4.144 4.144 0 01-1.852.069c.537 1.646 2.078 2.773 3.833 2.806A8.315 8.315 0 010 14.185a11.754 11.754 0 006.29 1.812" fill="#1DA1F2" fill-rule="evenodd" />
            </symbol>
            </svg>
        </body>
</html>

