<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>svg#freepik_stories-hamburger:not(.animated) .animable {opacity: 0;}svg#freepik_stories-hamburger.animated #freepik--french-fries--inject-16 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) lightSpeedLeft;animation-delay: 0s;}svg#freepik_stories-hamburger.animated #freepik--Speech-bubble--inject-16 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) fadeIn,1.5s Infinite  linear floating;animation-delay: 0s,1s;}svg#freepik_stories-hamburger.animated #freepik--Right-hand--inject-16 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideLeft;animation-delay: 0s;}svg#freepik_stories-hamburger.animated #freepik--Left-hand--inject-16 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideRight;animation-delay: 0s;}svg#freepik_stories-hamburger.animated #freepik--Burger--inject-16 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideLeft;animation-delay: 0s;}            @keyframes lightSpeedLeft {              from {                transform: translate3d(-50%, 0, 0) skewX(20deg);                opacity: 0;              }              60% {                transform: skewX(-10deg);                opacity: 1;              }              80% {                transform: skewX(2deg);              }              to {                opacity: 1;                transform: translate3d(0, 0, 0);              }            }                    @keyframes fadeIn {                0% {                    opacity: 0;                }                100% {                    opacity: 1;                }            }                    @keyframes floating {                0% {                    opacity: 1;                    transform: translateY(0px);                }                50% {                    transform: translateY(-10px);                }                100% {                    opacity: 1;                    transform: translateY(0px);                }            }                    @keyframes slideLeft {                0% {                    opacity: 0;                    transform: translateX(-30px);                }                100% {                    opacity: 1;                    transform: translateX(0);                }            }                    @keyframes slideRight {                0% {                    opacity: 0;                    transform: translateX(30px);                }                100% {                    opacity: 1;                    transform: translateX(0);                }            }        </style>
</head>
<body style="background-color: rgb(247, 247, 247)">

    <img style="width: 30%" src="{{ url('/svg/hamburger-animate.svg') }}" alt="">


<script type='text/javascript'>
    document.addEventListener('DOMContentLoaded',
    function () {window.setTimeout(document.querySelector('svg').classList.add('animated'),1000);})
</script>
    
</body>
</html>