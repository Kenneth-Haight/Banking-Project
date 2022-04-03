<style>
    .square {
        height: 100px;
        width: 100px;

        background-color: slategray;
        opacity: 30%;

        position: absolute;
        top: 120px;
        left: 100px;

        z-index: -1;
        transform: rotate(10deg);
    }

    .circle {
        height: 100px;
        width: 100px;
        border-radius: 50%;

        background-color: cornflowerblue;
        opacity: 30%;

        position: absolute;
        top: 15px;
        left: 80%;
        z-index: -1;
    }

    .parallelogram {
        height: 100px;
        width: 200px;
        rotate: 45deg;
        -webkit-transform: skew(20deg);
        transform: rotate(45deg) skew(20deg);
        -moz-transform: skew(20deg);

        background-color: darkolivegreen;
        opacity: 30%;
        z-index: -1;

        position: absolute;
        top: 350px;
        left: 80%;
    }

    .triangle {
        width: 0;
	    height: 0px;
	    border-top: 50px solid transparent;
	    border-right: 100px solid rgba(120, 85, 137, 0.3);
	    border-bottom: 50px solid transparent;
        position: absolute;
        top: 400px;
        left: 150px;
        transform: rotate(-15deg);
        z-index: -1;
    }
</style>
<div>
    <div class="parallelogram"></div>
    <div class="square"></div>
    <div class="circle"></div>
    <div class="triangle"></div>
</div>
