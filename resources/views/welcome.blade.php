@extends('layout.layout')

@section('title', "Главная")

@section('content')
<div class="welcome-wrapper">
    <div class="welcome-block">
        <div>
            <p class="padding-centre">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem quia animi amet id temporibus aliquam, voluptatibus, nemo eos voluptates, culpa sunt. Quia doloremque repellendus nobis.
            <form action="{{ route('courses.index') }}">
                <button class="error" type="submit">
                    попробовать
                </button>
            </form>
            </p>
        </div>
        <img class="welcome-1" src="{{ 'storage/welcome/welcome_1.jpeg' }}">
    </div>
    <div class="welcome-block">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero cumque impedit id error ab laudantium ipsum quam necessitatibus omnis. Fugit unde temporibus quas autem incidunt veniam veritatis omnis ea porro. A soluta culpa ad praesentium, consectetur ea, deserunt natus facere voluptatum eaque maiores quibusdam fugiat fuga esse ratione distinctio explicabo.
        </p>
    </div>
</div>
@endsection('content')