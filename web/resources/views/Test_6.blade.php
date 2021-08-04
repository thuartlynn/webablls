@extends('layouts.master-2')

@section('title', 'test video bg')

@section('head')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Krona+One&display=swap');

    * {box-sizing: border-box}

    /* Slideshow container */
    .slideshow-container {
        /* width:100vw;
        height:100px; */
        position: relative;
        background: #f1f1f1;
    }

    /* Slides */
    .mySlides {
        display: none;
        padding: 80px;
        text-align: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height: 500px;
        overflow: hidden; 
    }

    .mySlides:nth-child(1) {
        background-image: url("images/internet-01.jpg");   
    }
    .mySlides:nth-child(2) {
        background-image: url("images/internet-02.jpg");   
    }
    .mySlides:nth-child(3) {
        background-image: url("images/internet-03.jpg");   
    }
    /* Next & previous buttons */
    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -30px;
        padding: 16px;
        color: #888;
        font-weight: bold;
        font-size: 20px;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        position: absolute;
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
        background-color: rgba(244,244,244,0.8);
        color: #111;
    }

    /* The dot/bullet/indicator container */
    .dot-container {
        text-align: center;
        padding: 20px;
    }

    /* The dots/bullets/indicators */
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    /* Add a background color to the active dot/circle */
    .active, .dot:hover {
        background-color: #FF0080;
    }

    /* Add an italic font style to all quotes */
    q {
        font-style: italic;
        color: white;
    }

    /* Add a blue color to the author */
    .author {color: cornflowerblue;}

    .circle {
        width:100px;
        height:100px;
        background:#0cc;
        -webkit-clip-path:ellipse(25% 50% at 50% 50%);
    }

    .s{
		width:100px;
		height:87px;
        /* background:#0cc; */
        animation:s 5s infinite linear alternate;
		-webkit-animation:s 5s infinite linear alternate;
	}

    .a{
		  width:100%;
		  height:100%;
		  -webkit-clip-path:polygon(0% 100%, 50%  0%,100% 100%,100% 100%,100% 100%,100% 100%,100% 100%,100% 100%);
          animation:a 5s infinite linear alternate;
		  -webkit-animation:a 5s infinite linear alternate;
		}

    @-webkit-keyframes s{
		  0%,5%{
		    width:115px;
		    height:100px;
		  }
		  24%{
		    width:100px;
		    height:100px;
		  }
		  43%{
		    width:105px;
		    height:100px;
		  }
		  62%{
		    width:114px;
		    height:100px;
		  }
		  81%{
		    width:103px;
		    height:100px;
		  }
		  95%,100%{
		    width:100px;
		    height:100px;
		  }
		}

    @-webkit-keyframes a{
		  0%,5%{
		  background:#c00;
		  -webkit-clip-path:polygon(
		    0% 100%,
		    50%  0%,
		    100% 100%,
		    100% 100%,
		    100% 100%,
		    100% 100%,
		    100% 100%,
		    100% 100%
		    );
		  }
		  24%{
		  background:#069;
		  -webkit-clip-path:polygon(
		    0% 100%,
		    0% 0%,
		    100% 0%,
		    100% 100%,
		    100% 100%,
		    100% 100%,
		    100% 100%,
		    100% 100%
		    );
		  }
		  43%{
		  background:#095;
		  -webkit-clip-path:polygon(
		    19.14% 100%,
		    0% 38.31%,
		    50% 0%,
		    100% 38.31%,
		    80.86% 100%,
		    80.86% 100%,
		    80.86% 100%,
		    80.86% 100%
		    );
		  }
		  62%{
		  background:#f80;
		  -webkit-clip-path:polygon(
		    25% 100%,
		    0% 50%,
		    25% 0%,
		    75% 0%,
		    100% 50%,
		    75% 100%,
		    75% 100%,
		    75% 100%
		    );
		  }
		  81%{
		  background:#09c;
		  -webkit-clip-path:polygon(
		    27.68% 100%,
		    0% 64.22%,
		    10.09% 19.72%,
		    50% 0%,
		    90.18% 19.72%,
		    100% 64.22%,
		    72.32% 100%,
		    72.32% 100%
		    );
		  }
		  95%,100%{
		  background:#f69;
		  -webkit-clip-path:polygon(
		    29.34% 100%,
		    0% 70.66%,
		    0% 29.34%,
		    29.34% 0%,
		    70.66% 0%,
		    100% 29.34%,
		    100% 70.66%,
		    70.66% 100%
		    );
		  }
		}

		.div1{
			width:120px;
			height:120px;
			margin:20px 0 0 10px;
			padding:20px;
			display:inline-block;
			background:url(/images/person-01.jpg);
			background-size:cover;
		}
		.div1>div{
			background:rgba(0,200,255,.4);
			margin:0;
			padding:0;
		}
		.box{
			border:10px dotted rgba(255,0,0,.5);
		}
		.default{
			/*box-sizing:content-box;*/ /*預設值*/
		}
		.border-box{
			box-sizing:border-box;
		}

		.bg-padding-box{
  			background-clip:padding-box;
		}

		.div2{
			width:120px;
			height:180px;
			margin:20px;
			display:block;
			background:url(/images/person-01.jpg);
			background-size:cover;
			-webkit-filter: sepia(0.7);
		}
</style>


@endsection



@section('header')
    
        @include('contents.test_slideshow')
    
@endsection

@section('script')

<script>
	const name = 'Test';
	const age = 18;
	// 有興趣的可以使用下方的網址測試
	const uri = `https://script.google.com/macros/s/AKfycbw5PnzwybI_VoZaHz65TpA5DYuLkxIF-HUGjJ6jRTOje0E6bVo/exec?name=${name}&age=${age}`;

	fetch(uri, {method:'GET'})
	.then(res => {
		return res.text();   // 使用 text() 可以得到純文字 String
	}).then(result => {
		console.log(result); // 得到「你的名字是：Test，年紀：18 歲。」
	});

	const url = 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-005?Authorization=CWB-DF7F8AC7-6EF0-414A-B647-6A6CCCFC9242&format=JSON';


	fetch()
	.then(res => {
		return res.json();
	}).then(result => {
		let city = result.cwbopendata.location[14].parameter[0].parameterValue;
		let temp = result.cwbopendata.location[14].weatherElement[3].elementValue.value;
		console.log(`${city}的氣溫為 ${temp} 度 C`); // 得到 高雄市的氣溫為 29.30 度 C
	});


</script>


@endsection