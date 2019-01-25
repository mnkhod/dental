<button onClick="choose()">Click Me!</button>


<script>
    var user = 0;
    function choose(){
        user +=1;
        console.log(user);
    }
</script>

<style>

    /*
.imageAnchor:focus img{
    border: 2px solid blue;
}
*/
    .btn-primary-outline{
        background-color: transparent;
        border-color: #fff;
    }
    .tooth {
        opacity: 0.3;
    }
    .toothPressed{
        opacity: 1;
    }
</style>
<br>
<button  class="imageAnchor btn btn-primary-outline" onclick="toothClick(1)">
    <img id='1' src="{{asset('img/toothImages/Layer1.png')}}">
</button>
<button  class="imageAnchor btn btn-primary-outline" onclick="toothClick(2)">
    <img id='2' src="{{asset('img/toothImages/Layer1.png')}}">
</button>
<button  class="imageAnchor btn btn-primary-outline" onclick="toothClick(3)">
    <img id='3' src="{{asset('img/toothImages/Layer1.png')}}">
</button>
<button  class="imageAnchor btn btn-primary-outline" onclick="toothClick(4)">
    <img id='4' src="{{asset('img/toothImages/Layer1.png')}}">
</button>
<button  class="imageAnchor btn btn-primary-outline" onclick="toothClick(5)">
    <img id='5' src="{{asset('img/toothImages/Layer1.png')}}">
</button>

<button onClick="test()">debug</button>

<script>
    var user;

    function toothClick(choice){
        for (var i=1; i<=5; i++) {
            if (i === choice) {
                document.getElementById(choice).classList.add('toothPressed');
            } else {
                document.getElementById(choice).classList.add('tooth');
            }
        }
    }

    function test(click){
        alert(user);
    }
</script>