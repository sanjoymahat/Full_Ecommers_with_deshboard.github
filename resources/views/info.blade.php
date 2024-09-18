@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                <div class="card mt-2">
                    <div class="card-header">How to install</div>
                    <div class="card-body">
                        <ol> open this project in your text editor,open .env from project directory
                            and provide DB_DATABASE,DB_USERNAME,DB_PASSWORD</ol>

                        <ol> php artisan migrate</ol>
                        <ol>php artisan db:seed</ol>
                        <ol> php artisan serve </ol>
                        <ol>npm run watch, in another terminal/cmd</ol>
                    </div>

                </div>
                <div class="card mt-2">
                    <div class="card-header">How use my .sql file</div>
                    <div class="card-body">
                        <ol> download .sql file</ol>

                        <ol>import it in your databse</ol>
                        <p>
                            Admin- email: admin@gmail.com , password: password
                        </p>
                        <p>
                            User- email: qehefisyh@mailinator.com, password: Pa$$w0rd!
                        </p>
                        <p>
                            User - email: memyn@mailinator.com , password: Pa$$w0rd!
                        </p>

                    </div>

                </div>

                <div class="card mt-2">
                    <div class="card-header">Want to be pro software enginner?</div>
                    <div class="card-body">
                        <p>Try this course: Message me in udemy or comment on youtube for $9.99 to $13.99 Discount copoun
                        </p>
                        <a target="_blank"
                            href="https://www.udemy.com/course/laravel-masterclass-build-web-apps-with-laravel-7-php/?couponCode=8CECE4282329358A5B4C">
                            <img src="2704674_4661_12.jpeg" style="width:100%;">
                            Laravel masterclass: Make 6 web apps
                        </a>
                        <br>
                        <a target="_blank"
                            href="https://www.udemy.com/course/laravel-php-doctor-appointment-web-application/?couponCode=52F96294A38BA9CA273E">
                            <img src="3315036_1b4c_8.jpeg" style="width: 100%;">
                            Doctor appointment bookiing app</a>
                    </div>

                </div>

                <div class="card mt-2">
                    <div class="card-header">Need help. Use Q&A. Ask me question there.</div>
                    <div class="card-body">
                        if you need any help regarding this course then please ask me in Q&A section not
                        in messages. I will be happy to help you there.
                        Please explain your problem briefly and also past your code and error message



                    </div>

                </div>


                <div class="card mt-2">
                    <div class="card-header">Need discount coupon,mentorship or personal project?</div>
                    <div class="card-body">
                        If you need discount coupon for any other of my course on Udemy, Please message me.

                    </div>

                </div>

                <a target="_blank" href="https://www.youtube.com/channel/UCTeyfGKHPCXLNQHuY3Yb3gA">
                    Subscribe for free videos on youtube.
                </a>

            </div>
        </div>
    </div>

@endsection
