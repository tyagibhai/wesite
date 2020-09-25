<aside class="single_sidebar_widget author_widget">
    <img class="author_img rounded-circle" src="{{$author_details['pic']}}" alt="">
    <h4>{{$author_details['name']}}</h4>
    <p>{{$author_details['job_title']}}</p>
    <div class="social_icon">
        <a href="{{$author_details['fb']}}" target="_blank">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="{{$author_details['tw']}}" target="_blank">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="{{$author_details['gh']}}">
            <i class="fab fa-github"></i>
        </a>
        <a href="{{$author_details['ln']}}" target="_blank">
        <i class="fab fa-linkedin"></i>
        </a>
    </div>
    <p>
    {{$author_details['bio']}}
    </p>
    <div class="br"></div>
</aside>